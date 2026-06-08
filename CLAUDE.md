# Medical Landing Page — Proyecto Nefrólogo

## Resumen del Proyecto
Landing page premium para un médico nefrólogo con consultorios en Xalapa y Veracruz, México. WordPress custom theme sin page builders, optimizado para SEO local y conversiones.

## Stack Tecnológico
- **CMS**: WordPress 7.0
- **CSS**: TailwindCSS v4 (compilado via @tailwindcss/cli)
- **JS Interactivo**: Alpine.js (menú mobile, accordions, modals)
- **Animaciones**: GSAP (scroll reveals, fade-ins)
- **SEO**: RankMath SEO
- **Formularios**: Fluent Forms
- **Multilenguaje**: Polylang (ES principal + EN)
- **Cache**: LiteSpeed Cache (producción)
- **CDN**: Cloudflare (producción)

## Entorno de Desarrollo
- **Local**: LocalWP en Windows 11
- **Dominio local**: medical-landing.local
- **Path del tema**: `app/public/wp-content/themes/developer-developer/`
- **WordPress**: 7.0 (Multisite habilitado)
- **DB**: local / root / localhost

## Comandos de Desarrollo
```bash
# Desde la carpeta del tema:
cd app/public/wp-content/themes/developer-developer

# Compilar Tailwind en modo watch
npm run dev

# Compilar para producción (minificado)
npm run build
```

## Paleta de Colores
| Token | Hex | Uso |
|-------|-----|-----|
| primary | #1E3A5F | Headers, nav, títulos |
| secondary | #0E7490 | Links, iconos, acentos |
| accent | #B8860B | CTAs, badges premium |
| background | #FFFFFF | Fondo principal |
| surface | #F8FAFC | Cards, secciones alternas |
| text | #1E293B | Body text |
| text-muted | #64748B | Subtítulos |
| whatsapp | #25D366 | Botón WhatsApp |

## Tipografía
- **Headings**: Inter 600-700
- **Body**: Inter 400
- **Display (hero)**: Playfair Display (opcional)

## Estructura de Páginas
### Fase 1 (MVP)
- Home (front-page.php)
- Sobre el Doctor (page-about.php)
- Servicios (page-services.php + single-servicio.php)
- Contacto (page-contact.php)
- Nefrólogo en Xalapa (page-location.php)
- Nefrólogo en Veracruz (page-location.php)

### Fase 2
- Blog (archive.php, single.php)
- FAQ (page-faq.php)
- Testimonios (página + CPT)

## Custom Post Types
- **Servicios** (`servicio`): Cada servicio médico como entrada individual
- **Testimonios** (`testimonio`): Reviews de pacientes (Fase 2)

## SEO Local
- Keywords: "nefrólogo en Xalapa", "nefrólogo en Veracruz", "especialista en riñones"
- Schemas: Physician, LocalBusiness (×2), MedicalOrganization, FAQ (Fase 2)
- Páginas por ubicación con keywords locales

## Plugins Requeridos
1. Polylang
2. RankMath SEO
3. Fluent Forms
4. LiteSpeed Cache (solo producción)
5. SVG Support
6. WebP Express

## Convenciones de Código
- Mobile first (min-width breakpoints)
- HTML semántico (header, main, nav, section, article, footer)
- BEM no aplica — se usan clases utilitarias de Tailwind
- PHP: WordPress coding standards
- JS: ES6+, no jQuery
- Accesibilidad WCAG AA mínimo
- Touch targets >= 44px

## Performance Targets
- Lighthouse 90+ en todas las métricas
- CSS total < 30KB
- JS total < 50KB (Alpine + GSAP)
- Imágenes en WebP con lazy loading

## Decisiones Importantes
- NO usar Elementor ni page builders
- NO usar jQuery (des-registrar de WP)
- NO usar sliders pesados ni autoplay video
- NO usar plugins innecesarios
- Alpine.js y GSAP se cargan como scripts, no como plugins WP
- El style.css del tema ES el output de Tailwind (con el header de WP al inicio)
