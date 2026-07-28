/* ==========================================================================
   Contact Page â€” Banner & Form Logic
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    initLaptopStage();
    initSimpleContactForm();
    initStartChat();
    initHeadingFadeInUp();
});

/* ==========================================================================
   1. LAPTOP 360Â° STAGE â€” tilt the laptop image on arrow clicks
   ========================================================================== */
function initLaptopStage() {
    const laptopStage   = document.getElementById('esper3dScene');
    const laptopImg     = document.getElementById('laptopImage');
    const rotateLeftBtn = document.getElementById('rotateLeftBtn');
    const rotateRightBtn= document.getElementById('rotateRightBtn');

    if (!laptopImg) return;

    let currentTilt = 0; // degrees of Y rotation / perspective skew

    function applyTilt(deg) {
        currentTilt = Math.max(-30, Math.min(30, deg));
        const scaleX = 1 - Math.abs(currentTilt) * 0.002;
        laptopImg.style.transform = `perspective(900px) rotateY(${currentTilt}deg) scaleX(${scaleX})`;

        if (laptopStage) {
            laptopStage.classList.toggle('tilting', currentTilt !== 0);
        }
    }

    if (rotateLeftBtn) {
        rotateLeftBtn.addEventListener('click', () => {
            applyTilt(currentTilt - 12);
            // Snap back to centre after 600ms
            clearTimeout(rotateLeftBtn._snap);
            rotateLeftBtn._snap = setTimeout(() => applyTilt(0), 900);
        });
    }

    if (rotateRightBtn) {
        rotateRightBtn.addEventListener('click', () => {
            applyTilt(currentTilt + 12);
            clearTimeout(rotateRightBtn._snap);
            rotateRightBtn._snap = setTimeout(() => applyTilt(0), 900);
        });
    }

    // Scroll-down tick scrolls to the form
    const tick = document.querySelector('.esper-scroll-tick');
    if (tick) {
        tick.style.cursor = 'pointer';
        tick.addEventListener('click', () => {
            const target = document.getElementById('contactFormSection');
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    }
}

/* ==========================================================================
   2. SIMPLIFIED CONTACT FORM SUBMISSION
   ========================================================================== */
function initSimpleContactForm() {
    // no extra JS needed for the clean form besides submit handler
}

// Handles form submission for the simplified Send a Message form
function handleContactSubmit(event) {
    event.preventDefault();
    const btn = document.getElementById('formSubmitBtn');
    if (!btn) return;

    const origHTML = btn.innerHTML;
    btn.innerHTML = `<span class="csf-arrow-icon" style="animation:spin .7s linear infinite;">â†»</span><span class="csf-btn-label">Sending...</span>`;
    btn.disabled = true;

    setTimeout(() => {
        btn.innerHTML = `<span class="csf-arrow-icon">âœ“</span><span class="csf-btn-label">Message Sent!</span>`;
        btn.style.background = '#10b981';

        setTimeout(() => {
            alert('Thank you! Your message has been received. We\'ll be in touch within 15 minutes.');
            btn.innerHTML = origHTML;
            btn.style.background = '';
            btn.disabled = false;
            event.target.reset();
        }, 2000);
    }, 1400);
}

/* ==========================================================================
   3. START CHAT BUTTON
   ========================================================================== */
function initStartChat() {
    const chatBtn = document.getElementById('startChatBtn');
    if (chatBtn) {
        chatBtn.addEventListener('click', () => {
            chatBtn.innerHTML = `<span class="cinfo-icon-circle cinfo-icon-orange"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span><span>Connecting Engineer...</span>`;
            setTimeout(() => {
                chatBtn.innerHTML = `<span class="cinfo-icon-circle cinfo-icon-orange"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span><span>Start Chat</span>`;
                alert('Live chat is currently available. A senior engineer will be with you momentarily!');
            }, 1600);
        });
    }
}

/* ==========================================================================
   4. H1 & H2 FADE-IN-UP SCROLL OBSERVER
   ========================================================================== */
function initHeadingFadeInUp() {
    const headings = document.querySelectorAll('h1, h2');
    if (!headings.length) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });

        headings.forEach(heading => {
            if (heading.closest('#esperBannerHero') || heading.closest('#hero') || heading.closest('.esper-banner-section')) {
                heading.style.animation = 'fadeInUpHeading 0.95s cubic-bezier(0.16, 1, 0.3, 1) both';
            } else {
                heading.classList.add('fade-in-up-scroll');
                observer.observe(heading);
            }
        });
    } else {
        headings.forEach(h => h.style.animation = 'fadeInUpHeading 0.95s cubic-bezier(0.16, 1, 0.3, 1) both');
    }
}

