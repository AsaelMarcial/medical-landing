# Medical Landing Page — Proyecto Nefrólogo

## Resumen del Proyecto
Landing page premium para un médico nefrólogo con consultorios en Xalapa y Boca del Río, Veracruz, México. WordPress custom theme sin page builders, optimizado para SEO local y conversiones.

## Stack Tecnológico
- **CMS destino**: instalación WordPress existente (versión exacta por confirmar antes del despliegue)
- **CSS**: TailwindCSS v4 (compilado via @tailwindcss/cli)
- **JS Interactivo**: Alpine.js (menú mobile, accordions, modals)
- **Animaciones**: GSAP (scroll reveals, fade-ins)
- **SEO**: RankMath SEO
- **Formularios**: Fluent Forms
- **Multilenguaje**: Polylang (ES principal + EN)
- **Cache**: LiteSpeed Cache (producción)
- **CDN**: Cloudflare (producción)

## Alcance del Repositorio
- Este repositorio contiene únicamente el tema distribuible y su documentación.
- **Fuente de verdad del código**: `med-landing-dev/`
- **Destino de instalación**: `wp-content/themes/med-landing-dev/` dentro de un WordPress ya instalado.
- WordPress core, base de datos, uploads, plugins y configuración del servidor no forman parte del repositorio.
- La versión de WordPress/PHP, Multisite, plugins activos y método de despliegue del sistema destino deben confirmarse antes de integrar o publicar.

## Comandos de Desarrollo
```bash
# Desde la raíz del repositorio:
cd med-landing-dev

# Compilar Tailwind en modo watch
npm run dev

# Compilar para producción (minificado)
npm run build
```

## Paleta de Colores
| Token | Hex | Uso |
|-------|-----|-----|
| primary | #344729 | Headers, nav, títulos |
| secondary | #4A5942 | Links, iconos, acentos |
| accent | #7C2804 | CTAs terracota |
| gold | #C8B070 | Detalles premium y decoración |
| background | #FFFFFF | Fondo principal |
| surface | #F7F7F7 | Cards, secciones alternas |
| text | #243126 | Body text |
| text-muted | #5F6B5A | Subtítulos |
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
- Nefrólogo en Boca del Río (page-location.php, slug histórico `nefrologo-veracruz`)

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
- JS: ES6+, sin dependencia directa de jQuery en el tema
- Accesibilidad WCAG AA mínimo
- Touch targets principales >= 48px

## Performance Targets
- Lighthouse 90+ en todas las métricas
- CSS total < 30KB
- JS total < 50KB (Alpine + GSAP)
- Imágenes en WebP con lazy loading

## Decisiones Importantes
- NO usar Elementor ni page builders
- NO añadir dependencia directa de jQuery al tema; conservarla si un plugin la necesita
- NO usar sliders pesados ni autoplay video
- NO usar plugins innecesarios
- Alpine.js y GSAP se cargan como scripts, no como plugins WP
- El style.css del tema ES el output de Tailwind (con el header de WP al inicio)
- La identidad visual autorizada es **Dr. Edgar E. Hernández — Nefrología**.
- El nombre público completo autorizado para contenido y schema es **Dr. Edgar Eduardo Hernández Enríquez**.
- Los originales de `med-landing-dev/graficos/` no se modifican; usar derivados web desde `assets/images/brand/` y `assets/images/doctor/`.
- Credenciales integradas con cautela: Céd. Prof. `11751221`, Céd. Esp. `14852016`, certificación CMN `2025-2030`, COFEPRIS `2530092002A00059`.
- No publicar años de experiencia, cifras de pacientes, horarios, servicios adicionales ni claims clínicos sin evidencia validada.

## Archivo Maestro de Contexto
- Antes de analizar o modificar el proyecto, leer `CONTEXTO-PROYECTO.md`.
- Tratar `CONTEXTO-PROYECTO.md` como la fuente viva del estado actual, decisiones, pendientes y riesgos.
- Después de cualquier cambio en código, assets, configuración o documentación, actualizar en el mismo trabajo todos los archivos Markdown afectados.
- Actualizar siempre las secciones de estado de `CONTEXTO-PROYECTO.md` y agregar una entrada al final de su bitácora antes de dar el trabajo por terminado.
- La documentación debe permitir retomar el proyecto correctamente desde un chat nuevo sin depender del historial de conversaciones.
- La bitácora es acumulativa: no borrar entradas anteriores. Registrar fecha, objetivo, archivos modificados, decisiones, validaciones y pendientes.
- La fuente de verdad del código en este repositorio es `med-landing-dev/`.
- No asumir que existe una instalación local de WordPress dentro del repositorio.
- Los datos históricos de LocalWP documentados en `CONTEXTO-PROYECTO.md` sirven como referencia de la auditoría anterior, no describen el sistema WordPress de destino.
