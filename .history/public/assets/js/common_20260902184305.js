const animatedItems=document.querySelectorAll(".animateThis"),header=document.querySelector(".pageHeader"),stickyAnchor=document.querySelector("#sticky-anchor"),menuButton=document.querySelector(".menuBtn"),navigation=document.querySelector(".navigHolder"),navLinks=document.querySelectorAll(".menuList a"),revealObserver=new IntersectionObserver(e=>{e.forEach(e=>{e.target.classList.toggle("in-view",e.isIntersecting)})},{threshold:.16,rootMargin:"0px 0px -8% 0px"});function updateHeader(){if(!header||!stickyAnchor)return;const e=stickyAnchor.getBoundingClientRect().top+window.scrollY;header.classList.toggle("stick",window.scrollY>e)}function closeMenu(){navigation?.classList.remove("open"),header?.classList.remove("open"),menuButton?.classList.remove("active"),menuButton?.setAttribute("aria-expanded","false")}function setActiveLink(){const e=[...navLinks].map(e=>document.querySelector(e.getAttribute("href"))).filter(Boolean),t=e.reduce((e,t)=>t.getBoundingClientRect().top<=140?t:e,e[0]);navLinks.forEach(e=>{const n=t&&e.getAttribute("href")===`#${t.id}`;e.parentElement.classList.toggle("active",n)})}animatedItems.forEach(e=>revealObserver.observe(e)),menuButton?.addEventListener("click",()=>{const e=navigation?.classList.toggle("open");menuButton.classList.toggle("active",e),header?.classList.toggle("open",e),menuButton.setAttribute("aria-expanded",e?"true":"false")}),navLinks.forEach(e=>{e.addEventListener("click",closeMenu)}),window.addEventListener("scroll",()=>{updateHeader(),setActiveLink()}),window.addEventListener("resize",updateHeader),updateHeader(),setActiveLink();const backToTop=document.getElementById("backToTop");window.addEventListener("scroll",()=>{window.scrollY>300?backToTop.classList.add("show"):backToTop.classList.remove("show")}),backToTop.addEventListener("click",()=>{window.scrollTo({top:0,behavior:"smooth"})}),document.addEventListener("DOMContentLoaded",function(){const e=document.querySelectorAll(".countNo"),t=new IntersectionObserver((e,t)=>{e.forEach(e=>{if(!e.isIntersecting)return;const n=e.target,o=parseInt(n.dataset.count),s=o/125;let r=0;const c=()=>{if(r+=s,r>=o)return n.textContent=o,void t.unobserve(n);n.textContent=Math.floor(r),requestAnimationFrame(c)};c()})},{threshold:.1,rootMargin:"0px 0px -100px 0px"});e.forEach(e=>t.observe(e))}),document.addEventListener("DOMContentLoaded",()=>{const e=document.querySelectorAll(".timelineItem"),t=document.querySelector(".timelineProgress");if(!e.length||!t)return;function n(n){e.forEach(e=>{e.classList.remove("active")}),e[n].classList.add("active");const o=e[n].querySelector(".iconWrap"),s=e[n].offsetTop+o.offsetTop+110;t.style.height=s+"px"}function o(){let t=0;e.forEach((e,n)=>{e.getBoundingClientRect().top<=.5*window.innerHeight&&(t=n)}),n(t)}o(),window.addEventListener("scroll",o),e.forEach((e,t)=>{e.addEventListener("click",()=>{n(t)}),e.addEventListener("mouseenter",()=>{n(t)})})}),document.querySelector(".readMoreBtn")?.addEventListener("click",function(){const e=document.querySelector(".founderText");e.classList.toggle("expanded"),this.textContent=e.classList.contains("expanded")?"Read Less":"Read More"});const faqItems=document.querySelectorAll(".faqItem");faqItems.forEach(e=>{e.querySelector(".faqQuestion").addEventListener("click",()=>{faqItems.forEach(t=>{t!==e&&t.classList.remove("active")}),e.classList.toggle("active")})});
document.addEventListener("DOMContentLoaded", function () {

    /* ========================================
       POPUP ELEMENTS
    ======================================== */

    const popup = document.querySelector(".popup-overlay");
    const popupBox = document.querySelector(".popup-box");
    const closeBtn = document.querySelector(".close-popup");


    /* ========================================
       FORM
    ======================================== */

    const form = document.getElementById("registrationForm");

    if (!form) return;

    const steps = form.querySelectorAll(".form-step");
    const nextButtons = form.querySelectorAll(".next-btn");
    const prevButtons = form.querySelectorAll(".prev-btn");

    let currentStep = 0;


    /* ========================================
       PROGRESS ELEMENTS
    ======================================== */

    const currentStepNumber =
        document.getElementById("currentStepNumber");

    const progressPercent =
        document.getElementById("progressPercent");

    const progressFill =
        document.getElementById("progressFill");

    const progressSteps =
        document.querySelectorAll(".progress-step");


    /* ========================================
       UPDATE PROGRESS
    ======================================== */

    function updateProgress(index) {

        const totalSteps = steps.length;

        if (!totalSteps) return;

        const stepNumber = index + 1;

        const percentage = Math.round(
            (stepNumber / totalSteps) * 100
        );


        /* Step number */

        if (currentStepNumber) {
            currentStepNumber.textContent = stepNumber;
        }


        /* Percentage */

        if (progressPercent) {
            progressPercent.textContent =
                percentage + "%";
        }


        /* Progress bar */

        if (progressFill) {
            progressFill.style.width =
                percentage + "%";
        }


        /* Step labels */

        progressSteps.forEach(function (step, i) {

            step.classList.remove(
                "active",
                "completed"
            );

            if (i === index) {

                step.classList.add("active");

            } else if (i < index) {

                step.classList.add("completed");

            }

        });

    }


    /* ========================================
       SHOW STEP
       SMOOTH - NO JHATKA
    ======================================== */

    function showStep(index) {

        if (!steps.length) return;


        /* Safety */

        if (index < 0) {
            index = 0;
        }

        if (index >= steps.length) {
            index = steps.length - 1;
        }


        /* Update current step */

        currentStep = index;


        /* ====================================
           STEP CHANGE
        ==================================== */

        steps.forEach(function (step, i) {

            step.classList.toggle(
                "active",
                i === index
            );

        });


        /* ====================================
           UPDATE PROGRESS
        ==================================== */

        updateProgress(index);


        /* ====================================
           SCROLL POPUP TO TOP
        ==================================== */

        if (popupBox) {

            popupBox.scrollTo({
                top: 0,
                behavior: "smooth"
            });

        }

    }


    /* ========================================
       OPEN POPUP
       ALL .btn-red
    ======================================== */

    document.querySelectorAll(".btn-red").forEach(function (button) {

        button.addEventListener("click", function (e) {

            e.preventDefault();

            if (!popup) return;


            popup.classList.add("show");

            document.body.style.overflow = "hidden";


            /* Start from Step 1 */

            showStep(0);

        });

    });


    /* ========================================
       NEXT BUTTON
       
       NO VALIDATION
       User can click Next directly
    ======================================== */

    nextButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            if (!validateStep(currentStep)) {
                return;
            }

            const interestChecks = steps[currentStep].querySelectorAll('input[name="areas_of_interest[]"]');

            if (interestChecks.length) {
                const selected = [...interestChecks].some(function (item) {
                    return item.checked;
                });

                if (!selected) {
                    alert("Please select at least one area of interest.");
                    return;
                }
            }

            if (currentStep < steps.length - 1) {
                showStep(currentStep + 1);
            }

        });

    });


    /* ========================================
       PREVIOUS BUTTON
    ======================================== */

    prevButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            if (currentStep > 0) {

                showStep(currentStep - 1);

            }

        });

    });


    /* ========================================
       VALIDATE STEP
       
       Used ONLY on final submit
    ======================================== */

    function validateStep(index) {

        const step = steps[index];

        if (!step) return true;


        const fields = step.querySelectorAll(
            "input:not([type='hidden']), select, textarea"
        );


        for (const field of fields) {

            if (!field.checkValidity()) {

                field.reportValidity();

                field.focus();

                return false;

            }

        }


        return true;

    }


    /* ========================================
       FORM SUBMIT
       
       Pay Now / Submit
    ======================================== */

    form.addEventListener("submit", function (e) {

        e.preventDefault();

        let firstInvalidStep = -1;

        for (let i = 0; i < steps.length; i++) {

            if (!validateStep(i)) {

                firstInvalidStep = i;

                break;

            }

        }

        if (firstInvalidStep !== -1) {
            showStep(firstInvalidStep);
        }

    });


    /* ========================================
       PAN UPPERCASE
    ======================================== */

    const panInput =
        form.querySelector('input[name="pan"]');


    if (panInput) {

        panInput.addEventListener("input", function () {

            this.value = this.value
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, "")
                .slice(0, 10);

        });

    }


    /* ========================================
       GSTIN UPPERCASE
    ======================================== */

    const gstInput =
        form.querySelector('input[name="gstin"]');


    if (gstInput) {

        gstInput.addEventListener("input", function () {

            this.value = this.value
                .toUpperCase()
                .replace(/[^A-Z0-9]/g, "")
                .slice(0, 15);

        });

    }


    /* ========================================
       AADHAAR LAST 4 DIGITS
    ======================================== */

    const aadhaarInput =
        form.querySelector(
            'input[name="aadhaar_last4"]'
        );


    if (aadhaarInput) {

        aadhaarInput.addEventListener("input", function () {

            this.value = this.value
                .replace(/\D/g, "")
                .slice(0, 4);

        });

    }


    /* ========================================
       PHONE NUMBERS
    ======================================== */

    form.querySelectorAll(
        'input[type="tel"]'
    ).forEach(function (input) {

        input.addEventListener("input", function () {

            this.value = this.value
                .replace(/\D/g, "")
                .slice(0, 10);

        });

    });


    /* ========================================
       UTM TRACKING
    ======================================== */

    const urlParams =
        new URLSearchParams(
            window.location.search
        );


    const utmFields = [

        "utm_source",
        "utm_medium",
        "utm_campaign",
        "utm_content",
        "utm_term",

        "campaign_id",
        "adset_id",
        "ad_id",
        "placement"

    ];


    utmFields.forEach(function (field) {

        const input =
            document.getElementById(field);

        if (!input) return;


        const value =
            urlParams.get(field);


        if (value) {

            input.value = value;

        }

    });


    /* ========================================
       FILE SIZE VALIDATION
       MAX 5MB
    ======================================== */

    form.querySelectorAll(
        'input[type="file"]'
    ).forEach(function (input) {

        input.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) return;


            const maxSize =
                5 * 1024 * 1024;


            if (file.size > maxSize) {

                alert(
                    "File size must be less than 5MB."
                );

                this.value = "";

            }

        });

    });


    /* ========================================
       CLOSE POPUP
    ======================================== */

    function closePopup() {

        if (!popup) return;


        popup.classList.remove("show");

        document.body.style.overflow = "";


        /*
         * Reset step immediately.
         * No timeout = no jhatka.
         */

        showStep(0);

    }


    /* ========================================
       CLOSE BUTTON
    ======================================== */

    if (closeBtn) {

        closeBtn.addEventListener(
            "click",
            function () {

                closePopup();

            }
        );

    }


    // /* ========================================
    //    OUTSIDE CLICK
    // ======================================== */

    // if (popup) {

    //     popup.addEventListener(
    //         "click",
    //         function (e) {

    //             if (e.target === popup) {

    //                 closePopup();

    //             }

    //         }
    //     );

    // }


    /* ========================================
       ESC KEY
    ======================================== */

    document.addEventListener(
        "keydown",
        function (e) {

            if (
                e.key === "Escape" &&
                popup &&
                popup.classList.contains("show")
            ) {

                closePopup();

            }

        }
    );


    /* ========================================
       INITIAL STATE
    ======================================== */

    if (popup) {

        popup.classList.remove("show");

    }


    /* ========================================
       INITIAL STEP + PROGRESS
    ======================================== */

    showStep(0);
/* ========================================
   PROGRESS STEP CLICK
   Click karke kisi bhi previous step par ja sakte hain
======================================== */

progressSteps.forEach(function (step, index) {

    step.style.cursor = "pointer";

    step.addEventListener("click", function () {

        /* Sirf current ya previous step par click allow */
        if (index <= currentStep) {

            showStep(index);

        }

    });

});
/* ========================================
   DOB - 18+ VALIDATION
======================================== */

const dobInput = document.getElementById("dateOfBirth");

if (dobInput) {

    const today = new Date();

    const maxDob = new Date(
        today.getFullYear() - 18,
        today.getMonth(),
        today.getDate()
    );

    const year = maxDob.getFullYear();
    const month = String(maxDob.getMonth() + 1).padStart(2, "0");
    const day = String(maxDob.getDate()).padStart(2, "0");

    dobInput.max = `${year}-${month}-${day}`;


    dobInput.addEventListener("change", function () {

        if (!this.value) return;

        const selectedDate = new Date(this.value);

        if (selectedDate > maxDob) {

            alert("You must be at least 18 years old to apply.");

            this.value = "";

            this.focus();

        }

    });

}
});
