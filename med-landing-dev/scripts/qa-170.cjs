/* Run with QA_URL pointing to an isolated WordPress installation. */
const playwright = require('playwright');
const fs = require('node:fs');
const base = process.env.QA_URL || 'http://127.0.0.1:18082';
const output = process.env.QA_OUTPUT || require('node:os').tmpdir();
(async () => {
  const engine = process.env.QA_ENGINE || 'chromium';
  const browser = await playwright[engine].launch({ ...(engine === 'chromium' ? { channel: process.env.QA_CHANNEL || 'chrome' } : {}), headless: true });
  const page = await browser.newPage();
  const failures = [];
  page.on('pageerror', error => failures.push(error.message));
  const results = [];
  for (const path of ['/', '/en/', '/servicios/', '/en/services/', '/contacto/', '/nefrologo-xalapa/', '/servicios/proteinuria-hematuria/', '/en/servicios/proteinuria-and-hematuria/', '/servicios/cateteres-hemodialisis/']) {
    await page.setViewportSize({ width: 1440, height: 900 });
    const response = await page.goto(base + path, { waitUntil: 'networkidle' });
    const data = await page.evaluate(() => ({
      lang: document.documentElement.lang,
      title: document.title,
      canonical: [...document.querySelectorAll('link[rel="canonical"]')].map(x => x.href),
      hreflang: [...document.querySelectorAll('link[hreflang]')].map(x => [x.hreflang, x.href]),
      calls: document.querySelectorAll('a[href^="tel:"]').length,
      forms: document.querySelectorAll('main form').length,
      retiredLocation: /Boca del R[ií]o|MediMAC/.test(document.body.innerText),
      whatsapp: [...document.querySelectorAll('[data-whatsapp-cta]')].map(x => x.href),
      analytics: [...document.scripts].some(x => /googletagmanager|google-analytics/.test(x.src)),
    }));
    if (response.status() !== 200 || data.calls || data.forms || data.retiredLocation || !data.whatsapp.length || data.whatsapp.some(url => !url.startsWith('https://wa.me/522294466698')) || !data.lang.startsWith(path.startsWith('/en/') ? 'en' : 'es')) failures.push({ path, data, status: response.status() });
    results.push({ path, status: response.status(), ...data });
    if (data.canonical.length !== 1 || data.canonical[0] !== base + path || data.hreflang.length !== 2 || /Boca del R[ií]o/.test(data.title)) failures.push({ path, metadata: data });
  }
  for (const width of [320, 390, 768, 1024, 1440]) {
    await page.setViewportSize({ width, height: 900 });
    await page.goto(base, { waitUntil: 'networkidle' });
    const overflow = await page.evaluate(() => [...document.querySelectorAll('main *')].filter(x => {
      if (x.getBoundingClientRect().right <= innerWidth + 1) return false;
      for (let parent = x.parentElement; parent && parent.tagName !== 'BODY'; parent = parent.parentElement) {
        if (['hidden', 'clip'].includes(getComputedStyle(parent).overflowX) && parent.getBoundingClientRect().right <= innerWidth + 1) return false;
      }
      return true;
    }).map(x => x.tagName + '.' + x.className));
    if (overflow.length) failures.push({ width, overflow });
    await page.screenshot({ path: output + '/medical-170-' + width + '.png' });
    if (width < 1280) {
      await page.locator('[data-menu-toggle]').click();
      if (!(await page.locator('[data-mobile-panel]').isVisible())) failures.push('Mobile menu did not open');
      await page.keyboard.press('Escape');
      if (await page.locator('[data-mobile-panel]').isVisible()) failures.push('Escape did not close menu');
    }
  }
  for (const [path, status, destination] of [['/nefrologo-veracruz/', 301, '/nefrologo-xalapa/'], ['/servicios/chronic-kidney-disease/', 301, '/en/servicios/chronic-kidney-disease/'], ['/*', 404], ['/wp-content/uploads/*', 404], ['/wp-*.php', 404], ['/wp-sitemap.xml', 301, '/sitemap_index.xml'], ['/sitemap_index.xml', 200]]) {
    const response = await page.request.get(base + path, { maxRedirects: 0 });
    if (response.status() !== status || (destination && !response.headers().location?.endsWith(destination))) failures.push({ path, status: response.status(), headers: response.headers() });
  }
  fs.writeFileSync(output + '/medical-170-qa.json', JSON.stringify({ results, failures }, null, 2));
  console.log(JSON.stringify({ checked: results.length, failures }, null, 2));
  await browser.close();
  process.exitCode = failures.length ? 1 : 0;
})().catch(error => { console.error(error); process.exitCode = 1; });
