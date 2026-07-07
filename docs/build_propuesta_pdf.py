from pathlib import Path

from reportlab.lib import colors
from reportlab.lib.enums import TA_CENTER, TA_JUSTIFY, TA_LEFT, TA_RIGHT
from reportlab.lib.pagesizes import LETTER
from reportlab.lib.styles import ParagraphStyle, getSampleStyleSheet
from reportlab.lib.units import inch
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont
from reportlab.platypus import (
    BaseDocTemplate,
    Frame,
    Image,
    KeepTogether,
    ListFlowable,
    ListItem,
    NextPageTemplate,
    PageBreak,
    PageTemplate,
    Paragraph,
    Spacer,
    Table,
    TableStyle,
)


ROOT = Path(__file__).resolve().parent.parent
DOCS = ROOT / "docs"
OUTPUT = DOCS / "PROPUESTA-COMERCIAL-DR-EDGAR-HERNANDEZ.pdf"
LOGO = ROOT / "med-landing-dev" / "assets" / "images" / "brand" / "logo-horizontal-premium.png"

PRIMARY = colors.HexColor("#344729")
SECONDARY = colors.HexColor("#4A5942")
ACCENT = colors.HexColor("#7C2804")
GOLD = colors.HexColor("#C8B070")
SURFACE = colors.HexColor("#F7F7F7")
TEXT = colors.HexColor("#243126")
MUTED = colors.HexColor("#5F6B5A")
LIGHT_GOLD = colors.HexColor("#F3EBD5")
LIGHT_GREEN = colors.HexColor("#E9EEE6")
WHITE = colors.white


def register_fonts():
    fonts = Path("C:/Windows/Fonts")
    regular = fonts / "arial.ttf"
    bold = fonts / "arialbd.ttf"
    italic = fonts / "ariali.ttf"
    if regular.exists() and bold.exists():
        pdfmetrics.registerFont(TTFont("Proposal", regular))
        pdfmetrics.registerFont(TTFont("Proposal-Bold", bold))
        if italic.exists():
            pdfmetrics.registerFont(TTFont("Proposal-Italic", italic))
        else:
            pdfmetrics.registerFont(TTFont("Proposal-Italic", regular))
    else:
        pdfmetrics.registerFont(TTFont("Proposal", fonts / "calibri.ttf"))
        pdfmetrics.registerFont(TTFont("Proposal-Bold", fonts / "calibrib.ttf"))
        pdfmetrics.registerFont(TTFont("Proposal-Italic", fonts / "calibrii.ttf"))


def build_styles():
    base = getSampleStyleSheet()
    styles = {
        "body": ParagraphStyle(
            "ProposalBody",
            parent=base["BodyText"],
            fontName="Proposal",
            fontSize=10.3,
            leading=14.2,
            textColor=TEXT,
            alignment=TA_JUSTIFY,
            spaceAfter=7,
        ),
        "small": ParagraphStyle(
            "ProposalSmall",
            parent=base["BodyText"],
            fontName="Proposal",
            fontSize=8.4,
            leading=11,
            textColor=MUTED,
        ),
        "h1": ParagraphStyle(
            "ProposalH1",
            parent=base["Heading1"],
            fontName="Proposal-Bold",
            fontSize=15.5,
            leading=18,
            textColor=PRIMARY,
            spaceBefore=13,
            spaceAfter=7,
            keepWithNext=True,
        ),
        "h2": ParagraphStyle(
            "ProposalH2",
            parent=base["Heading2"],
            fontName="Proposal-Bold",
            fontSize=12,
            leading=15,
            textColor=SECONDARY,
            spaceBefore=8,
            spaceAfter=4,
            keepWithNext=True,
        ),
        "cover_title": ParagraphStyle(
            "CoverTitle",
            parent=base["Title"],
            fontName="Proposal-Bold",
            fontSize=24,
            leading=28,
            textColor=PRIMARY,
            alignment=TA_CENTER,
            spaceAfter=6,
        ),
        "cover_subtitle": ParagraphStyle(
            "CoverSubtitle",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=13.5,
            leading=17,
            textColor=ACCENT,
            alignment=TA_CENTER,
            spaceAfter=8,
        ),
        "cover_doctor": ParagraphStyle(
            "CoverDoctor",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=11.5,
            leading=15,
            textColor=SECONDARY,
            alignment=TA_CENTER,
            spaceAfter=20,
        ),
        "cover_price_label": ParagraphStyle(
            "CoverPriceLabel",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=9.5,
            leading=12,
            textColor=MUTED,
            alignment=TA_CENTER,
        ),
        "cover_price": ParagraphStyle(
            "CoverPrice",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=26,
            leading=30,
            textColor=ACCENT,
            alignment=TA_CENTER,
            spaceAfter=2,
        ),
        "cover_total": ParagraphStyle(
            "CoverTotal",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=10.2,
            leading=13,
            textColor=PRIMARY,
            alignment=TA_CENTER,
        ),
        "table": ParagraphStyle(
            "TableBody",
            parent=base["BodyText"],
            fontName="Proposal",
            fontSize=8.2,
            leading=10.5,
            textColor=TEXT,
            spaceAfter=0,
        ),
        "table_bold": ParagraphStyle(
            "TableBold",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=8.2,
            leading=10.5,
            textColor=TEXT,
            spaceAfter=0,
        ),
        "table_head": ParagraphStyle(
            "TableHead",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=8.2,
            leading=10,
            textColor=WHITE,
            alignment=TA_CENTER,
            spaceAfter=0,
        ),
        "callout_title": ParagraphStyle(
            "CalloutTitle",
            parent=base["BodyText"],
            fontName="Proposal-Bold",
            fontSize=10.2,
            leading=13,
            textColor=PRIMARY,
            spaceAfter=3,
        ),
        "callout_body": ParagraphStyle(
            "CalloutBody",
            parent=base["BodyText"],
            fontName="Proposal",
            fontSize=9.5,
            leading=13,
            textColor=TEXT,
            spaceAfter=0,
        ),
        "signature": ParagraphStyle(
            "Signature",
            parent=base["BodyText"],
            fontName="Proposal",
            fontSize=9.5,
            leading=15,
            textColor=TEXT,
            alignment=TA_CENTER,
        ),
    }
    return styles


def paragraph(text, styles, style="body"):
    return Paragraph(text, styles[style])


def bullets(items, styles, ordered=False):
    return ListFlowable(
        [
            ListItem(
                Paragraph(item, styles["body"]),
                leftIndent=13,
                value=index + 1 if ordered else None,
            )
            for index, item in enumerate(items)
        ],
        bulletType="1" if ordered else "bullet",
        bulletFontName="Proposal-Bold",
        bulletFontSize=8,
        bulletColor=PRIMARY,
        leftIndent=22,
        bulletOffsetY=1,
        spaceAfter=5,
    )


def callout(title, body, styles, fill=LIGHT_GOLD):
    content = [
        Paragraph(title, styles["callout_title"]),
        Paragraph(body, styles["callout_body"]),
    ]
    table = Table([[content]], colWidths=[6.45 * inch], hAlign="LEFT")
    table.setStyle(
        TableStyle(
            [
                ("BACKGROUND", (0, 0), (-1, -1), fill),
                ("BOX", (0, 0), (-1, -1), 0.5, GOLD),
                ("LEFTPADDING", (0, 0), (-1, -1), 11),
                ("RIGHTPADDING", (0, 0), (-1, -1), 11),
                ("TOPPADDING", (0, 0), (-1, -1), 9),
                ("BOTTOMPADDING", (0, 0), (-1, -1), 9),
            ]
        )
    )
    return KeepTogether([table, Spacer(1, 7)])


def styled_table(headers, rows, widths, styles, right_last=False):
    data = [[Paragraph(header, styles["table_head"]) for header in headers]]
    for row in rows:
        rendered = []
        for index, value in enumerate(row):
            style = "table_bold" if value.startswith("TOTAL") else "table"
            rendered.append(Paragraph(value, styles[style]))
        data.append(rendered)

    table = Table(data, colWidths=widths, repeatRows=1, hAlign="LEFT")
    commands = [
        ("BACKGROUND", (0, 0), (-1, 0), PRIMARY),
        ("GRID", (0, 0), (-1, -1), 0.4, colors.HexColor("#CCD5C8")),
        ("VALIGN", (0, 0), (-1, -1), "MIDDLE"),
        ("LEFTPADDING", (0, 0), (-1, -1), 7),
        ("RIGHTPADDING", (0, 0), (-1, -1), 7),
        ("TOPPADDING", (0, 0), (-1, -1), 6),
        ("BOTTOMPADDING", (0, 0), (-1, -1), 6),
    ]
    for row_index in range(1, len(data)):
        if row_index % 2:
            commands.append(("BACKGROUND", (0, row_index), (-1, row_index), SURFACE))
    if right_last:
        commands.append(("ALIGN", (-1, 1), (-1, -1), "RIGHT"))
    table.setStyle(TableStyle(commands))
    return table


class ProposalDocument(BaseDocTemplate):
    def __init__(self, filename):
        super().__init__(
            filename,
            pagesize=LETTER,
            leftMargin=0.85 * inch,
            rightMargin=0.85 * inch,
            topMargin=0.72 * inch,
            bottomMargin=0.66 * inch,
            title="Propuesta Comercial - Dr. Edgar E. Hernández",
            author="Asael Marcial Grajales",
            subject="Landing WordPress profesional y bilingüe",
        )
        cover_frame = Frame(
            self.leftMargin,
            self.bottomMargin,
            self.width,
            self.height,
            id="cover",
            leftPadding=0,
            rightPadding=0,
            topPadding=0,
            bottomPadding=0,
        )
        body_frame = Frame(
            self.leftMargin,
            self.bottomMargin,
            self.width,
            self.height,
            id="body",
            leftPadding=0,
            rightPadding=0,
            topPadding=0,
            bottomPadding=0,
        )
        self.addPageTemplates(
            [
                PageTemplate(id="Cover", frames=[cover_frame], onPage=self.draw_cover_page),
                PageTemplate(id="Body", frames=[body_frame], onPage=self.draw_body_page),
            ]
        )

    @staticmethod
    def draw_cover_page(canvas, doc):
        canvas.saveState()
        canvas.setFillColor(PRIMARY)
        canvas.rect(0, LETTER[1] - 0.16 * inch, LETTER[0], 0.16 * inch, fill=1, stroke=0)
        canvas.setFillColor(GOLD)
        canvas.rect(0, 0, LETTER[0], 0.11 * inch, fill=1, stroke=0)
        canvas.restoreState()

    @staticmethod
    def draw_body_page(canvas, doc):
        canvas.saveState()
        canvas.setStrokeColor(GOLD)
        canvas.setLineWidth(0.6)
        canvas.line(doc.leftMargin, LETTER[1] - 0.48 * inch, LETTER[0] - doc.rightMargin, LETTER[1] - 0.48 * inch)
        canvas.setFont("Proposal-Bold", 7.5)
        canvas.setFillColor(MUTED)
        canvas.drawString(doc.leftMargin, LETTER[1] - 0.38 * inch, "DR. EDGAR E. HERNÁNDEZ  |  PROPUESTA WORDPRESS")
        canvas.setFont("Proposal", 7.5)
        canvas.drawCentredString(LETTER[0] / 2, 0.34 * inch, "Propuesta comercial · 8 de junio de 2026")
        canvas.drawRightString(LETTER[0] - doc.rightMargin, 0.34 * inch, str(doc.page))
        canvas.restoreState()


def build_pdf():
    register_fonts()
    styles = build_styles()
    doc = ProposalDocument(str(OUTPUT))
    story = []

    story.extend(
        [
            Spacer(1, 0.42 * inch),
            Image(str(LOGO), width=3.85 * inch, height=1.09 * inch),
            Spacer(1, 0.35 * inch),
            Paragraph("PROPUESTA COMERCIAL", styles["cover_title"]),
            Paragraph("Landing WordPress profesional y bilingüe", styles["cover_subtitle"]),
            Paragraph("Dr. Edgar E. Hernández · Nefrología", styles["cover_doctor"]),
        ]
    )
    cover_data = [
        [
            Paragraph("<b>Cobertura</b>", styles["table_bold"]),
            Paragraph("Xalapa y Boca del Río, Veracruz", styles["table"]),
        ],
        [
            Paragraph("<b>Fecha</b>", styles["table_bold"]),
            Paragraph("8 de junio de 2026", styles["table"]),
        ],
        [
            Paragraph("<b>Preparado por</b>", styles["table_bold"]),
            Paragraph("Asael Marcial Grajales", styles["table"]),
        ],
        [
            Paragraph("<b>Contacto</b>", styles["table_bold"]),
            Paragraph("2281565984 · asael_marcial@hotmail.com", styles["table"]),
        ],
    ]
    cover_table = Table(cover_data, colWidths=[1.4 * inch, 5.05 * inch], hAlign="CENTER")
    cover_table.setStyle(
        TableStyle(
            [
                ("BACKGROUND", (0, 0), (0, -1), LIGHT_GREEN),
                ("GRID", (0, 0), (-1, -1), 0.45, colors.HexColor("#CCD5C8")),
                ("VALIGN", (0, 0), (-1, -1), "MIDDLE"),
                ("LEFTPADDING", (0, 0), (-1, -1), 9),
                ("RIGHTPADDING", (0, 0), (-1, -1), 9),
                ("TOPPADDING", (0, 0), (-1, -1), 8),
                ("BOTTOMPADDING", (0, 0), (-1, -1), 8),
            ]
        )
    )
    story.extend(
        [
            cover_table,
            Spacer(1, 0.38 * inch),
            Paragraph("Honorario base", styles["cover_price_label"]),
            Paragraph("MXN 6,000", styles["cover_price"]),
            Paragraph("Total con IVA trasladado mediante CFDI: MXN 7,000", styles["cover_total"]),
            NextPageTemplate("Body"),
            PageBreak(),
        ]
    )

    story.extend(
        [
            Paragraph("1. Resumen de la propuesta", styles["h1"]),
            paragraph(
                "Se propone diseñar, completar, configurar y publicar un sitio WordPress personalizado para el Dr. Edgar E. Hernández. El proyecto estará orientado a presentar sus servicios de nefrología, facilitar el contacto y la solicitud de citas, fortalecer su presencia profesional y apoyar el posicionamiento local en Xalapa y Boca del Río.",
                styles,
            ),
            paragraph(
                "El sistema utilizará un tema WordPress desarrollado específicamente para el proyecto, sin constructores visuales pesados. El cliente será propietario de su dominio, cuenta de hosting y contenidos. El costo de dominio, hosting, correo y servicios externos será contratado y pagado directamente por el cliente.",
                styles,
            ),
            callout(
                "Resultado esperado",
                "Un sitio médico profesional, rápido, bilingüe, administrable y preparado para captar solicitudes de cita y crecer mediante SEO local y contenidos de salud renal.",
                styles,
            ),
            Paragraph("2. Qué incluirá el sitio", styles["h1"]),
        ]
    )

    included = [
        (
            "Identidad y experiencia visual",
            [
                "Identidad gráfica, logo, isotipo, favicon y paleta institucional.",
                "Diseño responsive para computadora, tableta y teléfono.",
                "Navegación, menú móvil, pie de página y llamadas a la acción.",
                "Optimización de imágenes y estructura ligera sin page builders.",
            ],
        ),
        (
            "Páginas y contenido",
            [
                "Inicio, Sobre el Doctor, Servicios, Contacto y páginas para ambas sedes.",
                "Página individual para cada servicio médico aprobado.",
                "Blog de salud renal, preguntas frecuentes y testimonios autorizados.",
                "Páginas legales proporcionadas o aprobadas por el cliente.",
            ],
        ),
        (
            "Contacto, mapas y conversión",
            [
                "Formulario de contacto y solicitud de cita mediante Fluent Forms.",
                "WhatsApp, click-to-call, mensajes predefinidos y notificaciones por correo.",
                "Mapas interactivos de Torre Hakim y Hospital MediMAC.",
                "Consentimiento de privacidad y botones para abrir rutas en Google Maps.",
            ],
        ),
        (
            "SEO, bilingüe y crecimiento",
            [
                "Rank Math, sitemap, metadatos, canonical, robots y schema.",
                "SEO local para Xalapa y Boca del Río.",
                "Español e inglés mediante Polylang.",
                "Google Search Console, Analytics y Google Business cuando existan accesos.",
            ],
        ),
    ]
    for heading, items in included:
        story.extend([Paragraph(heading, styles["h2"]), bullets(items, styles)])

    story.extend(
        [
            Paragraph("3. Estado actual y trabajo restante", styles["h1"]),
            paragraph(
                "Actualmente ya existe una base funcional del tema, la identidad visual, las páginas principales, las dos ubicaciones, los mapas y la estructura inicial de SEO.",
                styles,
            ),
            bullets(
                [
                    "Recibir e integrar información profesional, clínica y fotografías aprobadas.",
                    "Confirmar teléfono, WhatsApp, correo, horarios y contenido de servicios.",
                    "Configurar formularios, privacidad, notificaciones y páginas legales.",
                    "Configurar SEO, multilenguaje, blog, FAQ y testimonios autorizados.",
                    "Ejecutar pruebas de accesibilidad, rendimiento, navegación y publicación.",
                ],
                styles,
                ordered=True,
            ),
            Paragraph("4. Información que deberá entregar el cliente", styles["h1"]),
            bullets(
                [
                    "Nombre profesional, cédulas y credenciales que deban publicarse.",
                    "Biografía, formación, certificaciones y membresías verificables.",
                    "Fotografía profesional y fotografías autorizadas.",
                    "Teléfono, WhatsApp, correo, horarios y descripciones de servicios.",
                    "Aviso de privacidad y textos legales revisados.",
                    "Testimonios con autorización escrita, si se publicarán.",
                    "Accesos o autorizaciones de dominio, hosting y servicios de Google.",
                ],
                styles,
            ),
            callout(
                "Criterio de publicación",
                "No se publicarán certificaciones, cifras, instituciones, testimonios ni afirmaciones médicas que no hayan sido confirmadas por el cliente.",
                styles,
                fill=LIGHT_GREEN,
            ),
            Paragraph("5. Tiempo estimado", styles["h1"]),
            paragraph(
                "El tiempo estimado para completar el proyecto es de <b>4 a 6 semanas</b>.",
                styles,
            ),
            Paragraph("6. Inversión", styles["h1"]),
            styled_table(
                ["Concepto", "Importe"],
                [
                    ("Desarrollo completo de la landing web", "MXN 6,000.00"),
                    ("IVA 16%, cuando corresponda emitir CFDI", "MXN 1,000.00"),
                    ("TOTAL CON FACTURA", "MXN 7,000.00"),
                    ("TOTAL SIN FACTURA", "MXN 6,000.00"),
                ],
                [4.65 * inch, 1.8 * inch],
                styles,
                right_last=True,
            ),
            Spacer(1, 5),
            paragraph(
                "El precio incluye las Fases 1 y 2, versión bilingüe, configuración, pruebas y publicación.",
                styles,
            ),
            Paragraph("Forma de pago", styles["h2"]),
        ]
    )

    payment_data = [
        [
            Paragraph("Sin solicitud de CFDI", styles["table_head"]),
            Paragraph("Con CFDI e IVA trasladado", styles["table_head"]),
        ],
        [
            Paragraph("<b>50% al iniciar:</b> MXN 3,000.00<br/><b>50% antes de publicar:</b> MXN 3,000.00", styles["table"]),
            Paragraph("<b>50% al iniciar:</b> MXN 3,500.00<br/><b>50% antes de publicar:</b> MXN 3,500.00", styles["table"]),
        ],
    ]
    payment = Table(payment_data, colWidths=[3.225 * inch, 3.225 * inch], hAlign="LEFT")
    payment.setStyle(
        TableStyle(
            [
                ("BACKGROUND", (0, 0), (0, 0), PRIMARY),
                ("BACKGROUND", (1, 0), (1, 0), ACCENT),
                ("BACKGROUND", (0, 1), (0, 1), LIGHT_GREEN),
                ("BACKGROUND", (1, 1), (1, 1), LIGHT_GOLD),
                ("GRID", (0, 0), (-1, -1), 0.45, colors.HexColor("#CCD5C8")),
                ("VALIGN", (0, 0), (-1, -1), "MIDDLE"),
                ("ALIGN", (0, 0), (-1, -1), "CENTER"),
                ("LEFTPADDING", (0, 0), (-1, -1), 8),
                ("RIGHTPADDING", (0, 0), (-1, -1), 8),
                ("TOPPADDING", (0, 0), (-1, -1), 7),
                ("BOTTOMPADDING", (0, 0), (-1, -1), 7),
            ]
        )
    )
    story.extend(
        [
            payment,
            Spacer(1, 7),
            callout(
                "Nota fiscal",
                "El honorario comercial base es MXN 6,000.00. Cuando corresponda emitir CFDI, el total indicado en esta propuesta es MXN 7,000.00. Las obligaciones aplicables deberán validarse con el contador antes de emitir el comprobante.",
                styles,
            ),
            Paragraph("7. Hosting, dominio y WordPress", styles["h1"]),
            paragraph(
                "WordPress.org no tiene costo de licencia. El dominio, hosting, correo y servicios externos no forman parte del honorario y serán contratados y pagados directamente por el cliente.",
                styles,
            ),
            paragraph(
                "Los precios fueron consultados el 8 de junio de 2026. Los importes en dólares usan una conversión ilustrativa de USD 1 = MXN 17.30. Las promociones, impuestos, tipo de cambio y renovaciones pueden variar.",
                styles,
            ),
            styled_table(
                ["Categoría", "Plan", "Pago inicial", "Promedio anual", "Renovación"],
                [
                    (
                        "Más barata a largo plazo",
                        "Hostinger Premium",
                        "MXN 1,679.52 / 48 meses",
                        "MXN 419.88",
                        "MXN 2,039.88",
                    ),
                    (
                        "Menor compromiso inicial",
                        "DreamHost Launch",
                        "USD 34.68 / 12 meses",
                        "USD 34.68 · MXN 600",
                        "USD 131.88 · MXN 2,282",
                    ),
                    (
                        "Costo-beneficio",
                        "Hostinger Business",
                        "MXN 2,831.52 / 48 meses",
                        "MXN 707.88",
                        "MXN 3,599.88",
                    ),
                    (
                        "Alternativa mexicana",
                        "IONOS WordPress Start",
                        "MXN 50/mes 6 meses + MXN 100/mes 6 meses",
                        "MXN 900",
                        "MXN 1,200",
                    ),
                    (
                        "Rendimiento y SEO",
                        "SiteGround GrowBig",
                        "USD 59.88 / 12 meses",
                        "USD 59.88 · MXN 1,036",
                        "USD 359.88 · MXN 6,226",
                    ),
                    (
                        "Referencia premium",
                        "Kinsta Single 35k",
                        "USD 350 anuales",
                        "USD 350 · MXN 6,055",
                        "USD 350",
                    ),
                ],
                [1.15 * inch, 1.2 * inch, 1.55 * inch, 1.35 * inch, 1.2 * inch],
                styles,
            ),
            Paragraph("Características principales", styles["h2"]),
            bullets(
                [
                    "Hostinger Premium: dominio gratuito el primer año, SSL, correo, WordPress administrado y respaldos semanales.",
                    "DreamHost Launch: dominio por un año, SSL, respaldos diarios, almacenamiento NVMe y correo gratuito durante los primeros tres meses.",
                    "Hostinger Business: dominio inicial, SSL, correo, CDN, caché, respaldos diarios y staging.",
                    "IONOS WordPress Start: pago y soporte en México, dominio .com o .mx, SSL, correo, respaldos diarios y actualizaciones administradas.",
                    "SiteGround GrowBig: Google Cloud, CDN, caché multinivel, respaldos diarios, correo, staging y soporte WordPress.",
                    "Kinsta: infraestructura premium y seguridad avanzada; no incluye dominio ni correo.",
                ],
                styles,
            ),
            Spacer(1, 7),
            callout(
                "Recomendación",
                "Hostinger Business es la recomendación general por costo-beneficio. Hostinger Premium reduce el promedio anual con cuatro años pagados por adelantado; DreamHost reduce el desembolso inicial; SiteGround prioriza rendimiento; Kinsta queda solo como referencia premium.",
                styles,
                fill=LIGHT_GREEN,
            ),
            paragraph(
                "Ningún proveedor garantiza posicionamiento SEO. El beneficio procede de velocidad, disponibilidad, caché, CDN, seguridad y Core Web Vitals.",
                styles,
            ),
            Paragraph("Dominios", styles["h2"]),
            bullets(
                [
                    "Usar .com como dominio principal.",
                    "Registrar .com.mx adicionalmente para proteger la marca, si el cliente lo considera conveniente.",
                    "Redirigir el dominio secundario al principal.",
                    "Referencias de renovación: .com MXN 329.99 anuales y .com.mx MXN 612.99 anuales.",
                    "IONOS permite elegir .com o .mx sin costo durante el primer año con contratación anual.",
                ],
                styles,
            ),
            Paragraph("Propuestas de nombre", styles["h2"]),
            paragraph(
                "La disponibilidad debe confirmarse con el registrador inmediatamente antes de contratar. Se priorizan nombres breves, fáciles de dictar y alineados con la marca profesional; incluir palabras clave en el dominio, por sí solo, no garantiza mejor posicionamiento.",
                styles,
            ),
            styled_table(
                ["Prioridad", "Dominio propuesto", "Motivo"],
                [
                    ("Recomendada", "dredgarehernandez.com", "Coincide con la marca profesional y funciona fuera de México."),
                    ("Alternativa corta", "dredgarhernandez.com", "Es fácil de recordar y escribir."),
                    ("Enfoque México", "dredgarhernandez.mx", "Es breve y comunica presencia nacional."),
                    ("Protección de marca", "dredgarhernandez.com.mx", "Refuerza la identificación con México y puede redirigir al .com."),
                    ("Descriptiva", "nefrologoedgarhernandez.com", "Comunica nombre y especialidad, aunque es más larga."),
                    ("Especialidad y apellido", "nefrologiahernandez.mx", "Es clara, relativamente corta y orientada al mercado mexicano."),
                ],
                [1.25 * inch, 2.0 * inch, 3.2 * inch],
                styles,
            ),
            callout(
                "Recomendación de dominio",
                "Registrar dredgarehernandez.com como dominio principal. Si el presupuesto lo permite, adquirir también la variante equivalente en .com.mx o .mx y redirigirla al dominio principal.",
                styles,
                fill=LIGHT_GREEN,
            ),
            Paragraph("8. Referencia de mercado y valor del sitio propio", styles["h1"]),
            paragraph(
                "Los siguientes precios fueron consultados el 8 de junio de 2026 en páginas oficiales. Son referencias comerciales y no comparaciones idénticas: Doctoralia incluye perfil, agenda y herramientas operativas, mientras DoctorWeb combina sitio, soporte y gestión de marketing.",
                styles,
            ),
            styled_table(
                ["Servicio publicado", "Precio mensual", "Referencia anual"],
                [
                    ("Doctoralia Starter", "MXN 1,740 + IVA, facturado anualmente", "MXN 20,880 + IVA"),
                    ("Doctoralia Plus", "MXN 2,340 + IVA, facturado anualmente", "MXN 28,080 + IVA"),
                    ("Doctoralia VIP", "MXN 2,970 + IVA, facturado anualmente", "MXN 35,640 + IVA"),
                    ("DoctorWeb Plan Google Despegue", "MXN 3,500 mensuales + MXN 2,000 iniciales de inversión", "MXN 44,000 durante el primer año"),
                ],
                [2.25 * inch, 2.15 * inch, 2.05 * inch],
                styles,
            ),
            paragraph(
                "DoctorWeb también publica planes de MXN 3,900 y MXN 5,900 mensuales, más importes iniciales. La inversión publicitaria puede variar según la especialidad y la estrategia seleccionada.",
                styles,
            ),
            callout(
                "Valor de esta propuesta",
                "El honorario de MXN 6,000 corresponde al desarrollo del sitio propio y no a una renta mensual. El cliente conserva el dominio, el sitio y sus contenidos; únicamente paga por separado hosting, dominio y servicios externos. Las plataformas anteriores pueden complementar el proyecto cuando se requieran agenda avanzada, publicidad administrada, CRM u otras funciones no incluidas.",
                styles,
                fill=LIGHT_GOLD,
            ),
            Paragraph("9. Actualizaciones de información", styles["h1"]),
            paragraph("<b>No se cobrará una mensualidad de mantenimiento.</b>", styles),
            paragraph(
                "Se incluyen actualizaciones menores de información sin plazo definido y sin tiempo de respuesta garantizado, atendidas según disponibilidad.",
                styles,
            ),
            bullets(
                [
                    "Correcciones de textos existentes.",
                    "Actualización de teléfonos, correos, horarios y ubicaciones.",
                    "Sustitución de imágenes existentes.",
                    "Actualización de datos profesionales ya contemplados.",
                ],
                styles,
            ),
            paragraph(
                "Nuevas páginas, rediseños, funciones, integraciones, campañas, redacción extensa y recuperación por incidentes se cotizarán por separado.",
                styles,
            ),
            paragraph(
                "Las actualizaciones técnicas, seguridad y respaldos se apoyarán en el hosting administrado. Cualquier intervención técnica extraordinaria se evaluará por separado.",
                styles,
            ),
            Paragraph("10. Exclusiones y responsabilidades", styles["h1"]),
            Paragraph("No incluido", styles["h2"]),
            bullets(
                [
                    "Dominio, hosting, correo y licencias premium.",
                    "Fotografía, video, publicidad pagada o administración de redes.",
                    "Servicios legales, contables o regulatorios.",
                    "Posicionamiento garantizado o promesas de resultados.",
                    "Expediente clínico, cobros o agenda médica avanzada.",
                ],
                styles,
            ),
            Paragraph("Responsabilidad del cliente", styles["h2"]),
            bullets(
                [
                    "Contratar y conservar dominio y hosting a su nombre.",
                    "Renovar oportunamente servicios externos.",
                    "Entregar información veraz y autorizada.",
                    "Aprobar textos, fotografías, traducciones y contenido médico.",
                    "Proporcionar avisos legales y accesos necesarios.",
                ],
                styles,
            ),
            Paragraph("11. Entrega y aceptación", styles["h1"]),
            paragraph(
                "La entrega se considerará completa cuando el sitio esté instalado, funcionen sus páginas, navegación, formularios y enlaces, se haya integrado el contenido recibido, se haya revisado en móvil y escritorio y el cliente autorice la publicación.",
                styles,
            ),
            paragraph(
                "<b>El segundo pago deberá liquidarse antes de publicar el sitio en el dominio definitivo.</b>",
                styles,
            ),
            Paragraph("12. Fuentes consultadas", styles["h1"]),
            bullets(
                [
                    "Hostinger México — https://www.hostinger.com/mx/comprar-hosting",
                    "Dominio .com Hostinger — https://www.hostinger.com/mx/tld/dominio-com",
                    "Dominio .com.mx Hostinger — https://www.hostinger.com/mx/tld/dominio-com-mx",
                    "DreamHost WordPress — https://www.dreamhost.com/es/wordpress/",
                    "IONOS WordPress México — https://www.ionos.mx/alojamiento/wordpress-hosting",
                    "SiteGround WordPress — https://www.siteground.com/es/wordpress-hosting.htm",
                    "Kinsta WordPress — https://kinsta.com/es/precios/",
                    "Doctoralia PRO, precios para especialistas — https://pro.doctoralia.com.mx/precios/medicos-y-especialistas",
                    "DoctorWeb, planes de marketing médico — https://www.doctorweb.agency/planes.html",
                    "Google Search, selección de un nombre de sitio — https://developers.google.com/search/docs/appearance/site-names",
                    "Google Search, guía inicial de SEO — https://developers.google.com/search/docs/fundamentals/seo-starter-guide",
                    "Google Search, sitios internacionales — https://developers.google.com/search/docs/specialty/international/managing-multi-regional-sites",
                    "Google Search, Core Web Vitals — https://developers.google.com/search/docs/appearance/core-web-vitals",
                    "SAT, Ley del IVA, artículo 1 — https://wwwmat.sat.gob.mx/articulo/19848/articulo-1",
                ],
                styles,
            ),
            Paragraph("Aceptación", styles["h1"]),
            paragraph(
                "Con la firma de este documento, ambas partes manifiestan conocer el alcance, inversión y condiciones generales de la propuesta.",
                styles,
            ),
            Spacer(1, 0.35 * inch),
        ]
    )

    signature_data = [
        [
            Paragraph("<font color='#FFFFFF'><b>CLIENTE</b></font>", styles["signature"]),
            Paragraph("<font color='#FFFFFF'><b>PRESTADOR</b></font>", styles["signature"]),
        ],
        [
            Paragraph("<b>Dr. Edgar E. Hernández</b>", styles["signature"]),
            Paragraph("<b>Asael Marcial Grajales</b>", styles["signature"]),
        ],
        [
            Paragraph("<br/><br/>Firma: __________________________", styles["signature"]),
            Paragraph("<br/><br/>Firma: __________________________", styles["signature"]),
        ],
        [
            Paragraph("<br/>Fecha: _________________________", styles["signature"]),
            Paragraph("<br/>Fecha: _________________________", styles["signature"]),
        ],
    ]
    signature = Table(signature_data, colWidths=[3.225 * inch, 3.225 * inch], hAlign="LEFT")
    signature.setStyle(
        TableStyle(
            [
                ("BACKGROUND", (0, 0), (-1, 0), PRIMARY),
                ("GRID", (0, 0), (-1, -1), 0.45, colors.HexColor("#CCD5C8")),
                ("VALIGN", (0, 0), (-1, -1), "MIDDLE"),
                ("LEFTPADDING", (0, 0), (-1, -1), 10),
                ("RIGHTPADDING", (0, 0), (-1, -1), 10),
                ("TOPPADDING", (0, 0), (-1, -1), 8),
                ("BOTTOMPADDING", (0, 0), (-1, -1), 8),
            ]
        )
    )
    story.append(signature)

    doc.build(story)
    print(OUTPUT)


if __name__ == "__main__":
    build_pdf()
