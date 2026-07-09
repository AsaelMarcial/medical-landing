import re
import struct
from pathlib import Path


THEME_DIR = Path(__file__).resolve().parent.parent
LANGUAGES_DIR = THEME_DIR / "languages"
TEXT_DOMAIN = "med-landing-dev"

TRANSLATIONS = {
    "Acepta 10 dígitos, +52, espacios o guiones. Ejemplo: 228 123 4567.": "Accepts 10 digits, +52, spaces, or hyphens. Example: 228 123 4567.",
    "Abrir en Google Maps": "Open in Google Maps",
    "Abrir menú": "Open menu",
    "Agenda tu cita hoy y recibe atención especializada para el cuidado de tu salud renal. Consultorios en Xalapa y Boca del Río, Veracruz.": "Request an appointment and receive specialized kidney care. Offices in Xalapa and Boca del Río, Veracruz.",
    "Agenda una consulta para recibir atención especializada.": "Request an appointment for specialized care.",
    "Agendar": "Appointment",
    "Agendar Cita": "Request an Appointment",
    "Agendar aquí": "Request here",
    "Agendar por WhatsApp": "Request via WhatsApp",
    "Agregar Nuevo Servicio": "Add New Service",
    "Agregar Servicio": "Add Service",
    "Acompañamiento para terapias de reemplazo renal cuando la función del riñón requiere soporte especializado.": "Support for renal replacement therapies when kidney function requires specialized care.",
    "Atención especializada en enfermedades del riñón": "Specialized care for kidney diseases",
    "Atención especializada en salud renal para pacientes de %s y sus alrededores.": "Specialized kidney care for patients in %s and surrounding areas.",
    "Atención renal certificada": "Certified kidney care",
    "Boca del Río": "Boca del Río",
    "Breadcrumb": "Breadcrumb",
    "Buscar Servicios": "Search Services",
    "Cambiar idioma a %s": "Switch language to %s",
    "Categorías de servicios": "Service categories",
    "Cerrar menú": "Close menu",
    "Certificación CMN 2025-2030": "CMN Certification 2025-2030",
    "Certificación vigente": "Current certification",
    "Compromiso con tu salud renal": "Committed to your kidney health",
    "Confirma horarios al solicitar tu cita.": "Confirm office hours when requesting your appointment.",
    "Confirma horarios y disponibilidad al solicitar tu cita.": "Confirm office hours and availability when requesting your appointment.",
    "Conocer más": "Learn more",
    "Consulta de Nefrología en %1$s, %2$s": "Nephrology Consultation in %1$s, %2$s",
    "Consulta de nefrología en %s, Veracruz.": "Nephrology consultation in %s, Veracruz.",
    "Consulta de nefrología en Xalapa y Boca del Río, Veracruz.": "Nephrology consultations in Xalapa and Boca del Río, Veracruz.",
    "Consulta nefrológica para enfermedad renal, alteraciones en estudios de orina o sangre, hipertensión difícil de controlar y terapias de reemplazo renal.": "Nephrology consultation for kidney disease, abnormal blood or urine tests, difficult-to-control high blood pressure, and renal replacement therapies.",
    "Consulta el mapa y abre la ruta de la sede que prefieras.": "View the map and open directions to your preferred office.",
    "Consulta en Boca del Río": "Boca del Río office",
    "Consulta en Xalapa": "Xalapa office",
    "Consulta especializada en nefrología con información profesional verificable y sedes en Xalapa y Boca del Río, Veracruz.": "Specialized nephrology care with verifiable professional information and offices in Xalapa and Boca del Río, Veracruz.",
    "Consultorios": "Offices",
    "Contactar por WhatsApp": "Contact via WhatsApp",
    "Contacto": "Contact",
    "Contacto directo": "Direct contact",
    "Contenido educativo y novedades de salud renal.": "Educational content and kidney health updates.",
    "Configura español e inglés en Polylang para mostrar el botón de idioma.": "Configure Spanish and English in Polylang to display the language button.",
    "Cédula de especialidad": "Specialty license",
    "Cédula profesional": "Professional license",
    "Cédulas profesionales": "Professional licenses",
    "Cómo llegar": "Directions",
    "Cómo llegar en Google Maps →": "Directions in Google Maps →",
    "Cómo llegar →": "Directions →",
    "Descripción corta del Doctor": "Short Doctor Description",
    "Direcciones": "Addresses",
    "Dirección": "Address",
    "Dirección Boca del Río": "Boca del Río Address",
    "Dirección Xalapa": "Xalapa Address",
    "Disponibilidad": "Availability",
    "Disponible en consulta": "Available during consultation",
    "Dos consultorios con el mismo teléfono de contacto para agendar cita.": "Two offices using the same contact phone number for appointments.",
    "Déjalo en 0 hasta crear y probar el formulario de contacto.": "Leave this at 0 until the contact form has been created and tested.",
    "Editar Servicio": "Edit Service",
    "El botón de idioma necesita Polylang activo y configurado.": "The language button requires Polylang to be active and configured.",
    "El formulario de citas se habilitará después de configurar su recepción y aviso de privacidad. Mientras tanto, utiliza los canales de contacto disponibles o consulta las ubicaciones.": "The appointment form will be enabled after delivery settings and the privacy notice are configured. In the meantime, use the available contact options or view the office locations.",
    "Email de Contacto": "Contact Email",
    "Enfermedades del riñón": "Kidney diseases",
    "Enfermedades que atiende": "Conditions treated",
    "English": "English",
    "Enlace de Google Maps - Boca del Río": "Google Maps Link - Boca del Río",
    "Enlace de Google Maps - Xalapa": "Google Maps Link - Xalapa",
    "Enlaces": "Links",
    "Envíanos un mensaje": "Send us a message",
    "Escribir por WhatsApp": "Message via WhatsApp",
    "Español": "Español",
    "Especialidad": "Specialty",
    "Especialista en Nefrología certificado, con atención en Xalapa y Boca del Río para valoración de enfermedades renales, terapias de reemplazo renal y procedimientos nefrológicos seleccionados.": "Certified nephrology specialist providing care in Xalapa and Boca del Río for kidney disease assessment, renal replacement therapies, and selected nephrology procedures.",
    "Estamos para ayudarte. Agenda tu cita o envíanos un mensaje.": "We are here to help. Request an appointment or send us a message.",
    "Formulario en configuración": "Form being configured",
    "Formación profesional y certificación": "Professional training and certification",
    "Hola, me gustaría agendar una cita en %s.": "Hello, I would like to request an appointment in %s.",
    "Hola, me gustaría agendar una valoración de nefrología.": "Hello, I would like to request a nephrology assessment.",
    "Hola, me gustaría solicitar información para una cita.": "Hello, I would like information about requesting an appointment.",
    "Hola, me gustaría solicitar información para agendar una cita.": "Hello, I would like information about requesting an appointment.",
    "Hola, me interesa el servicio de %s.": "Hello, I am interested in the %s service.",
    "Hola, quisiera una cita en %s.": "Hello, I would like an appointment in %s.",
    "ID del formulario Fluent Forms": "Fluent Forms Form ID",
    "Información general para orientar la consulta; el diagnóstico y tratamiento requieren valoración médica individual.": "General information to guide the consultation; diagnosis and treatment require an individual medical assessment.",
    "Información profesional publicada con enfoque verificable y sin sustituir la valoración médica individual.": "Professional information published with a verifiable approach and without replacing individual medical assessment.",
    "Información de Contacto": "Contact Information",
    "Inicio": "Home",
    "Instagram oficial": "Official Instagram",
    "Llamar": "Call",
    "Llamar Ahora": "Call Now",
    "Llamar ahora": "Call now",
    "Leer más": "Read more",
    "Legal": "Legal",
    "Lo sentimos, la página que buscas no existe o fue movida.": "Sorry, the page you are looking for does not exist or has moved.",
    "Mapa del consultorio en %s": "Office map in %s",
    "Medical Landing:": "Medical Landing:",
    "Menú Footer": "Footer Menu",
    "Menú Principal": "Primary Menu",
    "Menú mobile": "Mobile menu",
    "Mensaje inicial de WhatsApp": "Initial WhatsApp message",
    "Membresías profesionales": "Professional memberships",
    "Más información": "More information",
    "Navegación principal": "Primary navigation",
    "Nefrólogo en %s": "Nephrologist in %s",
    "No se encontraron servicios": "No services found",
    "Nombre del Consultorio": "Office Name",
    "Nombre del Doctor": "Doctor Name",
    "Procedimientos nefrológicos": "Nephrology procedures",
    "Procedimientos nefrológicos seleccionados y coordinación de accesos para pacientes que lo requieren.": "Selected nephrology procedures and access coordination for patients who require them.",
    "Página no encontrada": "Page not found",
    "Redes Sociales": "Social Media",
    "Retrato profesional de %s": "Professional portrait of %s",
    "Saltar al contenido": "Skip to content",
    "Salud renal": "Kidney health",
    "Se utiliza como mensaje general; las páginas pueden añadir contexto específico.": "Used as the general message; individual pages can add specific context.",
    "Servicio": "Service",
    "Servicios": "Services",
    "Servicios de nefrología": "Nephrology services",
    "Sobre el Doctor": "About the Doctor",
    "Solicitar información": "Request information",
    "Teléfono": "Phone",
    "Terapias de reemplazo renal": "Renal replacement therapies",
    "Todos los Servicios": "All Services",
    "Todos los derechos reservados.": "All rights reserved.",
    "Trayectoria académica": "Academic background",
    "URL de mapa insertado - Boca del Río": "Embedded Map URL - Boca del Río",
    "URL de mapa insertado - Xalapa": "Embedded Map URL - Xalapa",
    "Ubicaciones de consulta": "Office locations",
    "Usa únicamente el valor src del iframe de Google Maps.": "Use only the src value from the Google Maps iframe.",
    "Valoración de enfermedades y alteraciones que pueden afectar la función renal, la orina, la presión arterial o el equilibrio de líquidos y minerales.": "Assessment of diseases and changes that may affect kidney function, urine, blood pressure, or fluid and mineral balance.",
    "Valoración y seguimiento de enfermedad renal, terapias de reemplazo renal y procedimientos nefrológicos seleccionados en Xalapa y Boca del Río.": "Assessment and follow-up for kidney disease, renal replacement therapies, and selected nephrology procedures in Xalapa and Boca del Río.",
    "Ver Servicio": "View Service",
    "Verificar en CONACEM": "Verify on CONACEM",
    "Ver detalles →": "View details →",
    "Ver Instagram": "View Instagram",
    "Ver todos los servicios": "View all services",
    "Valoración renal": "Kidney assessment",
    "Ver ubicaciones": "View locations",
    "Volver al inicio": "Return home",
    "WhatsApp": "WhatsApp",
    "WhatsApp (con código de país)": "WhatsApp (with country code)",
    "Xalapa": "Xalapa",
    "Xalapa y Boca del Río": "Xalapa and Boca del Río",
    "¿Necesitas este servicio?": "Do you need this service?",
    "¿Necesitas una consulta nefrológica?": "Do you need a nephrology consultation?",
}


def extract_strings():
    pattern = re.compile(
        r"(?:__|_e|esc_html__|esc_html_e|esc_attr__|esc_attr_e)"
        r"\(\s*(['\"])(.*?)\1\s*,\s*['\"]" + re.escape(TEXT_DOMAIN) + r"['\"]",
        re.S,
    )
    strings = set()

    for path in THEME_DIR.rglob("*.php"):
        for _, string in pattern.findall(path.read_text(encoding="utf-8")):
            strings.add(string)

    return sorted(strings)


def po_escape(value):
    return value.replace("\\", "\\\\").replace('"', '\\"').replace("\n", "\\n")


def write_po(path, strings, translated):
    header = (
        "Project-Id-Version: Medical Landing 1.5.7\\n"
        "Language: en_US\\n"
        "MIME-Version: 1.0\\n"
        "Content-Type: text/plain; charset=UTF-8\\n"
        "Content-Transfer-Encoding: 8bit\\n"
        "Plural-Forms: nplurals=2; plural=(n != 1);\\n"
    )
    lines = [
        'msgid ""',
        'msgstr "' + po_escape(header) + '"',
        "",
    ]

    for string in strings:
        lines.extend(
            [
                f'msgid "{po_escape(string)}"',
                f'msgstr "{po_escape(translated.get(string, ""))}"',
                "",
            ]
        )

    path.write_text("\n".join(lines), encoding="utf-8")


def write_pot(path, strings):
    lines = [
        'msgid ""',
        'msgstr "Project-Id-Version: Medical Landing 1.5.7\\nMIME-Version: 1.0\\nContent-Type: text/plain; charset=UTF-8\\n"',
        "",
    ]

    for string in strings:
        lines.extend([f'msgid "{po_escape(string)}"', 'msgstr ""', ""])

    path.write_text("\n".join(lines), encoding="utf-8")


def write_mo(path, messages):
    catalog = {
        "": (
            "Project-Id-Version: Medical Landing 1.5.7\n"
            "Language: en_US\n"
            "MIME-Version: 1.0\n"
            "Content-Type: text/plain; charset=UTF-8\n"
            "Content-Transfer-Encoding: 8bit\n"
            "Plural-Forms: nplurals=2; plural=(n != 1);\n"
        ),
        **messages,
    }
    items = sorted((key.encode("utf-8"), value.encode("utf-8")) for key, value in catalog.items())
    count = len(items)
    key_offset = 7 * 4 + count * 16
    value_offset = key_offset + sum(len(key) + 1 for key, _ in items)
    key_table = []
    value_table = []
    key_data = bytearray()
    value_data = bytearray()

    for key, value in items:
        key_table.append((len(key), key_offset + len(key_data)))
        value_table.append((len(value), value_offset + len(value_data)))
        key_data.extend(key + b"\0")
        value_data.extend(value + b"\0")

    output = bytearray(
        struct.pack(
            "<7I",
            0x950412DE,
            0,
            count,
            7 * 4,
            7 * 4 + count * 8,
            0,
            0,
        )
    )
    for length, offset in key_table:
        output.extend(struct.pack("<2I", length, offset))
    for length, offset in value_table:
        output.extend(struct.pack("<2I", length, offset))
    output.extend(key_data)
    output.extend(value_data)
    path.write_bytes(output)


def main():
    strings = extract_strings()
    missing = sorted(set(strings) - set(TRANSLATIONS))
    obsolete = sorted(set(TRANSLATIONS) - set(strings))

    if missing:
        raise SystemExit("Missing translations:\n- " + "\n- ".join(missing))
    if obsolete:
        raise SystemExit("Obsolete translations:\n- " + "\n- ".join(obsolete))

    LANGUAGES_DIR.mkdir(parents=True, exist_ok=True)
    write_pot(LANGUAGES_DIR / f"{TEXT_DOMAIN}.pot", strings)
    write_po(LANGUAGES_DIR / f"{TEXT_DOMAIN}-en_US.po", strings, TRANSLATIONS)
    write_mo(LANGUAGES_DIR / f"{TEXT_DOMAIN}-en_US.mo", TRANSLATIONS)
    write_po(LANGUAGES_DIR / "en_US.po", strings, TRANSLATIONS)
    write_mo(LANGUAGES_DIR / "en_US.mo", TRANSLATIONS)
    print(f"Built {len(strings)} translations.")


if __name__ == "__main__":
    main()
