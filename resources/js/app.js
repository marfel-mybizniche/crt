(function ($) {

    var app = {
        onReady: function () {
            app.customDropdown();
        },
        onLoad: function () {
            $(document).foundation();
            app.utils();
        },


        utils: function () {

            $('.navbar .btn-user').click(function () {
                $('#header').toggleClass('show-account');
                $('#header').removeClass('show-classes');
                $('#header').removeClass('show-menu');
            });

            $('.navbar .btn-classes').click(function () {
                $('#header').toggleClass('show-classes');
                $('#header').removeClass('show-account');
                $('#header').removeClass('show-menu');
            });

            $(window).scroll(function () {
                var getTop = $('.courses_results').offset().top;
                if ($(this).scrollTop() > getTop) {
                    $('.filter_sticky').addClass("active");
                    if (!$(".listing_sticky_info").hasClass("active")) {
                        $(".listing_sticky_info").addClass("active");
                    }
                }
                else {
                    $('.filter_sticky').removeClass("active");
                    $(".listing_sticky_info").removeClass("active");
                }


            });

            $(".scrollto").click(function (e) {
                e.preventDefault();
                var data_target = $(this).data("target");

                if (data_target == undefined) {
                    alert("Missing data-target attribute");
                    return false;
                }
                if ($(data_target)[0]) {
                    var offset = $("header .hsnav-s10")[0] ? $("header .hsnav-s10").height() : 0;
                    $("html,body").animate({ scrollTop: $(data_target).offset().top - offset }, 500);
                }
                return false;
            })

        },

        customDropdown: function () {
            $('.custom_dropdown > li').hover(function () {
                $(this).addClass('hover');
            }, function () {
                $(this).removeClass('hover');
            })

            $('.custom_dropdown > li').click(function () {
                $(this).toggleClass('hover');
            });


        }


    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

})(jQuery);
