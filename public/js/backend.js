<!-- checked and selected part -->

jQuery(document).ready(function () {
    $('#order-popular').click(function () {
        $(window).scrollTop(0);
        $('.filter-btn').removeClass("btn-active");
        $(this).addClass("btn-active");
        $('.input-min').removeAttr('checked');
        $('.input-newest').removeAttr('checked');
        $('.input-max').removeAttr('checked');
        $('.input-popular').attr('checked', true);
    });

    $('#order-newest').click(function () {
        $(window).scrollTop(0);
        $('.filter-btn').removeClass("btn-active");
        $(this).addClass("btn-active");
        $('.input-popular').removeAttr('checked');
        $('.input-min').removeAttr('checked');
        $('.input-max').removeAttr('checked');
        $('.input-newest').attr('checked', true);
    });

    $('#order-min').click(function () {
        $(window).scrollTop(0);
        $('.filter-btn').removeClass("btn-active");
        $(this).addClass("btn-active");
        $('.input-popular').removeAttr('checked');
        $('.input-newest').removeAttr('checked');
        $('.input-max').removeAttr('checked');
        $('.input-min').attr('checked', true);
    });

    $('#order-max').click(function () {
        $(window).scrollTop(0);
        $('.filter-btn').removeClass("btn-active");
        $(this).addClass("btn-active");
        $('.input-popular').removeAttr('checked');
        $('.input-newest').removeAttr('checked');
        $('.input-min').removeAttr('checked');
        $('.input-max').attr('checked', true);
    });

    $('.cat-parent').click(function () {
        $(window).scrollTop(0);
        $('.input-cat-parent:checked').removeAttr('checked');
        $(this).find('.input-cat-parent').attr('checked', true);
    });

    $('.cat-child').click(function () {
        $(window).scrollTop(0);
        $('.input-cat-child:checked').removeAttr('checked');
        $(this).find('.input-cat-child').attr('checked', true);
    });

    $('.num-btn').click(function () {
        $(window).scrollTop(0);
        $('.input-paginate:checked').removeAttr('checked');
        $(this).find('.num-btn').attr('checked', true);
    });

    <!-- add to fave -->
    jQuery('#ajaxSubmit').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/products/favorite",
            method: 'post',
            data: {
                product_id: jQuery('#product_id').val(),
            },
            success: function(result){
                console.log(result);
                if (result.data == 'login'){
                    window.location.href = '/user/loginForm';
                }else{
                    console.log(result.data);
                }
            }});
    });

    <!-- add to cart -->
    // jQuery('#addToCart').click(function(e){
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/addCart",
    //         method: 'post',
    //         data: {
    //             product_size : jQuery('.product_size:checked').val(),
    //             productid : jQuery('#productid').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultData = dataResult.data;
    //             var countData = dataResult.count
    //             var bodyData = '';
    //             $.each(resultData,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyData+="<li>"
    //                 bodyData+="<a href='/products/"+row.id+"'><figure><img src='/image/"+row.image+"' alt=''><span class='number-basket-list'>"+row.pivot.quantity+"</span></figure>" +
    //                     "<div class='info-basket'><h4>"+row.title+"</h4>" +
    //                     "<div class='size-basket-list'>" +
    //                     "<span> "+row.weight+" گرم </span>" +
    //                     "<span>سایز:  "+row.pivot.size+" </span>" +
    //                     "</div>" +
    //                     "<div class='single-price-basket-list'><span>قیمت :</span><span> "+row.pivot.sum_price+" تومان</span></div>" +
    //                     "</div><button class='trash'>" +
    //                     "<input hidden type='radio' class='product-trash' value='"+ row.id+" '>" +
    //                     "<input hidden type='radio' class='size-trash' value=' "+row.pivot.size+"'>"+
    //                     "<svg><use xlink:href='/images/trash.svg#trash'> </use></svg></button>" +
    //                     "</a>";
    //                 bodyData+="</li>";
    //
    //             })
    //             // $("#bodyData").append(bodyData);
    //             $("#info-basket").html(bodyData);
    //             $("#basket-count").html(countData);
    //
    //         }});
    // });

    <!-- remove from cart -->
    jQuery('#info-basket').on('click','button.trash',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/products/removeCart",
            method: 'post',
            data: {
                product_trash : jQuery('.product-trash').val(),
                size_trash : jQuery('.size-trash').val(),
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult.data);
                var resultData = dataResult.data;
                var countData = dataResult.count
                var bodyData = '';
                var cartData = '';
                $.each(resultData,function(index,row){
                    // var editUrl = url+'/'+row.id+"/edit";
                    bodyData+="<li>"
                    bodyData+="<a href='#'><figure><img src='/image/"+row.image+"' alt=''><span class='number-basket-list'>"+row.pivot.quantity+"</span></figure>" +
                        "<div class='info-basket'><h4>"+row.title+"</h4>" +
                        "<div class='size-basket-list'>" +
                        "<span> "+row.weight+" گرم </span>" +
                        "<span>سایز:  "+row.pivot.size+" </span>" +
                        "</div>" +
                        "<div class='single-price-basket-list'><span>قیمت :</span><span> "+row.pivot.sum_price+" تومان</span></div>" +
                        "</div><button class='trash'>" +
                        "<input hidden type='radio' class='product-trash' value='"+ row.id+" '>" +
                        "<input hidden type='radio' class='size-trash' value=' "+row.pivot.size+"'>"+
                        "<svg><use xlink:href='/images/trash.svg#trash'> </use></svg></button>" +
                        "</a>";
                    bodyData+="</li>";

                    cartData += '';
                })
                // $("#bodyData").append(bodyData);
                $("#info-basket").html(bodyData);
                $("#basket-count").html(countData);

            }});
    });

    <!-- paginate button -->
    // jQuery('#product-paginate').on('click','button',function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     console.log($(this).text());
    //     $(this).removeClass('num-active');
    //     $(this).addClass('num-active');
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('#paginate').val(),
    //             ajax_page : ($(this).text()) ? $(this).text() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                 if(row.inventory == 0){
    //                     bodyProduct += "<span class='end'>ناموجود</span>";
    //                 }else{
    //                     bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                         "<span class='real-price'>"+row.off+" تومان</span>";
    //                 }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //         }});
    //
    // });

    // <!-- paginate number filter -->
    // jQuery('#paginate').change(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('#paginate').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             // console.log(dataResult.data.from);
    //             var resultProduct = dataResult.data;
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             // console.log(resultProduct);
    //             // console.log(5);
    //             console.log(resultProduct);
    //             var bodyProduct= '';
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                     if(row.inventory == 0){
    //                         bodyProduct += "<span class='end'>ناموجود</span>";
    //                     }else{
    //                         bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                             "<span class='real-price'>"+row.off+" تومان</span>";
    //                     }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });

    <!-- popular product filter -->
    // jQuery('#order-popular').click(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('.paginate-num:selected').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                     if(row.inventory == 0){
    //                         bodyProduct += "<span class='end'>ناموجود</span>";
    //                     }else{
    //                         bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                             "<span class='real-price'>"+row.off+" تومان</span>";
    //                     }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });
    //
    // <!-- newest product filter -->
    // jQuery('#order-newest').click(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('.paginate-num:selected').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                     if(row.inventory == 0){
    //                         bodyProduct += "<span class='end'>ناموجود</span>";
    //                     }else{
    //                         bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                             "<span class='real-price'>"+row.off+" تومان</span>";
    //                     }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });
    //
    // <!-- min price filter -->
    // jQuery('#order-min').click(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('.paginate-num:selected').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                     if(row.inventory == 0){
    //                         bodyProduct += "<span class='end'>ناموجود</span>";
    //                     }else{
    //                         bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                             "<span class='real-price'>"+row.off+" تومان</span>";
    //                     }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });
    //
    // <!-- max price filter -->
    // jQuery('#order-max').click(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('.paginate-num:selected').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                 if(row.inventory == 0){
    //                     bodyProduct += "<span class='end'>ناموجود</span>";
    //                 }else{
    //                     bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                         "<span class='real-price'>"+row.off+" تومان</span>";
    //                 }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });

    <!-- filter ajax price weight an -->
    // jQuery('#btn-filter').click(function(e){
    //     $(window).scrollTop(0);
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('.paginate-num:selected').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>";
    //                 if(row.inventory == 0){
    //                     bodyProduct += "<span class='end'>ناموجود</span>";
    //                 }else{
    //                     bodyProduct += "<span class='off-item'>"+row.price+" تومان</span>" +
    //                         "<span class='real-price'>"+row.off+" تومان</span>";
    //                 }
    //                 bodyProduct += " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //
    //         }});
    // });

    <!-- size product filter -->
    // jQuery('.number-size input[type=radio]').change(function(e){
    //     e.preventDefault();
    //     $('.size-active').removeClass('size-active').find('svg').remove();
    //     $(this).parent().addClass('size-active').prepend(`<svg>
    //                                         <use xlink:href="/images/tik.svg#tik"></use>
    //                                     </svg>`);
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //
    //     jQuery.ajax({
    //         url: "/products/filter",
    //         method: 'post',
    //         data: {
    //             max_price : jQuery('#range2').html(),
    //             min_price : jQuery('#range1').html(),
    //             max_weight : jQuery('#w-range2').html(),
    //             min_weight : jQuery('#w-range1').html(),
    //             size_product : jQuery('.size_product:checked').val(),
    //             paginate_num : jQuery('#paginate').val(),
    //             ajax_page : (jQuery('.num-active').val()) ? jQuery('#paginate').val() : 1,
    //             order_popular : jQuery('.input-popular:checked').val(),
    //             order_newest : jQuery('.input-newest:checked').val(),
    //             order_max : jQuery('.input-max:checked').val(),
    //             order_min : jQuery('.input-min:checked').val(),
    //             category : jQuery('#category_id').val(),
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(dataResult){
    //             console.log(dataResult.data);
    //             var resultProduct = dataResult.data;
    //             var bodyProduct= '';
    //             var paginateProduct = '';
    //             var paginateNum = dataResult.paginateNum;
    //             var productCount = dataResult.productCount;
    //             var page = dataResult.page;
    //             var pageCount = (productCount % paginateNum);
    //             if(pageCount == 0){
    //                 var last_page = (productCount / paginateNum);
    //             }else{
    //                 var last_page = (productCount / paginateNum) + 1;
    //             }
    //
    //             $.each(resultProduct,function(index,row){
    //                 // var editUrl = url+'/'+row.id+"/edit";
    //                 bodyProduct+="<a href='/products/"+row.id+"' class='product-box off-product'>" +
    //                     "<figure>" +
    //                     " <img src='/image/"+row.image+"' alt=''>" +
    //                     "<div class='back-slide'></div>" +
    //                     "</figure><div class='product-text'>" +
    //                     "<h4>"+row.title+"</h4>" +
    //                     "<div class='product-price'>" +
    //                     "<span class='off-item'>"+row.price+" تومان</span>" +
    //                     "<span class='real-price'>"+row.off+" تومان</span>" +
    //                     " </div></div>" +
    //                     " </a>";
    //
    //             })
    //             if(productCount > paginateNum){
    //                 paginateProduct += "<ul class='num-page'>";
    //
    //                 if(page == 1){
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='1'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>" +
    //                         "&laquo;</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }
    //
    //                 for (i = 1; i <= pageCount; i++) {
    //                     if(page == i){
    //                         paginateProduct += "<li><button class='num-btn num-active'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"' checked>" +
    //                             "</li>";
    //                     }else{
    //                         paginateProduct += "<li><button class='num-btn'>"+i+"" +
    //                             "</button>" +
    //                             "<input hidden type='radio' class='input-paginate' value='"+i+"'>" +
    //                             "</li>";
    //                     }
    //                 }
    //
    //                 if (page != last_page ) {
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+page+"'>" +
    //                         "</li>";
    //                 }else{
    //                     paginateProduct += "<li><button class='num-btn'>»" +
    //                         "</button>" +
    //                         "<input hidden type='radio' class='input-paginate' value='"+last_page+"'>" +
    //                         "</li>";
    //                 }
    //                 paginateProduct += "</ul>";
    //             }
    //             console.log(paginateProduct);
    //
    //             $("#product-list").html(bodyProduct);
    //             $("#product-paginate").html(paginateProduct);
    //         }});
    //
    // });
});
