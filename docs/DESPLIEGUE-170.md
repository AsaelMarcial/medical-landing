# Publicación y reversión 1.7.0

Publicado el 22/09/2026 a petición del usuario, commit de código `059550d`, rama `codex/whatsapp-xalapa-170`. Respaldo inmediato de la ventana en `/opt/med-landing-dev/backups/20260922-release170`; contiene SQL y snapshot de migración. Las verificaciones de producción y la repetición idempotente pasaron. No hubo reinicios de otros contenedores.

## Alcance

Solo `/opt/med-landing-dev`, sus contenedores WordPress/MariaDB y la caché del dominio médico. No ejecutar `docker compose down`, borrar volúmenes ni modificar firewall o los otros proyectos.

Código fuente: `med-landing-dev/`, rama `codex/whatsapp-xalapa-170`. La ampliación clínica queda desactivada hasta revisión de `REVISION-CLINICA-170.md`.

## Preparación

- Respaldo privado existente: `/opt/med-landing-dev/backups/20260922-before-170`, SQL, WordPress completo, repositorio, configuración y URLs previas.
- Repetir respaldo SQL inmediatamente antes de la ventana y registrar commit/estado de Git. Conservar copias fuera de la raíz pública.
- Probar en `/opt/med-landing-170-stage`, Compose `med_landing_170_stage`, puerto `127.0.0.1:8082`. No transferir su base completa a producción: ejecutar la migración sobre la base productiva respaldada.
- Staging bloquea rastreo por robots y cabecera HTTP, evita correo y deshabilita Site Kit. Esos ajustes son exclusivos del entorno de pruebas y nunca se copian al tema.

## Orden obligatorio

1. Activar mantenimiento del WordPress médico y desplegar el commit probado.
2. Ejecutar `wp med-landing migrate-170` para obtener la huella actual. Revisar que el estado previo sea el esperado.
3. Ejecutar `wp med-landing migrate-170 --apply --expect=HUELLA --snapshot=/recovery/migration-170.json`, montando un directorio privado persistente en `/recovery`. El comando no acepta sobrescribir snapshots ni guardarlos dentro de WordPress. Las huellas del contenido auditado impiden sobrescribir cambios posteriores sin revisión.
4. En **otro proceso WP-CLI**, ejecutar `wp med-landing finalize-170`: carga las opciones nuevas de Polylang/Rank Math, limpia sus cachés y regenera reglas. Este paso evita que la caché de idioma conserve `/en/home/` o que el sitemap conserve URLs previas.
5. Ejecutar `wp eval-file wp-content/themes/med-landing-dev/scripts/verify-migration-170.php` y repetir `wp med-landing migrate-170 --apply`. La repetición debe responder sin cambiar contenido.
6. Verificar Home, `/en/`, Xalapa, Contacto, Servicios, catéteres, biopsia, Proteinuria ES/EN, sitemap, canonical/hreflang, 301 antiguas y 404 reales.
7. Desactivar mantenimiento, limpiar **únicamente la caché Nginx del sitio médico**, y comprobar públicamente las rutas y metadatos. El sitemap definitivo es `/sitemap_index.xml`.
8. Enviar sitemap y solicitar inspecciones/indexación en Search Console; la solicitud no garantiza indexación. Revisar a las dos y cuatro semanas.

## Reversión

Si falla la migración o la verificación, mantener mantenimiento. Restaurar el SQL de la ventana al contenedor `med-landing-db` y devolver el repositorio al commit anterior registrado. Limpiar solo caché del sitio médico, quitar mantenimiento y verificar rutas anteriores. Restaurar código y datos conjuntamente; no ejecutar la migración de nuevo sobre un estado parcialmente modificado. Los datos de Fluent Forms se conservan y su activación anterior se recupera con el respaldo.

El snapshot JSON conserva IDs, contenido/meta, idiomas, relaciones y URLs anteriores. El respaldo SQL es la referencia completa para revertir opciones, menús, plugins y entradas creadas.

## Validación reproducible

- `npm.cmd run build --prefix med-landing-dev` y `python med-landing-dev/languages/build_catalog.py`.
- PHP lint dentro del contenedor y `node --check med-landing-dev/assets/js/navigation.js`.
- `scripts/qa-170.cjs`, con Playwright disponible mediante `NODE_PATH`; usa `QA_URL`, `QA_CHANNEL` (chrome/msedge), `QA_ENGINE` (firefox/webkit) y `QA_OUTPUT`.
- WebKit en Windows no equivale a Safari real en macOS/iOS. Documentar esa limitación sin declarar Safari verificado.
- Lighthouse sobre producción después de quitar mantenimiento; staging no permite puntuar indexabilidad porque incluye `X-Robots-Tag: noindex` deliberadamente.
