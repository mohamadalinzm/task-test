function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

$(document).ready(function ($) {

    // member  ------------------------
    $("#member-button").click(function () {
        $("#slide-login-header").slideToggle("fast");
        $("#slide-basket-list").slideUp("fast");
    });
    // basket-button  ------------------------
    $("#basket-button").click(function () {
        $("#slide-basket-list").slideToggle("fast");
        $("#slide-login-header").slideUp("fast");
        $("#slide-login-list").css('display', 'flex');
    });
    // log-out  ------------------------
    $(".log-out").click(function () {
        $("#log-out-fill").fadeIn("slow");
        $("#log-out-fill").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $("#log-out-fill #no").click(function () {
        $("#log-out-fill").fadeOut("slow");
    });
    // delete-fav  ------------------------

    $(".delete").click(function () {
        let dialog = $(this).parents().eq(4).children('#dialog-delete');
        console.log(dialog);
        dialog.fadeIn("slow");
        dialog.css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $("#dialog-delete #no").click(function () {
        $("#dialog-delete").fadeOut("slow");
    });

    $(".delete-address-button").click(function () {
        $("#dialog-delete").fadeIn("slow");
        $("#dialog-delete").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $("#dialog-delete #no").click(function () {
        $("#dialog-delete").fadeOut("slow");
    });

    $(".delete-comment-button").click(function () {
        $("#dialog-delete").fadeIn("slow");
        $("#dialog-delete").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $("#dialog-delete #no").click(function () {
        $("#dialog-delete").fadeOut("slow");
    });

    // dialog-size-popup  ------------------------
    $("#button-size").click(function () {
        $("#size-popup").fadeIn("slow");
        $("#size-popup").css({'display': 'flex', 'flex-direction': 'column'});

        $("#close-btn-size").click(function () {
            $("#size-popup").fadeOut("slow");
        });
    });
    // dialog-notif  ------------------------
    $("#send-exist").click(function () {
        $("#notif-popup").fadeIn("slow");
        $("#notif-popup").css({'display': 'flex', 'flex-direction': 'column'});

        $("#close-btn-notif").click(function () {
            $("#notif-popup").fadeOut("slow");
        });

        $("#back").click(function () {
            $("#notif-popup").fadeOut("slow");
        });
    });
    // send-exist  ------------------------
    $(".send-exist").click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active').html(`<svg>
                                            <use xlink:href="images/notification.svg#notification"> </use>
                                        </svg>
                                        موجود شد به من اطلاع بده`);
        } else {
            $(this).addClass('active').html(`
                                        دیگر لازم نیست به من اطلاع بدی`);
        }
    });
    // add-heart  ------------------------
    var flag = true;
    $(".add-later").click(function () {
        if (flag) {
            $("#add-heart").fadeOut("slow");
            $("#add-heart").css({'transform': 'scale(0)', 'display': 'none', 'transition': '.3s'});
            $("#heart-fullcolor").fadeIn("slow");
            $("#heart-fullcolor").css({'transform': 'scale(1)', 'display': 'block', 'transition': '.3s'});
            flag = false;
        } else {
            $("#add-heart").fadeIn("slow");
            $("#add-heart").css({'transform': 'scale(1)', 'display': 'block', 'transition': '.3s'});
            $("#heart-fullcolor").fadeOut("slow");
            $("#heart-fullcolor").css({'transform': 'scale(0)', 'display': 'none', 'transition': '.3s'});
            flag = true;
        }
    });
// button-edit  ------------------------
    $(".btn-edit-address").click(function () {
        $(".dialog-address").fadeIn("slow");
        $(".dialog-address").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $(".close-edit-ad").click(function () {
        $(".dialog-address").fadeOut("slow");
    });
// btn-edit-head  ------------------------
    $(".head-b-article .btn-edit-head").click(function () {
        $(".dialog-address").fadeIn("slow");
        $(".dialog-address").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    // dashboard -----------------------------------:
// edit-user  ------------------------
    $(".edit-user").click(function () {
        $(".edit-username").fadeIn("slow");
        $(".edit-username").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $(".close-edit-ad").click(function () {
        $(".edit-username").fadeOut("slow");
    });
// edit-password  ------------------------
    $(".change-pass-btn").click(function () {
        $(".edit-password").fadeIn("slow");
        $(".edit-password").css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'});
    });
    $(".close-edit-ad").click(function () {
        $(".edit-password").fadeOut("slow");
    });

    // responsive menu  ------------------------

    var width = $(window).width();
    let menuSlide = true;
    if (width < 768) {
        $("li.menu-item-has-children > a").click(function (e) {
            if (menuSlide) {
                $(this).parent().find('.child-menu').slideDown(".3s");
                $(this).parent().find('.child-menu').css({
                    'visibility': 'visible',
                    'opacity': '1',
                    'position': 'relative',
                    'box-shadow': 'none'
                });
                $(".child-menu ul").css({'opacity': '1'});
                $(".child-menu .heading-child-menu").css({'opacity': '1'});
                menuSlide = false;
            } else {
                $(this).parent().find('.child-menu').slideUp("fast");
                menuSlide = true;
            }

        });
    }
});

//>> responsive menu  ------------------------
function openNav() {
    document.getElementById("main-menu").style.width = "250px";
    document.getElementById("main-menu").style.display = "block";
    document.getElementById("main-menu").style.opacity = "1";
}

function closeNav() {
    document.getElementById("main-menu").style.width = "0";
    document.getElementById("main-menu").style.opacity = "0";
}

// bg-header slider ------------------------
$('#bg-header').slick({
    nextArrow: '<button type="button" class="arrow-prev"><svg><use xlink:href="images/arrow-left.svg#arrow-l"></use></svg></button>',
    prevArrow: '<button type="button" class="arrow-next"><svg><use xlink:href="images/arrow-left.svg#arrow-l"></use></svg></button>',
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 1000,
    infinite: true,
    slidesToShow: 1,
    rtl: true,
    slidesToScroll: 1,
    centerMode: false,
    dots: true,
    arrows: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                autoplaySpeed: 1000,
                speed: 700,
            }
        },
    ]
});
// multi-slider ------------------------
$('.multi-slide-parent').slick({
    arrows: true,
    nextArrow: '<button type="button" class="arrow-prev-little"><svg><use xlink:href="images/arrow-left.svg#arrow-l"></use></svg></button>',
    prevArrow: '<button type="button" class="arrow-next-little"><svg><use xlink:href="images/arrow-left.svg#arrow-l"></use></svg></button>',
    autoplay: true,
    autoplaySpeed: 200,
    speed: 1500,
    infinite: true,
    slidesToShow: 4,
    rtl: true,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    centerPadding: '10px',
    responsive: [
        {
            breakpoint: 1140,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '10px',
            }
        },
    ]
});
// number-size-slide ------------------------
$('.number-size-slide').slick({
    arrows: true,
    prevArrow: '<button type="button" class="arrow-prev-size"><svg><use xlink:href="images/arrow-long.svg#arrow-long"></use></svg></button>',
    nextArrow: '<button type="button" class="arrow-next-size"><svg><use xlink:href="images/arrow-long.svg#arrow-long"></use></svg></button>',
    autoplay: false,
    autoplaySpeed: 200,
    speed: 1000,
    infinite: true,
    slidesToShow: 5,
    rtl: false,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    centerPadding: '20px',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 540,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
    ]
});

// magnify picture ------------------------
$('.slide-for').hover(function () {
    $('#myresult').css('visibility', 'visible');
}, function () {
    $('#myresult').css('visibility', 'hidden');
});

function imageZoom(imgID) {
    var img, lens, result, cx, cy;
    img = document.getElementById(imgID);
    img.elevateZoom();
    // result = document.getElementById(resultID);
    // /*create lens:*/
    // lens = document.createElement("DIV");
    // lens.setAttribute("class", "img-zoom-lens");
    // /*insert lens:*/
    // img.parentElement.insertBefore(lens, img);
    // /*calculate the ratio between result DIV and lens:*/
    // cx = result.offsetWidth / lens.offsetWidth;
    // cy = result.offsetHeight / lens.offsetHeight;
    // /*set background properties for the result DIV:*/
    // result.style.backgroundImage = "url('" + img.src + "')";
    // result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    // /*execute a function when someone moves the cursor over the image, or the lens:*/
    // lens.addEventListener("mousemove", moveLens);
    // img.addEventListener("mousemove", moveLens);
    // /*and also for touch screens:*/
    // lens.addEventListener("touchmove", moveLens);
    // img.addEventListener("touchmove", moveLens);
    //
    // function moveLens(e) {
    //     var pos, x, y;
    //     /*prevent any other actions that may occur when moving over the image:*/
    //     e.preventDefault();
    //     /*get the cursor's x and y positions:*/
    //     pos = getCursorPos(e);
    //     /*calculate the position of the lens:*/
    //     x = pos.x - (lens.offsetWidth / 2);
    //     y = pos.y - (lens.offsetHeight / 2);
    //     /*prevent the lens from being positioned outside the image:*/
    //     if (x > img.width - lens.offsetWidth) {
    //         x = img.width - lens.offsetWidth;
    //     }
    //     if (x < 0) {
    //         x = 0;
    //     }
    //     if (y > img.height - lens.offsetHeight) {
    //         y = img.height - lens.offsetHeight;
    //     }
    //     if (y < 0) {
    //         y = 0;
    //     }
    //     /*set the position of the lens:*/
    //     lens.style.left = x + "px";
    //     lens.style.top = y + "px";
    //     /*display what the lens "sees":*/
    //     result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    // }
    //
    // function getCursorPos(e) {
    //     var a, x = 0, y = 0;
    //     e = e || window.event;
    //     /*get the x and y positions of the image:*/
    //     a = img.getBoundingClientRect();
    //     /*calculate the cursor's x and y coordinates, relative to the image:*/
    //     x = e.pageX - a.left;
    //     y = e.pageY - a.top;
    //     /*consider any page scrolling:*/
    //     x = x - window.pageXOffset;
    //     y = y - window.pageYOffset;
    //     return {x: x, y: y};
    // }

}

// --------- img in single-product -------------
$('.slide-nav li').click(function () {



    let image = $(this).find('img').attr('src');
    $('.img-zoom-lens').remove();
    $('#myimage').attr('src', image);
    // $('#myimage').attr('data-zoom-image', image);
    // imageZoom("myimage", "myresult");
   // $("#myimage").elevateZoom({zoomWindowPosition: 11});
    $("#myimage").data('zoom-image', image).elevateZoom({
        zoomWindowPosition: 11
    });

});

// --------- tab question -------------
$(document).ready(function () {

    $(".ht-question").click(function () {
        let ct_question_flag = !$(this).hasClass('active');
        if (ct_question_flag) {
            $(this).parent().find(".ct-question").slideDown("slow");
            $(this).parent().find(".ht-question svg , .ht-question img").css('transform', 'translateY(-50%) rotate(180deg)');
            $(this).addClass('active');

        } else {
            $(this).parent().find(".ct-question").slideUp("slow");
            $(this).parent().find(".ht-question svg , .ht-question img").css('transform', 'translateY(-50%) rotate(0deg)');
            $(this).removeClass('active');
        }

    });


/////////////////// more-cat ///////////////////////////
    /*
    let cat_filter = true;
    $(".more-cat").click(function(){
        if(cat_filter)
        {
            $('.cat-filter').css('height','auto');
            $(this).html(`<svg>
            <use xlink:href="images/arrow-bottom.svg#arrow-bottom"></use>
        </svg>
        <span>نمایش آیتم های کمتر</span> `);
        $(this).find('svg').css('transform','rotate(180deg)');
            cat_filter=false;
        }
        else
        {
            $('.cat-filter').css('height','370px');
            $(this).html(`<svg>
            <use xlink:href="images/arrow-bottom.svg#arrow-bottom"></use>
        </svg>
        <span>نمایش آیتم های بیشتر</span> `);
        $(this).find('svg').css('transform','rotate(0)');
            cat_filter=true;
        }
     });

    $('.more-cat').trigger('click');

*/
    // $(".cat-btn-haschild").click(function () {
    //     let child = $(this).parent().find('.child-cat-aside');
    //     if (child.hasClass('active')) {
    //         child.removeClass('active');
    //         $(this).find('svg').css('transform', 'rotate(90deg)');
    //     } else {
    //         $('.child-cat-aside').removeClass('active');
    //         $(".cat-btn-haschild").find('svg').css('transform', 'rotate(90deg)');
    //         child.addClass('active');
    //         $(this).find('svg').css('transform', 'rotate(0deg)');
    //     }
    // });


/////////////////// head-aside ///////////////////////////

    $(".has-hide-content .head-aside").click(function () {
        if (!$(this).parent().hasClass('active')) {
            $(this).parent().find('.hide-content').css('height', 'auto');
            $(this).parent().find('.hide-content').css({'transition': '.3s'});
            $(this).parent().find(".head-aside svg").css({'transform': 'rotate(180deg)'});

            $(this).parent().addClass('active')
        } else {
            $(this).parent().find('.hide-content').css('height', '0px');
            $(this).parent().find(".head-aside svg").css({'transform': 'rotate(0deg)'});
            $(this).parent().removeClass('active')
        }
    });


});


/////////////////// checkbox size(search) ///////////////////////////

$('.number-size input[type=checkbox]').change(function () {
    if (!$(this).is(':checked')) {
        $(this).parent().removeClass('size-active').find('svg').remove();
    } else {
        $(this).parent().addClass('size-active').prepend(`<svg>
                                            <use xlink:href="images/tik.svg#tik"></use>
                                        </svg>`);
    }
});

/////////////////// radio size(single) ///////////////////////////
$('.number-size input[type=radio]').change(function () {
    $('.number-size').removeClass('size-active').find('svg').remove();

    $(this).parent().addClass('size-active').prepend(`<svg>
                                            <use xlink:href="/images/tik.svg#tik"></use>
                                        </svg>`);

});

///////////////////
//$('.number-size input[type=checkbox]').change(function (){
//$('.size-active').removeClass('size-active').find('svg').remove();
//$(this).parent().addClass('size-active').prepend(`<svg>
//                                           <use xlink:href="images/tik.svg#tik"></use>
//                                       </svg>`);
// });

///////////////////////////


/////////////////// verify code///////////////////////////
$(function () {
    'use strict';

    var body = $('.verify-form');

    function goToNextInput(e) {
        var key = e.which,
            t = $(e.target),
            sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
            e.preventDefault();
            return false;
        }

        if (key === 9) {
            return true;
        }

        if (!sib || !sib.length) {
            sib = body.find('input').eq(0);
        }
        sib.select().focus();
    }

    function onKeyDown(e) {
        var key = e.which;

        if (key === 8 || key === 9 || (key >= 48 && key <= 57)) {
            return true;
        }

        e.preventDefault();
        return false;
    }

    function onFocus(e) {
        $(e.target).select();
    }

    body.on('keyup', 'input', goToNextInput);
    body.on('keydown', 'input', onKeyDown);
    body.on('click', 'input', onFocus);

})


$('.password-visibility').click(function () {
    var x = document.getElementById("myPass");
    if (x.type === "password") {
        $(this).addClass('active');
        x.type = "text";
    } else {
        $(this).removeClass('active');
        x.type = "password";
    }
});

/////////////////// countdown code///////////////////////////

var dt = new Date();
dt.setMinutes(dt.getMinutes() + 2);
var countDownDate = dt.getTime();

// Update the count down every 1 second
var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    $('#timer-code').html("0" + minutes + ":" + seconds + "");

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        $('#timer-code').html("");
    }
}, 1000);

/////////////////// input number ///////////////////////////

$('<div class="quantity-nav">' +
    '<div class="quantity-button quantity-up"><svg><use xlink:href="/images/positive.svg#positive"></use></svg></div>' +
    '<div class="quantity-button quantity-down"><svg><use xlink:href="/images/minimise.svg#minimise"></use></svg></div></div>').insertAfter('.quantity input');
$('.quantity').each(function () {
    var spinner = $(this),
        input = spinner.find('input[type="number"]'),
        product_id = spinner.find('div[class="product-id"]'),
        product_size = spinner.find('div[class="product-size"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');


    btnUp.click(function () {
        let maxInput = $(this).parents().eq(1).children('.quantity-input').attr('max');
        console.log(maxInput);
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/cart/productCount",
            method: 'post',
            data: {
                product_count: parseInt(newVal),
                product_id: parseInt(product_id[0].innerHTML),
                product_size: parseInt(product_size[0].innerHTML),
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {

                if (dataResult.inventory)
                {
                    if (dataResult.auth) {
                        let cart = dataResult;
                        let product = dataResult.product;
                        let sumOff = product.pivot.quantity * (product.price - product.off);
                        let sumProduct = product.pivot.unit_price * product.pivot.quantity;
                        $('.product-sum').html(cart.cartSum + '<span>تومان </span>');
                        $('.off-cart').html(cart.off);
                        $('.price-aside-num span').html(cart.total);
                        $('.off-' + product.pivot.id + ' .number-basket-list').html(cart.count);
                        $('.off-' + product.pivot.id + ' .b-off').html('تخفیف ' + formatNumber(sumOff) + ' تومان');
                        $('.off-' + product.pivot.id + ' .price-item').html(formatNumber(sumProduct) + '<span>تومان </span>');

                    } else {
                        let cart = dataResult;
                        let rowId = dataResult.product_rowid;
                        let product = dataResult.product;
                        let product_id = dataResult.product_id;
                        let count = dataResult.count;
                        let sumOff = 0;
                        let sumProduct = 0;
                        if (product.off > 0) {
                            sumProduct = product.off * count;
                            sumOff = dataResult.count * (product.price - product.off);
                        } else {
                            sumProduct = product.price * count;
                            sumOff = 0;
                        }

                        $('.product-sum').html(cart.cartSum + '<span>تومان </span>');
                        $('.off-cart').html(cart.off);
                        $('.price-aside-num span').html(cart.total);
                        $('.off-' + rowId + ' .number-basket-list').html(count);
                        $('.off-' + rowId + ' .b-off').html('تخفیف ' + formatNumber(sumOff) + ' تومان');
                        $('.off-' + rowId + ' .price-item').html(formatNumber(sumProduct) + '<span>تومان </span>');
                    }
                }else{

                    // let product = dataResult.product;
                    // let count = parseInt(dataResult.count) - 1;
                    // if (maxInput == dataResult.count)
                    // {
                    //     count = parseInt(maxInput);
                    // }
                    // let product_id = dataResult.product_id;
                    {{ sweetAlert("تسک مورد نظر به حداکثر تعداد موجود رسیده است")
                    }}
                    console.log('not available');
                    console.log(count);


                    // $('.off-' + product_id + ' .number-basket-list').html(dataResult.count);
                    // $('.real-count-' + product_id ).val(dataResult.count);
                }

            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }
        });
    });

    btnDown.click(function () {
        let maxInput = $(this).parents().eq(1).children('.quantity-input').attr('max');
        let minInput = $(this).parents().eq(1).children('.quantity-input').attr('min');
        console.log(maxInput);
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;
        }

        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/cart/productCount",
            method: 'post',
            data: {
                product_count: parseInt(newVal),
                product_id: parseInt(product_id[0].innerHTML),
                product_size: parseInt(product_size[0].innerHTML),
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
                if (dataResult.inventory)
                {
                    if (dataResult.auth) {
                        let cart = dataResult;
                        let product = dataResult.product;
                        let sumOff = product.pivot.quantity * (product.price - product.off);
                        let sumProduct = product.pivot.unit_price * product.pivot.quantity;
                        $('.product-sum').html(cart.cartSum + '<span>تومان </span>');
                        $('.off-cart').html(cart.off);
                        $('.price-aside-num span').html( cart.total);
                        $('.off-' + product.pivot.id + ' .number-basket-list').html(cart.count);
                        $('.off-' + product.pivot.id + ' .b-off').html(' تخفیف ' + formatNumber(sumOff) + ' تومان');
                        $('.off-' + product.pivot.id + ' .price-item').html(formatNumber(sumProduct) + '<span>تومان </span>');
                    } else {
                        let cart = dataResult;
                        let product = dataResult.product;
                        let product_id = dataResult.product_id;
                        let rowId = dataResult.product_rowid;
                        let count = dataResult.count;
                        let sumOff = 0;
                        let sumProduct = 0;
                        if (product.off > 0) {
                            sumProduct = product.off * count;
                            sumOff = dataResult.count * (product.price - product.off);
                        } else {
                            sumProduct = product.price * count;
                            sumOff = 0;
                        }
                        $('.product-sum').html(cart.cartSum + '<span>تومان </span>');
                        $('.off-cart').html(cart.off);
                        $('.price-aside-num span').html( cart.total);
                        $('.off-' + rowId + ' .number-basket-list').html(count);
                        $('.off-' + rowId + ' .b-off').html(' تخفیف ' + formatNumber(sumOff) + ' تومان');
                        $('.off-' + rowId + ' .price-item').html(formatNumber(sumProduct) + '<span>تومان </span>');
                    }
                }else
                {
                    console.log('not available');

                    let product = dataResult.product;
                    let count = parseInt(dataResult.count) + 1;
                    // if (maxInput == dataResult.count)
                    // {
                    //     count = parseInt(maxInput);
                    // }
                    console.log(maxInput,dataResult.count);

                    if (maxInput == 1 && minInput == 1)
                    {
                        count = parseInt(maxInput);
                    }
                    let product_id = dataResult.product_id;


                    $('.off-' + product_id + ' .number-basket-list').html(count);
                    $('.real-count-' + product_id ).val(count);
                }

            }
        });

    });

});

//--------------------------------------------------------
// $('.dash-btn').click(function(){
//     if($(this).data('tab'))
//     {
//         $('.dash-buttons li').removeClass('dash-active');
//         $(this).parent().addClass('dash-active');
//         let tab = $(this).data('tab');
//         $('.content').css('display','none');
//         $(`.content[data-tab=${tab}]`).css('display','block');
//     }
// });
//
// $('.dash-btn[data-tab=1]').trigger('click');

/////////////////// select ///////////////////////////
window.onload = function () {
    crear_select();
}

function isMobileDevice() {
    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
};


var li = new Array();

function crear_select() {
    var div_cont_select = document.querySelectorAll("[data-mate-select='active']");
    var select_ = '';
    for (var e = 0; e < div_cont_select.length; e++) {
        div_cont_select[e].setAttribute('data-indx-select', e);
        div_cont_select[e].setAttribute('data-selec-open', 'false');
        var ul_cont = document.querySelectorAll("[data-indx-select='" + e + "'] > .cont_list_select_mate > ul");
        select_ = document.querySelectorAll("[data-indx-select='" + e + "'] >select")[0];
        if (isMobileDevice()) {
            select_.addEventListener('change', function () {
                _select_option(select_.selectedIndex, e);
            });
        }
        var select_optiones = select_.options;
        document.querySelectorAll("[data-indx-select='" + e + "']  > .selecionado_opcion ")[0].setAttribute('data-n-select', e);
        document.querySelectorAll("[data-indx-select='" + e + "']  > .icon_select_mate ")[0].setAttribute('data-n-select', e);
        for (var i = 0; i < select_optiones.length; i++) {
            li[i] = document.createElement('li');
            if (select_optiones[i].selected == true || select_.value == select_optiones[i].innerHTML) {
                li[i].className = 'active';
                document.querySelector("[data-indx-select='" + e + "']  > .selecionado_opcion ").innerHTML = select_optiones[i].innerHTML;
            }
            ;
            li[i].setAttribute('data-index', i);
            li[i].setAttribute('data-selec-index', e);
// funcion click al selecionar
            li[i].addEventListener('click', function () {
                _select_option(this.getAttribute('data-index'), this.getAttribute('data-selec-index'));
            });

            li[i].innerHTML = select_optiones[i].innerHTML;
            ul_cont[0].appendChild(li[i]);

        }
        ; // Fin For select_optiones
    }
    ; // fin for divs_cont_select
} // Fin Function
var cont_slc = 0;

function open_select(idx) {
    var idx1 = idx.getAttribute('data-n-select');
    var ul_cont_li = document.querySelectorAll("[data-indx-select='" + idx1 + "'] .cont_select_int > li");
    var hg = 0;
    var slect_open = document.querySelectorAll("[data-indx-select='" + idx1 + "']")[0].getAttribute('data-selec-open');
    var slect_element_open = document.querySelectorAll("[data-indx-select='" + idx1 + "'] select")[0];
    if (isMobileDevice()) {
        if (window.document.createEvent) { // All
            var evt = window.document.createEvent("MouseEvents");
            evt.initMouseEvent("mousedown", false, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            slect_element_open.dispatchEvent(evt);
        } else if (slect_element_open.fireEvent) { // IE
            slect_element_open.fireEvent("onmousedown");
        } else {
            slect_element_open.click();
        }
    } else {


        for (var i = 0; i < ul_cont_li.length; i++) {
            hg += ul_cont_li[i].offsetHeight;
        }
        ;
        if (slect_open == 'false') {
            document.querySelectorAll("[data-indx-select='" + idx1 + "']")[0].setAttribute('data-selec-open', 'true');
            document.querySelectorAll("[data-indx-select='" + idx1 + "'] > .cont_list_select_mate > ul")[0].style.height = hg + "px";
            document.querySelectorAll("[data-indx-select='" + idx1 + "'] > .icon_select_mate")[0].style.transform = 'rotate(180deg)';
        } else {
            document.querySelectorAll("[data-indx-select='" + idx1 + "']")[0].setAttribute('data-selec-open', 'false');
            document.querySelectorAll("[data-indx-select='" + idx1 + "'] > .icon_select_mate")[0].style.transform = 'rotate(0deg)';
            document.querySelectorAll("[data-indx-select='" + idx1 + "'] > .cont_list_select_mate > ul")[0].style.height = "0px";
        }
    }

} // fin function open_select

function salir_select(indx) {
    var select_ = document.querySelectorAll("[data-indx-select='" + indx + "'] > select")[0];
    document.querySelectorAll("[data-indx-select='" + indx + "'] > .cont_list_select_mate > ul")[0].style.height = "0px";
    document.querySelector("[data-indx-select='" + indx + "'] > .icon_select_mate").style.transform = 'rotate(0deg)';
    document.querySelectorAll("[data-indx-select='" + indx + "']")[0].setAttribute('data-selec-open', 'false');
}

function _select_option(indx, selc) {
    if (isMobileDevice()) {
        selc = selc - 1;
    }
    var select_ = document.querySelectorAll("[data-indx-select='" + selc + "'] > select")[0];

    var li_s = document.querySelectorAll("[data-indx-select='" + selc + "'] .cont_select_int > li");
    var p_act = document.querySelectorAll("[data-indx-select='" + selc + "'] > .selecionado_opcion")[0].innerHTML = li_s[indx].innerHTML;
    var select_optiones = document.querySelectorAll("[data-indx-select='" + selc + "'] > select > option");
    for (var i = 0; i < li_s.length; i++) {
        if (li_s[i].className == 'active') {
            li_s[i].className = '';
        }
        ;
        li_s[indx].className = 'active';

    }
    ;
    select_optiones[indx].selected = true;
    select_.selectedIndex = indx;
    select_.onchange();
    salir_select(selc);
}

/////////////////// range ///////////////////////////

// <div id="range-sidebar"></div>
// var slider = document.getElementById('range-sidebar');
//
// noUiSlider.create(slider, {
//     start: [20000000, 80000000],
//     connect: true,
//     step:10000,
//     range: {
//         'min': 0,
//         'max': 99999999
//     }
// });
// slider.noUiSlider.on('update', function (values){
//     $('#range1').html(parseInt(values[0]));
//     $('#range2').html(parseInt(values[1]));
// });
// // <div id="w-range-sidebar"></div>
// var w_slider = document.getElementById('w-range-sidebar');
//
// noUiSlider.create(w_slider, {
//     start: [20.04, 80],
//     connect: true,
//     step:.01,
//     range: {
//         'min': 0,
//         'max': 100
//     }
// });
//
//
// w_slider.noUiSlider.on('update', function (values){
//     $('#w-range1').html(values[0]);
//     $('#w-range2').html(values[1]);
// });


