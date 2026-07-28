/* ==========================================================================
   Services Page Logic & Scroll Animations
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
    initServiceButtons();
});

/* Initialize IntersectionObserver for smooth scroll animations */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -12% 0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries, observerInstance) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    // Stop observing once animated in for smooth, steady display
                    observerInstance.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(el => observer.observe(el));
    } else {
        // Fallback for older browsers without IntersectionObserver
        animatedElements.forEach(el => el.classList.add('in-view'));
    }
}

/* Connect GET STARTED CTA buttons to smooth transition / contact action */
function initServiceButtons() {
    const buttons = document.querySelectorAll('.service-cta-btn');
    buttons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            // Direct to contact page with pre-selected service context or smooth alert confirmation
            const serviceTitles = [
                'Custom Software Development',
                'Knowledge Process Outsourcing (KPO)',
                'Workflow Optimization',
                'UI / UX Design Services'
            ];
            const chosenService = serviceTitles[index] || 'Our Services';
            
            // If contact.html exists or we want to go to contact form
            window.location.href = `contact.html?service=${encodeURIComponent(chosenService)}`;
        });
    });
}
