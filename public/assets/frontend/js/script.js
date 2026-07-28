/* ==========================================================================
   SolutioTech - Custom Software Solutions at an Affordable Cost
   High-Precision Interactive Engine:
   1. Clean IT Company Architecture Ring Ecosystem (`simple and matching IT company`)
   2. Scroll-Driven Hand Movement to Center & Content Hiding (`to hide contant`)
   3. High-Impact IT Architecture Fingertip Meeting Animation (`matching type annimation`)
   4. Interactive Costing Calculator & Audio Synth
   ========================================================================== */

(function () {
    'use strict';

    // State Variables
    const state = {
        scrollProgress: 0,
        currentProgress: 0, // lerp smoothed
        targetProgress: 0,
        isScrubbing: false,
        isAutoPlaying: false,
        gapDistance: 2, // px gap between fingertips when closed
        renderMode: 'image', // 'image' | 'svg' | 'hybrid'
        isMuted: true,
        theme: 'light',
        hasIgnited: false
    };

    // DOM Elements
    const titleGroup = document.getElementById('titleGroup');
    const itTechEcosystem = document.getElementById('itTechEcosystem');
    const leftHandWrapper = document.getElementById('leftHandWrapper');
    const rightHandWrapper = document.getElementById('rightHandWrapper');
    const leftHandImg = document.getElementById('leftHandImg');
    const rightHandImg = document.getElementById('rightHandImg');
    const leftHandSvg = document.getElementById('leftHandSvg');
    const rightHandSvg = document.getElementById('rightHandSvg');
    
    const sparkCore = document.getElementById('sparkCore');
    const portalBanner = document.getElementById('portalBanner');
    const scrollStatusBanner = document.getElementById('scrollStatusBanner');
    const statusText = document.getElementById('statusText');
    const statusPill = document.getElementById('statusPill');
    const statusPillText = document.getElementById('statusPillText');
    const scrollPrompt = document.getElementById('scrollPrompt');
    const heroTextOverlay = document.getElementById('heroTextOverlay');
    const touchScrollDownPrompt = document.getElementById('touchScrollDownPrompt');
    
    // Control Deck Elements
    const deckToggle = document.getElementById('deckToggle');
    const deckPanel = document.getElementById('deckPanel');
    const scrollScrubber = document.getElementById('scrollScrubber');
    const scrollPercentDisplay = document.getElementById('scrollPercentDisplay');
    const autoPlayBtn = document.getElementById('autoPlayBtn');
    const soundToggleBtn = document.getElementById('soundToggleBtn');
    const soundIcon = document.getElementById('soundIcon');
    const soundText = document.getElementById('soundText');
    const renderModeSelector = document.getElementById('renderModeSelector');
    const gapDistanceInput = document.getElementById('gapDistanceInput');
    const gapDisplay = document.getElementById('gapDisplay');
    const themeBtn = document.getElementById('themeBtn');
    const colorSwitcherPill = document.getElementById('colorSwitcherPill');

    // Interactive Cost Calculator Elements
    const complexitySlider = document.getElementById('complexitySlider');
    const complexityLabel = document.getElementById('complexityLabel');
    const aiLevelSlider = document.getElementById('aiLevelSlider');
    const aiLevelVal = document.getElementById('aiLevelVal');
    const timelineDisplay = document.getElementById('timelineDisplay');
    const costDisplay = document.getElementById('costDisplay');

    // Canvases
    const bgCanvas = document.getElementById('bgCanvas');
    const bgCtx = bgCanvas ? bgCanvas.getContext('2d') : null;
    const synapseCanvas = document.getElementById('synapseCanvas');
    const synapseCtx = synapseCanvas ? synapseCanvas.getContext('2d') : null;

    // Audio Engine (Web Audio API)
    let audioCtx = null;
    function initAudio() {
        if (!audioCtx && typeof window !== 'undefined' && window.AudioContext) {
            audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        }
    }

    function playSparkSound() {
        if (state.isMuted) return;
        initAudio();
        if (!audioCtx) return;

        try {
            const now = audioCtx.currentTime;
            
            // Clean, professional IT data ping / quantum chime when fingertips meet
            const osc1 = audioCtx.createOscillator();
            const osc2 = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            
            osc1.type = 'sine';
            osc1.frequency.setValueAtTime(587.33, now); // D5
            osc1.frequency.exponentialRampToValueAtTime(880.00, now + 0.4); // A5
            
            osc2.type = 'triangle';
            osc2.frequency.setValueAtTime(293.66, now); // D4
            osc2.frequency.exponentialRampToValueAtTime(440.00, now + 0.4);
            
            gain.gain.setValueAtTime(0.2, now);
            gain.gain.exponentialRampToValueAtTime(0.01, now + 0.45);
            
            osc1.connect(gain);
            osc2.connect(gain);
            gain.connect(audioCtx.destination);
            
            osc1.start(now);
            osc2.start(now);
            osc1.stop(now + 0.45);
            osc2.stop(now + 0.45);
        } catch (e) {
            console.error('Audio synth error:', e);
        }
    }


    /* ==========================================================================
       1. Background Clean IT Data Grid & Nodes (`#bgCanvas`)
       ========================================================================== */
    const gridNodes = [];
    function initBgGrid() {
        if (!bgCanvas) return;
        bgCanvas.width = window.innerWidth;
        bgCanvas.height = window.innerHeight;
        gridNodes.length = 0;

        const count = 35;
        for (let i = 0; i < count; i++) {
            gridNodes.push({
                x: Math.random() * bgCanvas.width,
                y: Math.random() * bgCanvas.height,
                radius: Math.random() * 3 + 1.2,
                vx: (Math.random() - 0.5) * 0.25,
                vy: (Math.random() - 0.5) * 0.25,
                alpha: Math.random() * 0.35 + 0.08,
                color: Math.random() > 0.4 ? '147, 51, 234' : '59, 130, 246'
            });
        }
    }

    function renderBgGrid() {
        if (!bgCtx || !bgCanvas) return;
        bgCtx.clearRect(0, 0, bgCanvas.width, bgCanvas.height);

        // Render clean, subtle IT connection lines between nearby nodes
        for (let i = 0; i < gridNodes.length; i++) {
            for (let j = i + 1; j < gridNodes.length; j++) {
                const dx = gridNodes[i].x - gridNodes[j].x;
                const dy = gridNodes[i].y - gridNodes[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 180) {
                    bgCtx.beginPath();
                    bgCtx.moveTo(gridNodes[i].x, gridNodes[i].y);
                    bgCtx.lineTo(gridNodes[j].x, gridNodes[j].y);
                    bgCtx.strokeStyle = `rgba(148, 163, 186, ${(1 - dist / 180) * 0.12})`;
                    bgCtx.lineWidth = 1;
                    bgCtx.stroke();
                }
            }
        }

        gridNodes.forEach(node => {
            node.x += node.vx;
            node.y += node.vy;

            if (node.x < -20) node.x = bgCanvas.width + 20;
            if (node.x > bgCanvas.width + 20) node.x = -20;
            if (node.y < -20) node.y = bgCanvas.height + 20;
            if (node.y > bgCanvas.height + 20) node.y = -20;

            bgCtx.beginPath();
            bgCtx.arc(node.x, node.y, node.radius, 0, Math.PI * 2);
            bgCtx.fillStyle = `rgba(${node.color}, ${node.alpha})`;
            bgCtx.shadowColor = `rgba(${node.color}, ${node.alpha * 0.7})`;
            bgCtx.shadowBlur = node.radius * 2;
            bgCtx.fill();
        });
    }

    window.addEventListener('resize', () => {
        initBgGrid();
        if (synapseCanvas) {
            synapseCanvas.width = synapseCanvas.offsetWidth || 360;
            synapseCanvas.height = synapseCanvas.offsetHeight || 360;
        }
    });


    /* ==========================================================================
       2. IT Company Fingertip Meeting Canvas (`#synapseCanvas`)
       Code Packets, API Beams & Data Hexagons
       ========================================================================== */
    const itDataPackets = [];

    function initSynapseCanvas() {
        if (!synapseCanvas) return;
        synapseCanvas.width = synapseCanvas.offsetWidth || 360;
        synapseCanvas.height = synapseCanvas.offsetHeight || 360;
    }

    function spawnSynapseParticle() {
        if (!synapseCanvas) return;
        const cx = synapseCanvas.width / 2;
        const cy = synapseCanvas.height / 2;

        const colors = ['#00f0ff', '#9333ea', '#38bdf8', '#c084fc', '#ffffff'];
        const angle = Math.random() * Math.PI * 2;
        const speed = Math.random() * 1.6 + 0.35;

        itDataPackets.push({
            x: cx,
            y: cy,
            vx: Math.cos(angle) * speed,
            vy: Math.sin(angle) * speed,
            color: colors[Math.floor(Math.random() * colors.length)],
            alpha: 1,
            size: Math.random() * 3.5 + 2
        });
    }

    function renderITSynapse() {
        if (!synapseCtx || !synapseCanvas) return;
        synapseCtx.clearRect(0, 0, synapseCanvas.width, synapseCanvas.height);

        const cx = synapseCanvas.width / 2;
        const cy = synapseCanvas.height / 2;

        // If fingertips are in contact (`progress >= 0.86`), trigger clean quantum energy synthesis
        if (state.currentProgress >= 0.86) {
            if (Math.random() > 0.45) spawnSynapseParticle();
            if (Math.random() > 0.45) spawnSynapseParticle();

            // Draw clean, sophisticated central glow (No lines, No cluttered text!)
            const grad = synapseCtx.createRadialGradient(cx, cy, 2, cx, cy, 38);
            grad.addColorStop(0, 'rgba(255, 255, 255, 0.85)');
            grad.addColorStop(0.3, 'rgba(0, 240, 255, 0.45)');
            grad.addColorStop(0.7, 'rgba(147, 51, 234, 0.25)');
            grad.addColorStop(1, 'transparent');
            synapseCtx.beginPath();
            synapseCtx.arc(cx, cy, 38, 0, Math.PI * 2);
            synapseCtx.fillStyle = grad;
            synapseCtx.fill();
        }

        // Render clean glowing quantum light particles
        for (let i = itDataPackets.length - 1; i >= 0; i--) {
            const p = itDataPackets[i];
            p.x += p.vx;
            p.y += p.vy;
            p.alpha -= 0.012;

            if (p.alpha <= 0) {
                itDataPackets.splice(i, 1);
                continue;
            }

            synapseCtx.save();
            synapseCtx.beginPath();
            synapseCtx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
            synapseCtx.fillStyle = p.color;
            synapseCtx.globalAlpha = p.alpha;
            synapseCtx.shadowColor = p.color;
            synapseCtx.shadowBlur = 10;
            synapseCtx.fill();
            synapseCtx.restore();
        }
    }


    /* ==========================================================================
       3. Scroll-Driven Hand Movement & Content Hiding (`when i scroll down`)
       ========================================================================== */
    function updateScrollTarget() {
        if (state.isScrubbing || state.isAutoPlaying) return;

        const scrollY = window.scrollY || window.pageYOffset;
        const triggerDistance = 650;
        
        let progress = Math.min(1, Math.max(0, scrollY / triggerDistance));
        state.targetProgress = progress;

        if (scrollScrubber && !state.isScrubbing) {
            scrollScrubber.value = Math.round(progress * 100);
            if (scrollPercentDisplay) scrollPercentDisplay.textContent = Math.round(progress * 100) + '%';
        }
    }

    function lerp(start, end, amt) {
        return (1 - amt) * start + amt * end;
    }

    function applyHandTransform() {
        state.currentProgress = lerp(state.currentProgress, state.targetProgress, 0.12);

        // Left hand (Human) starts at -24vw and glides to exact center (0vw - gapDistance/2)
        // Right hand (White Robotic) starts at 24vw and glides to exact center (0vw + gapDistance/2)
        const isMobile = window.innerWidth <= 768;
        const startOffsetVW = isMobile ? 28 : 24;
        const endOffsetVW = isMobile ? 4 : 0;
        
        const currentVW = lerp(startOffsetVW, endOffsetVW, state.currentProgress);
        const finalGapOffsetPx = (state.gapDistance / 2) * (state.currentProgress);

        if (leftHandWrapper) {
            leftHandWrapper.style.transform = `translateY(-50%) translateX(calc(-${currentVW}vw - ${finalGapOffsetPx}px))`;
        }
        if (rightHandWrapper) {
            rightHandWrapper.style.transform = `translateY(-50%) translateX(calc(${currentVW}vw + ${finalGapOffsetPx}px))`;
        }

        // =====================================================================
        // HERO TEXT OVERLAY & HANDS LAYER (`add overlay on it while both hands smoothly overlay right over the top of it`)
        // =====================================================================
        const overlayProgress = Math.min(1, Math.max(0, (state.currentProgress - 0.05) / 0.70));

        if (heroTextOverlay) {
            heroTextOverlay.style.opacity = Math.min(1, overlayProgress * 1.15);
        }

        if (titleGroup) {
            titleGroup.style.opacity = Math.max(0.55, 1 - overlayProgress * 0.45);
            titleGroup.style.filter = `blur(${overlayProgress * 1.8}px)`;
            titleGroup.style.transform = `scale(${1 - overlayProgress * 0.03})`;
            titleGroup.style.pointerEvents = 'auto';
        }

        if (itTechEcosystem) {
            itTechEcosystem.style.opacity = Math.max(0.40, 1 - overlayProgress * 0.60);
            itTechEcosystem.style.transform = `translate(-50%, -50%) scale(${1 - overlayProgress * 0.05})`;
        }

        // Check if fingertips have reached the contact / meeting point (`progress >= 0.86`)
        const isTouching = state.currentProgress >= 0.86;

        if (isTouching && !state.hasIgnited) {
            state.hasIgnited = true;
            if (sparkCore) sparkCore.classList.add('ignited');
            if (portalBanner) portalBanner.classList.add('show');
            if (scrollStatusBanner) scrollStatusBanner.classList.add('connected');
            if (statusText) statusText.textContent = '⚡ IT SYMBIOSIS ESTABLISHED: CUSTOM ARCHITECTURE LOCKED ⚡';
            if (statusPill) statusPill.classList.add('connected');
            if (statusPillText) statusPillText.textContent = 'Hands United';
            playSparkSound();
        } else if (!isTouching && state.hasIgnited && state.currentProgress < 0.82) {
            state.hasIgnited = false;
            if (sparkCore) sparkCore.classList.remove('ignited');
            if (portalBanner) portalBanner.classList.remove('show');
            if (scrollStatusBanner) scrollStatusBanner.classList.remove('connected');
            if (statusText) statusText.textContent = 'Scroll down to unite hands over content';
            if (statusPill) statusPill.classList.remove('connected');
            if (statusPillText) statusPillText.textContent = 'Hands Separated';
        }

        if (touchScrollDownPrompt) {
            if (isTouching) {
                touchScrollDownPrompt.classList.add('visible');
            } else {
                touchScrollDownPrompt.classList.remove('visible');
            }
        }

        if (scrollPrompt) {
            scrollPrompt.style.opacity = Math.max(0, 1 - state.currentProgress * 2.5);
        }
    }


    /* ==========================================================================
       4. Interactive Costing Calculator (`at an Affordable Cost`)
       ========================================================================== */
    function updateCalculator() {
        if (!complexitySlider || !aiLevelSlider || !timelineDisplay || !costDisplay) return;

        const compVal = parseInt(complexitySlider.value, 10);
        const aiLevel = parseInt(aiLevelSlider.value, 10);

        let baseCost = 25000;
        let baseWeeks = 10;
        let compText = 'Full Enterprise Suite + AI Copilot';

        if (compVal === 1) {
            baseCost = 12000;
            baseWeeks = 5;
            compText = 'Core Web/Mobile MVP System';
        } else if (compVal === 2) {
            baseCost = 24000;
            baseWeeks = 8;
            compText = 'Full Enterprise Suite + AI Copilot';
        } else if (compVal === 3) {
            baseCost = 48000;
            baseWeeks = 14;
            compText = 'Global High-Scale Distributed Grid';
        }

        if (complexityLabel) complexityLabel.textContent = compText;
        if (aiLevelVal) aiLevelVal.textContent = `${aiLevel}% Autonomous Build`;

        const discountFactor = 1 - (aiLevel - 20) / 100 * 0.58;
        const finalCost = Math.round((baseCost * discountFactor) / 500) * 500;
        const finalWeeks = Math.max(2, Math.round(baseWeeks * discountFactor));

        timelineDisplay.textContent = `${finalWeeks} Weeks`;
        costDisplay.textContent = `$${finalCost.toLocaleString()}`;
    }

    if (complexitySlider && aiLevelSlider) {
        complexitySlider.addEventListener('input', updateCalculator);
        aiLevelSlider.addEventListener('input', updateCalculator);
        updateCalculator();
    }


    /* ==========================================================================
       5. Control Deck Customizer Listeners
       ========================================================================== */
    if (deckToggle && deckPanel) {
        deckToggle.addEventListener('click', () => {
            deckPanel.classList.toggle('open');
        });
    }

    if (scrollScrubber) {
        scrollScrubber.addEventListener('input', (e) => {
            state.isScrubbing = true;
            state.isAutoPlaying = false;
            state.targetProgress = parseFloat(e.target.value) / 100;
            if (scrollPercentDisplay) scrollPercentDisplay.textContent = Math.round(state.targetProgress * 100) + '%';
        });

        scrollScrubber.addEventListener('change', () => {
            setTimeout(() => { state.isScrubbing = false; }, 1000);
        });
    }

    if (autoPlayBtn) {
        autoPlayBtn.addEventListener('click', () => {
            state.isAutoPlaying = true;
            state.isScrubbing = false;
            state.targetProgress = 0;
            if (scrollScrubber) scrollScrubber.value = 0;
            if (scrollPercentDisplay) scrollPercentDisplay.textContent = '0%';

            const startTime = performance.now();
            const duration = 2600;

            function autoAnimateStep(timestamp) {
                const elapsed = timestamp - startTime;
                const p = Math.min(1, elapsed / duration);
                const eased = p < 0.5 ? 4 * p * p * p : 1 - Math.pow(-2 * p + 2, 3) / 2;
                
                state.targetProgress = eased;
                if (scrollScrubber) scrollScrubber.value = Math.round(eased * 100);
                if (scrollPercentDisplay) scrollPercentDisplay.textContent = Math.round(eased * 100) + '%';

                if (p < 1 && state.isAutoPlaying) {
                    requestAnimationFrame(autoAnimateStep);
                } else {
                    state.isAutoPlaying = false;
                }
            }

            requestAnimationFrame(autoAnimateStep);
        });
    }

    if (soundToggleBtn && soundIcon && soundText) {
        soundToggleBtn.addEventListener('click', () => {
            state.isMuted = !state.isMuted;
            if (state.isMuted) {
                soundIcon.textContent = '🔇';
                soundText.textContent = 'Sound Muted';
            } else {
                soundIcon.textContent = '🔊';
                soundText.textContent = 'Sound Active';
                initAudio();
                playSparkSound();
            }
        });
    }

    if (renderModeSelector) {
        const pills = renderModeSelector.querySelectorAll('.pill-option');
        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                pills.forEach(p => p.classList.remove('active'));
                pill.classList.add('active');
                state.renderMode = pill.getAttribute('data-mode');

                if (state.renderMode === 'image') {
                    if (leftHandImg) leftHandImg.style.display = 'block';
                    if (rightHandImg) rightHandImg.style.display = 'block';
                    if (leftHandSvg) leftHandSvg.style.display = 'none';
                    if (rightHandSvg) rightHandSvg.style.display = 'none';
                } else if (state.renderMode === 'svg') {
                    if (leftHandImg) leftHandImg.style.display = 'none';
                    if (rightHandImg) rightHandImg.style.display = 'none';
                    if (leftHandSvg) leftHandSvg.style.display = 'block';
                    if (rightHandSvg) rightHandSvg.style.display = 'block';
                } else if (state.renderMode === 'hybrid') {
                    if (leftHandImg) leftHandImg.style.display = 'block';
                    if (rightHandImg) rightHandImg.style.display = 'block';
                    if (leftHandSvg) {
                        leftHandSvg.style.display = 'block';
                        leftHandSvg.style.position = 'absolute';
                        leftHandSvg.style.opacity = '0.4';
                    }
                    if (rightHandSvg) {
                        rightHandSvg.style.display = 'block';
                        rightHandSvg.style.position = 'absolute';
                        rightHandSvg.style.opacity = '0.4';
                    }
                }
            });
        });
    }

    if (gapDistanceInput && gapDisplay) {
        gapDistanceInput.addEventListener('input', (e) => {
            state.gapDistance = parseFloat(e.target.value);
            gapDisplay.textContent = `${state.gapDistance}px`;
        });
    }

    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            state.theme = state.theme === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', state.theme);
        });
    }

    if (colorSwitcherPill) {
        const dots = colorSwitcherPill.querySelectorAll('.color-dot');
        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                e.stopPropagation();
                dots.forEach(d => d.classList.remove('active'));
                dot.classList.add('active');
                const selectedTheme = dot.getAttribute('data-color') || 'light';
                state.theme = selectedTheme;
                document.documentElement.setAttribute('data-theme', selectedTheme);
            });
        });
    }

    const searchTrigger = document.getElementById('searchTrigger');
    if (searchTrigger && autoPlayBtn) {
        searchTrigger.addEventListener('click', () => {
            autoPlayBtn.click();
        });
    }

    // Button-Type Mobile Menu Toggle (`i want button type mobile menu`)
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileNavMenu = document.getElementById('mobileNavMenu');
    if (mobileMenuBtn && mobileNavMenu) {
        mobileMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            mobileMenuBtn.classList.toggle('is-active');
            mobileNavMenu.classList.toggle('menu-open');
        });

        const mobileLinks = mobileNavMenu.querySelectorAll('.mobile-nav-btn');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('is-active');
                mobileNavMenu.classList.remove('menu-open');
            });
        });

        document.addEventListener('click', (e) => {
            if (!mobileNavMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenuBtn.classList.remove('is-active');
                mobileNavMenu.classList.remove('menu-open');
            }
        });
    }


    /* ==========================================================================
       6. Works Showcase Carousel Engine (`works-slide-card`)
       ========================================================================== */
    let currentWorksSlideIndex = 0;
    let worksCarouselTimer = null;

    function initWorksCarousel() {
        const track = document.getElementById('worksCarouselTrack');
        const dots = document.querySelectorAll('#worksCarouselDots .carousel-dot');
        const prevBtn = document.getElementById('worksPrevBtn');
        const nextBtn = document.getElementById('worksNextBtn');

        if (!track) return;

        // Remove any old clones if re-initialized or present
        const oldClones = track.querySelectorAll('[data-clone="true"]');
        oldClones.forEach(c => c.remove());

        const allCards = Array.from(document.querySelectorAll('#worksCarouselTrack .works-slide-card'));
        const totalCards = allCards.length;
        if (!totalCards) return;

        track.style.position = 'relative';

        let isDotClicking = false;
        let scrollThrottle = false;

        function slideToWorksSlide(index) {
            if (index < 0) {
                index = totalCards - 1;
            } else if (index >= totalCards) {
                index = 0;
            }

            currentWorksSlideIndex = index;
            const targetCard = allCards[index];
            if (!targetCard) return;

            const scrollPos = Math.max(0, targetCard.offsetLeft - 16);

            isDotClicking = true;
            scrollThrottle = true;
            track.style.scrollSnapType = 'none';

            track.scrollTo({
                left: scrollPos,
                behavior: 'smooth'
            });

            setTimeout(() => {
                isDotClicking = false;
                scrollThrottle = false;
                track.style.scrollSnapType = 'x mandatory';
            }, 500);

            updateWorksDots(currentWorksSlideIndex);
        }

        function updateWorksDots(activeIdx) {
            dots.forEach((dot, i) => {
                const dotIndex = parseInt(dot.getAttribute('data-index') || i, 10);
                dot.classList.toggle('active', dotIndex === activeIdx || i === activeIdx);
            });
            allCards.forEach((card, i) => {
                card.classList.toggle('active-slide', i === activeIdx);
            });
        }

        track.addEventListener('scroll', () => {
            if (scrollThrottle || isDotClicking) return;
            scrollThrottle = true;
            requestAnimationFrame(() => {
                if (isDotClicking) {
                    scrollThrottle = false;
                    return;
                }
                let closestIdx = 0;
                let minDiff = Infinity;
                allCards.forEach((card, i) => {
                    const diff = Math.abs((card.offsetLeft - 16) - track.scrollLeft);
                    if (diff < minDiff) {
                        minDiff = diff;
                        closestIdx = i;
                    }
                });
                currentWorksSlideIndex = closestIdx;
                updateWorksDots(closestIdx);
                scrollThrottle = false;
            });
        }, { passive: true });

        if (prevBtn) prevBtn.addEventListener('click', () => slideToWorksSlide(currentWorksSlideIndex - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => slideToWorksSlide(currentWorksSlideIndex + 1));

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.getAttribute('data-index') || i, 10);
                slideToWorksSlide(idx);
            });
        });

        // Mouse Drag to Swipe on Desktop
        let isDown = false;
        let startX = 0;
        let scrollLeftPos = 0;

        track.addEventListener('mousedown', (e) => {
            isDown = true;
            track.style.cursor = 'grabbing';
            track.style.scrollSnapType = 'none';
            startX = e.pageX - track.offsetLeft;
            scrollLeftPos = track.scrollLeft;
        });

        track.addEventListener('mouseleave', () => {
            if (isDown) {
                isDown = false;
                track.style.cursor = 'grab';
                track.style.scrollSnapType = 'x mandatory';
            }
        });

        track.addEventListener('mouseup', () => {
            if (isDown) {
                isDown = false;
                track.style.cursor = 'grab';
                track.style.scrollSnapType = 'x mandatory';
            }
        });

        track.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - track.offsetLeft;
            const walk = (x - startX) * 1.5;
            track.scrollLeft = scrollLeftPos - walk;
        });

        // Initialize first position cleanly without any auto-timer jumping while reading
        setTimeout(() => {
            updateWorksDots(0);
        }, 200);

        window.slideToWorksSlide = slideToWorksSlide;
    }

    initWorksCarousel();


    /* ==========================================================================
       6A. Bottom Client Showcase Carousel Engine (`add client carouse in bottom`)
       ========================================================================== */
    let currentClientSlideIndex = 0;

    function initClientCarousel() {
        const track = document.getElementById('clientCarouselTrack');
        const dots = document.querySelectorAll('#clientCarouselDots .carousel-dot');
        const prevBtn = document.getElementById('clientPrevBtn');
        const nextBtn = document.getElementById('clientNextBtn');

        if (!track) return;

        const allCards = Array.from(document.querySelectorAll('#clientCarouselTrack .client-slide-card'));
        const totalCards = allCards.length;
        if (!totalCards) return;

        track.style.position = 'relative';

        let isDotClicking = false;
        let scrollThrottle = false;

        function slideToClientSlide(index) {
            if (index < 0) {
                index = totalCards - 1;
            } else if (index >= totalCards) {
                index = 0;
            }

            currentClientSlideIndex = index;
            const targetCard = allCards[index];
            if (!targetCard) return;

            const scrollPos = Math.max(0, targetCard.offsetLeft - 16);

            isDotClicking = true;
            scrollThrottle = true;
            track.style.scrollSnapType = 'none';

            track.scrollTo({
                left: scrollPos,
                behavior: 'smooth'
            });

            setTimeout(() => {
                isDotClicking = false;
                scrollThrottle = false;
                track.style.scrollSnapType = 'x mandatory';
            }, 500);

            updateClientDots(currentClientSlideIndex);
        }

        function updateClientDots(activeIdx) {
            dots.forEach((dot, i) => {
                const dotIndex = parseInt(dot.getAttribute('data-index') || i, 10);
                dot.classList.toggle('active', dotIndex === activeIdx || i === activeIdx);
            });
            allCards.forEach((card, i) => {
                card.classList.toggle('active-slide', i === activeIdx);
            });
        }

        track.addEventListener('scroll', () => {
            if (scrollThrottle || isDotClicking) return;
            scrollThrottle = true;
            requestAnimationFrame(() => {
                if (isDotClicking) {
                    scrollThrottle = false;
                    return;
                }
                let closestIdx = 0;
                let minDiff = Infinity;
                allCards.forEach((card, i) => {
                    const diff = Math.abs((card.offsetLeft - 16) - track.scrollLeft);
                    if (diff < minDiff) {
                        minDiff = diff;
                        closestIdx = i;
                    }
                });
                currentClientSlideIndex = closestIdx;
                updateClientDots(closestIdx);
                scrollThrottle = false;
            });
        }, { passive: true });

        if (prevBtn) prevBtn.addEventListener('click', () => slideToClientSlide(currentClientSlideIndex - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => slideToClientSlide(currentClientSlideIndex + 1));

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.getAttribute('data-index') || i, 10);
                slideToClientSlide(idx);
            });
        });

        // Mouse Drag to Swipe on Desktop
        let isDown = false;
        let startX = 0;
        let scrollLeftPos = 0;

        track.addEventListener('mousedown', (e) => {
            isDown = true;
            track.style.cursor = 'grabbing';
            track.style.scrollSnapType = 'none';
            startX = e.pageX - track.offsetLeft;
            scrollLeftPos = track.scrollLeft;
        });

        track.addEventListener('mouseleave', () => {
            if (isDown) {
                isDown = false;
                track.style.cursor = 'grab';
                track.style.scrollSnapType = 'x mandatory';
            }
        });

        track.addEventListener('mouseup', () => {
            if (isDown) {
                isDown = false;
                track.style.cursor = 'grab';
                track.style.scrollSnapType = 'x mandatory';
            }
        });

        track.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - track.offsetLeft;
            const walk = (x - startX) * 1.5;
            track.scrollLeft = scrollLeftPos - walk;
        });

        setTimeout(() => {
            updateClientDots(0);
        }, 200);

        window.slideToClientSlide = slideToClientSlide;
    }

    initClientCarousel();


    /* ==========================================================================
       6B. Contact Form Background Animation Canvas (`add bg annimation`)
       ========================================================================== */
    let contactBgCanvas = null;
    let contactBgCtx = null;
    let contactBgWidth = 0;
    let contactBgHeight = 0;
    let contactBgTime = 0;
    let contactParticles = [];

    function initContactBgCanvas() {
        contactBgCanvas = document.getElementById('contactBgCanvas');
        if (!contactBgCanvas) return;
        contactBgCtx = contactBgCanvas.getContext('2d');

        function resizeContactCanvas() {
            const wrapper = contactBgCanvas.parentElement;
            if (!wrapper) return;
            const rect = wrapper.getBoundingClientRect();
            contactBgCanvas.width = rect.width + 100;
            contactBgCanvas.height = rect.height + 100;
            contactBgWidth = contactBgCanvas.width;
            contactBgHeight = contactBgCanvas.height;
            initContactParticles();
        }

        function initContactParticles() {
            contactParticles = [];
            const count = 35;
            for (let i = 0; i < count; i++) {
                contactParticles.push({
                    x: Math.random() * contactBgWidth,
                    y: Math.random() * contactBgHeight,
                    r: 1.5 + Math.random() * 3.5,
                    vx: (Math.random() - 0.5) * 0.8,
                    vy: -0.3 - Math.random() * 0.7,
                    alpha: 0.15 + Math.random() * 0.45,
                    hue: Math.random() > 0.5 ? 260 : 215
                });
            }
        }

        window.addEventListener('resize', resizeContactCanvas);
        resizeContactCanvas();
    }

    function renderContactBgCanvas() {
        if (!contactBgCtx || contactBgWidth === 0) return;
        contactBgCtx.clearRect(0, 0, contactBgWidth, contactBgHeight);
        contactBgTime += 0.015;

        const isDark = document.body.getAttribute('data-theme') === 'dark';

        contactParticles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;

            if (p.y < -20) p.y = contactBgHeight + 20;
            if (p.x < -20) p.x = contactBgWidth + 20;
            if (p.x > contactBgWidth + 20) p.x = -20;

            contactBgCtx.beginPath();
            contactBgCtx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            contactBgCtx.fillStyle = `hsla(${p.hue}, 85%, ${isDark ? '68%' : '55%'}, ${p.alpha})`;
            contactBgCtx.shadowBlur = 12;
            contactBgCtx.shadowColor = `hsla(${p.hue}, 85%, 65%, 0.6)`;
            contactBgCtx.fill();
            contactBgCtx.shadowBlur = 0;
        });
    }


    /* ==========================================================================
       7. Main Animation Loop
       ========================================================================== */
    function animationLoop() {
        renderBgGrid();
        applyHandTransform();
        renderITSynapse();
        renderFannedWaveCanvas();
        renderContactBgCanvas();
        requestAnimationFrame(animationLoop);
    }

    /* ==========================================================================
       8. Fanned Cards Right-to-Left Flow Entrance Animation
       ========================================================================== */
    function initFannedCardsAnimation() {
        const deck = document.querySelector('.fanned-cards-deck');
        if (!deck) return;

        // Check if IntersectionObserver is supported
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        deck.classList.add('cards-flow-active');
                        setTimeout(() => {
                            deck.classList.add('cards-flow-settled');
                        }, 1600);
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

            observer.observe(deck);
        } else {
            // Fallback for browsers without IntersectionObserver
            deck.classList.add('cards-flow-active', 'cards-flow-settled');
        }
    }

    /* ==========================================================================
       9. 3D Dotted Ribbon Wave Mesh Background for Fanned Ecosystem Section
       ========================================================================== */
    let fannedWaveCanvas = null;
    let fannedWaveCtx = null;
    let fannedWaveTime = 0;

    function initFannedWaveCanvas() {
        fannedWaveCanvas = document.getElementById('fannedWaveCanvas');
        if (!fannedWaveCanvas) return;
        fannedWaveCtx = fannedWaveCanvas.getContext('2d');

        function resize() {
            if (!fannedWaveCanvas) return;
            fannedWaveCanvas.width = fannedWaveCanvas.offsetWidth * (window.devicePixelRatio || 1);
            fannedWaveCanvas.height = fannedWaveCanvas.offsetHeight * (window.devicePixelRatio || 1);
        }

        window.addEventListener('resize', resize, { passive: true });
        resize();
    }

    function renderFannedWaveCanvas() {
        if (!fannedWaveCanvas || !fannedWaveCtx) return;
        const w = fannedWaveCanvas.width;
        const h = fannedWaveCanvas.height;
        if (w === 0 || h === 0) return;

        fannedWaveCtx.clearRect(0, 0, w, h);

        fannedWaveTime += 0.025;

        // Number of dots along the ribbon length and width
        const cols = Math.floor(w / 16) + 5;
        const rows = 28; // 28 parallel rows forming the ribbon mesh
        const centerY = h * 0.45;

        for (let r = 0; r < rows; r++) {
            // z ranges from -1 to 1 (back to front in 3D perspective)
            const zNorm = (r / (rows - 1)) * 2 - 1;
            const zDepth = zNorm * 180;
            const scale = 800 / (800 + zDepth + 200);

            for (let c = 0; c < cols; c++) {
                // u ranges from 0 to 1 across the screen width
                const u = c / (cols - 1);
                const baseWidth = w * 1.15;
                const baseX = -w * 0.075 + u * baseWidth;

                // 3D S-curve sine wave equations creating the undulating ribbon twist
                const wave1 = Math.sin(u * Math.PI * 2.2 + fannedWaveTime * 0.8 + zNorm * 1.5) * (h * 0.16);
                const wave2 = Math.cos(u * Math.PI * 3.4 - fannedWaveTime * 0.6 + zNorm * 0.8) * (h * 0.10);
                const wave3 = Math.sin(u * Math.PI * 1.1 - fannedWaveTime * 0.4) * (h * 0.22);
                const twist = Math.sin(u * Math.PI * 1.8 + fannedWaveTime * 0.5) * zNorm * (h * 0.12);

                const py = centerY + (wave1 + wave2 + wave3 + twist) * scale;
                const px = baseX + zNorm * (w * 0.08) * Math.cos(u * Math.PI + fannedWaveTime * 0.3);

                // Calculate dot size and edge fade opacity (fade at left/right edges)
                const edgeFade = Math.sin(u * Math.PI);
                const depthFade = 0.35 + (zNorm + 1) * 0.35;
                const alpha = Math.min(1, Math.max(0, edgeFade * depthFade * 0.9));

                if (alpha <= 0.02) continue;

                const radius = Math.max(0.8, (1.6 + (zNorm + 1) * 1.2) * scale * (window.devicePixelRatio || 1) * 0.65);

                // Color gradient along the wave: Purple -> Cyan -> Magenta
                let red, green, blue;
                if (u < 0.48) {
                    // Purple (147, 51, 234) to Cyan (0, 194, 255)
                    const f = u / 0.48;
                    red = Math.round(147 + (0 - 147) * f);
                    green = Math.round(51 + (194 - 51) * f);
                    blue = Math.round(234 + (255 - 234) * f);
                } else {
                    // Cyan (0, 194, 255) to Magenta (232, 121, 249)
                    const f = (u - 0.48) / 0.52;
                    red = Math.round(0 + (232 - 0) * f);
                    green = Math.round(194 + (121 - 194) * f);
                    blue = Math.round(255 + (249 - 255) * f);
                }

                fannedWaveCtx.beginPath();
                fannedWaveCtx.arc(px, py, radius, 0, Math.PI * 2);
                fannedWaveCtx.fillStyle = `rgba(${red}, ${green}, ${blue}, ${alpha.toFixed(3)})`;
                fannedWaveCtx.fill();
            }
        }
    }

    /* ==========================================================================
       10. Creative Infographic Center Counter Animation (`64%`)
       ========================================================================== */
    function initInfographicCounter() {
        const counterEl = document.getElementById('infographicCounter');
        const sectionEl = document.getElementById('creative-infographic');
        if (!counterEl || !sectionEl) return;

        let hasAnimated = false;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasAnimated) {
                    hasAnimated = true;
                    let start = 0;
                    const target = 64;
                    const duration = 1800;
                    const startTime = performance.now();

                    function updateNumber(now) {
                        const elapsed = now - startTime;
                        const progress = Math.min(1, elapsed / duration);
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        const current = Math.round(start + (target - start) * easeOut);
                        counterEl.textContent = current + '%';
                        if (progress < 1) {
                            requestAnimationFrame(updateNumber);
                        }
                    }
                    requestAnimationFrame(updateNumber);
                }
            });
        }, { threshold: 0.3 });

        observer.observe(sectionEl);
    }

    // Initialization
    window.addEventListener('scroll', updateScrollTarget, { passive: true });
    /* ==========================================================================
       9. Our Works Normal Carousel (Next/Prev buttons, dots, scroll-sync)
       ========================================================================== */
    function initWorksCarousel() {
        const track = document.getElementById('worksCarouselTrack');
        const prevBtn = document.getElementById('worksPrevBtn');
        const nextBtn = document.getElementById('worksNextBtn');
        const dots = document.querySelectorAll('#worksCarouselDots .carousel-dot');

        if (!track || !prevBtn || !nextBtn) return;

        function getSlideWidth() {
            const card = track.querySelector('.works-slide-card');
            return card ? card.offsetWidth + 24 : 340;
        }

        nextBtn.addEventListener('click', () => {
            track.scrollBy({ left: getSlideWidth(), behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            track.scrollBy({ left: -getSlideWidth(), behavior: 'smooth' });
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                track.scrollTo({ left: index * getSlideWidth(), behavior: 'smooth' });
            });
        });

        track.addEventListener('scroll', () => {
            const scrollLeft = track.scrollLeft;
            const slideWidth = getSlideWidth();
            const activeIndex = Math.round(scrollLeft / slideWidth);

            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === activeIndex);
            });
        });
    }

    /* ==========================================================================
       11. FAQ Accordion & Flowing Bézier Ribbon Background Animation (`bg annimation`)
       ========================================================================== */
    function initFaqAccordion() {
        const faqItems = document.querySelectorAll('.faq-item');
        if (!faqItems.length) return;

        faqItems.forEach(item => {
            const header = item.querySelector('.faq-header');
            if (!header) return;

            header.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Close all active items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                        const otherIcon = otherItem.querySelector('.faq-toggle-icon');
                        if (otherIcon) otherIcon.textContent = '+';
                    }
                });

                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    const icon = item.querySelector('.faq-toggle-icon');
                    if (icon) icon.textContent = '+';
                } else {
                    item.classList.add('active');
                    const icon = item.querySelector('.faq-toggle-icon');
                    if (icon) icon.textContent = '—';
                }
            });
        });
    }

    /* DOMContentLoaded duplicate block removed to prevent double-initialization bugs */

    function initHeadingFadeInUp() {
        const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6, .esper-headline, .main-heading-new, .editorial-main-title, .section-heading, .split-title, .cta-main-heading, .form-title, .service-heading, .portfolio-split-row');
        if (!headings.length) return;

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });

            headings.forEach(heading => {
                const rect = heading.getBoundingClientRect();
                const isAboveOrNearViewport = rect.top < window.innerHeight * 0.85;

                if (heading.closest('#esperBannerHero') || heading.closest('#hero') || heading.closest('.esper-banner-section') || heading.closest('.hero-banner') || isAboveOrNearViewport) {
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

    function initPortfolioPagination() {
        const pageBtns = document.querySelectorAll('.page-num-btn');
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');
        const wrapper = document.querySelector('.portfolio-split-wrapper');
        if (!pageBtns.length) return;

        function updatePagination(activeIndex) {
            pageBtns.forEach((btn, index) => {
                if (index === activeIndex) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            if (prevBtn) {
                if (activeIndex === 0) {
                    prevBtn.classList.add('disabled');
                    prevBtn.disabled = true;
                } else {
                    prevBtn.classList.remove('disabled');
                    prevBtn.disabled = false;
                }
            }

            if (nextBtn) {
                if (activeIndex === pageBtns.length - 1) {
                    nextBtn.classList.add('disabled');
                    nextBtn.disabled = true;
                } else {
                    nextBtn.classList.remove('disabled');
                    nextBtn.disabled = false;
                }
            }

            // Simulate loading by fading wrapper out and in
            if (wrapper) {
                wrapper.style.transition = 'opacity 0.3s ease';
                wrapper.style.opacity = '0';
                setTimeout(() => {
                    wrapper.style.opacity = '1';
                }, 300);

                // Scroll smoothly to top of wrapper
                const y = wrapper.getBoundingClientRect().top + window.scrollY - 100;
                window.scrollTo({ top: y, behavior: 'smooth' });
            }
        }

        pageBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                updatePagination(index);
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                let activeIndex = Array.from(pageBtns).findIndex(b => b.classList.contains('active'));
                if (activeIndex > 0) updatePagination(activeIndex - 1);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                let activeIndex = Array.from(pageBtns).findIndex(b => b.classList.contains('active'));
                if (activeIndex !== -1 && activeIndex < pageBtns.length - 1) updatePagination(activeIndex + 1);
            });
        }
    }

    initBgGrid();
    initSynapseCanvas();
    updateCalculator();
    initFannedCardsAnimation();
    initFannedWaveCanvas();
    initInfographicCounter();
    initWorksCarousel();
    initFaqAccordion();
    initContactBgCanvas();
    initHeadingFadeInUp();
    initPortfolioPagination();
    animationLoop();

})();
