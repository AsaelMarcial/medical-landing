# Información a Solicitar al Médico — Landing Nefrólogo

> Documento maestro con TODA la información que el cliente (médico nefrólogo) debe proporcionar antes de publicar el sitio. Organizado en 9 bloques + legales obligatorios para México (LFPDPPP, COFEPRIS, NOM).

---

## RESUMEN EJECUTIVO

Necesitamos **9 bloques de información**:

1. **Identidad profesional** del médico (nombre, foto, bio, especialidad)
2. **Credenciales médicas verificables** (cédulas, universidad, certificaciones)
3. **Datos de contacto** (teléfono, WhatsApp, email, redes)
4. **Información de cada consultorio** (Xalapa + Veracruz: dirección, horarios, mapa, fotos)
5. **Catálogo de servicios médicos** (uno por uno con detalle clínico)
6. **Assets gráficos** (logos propios e institucionales, fotos profesionales)
7. **Contenido legal obligatorio** (Aviso de Privacidad, T&C, Disclaimer médico, COFEPRIS)
8. **Información operativa** (precios/rangos, métodos de pago, seguros, política de cancelación)
9. **Perfiles externos** (Google Business, Doctoralia, redes sociales)

> ⚠️ **CRÍTICO**: Sin las **cédulas profesionales** y el **Aviso de Privacidad** NO se puede publicar legalmente en México.

---

## 1. IDENTIDAD PROFESIONAL DEL MÉDICO

| Dato | Formato | Obligatorio | Notas |
|------|---------|-------------|-------|
| Nombre completo con título | Texto (ej: "Dr. Juan Pérez García") | ✅ | Hero, schema Physician, header |
| Especialidad principal | Texto ("Médico Nefrólogo") | ✅ | |
| Subespecialidades | Lista (trasplante, hemodiálisis…) | Opcional | |
| Años de experiencia | Número | ✅ | Actualmente hardcodeado "+10 años" |
| Biografía corta | 60–80 palabras | ✅ | Hero / about-preview |
| Biografía extendida | 200–300 palabras (2-3 párrafos) | ✅ | Página "Sobre el Doctor" |
| Filosofía de atención | Texto | Opcional | Sección filosofía |
| Foto profesional principal | JPG/PNG ≥1200×1600 px, vertical 3:4, fondo neutro, bata blanca | ✅ | |
| Foto secundaria (acción/consultorio) | JPG/PNG ≥1200×800 px | Opcional | Banners |
| Idiomas que habla | Lista | Opcional | Pacientes internacionales |
| Género (Dr./Dra.) | Selección | ✅ | Tratamiento correcto |

---

## 2. CREDENCIALES MÉDICAS VERIFICABLES ⚠️ CRÍTICO

> Requerido por COFEPRIS y NOM-004-SSA3-2012.

### 2.1 Cédulas Profesionales (OBLIGATORIO publicar)

| Dato | Formato | Notas |
|------|---------|-------|
| **Cédula profesional general** (Médico Cirujano) | 7–8 dígitos | SEP — verificable en cedulaprofesional.sep.gob.mx |
| **Cédula de especialidad** (Nefrología) | Número | OBLIGATORIA junto al nombre |
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
| Consejo Mexicano de Nefrología (CMN) | Número de socio, vigencia, fecha de recertificación |
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

| Dato | Formato | Obligatorio |
|------|---------|-------------|
| Teléfono fijo del consultorio | +52 con lada | ✅ |
| WhatsApp Business | +52, 10 dígitos | ✅ |
| Email de contacto público | email@dominio | ✅ |
| Email administrativo (formularios) | email@dominio | ✅ |
| Mensaje predefinido WhatsApp | Texto | Opcional |
| Extensión / Recepcionista | Texto | Opcional |

---

## 4. CONSULTORIOS (×2)

Mismo bloque completo para Xalapa **y** Veracruz:

| Dato | Formato | Obligatorio |
|------|---------|-------------|
| Nombre del consultorio/hospital | Texto | ✅ |
| Calle y número | Texto | ✅ |
| Colonia / fraccionamiento | Texto | ✅ |
| Código postal | 5 dígitos | ✅ |
| Ciudad / municipio | Xalapa / Veracruz | ✅ |
| Estado | Veracruz | ✅ |
| Referencias / cómo llegar | Texto libre | Recomendado |
| Coordenadas GPS (lat, lng) | Decimal | ✅ (schema y mapa) |
| URL embed de Google Maps | iframe src | ✅ |
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

Servicios identificados en código (mínimo):

1. Consulta Nefrológica
2. Hemodiálisis
3. Trasplante Renal (evaluación pre/post)
4. Hipertensión Arterial
5. Nefropatía Diabética
6. Litiasis Renal (cálculos)

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
| Logo principal | SVG (preferido) o PNG transparente ≥500 px | Header |
| Logo blanco/inverso | PNG transparente | Footer oscuro |
| Favicon | 512×512 PNG | |
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

### 7.3 Disclaimer Médico (CRÍTICO)

Texto obligatorio:

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
