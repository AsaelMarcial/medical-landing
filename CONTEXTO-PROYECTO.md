# Contexto Maestro y Bitácora - Medical Landing

> Fuente viva de verdad del proyecto. Leer este archivo completo antes de trabajar.
> Actualizar el estado afectado y agregar una entrada acumulativa a la bitácora después de cada cambio.

## 1. Estado Ejecutivo

- Nota PageSpeed actual 2026-07-09: la rama aislada `codex/pagespeed-100` avanza a tema 1.6.2. Esta versión conserva la estable como respaldo, reduce logos/retrato WebP, cambia Google Maps a carga bajo demanda y mantiene cero CDN frontend del tema. Pendiente desplegar/medir producción y no fusionar hasta comprobar los marcadores objetivo.

- Proyecto: sitio premium para un médico nefrólogo.
- Mercado: Xalapa y Boca del Río, Veracruz, México.
- Objetivo principal: generar confianza, posicionar búsquedas locales y convertir visitas en citas por formulario, WhatsApp y teléfono.
- Entregable versionado: tema WordPress `med-landing-dev`.
- CMS destino: una instalación WordPress existente; versión, PHP, Multisite y configuración exacta pendientes de confirmar.
- Fuente de verdad del código: `med-landing-dev/` en este repositorio.
- Estado actual: estructura técnica del MVP, identidad visual, ubicaciones, mejoras UX, soporte bilingüe, fotografía profesional, contacto definitivo, credenciales y catálogo SEO base integrados en el tema.
- Fase actual: Fase 1 avanzada. La maquetación base, el contenido médico inicial, el staging VPS, el dominio final con HTTPS, la primera corrección visual responsive y los borradores legales funcionales existen; falta cerrar operación, revisión legal, configuración fina de plugins, QA final y revisión clínica/editorial final.
- Bloqueo principal: faltan email público y receptor de formularios, horarios, texto legal definitivo, configuración final de RankMath/Fluent Forms, revisión clínica final de textos, conexión de Google Analytics/Search Console y QA completo de producción.
- Última auditoría integral: 2026-06-07, zona `America/Mexico_City`.
- Última aclaración de alcance del repositorio: 2026-06-08.
- Última integración de identidad visual: 2026-06-08.
- Última integración de ubicaciones: 2026-06-08.
- Última integración de idioma, WhatsApp y accesibilidad: 2026-06-08; tema 1.4.0 validado en LocalWP.
- Última integración médica y SEO: 2026-07-06; tema 1.5.2 con fotografía profesional, credenciales, teléfono definitivo, 17 servicios SEO, home con enfermedades visibles, Servicios con navegación compacta y fallback visual del catálogo ante bases LocalWP incompletas.
- Último ajuste visual en staging: 2026-07-08; tema 1.5.3 desplegado en VPS con menú fallback, contraste corregido, selector móvil compacto, animaciones más seguras y uso más consistente de fondos de marca.
- Última integración legal/UI: 2026-07-08; tema 1.5.4 con cuatro páginas legales borrador, footer legal completo y tarjetas de enfermedades con iconos SVG y microetiquetas.
- Última integración social: 2026-07-08; tema 1.5.5 con Instagram oficial visible en Home y Contacto.
- Última preparación de dominio en VPS: 2026-07-08; Nginx sirve `https://nefrologoedgar.com.mx` con certificado Let’s Encrypt, `www` y HTTP redirigen al dominio canónico HTTPS y WordPress usa `https://nefrologoedgar.com.mx` como `home`/`siteurl`.
- Último ajuste SEO/Google: 2026-07-08; tema 1.5.7 con título UTF-8 corregido, fallback SEO de metadatos sociales, indexación pública, sitemap nativo `wp-sitemap.xml` y Site Kit instalado para vincular Analytics/Search Console.
- Optimización PageSpeed en rama aislada: 2026-07-09; rama `codex/pagespeed-100` prepara tema 1.6.1 con fuentes del sistema, eliminación de CDN frontend, menú móvil en JavaScript nativo, preload/fetchpriority de imagen LCP, WebP para retrato/logos, limpieza de assets globales de WordPress y caché estática Nginx en VPS. Pendiente lograr/verificar 100 en PageSpeed antes de fusionar.
- Última propuesta comercial: 2026-06-08; honorario base MXN 6,000, total indicado con CFDI MXN 7,000 y plazo de 4 a 6 semanas.

## 2. Protocolo de Uso

Antes de cualquier trabajo:

1. Leer `AGENTS.md`.
2. Leer este archivo.
3. Revisar el estado actual de los archivos que se modificarán.
4. Revisar el estado de Git y conservar cambios ajenos.
5. Trabajar el código exclusivamente en `med-landing-dev/`.
6. No asumir que WordPress core, base de datos, uploads o plugins están disponibles dentro del repositorio.
7. Antes de desplegar, confirmar las características reales del WordPress destino.

Después de cualquier cambio:

1. Actualizar en el mismo trabajo todos los archivos Markdown afectados por cambios en código, assets, configuración o documentación.
2. Actualizar las secciones de estado que hayan quedado obsoletas.
3. Agregar una entrada nueva al final de `Bitácora acumulativa`.
4. Indicar fecha, objetivo, archivos, decisiones, pruebas y pendientes.
5. No borrar ni reescribir entradas históricas.
6. Dejar contexto suficiente para retomar el proyecto desde un chat nuevo sin depender de conversaciones anteriores.

## 3. Fuentes Revisadas

Documentación:

- `AGENTS.md` y `CLAUDE.md`: son copias idénticas con las reglas generales del proyecto.
- `Plan.md`: plan original de arquitectura, fases, SEO, accesibilidad, rendimiento y despliegue.
- `INFORMACION-A-SOLICITAR.md`: inventario de información clínica, operativa, gráfica y legal que debe entregar el médico.
- `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.md`: fuente editable y sincronizada de la propuesta comercial.
- `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.docx`: propuesta formal editable para completar los datos del prestador.
- `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.pdf`: copia cerrada y revisada visualmente para enviar al cliente.
- El repositorio actual es una extracción deliberada del proyecto y contiene solo el tema y la documentación necesaria.

Conversaciones relacionadas:

- Hilo original `019ea4a7-1671-7e12-80fd-b09887b78c45`.
- Hilo derivado `019ea4a7-15f6-7ea2-806e-b74b869e2b5f`.
- El hilo original definió especialidad, ciudades, fases, Polylang, formulario más WhatsApp, paleta y arquitectura.
- El usuario indicó que sí dispone de material, aunque todavía no está cargado en WordPress.
- `med-landing-dev/graficos/` contiene los originales autoritativos de la identidad. No renombrar ni modificar esos archivos; los derivados web viven en `assets/images/brand/`.
- El hilo derivado no contiene decisiones adicionales relevantes.

Estado técnico revisado:

- Tema completo y archivos fuente.
- Configuración histórica de WordPress y LocalWP del entorno original.
- Estado histórico de la base de datos, plugins, medios, páginas, menús y opciones.
- Build de Tailwind y lint de PHP.

La auditoría del entorno original sirve como referencia técnica. No representa automáticamente el estado del sistema WordPress donde finalmente se instalará el tema.

## 4. Objetivos del Producto

### Conversión

- Cita mediante Fluent Forms.
- Contacto directo mediante WhatsApp.
- Click-to-call en móvil.
- CTAs repetidos y visibles sin saturar la experiencia.

### Confianza

- Nombre y fotografía profesional reales.
- Cédulas y certificaciones verificables.
- Formación académica y membresías reales.
- Direcciones, horarios, teléfonos y mapas reales.
- Evitar afirmaciones médicas, cifras o instituciones no verificadas.

### SEO Local

- Palabras objetivo principales:
  - `nefrólogo en Xalapa`
  - `nefrólogo en Veracruz`
  - `especialista en riñones`
- Landing independiente por ciudad.
- NAP consistente en contenido, footer, Google Business Profile y schema.
- Schema previsto: Physician, MedicalOrganization y LocalBusiness por sede.
- RankMath administrará metadatos, sitemap, canonical y Open Graph.

### Calidad

- Mobile first.
- WCAG AA como mínimo.
- Touch targets principales de al menos 48 px.
- Lighthouse 90+ como objetivo.
- HTML semántico.
- Sin page builders ni uso directo de jQuery en el tema; no se desregistra globalmente porque los plugins pueden necesitarlo.

## 5. Decisiones Confirmadas

- Especialidad: Nefrología.
- Ciudades: Xalapa y Boca del Río, Veracruz.
- Idioma principal: español.
- Segundo idioma: inglés mediante Polylang.
- Desarrollo por fases.
- Fase 1: Home, About, Servicios, Contacto, citas y páginas locales.
- Fase 2: Blog, FAQ y Testimonios.
- Citas: formulario más WhatsApp.
- Tema custom, sin Elementor.
- TailwindCSS v4.
- JavaScript nativo para interacción ligera del tema.
- Animaciones críticas evitadas por defecto; cualquier animación debe ser progresiva, accesible y sin bloquear contenido.
- RankMath para SEO.
- Fluent Forms para formularios.
- LiteSpeed Cache y Cloudflare únicamente al preparar producción.
- Honorario comercial base vigente en la propuesta: MXN 6,000.
- Total vigente indicado cuando corresponda emitir CFDI: MXN 7,000.
- Pago en dos exhibiciones de 50%: al iniciar y antes de publicar.
- El precio incluye Fases 1 y 2 bilingües, configuración, pruebas y publicación.
- Tiempo comercial estimado: 4 a 6 semanas.
- Dominio, hosting, correo y licencias externas los contrata y paga directamente el cliente.
- Hosting recomendado: Hostinger Business por costo-beneficio. El comparativo vigente también incluye Hostinger Premium, DreamHost Launch, IONOS WordPress Start, SiteGround GrowBig y Kinsta Single 35k como referencia premium.
- Dominio recomendado sujeto a disponibilidad: `dredgarehernandez.com`; como protección de marca se sugiere adquirir también la variante equivalente en `.com.mx` o `.mx` y redirigirla.
- Referencia comercial externa: Doctoralia publica planes desde MXN 1,740 mensuales más IVA facturados anualmente; DoctorWeb publica planes desde MXN 3,500 mensuales más importe inicial. Estas soluciones incluyen funciones diferentes y no sustituyen de forma exacta al sitio propio.
- No se cobra mensualidad; las actualizaciones menores de información se atienden sin SLA y según disponibilidad.
- La propuesta no tiene fecha de vencimiento definida.

## 6. Diseño

### Paleta

| Token | Hex | Uso |
|---|---|---|
| primary | `#344729` | encabezados, navegación, fondos oscuros |
| secondary | `#4A5942` | enlaces, iconos y elementos secundarios |
| accent | `#7C2804` | CTA y acentos terracota |
| gold | `#C8B070` | detalles premium y decoración |
| background | `#FFFFFF` | fondo principal |
| surface | `#F7F7F7` | cards y secciones alternas |
| text | `#243126` | texto general |
| text-muted | `#5F6B5A` | subtítulos |
| whatsapp | `#25D366` | acciones de WhatsApp |

### Tipografía

- Headings: pila del sistema `ui-sans-serif`, `system-ui`, `Segoe UI`, `sans-serif`.
- Body: misma pila del sistema para evitar dependencia externa de Google Fonts.
- Hero/display: `Georgia`, `Times New Roman`, `serif` como fallback premium sin descarga remota.
- En la rama 1.6.0 no se cargan Google Fonts para reducir bloqueo de render, CLS y recursos de terceros.

### Identidad integrada

Nombre y especialidad autorizados:

- Dr. Edgar E. Hernández.
- Nefrología.

`med-landing-dev/graficos/` contiene 13 PNG originales:

- 4 logos horizontales: negativo, premium, terracota y verde.
- 4 isotipos: negativo, premium, terracota y verde.
- 4 logos principales: negativo, premium, terracota y verde.
- 1 logo vertical premium.

Los originales permanecen intactos. Se generaron cuatro derivados PNG transparentes y optimizados en `assets/images/brand/` para header, footer, móvil/favicon y composiciones. El logo incluido funciona como fallback y puede reemplazarse mediante el logo personalizado de WordPress. Mientras no exista retrato profesional, Hero y About utilizan una composición de marca sin representar a una persona ficticia.

### Ubicaciones confirmadas

- Xalapa: Torre Hakim, Local 909.
- Google Maps Xalapa: `https://maps.app.goo.gl/JJZw4PL8UMG7SBa17`.
- Coordenadas Xalapa: `19.5415954, -96.9308932`.
- Boca del Río: Hospital MediMAC, Consultorio 37, Avenida Calzada Juan Pablo II, Plaza Urban Center.
- Google Maps Boca del Río: `https://maps.app.goo.gl/T3aZ7gXx3MWDn3e98`.
- Coordenadas Boca del Río: `19.1606901, -96.1189766`.
- Los mapas se muestran mediante Google Maps Embed oficial, con carga diferida y sin API key.
- Direcciones y URLs pueden reemplazarse desde el Customizer.

## 7. Repositorio y Sistema Destino

### Estado vigente del repositorio

- El repositorio contiene únicamente el tema y documentación del proyecto.
- Fuente de verdad del código: `med-landing-dev/`.
- El repositorio sí utiliza Git y tiene remoto en GitHub.
- No se incluyen WordPress core, base de datos, uploads, plugins ni configuración de hosting.
- El tema se instalará en un sistema que ya tiene WordPress.
- Ruta esperada en el sistema destino: `wp-content/themes/med-landing-dev/`.
- La versión de WordPress y PHP, el uso de Multisite, los plugins activos y el método de despliegue todavía deben confirmarse.

### Referencia histórica de LocalWP

La auditoría del 2026-06-07 se realizó sobre una instalación original separada:

- Workspace anterior: `C:\Users\asael\Local Sites\medical-landing`.
- Dominio anterior: `http://medical-landing.local`.
- Ruta histórica antes del cambio de nombre: `app/public/wp-content/themes/developer-developer/`.
- WordPress observado: 7.0, locale `es_MX`.
- PHP observado: 8.2.29.
- MySQL observado: 8.4.
- Multisite observado: activo, tipo subdominio y con un sitio registrado.

Estos valores describen exclusivamente aquel entorno auditado. No deben utilizarse como datos confirmados del WordPress destino.

### Validación LocalWP vigente

- El tema fuente 1.4.0 se sincronizó de forma no destructiva con `C:\Users\asael\Local Sites\medical-landing\app\public\wp-content\themes\med-landing-dev`.
- `http://medical-landing.local` carga el tema y sus assets con versión 1.4.0.
- El tema fuente local del repositorio quedó en versión 1.5.2 el 2026-07-06 y se sincronizó de forma no destructiva con LocalWP en `C:\Users\asael\Local Sites\medical-landing\app\public\wp-content\themes\med-landing-dev`.
- Polylang 3.8.4 está instalado y activado únicamente en LocalWP.
- Español `es_MX` es el idioma principal e inglés `en_US` el secundario.
- Se crearon y relacionaron las páginas inglesas de Inicio, Doctor, Servicios, Contacto, Xalapa y Boca del Río.
- Los menús principal y footer tienen variantes relacionadas en español e inglés.
- Los permalinks locales usan `/%postname%/`.
- RankMath y Fluent Forms siguen pendientes.
- El número temporal histórico `522281565985` quedó obsoleto. El tema 1.5.0 usa `229 446 6698` y WhatsApp normalizado `522294466698`; si encuentra el número temporal en theme mods, lo reemplaza durante la migración interna.
- `http://medical-landing.local/` sirve `style.css?ver=1.5.2` después de la sincronización.
- `http://medical-landing.local/servicios/` contiene los 17 elementos del catálogo: 12 enfermedades, 2 terapias y 3 procedimientos.

### Staging VPS vigente

- VPS auditado el 2026-07-06: Debian GNU/Linux 12, Docker 29.1.5, Docker Compose plugin v5.0.1, Nginx y Certbot instalados.
- Sistemas existentes detectados y no modificados: `pos-texano-frontend` en puerto 3001 y `pos-texano-backend` en puerto 8001. También existe una pila histórica `Comercializadora` detenida.
- Configuración Nginx existente detectada originalmente: `/etc/nginx/sites-enabled/orza.mx` y `/etc/nginx/sites-enabled/default`; no se modificaron esos archivos ni los proyectos existentes.
- Dominio final preparado en Nginx: archivo `/etc/nginx/sites-available/nefrologoedgar.com.mx` y symlink `/etc/nginx/sites-enabled/nefrologoedgar.com.mx`.
- `https://nefrologoedgar.com.mx` es el dominio canónico y hace proxy a `http://127.0.0.1:8081`; `www.nefrologoedgar.com.mx` y HTTP redirigen con `301` a `https://nefrologoedgar.com.mx`.
- Certificado Let’s Encrypt activo para `nefrologoedgar.com.mx` y `www.nefrologoedgar.com.mx`, con vencimiento observado el 2026-10-07 03:26:51 UTC.
- Nueva pila WordPress aislada: `/opt/med-landing-dev/`.
- Repositorio clonado: `/opt/med-landing-dev/repo`.
- Tema montado en el contenedor: `/opt/med-landing-dev/repo/med-landing-dev` hacia `/var/www/html/wp-content/themes/med-landing-dev`.
- Servicios Docker: `med-landing-wordpress` con imagen `wordpress:php8.2-apache`, `med-landing-db` con imagen `mariadb:11.4` y servicio auxiliar `wpcli`.
- Volúmenes persistentes: `med_landing_dev_med_landing_wp_data` y `med_landing_dev_med_landing_db_data`.
- URL interna/temporal de diagnóstico: `http://74.208.222.71:8081`.
- URL WordPress vigente: `home` y `siteurl` configurados como `https://nefrologoedgar.com.mx`.
- UFW permite `8081/tcp` y el puerto ya responde públicamente después de abrirlo también en el firewall/panel del proveedor.
- WordPress instalado, tema `med-landing-dev` activo en producción en versión 1.5.7, permalinks `/%postname%/` y `blog_public=1`.
- Plugins instalados y activados en staging/producción: Polylang 3.8.5, Rank Math SEO 1.0.273, Fluent Forms 6.2.5 y Site Kit by Google 1.182.0.
- Polylang tiene idiomas `es` y `en`; el contenido sembrado quedó marcado en español.
- Home responde públicamente en `https://nefrologoedgar.com.mx`; Nginx redirige `http://nefrologoedgar.com.mx`, `http://www.nefrologoedgar.com.mx` y `https://www.nefrologoedgar.com.mx` al dominio canónico HTTPS. El acceso directo `:8081` queda como diagnóstico temporal y puede redirigir al dominio configurado.
- Credenciales y comandos del despliegue están guardados solo en el servidor, en `/opt/med-landing-dev/DEPLOYMENT.md` con permisos `600`. No copiar contraseñas a la documentación del repositorio.
- Pendientes VPS: cerrar o restringir `8081` cuando ya no sea diagnóstico público, rotar la contraseña root compartida durante la instalación, reemplazar acceso root por usuario/SSH key de despliegue, conectar Site Kit con una cuenta Google y configurar Google Analytics/Search Console.

## 8. Build y Dependencias

### package.json

- `npm run dev`: Tailwind watch directo a `style.css`.
- `npm run build`: genera `assets/css/tailwind-output.css` minificado y después compone `style.css` con el header de WordPress.
- Dependencia declarada: `@tailwindcss/cli ^4.1.0`.
- Versión usada por el build verificado: TailwindCSS 4.3.0.

### Carga frontend actual

- Rama estable 1.5.7: todavía usa Google Fonts, Alpine.js y GSAP/ScrollTrigger desde CDN.
- Rama de optimización 1.6.1 (`codex/pagespeed-100`): elimina Google Fonts y CDN frontend; usa fuentes del sistema, `assets/js/navigation.js` nativo, no encola animaciones por defecto y sirve logos/retrato en WebP optimizado.
- Scripts propios:
  - `assets/js/navigation.js`: menú móvil, focus trap, Escape, header scroll y CTA flotante sin dependencias.
  - `assets/js/animations.js`: animación opcional ligera con IntersectionObserver, no encolada en la rama 1.6.0 para priorizar PageSpeed.

### Tamaños medidos

- `style.css`: 40,178 bytes sin comprimir.
- `style.css`: aproximadamente 7,313 bytes con gzip.
- JS propio combinado: 5,277 bytes.
- Las librerías remotas no están incluidas en esa medición.
- El objetivo documental de CSS menor a 30 KB no se cumple en tamaño bruto, aunque sí holgadamente comprimido.

### Comandos

```powershell
cd "C:\Users\asael\OneDrive\Documents\medical-landing\med-landing-dev"
cmd /c npm run dev
cmd /c npm run build
```

PowerShell bloquea `npm.ps1` por la política de ejecución actual; usar `cmd /c npm ...`.

## 9. Arquitectura del Tema

### Entrada y configuración

- `functions.php`: constantes y carga modular.
- `inc/setup.php`: soportes, menús y setup automático.
- `inc/enqueue.php`: estilos, limpieza de assets frontend de WordPress, preload de imagen LCP y scripts propios.
- `inc/customizer.php`: nombre, clínica, teléfono, WhatsApp normalizado, mensaje inicial de WhatsApp, email, descripción, direcciones, redes e ID de Fluent Forms.
- `inc/custom-post-types.php`: CPT `servicio`.
- `inc/schema-markup.php`: JSON-LD para médico, organización y dos sedes.
- `inc/helpers.php`: URLs de contacto, rutas conscientes del idioma, datos de marca, sedes y registro de cadenas Polylang.

### Templates

- `front-page.php`: home.
- `page-about.php`: Sobre el Doctor.
- `page-services.php`: listado de servicios.
- `single-servicio.php`: detalle de servicio.
- `page-contact.php`: formulario y contacto.
- `page-location.php`: Xalapa o Boca del Río según slug.
- `index.php`: fallback.
- `404.php`: página de error.

### Componentes

- Navegación desktop y móvil.
- Footer.
- Hero.
- Grid de servicios.
- Preview del médico.
- Respaldo profesional.
- Ubicaciones.
- CTA de sección.
- CTA flotante y barra fija móvil.
- Card reutilizable de servicio.
- Botón único de idioma ES/EN para desktop y móvil.

### JavaScript

- En 1.6.0, menú móvil con JavaScript nativo, gestión de foco, cierre con Escape, bloqueo de scroll y focus trap.
- En 1.6.0, no hay componentes Alpine registrados ni dependencia GSAP cargada en frontend.
- `assets/js/animations.js` queda como utilidad opcional sin dependencia externa, pero no se carga por defecto.

## 10. Estado Histórico del WordPress Auditado

Esta sección conserva los hallazgos de la instalación LocalWP revisada el 2026-06-07. Es una referencia para migrar y completar el proyecto, pero no describe el estado actual del WordPress destino. Todo dato de páginas, plugins, medios, opciones y permalinks debe verificarse nuevamente al tener acceso a ese sistema.

### Tema y setup

- Tema activo observado en el LocalWP histórico: `developer-developer`, nombre anterior del actual `med-landing-dev`.
- Setup automático marcado como completado: `developer_theme_setup_done = 1`.
- Front page configurada a la página `Inicio`, ID 8.
- Menú `Principal`, ID 3, asignado a `primary` y `footer`.
- Seis elementos en el menú.

### Páginas publicadas

| ID | Slug | Template | Estado |
|---|---|---|---|
| 8 | `inicio` | front page de WordPress | publicada, contenido vacío |
| 9 | `sobre-el-doctor` | `page-about.php` | publicada, contenido vacío |
| 10 | `servicios` | `page-services.php` | publicada, contenido vacío |
| 11 | `contacto` | `page-contact.php` | publicada, contenido vacío |
| 12 | `nefrologo-xalapa` | `page-location.php` | publicada, contenido vacío |
| 13 | `nefrologo-veracruz` | `page-location.php` | publicada, contenido vacío |

Contenido por limpiar:

- `Página de ejemplo` sigue publicada.
- `¡Hola mundo!` sigue publicado.
- `Política de privacidad` existe como borrador generado por WordPress; no equivale a un aviso legal aprobado.

### Contenido y medios

- Servicios CPT publicados en la instalación histórica: 0. El tema 1.5.0 siembra 17 servicios SEO al inicializarse.
- Adjuntos/medios: 0.
- Uploads: vacío.
- La instalación histórica no tenía fotografía del médico cargada en medios. El repositorio ahora incluye `graficos/dredgar_profesional.png` y derivados web en `assets/images/doctor/`.
- En la instalación histórica no había logos cargados en WordPress. El tema versionado ahora incluye fallbacks de marca en `assets/images/brand/`.
- Los mapas confirmados todavía no existían en la instalación histórica; el tema actual ya incluye ambos embeds.
- El tema incluye catálogo inglés de UI y servicios; las páginas/content reales en inglés dependen de Polylang y revisión profesional.

### Plugins

En la auditoría histórica no había plugins instalados ni activos. El estado vigente de LocalWP sí incluye Polylang 3.8.4.

Pendientes:

- Polylang.
- RankMath SEO.
- Fluent Forms.
- SVG Support.
- WebP Express.
- LiteSpeed Cache únicamente en producción.

### Customizer

Solo están guardadas las ubicaciones del menú. Siguen vacíos:

- Nombre del doctor.
- Nombre de la clínica.
- Teléfono.
- WhatsApp.
- Email.
- Descripción.
- Dirección Xalapa.
- Dirección Boca del Río.
- Redes sociales.
- Logo personalizado.

### Enlaces permanentes

Configuración observada en el entorno original:

```text
/%year%/%monthnum%/%day%/%postname%/
```

Esa configuración contradice la estrategia SEO de URLs limpias. En el sistema destino se prevé normalmente `/%postname%/`, validando antes la configuración existente, Multisite y el impacto sobre CPT y URLs publicadas.

## 11. Implementado

- Tema activable y modular.
- Build Tailwind funcional.
- Header responsive.
- Menú móvil accesible; en 1.6.0 funciona con JavaScript nativo sin Alpine.
- Footer de cuatro columnas.
- Home compuesta por secciones.
- Plantilla About.
- CPT y templates de Servicios.
- Plantilla Contacto.
- Landings locales para Xalapa y Boca del Río.
- CTAs a contacto, teléfono y WhatsApp.
- Barra CTA móvil.
- Animaciones no críticas retiradas del frontend por defecto en 1.6.0.
- Skip link.
- HTML semántico básico.
- Soporte de logo, miniaturas, title tag y HTML5.
- Menús creados automáticamente.
- Páginas MVP creadas automáticamente.
- Schema base.
- Strings mayormente preparadas con funciones de traducción.
- Botón de idioma accesible integrado: muestra `English` en español y `Español` en inglés.
- Fallback al inicio del idioma solicitado cuando una traducción no existe.
- Aviso administrativo cuando Polylang está inactivo o incompleto.
- Catálogo `en_US` con 139 cadenas traducidas y archivo POT regenerable.
- URLs internas y fallbacks de página conscientes del idioma activo.
- Menú móvil accesible con foco administrado, Escape, `aria-expanded`, `x-cloak` y bloqueo de fondo.
- Soporte de movimiento reducido antes de cualquier animación progresiva.
- Dependencias CDN fijadas a versiones exactas.
- jQuery ya no se desregistra globalmente.
- Formulario provisional no funcional retirado; Fluent Forms se muestra solo con un ID configurado.
- Identidad visual del Dr. Edgar E. Hernández integrada.
- Paleta premium verde, terracota y dorado aplicada globalmente.
- Logos transparentes optimizados para header, móvil, footer y composiciones.
- Logo predeterminado reemplazable desde WordPress y favicon de respaldo.
- Fotografía profesional optimizada en `assets/images/doctor/`, con fallback a composición de marca si falta el derivado.
- Fallbacks centralizados para nombre, especialidad, descripción y assets.
- Schemas publican las dos sedes confirmadas y omiten organización y campos operativos todavía no configurados.
- Enlaces de teléfono y WhatsApp se ocultan cuando faltan sus datos.
- Claims de experiencia, certificaciones, universidades y pacientes retirados.
- Ubicaciones confirmadas integradas en Home, Contacto, footer y landings locales.
- Mapas interactivos de Google con enlaces directos, carga diferida y fallback externo.
- Schema local con `hasMap` y coordenadas geográficas de ambas sedes.
- Polylang configurado en LocalWP con seis pares de páginas ES/EN y menús relacionados.
- WhatsApp temporal histórico configurado exclusivamente en LocalWP mediante theme mods; el tema 1.5.0 lo migra al número definitivo si lo detecta.
- Enlaces universales `wa.me`, normalización de números mexicanos y mensaje inicial configurable.
- Teléfono y WhatsApp definitivos del doctor integrados: `229 446 6698` / `522294466698`.
- Instagram integrado: `https://www.instagram.com/dr.edgarhernandez.nefro/`; visible en footer, schema, Home y Contacto, configurable desde Customizer.
- Céd. Prof. `11751221`, Céd. Esp. `14852016`, certificación CMN `2025-2030` y COFEPRIS `2530092002A00059` publicados con redacción objetiva.
- Formación profesional y membresías integradas en la página Sobre el Doctor.
- Hub de Servicios agrupado por enfermedades del riñón, terapias de reemplazo renal y procedimientos nefrológicos.
- Siembra automática de 17 páginas SEO tipo `servicio`, con contenido informativo, CTA, sedes y aviso de no sustituir consulta médica.
- Home actualizada para mostrar las enfermedades atendidas en grid visible, sin carrusel.
- Página Servicios actualizada con tarjetas de categoría, anclas internas y grids completos; las consultas del CPT filtran por `_developer_service_language` para evitar mezclar páginas inglesas en la vista española.
- Contenido individual de servicios ampliado con sección `Qué es`, usando información general de referencia de NIDDK, MedlinePlus, National Kidney Foundation y American Heart Association.
- Header ajustado para mostrar navegación completa solo en pantallas `2xl`; en laptop/tablet se usa menú móvil para evitar saltos de línea y saturación visual.
- Página Servicios ahora usa navegación compacta tipo pills, no tarjetas grandes como barra superior.
- Home y Servicios renderizan enfermedades/servicios desde el catálogo central del tema, por lo que no se quedan vacíos si LocalWP conserva una base antigua sin posts o sin metas de idioma.
- Migración interna de contenido profesional actualizada a versión `3` para volver a sembrar/actualizar posts administrados por el tema.
- Páginas legales sembradas automáticamente: `aviso-de-privacidad`, `terminos-y-condiciones`, `descargo-de-responsabilidad` y `compromiso-de-etica`. La página histórica `aviso-legal` se conserva como índice para no romper enlaces previos. Todos los textos son borradores pendientes de revisión legal final.
- Schema Physician/MedicalBusiness actualizado con foto, teléfono, sedes, credenciales y `knowsAbout`, evitando horarios no confirmados.
- Texto base de 18 px, interlineado amplio y objetivos táctiles principales de 48 px.
- Barra móvil simplificada a WhatsApp y Agendar; acciones de escritorio con texto visible.
- Propuesta comercial creada en Markdown, DOCX editable y PDF listo para enviar.
- Cotización comercial vigente fijada en MXN 6,000 de honorarios y MXN 7,000 cuando corresponda emitir CFDI.
- Comparativo de seis planes de hosting WordPress: Hostinger Premium, DreamHost Launch, Hostinger Business, IONOS WordPress Start, SiteGround GrowBig y Kinsta Single 35k.

## 12. Pendientes y Riesgos

### P0 - Bloqueadores de publicación

- Revisar clínicamente y aprobar los textos SEO de servicios antes de campaña o inversión en pauta.
- Aprobar la biografía y formación publicadas con la voz final del doctor.
- Confirmar años de experiencia y número de pacientes antes de publicar cifras.
- Obtener email público, email receptor de formularios y mensaje predefinido final si se desea ajustar el actual.
- Obtener horarios y teléfono específico de cada sede si difieren del contacto general.
- Instalar y configurar Fluent Forms.
- Añadir consentimiento de privacidad al formulario.
- Publicar aviso legal, aviso de privacidad y disclaimer médico aprobados.
- Instalar y configurar RankMath.
- Reproducir la configuración de Polylang en el WordPress destino y revisar profesionalmente las traducciones clínicas.

### P1 - Fallos funcionales o de integración

- RankMath podría duplicar schemas si no se divide claramente la responsabilidad.
- Falta configurar el ID real de Fluent Forms y probar recepción, notificaciones, antispam y consentimiento.
- La estructura de permalink del entorno original no correspondía al plan SEO; verificar la del sistema destino.
- El uso de Multisite en el sistema destino todavía no está confirmado y puede afectar URLs, plugins y configuración.

### P2 - Calidad, accesibilidad y rendimiento

- La rama 1.6.0 elimina Google Fonts en favor de fuentes del sistema; validar visualmente antes de fusionar.
- Falta validar con lector de pantalla y realizar una revisión manual completa de contraste en todos los estados.
- Falta prueba cross-browser; la revisión actual cubrió el navegador integrado en móvil, tablet y escritorio.
- Falta Lighthouse/PageSpeed posterior al despliegue de la rama 1.6.0.
- Falta validar schemas.
- Falta probar RankMath, Polylang y Fluent Forms juntos.
- No existe suite de pruebas ni scripts de lint en `package.json`.
- El repositorio usa Git, pero todavía no hay automatización de CI ni pruebas.
- Falta `screenshot.png` del tema.
- Faltan templates específicos de blog, FAQ y testimonios.

## 13. Contenido Pendiente del Médico

Usar `INFORMACION-A-SOLICITAR.md` como cuestionario maestro. Estado mínimo actualizado:

1. Nombre profesional integrado: Dr. Edgar Eduardo Hernández Enríquez.
2. Biografía/formación base integrada; falta aprobación editorial final.
3. Foto profesional integrada; QA visual inicial en staging correcta; falta aprobación visual/editorial final.
4. Cédula general y de Nefrología integradas.
5. Certificación, formación y membresías integradas con redacción cautelosa.
6. Teléfono, WhatsApp e Instagram integrados; falta email público y receptor de formularios.
7. Horarios y teléfono específico de cada consultorio siguen pendientes si difieren del contacto general; direcciones, coordenadas y mapas ya están confirmados.
8. Lista de servicios integrada como base SEO; falta revisión clínica/editorial final.
9. Logos institucionales con autorización de uso siguen pendientes si se quieren mostrar.
10. Aviso de privacidad revisado legalmente sigue pendiente.
11. Términos, disclaimer médico y política de cancelación siguen pendientes.
12. Perfiles de Google Business y redes externas deben confirmarse antes de enlazarse salvo Instagram.

No publicar claims, testimonios, instituciones, cifras ni permisos COFEPRIS sin evidencia del cliente y revisión correspondiente.

## 14. Orden de Trabajo Recomendado

1. Confirmar WordPress, PHP, Multisite, plugins, hosting y método de despliegue del sistema destino.
2. Revisar y aprobar los datos reales del médico ya integrados.
3. Mantener sincronizado el tema 1.5.4 en LocalWP/staging y revisar la fotografía profesional, home, Servicios, páginas legales y páginas individuales antes de cada entrega.
4. Preparar el paso del staging por IP al dominio final con reverse proxy y SSL.
5. Revisar contenido demo y permalinks existentes sin asumir que coinciden con LocalWP.
6. Reproducir Polylang e instalar/configurar RankMath y Fluent Forms.
7. Revisar y ajustar los 17 servicios SEO sembrados por el tema.
8. Completar Customizer o sustituirlo por una capa de datos más robusta.
9. Validar visualmente los mapas reales y su carga diferida en staging.
10. Corregir schemas y coordinación con RankMath.
11. Crear páginas legales y consentimiento de formulario.
12. Completar traducción inglesa.
13. Completar auditoría de accesibilidad con lector de pantalla y formulario real.
14. Auditoría de rendimiento.
15. QA funcional y responsive.
16. Preparar despliegue, LiteSpeed y Cloudflare.

## 15. Criterio de Fase 1 Terminada

- Todos los datos visibles son reales y verificados.
- No quedan placeholders ni contenido demo.
- Home, About, Servicios, Contacto y ambas sedes funcionan.
- Servicios tienen contenido individual.
- Formularios entregan mensajes y respetan privacidad.
- WhatsApp y teléfono funcionan.
- Mapas reales cargan correctamente.
- Polylang sirve ES/EN sin páginas huérfanas.
- RankMath tiene sitemap, canonical, metas y Open Graph.
- Schemas validan sin duplicados.
- Navegación por teclado y móvil validada.
- Lighthouse 90+ o desviaciones documentadas.
- Aviso de privacidad y disclaimer publicados.

## 16. Validaciones Históricas de la Auditoría

Ejecutadas el 2026-06-07 sobre el entorno LocalWP original:

- `cmd /c npm run build`: correcto.
- TailwindCSS reportó versión 4.3.0.
- PHP lint con PHP 8.2.29: 28 archivos correctos.
- Comparación entre tema activo y respaldo `proyecto/`: sin diferencias.
- Base de datos consultada temporalmente y servicio detenido al terminar.
- CSS medido en raw y gzip.
- WordPress, páginas, menú, plugins, medios y theme mods inspeccionados.

No ejecutadas:

- Render visual del sitio.
- Navegación funcional en navegador.
- Form submit.
- Lighthouse.
- Validación de schema.
- QA responsive.

Motivo: LocalWP estaba detenido y el navegador integrado no pudo acceder al dominio local durante la auditoría. Estas limitaciones no informan sobre la disponibilidad del futuro sistema destino.

### Validaciones de identidad visual del 2026-06-08

- `cmd /c npm install`: 27 paquetes instalados, 0 vulnerabilidades reportadas.
- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0.
- Header de WordPress en `style.css`: tema `Dr. Edgar E. Hernández - Nefrología`, versión 1.1.0.
- PHP lint con PHP 8.2.29: 29 archivos correctos.
- Derivados de marca: cuatro PNG con canal alfa, entre 512 px y 1000 px.
- Contraste calculado: verde principal/blanco 10.10:1, verde secundario/blanco 7.50:1, terracota/blanco 9.71:1 y dorado/verde 4.76:1.
- Contraste de WhatsApp: texto oscuro sobre verde 6.39:1 y blanco sobre verde oscuro en hover 5.42:1.
- Búsqueda de claims no verificados: sin referencias activas a años de experiencia, CMNI, UNAM, certificaciones o cifras de pacientes.
- `git diff --check`: sin errores de whitespace.

No se ejecutó render completo en WordPress ni QA responsive real porque el repositorio no contiene una instalación ejecutable. La vista estática temporal también fue bloqueada por la política `file://` del navegador integrado.

### Validaciones UX y multilenguaje del 2026-06-08

- `npm.cmd run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.4.0.
- PHP lint con PHP 8.2.29: 31 archivos correctos.
- Sintaxis JS: `navigation.js`, `animations.js` y `build-css.js` correctos.
- Catálogo inglés: 125 cadenas, archivos POT, PO y MO generados y carga de traducciones verificada.
- LocalWP revisado a 320 × 720, 390 × 844, 768 × 720, 1024 × 768 y 1280 × 720 sin desbordamiento horizontal.
- Menú móvil: apertura, foco inicial, bloqueo de fondo, Escape, cierre y restauración de foco correctos.
- Targets interactivos visibles de móvil: 48 px o más, salvo el skip link oculto antes de recibir foco.
- Contacto muestra estado de configuración y no contiene un formulario ficticio.
- Sin errores JavaScript observados tras la carga final.
- Polylang 3.8.4 validado en ejecución con cambio ES → EN y EN → ES, páginas y menús relacionados.
- WhatsApp temporal validado con `https://wa.me/522281565985` y mensajes codificados por idioma.

### Validaciones integración médica y SEO del 2026-07-06

- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.0.
- `python languages/build_catalog.py`: correcto; catálogo inglés regenerado con 133 traducciones.
- Sintaxis JS: `navigation.js`, `animations.js` y `build-css.js` correctos con `node --check`.
- Fotografía profesional: dos derivados JPG creados en `assets/images/doctor/`, 720 px y 1080 px, sin modificar el original en `graficos/`.
- WhatsApp vigente: `https://wa.me/522294466698` construido desde el teléfono `229 446 6698`.
- Número temporal anterior `522281565985`: permanece solo como referencia histórica/documental y como condición de migración para limpiar bases LocalWP antiguas.
- PHP lint: no ejecutado porque `php.exe` no está disponible en el entorno actual.
- QA visual WordPress, Lighthouse, lector de pantalla y validación externa de schema quedan pendientes para LocalWP/staging.

### Validaciones ajuste UX/Servicios del 2026-07-06

- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.1.
- `python languages/build_catalog.py`: correcto; catálogo inglés regenerado con 139 traducciones.
- Sintaxis JS: `navigation.js`, `animations.js` y `build-css.js` correctos con `node --check`.
- LocalWP no respondió en `http://medical-landing.local/` (`ERR_CONNECTION_REFUSED`), por lo que la revisión visual responsive queda pendiente.
- PHP lint no ejecutado porque `php.exe` no está disponible en el entorno actual.

### Validaciones ajuste responsive de navegación y fallback del 2026-07-06

- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.2.
- `python languages/build_catalog.py`: correcto; catálogo inglés regenerado con 139 traducciones.
- Sintaxis JS: `navigation.js`, `animations.js` y `build-css.js` correctos con `node --check`.
- Verificación de encoding: `style.css` y `build-css.js` sin caracteres `U+FFFD`; `Hernández` conserva `á` como `U+00E1`.
- Catálogo central verificado: 12 enfermedades, 2 terapias y 3 procedimientos.
- Página de referencia analizada: `nefrologoenveracruz.com.mx` usa listados amplios de enfermedades/servicios, CTAs visibles y enlaces locales; se tomó como referencia de estructura, no de copia visual.
- LocalWP validado por HTTP tras sincronizar carpeta: Home contiene `Enfermedades que atiende`, `Enfermedad renal crónica` y `Enfermedad renal en embarazo`; Servicios contiene los 17 términos esperados y no muestra el mensaje de catálogo vacío.

### Validaciones staging VPS del 2026-07-06

- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.2.
- PHP lint ejecutado dentro del contenedor `med-landing-wordpress`: todos los archivos PHP del tema sin errores de sintaxis.
- Docker Compose validado y servicios activos: `med-landing-wordpress` y `med-landing-db` saludable.
- WordPress instalado con tema activo `Dr. Edgar E. Hernández - Nefrología`, versión 1.5.2.
- Polylang, Rank Math SEO y Fluent Forms instalados en staging.
- Se corrigieron BOM UTF-8 al inicio de 13 archivos PHP; el problema provocaba `headers already sent` y rompía la portada al activar Polylang.
- Home responde dentro del VPS al seguir redirecciones de idioma; `/servicios/` responde `200` y contiene 17 cards de servicios.
- `style.css` sirve con header de WordPress y versión 1.5.2.
- Prueba externa a `http://74.208.222.71:8081/` desde la máquina local el 2026-07-08: correcta, status `200`, Home contiene contenido renal y `/servicios/` contiene 17 cards.

### Validaciones visuales staging VPS del 2026-07-08

- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.3.
- `node --check med-landing-dev\assets\js\animations.js`: correcto.
- `python med-landing-dev\languages\build_catalog.py`: correcto; catálogo inglés regenerado con 139 traducciones.
- Verificación de BOM: archivos PHP, JS, CSS, JSON, PO/MO y Markdown revisados sin BOM inicial.
- PHP lint ejecutado dentro del contenedor `med-landing-wordpress`: todos los archivos PHP del tema sin errores de sintaxis.
- Staging actualizado desde GitHub al commit `8afc6eb10cbbf918dcc710c8f706c978ba892671` y contenedor `med-landing-wordpress` reiniciado.
- Home pública status `200`, sirve `style.css?ver=1.5.3`, contiene el menú fallback visible y muestra las tarjetas de enfermedades atendidas.
- `/servicios/` mantiene las 17 tarjetas del catálogo.
- Captura desktop verificada visualmente: navegación visible, CTA terracota, selector de idioma visible, fondos de marca y tarjetas sin huecos blancos.
- Captura móvil real con Puppeteer a 390 px: `innerWidth=390`, `scrollWidth=390`, menú y botón de idioma presentes, sin desbordamiento horizontal.

### Validaciones locales legal/UI del 2026-07-08

- `python med-landing-dev\languages\build_catalog.py`: correcto; catálogo inglés regenerado con 140 traducciones.
- `cmd /c npm run build`: correcto con TailwindCSS 4.3.0 y header WordPress versión 1.5.4.
- `node --check med-landing-dev\build-css.js`: correcto.
- Verificación de BOM: archivos PHP, JS, CSS, JSON, Python, PO/POT y Markdown revisados sin BOM inicial.
- Revisión estática: existen helpers para catálogo legal, URLs legales con fallback Polylang, cuatro páginas legales sembradas, página histórica `aviso-legal` como índice, footer legal completo y tarjetas `service-disease-card` con iconos SVG.

### Validaciones staging VPS legal/UI del 2026-07-08

- VPS actualizado desde GitHub al commit `01cf6792ddf4d1cabf7bbbbecf39ecdc6547a264` y contenedor `med-landing-wordpress` reiniciado.
- PHP lint ejecutado dentro del contenedor `med-landing-wordpress`: todos los archivos PHP del tema sin errores de sintaxis.
- Home pública status `200`, sirve `style.css?ver=1.5.4`, contiene el bloque legal del footer, la sección de enfermedades y 12 tarjetas con iconos SVG.
- Páginas públicas status `200`: `/aviso-de-privacidad/`, `/terminos-y-condiciones/`, `/descargo-de-responsabilidad/`, `/compromiso-de-etica/` y `/aviso-legal/`.
- Responsive verificado con Puppeteer en 320, 390, 768, 1024 y 1280 px: `scrollWidth` igual a `innerWidth`, sin desbordamiento horizontal; 4 enlaces legales, 12 tarjetas y 12 iconos presentes.
- Capturas revisadas: tarjetas móviles con icono, microetiqueta, texto y CTA; página legal con `.prose`, encabezados, nota de revisión y teléfono confirmado.

### Validaciones dominio VPS del 2026-07-08

- Nginx validó correctamente antes y después de crear `/etc/nginx/sites-available/nefrologoedgar.com.mx`.
- `systemctl reload nginx` se ejecutó solo después de `nginx -t` exitoso.
- WordPress quedó inicialmente con `home` y `siteurl` en `http://nefrologoedgar.com.mx` para preparar DNS.
- `curl -I -H "Host: nefrologoedgar.com.mx" http://127.0.0.1`: `200 OK`.
- `curl -I -H "Host: www.nefrologoedgar.com.mx" http://127.0.0.1`: `301 Moved Permanently` hacia `http://nefrologoedgar.com.mx/`.
- `curl -I -H "Host: nefrologoedgar.com.mx" http://74.208.222.71`: `200 OK`.
- `curl -I -H "Host: www.nefrologoedgar.com.mx" http://74.208.222.71`: `301 Moved Permanently` hacia `http://nefrologoedgar.com.mx/`.
- UFW sigue activo con `80`, `443` y `8081` permitidos; no se cerraron puertos ni se tocaron reglas de proyectos existentes.
- Contenedores activos tras el cambio: `med-landing-wordpress`, `med-landing-db`, `pos-texano-frontend` y `pos-texano-backend`.

### Validaciones HTTPS dominio VPS del 2026-07-08

- DNS autoritativo NEUBOX confirmado: `nefrologoedgar.com.mx` y `www.nefrologoedgar.com.mx` apuntan a `74.208.222.71` en `ns301` a `ns305.cloud-mx-ns.net`.
- Certbot emitió certificado ECDSA para `nefrologoedgar.com.mx` y `www.nefrologoedgar.com.mx`; archivos en `/etc/letsencrypt/live/nefrologoedgar.com.mx/`.
- Certificado vigente hasta el 2026-10-07 03:26:51 UTC.
- WordPress actualizado a `home` y `siteurl` `https://nefrologoedgar.com.mx`.
- Se ajustó la redirección `www` para evitar saltos por HTTP: `https://www.nefrologoedgar.com.mx`, `http://nefrologoedgar.com.mx` y `http://www.nefrologoedgar.com.mx` redirigen a `https://nefrologoedgar.com.mx`.
- Pruebas públicas: `https://nefrologoedgar.com.mx` responde `200 OK`; las variantes `www` y HTTP responden `301` al canónico HTTPS.
- `certbot renew --dry-run --cert-name nefrologoedgar.com.mx --no-random-sleep-on-renew`: exitoso.
- Nota operativa: los resolvers internos del VPS de IONOS tardaron más en resolver el dominio y llegaron a devolver `SERVFAIL`; las validaciones públicas y autoritativas fueron correctas.

### Validaciones SEO/Google del 2026-07-08

- Se corrigió `blogname` y `blogdescription` en UTF-8 real: `Dr. Edgar E. Hernández - Nefrología` y descripción con acentos correctos.
- `blog_public` quedó en `1`; WordPress ya no solicita desindexación.
- Tema 1.5.7 agrega `inc/seo.php` con fallback de título, meta description, Open Graph, Twitter Card, filtro de robots y sitemap en `robots.txt` mientras Rank Math no complete su asistente.
- Site Kit by Google 1.182.0 quedó instalado y activado; falta vincularlo en wp-admin con cuenta Google para Analytics, Search Console y estadísticas.
- Rank Math quedó activo con módulos esenciales: `link-counter`, `seo-analysis`, `sitemap`, `rich-snippet`, `404-monitor`, `redirections` y `local-seo`.
- `https://nefrologoedgar.com.mx` muestra título con `Hernández` y `Nefrología` sin signos `?`.
- `robots.txt` permite rastreo y anuncia `https://nefrologoedgar.com.mx/wp-sitemap.xml`.
- `https://nefrologoedgar.com.mx/wp-sitemap.xml` responde `200 OK`; `/sitemap_index.xml` sigue sin usarse porque Rank Math no engancha su sitemap hasta completar configuración en admin.

## 17. Plantilla de Bitácora

Copiar esta estructura al final:

```markdown
### AAAA-MM-DD - Título corto

- Objetivo:
- Archivos modificados:
- Cambios:
- Decisiones:
- Validación:
- Pendientes:
```

## 18. Bitácora Acumulativa

### 2026-05-27 - Definición inicial

- Objetivo: definir alcance, stack y arquitectura.
- Cambios: se creó el plan general, documentación base y tema custom.
- Decisiones: Nefrología, Xalapa/Veracruz, ES/EN, Polylang, trabajo por fases, formulario más WhatsApp.
- Resultado: estructura del MVP implementada con contenido placeholder.
- Pendientes: contenido real, plugins, configuración y QA.

### 2026-06-07 - Auditoría integral y contexto maestro

- Objetivo: reconstruir el panorama completo desde documentación, código, base de datos y conversaciones.
- Archivos modificados: `AGENTS.md`, `CLAUDE.md`, `CONTEXTO-PROYECTO.md`.
- Cambios: se creó esta fuente viva de contexto y se añadió la obligación de leerla y mantener su bitácora.
- Decisiones: el tema activo es la única fuente de verdad; `proyecto/` y `proyecto.zip` son respaldos.
- Validación: build Tailwind correcto, 28 archivos PHP sin errores de sintaxis, base y configuración inspeccionadas.
- Hallazgos: tema activo pero sin plugins, servicios, medios ni datos reales; mapas y formulario aún no funcionales; permalink incompatible con el plan SEO.
- Pendientes: atender los bloques P0, P1 y P2 descritos arriba.

### 2026-06-08 - Aclaración del alcance del repositorio

- Objetivo: eliminar confusiones entre el repositorio de GitHub, la instalación LocalWP original y el WordPress donde se desplegará.
- Archivos modificados: `AGENTS.md`, `CLAUDE.md`, `Plan.md`, `CONTEXTO-PROYECTO.md`.
- Cambios: se definió que el repositorio contiene únicamente el tema y documentación; la carpeta entonces llamada `developer-developer/` quedó establecida como fuente de verdad; los datos de LocalWP y su base se marcaron como históricos.
- Decisiones: el tema se instalará en un WordPress existente y WordPress core, base de datos, uploads, plugins y configuración del servidor quedan fuera del repositorio.
- Validación: se revisaron las referencias a rutas, Git, LocalWP, respaldos y despliegue en todos los documentos Markdown.
- Pendientes: confirmar versión de WordPress y PHP, Multisite, plugins activos, hosting y método de despliegue del sistema destino antes de la integración.

### 2026-06-08 - Integración de identidad visual

- Objetivo: integrar la identidad del Dr. Edgar E. Hernández y retirar datos profesionales no verificados.
- Archivos modificados: tema entonces llamado `developer-developer/`, `.gitignore` y todos los documentos Markdown del repositorio.
- Cambios: nueva paleta premium, derivados transparentes, logos en header/móvil/footer, favicon fallback, composición visual temporal, helpers de marca y limpieza de claims, horarios, direcciones y servicios demo.
- Decisiones: los originales de `graficos/` permanecen intactos; el logo personalizado de WordPress reemplaza el fallback; no se muestra una persona ficticia como retrato.
- Validación: build Tailwind correcto, 29 archivos PHP sin errores, assets con alfa verificado, contrastes principales y de WhatsApp WCAG AA, documentación sincronizada y búsqueda de claims limpia.
- Pendientes: validar el render dentro del WordPress destino, agregar fotografía profesional, datos de contacto, sedes, servicios revisados y coordinar schemas con RankMath.

### 2026-06-08 - Regla permanente de sincronización documental

- Objetivo: garantizar que el proyecto pueda retomarse correctamente desde cualquier chat nuevo.
- Archivos modificados: `AGENTS.md`, `CLAUDE.md` y `CONTEXTO-PROYECTO.md`.
- Cambios: se estableció que todo cambio en código, assets, configuración o documentación debe incluir la actualización de los Markdown afectados y de la bitácora.
- Decisiones: ningún trabajo se considera terminado si la documentación viva quedó desactualizada.
- Validación: `AGENTS.md` y `CLAUDE.md` conservan instrucciones idénticas.
- Pendientes: aplicar esta regla en todos los trabajos futuros.

### 2026-06-08 - Cambio de nombre del tema

- Objetivo: cambiar el slug y la carpeta del proyecto de `developer-developer` a `med-landing-dev`.
- Archivos modificados: carpeta completa del tema, archivos PHP con traducciones, `style.css`, `build-css.js`, paquetes npm y todos los documentos Markdown.
- Cambios: la fuente de verdad ahora es `med-landing-dev/`, la ruta de instalación es `wp-content/themes/med-landing-dev/`, el paquete npm y el text domain usan `med-landing-dev`.
- Decisiones: se conservaron los prefijos PHP internos `developer_` y las constantes `DEVELOPER_*` para evitar una refactorización sin beneficio funcional.
- Validación: build Tailwind correcto, 29 archivos PHP sin errores, `style.css` con text domain `med-landing-dev` y ZIP instalable validado con 58 entradas.
- Pendientes: al actualizar una instalación donde el tema anterior ya estaba activo, instalar y activar `med-landing-dev` como un tema distinto y revisar sus opciones.

### 2026-06-08 - Integración de ubicaciones y Google Maps

- Objetivo: publicar las ubicaciones confirmadas de Xalapa y Boca del Río en todo el sitio.
- Archivos modificados: helpers, Customizer, schema, setup, páginas de ubicación y contacto, secciones Home, footer, componente de mapa y todos los documentos Markdown afectados.
- Cambios: se integraron Torre Hakim Local 909 y Hospital MediMAC Consultorio 37, sus enlaces directos, embeds interactivos, coordenadas, etiquetas de navegación y datos estructurados.
- Decisiones: se utiliza Google Maps Embed oficial con lazy loading, sin API key; el slug histórico `/nefrologo-veracruz/` se conserva para evitar romper enlaces.
- Validación: build Tailwind correcto, 30 archivos PHP sin errores, textos anteriores retirados, embeds y coordenadas presentes, tema actualizado a la versión 1.2.0 y ZIP validado con 59 entradas.
- Pendientes: instalar el ZIP actualizado en LocalWP o sustituir su carpeta del tema; la copia actualmente instalada todavía corresponde al build anterior. Confirmar horarios, teléfonos específicos, códigos postales y detalles postales adicionales de ambas sedes.

### 2026-06-08 - Propuesta comercial y ajuste de costos

- Objetivo: crear la propuesta formal del proyecto sin mostrar cálculos internos de utilidad y con el honorario acordado para el cliente.
- Archivos modificados: `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.md`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.docx`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.pdf`, `docs/build_propuesta.py`, `docs/build_propuesta_pdf.py` y `CONTEXTO-PROYECTO.md`.
- Cambios: se documentaron alcance bilingüe de Fases 1 y 2, plazo de 8 a 10 semanas, inversión, pagos 50/50, nota fiscal, actualizaciones menores, exclusiones y tres opciones de infraestructura.
- Decisiones: honorario base MXN 8,000; IVA de referencia MXN 1,280 cuando corresponda CFDI; total con factura MXN 9,280; dominio, hosting, correo y licencias se pagan directamente por el cliente; la propuesta no tiene vencimiento definido.
- Validación: Markdown, DOCX y PDF contienen MXN 8,000, MXN 1,280, MXN 9,280, pagos de MXN 4,000 y MXN 4,640, sin importes anteriores ni cálculos internos. El PDF se revisó visualmente completo en seis páginas. El DOCX pasó auditoría sin hallazgos de accesibilidad de severidad alta.
- Pendientes: sustituir `[NOMBRE DEL PRESTADOR]`, `[RFC]`, `[TELÉFONO]` y `[CORREO]`; confirmar el cálculo fiscal definitivo con el contador antes de emitir CFDI; volver a revisar el DOCX en Microsoft Word o LibreOffice cuando haya un motor de Office disponible.

### 2026-06-08 - Auditoría UX y soporte multilenguaje

- Objetivo: mejorar la experiencia responsive y accesible, preparar el cambio ES/EN y ejecutar lo que no requiere información clínica adicional.
- Archivos modificados: tema `med-landing-dev/`, `AUDITORIA-UX-Y-MULTILENGUAJE.md`, `Plan.md` y `CONTEXTO-PROYECTO.md`.
- Cambios: selector Polylang accesible, helpers de idioma, catálogo inglés, navegación móvil con gestión de foco, soporte de movimiento reducido, targets de 44 px, dependencias fijadas, formulario provisional retirado y compatibilidad de jQuery conservada.
- Decisiones: usar Polylang en lugar de traducción automática de Google para mantener control editorial, precisión médica y SEO por idioma; ocultar el selector hasta tener ES y EN configurados.
- Validación: build correcto, 31 archivos PHP sin errores, sintaxis JS correcta, 121 traducciones generadas y QA real en LocalWP a 390, 1024 y 1280 px sin errores JavaScript ni desbordamiento.
- Pendientes: instalar y configurar Polylang, RankMath y Fluent Forms con acceso administrativo; relacionar páginas ES/EN; revisar traducción clínica; ejecutar lector de pantalla, Lighthouse, schema y cross-browser.

### 2026-06-08 - Botón de idioma, WhatsApp temporal y accesibilidad ampliada

- Objetivo: hacer visible y sencillo el cambio de idioma, habilitar WhatsApp de prueba sin contaminar el tema distribuible y mejorar la legibilidad para adultos mayores.
- Archivos modificados: tema `med-landing-dev/`, `Plan.md`, `AUDITORIA-UX-Y-MULTILENGUAJE.md`, `INFORMACION-A-SOLICITAR.md` y `CONTEXTO-PROYECTO.md`.
- Cambios: botón único `English`/`Español`, fallback de idioma, aviso administrativo de Polylang, normalización mexicana de WhatsApp, mensaje configurable, CTAs con texto, base tipográfica de 18 px y objetivos táctiles de 48 px.
- Configuración local: Polylang 3.8.4 activo con ES/EN, seis pares de páginas y menús relacionados; WhatsApp temporal `522281565985` guardado solo en la base de LocalWP.
- Decisiones: no usar Google Translate; no fijar el número personal en código ni incluir plugins o base de datos en el ZIP; las traducciones clínicas inglesas siguen siendo provisionales.
- Validación: build Tailwind correcto, header 1.4.0, 31 PHP sin errores, sintaxis JS correcta, 125 traducciones, cambio bidireccional de idioma, menú por teclado, breakpoints 320/390/768/1024/1280 sin overflow y URL `wa.me` codificada correctamente.
- Pendientes: configurar el número definitivo, revisar profesionalmente el inglés clínico, instalar RankMath y Fluent Forms, probar lector de pantalla, Lighthouse, schemas y otros navegadores.

### 2026-06-08 - Comparativo ampliado de hosting WordPress

- Objetivo: actualizar la propuesta comercial con opciones comparables para alojar un solo sitio WordPress, conservando los costos y fechas editados por el usuario.
- Archivos modificados: Google Doc de la propuesta, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.md`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.docx`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.pdf`, `docs/build_propuesta.py`, `docs/build_propuesta_pdf.py` y `CONTEXTO-PROYECTO.md`.
- Cambios: la sección 7 compara Hostinger Premium, DreamHost Launch, Hostinger Business, IONOS WordPress Start, SiteGround GrowBig y Kinsta Single 35k; muestra pago inicial, promedio anual promocional, renovación, características, recomendaciones y dominios. La sección 11 contiene fuentes oficiales y referencias de Google Search y SAT.
- Decisiones: Hostinger Business permanece como recomendación general; `.com` es el dominio principal sugerido y `.com.mx` es opcional para protección de marca; ningún proveedor se presenta como garantía de posicionamiento SEO.
- Estado comercial preservado: honorario MXN 6,000, total indicado con CFDI MXN 7,000, pagos de MXN 3,000 o MXN 3,500 y plazo de 4 a 6 semanas.
- Validación: promedios anuales recalculados, Google Docs y Markdown sincronizados, DOCX y PDF exportados en ocho páginas y tabla completa sin pérdida de filas.
- Pendientes: confirmar precios, impuestos, tipo de cambio y promociones con el proveedor inmediatamente antes de contratar; validar el tratamiento fiscal definitivo con el contador.

### 2026-06-08 - Referencia de mercado y propuestas de dominio

- Objetivo: reforzar la propuesta comercial con precios publicados de plataformas médicas y nombres de dominio fáciles de recordar.
- Archivos modificados: Google Doc de la propuesta, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.md`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.docx`, `docs/PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.pdf`, `docs/build_propuesta.py`, `docs/build_propuesta_pdf.py` y `CONTEXTO-PROYECTO.md`.
- Cambios: se añadieron referencias de Doctoralia Starter, Plus y VIP, DoctorWeb Plan Google Despegue, una explicación del valor del sitio propio y seis propuestas de dominio.
- Decisiones: `dredgarehernandez.com` es la primera recomendación por coincidencia con la marca; una variante `.com.mx` o `.mx` puede proteger la marca y redirigir al dominio principal. Las comparaciones aclaran que Doctoralia y DoctorWeb incluyen servicios distintos.
- Validación: cálculos anuales revisados a partir de precios oficiales publicados el 8 de junio de 2026; Google Docs, Markdown, DOCX y PDF sincronizados; PDF final revisado visualmente en diez páginas, con la sección de mercado en una página propia y sin filas cortadas, solapamientos ni desbordamientos; auditoría DOCX con cero hallazgos altos o medios y cuatro avisos bajos por URLs visibles en la lista de fuentes. La disponibilidad de dominios sigue pendiente de confirmación en el registrador al momento de compra.
- Pendientes: confirmar el dominio elegido y su disponibilidad antes de contratar; volver a consultar precios de plataformas si la propuesta se envía después de una actualización comercial.

### 2026-07-06 - Integración de información médica y SEO

- Objetivo: integrar la información profesional nueva del Dr. Edgar Eduardo Hernández Enríquez, usar la fotografía real, actualizar contacto, publicar credenciales con cautela y crear páginas SEO individuales.
- Archivos modificados: `med-landing-dev/` en helpers, Customizer, setup, schema, templates, traducciones, assets de doctor y build; `AGENTS.md`, `CLAUDE.md`, `Plan.md`, `INFORMACION-A-SOLICITAR.md`, `AUDITORIA-UX-Y-MULTILENGUAJE.md` y `CONTEXTO-PROYECTO.md`.
- Cambios: tema actualizado a 1.5.0; teléfono/WhatsApp `229 446 6698` y `522294466698`; Instagram integrado; foto profesional optimizada; página About reescrita; trust/footer/contacto/schema actualizados; página `aviso-legal` sembrada; hub de servicios y 17 páginas SEO tipo `servicio` creadas desde catálogo centralizado.
- Decisiones: mantener el logo visual como `Dr. Edgar E. Hernández` cuando venga de marca, pero usar el nombre público completo en contenido y schema; publicar cédulas, certificación, COFEPRIS y membresías con tono objetivo; evitar horarios, urgencias, promesas de curación y datos no configurados; dejar las traducciones clínicas inglesas como provisionales.
- Validación: build Tailwind correcto, catálogo de idiomas regenerado con 133 traducciones, sintaxis JS correcta, derivados de imagen creados sin modificar originales y búsqueda del número temporal limitada a migración/documentación histórica. PHP lint no se ejecutó porque `php.exe` no está disponible.
- Pendientes: sincronizar el tema 1.5.0 en LocalWP/staging, ejecutar QA responsive visual, Lighthouse, lector de pantalla y validación de schema; configurar RankMath y Fluent Forms; recibir email, horarios y texto legal definitivo; revisar clínicamente contenido SEO e inglés antes de publicación final.

### 2026-07-06 - Ajuste UX de servicios y enfermedades

- Objetivo: mejorar la experiencia de Servicios y Home para mostrar claramente las enfermedades atendidas, evitar una navegación confusa por categorías y corregir la mezcla de idiomas en el CPT `servicio`.
- Archivos modificados: `med-landing-dev/inc/helpers.php`, `med-landing-dev/inc/setup.php`, `med-landing-dev/page-services.php`, `med-landing-dev/template-parts/sections/services-grid.php`, archivos de idiomas/build y documentación Markdown.
- Cambios: tema actualizado a 1.5.1; home con grid visible de enfermedades; página Servicios con tarjetas de categoría, anclas y grids completos sin carrusel; consultas de servicios filtradas por idioma; contenido individual ampliado con sección `Qué es`; migración de seed actualizada a versión 2 para refrescar posts administrados por el tema.
- Decisiones: mantener páginas individuales porque aportan SEO si tienen H1, slug, contenido básico, CTA local y aviso médico; no usar carrusel para contenido crítico; el contenido médico sigue siendo educativo y requiere revisión clínica final.
- Validación: build Tailwind correcto, catálogo de idiomas regenerado con 139 traducciones, sintaxis JS correcta. LocalWP no respondió (`ERR_CONNECTION_REFUSED`) y PHP lint no se ejecutó porque `php.exe` no está disponible.
- Pendientes: revisar visualmente home/Servicios/single-servicio en 320, 390, 768, 1024 y 1280 px cuando LocalWP o staging estén levantados; ajustar textos tras revisión clínica.

### 2026-07-06 - Corrección responsive de navegación y fallback de catálogo

- Objetivo: corregir la navegación que se rompía en líneas, reducir la barra superior de categorías, mostrar todas las enfermedades aunque LocalWP tenga una base incompleta y tomar ideas estructurales de la página de referencia compartida.
- Archivos modificados: `med-landing-dev/inc/helpers.php`, `med-landing-dev/inc/setup.php`, `med-landing-dev/page-services.php`, `med-landing-dev/template-parts/sections/services-grid.php`, `med-landing-dev/template-parts/header/nav-desktop.php`, `med-landing-dev/template-parts/components/language-switcher.php`, `med-landing-dev/assets/css/src/main.css`, archivos de versión/build/idiomas y documentación Markdown.
- Cambios: tema actualizado a 1.5.2; header completo solo en `2xl`; enlaces de navegación sin salto de línea; barra de categorías convertida en pills compactos y responsivos; Home y Servicios usan el catálogo central como fuente visual; seed profesional subido a versión 3; `style.css` reparado a UTF-8 válido.
- Decisiones: copiar solo la carpeta del tema a LocalWP puede dejar opciones/posts antiguos en la base; por eso el catálogo visual no debe depender únicamente de `WP_Query`. Las páginas individuales se mantienen para SEO, pero los listados nunca deben quedar vacíos por falta de posts.
- Validación: build Tailwind correcto, catálogo de idiomas con 139 traducciones, sintaxis JS correcta, 12 enfermedades/2 terapias/3 procedimientos verificados, encoding de `Hernández` corregido y LocalWP sincronizado sirviendo `style.css?ver=1.5.2`. La página de referencia se usó para ideas de estructura y CTAs, no para copiar contenido o diseño.
- Pendientes: validar visualmente con captura en 320, 390, 768, 1024 y 1280 px; limpiar cache/permalinks si el navegador del usuario siguiera mostrando CSS o posts antiguos.

### 2026-07-06 - Despliegue inicial en VPS con Docker

- Objetivo: auditar el VPS sin afectar sistemas existentes y montar una instancia WordPress aislada para `med-landing-dev`.
- Archivos modificados: `med-landing-dev/` para remover BOMs en PHP, `Plan.md` y `CONTEXTO-PROYECTO.md`. En el VPS se crearon `/opt/med-landing-dev/docker-compose.yml`, `.env`, `DEPLOYMENT.md` y el clon `/opt/med-landing-dev/repo`.
- Cambios: se levantaron `med-landing-wordpress` y `med-landing-db`, se instaló WordPress, se activó el tema 1.5.2, se sembraron páginas y 17 servicios, se instalaron Polylang, Rank Math SEO y Fluent Forms, se configuraron permalinks y `blog_public=0`.
- Decisiones: no tocar Nginx ni contenedores existentes; usar puerto temporal 8081; guardar credenciales solo en `/opt/med-landing-dev/DEPLOYMENT.md` con permisos `600`; ajustar `wpcli` a usuario `33:33` para compartir permisos con Apache.
- Validación: Docker y DB saludables, WordPress responde internamente, Home carga al seguir redirección de idioma, `/servicios/` muestra 17 cards, `cmd /c npm run build` correcto y PHP lint completo sin errores.
- Pendientes: abrir `8081` desde el firewall del proveedor o publicar por dominio con reverse proxy y SSL; cerrar/restringir `8081` al terminar staging; rotar la contraseña root compartida; hacer commit/push de la limpieza de BOMs antes de volver a desplegar desde GitHub.

### 2026-07-08 - Validación pública del staging VPS

- Objetivo: confirmar que el puerto `8081` abierto en el proveedor permite acceder al WordPress staging desde internet.
- Archivos modificados: `CONTEXTO-PROYECTO.md` y `Plan.md`.
- Cambios: se actualizó el estado del VPS para indicar que `http://74.208.222.71:8081/` ya responde públicamente.
- Decisiones: mantener `8081` como acceso temporal de staging hasta conectar dominio, reverse proxy y SSL.
- Validación: Docker activo; `med-landing-wordpress` y `med-landing-db` activos, DB saludable; otros contenedores existentes `pos-texano-frontend` y `pos-texano-backend` activos; repo del VPS en commit `f68887bdc1a1ec8f0f0542de77b0981ffc1a4bc3`; tema `med-landing-dev` 1.5.2 activo; Polylang, Rank Math y Fluent Forms activos; Home pública status `200`; `/servicios/` pública status `200` con 17 cards; `style.css` versión 1.5.2.
- Pendientes: configurar dominio final, SSL, cambio de `home`/`siteurl`, hardening de acceso SSH y cierre/restricción del puerto `8081` cuando deje de ser necesario.

### 2026-07-08 - Corrección visual de staging, navegación y tarjetas visibles

- Objetivo: corregir la home pública del staging para que la navegación se vea, no existan huecos por contenido animado invisible y la interfaz use mejor la identidad visual.
- Archivos modificados: `med-landing-dev/inc/helpers.php`, `med-landing-dev/template-parts/header/nav-desktop.php`, `med-landing-dev/template-parts/header/nav-mobile.php`, `med-landing-dev/template-parts/footer/footer-main.php`, `med-landing-dev/template-parts/components/language-switcher.php`, secciones de Home, `med-landing-dev/assets/css/src/main.css`, `med-landing-dev/assets/js/animations.js`, archivos de versión/build/idiomas y documentación Markdown.
- Cambios: tema actualizado a 1.5.3; navegación fallback cuando WordPress/Polylang no devuelven menú; contraste activo del menú corregido; selector de idioma móvil compacto; animaciones GSAP con `immediateRender:false` y limpieza preventiva de opacidad/transform; fondos de secciones con gradientes y superficies de marca.
- Decisiones: el menú principal no debe desaparecer por falta de asignación de menú en WordPress; el contenido crítico de servicios/enfermedades debe permanecer visible aunque falle ScrollTrigger; WhatsApp sigue destacado pero el CTA principal visual del header usa terracota de marca.
- Validación: build Tailwind correcto, catálogo de idiomas regenerado con 139 traducciones, sintaxis JS correcta, lint PHP correcto dentro del contenedor, staging desplegado en commit `8afc6eb10cbbf918dcc710c8f706c978ba892671`, Home pública status `200` con `style.css?ver=1.5.3`, `/servicios/` con 17 cards y captura móvil Puppeteer a 390 px sin overflow (`scrollWidth=390`).
- Pendientes: configurar dominio final, SSL, formularios reales, SEO de RankMath, texto legal definitivo, revisión clínica/editorial final, Lighthouse, schema externo y pruebas cross-browser.

### 2026-07-08 - Páginas legales y tarjetas de enfermedades con iconos

- Objetivo: agregar las cuatro páginas legales de referencia con contenido propio adaptado al Dr. Edgar y mejorar visualmente las tarjetas de enfermedades de Home.
- Archivos modificados: `med-landing-dev/inc/helpers.php`, `med-landing-dev/inc/setup.php`, `med-landing-dev/template-parts/footer/footer-main.php`, `med-landing-dev/template-parts/sections/services-grid.php`, `med-landing-dev/assets/css/src/main.css`, archivos de versión/build/idiomas y documentación Markdown.
- Cambios: tema actualizado a 1.5.4; catálogo legal central; sembrado de `aviso-de-privacidad`, `terminos-y-condiciones`, `descargo-de-responsabilidad` y `compromiso-de-etica`; `aviso-legal` conservado como índice; footer con bloque Legal; tarjetas de enfermedades con iconos SVG inline, microetiquetas, mejor jerarquía y estilos `.prose` para páginas legales.
- Decisiones: no copiar contenido literal de la referencia; publicar borradores funcionales pendientes de revisión legal final; usar el teléfono/WhatsApp confirmado `229 446 6698` mientras no exista correo legal público; no agregar dependencias externas de iconos.
- Validación: build Tailwind correcto, catálogo de idiomas con 140 traducciones, `node --check` correcto para `build-css.js`, verificación sin BOM, lint PHP correcto dentro del contenedor, Home pública con `style.css?ver=1.5.4`, cuatro páginas legales más `aviso-legal` en `200`, 12 tarjetas con 12 iconos y responsive 320/390/768/1024/1280 sin overflow.
- Pendientes: sustituir borradores por textos legales aprobados, configurar dominio final/SSL, formularios reales, SEO de RankMath, revisión clínica/editorial final, Lighthouse, schema externo y pruebas cross-browser.

### 2026-07-08 - Instagram visible en Home y Contacto

- Objetivo: hacer visible el Instagram oficial del doctor en la página principal y en Contacto.
- Archivos modificados: `med-landing-dev/inc/helpers.php`, `med-landing-dev/template-parts/sections/trust-section.php`, `med-landing-dev/page-contact.php`, archivos de versión/build/idiomas y documentación Markdown.
- Cambios: tema actualizado a 1.5.5; helper `developer_get_instagram_url()`; tarjeta “Instagram oficial” en la sección de confianza de Home; enlace “Instagram oficial” en Contacto directo; catálogo de idiomas actualizado a 143 traducciones.
- Decisiones: usar texto visible además del icono para mantener claridad y accesibilidad; conservar el valor del Customizer como fuente editable.
- Validación: build Tailwind correcto, catálogo de idiomas con 143 traducciones, `node --check` correcto para `build-css.js`, verificación sin BOM, lint PHP correcto dentro del contenedor, Home y Contacto públicos con `style.css?ver=1.5.5`, texto/enlace de Instagram visible y responsive 390/1280 sin overflow.
- Pendientes: configurar dominio final/SSL, formularios reales, SEO de RankMath, revisión clínica/editorial final, Lighthouse, schema externo y pruebas cross-browser.

### 2026-07-08 - Preparación HTTP del dominio final en VPS

- Objetivo: dejar el VPS listo para recibir `nefrologoedgar.com.mx` y `www.nefrologoedgar.com.mx` sin afectar los proyectos existentes.
- Archivos modificados: `CONTEXTO-PROYECTO.md` y `Plan.md`. En el VPS se creó `/etc/nginx/sites-available/nefrologoedgar.com.mx` y el symlink `/etc/nginx/sites-enabled/nefrologoedgar.com.mx`.
- Cambios: Nginx sirve `nefrologoedgar.com.mx` por HTTP hacia `http://127.0.0.1:8081`; `www.nefrologoedgar.com.mx` redirige con `301` al dominio raíz; WordPress cambió `home` y `siteurl` a `http://nefrologoedgar.com.mx`.
- Decisiones: no activar SSL hasta que NEUBOX apunte a `74.208.222.71`; no modificar `orza.mx`, `default`, Docker Compose ni puertos de otros proyectos; mantener `8081` abierto temporalmente para diagnóstico.
- Validación: `nginx -t` correcto antes y después; Nginx recargado sin reiniciar el servidor; pruebas Host header contra `127.0.0.1` y `74.208.222.71` dieron `200 OK` para el dominio raíz y `301` para `www`; UFW conserva `80`, `443` y `8081`; contenedores `med-landing-wordpress`, `med-landing-db`, `pos-texano-frontend` y `pos-texano-backend` siguen activos.
- Pendientes: configurar registros DNS en NEUBOX, esperar propagación, ejecutar Certbot con Nginx, cambiar WordPress a HTTPS, verificar renovación, configurar Analytics/Search Console y cerrar o restringir `8081` cuando deje de ser necesario.

### 2026-07-08 - Activación HTTPS del dominio final

- Objetivo: activar SSL gratuito para `nefrologoedgar.com.mx` y `www.nefrologoedgar.com.mx` después de que NEUBOX apuntara el registro A a la VPS.
- Archivos modificados: `CONTEXTO-PROYECTO.md` y `Plan.md`. En el VPS, Certbot actualizó `/etc/nginx/sites-available/nefrologoedgar.com.mx` y se ajustaron redirecciones `www`/HTTP; se creó backup `/etc/nginx/sites-available/nefrologoedgar.com.mx.bak-20260708222624-https-redirects`.
- Cambios: certificado Let’s Encrypt emitido para dominio raíz y `www`; WordPress cambió `home` y `siteurl` a `https://nefrologoedgar.com.mx`; todas las variantes HTTP/WWW redirigen al dominio canónico HTTPS.
- Decisiones: mantener `nefrologoedgar.com.mx` sin `www` como canónico; no tocar los virtual hosts existentes `orza.mx` ni `default`; validar solo el certificado nuevo con `--cert-name` para evitar interferir con otros certificados.
- Validación: DNS autoritativo NEUBOX y resolvers públicos apuntan a `74.208.222.71`; `https://nefrologoedgar.com.mx` responde `200 OK`; `https://www`, `http://www` y `http://` redirigen `301` a `https://nefrologoedgar.com.mx`; `nginx -t` correcto; `certbot renew --dry-run --cert-name nefrologoedgar.com.mx --no-random-sleep-on-renew` exitoso; contenedores WordPress, DB y proyectos existentes siguen activos.
- Pendientes: cerrar o restringir `8081` cuando ya no sea necesario, configurar Google Analytics/Search Console, finalizar formularios/SEO, revisar textos legales y clínicos, rotar acceso root y reemplazarlo por usuario/SSH key.

### 2026-07-08 - SEO técnico, título UTF-8 y Google Site Kit

- Objetivo: corregir el título de pestaña con caracteres rotos, abrir indexación y dejar base técnica para SEO, Analytics y Search Console.
- Archivos modificados: `med-landing-dev/inc/seo.php`, `med-landing-dev/functions.php`, archivos de versión/build/idiomas, `style.css`, `Plan.md`, `INFORMACION-A-SOLICITAR.md` y `CONTEXTO-PROYECTO.md`. En WordPress se actualizaron opciones SEO y se instaló Site Kit.
- Cambios: tema actualizado a 1.5.7; `blogname` y `blogdescription` corregidos en UTF-8; `blog_public=1`; fallback de título/meta description/Open Graph/Twitter/robots; Site Kit instalado y activo; Sample Page y Privacy Policy históricas quedaron en borrador; Rank Math conserva módulos SEO esenciales; el sitemap nativo excluye autores/usuarios.
- Decisiones: usar `https://nefrologoedgar.com.mx` como canónico; usar `wp-sitemap.xml` como sitemap público mientras Rank Math no complete su setup visual; dejar Site Kit listo para vinculación manual con cuenta Google, sin insertar un ID falso de Analytics.
- Validación: build Tailwind correcto, `node --check` correcto, título público con `Hernández` y `Nefrología` sin `?`, `robots.txt` permite rastreo y apunta a `wp-sitemap.xml`, `wp-sitemap.xml` responde `200 OK`, Site Kit 1.182.0 activo, `blog_public=1`.
- Pendientes: conectar Site Kit desde wp-admin con Google Analytics/Search Console, enviar sitemap en Search Console, configurar conversiones de WhatsApp/formulario/teléfono, revisar Rank Math visualmente, ejecutar Lighthouse/PageSpeed y cerrar o restringir `8081`.

### 2026-07-08 - Reset de acceso administrador WordPress

- Objetivo: recuperar acceso a `https://nefrologoedgar.com.mx/wp-admin` para continuar la configuración de Site Kit, Analytics y Search Console.
- Archivos modificados: `CONTEXTO-PROYECTO.md`. En el VPS se actualizó el usuario WordPress `asael_admin` y el archivo privado `/opt/med-landing-dev/DEPLOYMENT.md`.
- Cambios: contraseña del usuario administrador `asael_admin` reseteada y guardada solo en el VPS con permisos `600`; no se copiaron secretos al repositorio.
- Decisiones: mantener el usuario admin existente y cambiar únicamente la contraseña temporal para evitar crear cuentas adicionales.
- Validación: `wp user check-password asael_admin` exitoso; usuario con rol `administrator`; `/opt/med-landing-dev/DEPLOYMENT.md` conserva permisos `600`.
- Pendientes: cambiar el email `admin@medical-landing.local` por un correo real y reemplazar la contraseña temporal por una definitiva desde WordPress.

### 2026-07-09 - Rama PageSpeed 1.6.1 sin CDN frontend

- Objetivo: preparar una versión aislada para mejorar PageSpeed/Lighthouse sin alterar la versión estable publicada.
- Archivos modificados: `med-landing-dev/functions.php`, `med-landing-dev/inc/enqueue.php`, `med-landing-dev/inc/helpers.php`, `med-landing-dev/header.php`, navegación móvil, componentes de retrato/CTA, JS, CSS fuente/build, `package.json`, `package-lock.json`, `style.css`, derivados WebP del retrato y documentación Markdown.
- Cambios: rama `codex/pagespeed-100`; tema 1.6.1; eliminación de Google Fonts, Alpine.js, GSAP y ScrollTrigger del frontend; menú móvil y CTA flotante migrados a JavaScript nativo; limpieza de emoji, estilos globales y block library en frontend; preload/fetchpriority de la imagen LCP; retrato profesional con `picture` y WebP (`1080` ~123 KB, `720` ~67 KB, `540` ~43 KB); logos de marca WebP responsivos; enlaces de ubicación más descriptivos; contraste de copyright corregido; `animations.js` convertido en utilidad opcional sin dependencias y no encolada.
- Decisiones: usar fuentes del sistema para eliminar recursos de terceros y reducir CLS/render blocking; no desplegar ni fusionar la rama hasta medir PageSpeed real; mantener la versión estable 1.5.7 como respaldo.
- Validación: `cmd /c npm run build` correcto con TailwindCSS 4.3.0; `node --check` correcto para `navigation.js` y `animations.js`; búsqueda sin referencias activas a Alpine/GSAP/Google Fonts/CDN/1.6.0 en PHP/JS; PageSpeed API no pudo consultarse por cuota 429, se trabajó con las capturas del usuario, Lighthouse local y auditoría directa de recursos.
- Limitaciones: `php.exe` no está instalado localmente y Docker Desktop no está iniciado, por lo que el lint PHP local no pudo ejecutarse; debe correrse dentro del contenedor WordPress del VPS al desplegar la rama.
- Pendientes: desplegar la rama en staging o en una ventana controlada, validar menú móvil por teclado, revisar apariencia sin fuentes remotas, ejecutar PageSpeed móvil/escritorio, añadir cache headers largos en Nginx para assets estáticos si PageSpeed sigue marcando TTL, y solo después fusionar a `main`.

### 2026-07-09 - Rama PageSpeed 1.6.2 con Maps bajo demanda

- Objetivo: continuar la optimización PageSpeed hacia marcadores 100 sin alterar la versión estable.
- Archivos modificados: `med-landing-dev/functions.php`, `med-landing-dev/inc/enqueue.php`, `med-landing-dev/inc/helpers.php`, `med-landing-dev/assets/js/navigation.js`, templates de retrato/logo/mapas, archivos de versión/build, nuevos WebP y documentación Markdown.
- Cambios: tema actualizado a 1.6.2; logo horizontal del header reducido y recomprimido a `logo-horizontal-premium-220.webp` (~5.8 KB); composición de marca reducida y recomprimida a `logo-principal-premium-420.webp` (~12.9 KB); retrato profesional agrega variante `650w` y WebP recomprimidos (`1080` ~82.6 KB); preload/srcset del LCP usa WebP con `540/650/720/1080` y JPG como fallback; Google Maps ya no usa `src` inicial en Home ni en componentes de sede y se carga al hacer clic en el botón del mapa.
- Decisiones: mantener enlaces directos a Google Maps visibles como fallback; no cargar iframes externos durante el render inicial; agregar caché pública anónima de página en Nginx solo para `nefrologoedgar.com.mx`, con bypass para `wp-admin`, `wp-login.php`, `wp-json`, búsquedas y usuarios logueados.
- Validación local/VPS: `cmd /c npm run build` correcto con TailwindCSS 4.3.0; `node --check` correcto para `navigation.js` y `animations.js`; búsqueda sin referencias frontend activas a Google Fonts, CDN, Alpine o GSAP; búsqueda sin `src` inicial de `map_embed_url` en templates; lint PHP correcto dentro del contenedor WordPress; Nginx `nginx -t` correcto; home pública muestra `X-Med-Landing-Cache: MISS` y luego `HIT`; `/wp-admin/` y `/wp-json/` muestran `BYPASS`; Lighthouse local móvil válido alcanzó 99/100/100/100 antes de recomprimir WebP del retrato LCP.
- Pendientes: commit/push de assets recomprimidos, pull en VPS, ejecutar Lighthouse/PageSpeed móvil/escritorio y continuar optimizando si algún marcador queda debajo de 100.
