(function() {

    // --- FAQs tab content CSS fix - inject karo immediately ---
    var style = document.createElement('style');
    style.innerHTML = '[data-tab="tab-7a35296"] .tab-content { display: none !important; } [data-tab="tab-7a35296"].active .tab-content { display: none !important; }';
    document.head.appendChild(style);

    document.addEventListener('DOMContentLoaded', function() {

        // --- Get all the popup elements ---
        const mainPopup = document.getElementById('my-popup');
        const termsPopup = document.getElementById('my-popup-terms');
        const privacyPopup = document.getElementById('my-popup-privacy');
        const disclaimerPopup = document.getElementById('my-popup-disclaimer');
        const samplesPopup = document.getElementById('my-popup-samples');
        const faqPopup = document.getElementById('my-popup-faq');
        const continueBtn = document.getElementById('continue-btn');
        const checkbox = document.getElementById('confirm-checkbox');

        // --- FAQs Tab: capture phase se pehle rok lo ---
        setTimeout(function() {
            const allTabNavs = document.querySelectorAll('.tab-nav');
            allTabNavs.forEach(function(tab) {
                const span = tab.querySelector('.tab-title');
                if (span && span.textContent.trim() === 'FAQs') {
                    tab.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        if (faqPopup) faqPopup.style.display = 'flex';
                    }, true);
                }
            });
        }, 500);



        // --- Radio color fix ---
        function updateRadioColors() {
            const allOptions = document.querySelectorAll('.report-option');
            allOptions.forEach(function(option) {
                const radio = option.querySelector('input[type="radio"]');
                const level = option.querySelector('.report-level');
                const price = option.querySelector('.report-price');
                if (radio && radio.checked) {
                    option.style.borderColor = '#c9a84c';
                    option.style.backgroundColor = '#fdf8ee';
                    if (level) level.style.color = '#c9a84c';
                    if (price) price.style.color = '#c9a84c';
                } else {
                    option.style.borderColor = '#ddd';
                    option.style.backgroundColor = '#fff';
                    if (level) level.style.color = '#222';
                    if (price) price.style.color = '#222';
                }
            });
        }

        // --- Body click handler ---
        document.body.addEventListener('click', function(event) {

            // --- Open Main Popup ---
            if (event.target.closest('.open-custom-popup')) {
                event.preventDefault();
                if (mainPopup) {
                    if (checkbox) checkbox.checked = false;
                    if (continueBtn) continueBtn.disabled = true;
                    const radios = document.querySelectorAll('input[name="report-type"]');
                    radios.forEach(function(radio) { radio.checked = false; });
                    updateRadioColors();
                    mainPopup.style.display = 'flex';
                }
            }

            // --- Open Terms Popup ---
            if (event.target.id === 'open-terms-popup') {
                event.preventDefault();
                if (termsPopup) termsPopup.style.display = 'flex';
            }

            // --- Open Privacy Popup ---
            if (event.target.id === 'open-privacy-popup') {
                event.preventDefault();
                if (privacyPopup) privacyPopup.style.display = 'flex';
            }

            // --- Open Disclaimer Popup ---
            if (event.target.id === 'open-disclaimer-popup') {
                event.preventDefault();
                if (disclaimerPopup) disclaimerPopup.style.display = 'flex';
            }

            // --- Open Sample Reports Popup ---
            if (event.target.closest('.open-sample-reports-link')) {
                event.preventDefault();
                if (samplesPopup) samplesPopup.style.display = 'flex';
            }

            // --- Open FAQ Popup (shortcode link) ---
            if (event.target.closest('.open-faq-link')) {
                event.preventDefault();
                if (faqPopup) faqPopup.style.display = 'flex';
            }

            // --- Footer Links ---
            if (event.target.closest('.open-footer-terms')) {
                event.preventDefault();
                if (termsPopup) termsPopup.style.display = 'flex';
            }
            if (event.target.closest('.open-footer-privacy')) {
                event.preventDefault();
                if (privacyPopup) privacyPopup.style.display = 'flex';
            }
            if (event.target.closest('.open-footer-disclaimer')) {
                event.preventDefault();
                if (disclaimerPopup) disclaimerPopup.style.display = 'flex';
            }

            // --- Close any popup ---
            if (event.target.classList.contains('close-btn')) {
                const popupToClose = event.target.closest('.popup');
                if (popupToClose) popupToClose.style.display = 'none';
            }
            if (event.target.classList.contains('popup')) {
                event.target.style.display = 'none';
            }
        });

        // --- Continue Button Logic ---
        if (checkbox && continueBtn) {
            checkbox.onchange = function() {
                const selectedReport = document.querySelector('input[name="report-type"]:checked');
                continueBtn.disabled = !(this.checked && selectedReport);
            };
        }

        // --- Radio change ---
        document.addEventListener('change', function(e) {
            if (e.target.name === 'report-type') {
                updateRadioColors();
                const selectedReport = document.querySelector('input[name="report-type"]:checked');
                if (checkbox && continueBtn) {
                    continueBtn.disabled = !(checkbox.checked && selectedReport);
                }
            }
        });

        // --- Continue Button Click ---
        if (continueBtn) {
            continueBtn.removeAttribute('onclick');
            continueBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                const selectedReport = document.querySelector('input[name="report-type"]:checked');
                if (selectedReport) {
                    window.location.replace(selectedReport.value);
                }
                return false;
            }, true);
        }

    });
})();