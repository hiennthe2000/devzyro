//Slider trang danh mục tin tức
$(document).ready(function () {
    $(".slider-news").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        items: 1
    });
});

//active chuyên mục tin tức khi được click
$(document).ready(function () {
    $('.category-link').click(function () {
        $('.category-link').removeClass('active');
        $(this).addClass('active');
    });
});

//show view xem thêm bài viết
$(document).ready(function () {
    $("#btn-view").click(function () {
        $("#show-post").slideToggle();
    });
});

//show hide menu mobile
$(document).ready(function () {
    $("#show-mobile").click(function () {
        $(".menu-active-mobile").toggleClass("active");
        $("#show-mobile").addClass("active-btn");

        setTimeout(function () {
            $("#overlay").toggleClass("active-over");
        }, 500);
    });

    $("#hide-mobile").click(function () {
        $(".menu-active-mobile").removeClass("active");

        setTimeout(function () {
            $("#overlay").removeClass("active-over");
        }, 500);
    });

    //Hiệu úng overlay khi show menu mobile
    $("#overlay").click(function () {
        $(".menu-active-mobile").removeClass("active");

        setTimeout(function () {
            $("#overlay").removeClass("active-over");
        }, 500);
    });

    //add cho menu-item icon down
    $('#menu-menu-main-1 .menu-item-has-children a').append('<img id="icon-down" src="/wp-content/themes/epal-theme/images/sort-down.svg">');

    //slidetoggle cho menu con mobile
    $('#menu-menu-main-1 .menu-item-has-children a #icon-down').on('click', function () {
        $(this).closest('#menu-menu-main-1 .menu-item-has-children').find('.sub-menu').slideToggle();
    });

    // Ngăn chặn hành vi mặc định của thẻ <a> cho icon 
    $("#menu-menu-main-1 .menu-item-has-children a #icon-down").on("click", function (event) {
        event.preventDefault();

    });



});

//sự kiện active cho các li menu mobile
$(document).ready(function () {
    $('#menu-menu-main-1 .menu-item').click(function () {
        $('#menu-menu-main-1 .menu-item').removeClass('active-li');
        $(this).addClass('active-li');
    });
});

$(document).ready(function () {
    $('#menu-menu-main-1 .menu-item-has-children .sub-menu .menu-item').click(function () {
        $('#menu-menu-main-1 .menu-item-has-children .sub-menu .menu-item').removeClass('active-sub');
        $(this).addClass('active-sub');
    });
});



//fixed menu 
$(document).ready(function () {
    $(window).scroll(function () {
        var scrollPosition = $(window).scrollTop();
        var navbar = $("#menu-main");

        if (scrollPosition > 130) {
            navbar.addClass("fixed-top");
        } else {
            navbar.removeClass("fixed-top");
        }
    });

    //add class banner
    $("#hero-carousel .carousel-item:first").addClass("active");

    // cuộn sidebar khi scroll
    var controller = new ScrollMagic.Controller();
    var contentHeight = $('.content-scroll').height();
    var sidebarHeight = $('.sidebar-scroll').height();
    if ($(window).width() > 992) {
        if (contentHeight > sidebarHeight) {
            var scene = new ScrollMagic.Scene({
                triggerElement: ".sidebar-scroll",
                triggerHook: 1,
                offset: sidebarHeight,
                duration: contentHeight - sidebarHeight
            })
                .setPin(".sidebar-scroll")
                .addTo(controller);
        }
    }
});

