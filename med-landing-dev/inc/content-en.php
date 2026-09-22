<?php
/** English counterparts of the existing service catalog. Stable keys are Spanish source slugs. */
function developer_get_english_service_details($key) {
    $items = [
        'enfermedad-renal-cronica' => [
            'basic' => 'Chronic kidney disease involves lasting damage or reduced kidney function. It may cause no symptoms early on, so blood and urine tests are important, particularly with diabetes, hypertension or a family history of kidney disease.',
            'reasons' => ['Reduced kidney function on laboratory tests', 'Elevated creatinine or reduced estimated glomerular filtration rate', 'Diabetes, hypertension or other chronic conditions'],
            'approach' => 'The assessment brings together medical history, blood and urine tests, blood pressure, current medications and follow-up goals to support kidney health.',
        ],
        'diabetes-hipertension-dano-renal' => [
            'basic' => 'Diabetes and high blood pressure are common causes of kidney damage. Nephrology follow-up considers creatinine, filtration rate, urine albumin and blood pressure in the context of each patient.',
            'reasons' => ['Diabetes with albumin or protein in urine', 'Long-standing high blood pressure', 'Changes in creatinine, filtration rate or urine tests'],
            'approach' => 'The visit reviews risk factors, current treatment, blood pressure and glucose goals, and measures to reduce progression risk when possible.',
        ],
        'lesion-renal-aguda' => [
            'basic' => 'Acute kidney injury is a rapid decline in kidney function associated with acute illness, dehydration, medications or other causes. Timely assessment is important because the condition can change quickly.',
            'reasons' => ['A recent rise in creatinine', 'A significant reduction in urine output', 'Recent infection, surgery, contrast exposure or medicines that can affect the kidneys'],
            'approach' => 'Assessment focuses on likely causes, severity and risks, including whether close follow-up or hospital care is needed.',
        ],
        'proteinuria-hematuria' => [
            'basic' => 'Proteinuria means abnormal protein in urine; hematuria means blood in urine. These findings may be related to infection, stones, inflammation of kidney filters or other urinary conditions and need clinical interpretation.',
            'reasons' => ['Protein detected on a urine test', 'Visible or microscopic blood in urine', 'Swelling, high blood pressure or a family history of kidney disease'],
            'approach' => 'Urine studies, kidney function and the clinical context help determine whether further tests or specialist monitoring are appropriate.',
        ],
        'infecciones-urinarias-recurrentes' => [
            'basic' => 'Recurrent urinary tract infections are repeated episodes of infection. Frequent or complicated infections, particularly with kidney abnormalities, warrant a review of risk factors and previous test results.',
            'reasons' => ['Frequent urinary tract infections', 'Fever, flank pain or recurrence after treatment', 'A history of stones, pregnancy, diabetes or kidney disease'],
            'approach' => 'The assessment reviews urine cultures, previous treatments and contributing factors, and identifies findings that may require additional kidney or urological evaluation.',
        ],
        'alteraciones-electrolitos' => [
            'basic' => 'Electrolytes help regulate fluid balance and nerve, muscle and heart function. Abnormal levels may occur with kidney disease, medications, dehydration or other conditions.',
            'reasons' => ['High or low potassium', 'High or low sodium', 'Mineral abnormalities associated with kidney disease, medications or systemic conditions'],
            'approach' => 'Laboratory patterns, medications, hydration and kidney function are assessed together to guide individualized management.',
        ],
        'litiasis-renal' => [
            'basic' => 'Kidney stones form in the kidneys or urinary tract. They may cause severe pain, blood in urine, infection or obstruction. Follow-up can help assess causes and factors associated with recurrence.',
            'reasons' => ['Repeated kidney stones', 'A history of renal colic or passing stones', 'Abnormal calcium, uric acid or 24-hour urine results'],
            'approach' => 'The visit may include a review of imaging and metabolic studies, with preventive recommendations adapted to the patient’s risk factors.',
        ],
        'enfermedades-glomerulares' => [
            'basic' => 'Glomerular diseases affect the microscopic filters of the kidneys. Findings may include protein or blood in urine, swelling, high blood pressure or reduced kidney function.',
            'reasons' => ['Persistent protein in urine', 'Blood in urine with kidney abnormalities', 'Swelling or reduced kidney function'],
            'approach' => 'Urine, blood and autoimmune studies are reviewed to determine the need for closer monitoring or kidney biopsy when justified.',
        ],
        'sindromes-cardiorrenales' => [
            'basic' => 'Cardiorenal syndromes describe the interaction between the heart and kidneys, where dysfunction of one organ can affect the other. They are relevant in heart failure, fluid retention and changes in kidney function.',
            'reasons' => ['Heart failure with kidney function changes', 'Fluid retention or swelling', 'Kidney monitoring during cardiovascular treatment'],
            'approach' => 'Assessment considers fluid balance, laboratory results and current treatment, in coordination with the treating team.',
        ],
        'hipertension-arterial-dificil-control' => [
            'basic' => 'High blood pressure can damage the kidneys and can also result from kidney disease. Persistent hypertension requires a review of possible causes, measurements, treatment and organ damage.',
            'reasons' => ['High blood pressure despite several medications', 'Hypertension with kidney damage or protein in urine', 'Early onset, very high readings or potassium abnormalities'],
            'approach' => 'The visit reviews blood pressure records, medication use, laboratory tests and potential secondary causes to guide further evaluation.',
        ],
        'enfermedad-renal-embarazo' => [
            'basic' => 'Kidney disease during pregnancy needs coordinated monitoring because blood pressure, urine protein and kidney function can affect maternal and fetal health.',
            'reasons' => ['Kidney disease before pregnancy', 'High blood pressure or protein in urine during pregnancy', 'Pregnancy planning with a history of kidney disease'],
            'approach' => 'Kidney assessment and follow-up are coordinated with the obstetric team according to individual risks and clinical findings.',
        ],
        'evaluacion-seguimiento-trasplante-renal' => [
            'basic' => 'Kidney transplant evaluation includes preparation, studies, a review of risks and coordination with the transplant team. Nephrology follow-up supports care before and after transplantation.',
            'reasons' => ['Evaluation for kidney transplantation', 'Preparation and review of required studies', 'Kidney function monitoring after transplantation'],
            'approach' => 'The visit reviews kidney function, medications and follow-up needs in coordination with the transplant team.',
        ],
        'dialisis-peritoneal' => [
            'basic' => 'Peritoneal dialysis is a kidney replacement treatment that uses the peritoneum to help remove waste and excess fluid when the kidneys cannot do so adequately.',
            'reasons' => ['Assessment of kidney replacement options', 'Follow-up during peritoneal dialysis', 'Review of fluid balance and laboratory results'],
            'approach' => 'Follow-up considers symptoms, fluid balance, studies and the treatment plan, with guidance adapted to the patient’s needs.',
        ],
        'hemodialisis' => [
            'basic' => 'Hemodialysis filters blood through a machine and vascular access. Follow-up includes fluid balance, laboratory tests, blood pressure and possible complications.',
            'reasons' => ['Preparation for hemodialysis', 'Follow-up during treatment', 'Assessment of vascular access and clinical changes'],
            'approach' => 'The visit reviews the treatment course, test results and vascular access needs with the treating team.',
        ],
        'cateteres-hemodialisis' => [
            'basic' => 'Hemodialysis catheters provide vascular access when dialysis needs to be started or continued. Temporary and tunneled options are considered according to the clinical situation.',
            'reasons' => ['Assessment of hemodialysis access needs', 'Evaluation of temporary or tunneled catheter options', 'Follow-up of an existing catheter'],
            'approach' => 'Assessment considers the clinical indication, previous access and current health to guide the choice and coordination of the procedure.',
        ],
        'accesos-vasculares-complejos' => [
            'basic' => 'Vascular access is essential for hemodialysis. Complex cases require a review of previous access, available vessels, risks and coordination with the treating team.',
            'reasons' => ['Difficulty establishing dialysis access', 'Previous access complications', 'Assessment of further access options'],
            'approach' => 'The visit reviews access history and available studies to coordinate an individualized approach.',
        ],
        'biopsia-renal-rinon-nativo-trasplante' => [
            'basic' => 'A kidney biopsy takes a small tissue sample to investigate certain conditions of a native or transplanted kidney. It is considered when the findings may clarify diagnosis or management.',
            'reasons' => ['Kidney abnormalities requiring diagnostic clarification', 'Assessment of a native or transplanted kidney', 'Review of a possible biopsy indication'],
            'approach' => 'The specialist reviews available findings, risks and the clinical question before deciding whether biopsy is appropriate.',
        ],
    ];
    return $items[$key] ?? ['basic' => '', 'reasons' => [], 'approach' => ''];
}

/** Translations of the approved legal structure, updated for WhatsApp-only booking. */
function developer_get_legal_pages_en() {
    $contact = '<p>For questions about these policies, use of the site or personal data, contact WhatsApp at <strong>229 446 6698</strong>. An official privacy email will be added when confirmed.</p>';
    return [
        'aviso-de-privacidad' => ['title' => 'Privacy notice', 'slug' => 'privacy-notice', 'summary' => 'Personal data processing for information requests, appointments and administrative communication.', 'content' => '<h2>Data controller</h2><p>Dr. Edgar Eduardo Hernández Enríquez, a specialist in Nephrology with consultation locations in Xalapa, Veracruz, is responsible for personal data received in connection with this site.</p><h2>Data that may be collected</h2><p>Identification and contact details may be received through WhatsApp, including a name, contact number, city and the message shared to request appointment information. This website does not collect appointment requests through forms.</p><h2>Purposes</h2><p>Data is used to answer requests, coordinate appointments, provide administrative follow-up, communicate with the patient or family and meet obligations applicable to professional healthcare services.</p><h2>Sensitive data</h2><p>Medical information shared through digital channels should be limited to what is necessary to request an appointment. Diagnosis, treatment and clinical advice require individual medical assessment.</p><h2>Access, rectification, cancellation and opposition</h2><p>Data subjects may request access, correction, cancellation or opposition to the processing of their personal data through the contact channel published on this site.</p><h2>Changes to this notice</h2><p>This notice may be updated to reflect legal, operational or contact changes. The current version will be published on this page.</p>' . $contact],
        'terminos-y-condiciones' => ['title' => 'Terms and conditions', 'slug' => 'terms-and-conditions', 'summary' => 'General terms for using the website, requesting appointments and reading its information.', 'content' => '<h2>Use of the website</h2><p>This site provides information about Nephrology services offered by Dr. Edgar Eduardo Hernández Enríquez. Access and use imply acceptance of these general terms.</p><h2>Published information</h2><p>Information about conditions, procedures, locations and professional details is intended as guidance. It may be updated without prior notice to correct, expand or clarify content.</p><h2>Appointments and contact</h2><p>WhatsApp buttons are used to request information or begin booking. Sending a message does not guarantee immediate availability or replace appointment confirmation.</p><h2>Limitations</h2><p>Users agree not to send false, abusive or automated information, or interfere with the operation of the service.</p><h2>Intellectual property</h2><p>The visual identity, text, structure, photographs and resources belong to their respective owners and must not be copied or reused without authorization.</p><h2>Jurisdiction</h2><p>These terms are interpreted under the applicable provisions in Mexico, without prejudice to the rights of users as patients or data subjects.</p>' . $contact],
        'descargo-de-responsabilidad' => ['title' => 'Medical disclaimer', 'slug' => 'medical-disclaimer', 'summary' => 'The educational scope of medical information and limits of digital communication.', 'content' => '<h2>Educational information</h2><p>Information about kidney diseases, therapies and procedures is general and educational. It does not replace a consultation, diagnosis, treatment or individual follow-up.</p><h2>Medical assessment</h2><p>Each case requires medical history, examination, studies and professional judgment. Clinical decisions should be made during a formal assessment with a healthcare professional.</p><h2>Emergencies</h2><p>This website and WhatsApp do not provide emergency care. For severe symptoms, sudden deterioration, breathing difficulties, markedly reduced urine output, severe pain or any emergency, seek emergency medical care.</p><h2>External links</h2><p>The site may link to maps, social networks, certification organizations or other external resources. Their content, availability and policies are not controlled by this website.</p><h2>Updates</h2><p>Information is intended to be clear and current. Schedules, availability, locations, links and care arrangements may change and should be confirmed when booking.</p>' . $contact],
        'compromiso-de-etica' => ['title' => 'Ethical commitment', 'slug' => 'ethical-commitment', 'summary' => 'Principles of professional care, confidentiality and responsible communication.', 'content' => '<h2>Professional care</h2><p>Dr. Edgar Eduardo Hernández Enríquez aims to provide professional, humane, evidence-based care that respects each patient’s dignity, context and informed decisions.</p><h2>Confidentiality</h2><p>Information shared by patients or relatives should be handled confidentially and used only for the relevant guidance, appointment coordination, care or follow-up.</p><h2>Clear communication</h2><p>The site avoids promises of cure, guaranteed results or automated diagnoses. Digital communication supports access to consultation and does not replace the doctor–patient relationship.</p><h2>Professional credentials</h2><p>Published credentials include professional license 11751221, specialist license 14852016, certification by the Consejo Mexicano de Nefrología for 2025–2030 and COFEPRIS 2530092002A00059.</p><h2>Continuous improvement</h2><p>Content, booking processes and information may be updated to improve clarity, accessibility, safety and usefulness for patients.</p>' . $contact],
    ];
}
