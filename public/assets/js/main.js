(function($) {
    "use strict";
  
    const $documentOn = $(document);
    const $windowOn = $(window);
  
    $documentOn.ready( function() {
        
        

        /* =========================================================
        MOBILE MENU OPEN
        ========================================================= */
        $(".mobile-topbar .bars").on("click", function () {
            $(".mobile-menu-overlay, .mobile-menu-main").addClass("active");
            $("body").addClass("no-scroll");
            return false;
        });

        /* =========================================================
        MOBILE MENU CLOSE
        ========================================================= */
        $(".close-mobile-menu, .mobile-menu-overlay").on("click", function () {
            $(".mobile-menu-overlay, .mobile-menu-main").removeClass("active");
            $("body").removeClass("no-scroll");

            // reset all menus
            $('.sub-mobile-menu ul, .sub-child-menu ul').slideUp(200);

            // reset icons
            $(".sub-mobile-menu i, .sub-child-menu i")
                .removeClass("fa-chevron-up")
                .addClass("fa-chevron-down");
        });

        /* =========================================================
        MOBILE SUB MENU INITIAL STATE
        ========================================================= */
        $('.sub-mobile-menu > ul, .sub-child-menu > ul').hide();

        /* =========================================================
        LEVEL 1 MENU
        ========================================================= */
        $(document).on("click", ".sub-mobile-menu > a", function (e) {

            let $parent = $(this).parent();
            let $submenu = $parent.children("ul");

            if ($submenu.length === 0) return;

            e.preventDefault();
            e.stopPropagation();

            // close other level-1 menus
            $('.sub-mobile-menu')
                .not($parent)
                .children("ul")
                .slideUp(250);

            // also close level-2 menus
            $('.sub-child-menu > ul').slideUp(250);

            $submenu.slideToggle(250);

            // reset icons
            $(".sub-mobile-menu > a i, .sub-child-menu > a i")
                .removeClass("fa-chevron-up")
                .addClass("fa-chevron-down");

            $(this).find("i").toggleClass("fa-chevron-up fa-chevron-down");
        });

        /* =========================================================
        LEVEL 2 MENU
        ========================================================= */
        $(document).on("click", ".sub-child-menu > a", function (e) {

            let $parent = $(this).parent();
            let $submenu = $parent.children("ul");

            if ($submenu.length === 0) return;

            e.preventDefault();
            e.stopPropagation();

            // close sibling level-2 menus
            $parent.siblings(".sub-child-menu")
                .children("ul")
                .slideUp(250);

            $submenu.slideToggle(250);

            // reset sibling icons
            $parent.siblings(".sub-child-menu")
                .find("i")
                .removeClass("fa-chevron-up")
                .addClass("fa-chevron-down");

            $(this).find("i").toggleClass("fa-chevron-up fa-chevron-down");
        });

        /* =========================================================
        OFFCANVAS MENU
        ========================================================= */
        $(".offcanvas-btn").on('click', function () {
            $(".offcanvas-menu, .offcanvas-overlay").addClass("active");
            $("body").addClass("no-scroll"); // ✅ added
        });

        $(".offcanvas-overlay, .offcasvas-close").on('click', function () {
            $(".offcanvas-menu, .offcanvas-overlay").removeClass("active");
            $("body").removeClass("no-scroll"); // ✅ added
        });

        /* =========================================================
        STICKY HEADER (FINAL FIX)
        ========================================================= */
        $windowOn.on('scroll', function () {

            var scroll = $windowOn.scrollTop();

            // ✅ Mobile OR Offcanvas open → sticky completely disabled
            if (
                $(".mobile-menu-overlay").hasClass("active") ||
                $(".offcanvas-overlay").hasClass("active")
            ) {
                return;
            }

            if (scroll < 120) {
                $("#sticky-header").removeClass("sticky-menu");
                $("#header-fixed-height").removeClass("active-height");
            } else {
                $("#sticky-header").addClass("sticky-menu");
                $("#header-fixed-height").addClass("active-height");
            }
        });

    /*----------------------------------------------
        # Background Color
        ----------------------------------------------*/
        $("[data-bg-color]").each(function () {
            $(this).css("background-color", $(this).attr("data-bg-color"));
        });

        /*----------------------------------------------
        # Background Image
        ----------------------------------------------*/
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
        });

        /*----------------------------------------------
        # Width
        ----------------------------------------------*/
        $("[data-width]").each(function () {
            $(this).css("width", $(this).attr("data-width"));
        });

        /*----------------------------------------------
        # Text Color
        ----------------------------------------------*/
        $("[data-text-color]").each(function () {
            $(this).css("color", $(this).attr("data-text-color"));
        });
        
       /* ================================
       Video & Image Popup Js Start
    ================================ */

      $(".img-popup").magnificPopup({
        type: "image",
        gallery: {
          enabled: true,
        },
      });

      $(".video-popup").magnificPopup({
        type: "iframe",
        callbacks: {},
      });
  
      /* ================================
       Counterup Js Start
    ================================ */

      $(".count").counterUp({
        delay: 15,
        time: 4000,
      });
  
      /* ================================
       Wow Animation Js Start
    ================================ */

      new WOW().init();
  
      /* ================================
       Nice Select Js Start
    ================================ */

    if ($('.single-select').length) {
        $('.single-select').niceSelect();
    }


    if ($('.hero-slider-1').length > 0) {
        const heroSlider1 = new Swiper(".hero-slider-1", {
            loop: true,
            speed: 1000,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".array-next",
                prevEl: ".array-prev",
            },
        
        });
    }



    /* ================================
      Custom Accordion Js Start
    ================================ */

    if ($('.accordion-box').length) {
        $(".accordion-box").on('click', '.acc-btn', function () {
            var outerBox = $(this).closest('.accordion-box');
            var target = $(this).closest('.accordion');
            var accBtn = $(this);
            var accContent = accBtn.next('.acc-content');

            if (target.hasClass('active-block')) {
                // Already open, so close it
                accBtn.removeClass('active');
                target.removeClass('active-block');
                accContent.slideUp(300);
            } else {
                // Close all others
                outerBox.find('.accordion').removeClass('active-block');
                outerBox.find('.acc-btn').removeClass('active');
                outerBox.find('.acc-content').slideUp(300);

                // Open clicked one
                accBtn.addClass('active');
                target.addClass('active-block');
                accContent.slideDown(300);
            }
        });
    }

    if ($('.service-box-style').length) {
        $(".service-box-style").on('click', '.service-acc-btn', function () {
            var outerBox = $(this).closest('.service-box-style');
            var target = $(this).closest('.accordion');
            var accBtn = $(this);
            var accContent = accBtn.next('.service-acc-content');

            if (target.hasClass('active-block')) {
                // Already open, so close it
                accBtn.removeClass('active');
                target.removeClass('active-block');
                accContent.slideUp(300);
            } else {
                // Close all others
                outerBox.find('.accordion').removeClass('active-block');
                outerBox.find('.service-acc-btn').removeClass('active');
                outerBox.find('.service-acc-content').slideUp(300);

                // Open clicked one
                accBtn.addClass('active');
                target.addClass('active-block');
                accContent.slideDown(300);
            }
        });
    }

    if ($('.team-slider').length > 0) {
    const teamSlider = new Swiper(".team-slider", {
        effect: "cards",
        grabCursor: true,
        speed: 1300,
        loop: true,
      
        navigation: {
            nextEl: ".array-next",
            prevEl: ".array-prev",
        },

        pagination: {
            el: ".dot",
            clickable: true,
        },
        
    });
   }

   /* ================================
      Service Slider Js Start
    ================================ */

    function initServiceSlider() {

            const $slider = $('.service-slider-two');

            if (!$slider.length) return;

            const serviceSliderTwo = new Swiper(".service-slider-two", {

                loop: true,
                speed: 1200,
                effect: "fade",
                fadeEffect: {
                    crossFade: true
                },

                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                pagination: {
                    el: ".dot",
                    clickable: true,
                },

                on: {
                    init: function () {
                        animateActiveSlide(this);
                    },

                    slideChangeTransitionStart: function () {
                        $('.service-slider-two .service-content-two')
                            .removeClass("active-anim");
                    },

                    slideChangeTransitionEnd: function () {
                        animateActiveSlide(this);
                    }
                }
            });

            //==============================
            // Pause on Hover (UX improve)
            //==============================
            $slider.on('mouseenter', function () {
                serviceSliderTwo.autoplay.stop();
            });

            $slider.on('mouseleave', function () {
                serviceSliderTwo.autoplay.start();
            });

            //==============================
            // Fix initial animation delay
            //==============================
            setTimeout(function () {
                animateActiveSlide(serviceSliderTwo);
            }, 100);

        }

        //==============================
        // Animation Function (LOOP SAFE)
        //==============================
        function animateActiveSlide(swiper) {

            const $activeSlide = $(swiper.el).find('.swiper-slide-active');
            const $content = $activeSlide.find(".service-content-two");

            if (!$content.length) return;

            $content.addClass("active-anim");
        }

        // INIT
        initServiceSlider();
    
     /* ================================
      Project Slider Js Start
    ================================ */

   if ($('.project-slider').length > 0) {
    const projectSlider = new Swiper(".project-slider", {
        spaceBetween: 30,
        speed: 1300,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".array-next",
            prevEl: ".array-prev",
        },
        pagination: {
            el: ".dot2",
            clickable: true,
        },
        breakpoints: {
            1399: {
                slidesPerView: 4,
            },
            1199: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 2.8,
            },
            767: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 1.4,
            },
            400: {
                slidesPerView: 1.3,
            },
             0: {
                slidesPerView: 1.2,
            },
        },
    });
   }

    /* ================================
      Testimonial Slider Js Start
    ================================ */
     if ($('.testimonial-slider-three').length > 0) {
    const testimonialSliderThree = new Swiper(".testimonial-slider-three", {
        spaceBetween: 30,
        speed: 1300,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".array-next",
            prevEl: ".array-prev",
        },
        breakpoints: {
            1399: {
                slidesPerView: 4,
            },
             1199: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 2.4,
            },
            767: {
                slidesPerView: 1.3,
            },
            575: {
                slidesPerView: 1.3,
            },
            0: {
                slidesPerView: 1.2,
            },
        },
    });
    }

     /* ================================
      News Slider Js Start
    ================================ */
     if ($('.news-slider').length > 0) {
    const newsSlider = new Swiper(".news-slider", {
        spaceBetween: 30,
        speed: 1300,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".array-next",
            prevEl: ".array-prev",
        },
         pagination: {
            el: ".dot3",
            clickable: true,
        },
        breakpoints: {
            1399: {
                slidesPerView: 4,
            },
             1199: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 2.4,
            },
            767: {
                slidesPerView: 1.3,
            },
            575: {
                slidesPerView: 1.3,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });
    }

     /* ================================
      Brand Slider Js Start
    ================================ */
     if ($('.brand-slider-one').length > 0) {
        const brandSliderOne = new Swiper(".brand-slider-one", {
            spaceBetween: 0,
            speed: 1300,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1399: {
                    slidesPerView: 5,
                },
                1199: {
                    slidesPerView: 4.2,
                },
                991: {
                    slidesPerView: 3.5,
                },
                767: {
                    slidesPerView: 2.5,
                },
                575: {
                    slidesPerView: 2,
                },
                400: {
                    slidesPerView: 1,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });
    }

     /* ================================
        Quantity Increment/Decrement Js Start
    ================================ */
    const quantityButtons = document.querySelectorAll(".quantityIncrement, .quantityDecrement");
    if (quantityButtons.length) {
        quantityButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const input = button.parentElement.querySelector("input");
                let value = parseInt(input.value, 10) || 0;

                if (button.classList.contains("quantityIncrement")) {
                    input.value = value + 1;
                } else if (button.classList.contains("quantityDecrement") && value > 1) {
                    input.value = value - 1;
                }
            });
        });
    }
    
    
     /* ================================
       Payment Method Update Js Start
    ================================ */

    function updatePaymentMethod() {
        let paymentMethod = $("input[name='pay-method']:checked").val();
        $(".payment").html(paymentMethod);
    }

    // Initial load
    updatePaymentMethod();

    // On click of radio option
    $(".checkout-radio-single input[name='pay-method']").on("change", function () {
        updatePaymentMethod();
    });

     /* ================================
       Additional Quantity Controls Js Start
    ================================ */

    const inputs = document.querySelectorAll('#qty, #qty2, #qty3');
    const btnminus = document.querySelectorAll('.qtyminus');
    const btnplus = document.querySelectorAll('.qtyplus');

    if (inputs.length > 0 && btnminus.length > 0 && btnplus.length > 0) {

        inputs.forEach(function(input, index) {
            const min = Number(input.getAttribute('min'));
            const max = Number(input.getAttribute('max'));
            const step = Number(input.getAttribute('step'));

            function qtyminus(e) {
                const current = Number(input.value);
                const newval = (current - step);
                if (newval < min) {
                    newval = min;
                } else if (newval > max) {
                    newval = max;
                }
                input.value = Number(newval);
                e.preventDefault();
            }

            function qtyplus(e) {
                const current = Number(input.value);
                const newval = (current + step);
                if (newval > max) newval = max;
                input.value = Number(newval);
                e.preventDefault();
            }

            btnminus[index].addEventListener('click', qtyminus);
            btnplus[index].addEventListener('click', qtyplus);
        });
    }


    /* ================================
        Back To Top Button Js Start
    ================================ */
    $windowOn.on('scroll', function() {
        var windowScrollTop = $(this).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();

        if (windowScrollTop + windowHeight >= documentHeight - 10) {
            $("#back-top").addClass("show");
        } else {
            $("#back-top").removeClass("show");
        }
    });

    $documentOn.on('click', '#back-top', function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });


     /* ================= DATEPICKER ================= */
        $("[id^='datepicker']").datepicker({
            autoclose: true,
            todayHighlight: true
        });

	
    /* ================================
       Smooth Scroller And Title Animation Js Start
    ================================ */
    if ($('#smooth-wrapper').length && $('#smooth-content').length) {
        gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText);

        gsap.config({
            nullTargetWarn: false,
        });

        let smoother = ScrollSmoother.create({
            wrapper: "#smooth-wrapper",
            content: "#smooth-content",
            smooth: 2,
            effects: true,
            smoothTouch: 0.1,
            normalizeScroll: false,
            ignoreMobileResize: true,
        });
    }

     /* ================================
      Bg Image Effect Js Start
    ================================ */

   if ($('.full-img-wrap3').length > 0) {
        // Check window width
        if (window.innerWidth > 1399) {
            ScrollTrigger.create({
                trigger: ".full-img-wrap3",
                start: "top 10%",
                end: "bottom 0%",
                pin: ".full-img3",
                pinSpacing: false,
            });
        }
    }

     /*=============================================
        =            Text Split (GSAP)               =
        =============================================*/
        function initTextSplit() {

            const $elements = $('.tz-split-1');

            if (!$elements.length) return;

            // Check GSAP + SplitText
            if (typeof gsap === "undefined" || typeof SplitText === "undefined") {
                console.warn("GSAP or SplitText not loaded");
                return;
            }

            gsap.registerPlugin(SplitText);

            $elements.each(function () {
                new SplitText(this, {
                    type: "words",
                    wordsClass: "split-line"
                });
            });
        }

        // Init
        initTextSplit();


     /* ================================
       Service Panel Js Start
    ================================ */

	let sv = gsap.matchMedia();
	sv.add("(min-width: 1199px)", () => {
		let tl = gsap.timeline();
		let projectpanels = document.querySelectorAll('.tp-service-panel');
		let baseOffset = 150;
		let offsetIncrement = 120;

		projectpanels.forEach((section, index) => {
			let topOffset = baseOffset + (index * offsetIncrement);
			tl.to(section, {
				scrollTrigger: {
					trigger: section,
					pin: section,
					scrub: 1,
					start: `top ${topOffset}px`,
					end: "bottom 120%",
					endTrigger: '.tp-service-pin',
					pinSpacing: false,
					markers: false,
				},
			});
		});
	});



    /* ================================
    Text Anim Js Start
    ================================ */

    if (
    typeof SplitText !== "undefined" &&
        document.querySelectorAll(".split-title").length > 0
        ) {
    document.querySelectorAll(".split-title").forEach((title) => {

        // split by words + chars (IMPORTANT)
        const split = new SplitText(title, {
        type: "words,chars"
        });

        // add class to chars
        split.chars.forEach((char) => {
        char.classList.add("char");
        });

        // GSAP animation
        gsap.to(split.chars, {
        scrollTrigger: {
            trigger: title,
            start: "top 90%",
            toggleActions: "play none none none"
        },
        duration: 0.8,
        clipPath: "inset(0% 0% -15% 0%)",
        x: 0,
        opacity: 1,
        ease: "power4.out",
        stagger: 0.03
        });

    });
    }

     if (typeof gsap !== "undefined") {
          gsap.registerPlugin(ScrollTrigger, SplitText);

          let mm = gsap.matchMedia();

          mm.add("(min-width: 1200px)", () => {

              let splits = [];

              // ===== tz-sub-tilte =====
              $('.tz-sub-tilte').each(function (index, el) {

              let split = new SplitText(el, {
                  type: "lines,words,chars",
                  linesClass: "split-line"
              });

              splits.push(split);

              gsap.set(split.chars, {
                  opacity: 0,
                  x: 7
              });

              gsap.to(split.chars, {
                  scrollTrigger: {
                  trigger: el,
                  start: "top 90%",
                  end: "top 60%",
                  scrub: 1
                  },
                  x: 0,
                  opacity: 1,
                  duration: 0.7,
                  stagger: 0.2
              });
              });

              // ===== tz-itm-title =====
              $('.tz-itm-title').each(function (index, el) {

              let split = new SplitText(el, {
                  type: "lines,words,chars",
                  linesClass: "split-line"
              });

              splits.push(split);

              gsap.set(split.chars, {
                  opacity: 0.3,
                  x: -7
              });

              gsap.to(split.chars, {
                  scrollTrigger: {
                  trigger: el,
                  start: "top 92%",
                  end: "top 60%",
                  scrub: 1
                  },
                  x: 0,
                  opacity: 1,
                  duration: 0.7,
                  stagger: 0.2
              });
              });

              // ðŸ”¥ MOST IMPORTANT PART
              ScrollTrigger.refresh();

              // ðŸ”¥ cleanup on breakpoint change
              return () => {
              splits.forEach(split => split.revert());
              ScrollTrigger.getAll().forEach(st => st.kill());
              };

          });
    }

    if (document.querySelectorAll(".rr_title_anim").length > 0) {
    if ($('.rr_title_anim').length > 0) {
      let splitTitleLines = gsap.utils.toArray(".rr_title_anim");
      splitTitleLines.forEach(splitTextLine => {
        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: splitTextLine,
            start: 'top 90%',
            end: 'bottom 60%',
            scrub: false,
            markers: false,
            toggleActions: 'play none none reverse'
          }
        });

        const itemSplitted = new SplitText(splitTextLine, { type: "words, lines" });
        gsap.set(splitTextLine, { perspective: 400 });
        itemSplitted.split({ type: "lines" })
        tl.from(itemSplitted.lines, {
          duration: 1,
          delay: 0.3,
          opacity: 0,
          rotationX: -80,
          force3D: true,
          transformOrigin: "top center -50",
          stagger: 0.2
        });
      });
    }
    }


     /* ================================
    Animate Circle Js Start
    ================================ */

    if ($('.bz-gsap-animate-circle').length) {
    gsap.utils.toArray('.bz-gsap-animate-circle').forEach((el) => {

        // Accessibility: reduced motion
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        gsap.set(el, { rotate: 0 });
        return;
        }

        gsap.timeline({
        scrollTrigger: {
            trigger: el,
            scrub: 1,
            start: "top 80%",
            end: "top 20%",
            markers: false
        }
        })
        .set(el, { transformOrigin: "50% 50%" })
        .fromTo(
        el,
        { rotate: 0 },
        { rotate: 180, ease: "none" }
        );
    });
    }
    
   if ($(".wa_split_up").length) {

        var wa_split_up = $(".wa_split_up");

        gsap.registerPlugin(SplitText, ScrollTrigger);

        wa_split_up.each(function (index, el) {

            el.split = new SplitText(el, {
                type: "lines,words,chars",
                linesClass: "split-line",
            });

            gsap.set(el, { perspective: 400 });

            let delayValue = $(el).attr("data-split-delay") || "0s";
            delayValue = parseFloat(delayValue) || 0;

            gsap.set(el.split.chars, {
                y: 50,
                opacity: 0,
            });

            el.anim = gsap.to(el.split.chars, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 86%",
                    toggleActions: "play none none reverse",
                },
                y: 0,
                opacity: 1,
                duration: 0.3,
                ease: "power1.out",
                stagger: 0.15,
                delay: delayValue,
            });

        });

    }

    /* ================================
      Title Animation
    ================================ */

   if ($(".wa_title_spilt_1").length) {

    gsap.registerPlugin(SplitText, ScrollTrigger);

    document.querySelectorAll(".wa_title_spilt_1").forEach((atEl) => {

        const atSplit = new SplitText(atEl, {
            type: "words,chars",
            wordsClass: "word",
            charsClass: "char",
        });

        let atDuration = parseFloat(atEl.getAttribute("data-speed")) || 0.6; // আগে 1 ছিল
        let atDelay = parseFloat(atEl.getAttribute("data-delay")) || 0;

        if (window.innerWidth <= 768) {
            atDuration = atDuration * 0.5; // আগে 0.3 ছিল → একটু balanced
        }

        gsap.set(atSplit.words, {
            willChange: "transform",
            perspective: 1000,
            transformStyle: "preserve-3d",
        });

        gsap.set(atSplit.chars, {
            willChange: "transform",
            opacity: 0,
            rotateX: -80,
            transformOrigin: "center center -10px",
        });

        gsap.set(atEl, {
            perspective: 1000,
            transformStyle: "preserve-3d",
        });

        gsap.to(atSplit.chars, {
            scrollTrigger: {
                trigger: atEl,
                start: "top 85%", 
            },
            opacity: 1,
            rotateX: 0,
            duration: atDuration,
            delay: atDelay,
            ease: "power2.out", 
            stagger: {
                each: 0.025, 
                from: "center",
            },
        });

    });

    }

    /*=============================================
    Testimonial Effect
    =============================================*/
    gsap.registerPlugin(ScrollTrigger);

    let mmw = gsap.matchMedia();

    mmw.add("(min-width: 1400px)", () => {

      const section = document.querySelector(".client-testimonial");
      if (!section) return;

      const title = section.querySelector(".section-3-title-wrapper");
      const items = gsap.utils.toArray(".client-testimonial__item");

      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: section,
          start: "top top",
          end: "+=400%",
          pin: true,
          scrub: 1,
          anticipatePin: 1,
          invalidateOnRefresh: true
        }
      });

      // Title animation
      tl.to(title, {
        opacity: 0,
        filter: "blur(10px)",
        duration: 1
      });

      tl.addLabel("itemsStart");

      // Items animation
      tl.fromTo(
        items,
        {
          x: "450%",
          opacity: 0
        },
        {
          x: "0%",
          opacity: 1,
          duration: 1,
          stagger: 0.6,
          ease: "power3.out"
        },
        "itemsStart+=0.3"
      );

      // End hold space
      tl.to({}, { duration: 1 });
    })

       /* ================================
     Design Choose Item Animation 
    ================================ */

   if ($(".design-choose-item-wrap").length) {

    gsap.registerPlugin(ScrollTrigger);

    const pw = gsap.matchMedia();

    pw.add("(min-width: 1200px)", () => {

        document.querySelectorAll(".design-choose-item-wrap").forEach((wrap) => {

            const items1 = wrap.querySelectorAll(".design-choose-item-1");
            const items2 = wrap.querySelectorAll(".design-choose-item-2");

            items1.forEach((item1, i) => {

                const item2 = items2[i];

                if (item1 && item2) {

                    gsap.set(item1, { x: -400, rotate: -40 });
                    gsap.set(item2, { x: 400, rotate: 40 });

                    let tl = gsap.timeline({
                        scrollTrigger: {
                            trigger: item1,
                            start: "top 90%",
                            end: "top 20%",
                            scrub: 1,
                        }
                    });

                    tl.to(item1, { x: 0, rotate: 0 })
                      .to(item2, { x: 0, rotate: 0 }, 0);

                }

            });

        });

    });

    }

  
    }); // End Document Ready Function

  
  })(jQuery); // End jQuery

