# Plan Completo: Landing Page Médica — Nefrólogo (Xalapa y Boca del Río)

> **Archivo de respaldo**: Este documento contiene el plan completo del proyecto para referencia en caso de pérdida de contexto en el chat.
>
> **Estado del documento**: conserva la arquitectura y el alcance originales. No usar sus casillas como indicador del estado actual; la fuente viva es `CONTEXTO-PROYECTO.md`. La identidad visual descrita allí ya fue integrada.
>
> **Actualización 2026-07-08**: tema `med-landing-dev` versión 1.5.4 desplegado en staging VPS. Incluye información médica base, fotografía profesional, teléfono/WhatsApp definitivo, credenciales, COFEPRIS, Instagram, páginas SEO de servicios, cuatro páginas legales borrador y tarjetas de enfermedades con iconos SVG. La home muestra las enfermedades atendidas, Servicios usa grupos completos sin carrusel y el catálogo se pinta desde helpers del tema para no depender de que WordPress ya haya sembrado todos los posts. También se corrigió la navegación visible en staging, el contraste del menú activo, el selector móvil de idioma y el riesgo de tarjetas ocultas por animaciones. Falta revisión clínica final de textos, horarios, email/formulario, texto legal definitivo aprobado, Lighthouse, schema externo y QA cross-browser.

---

## Contexto del Proyecto

Landing page premium para un médico nefrólogo con consultorios en **Xalapa** y **Boca del Río, Veracruz, México**. El objetivo es generar confianza profesional, posicionar en SEO local para ambas ciudades, y convertir visitantes en citas agendadas vía formulario y WhatsApp.

- **CMS destino**: instalación WordPress existente; validar versión y compatibilidad antes del despliegue
- **Tema**: `med-landing-dev` (custom, sin page builders)
- **Repositorio**: contiene únicamente el tema y su documentación
- **Path fuente del tema**: `med-landing-dev/`
- **Path de instalación esperado**: `wp-content/themes/med-landing-dev/`
- **Bilingüe**: Español (principal) + Inglés via Polylang
- **Fases**: Fase 1 (MVP) → Fase 2 (Blog, FAQ, Testimonials)

WordPress core, la base de datos, los uploads, los plugins y la configuración del servidor pertenecen al sistema de destino y no se versionan en este repositorio.

---

## Stack Tecnológico

| Tecnología | Versión | Uso |
|------------|---------|-----|
| WordPress | Por confirmar en destino | CMS |
| TailwindCSS | v4 | Estilos (compilado via @tailwindcss/cli) |
| Alpine.js | 3.15.12 | Interactividad (menú mobile, accordions, modals) |
| GSAP | 3.15.0 | Animaciones (scroll reveals, fade-ins) |
| Polylang | 3.8.4 en LocalWP | Multilenguaje ES/EN |
| RankMath SEO | latest | SEO, schemas, sitemap |
| Fluent Forms | latest | Formularios de contacto/citas |
| LiteSpeed Cache | latest | Cache (solo producción) |
| Cloudflare | — | CDN (producción) |

---

## Paleta de Colores

| Rol | Color | Hex | Uso |
|-----|-------|-----|-----|
| Primary | Verde oscuro | `#344729` | Headers, nav, títulos |
| Secondary | Verde olivo | `#4A5942` | Links, acentos, iconos |
| Accent | Terracota | `#7C2804` | CTAs y acentos |
| Gold | Dorado cálido | `#C8B070` | Detalles premium y decoración |
| Background | Blanco | `#FFFFFF` | Fondo principal |
| Surface | Gris cálido | `#F7F7F7` | Cards, secciones alternas |
| Text | Verde muy oscuro | `#243126` | Texto body |
| Text muted | Verde grisáceo | `#5F6B5A` | Subtítulos, captions |
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
med-landing-dev/
├── assets/
│   ├── css/
│   │   └── src/
│   │       └── main.css          ← Directivas Tailwind + @theme
│   ├── js/
│   │   ├── navigation.js         ← Mobile menu (Alpine)
│   │   ├── animations.js         ← GSAP scroll animations
│   │   └── components.js         ← Alpine components (accordion, modal)
│   ├── images/
│   │   ├── brand/                ← Derivados web transparentes
│   │   ├── icons/                ← SVG icons (WhatsApp, phone, etc.)
│   │   └── ...
│   └── fonts/                    ← Self-hosted fonts (si aplica)
├── template-parts/
│   ├── header/
│   │   ├── nav-desktop.php
│   │   └── nav-mobile.php
│   ├── footer/
│   │   └── footer-main.php
│   ├── components/
│   │   ├── brand-portrait.php    ← Composición temporal sin persona ficticia
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
  "name": "med-landing-dev",
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
- [x] Crear estructura de carpetas del tema
- [x] Configurar package.json + Tailwind
- [x] Crear style.css con header del tema
- [x] Crear functions.php con carga modular
- [x] Activar tema en LocalWP
- [ ] Instalar y configurar plugins base restantes (RankMath, Fluent Forms)
- [x] Configurar Polylang en LocalWP (ES como principal, EN como secundario)

### 1.2 Layout Base
- [x] Header responsive con logo fallback reemplazable desde WordPress
- [x] Footer con logo negativo e información configurada disponible
- [x] Floating CTA para escritorio
- [x] Sticky mobile CTA bar

### 1.3 Home Page (front-page.php)
- [x] **Hero Section**: identidad confirmada, especialidad, ubicaciones y fotografía profesional real con fallback de marca
- [x] **Enfermedades que atiende**: grid visible en home con las 12 enfermedades del catálogo SEO, sin carrusel, con iconos SVG y microetiquetas visuales
- [x] **Sobre el Doctor preview**: contenido objetivo con nombre, especialidad y credenciales disponibles
- [x] **Trust Section**: certificación CMN, cédulas, sedes y contacto confirmados
- [x] **Ubicaciones**: datos confirmados, mapas interactivos y enlaces directos a Google Maps
- [x] **CTA Section**: botón de agendar con fallback a Contacto

### 1.4 About Doctor (page-about.php)
- [x] Biografía profesional objetiva con información recibida
- [x] Formación académica verificada por dato proporcionado por el usuario
- [x] Certificaciones, cédulas, COFEPRIS y membresías publicadas con cautela
- [ ] Filosofía de atención con texto final del doctor
- [x] Foto profesional grande
- [x] CTA final

### 1.5 Services (page-services.php + single-servicio.php)
- [x] Custom Post Type "Servicios"
- [x] Grid de servicios con cards agrupadas por enfermedades, terapias y procedimientos
- [x] Template individual por servicio con CTA
- [x] Breadcrumbs para SEO
- [x] Siembra automática de 17 páginas SEO tipo `servicio` en español, con equivalentes ingleses provisionales cuando Polylang está activo
- [x] Página Servicios agrupada en enfermedades, terapias y procedimientos, con anclas claras y consultas filtradas por idioma
- [x] Fallback visual del catálogo desde `developer_get_services_by_category()` para evitar pantallas vacías si LocalWP conserva una base antigua o incompleta

### 1.6 Contact (page-contact.php)
- [ ] Formulario Fluent Forms (nombre, email, teléfono, motivo, mensaje)
- [x] Google Maps embed de ambas ubicaciones
- [ ] Información de contacto completa: direcciones y teléfono confirmados; email y horarios pendientes
- [x] Click-to-call condicional cuando se configure teléfono
- [x] Link universal WhatsApp condicional, con número mexicano normalizado y mensaje configurable

### 1.7 Location Pages (page-location.php)
- [x] Página específica para Xalapa
- [x] Página específica para Boca del Río con slug histórico `/nefrologo-veracruz/`
- [ ] Keywords locales optimizados (nefrólogo en Xalapa, nefrólogo en Veracruz)
- [x] Schema LocalBusiness por ubicación con datos confirmados
- [ ] NAP (Name, Address, Phone) consistente
- [x] Mapa embebido con pin

### 1.8 SEO & Schema (Fase 1)
- [ ] Configurar RankMath (sitemap, robots.txt, canonical)
- [x] Schema Physician base sin credenciales no verificadas
- [x] Schema LocalBusiness × 2 (una por ciudad)
- [ ] Schema MedicalOrganization
- [ ] Open Graph tags via RankMath
- [ ] Meta titles y descriptions por página
- [x] Estructura base de headings con H1 único por página
- [ ] URLs limpias y descriptivas

### 1.9 Animaciones (Fase 1)
- [x] Fade-in on scroll (secciones)
- [x] Smooth scroll para anchor links
- [x] Hover transitions en cards y botones
- [x] Entrance animation hero
- [x] Respeto de `prefers-reduced-motion`

### 1.10 Accesibilidad
- [x] HTML semántico (header, main, nav, section, article)
- [x] Alt text en imágenes informativas y `alt=""` en decorativas
- [ ] Labels en formularios
- [x] Contraste principal WCAG AA
- [x] Focus visible en todos los interactivos
- [x] Touch targets principales >= 48px en mobile
- [x] Texto base de 18 px e interlineado amplio para favorecer a adultos mayores
- [x] Skip to content link
- [x] ARIA y gestión de foco del menú móvil

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
- El tema no usa jQuery directamente; no desregistrarlo globalmente porque los plugins pueden declararlo
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

## Deployment (Repositorio → WordPress Destino)

> **Estado VPS 2026-07-08**: existe un staging Docker aislado en `/opt/med-landing-dev/` con WordPress `wordpress:php8.2-apache`, MariaDB 11.4, tema `med-landing-dev` 1.5.4 activo, Polylang/Rank Math/Fluent Forms instalados y contenido sembrado. No se tocaron los sistemas Docker existentes. El puerto temporal `8081` está permitido en UFW y ya responde públicamente en `http://74.208.222.71:8081/`; falta publicar mediante dominio, reverse proxy Nginx y SSL. Las credenciales quedaron únicamente en `/opt/med-landing-dev/DEPLOYMENT.md` dentro del VPS.

1. Confirmar versión de WordPress y PHP, Multisite, plugins activos y restricciones del hosting.
2. Ejecutar `npm run build` y validar que `style.css` conserve el header requerido por WordPress.
3. Instalar o actualizar `med-landing-dev/` en `wp-content/themes/`.
4. Instalar y configurar los plugins requeridos que no existan en el sistema destino.
5. Configurar contenido, menús, Customizer, formularios, idiomas, SEO y permalinks en WordPress.
6. Configurar LiteSpeed Cache y Cloudflare únicamente si corresponden al hosting de producción.
7. Configurar Google Search Console y Analytics cuando exista autorización.
8. Verificar perfiles de Google Business, sitemap y enlaces externos.
9. Ejecutar respaldo y plan de reversión antes de activar cambios en producción.
10. Realizar QA funcional, visual, responsive, accesible y de rendimiento en el sistema destino.

---

## Testing & Verificación

- [x] Tema se activa sin errores en LocalWP
- [x] `npm run build` compila Tailwind correctamente
- [x] Todas las páginas principales cargan con layout base
- [x] Responsive revisado a 390 px, 1024 px y 1280 px
- [ ] Formulario envía correctamente
- [x] WhatsApp genera el chat temporal correcto mediante `wa.me` en LocalWP
- [ ] Click-to-call funciona en mobile
- [x] Google Maps carga correctamente
- [ ] Schema validado en Google Rich Results Test
- [x] Navegación principal y menú móvil funcionales con teclado
- [x] Polylang: ambos idiomas con URLs correctas en LocalWP
- [x] Staging VPS Docker: WordPress instalado, tema activo, 17 servicios sembrados y PHP lint correcto dentro del contenedor
- [x] Staging VPS público por IP: `http://74.208.222.71:8081/` responde y `/servicios/` muestra 17 cards
- [x] Staging VPS UI 1.5.3: navegación visible con fallback, Home sin tarjetas ocultas por animación y móvil 390 px sin desbordamiento horizontal
- [x] Staging VPS UI 1.5.4: cuatro páginas legales borrador, footer Legal, tarjetas de enfermedades con iconos SVG, lint PHP correcto y responsive 320/390/768/1024/1280 sin overflow
- [ ] 404 page funciona
- [ ] Lighthouse 90+ en todas las métricas
- [ ] Cross-browser: Safari, Firefox, Chrome, Edge

---

## Decisiones Importantes

- ❌ NO usar Elementor ni page builders
- ❌ NO añadir dependencia directa de jQuery al tema; conservarla si un plugin la necesita
- ❌ NO usar sliders pesados ni autoplay video
- ❌ NO usar plugins innecesarios
- ✅ Alpine.js y GSAP como scripts ligeros
- ✅ El style.css del tema ES el output de Tailwind (con header WP al inicio)
- ✅ Mobile first siempre
- ✅ SEO local como prioridad

---

## Estado LocalWP de Idioma y WhatsApp

- Polylang 3.8.4 está instalado y activado en LocalWP.
- Español `es_MX` es principal e inglés `en_US` secundario.
- Inicio, Doctor, Servicios, Contacto, Xalapa y Boca del Río tienen pares ES/EN relacionados.
- El header usa un botón único: `English` en ES y `Español` en EN.
- Si falta una traducción, el destino es el inicio del idioma solicitado.
- El número temporal histórico `522281565985` quedó obsoleto; el tema 1.5.0 lo migra si lo encuentra en una base LocalWP antigua.
- El WhatsApp definitivo vigente del médico es `522294466698`, derivado de `229 446 6698`.

*Última actualización: 2026-07-06*
