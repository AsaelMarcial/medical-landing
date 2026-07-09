# Auditoría UX y Multilenguaje

Fecha: 2026-06-08
Última actualización: 2026-07-09

## Resultado

El tema `med-landing-dev` cuenta con una base responsive y accesible funcional en móvil, tablet y escritorio. La revisión completa en LocalWP se realizó el 2026-06-08 sobre `http://medical-landing.local` con el tema versión 1.4.0. El 2026-07-08 producción quedó en versión 1.5.7 con dominio HTTPS, SEO fallback y Site Kit instalado. El 2026-07-09 se abrió la rama `codex/pagespeed-100` con tema 1.6.0 para mejorar PageSpeed sin tocar estable: navegación nativa, fuentes del sistema, retrato WebP, preload LCP y eliminación de CDN frontend.

## Mejoras Implementadas

- Menú móvil con `aria-expanded`, diálogo accesible, cierre con Escape, bloqueo de scroll, foco inicial, restauración de foco y navegación contenida.
- `x-cloak`, foco visible global, soporte de `prefers-reduced-motion` y objetivos táctiles principales de al menos 48 px.
- Texto base de aproximadamente 18 px, interlineado amplio y ausencia de texto esencial menor de 14 px.
- Breakpoint de navegación completa movido a `xl` para evitar saturación en tablet.
- CTA móvil fijo simplificado a WhatsApp y Agendar, con soporte para áreas seguras.
- Acciones flotantes de escritorio con icono y texto visible, sin depender de controles representados solo por iconos.
- En la rama 1.6.0, el menú móvil, CTA flotante y header usan JavaScript nativo sin Alpine.js.
- Se conserva jQuery cuando otro plugin lo declara como dependencia.
- El formulario ficticio fue eliminado. Contacto muestra un estado honesto hasta configurar Fluent Forms.
- Botón único de idioma visible: muestra `English` en español y `Español` en inglés, junto al menú móvil y en el header de escritorio.
- Variante móvil compacta del botón de idioma para conservar objetivos táctiles grandes sin saturar el header en 320-390 px.
- Menú fallback interno para que la navegación principal y footer no desaparezcan si WordPress, Polylang o la asignación de menús todavía no están completos en staging.
- En la rama 1.6.0, GSAP/ScrollTrigger no se cargan; las animaciones quedan como utilidad opcional con IntersectionObserver y no se encolan por defecto.
- Secciones principales con superficies y gradientes de marca para reducir la sensación de página excesivamente blanca.
- Tarjetas de enfermedades con iconos SVG decorativos, microetiquetas clínicas, hover suave y jerarquía visual más clara.
- Footer con bloque Legal y cuatro enlaces separados: Aviso de privacidad, Términos y condiciones, Descargo de responsabilidad y Compromiso de ética.
- Instagram oficial visible con texto e icono en Home y Contacto, además de footer/schema.
- Estilos mínimos `.prose` para que páginas legales y contenido largo tengan márgenes, listas y enlaces legibles sin depender de plugins.
- URLs internas, datos de marca, sedes y mensajes principales usan helpers conscientes del idioma.
- Catálogo inglés incluido en `languages/`, con 139 cadenas traducidas y archivos `en_US.po`/`en_US.mo` compatibles con la carga estándar de temas.
- WhatsApp usa enlaces universales `https://wa.me/`, normaliza números mexicanos y permite configurar el mensaje inicial desde el Customizer.

## Validación Ejecutada

- Home revisada a 320 × 720, 390 × 844, 768 × 720, 1024 × 768 y 1280 × 720.
- Sin desbordamiento horizontal en los breakpoints revisados.
- Menú móvil abre, mueve el foco, bloquea el fondo, cierra con Escape y devuelve el foco al botón.
- Objetivos interactivos visibles de móvil cumplen 48 px; se excluye el skip link oculto antes del foco.
- Cambio ES → EN y EN → ES verificado en páginas relacionadas.
- URL definitiva prevista verificada por construcción: `https://wa.me/522294466698` con mensaje codificado.
- Contacto no publica un formulario que no pueda enviar información.
- No se observaron errores JavaScript en la carga final.
- Build Tailwind correcto, 31 archivos PHP sin errores y sintaxis JS correcta.
- Staging VPS 1.5.3 verificado el 2026-07-08: Home pública status `200`, `style.css?ver=1.5.3`, navegación visible, enfermedades atendidas visibles y `/servicios/` con 17 cards.
- Captura móvil real con Puppeteer a 390 px: `innerWidth=390`, `scrollWidth=390`, menú y botón de idioma presentes, sin desbordamiento horizontal.
- Tema 1.5.4 desplegado en staging VPS: `style.css?ver=1.5.4`, catálogo inglés regenerado con 140 cadenas, `build-css.js` sin errores de sintaxis, lint PHP correcto dentro del contenedor, verificación sin BOM, cinco páginas legales en `200` y responsive 320/390/768/1024/1280 sin overflow.
- Tema 1.5.5 desplegado en staging VPS: catálogo inglés regenerado con 143 cadenas, `style.css?ver=1.5.5`, `build-css.js` sin errores de sintaxis, lint PHP correcto dentro del contenedor, verificación sin BOM y Home/Contacto responsive 390/1280 sin overflow.
- Rama 1.6.0 local: `cmd /c npm run build` correcto, `node --check` correcto para `navigation.js` y `animations.js`, sin referencias activas a Alpine/GSAP/Google Fonts/CDN en PHP/JS, retrato WebP generado y assets frontend de WordPress limpiados. No se ejecutó lint PHP local porque no hay `php.exe` y Docker Desktop no está iniciado.

## Multilenguaje

Se eligió Polylang en lugar de traducción automática de Google. Esta opción permite revisar contenido médico, mantener SEO independiente por idioma y controlar las relaciones entre páginas.

Polylang 3.8.4 está instalado y activado exclusivamente en LocalWP. Español `es_MX` es el idioma principal e inglés `en_US` el secundario. Se crearon y relacionaron las páginas inglesas de Home, Doctor, Servicios, Contacto, Xalapa y Boca del Río, además de un menú principal inglés.

El tema muestra un aviso administrativo si Polylang está inactivo o si faltan los idiomas ES/EN. Si una página no tiene traducción, el botón dirige al inicio del idioma correspondiente.

Las traducciones inglesas actuales son provisionales y requieren revisión profesional antes de publicarse.

## WhatsApp Definitivo

- El tema usa como teléfono y WhatsApp global `229 446 6698`, normalizado como `522294466698`.
- Si una base LocalWP conserva el número temporal anterior `522281565985`, la migración interna del tema lo reemplaza por el número definitivo al inicializar.
- El número temporal solo queda mencionado en documentación histórica y en la condición de migración; no debe configurarse como dato vigente.
- El mensaje inicial puede editarse desde Apariencia → Personalizar.

## Actualización Médica y SEO 2026-07-06

- Se integró la fotografía profesional `graficos/dredgar_profesional.png` mediante derivados optimizados en `assets/images/doctor/`.
- Se publicaron con redacción objetiva las cédulas `11751221` y `14852016`, la certificación del Consejo Mexicano de Nefrología `2025-2030`, el COFEPRIS `2530092002A00059` y membresías profesionales.
- La página Servicios ahora funciona como hub SEO con tres grupos: enfermedades del riñón, terapias de reemplazo renal y procedimientos nefrológicos.
- El tema siembra páginas individuales de tipo `servicio` para 17 búsquedas clínicas, con CTA, sedes, aviso informativo y textos ingleses provisionales.
- La home muestra las enfermedades atendidas en un grid visible, sin carrusel, con iconos SVG inline y microetiquetas de apoyo.
- La página Servicios usa navegación compacta tipo pills y grids completos; el catálogo se renderiza desde helpers del tema y enlaza a posts individuales solo cuando existen.
- Las consultas del CPT aceptan posts con idioma actual o posts antiguos sin meta de idioma, evitando mezclar contenido inglés en la vista española y reduciendo fallos al copiar solo la carpeta del tema a LocalWP.
- El header de escritorio se muestra desde `xl`; el diseño oculta el teléfono hasta `2xl` y compacta el selector de idioma en móvil para evitar saturación.
- LocalWP fue sincronizado históricamente con la carpeta del tema 1.5.2; producción pública sirve 1.5.7 y la rama 1.6.0 aún no está desplegada.
- El schema agrega credenciales, foto, teléfono, sedes y `knowsAbout` solo con datos configurados.
- Las páginas legales 1.5.4 son borradores funcionales y no sustituyen revisión legal final.

## Siguiente Trabajo Sin Datos Clínicos

- Configurar RankMath y Fluent Forms en staging con acceso administrativo; ambos plugins ya están instalados en el VPS, pero faltan ajustes reales de SEO y formulario.
- Reproducir la configuración de Polylang en el WordPress destino; el plugin y los contenidos de LocalWP no forman parte del ZIP del tema.
- Configurar permalinks, sitemap, canonical, Open Graph y responsabilidades de schema.
- Crear `screenshot.png` del tema.
- Desplegar la rama 1.6.0 en staging o ventana controlada, ejecutar PageSpeed/Lighthouse móvil y escritorio, validar schema y probar Chrome, Edge, Firefox y Safari.
- Preparar blog, FAQ y testimonios como estructura de Fase 2, sin publicar contenido médico no validado.

## Trabajo Que Requiere Información

- Email público, email receptor de formularios, horarios y recepción operativa.
- Texto final aprobado de Aviso de privacidad, Términos y condiciones, Descargo de responsabilidad y Compromiso de ética.
- Revisión clínica final de los textos SEO y de las traducciones inglesas provisionales.
- Aviso de privacidad, disclaimer y autorización de testimonios.
- Traducción y revisión clínica final del contenido inglés.
