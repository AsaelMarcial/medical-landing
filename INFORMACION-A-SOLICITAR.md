# Información a Solicitar al Médico — Landing Nefrólogo

> Inventario operativo de la información que debe confirmar o proporcionar el médico antes de publicar. Los requisitos legales deben validarse con asesoría profesional aplicable al caso.

---

## RESUMEN EJECUTIVO

Estado actualizado al 2026-07-06: ya se recibió e integró la identidad pública, fotografía profesional principal, teléfono/WhatsApp, Instagram, cédulas, certificación, COFEPRIS, formación, membresías y catálogo clínico base. Este documento conserva los bloques necesarios para publicación y marca qué sigue pendiente de confirmar.

Necesitamos mantener controlados **9 bloques de información**:

1. **Identidad profesional** del médico (nombre, foto, bio, especialidad)
2. **Credenciales médicas verificables** (cédulas, universidad, certificaciones)
3. **Datos de contacto** (teléfono, WhatsApp, email, redes)
4. **Información de cada consultorio** (Xalapa + Boca del Río: horarios, teléfonos y fotos pendientes)
5. **Catálogo de servicios médicos** (uno por uno con detalle clínico)
6. **Assets gráficos** (logos propios e institucionales, fotos profesionales)
7. **Contenido legal obligatorio** (Aviso de Privacidad, T&C, Disclaimer médico, COFEPRIS)
8. **Información operativa** (precios/rangos, métodos de pago, seguros, política de cancelación)
9. **Perfiles externos** (Google Business, Doctoralia, redes sociales)

> **Antes de publicar**: validar cédulas, aviso de privacidad, tratamiento de datos sensibles y publicidad médica con el responsable del proyecto y asesoría legal.

### Información ya integrada en el tema 1.5.0

- Nombre público principal: `Dr. Edgar Eduardo Hernández Enríquez`.
- Identidad de marca conservada: `Dr. Edgar E. Hernández - Nefrología` cuando venga desde el logo.
- Teléfono y WhatsApp: `229 446 6698`; enlace normalizado `https://wa.me/522294466698`.
- Instagram: `https://www.instagram.com/dr.edgarhernandez.nefro/`.
- Céd. Prof. `11751221`; Céd. Esp. `14852016`.
- Certificación vigente por el Consejo Mexicano de Nefrología `2025-2030`.
- COFEPRIS `2530092002A00059`.
- Foto profesional fuente: `med-landing-dev/graficos/dredgar_profesional.png`.
- Identidad visual adicional: `med-landing-dev/graficos/Nefrología_Identidadvisual-26sep.pdf`.
- Servicio SEO base: 17 páginas tipo `servicio` sembradas desde el tema, con texto informativo no diagnóstico.
- Ajuste UX/SEO posterior: la home muestra las enfermedades atendidas y Servicios muestra el catálogo completo agrupado, sin carrusel, con navegación compacta y fallback visual desde el catálogo del tema si LocalWP todavía no tiene todos los posts sembrados.

### Fuentes informativas usadas como referencia editorial

- NIDDK: enfermedad renal crónica, hipertensión y enfermedad renal, enfermedades glomerulares.
- MedlinePlus: examen de orina, sangre en orina, electrolitos y litiasis renal.
- National Kidney Foundation: lesión renal aguda, diálisis, accesos para hemodiálisis, embarazo y enfermedad renal, evaluación para trasplante.
- American Heart Association: concepto general de síndrome cardiorrenal.

---

## 1. IDENTIDAD PROFESIONAL DEL MÉDICO

| Dato | Formato | Obligatorio | Notas |
|------|---------|-------------|-------|
| Nombre completo con título | `Dr. Edgar Eduardo Hernández Enríquez` | Confirmado | Hero, schema Physician, About |
| Especialidad principal | `Nefrología` | Confirmado | Única especialidad autorizada actualmente |
| Subespecialidades | Lista (trasplante, hemodiálisis…) | Opcional | |
| Años de experiencia | Número y evidencia | Opcional | No se publica hasta validarlo |
| Biografía corta | 60–80 palabras | Parcial | El tema usa descripción objetiva; falta aprobación editorial final |
| Biografía extendida | 200–300 palabras (2-3 párrafos) | Parcial | Se integró formación y credenciales; falta voz final del doctor |
| Filosofía de atención | Texto | Opcional | Sección filosofía |
| Foto profesional principal | JPG/PNG ≥1200×1600 px, vertical 3:4, fondo neutro, bata blanca | Confirmado | Fuente en `graficos/dredgar_profesional.png`; derivados web en `assets/images/doctor/` |
| Foto secundaria (acción/consultorio) | JPG/PNG ≥1200×800 px | Opcional | Banners |
| Idiomas que habla | Lista | Opcional | Pacientes internacionales |
| Género (Dr./Dra.) | Selección | ✅ | Tratamiento correcto |

---

## 2. CREDENCIALES MÉDICAS VERIFICABLES

> Confirmar con asesoría legal cuáles datos deben mostrarse y cómo deben presentarse en el sitio.

### 2.1 Cédulas Profesionales

| Dato | Formato | Notas |
|------|---------|-------|
| **Cédula profesional general** (Médico Cirujano) | `11751221` | SEP — verificable en cedulaprofesional.sep.gob.mx |
| **Cédula de especialidad** (Nefrología) | `14852016` | Publicada con redacción objetiva |
| **Cédula de subespecialidad** (si aplica) | Número | Ej: trasplante renal |
| **Registro DGP/SSA** | Número | Si aplica |

### 2.2 Formación Académica (timeline en about)

Para cada etapa: **institución, ciudad, años (de–a), título, cédula generada**.

| Etapa | Datos requeridos |
|-------|------------------|
| Licenciatura — Médico Cirujano | Universidad, años, cédula |
| Internado / Servicio social | Hospital, año |
| Residencia — Medicina Interna | Hospital, años, certificación |
| Especialidad — Nefrología | Hospital/Universidad, años, cédula |
| Subespecialidad | Institución, años |
| Estancias / Fellowships internacionales | País, institución, año |

### 2.3 Certificaciones Vigentes

| Certificación | Datos |
|---------------|-------|
| Consejo Mexicano de Nefrología (CMN) | Vigencia confirmada `2025-2030`; número de socio no proporcionado |
| Sociedad Mexicana de Nefrología (SMN) | Número de miembro |
| Colegio Médico estatal (Veracruz) | Número |
| Certificaciones internacionales (ISN, ASN) | Si aplica |

### 2.4 Cursos, Diplomados y Educación Continua

Lista con: nombre del curso, institución, año, horas/duración, certificado en PDF si es posible.

- Diplomados (últimos 5 años mínimo)
- Cursos de actualización
- Congresos como ponente
- Publicaciones científicas (título, revista, año, DOI)

---

## 3. DATOS DE CONTACTO

> El número temporal usado en pruebas anteriores (`+52 228 156 5985`) quedó obsoleto. El tema 1.5.0 usa `229 446 6698` y normaliza WhatsApp a `522294466698`.

| Dato | Formato | Obligatorio |
|------|---------|-------------|
| Teléfono fijo del consultorio | `229 446 6698` | Confirmado |
| WhatsApp Business definitivo | `229 446 6698` | Confirmado |
| Email de contacto público | email@dominio | ✅ |
| Email administrativo (formularios) | email@dominio | ✅ |
| Mensaje predefinido WhatsApp | Texto | Opcional |
| Extensión / Recepcionista | Texto | Opcional |

---

## 4. CONSULTORIOS (×2)

Ubicaciones confirmadas:

- Xalapa: Torre Hakim, Local 909. Mapa: `https://maps.app.goo.gl/JJZw4PL8UMG7SBa17`.
- Boca del Río: Hospital MediMAC, Consultorio 37, Avenida Calzada Juan Pablo II, Plaza Urban Center. Mapa: `https://maps.app.goo.gl/T3aZ7gXx3MWDn3e98`.

Datos operativos que todavía deben confirmarse para ambas sedes:

| Dato | Formato | Obligatorio |
|------|---------|-------------|
| Nombre del consultorio/hospital | Texto | Confirmado |
| Calle y número | Texto | Parcialmente confirmado |
| Colonia / fraccionamiento | Texto | Pendiente si aplica |
| Código postal | 5 dígitos | ✅ |
| Ciudad / municipio | Xalapa / Boca del Río | Confirmado |
| Estado | Veracruz | Confirmado |
| Referencias / cómo llegar | Texto libre | Recomendado |
| Coordenadas GPS (lat, lng) | Decimal | Confirmado |
| URL embed de Google Maps | iframe src | Confirmado |
| Teléfono del consultorio | +52 | ✅ |
| Horario lunes-viernes | HH:MM – HH:MM | ✅ |
| Horario sábado | HH:MM – HH:MM o "Cerrado" | ✅ |
| Horario domingo | "Cerrado" usualmente | ✅ |
| Días feriados / vacaciones | Texto | Opcional |
| Fotos del consultorio | JPG ≥1200×800 px (mín. 3: fachada, sala de espera, consultorio) | ✅ |
| Estacionamiento | Sí/No, costo | Opcional |
| Accesibilidad para discapacitados | Sí/No, detalles | Recomendado |

---

## 5. CATÁLOGO DE SERVICIOS (CPT `servicio`)

Servicios confirmados por el usuario e integrados como base SEO. El texto publicado es informativo y debe pasar revisión clínica/editorial final antes de campaña:

1. Enfermedad renal crónica.
2. Diabetes e hipertensión con daño renal.
3. Lesión renal aguda.
4. Proteinuria y hematuria.
5. Infecciones urinarias recurrentes.
6. Alteraciones de electrolitos.
7. Litiasis renal.
8. Enfermedades glomerulares.
9. Síndromes cardiorrenales.
10. Hipertensión arterial difícil de controlar.
11. Enfermedad renal en embarazo.
12. Evaluación y seguimiento para trasplante renal.
13. Diálisis peritoneal.
14. Hemodiálisis.
15. Catéteres de hemodiálisis.
16. Accesos vasculares complejos.
17. Biopsia renal de riñón nativo y trasplante.

**Por cada servicio:**

| Campo | Formato |
|-------|---------|
| Nombre del servicio | Texto |
| Descripción corta (excerpt) | 1–2 oraciones (~30 palabras) |
| Descripción extensa | 300–500 palabras (qué es, cuándo se requiere, beneficios) |
| Síntomas que lo justifican | Lista |
| Procedimiento / qué incluye | Lista o párrafos |
| Duración estimada | Texto |
| Preparación previa | Texto (ayuno, estudios) |
| Recuperación / cuidados posteriores | Texto |
| Imagen representativa | JPG/SVG ≥800×800 |
| Precio o rango | Texto o "consultar" (opcional) |
| FAQ relacionadas (Fase 2) | Pregunta/respuesta |

---

## 6. ASSETS GRÁFICOS

| Asset | Formato | Notas |
|-------|---------|-------|
| Originales de marca | PNG | Confirmados en `med-landing-dev/graficos/`; no modificar ni renombrar |
| Logo principal | PNG transparente ≥500 px | Derivado disponible en `assets/images/brand/` |
| Logo horizontal | PNG transparente | Derivados premium y negativo disponibles para header y footer |
| Favicon/isotipo | 512×512 PNG transparente | Derivado disponible como fallback del Site Icon |
| Imagen Open Graph | 1200×630 JPG | Compartir en redes |
| Logos institucionales (UNAM, CMN, SMN, hospitales) | PNG con permiso de uso | Trust section |
| Fotos profesionales del doctor | Mínimo 3 (ver §1) | |
| Fotos de consultorios | Mínimo 3 por sede (ver §4) | |
| Fotos de procedimientos | JPG, sin pacientes identificables | Opcional |

---

## 7. CONTENIDO LEGAL OBLIGATORIO ⚠️ MÉXICO

### 7.1 Aviso de Privacidad (LFPDPPP) — OBLIGATORIO

Conforme a la **Ley Federal de Protección de Datos Personales en Posesión de Particulares**:

- Identidad y domicilio del responsable (médico/clínica)
- Datos personales que se recaban (nombre, contacto, datos de salud — sensibles)
- Finalidades primarias (atención médica, agendar citas, expediente clínico)
- Finalidades secundarias (marketing, encuestas) — con opción de NO consentir
- Transferencias de datos (laboratorios, aseguradoras, hospitales)
- Mecanismos para ejercer derechos ARCO (Acceso, Rectificación, Cancelación, Oposición)
- Datos del encargado de privacidad (email, teléfono)
- Procedimiento para cambios al aviso
- Fecha de última actualización
- Consentimiento expreso para datos sensibles (salud)

**Acción**: el cliente debe proporcionarlo redactado por su abogado, o contratar redacción.

### 7.2 Términos y Condiciones del Sitio

- Identificación del titular
- Naturaleza informativa (no sustituye consulta médica)
- Limitación de responsabilidad
- Propiedad intelectual del contenido
- Uso permitido del sitio
- Política de enlaces externos
- Jurisdicción aplicable (Veracruz, México)
- Modificaciones a los términos

### 7.3 Disclaimer Médico

Texto base pendiente de revisión legal:

> "La información contenida en este sitio web tiene fines exclusivamente informativos y educativos. No sustituye la consulta, diagnóstico o tratamiento médico profesional. Ante cualquier síntoma o duda de salud, acuda a consulta médica presencial."

### 7.4 Aviso COFEPRIS para Publicidad Médica

Conforme al **Reglamento de la Ley General de Salud en Materia de Publicidad**:

- Número de cédula profesional visible en publicidad
- No prometer resultados específicos / curaciones
- No incluir testimonios sin sustento
- Si se publicita un procedimiento, debe estar autorizado
- Permiso de publicidad COFEPRIS si se anuncian tratamientos específicos (número)

### 7.5 Política de Cookies

Si se usa Google Analytics, Meta Pixel, etc.: banner de consentimiento + descripción de cookies.

### 7.6 Política de Cancelación de Citas

- Tiempo mínimo para cancelar sin cargo
- Política de reagendamiento
- Penalizaciones por inasistencia (si aplica)

---

## 8. INFORMACIÓN OPERATIVA

| Dato | Notas |
|------|-------|
| Rango de precios de consulta | "Desde $XXX" o "Consultar" |
| Métodos de pago aceptados | Efectivo, tarjeta, transferencia |
| Aseguradoras con convenio | GNP, AXA, MetLife, etc. |
| ¿Acepta IMSS/ISSSTE/Pemex? | Sí/No |
| Tiempo promedio de consulta | Texto |
| ¿Atiende urgencias? | Sí/No + condiciones |
| Servicio de telemedicina | Sí/No + plataforma |
| Idiomas de atención | Español, inglés, etc. |

---

## 9. PERFILES EXTERNOS Y REDES SOCIALES

Para schema `sameAs` y enlaces de footer:

| Plataforma | Dato | Notas |
|------------|------|-------|
| Google Business Profile (Xalapa) | URL completa | ⚠️ SEO local |
| Google Business Profile (Veracruz) | URL completa | ⚠️ SEO local |
| Facebook | URL | |
| Instagram | URL | |
| LinkedIn | URL | |
| Doctoralia / Top Doctors México | URL del perfil | |
| YouTube (si tiene canal) | URL | |
| Sitio web previo (si existe) | URL | Para redirects |

---

## 10. CONTENIDO ADICIONAL DE TEXTO

| Sección | Necesidad |
|---------|-----------|
| Slogan / tagline | 1 frase corta para hero |
| Mensaje de bienvenida (home) | 1 párrafo |
| "¿Por qué elegirme?" | 3–4 diferenciadores |
| Preguntas frecuentes (Fase 2) | Lista de FAQs |
| Testimonios de pacientes (Fase 2) | Con consentimiento firmado por escrito |

---

## 11. NORMAS OFICIALES MEXICANAS APLICABLES

Cumplimiento informativo para el cliente:

- **NOM-004-SSA3-2012** — Expediente clínico
- **NOM-024-SSA3-2012** — Sistemas de información de registro electrónico
- **NOM-035-SSA3-2012** — Información en salud
- **NOM-005-SSA3-2018** — Atención médica ambulatoria
- **LGS Art. 79, 81, 83** — Ejercicio profesional médico

---

## 12. ENTREGABLE RECOMENDADO PARA EL CLIENTE

Convertir este documento a un **cuestionario PDF / Google Form** organizado por las 9 secciones, con:

- Casillas marcables ✅
- Espacios para texto
- Sección de carga de archivos (fotos, logos, PDFs de cédulas)
- Consentimientos legales firmados
- Indicador "obligatorio" vs "opcional"

---

## Mapeo: Sección de Datos → Archivos del Tema

| Sección | Archivos que la consumen |
|---------|--------------------------|
| §1 Identidad | `page-about.php`, `template-parts/sections/hero.php`, `about-preview.php`, `inc/customizer.php` (doctor_name, doctor_description), `inc/schema-markup.php` |
| §2 Credenciales | `page-about.php` (timeline + certificaciones), `inc/schema-markup.php` (Physician) |
| §3 Contacto | `header.php`, `footer.php`, `cta-floating.php`, `page-contact.php`, `inc/customizer.php` (phone_number, whatsapp_number, contact_email), `inc/helpers.php` |
| §4 Consultorios | `page-location.php`, `page-contact.php`, `template-parts/sections/locations.php`, `inc/customizer.php` (address_xalapa, address_veracruz), `inc/schema-markup.php` (LocalBusiness ×2) |
| §5 Servicios | CPT `servicio` (admin), `page-services.php`, `single-servicio.php`, `template-parts/sections/services-grid.php` |
| §6 Assets | `assets/images/`, theme uploads, Customizer (logo) |
| §7 Legal | Páginas nuevas: `page-privacidad.php`, `page-terminos.php`, `page-cookies.php` + footer links |
| §8 Operativa | `page-contact.php`, FAQ section (Fase 2) |
| §9 Redes | `footer.php`, `inc/customizer.php` (social_*), schema `sameAs` |

---

## Checklist Final Antes de Publicar

- [ ] Cédulas profesionales visibles en footer y about
- [ ] Aviso de Privacidad publicado y enlazado en footer + formularios
- [ ] Disclaimer médico presente
- [ ] Schema Physician valida en Google Rich Results Test
- [ ] Ambos LocalBusiness validan con direcciones reales
- [ ] Google Maps embebido y funcional en ambas ubicaciones
- [ ] WhatsApp dirige al número real con mensaje pre-cargado
- [ ] Formulario de contacto envía a email real (Fluent Forms configurado)
- [ ] Imágenes optimizadas en WebP
- [ ] Todas las redes sociales abren correctamente
- [ ] Política de cookies activa si hay analytics
