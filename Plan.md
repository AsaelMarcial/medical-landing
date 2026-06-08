# Plan Completo: Landing Page Médica — Nefrólogo (Xalapa y Veracruz)

> **Archivo de respaldo**: Este documento contiene el plan completo del proyecto para referencia en caso de pérdida de contexto en el chat.

---

## Contexto del Proyecto

Landing page premium para un médico nefrólogo con consultorios en **Xalapa** y **Veracruz, México**. El objetivo es generar confianza profesional, posicionar en SEO local para ambas ciudades, y convertir visitantes en citas agendadas vía formulario y WhatsApp.

- **CMS**: WordPress 7.0
- **Tema**: `developer-developer` (custom, sin page builders)
- **Entorno local**: LocalWP en Windows 11, dominio `medical-landing.local`
- **Path del tema**: `app/public/wp-content/themes/developer-developer/`
- **Bilingüe**: Español (principal) + Inglés via Polylang
- **Fases**: Fase 1 (MVP) → Fase 2 (Blog, FAQ, Testimonials)

---

## Stack Tecnológico

| Tecnología | Versión | Uso |
|------------|---------|-----|
| WordPress | 7.0 | CMS |
| TailwindCSS | v4 | Estilos (compilado via @tailwindcss/cli) |
| Alpine.js | latest | Interactividad (menú mobile, accordions, modals) |
| GSAP | latest | Animaciones (scroll reveals, fade-ins) |
| Polylang | latest | Multilenguaje ES/EN |
| RankMath SEO | latest | SEO, schemas, sitemap |
| Fluent Forms | latest | Formularios de contacto/citas |
| LiteSpeed Cache | latest | Cache (solo producción) |
| Cloudflare | — | CDN (producción) |

---

## Paleta de Colores

| Rol | Color | Hex | Uso |
|-----|-------|-----|-----|
| Primary | Azul profundo | `#1E3A5F` | Headers, nav, títulos |
| Secondary | Teal médico | `#0E7490` | Links, acentos, iconos |
| Accent | Dorado cálido | `#B8860B` | CTAs premium, badges |
| Background | Blanco | `#FFFFFF` | Fondo principal |
| Surface | Gris claro | `#F8FAFC` | Cards, secciones alternas |
| Text | Slate oscuro | `#1E293B` | Texto body |
| Text muted | Slate medio | `#64748B` | Subtítulos, captions |
| Success/WhatsApp | Verde | `#25D366` | Botón WhatsApp |

---

## Tipografía

- **Headings**: `Inter` (weight 600-700) — moderna, profesional, excelente legibilidad
- **Body**: `Inter` (weight 400) — consistencia, optimizada para pantalla
- **Display (hero)**: `Playfair Display` (opcional para toque más premium)
- **Fallback**: system-ui, sans-serif

---

## Estructura del Tema

```
developer-developer/
├── assets/
│   ├── css/
│   │   └── src/
│   │       └── main.css          ← Directivas Tailwind + @theme
│   ├── js/
│   │   ├── navigation.js         ← Mobile menu (Alpine)
│   │   ├── animations.js         ← GSAP scroll animations
│   │   └── components.js         ← Alpine components (accordion, modal)
│   ├── images/
│   │   ├── logo.svg
│   │   ├── icons/                ← SVG icons (WhatsApp, phone, etc.)
│   │   └── placeholder/
│   └── fonts/                    ← Self-hosted fonts (si aplica)
├── template-parts/
│   ├── header/
│   │   ├── nav-desktop.php
│   │   └── nav-mobile.php
│   ├── footer/
│   │   └── footer-main.php
│   ├── components/
│   │   ├── cta-floating.php      ← WhatsApp + Phone floating
│   │   ├── cta-section.php       ← CTA repetido entre secciones
│   │   ├── trust-badges.php      ← Certificaciones
│   │   ├── card-service.php      ← Card de servicio reutilizable
│   │   ├── card-testimonial.php
│   │   └── google-map.php
│   └── sections/
│       ├── hero.php
│       ├── services-grid.php
│       ├── about-preview.php
│       ├── trust-section.php
│       ├── locations.php
│       └── contact-form.php
├── templates/
│   ├── front-page.php            ← Home page
│   ├── page-about.php            ← Sobre el Doctor
│   ├── page-services.php         ← Servicios (listado)
│   ├── page-contact.php          ← Contacto + Mapa + Form
│   ├── single-servicio.php       ← Servicio individual (CPT)
│   └── page-location.php         ← Página por ciudad (Xalapa/Veracruz)
├── inc/
│   ├── setup.php                 ← Theme supports, menus, sidebars
│   ├── enqueue.php               ← Scripts y estilos
│   ├── custom-post-types.php     ← CPT: Servicios, Testimonios
│   ├── schema-markup.php         ← JSON-LD schemas
│   ├── customizer.php            ← Opciones del tema (teléfono, WhatsApp, redes)
│   ├── helpers.php               ← Funciones helper reutilizables
│   └── acf-fields.php            ← Campos custom o meta boxes
├── functions.php                 ← Entry point, carga modular de inc/
├── style.css                     ← Output de Tailwind + header WP
├── index.php                     ← Fallback obligatorio
├── header.php
├── footer.php
├── 404.php
├── screenshot.png
├── package.json
└── tailwind.config.js
```

---

## Build System

### package.json
```json
{
  "name": "developer-developer",
  "scripts": {
    "dev": "npx @tailwindcss/cli -i ./assets/css/src/main.css -o ./style.css --watch",
    "build": "npx @tailwindcss/cli -i ./assets/css/src/main.css -o ./style.css --minify"
  },
  "devDependencies": {
    "@tailwindcss/cli": "^4.x",
    "@tailwindcss/typography": "^0.5"
  }
}
```

### Workflow de Desarrollo
1. Abrir terminal en la carpeta del tema
2. `npm run dev` para watch mode
3. Editar PHP + clases Tailwind → el CSS se recompila automáticamente
4. El `style.css` resultante es el que WordPress carga

### Notas Tailwind v4
- Los colores, fuentes y breakpoints custom se definen en `assets/css/src/main.css` con `@theme`
- No se necesita `tailwind.config.js` separado en Tailwind v4 (configuración via CSS)
- Se usa `@tailwindcss/cli` directamente, no PostCSS

---

## Plugins Requeridos (orden de instalación)

| # | Plugin | Propósito |
|---|--------|-----------|
| 1 | **Polylang** | Multilenguaje ES/EN |
| 2 | **RankMath SEO** | SEO, schemas, sitemap, OG tags |
| 3 | **Fluent Forms** | Formulario de citas + contacto |
| 4 | **LiteSpeed Cache** | Cache, minificación (solo producción) |
| 5 | **SVG Support** | Permitir subir SVGs (logos, iconos) |
| 6 | **WebP Express** | Conversión automática de imágenes |

> **Regla**: Se evitan plugins pesados. Alpine.js y GSAP se cargan como scripts ligeros, no como plugins WP.

---

## Fase 1 — MVP (Detalle Completo)

### 1.1 Setup Inicial
- [ ] Crear estructura de carpetas del tema
- [ ] Configurar package.json + Tailwind
- [ ] Crear style.css con header del tema
- [ ] Crear functions.php con carga modular
- [ ] Activar tema en WordPress
- [ ] Instalar y configurar plugins base (Polylang, RankMath, Fluent Forms)
- [ ] Configurar Polylang (ES como principal, EN como secundario)

### 1.2 Layout Base
- [ ] Header responsive (logo, nav desktop, hamburger mobile, botón CTA, selector idioma)
- [ ] Footer (info contacto, mapa de sitio, redes sociales, horarios, aviso legal)
- [ ] Floating CTA (WhatsApp + teléfono) — visible siempre en mobile
- [ ] Sticky mobile CTA bar

### 1.3 Home Page (front-page.php)
- [ ] **Hero Section**: Foto doctor, headline fuerte, especialidad, ubicaciones, CTA agendar, WhatsApp, trust indicators (años exp, pacientes, certificaciones)
- [ ] **Servicios destacados**: Grid de 4-6 servicios principales con iconos y link
- [ ] **Sobre el Doctor preview**: Foto + texto breve + link a página completa
- [ ] **Trust Section**: Logos universidades, certificaciones, asociaciones
- [ ] **Ubicaciones**: Cards para Xalapa y Veracruz con mapa embebido
- [ ] **CTA Section**: Formulario rápido o botón de agendar

### 1.4 About Doctor (page-about.php)
- [ ] Biografía profesional
- [ ] Formación académica (timeline o lista)
- [ ] Certificaciones y membresías
- [ ] Filosofía de atención
- [ ] Foto profesional grande
- [ ] CTA final

### 1.5 Services (page-services.php + single-servicio.php)
- [ ] Custom Post Type "Servicios"
- [ ] Grid de servicios con cards (icono, título, descripción breve)
- [ ] Página individual por servicio: descripción, síntomas, tratamiento, CTA
- [ ] Breadcrumbs para SEO

### 1.6 Contact (page-contact.php)
- [ ] Formulario Fluent Forms (nombre, email, teléfono, motivo, mensaje)
- [ ] Google Maps embed (ambas ubicaciones con tabs o toggle)
- [ ] Información de contacto (dirección, teléfono, email, horarios)
- [ ] Click-to-call en mobile
- [ ] Link directo WhatsApp

### 1.7 Location Pages (page-location.php)
- [ ] Página específica para Xalapa
- [ ] Página específica para Veracruz
- [ ] Keywords locales optimizados (nefrólogo en Xalapa, nefrólogo en Veracruz)
- [ ] Schema LocalBusiness por ubicación
- [ ] NAP (Name, Address, Phone) consistente
- [ ] Mapa embebido con pin

### 1.8 SEO & Schema (Fase 1)
- [ ] Configurar RankMath (sitemap, robots.txt, canonical)
- [ ] Schema Physician (JSON-LD manual en theme)
- [ ] Schema LocalBusiness × 2 (una por ciudad)
- [ ] Schema MedicalOrganization
- [ ] Open Graph tags via RankMath
- [ ] Meta titles y descriptions por página
- [ ] Estructura de headings (H1 único por página)
- [ ] URLs limpias y descriptivas

### 1.9 Animaciones (Fase 1)
- [ ] Fade-in on scroll (secciones)
- [ ] Smooth scroll para anchor links
- [ ] Hover transitions en cards y botones
- [ ] Entrance animation hero

### 1.10 Accesibilidad
- [ ] HTML semántico (header, main, nav, section, article)
- [ ] Alt text en todas las imágenes
- [ ] Labels en formularios
- [ ] Contraste WCAG AA mínimo
- [ ] Focus visible en todos los interactivos
- [ ] Touch targets >= 44px en mobile
- [ ] Skip to content link
- [ ] ARIA labels donde sea necesario

---

## Fase 2 — Expansión

### 2.1 Blog
- [ ] Diseño de archive y single post
- [ ] Categorías médicas (nefrología, salud renal, prevención)
- [ ] Sidebar con CTA y posts relacionados
- [ ] Schema Article

### 2.2 FAQ
- [ ] Accordion con Alpine.js
- [ ] Schema FAQ
- [ ] Preguntas frecuentes sobre nefrología
- [ ] Integrado en servicios individuales también

### 2.3 Testimonios
- [ ] CPT Testimonios
- [ ] Carousel o grid
- [ ] Integración Google Reviews (estático o API)
- [ ] Schema Review

### 2.4 Mejoras SEO
- [ ] Blog content strategy
- [ ] Internal linking
- [ ] Rich snippets monitoring

---

## Estrategia SEO Local

### Keywords Objetivo
- "nefrólogo en Xalapa"
- "nefrólogo en Veracruz"
- "especialista en riñones Xalapa"
- "consulta nefrología Veracruz"
- "médico nefrólogo Xalapa"
- "enfermedad renal Veracruz"

### Páginas por Ubicación
- `/nefrologo-xalapa/` — Optimizada para Xalapa
- `/nefrologo-veracruz/` — Optimizada para Veracruz

### Acciones SEO
- Google Business Profile: vincular ambas ubicaciones
- NAP consistente: nombre, dirección, teléfono en footer + schema
- Mapa embebido: Google Maps con pin en cada consultorio
- Click-to-call: `tel:` links en mobile
- Sitemap XML via RankMath
- robots.txt optimizado
- Canonical tags

---

## Performance Targets

| Métrica | Target |
|---------|--------|
| Lighthouse Performance | 90+ |
| Lighthouse SEO | 90+ |
| Lighthouse Accessibility | 90+ |
| Lighthouse Best Practices | 90+ |
| CSS total | < 30KB |
| JS total | < 50KB (Alpine + GSAP) |
| LCP | < 2.5s |
| FID | < 100ms |
| CLS | < 0.1 |

### Optimizaciones
- TailwindCSS compilado y purgado (~15-30KB)
- Alpine.js (~15KB gzip)
- GSAP core solo (~25KB gzip)
- Imágenes: WebP + lazy loading nativo
- Fonts: preload + font-display: swap
- No jQuery (des-registrar de WP)
- LiteSpeed Cache en producción (page cache, CSS/JS combine)
- Cloudflare CDN para assets estáticos

---

## Convenciones de Código

- **Mobile first** (min-width breakpoints)
- **HTML semántico** (header, main, nav, section, article, footer)
- **No BEM** — clases utilitarias de Tailwind
- **PHP**: WordPress coding standards
- **JS**: ES6+, no jQuery
- **Accesibilidad**: WCAG AA mínimo
- **Touch targets**: >= 44px
- **No page builders**: todo custom
- **No plugins pesados**: mantener stack ligero

---

## Custom Post Types

### Servicios (`servicio`)
- Título
- Descripción completa
- Descripción breve (excerpt)
- Icono (SVG o selectable)
- Imagen destacada
- Orden de menú

### Testimonios (`testimonio`) — Fase 2
- Nombre del paciente
- Texto del testimonio
- Calificación (1-5)
- Fecha
- Foto (opcional)

---

## Orden de Implementación Completo

### Fase 1
1. **Setup tema + build system** (estructura, Tailwind, functions.php)
2. **Layout base** (header, footer, floating CTA)
3. **Home page** (hero + todas las secciones)
4. **About page**
5. **Services** (CPT + páginas)
6. **Contact** (form + mapas)
7. **Location pages** (Xalapa + Veracruz)
8. **SEO & Schemas** (RankMath config + JSON-LD)
9. **Polylang setup** (traducir páginas a EN)
10. **Animaciones** (GSAP + transitions)
11. **Testing & optimización**

### Fase 2
12. Blog (archive + single)
13. FAQ page
14. Testimonios (CPT + display)
15. Mejoras SEO continuas

---

## Deployment (Local → Producción)

1. Exportar DB local con WP Migrate o similar
2. Subir tema via FTP/SSH
3. Instalar plugins en producción
4. Importar DB, buscar/reemplazar URLs
5. Configurar LiteSpeed Cache
6. Configurar Cloudflare (DNS, SSL, cache rules)
7. Configurar Google Search Console + Analytics
8. Enviar sitemap a Google
9. Verificar Google Business Profile links
10. Test final en producción

---

## Testing & Verificación

- [ ] Tema se activa sin errores en WP
- [ ] `npm run dev` compila Tailwind correctamente
- [ ] Todas las páginas cargan con layout base
- [ ] Mobile responsiveness (iPhone SE, iPad, Desktop)
- [ ] Formulario envía correctamente
- [ ] WhatsApp link abre chat correcto
- [ ] Click-to-call funciona en mobile
- [ ] Google Maps carga correctamente
- [ ] Schema validado en Google Rich Results Test
- [ ] Navegación por teclado funcional
- [ ] Polylang: ambos idiomas con URLs correctas
- [ ] 404 page funciona
- [ ] Lighthouse 90+ en todas las métricas
- [ ] Cross-browser: Safari, Firefox, Chrome, Edge

---

## Decisiones Importantes

- ❌ NO usar Elementor ni page builders
- ❌ NO usar jQuery (des-registrar de WP)
- ❌ NO usar sliders pesados ni autoplay video
- ❌ NO usar plugins innecesarios
- ✅ Alpine.js y GSAP como scripts ligeros
- ✅ El style.css del tema ES el output de Tailwind (con header WP al inicio)
- ✅ Mobile first siempre
- ✅ SEO local como prioridad

---

*Última actualización: 2026-05-27*
