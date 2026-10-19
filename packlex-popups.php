<?php
/**
 * Plugin Name:       Made By Mani
 * Plugin URI:        https://packlex.co.uk/
 * Description:       Handles the Terms & Conditions and Disclaimer popups for Packlex.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        https://packlex.co.uk/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       packlex-popupsPlease confirm that you have read and agree to the

 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Enqueue the scripts and styles for the plugin.
 */
function packlex_popups_enqueue_assets() {
    // Enqueue the stylesheet
    wp_enqueue_style(
        'packlex-popup-style', // A unique name for the stylesheet
        plugin_dir_url( __FILE__ ) . 'popup-style.css', // Path to the CSS file
        array(), // No dependencies
        '1.0.5' // Version number - bumped to force cache refresh
    );

    // Enqueue the JavaScript file
    wp_enqueue_script(
        'packlex-popup-script', // A unique name for the script
        plugin_dir_url( __FILE__ ) . 'popup-script.js', // Path to the JS file
        array(), // No dependencies
         time(), // 👈 PUT IT HERE
        '1.0.7', // Version number - bumped to force cache refresh
        true // Load in the footer
    );
}
add_action( 'wp_enqueue_scripts', 'packlex_popups_enqueue_assets' );


/**
 * Add the popup HTML to the site's footer.
 */
function packlex_popups_add_html_to_footer() {
    ?>
    <!-- The Main "Buy Now" Popup -->
    <div id="my-popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Buy Now</h2>
            <hr>
<!-- Service Selection -->
<h3 class="service-select-heading">Select Your Service</h3>
<div class="report-selection">
    <label class="report-option">
        <input type="radio" name="report-type" value="https://buy.stripe.com/4gM14m6UJ3sBd41fM80ZW01">
        <div class="report-option-inner">
            <span class="report-level">Level 2</span>
            <span class="report-price">£69</span>
        </div>
    </label>
    <label class="report-option">
        <input type="radio" name="report-type" value="https://buy.stripe.com/14AdR8a6V7IR3tr8jG0ZW00">
        <div class="report-option-inner">
            <span class="report-level">Level 3</span>
            <span class="report-price">£99</span>
        </div>
    </label>
</div>

<div class="confirm-section">
    <input type="checkbox" id="confirm-checkbox">
    <label for="confirm-checkbox">I confirm that I have read and agree to the <a href="#" id="open-terms-popup">Terms & Conditions</a> and the <a href="#" id="open-privacy-popup">Privacy Policy</a>.</label>
</div>
<button id="continue-btn" class="continue-btn" disabled>Continue</button>
        </div>
    </div>

    <!-- The "Terms & Conditions" Popup -->
    <div id="my-popup-terms" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Terms & Conditions</h2>
            <hr>
            <div class="scrollable-content">
                <h3>1. Service Description</h3>
                <p>Survlex provides document analysis and general information services relating to property survey reports. The service consists of reviewing documents supplied by the user and producing summaries, explanations, and contextual insights in plain English. The service is informational in nature only.</p>
                <h3>2. Property Scope</h3>
                <p>Survlex services are provided in relation to UK residential property survey reports. By using the service, the user confirms that the documents submitted relate to residential property.</p>
                <h3>3. No Professional Advice</h3>
                <p>Survlex does not provide professional, legal, or technical advice, opinions, or recommendations. Nothing provided by Survlex shall be interpreted as advice on whether to proceed with, renegotiate, finance, or otherwise act in relation to a property. Users must obtain independent professional advice from a qualified surveyor, solicitor, or other relevant specialist before making any decisions.</p>
                <h3>4. User Responsibilities</h3>
                <p>The user is responsible for:</p>
                <ul>
                    <li>Providing complete, accurate, and relevant documents;</li>
                    <li>Ensuring that all documents supplied relate to the correct property;</li>
                    <li>Ensuring that the survey document supplied is complete and legible (see clause 6);</li>
                    <li>Making their own decisions based on the information provided.</li>
                </ul>
                <p>Survlex is not responsible for missing, incomplete, outdated, illegible, or incorrect documents supplied by the user.</p>
                <h3>5. Document Source and Verification</h3>
                <p>Survlex does not verify, authenticate, validate, or independently confirm the accuracy, completeness, origin, or source of any documents supplied. The analysis is strictly limited to the content of the documents provided and is conducted on the assumption that such documents are genuine and complete.</p>
                <h3>6. Document Quality and Its Effect on the Report</h3>
                <p>The accuracy and completeness of your report depend on the quality and legibility of the survey document you provide. Where a document is incomplete, poorly scanned, low-resolution, rotated, image-based, partially missing, or otherwise difficult to read, the report may be limited or may not capture every finding contained in the original survey. You are responsible for providing a complete and legible survey document. Any such limitations affecting your report will be flagged within the report where reasonably possible.</p>
                <h3>7. Nature and Limitations of Review</h3>
                <p>Survlex undertakes the review with the intention of identifying key factual matters contained within the documents supplied. However, no guarantee is given that all matters, issues, anomalies, omissions, or risks will be identified. The absence of any reference to a particular issue does not imply that such issue does not exist.</p>
                <h3>8. Reliance and Liability</h3>
                <p>All information is provided on an information-only basis and is not intended to be relied upon as the sole basis for any decision. The user agrees that they do not rely on the information provided by Survlex as the sole basis for any decision and that independent professional advice should be obtained.</p>
                <p>To the fullest extent permitted by law, Survlex excludes all liability for any loss, damage, cost, or expense arising from use of the service, including (but not limited to) financial loss, property-related issues, lender decisions, delays, or third-party actions. Nothing in these Terms excludes liability where such exclusion is not permitted by law.</p>
                <h3>9. Pricing</h3>
                <p>Survlex reports are currently offered at the following promotional rates:</p>
                <ul>
                    <li>Level 2 survey report — £69</li>
                    <li>Level 3 survey report — £99</li>
                </ul>
                <p>These are introductory promotional prices and may change at any time. The price payable is the price displayed at the point of purchase. Prices include the full analysis of the survey supplied and delivery of the report in accordance with these Terms.</p>
                <h3>10. Turnaround Time</h3>
                <p>Survlex aims to deliver your report within 12 hours from the moment your survey document is received (not from the moment of payment). While this is the standard delivery commitment, delivery times may be affected where a document is of poor quality, incomplete, illegible, or unusually large, or by other factors outside Survlex's reasonable control. In such cases Survlex will deliver the report as promptly as reasonably possible.</p>
                <h3>11. Payment, Immediate Commencement, Cancellations and Refunds</h3>
                <p>All payments must be made in full before any work begins. By placing an order and submitting your survey document, you expressly request that Survlex begins the service immediately, and you acknowledge and agree that the report may be prepared and delivered before the end of the 14-day cancellation period that would otherwise apply under the Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013.</p>
                <p>You acknowledge and agree that, because you have requested immediate commencement, your right to cancel under those Regulations will be lost once the report has been delivered, and that where work has begun but the report has not yet been delivered you may be required to pay for the work already carried out.</p>
                <p>Due to the personalised nature of the service, refunds are not available once the report has been delivered. Refunds may only be considered at the sole discretion of Survlex in the event of duplicate payment or a failure to deliver the purchased service.</p>
                <p>Refunds will not be provided on the basis that:</p>
                <ul>
                    <li>the user disagrees with the content, structure, or presentation of the report;</li>
                    <li>a particular issue, anomaly, or risk was not identified;</li>
                    <li>the user chooses not to proceed with a property transaction;</li>
                    <li>independent professional advice differs from the report;</li>
                    <li>outcomes differ from expectations;</li>
                    <li>the report was limited by the quality of the document supplied (see clause 6).</li>
                </ul>
                <p>Nothing in this section limits any statutory rights which cannot lawfully be excluded.</p>
                <h3>12. Intellectual Property</h3>
                <p>All reports and materials provided by Survlex are for the purchaser's personal use only. They may not be copied, shared, distributed, reproduced, or resold without prior written consent from Packlex Ltd.</p>
                <h3>13. Relationship</h3>
                <p>Nothing in these Terms & Conditions, any report produced by Survlex, or any content on this website creates a professional-client relationship, including (but not limited to) surveyor-client, solicitor-client, or adviser-client relationships, nor does it create any duty of care.</p>
                <h3>14. Governing Law and Jurisdiction</h3>
                <p>These Terms & Conditions are governed by and construed in accordance with the laws of England and Wales. The courts of England and Wales shall have exclusive jurisdiction.</p>
                <h3>15. Contact</h3>
                <p>Survlex (Packlex Ltd), 71–75 Shelton Street, London WC2H 9JQ, United Kingdom. support@survlex.co.uk</p>
            </div>
        </div>
    </div>

    <!-- The "Privacy Policy" Popup -->
    <div id="my-popup-privacy" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Privacy Policy</h2>
            <hr>
            <div class="scrollable-content">
              
                <p>Survlex is a service operated by Packlex Ltd, a company registered in England and Wales (Company Number: 16959394), with registered address at 71–75 Shelton Street, London WC2H 9JQ, United Kingdom. We are committed to protecting your privacy and handling personal data in accordance with applicable UK data protection laws, including the UK General Data Protection Regulation (UK GDPR).</p>
                <h3>1. Data We Collect</h3>
                <p>We may collect and process the following personal data:</p>
                <ul>
                    <li>Name and contact details (such as email address).</li>
                    <li>Property survey documents uploaded by the user, which may contain personal data (including third-party data such as surveyor details or property-related information).</li>
                    <li>Payment and transaction information (processed securely by third-party providers).</li>
                    <li>Communications sent to us by email.</li>
                </ul>
                <p>We do not store or process payment card details directly.</p>
                <h3>2. Purpose of Processing</h3>
                <p>Personal data is collected and processed for the purposes of:</p>
                <ul>
                    <li>Delivering our services.</li>
                    <li>Communicating with users.</li>
                    <li>Processing payments via third-party providers.</li>
                    <li>Meeting legal, regulatory, and administrative obligations.</li>
                </ul>
                <h3>3. Lawful Basis for Processing</h3>
                <p>Personal data is processed on the basis of:</p>
                <ul>
                    <li>Contractual necessity (to deliver the requested service).</li>
                    <li>Legitimate interests (to operate, maintain, and improve the service).</li>
                    <li>Legal obligations (where required by law).</li>
                </ul>
                <h3>4. Data Storage and Security</h3>
                <p>We implement appropriate technical and organisational measures to protect personal data against unauthorised access, loss, alteration, or misuse. Access to personal data is restricted to authorised personnel only.</p>
                <h3>5. Data Sharing</h3>
                <p>We may share personal data with trusted third-party service providers where necessary to deliver the service. This may include payment processors (e.g. Stripe) and technical and hosting providers. Personal data is shared only to the extent necessary for service delivery. We do not sell personal data.</p>
                <h3>6. Data Retention</h3>
                <p>Personal data is retained only for as long as necessary to fulfil the purposes for which it was collected. Survey documents you upload may contain personal data and are processed solely for the purpose of delivering your report. Such documents are not retained longer than necessary for service delivery and are deleted within a reasonable period after your report has been delivered, unless we are required to retain them to comply with a legal obligation.</p>
                <h3>7. Cookies and Tracking</h3>
                <p>Our website may use essential cookies required for basic functionality and security. We do not use cookies for advertising or behavioural tracking purposes. If this changes, this policy will be updated accordingly.</p>
                <h3>8. Your Rights</h3>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal data.</li>
                    <li>Request correction or deletion of your personal data.</li>
                    <li>Object to or restrict processing of your personal data.</li>
                    <li>Request data portability, where applicable.</li>
                </ul>
                <p>You also have the right to lodge a complaint with the Information Commissioner's Office (ICO): www.ico.org.uk / 0303 123 1113.</p>
                <h3>9. Changes to This Policy</h3>
                <p>We may update this Privacy Policy from time to time. Any changes will be published on this page with an updated "Last updated" date.</p>
                <h3>10. Contact</h3>
                <p>For any data protection enquiries, please contact: Survlex (Packlex Ltd), 71–75 Shelton Street, London WC2H 9JQ, United Kingdom. support@survlex.co.uk</p>
            </div>
        </div>
    </div>

    <!-- The "Disclaimer" Popup -->
    <div id="my-popup-disclaimer" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Disclaimer</h2>
            <hr>
            <div class="scrollable-content">
                <p>This disclaimer applies to all reports, summaries, and information produced by Survlex, a service operated by Packlex Ltd (Company No. 16959394), including content made available via this website.</p>
                <p>Survlex provides document analysis and general information services only. We are not surveyors, solicitors, or conveyancers and do not provide professional, legal, or technical advice, opinions, or recommendations.</p>
                <p>All information, summaries, explanations, and contextual notes provided within any report are for general informational purposes only and are intended to assist with understanding the contents of a property survey. They must not be relied upon as advice or as a substitute for obtaining independent professional advice from a qualified surveyor, solicitor, or other relevant specialist.</p>
                <p>All information contained in our reports is based solely on the documents supplied by the user. We do not independently verify the accuracy, completeness, authenticity, or validity of any documents provided. The accuracy and completeness of any report also depend on the quality and legibility of the document supplied. Where a document is incomplete, poorly scanned, low-resolution, image-based, or otherwise difficult to read, the report may be limited or may not capture every finding. Any such limitations are flagged within the report where reasonably possible.</p>
                <p>Survlex accepts no responsibility or liability for any decisions, actions, losses, or outcomes arising from reliance on the information contained in our reports, including (but not limited to) decisions to proceed with, renegotiate, finance, or otherwise act in relation to a property.</p>
                <p>Nothing in any report produced by Survlex, or on this website, creates any professional-client relationship, including (but not limited to) surveyor-client, solicitor-client, or adviser-client relationships, nor does it create any duty of care.</p>
                <p>Users are strongly advised to seek independent professional advice before making any decisions relating to a property transaction.</p>
            </div>
        </div>
    </div>

    <!-- The "FAQ" Popup -->
    <div id="my-popup-faq" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Frequently Asked Questions</h2>
            <hr>
            <div class="scrollable-content">
                <h3>1. What does Survlex actually do?</h3>
                <p>Most buyers receive their survey, skim it, and move forward without fully understanding what they've been told. Survlex exists to close that gap. We take your survey and show you what actually matters, what it could cost, and what needs attention before you exchange. Not a summary — a decision tool.</p>

                <h3>2. How accurate is this?</h3>
                <p>Survlex is designed to provide clear, structured information based on your survey. However, all findings depend on the quality of the document provided, some issues may require further inspection, and cost figures are indicative, not fixed quotes. Where limitations exist, they are clearly flagged in your report.</p>

                <h3>3. Can I use this to negotiate the price?</h3>
                <p>Many buyers use survey findings to support discussions before exchange. Survlex highlights key issues, cost context, and points that may be relevant when reviewing the agreed price. We do not negotiate on your behalf or provide advice — we give you the information to make your own decisions.</p>

                <h3>4. Is this legal or professional advice?</h3>
                <p>No. Survlex provides general information and cost context based on your survey. It does not replace a surveyor, solicitor, or other qualified professional, and should not be treated as advice.</p>

                <h3>5. Why not just use ChatGPT or other AI tools?</h3>
                <p>You can. However, most general tools do not process the full document properly, miss important details or context, and produce inconsistent results. Survlex uses a structured, controlled process designed specifically for property surveys — ensuring clearer, more consistent output.</p>

                <h3>6. What will I receive?</h3>
                <p>You receive a structured PDF report that includes a clear summary of what matters most, key issues explained in plain English, cost context for each relevant issue, priority areas before you exchange, and a full breakdown of findings. The goal is clarity — not just information.</p>

                <h3>7. How long does it take?</h3>
                <p>We aim to deliver your report within 12 hours from the moment your survey document is received — not from the moment of payment. In most cases reports are delivered well within this time. Delivery may take longer where a document is of poor quality, incomplete, or unusually large.</p>

                <h3>8. What happens after I pay?</h3>
                <p>After payment, you'll be directed to a secure upload page where you submit your survey. We then process your document and aim to deliver your report within 12 hours of receiving it.</p>

                <h3>9. What kind of file do I need to upload?</h3>
                <p>You must upload a property survey in PDF format. This service is designed for standard UK residential surveys (Level 2 or Level 3).</p>

                <h3>10. What if my survey is scanned or hard to read?</h3>
                <p>The accuracy and completeness of your report depend on the quality of the document you provide. While we process all documents, the report may be limited or may miss findings where a survey is poorly scanned or low-resolution, rotated, image-based, or photographed rather than text, or missing pages or partially unreadable. Any such limitations will be clearly flagged in your report. For the best result, please upload a complete, clear, text-based PDF.</p>

                <h3>11. Do you verify the information independently?</h3>
                <p>No. All findings are based solely on the survey you provide. We do not verify information externally.</p>

                <h3>12. Can I use this for any property?</h3>
                <p>This service is designed for UK residential property surveys.</p>

                <h3>13. Is my payment secure?</h3>
                <p>Yes. All payments are processed securely via Stripe using encrypted, industry-standard systems. We do not store your payment details.</p>

                <h3>14. How much does it cost?</h3>
                <p>During our current introductory promotional period: Level 2 survey report — £69, Level 3 survey report — £99. Each price includes full analysis of your survey and delivery of your structured report within 12 hours of receiving your document. These are promotional prices and may change; the price you pay is always the price shown at checkout.</p>

                <h3>15. How does Survlex actually produce the report?</h3>
                <p>Your survey is processed through a structured, multi-stage system. This includes full document extraction (including section structure and surveyor observations), classification of findings by severity and inspection status, application of cost context based on UK residential repair data, and a verification layer to identify gaps, ambiguity, and missing information. Each stage builds on the previous one — ensuring consistency, coverage, and clarity across the entire document. This is not a single prompt or a basic AI summary.</p>

                <h3>16. What if something is incorrect or unclear?</h3>
                <p>Survlex is based entirely on the survey you provide. While the system is designed for consistency and coverage, some findings may depend on document clarity or require further inspection. Where limitations exist, they are clearly flagged — and we always recommend seeking professional advice before making decisions.</p>

                <h3>17. Can I get a refund?</h3>
                <p>Because each report is prepared individually for you, the service begins as soon as you submit your document and request immediate processing. For that reason, refunds are not available once your report has been delivered. Refunds may be considered only in the case of a duplicate payment or where we fail to deliver the report you purchased. We do not provide refunds simply because you disagree with the content, a particular issue was not identified, you decide not to proceed with a purchase, or professional advice differs from the report. Full details are in our Terms & Conditions. This does not affect any statutory rights that cannot lawfully be excluded.</p>
            </div>
        </div>
    </div>

    <!-- The "Sample Reports" Popup -->
<div id="my-popup-samples" class="popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>Sample Report</h2>
        <hr>
        <div class="scrollable-content">
            <p class="sample-reports-intro">Preview the quality and structure of our survey analysis report.</p>
            <div class="sample-reports-grid">
                <div class="sample-report-card">
                    <div class="sample-report-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 2V8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 13H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 17H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 9H9H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="pdf-label">PDF</span>
                    </div>
                    <h3>Level 3 Survey Report Example</h3>
                    <p>A clear, structured summary highlighting key findings and what they mean for you.</p>
                    <div class="sample-report-actions">
                        <a href="http://survlex.co.uk/wp-content/uploads/2026/06/1F-TheAddress-05062023.pdf" target="_blank" class="sample-btn sample-btn-view">View or Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
}
add_action( 'wp_footer', 'packlex_popups_add_html_to_footer' );

/**
 * Shortcode to display the Sample Reports trigger link.
 * Usage: [packlex_sample_reports]
 */
function packlex_sample_reports_shortcode() {
    return '<a href="#" class="open-sample-reports-link">View Sample Report</a>';
}
add_shortcode( 'packlex_sample_reports', 'packlex_sample_reports_shortcode' );

/**
 * Shortcode to display the FAQ trigger link.
 * Usage: [packlex_faq]
 */
function packlex_faq_shortcode() {
    return '<a href="#" class="open-faq-link">Frequently Asked Question</a>';
}
add_shortcode( 'packlex_faq', 'packlex_faq_shortcode' );