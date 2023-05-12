// global object
const OTA = {};

// nice select
OTA.niceSelect = () => {
    if (!$("select").length) return;

    $("select").niceSelect();
};

// mobile menu
OTA.mobileMenu = () => {
    if (!$("#nav-icon4").length) return;

    $("#nav-icon4").click(function () {
        $(this).toggleClass("open");
        $(".header-display").slideToggle();
    });
};

// Owl Carousel
OTA.owlCarousel = (selector = "", options = {}) => {
    if (!$(selector).length) return;

    $(selector).owlCarousel(options);
};

// sliders
OTA.sliders = () => {
    OTA.owlCarousel(".home_slider_title", {
        loop: true,
        rewind: false,
        nav: false,
        margin: 42,
        autoplay: true,
        // autoplayTimeout: 5000,
        smartSpeed: 6000,
        slideTransition: "linear",
        dote: false,
        responsive: {
            0: {
                items: 2,
                center: false,
            },
            575: {
                items: 3,
            },
            767: {
                items: 4,
            },
            991: {
                items: 5,
            },
            1199: {
                items: 6,
            },
        },
    });

    OTA.owlCarousel(".testimonial_carousel", {
        loop: true,
        rewind: false,
        smartSpeed: 1000,
        margin: 42,
        autoplay: true,
        dote: true,
        responsive: {
            0: {
                items: 1,
            },
            767: {
                items: 2,
            },
        },
    });
};

// QnA sidebar
OTA.QnASidebar = () => {
    if (!$(".faq_sidebar ul li").length) return;

    $(".faq_sidebar ul li").click(function () {
        $(".faq_sidebar ul li").removeClass("active_list");
        $(this).addClass("active_list");
    });
};

// bootstrap form validation
OTA.bootstrapFormValidation = () => {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
};

// form validation
OTA.formValidation = () => {
    const validated = function () {
        if ($(this).val()) {
            $(this).removeClass("is-invalid");
        } else {
            $(this).addClass("is-invalid");
        }

        if ($(this).hasClass("select-option") && $(this).val()) {
            $(".billing_Info_area .select-option").removeClass("is-invalid");
        }
    };

    $(".billing_Info_area select").change(validated);
    $(".billing_Info_area input").change(validated);
};

// language switcher
OTA.switchLanguage = () => {
    // Create a new onchange event and trigger it
    const triggerEvent = (element, eventName) => {
        const event = new Event(eventName);
        element.dispatchEvent(event);
    };

    $(".language_dropdown .dropdown-item").click(function (e) {
        e.preventDefault();

        const flagSrc = $(this).find("img").attr("src");
        const language = $(this).data("lang");

        if (language === "en") {
            $("body").removeClass("lang_tr");
        } else {
            $("body").addClass("lang_tr");
        }

        // set dropdown flag
        $(this)
            .closest(".language_dropdown")
            .find(".dropdown-toggle img")
            .attr("src", flagSrc);

        // set lang to local storage
        localStorage.setItem("site_lang", language);

        // change translation language
        $(".goog-te-combo").val(language);

        // triggers onchange event on <select>
        triggerEvent(document.querySelector(".goog-te-combo"), "change");
    });

    if (localStorage.getItem("site_lang")) {
        const language = localStorage.getItem("site_lang");
        let flagSrc;

        $(".language_dropdown .dropdown-item").each(function () {
            if ($(this).data("lang") === language) {
                flagSrc = $(this).find("img").attr("src");
            }
        });

        if (language === "en") {
            $("body").removeClass("lang_tr");
        } else {
            $("body").addClass("lang_tr");
        }

        // set dropdown flag
        $(".language_dropdown .dropdown-toggle img").attr("src", flagSrc);

        // change translation language
        $(".goog-te-combo").val(language);

        // triggers onchange event on <select>
        triggerEvent(document.querySelector(".goog-te-combo"), "change");
    }
};

$(document).ready(function () {
    OTA.niceSelect();
    OTA.mobileMenu();
    OTA.sliders();
    OTA.QnASidebar();
    OTA.bootstrapFormValidation();
    OTA.formValidation();
    OTA.switchLanguage();
});
