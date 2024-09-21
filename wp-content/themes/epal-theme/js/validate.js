$(document).ready(function () {

    /**
      Hàm xử lý đổi ngôn ngữ
    */
    const imgVie = "/wp-content/themes/epal-theme/images/vn.svg";
    const imgEng = "/wp-content/themes/epal-theme/images/en.svg";

    function loadLanguage() {
        setTimeout(function () {
            const elementLang = $(".translation-links a");
            elementLang.each(function () {
                const dataId = $(this).data('id');
                const dataName = $(this).data('name');
                let img = '';
                if (dataId == 'vi') {
                    $(this).html(`<img src = "${imgVie}"><span class="notranslate">VIE</span>`);
                    img = imgVie;
                }
                else {
                    $(this).html(`<img src = "${imgEng}"><span class="notranslate">ENG</span>`);
                    img = imgEng;
                }
                $(this).on('click', function () {
                    $(".language-default").html(`<span class="notranslate">${dataName}</span ><img src = "${img}">`);
                });
            });

        }, 2000);
    };

    function chooseLanguage() {
        const elementLang = $(".translation-links a");
        elementLang.each(function () {
            const dataId = $(this).data('id');
            const dataName = $(this).data('name');
            let img = '';
            if (dataId == 'vi') {
                img = imgVie;
            }
            else {
                img = imgEng;
            }
            $(this).on('click', function () {
                $(".language-default").html(`<span class="notranslate">${dataName}</span><img src = "${img}">`);
                loadLanguage();
            });
        });
    };

    loadLanguage();
    chooseLanguage();

    $(".language-default").append(`<span class="notranslate">ENG</span><img src = "${imgEng}">`);

    $("body").on("click", '.language-default', function () {
        $(".translation-links").toggleClass("active-dropdown-language");
        $(".bg-language").toggleClass("active-bg-language");
    });

    $(".translation-links a").click(function () {
        $(".translation-links").removeClass("active-dropdown-language");
        $(".bg-language").removeClass("active-bg-language");

    });


    $(window).click(function (e) {
        if ($(e.target).hasClass('active-bg-language')) {
            $(".translation-links").removeClass("active-dropdown-language");
        }
        $(e.target).removeClass("active-bg-language");
    });

    /** 
    * Slider feedback
    */
    $(".feedback-list").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            576: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1000: {
                items: 1,
            },
            1200: {
                items: 1,
            }
        }
    });

    /**
        Validate Email
    */
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    function validateEmail(input, button = null) {
        button.prop("disabled", true);
        input.on("change", function () {
            var emailCorrect = $(this).val();
            if (!isEmail(emailCorrect)) {
                $(this).parent().addClass("hasErrorEmail");
                $(this).on("keypress", function () {
                    $(this).parent().removeClass("hasErrorEmail");
                });
                button.prop("disabled", true);
            }
            else {

                button.prop("disabled", false);
            }
        });
    }

    validateEmail($("#acf-field_6589952ef294e"), $(".footer-body .acf-button"));
    validateEmail($("#acf-field_658beb2b4d6f2"), $(".form-right .acf-button"));
    validateEmail($("#acf-field_658d36d39fdd1"), $(".single-service .acf-button"));
    validateEmail($("#acf-field_6594b4b56fc3e"), $(".form-info-contact .acf-button"));

    /**
        Validate Phone
    */
    function checkPhoneNumber(input) {
        var flag = false;
        var phone = input.val().trim();
        phone = phone.replace("(+84)", "0");
        phone = phone.replace("+84", "0");
        phone = phone.replace("0084", "0");
        phone = phone.replace(/ /g, "");
        if (phone != "") {
            var firstNumber = phone.substring(0, 2);
            if (
                (firstNumber == "06" ||
                    firstNumber == "05" ||
                    firstNumber == "04" ||
                    firstNumber == "09" ||
                    firstNumber == "08" ||
                    firstNumber == "03" ||
                    firstNumber == "07") &&
                phone.length == 10
            ) {
                if (phone.match(/^\d{10}/)) {
                    flag = true;
                }
            }
        }
        return flag;
    }
    function validatePhone(input, button = null) {
        input.on("keypress", function (e) {
            if (e.target.value.length > 9) {
                e.preventDefault();
            }
        });
        input.change(function () {
            if (!checkPhoneNumber(input)) {
                input.parent().addClass("hasErrorPhone");
                $('.acf-field-64a63a3550b79').addClass('hasTop');
                input.on("keypress", function () {
                    $(this).parent().removeClass("hasErrorPhone");
                    $('.acf-field-64a63a3550b79').removeClass('hasTop');
                });
                isPhone = false;
                button.prop("disabled", true);
                button.attr("disabled", true);

                button
                    .attr("unselectable", "on")
                    .css("user-select", "none")
                    .on("selectstart", false);
            }
            else {
                isPhone = true;
            }
        });
    }
    // validatePhone($(".af-field-phone input"), $(".single-service .acf-button"));
    // validatePhone($("#acf-field_6594b4bf6fc3f"), $(".form-info-contact .acf-button"));


    /**
        SlideToggle câu hỏi trang chi tiết dịch vụ
    */
    $("body").on("click", '.QA-item', function () {
        $(this).children('.answer').slideToggle();
    });

    /**
       Gắn tiêu đề dịch vụ vào input trong Form trang chi tiết dịch vụ
    */
    const titleService = $('#title-service').val();
    $(".af-field-services input").val(titleService);

    /**
        Thêm animation cho từng element 
    */
    /**
   Active menu item
*/
    const currentMenu = $("#current-menu").val();
    localStorage.setItem('current-menu', currentMenu);

    $(".menu-item").each(function () {
        const urlElement = $(this).children('a').attr('href');
        if (urlElement) {
            const parts = urlElement.split('/').filter(part => part.trim() !== '');
            const slug = parts.pop();
            const menuCurrent = localStorage.getItem('current-menu');
            if (slug == menuCurrent) {
                $(this).addClass('active');
            }
        }

    });


});
