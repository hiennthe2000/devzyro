// $(document).ready(function () {
//     // $("body").append("<div id='google_translate_element'></div>");
//     // $("body").prepend("<div id='google_translate_element'></div>");
// });

/**
 * Hàm append google translate vào element
 */
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'vie', // Default language of the page
        includedLanguages: 'en,vi', // Languages to display in the dropdown
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE// Set the layout to vertical list
    }, 'google_translate_element');

    // setTimeout(function () {
    //     var select = document.querySelector('select.goog-te-combo');
    //     select.value = "vie";
    //     select.dispatchEvent(new Event('change'));
    // }, 1000);

    setTimeout(function () {
        var container = document.querySelector('[id=":1.container"]');
        if (container) {
            container.remove();
        }
    }, 2000);
}

/** 
* Hàm chọn ngôn ngữ
*/
document.addEventListener('DOMContentLoaded', function () {
    $('body').on("click", ".translation-links a", function () {

        var lang = $(this).data('lang');
        var langId = $(this).data('id');
        
        localStorage.setItem('langId', langId);
        localStorage.setItem('addLang', lang);

        var $frame = $('iframe.skiptranslate');
        var element = $frame.contents().find('span.text:contains(' + lang + ')').get(0);
        if (element) {
            element.click();
        }

        return false;
    });
    $(document).ready(function () {

        setTimeout(function () {

            var selectLang = localStorage.getItem('addLang');
            var $frame = $('iframe.skiptranslate');
            var element2 = $frame.contents().find('span.text:contains(' + selectLang + ')').get(0);
            if (element2) {
                element2.click();
            }

            var imgVie = "/wp-content/themes/epal-theme/images/vn.svg";
            var imgEng = "/wp-content/themes/epal-theme/images/en.svg";
            var langViet = `<span class="notranslate">VIE</span><img src = "${imgVie}">`;
            var langEng = `<span class="notranslate">ENG</span><img src = "${imgEng}">`;

            if (selectLang == 'Việt') {
                $('.language-default').html(langViet);
            } else if (selectLang == 'Anh') {
                $('.language-default').html(langEng);
            } else {
                $('.language-default').html(langEng);
            }

            return false;
        }, 1000);
    });
});

