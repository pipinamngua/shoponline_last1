/// <reference path="jquery-1.12.3.js" />

(function ($) {
    var list = [];

    /* function to be executed when product is selected for comparision*/

    $(document).on('click', '.addToCompare', function () {
        $(".comparePanle").show();
        $(this).toggleClass("rotateBtn");
        $(this).parents(".selectProduct").toggleClass("selected");
        var productID = $(this).parents('.selectProduct').attr('data-title');

        var inArray = $.inArray(productID, list);
        if (inArray < 0) {
            if (list.length > 2) {
                $("#WarningModal").show();
                $("#warningModalClose").click(function () {
                    $("#WarningModal").hide();
                });
                $(this).toggleClass("rotateBtn");
                $(this).parents(".selectProduct").toggleClass("selected");
                return;
            }

            if (list.length < 3) {
                list.push(productID);

                var displayTitle = $(this).parents('.selectProduct').attr('data-id');

                var image = $(this).siblings(".productImg").attr('src');

                $(".comparePan").append('<div id="' + productID + '" class="relPos titleMargin w3-margin-bottom   w3-col l3 m4 s4"><div class="w3-white titleMargin"><a class="selectedItemCloseBtn w3-closebtn cursor">&times</a><img src="' + image + '" alt="image" style="height:100px;"/><p id="' + productID + '" class="titleMargin1">' + displayTitle + '</p></div></div>');
            }
        } else {
            list.splice($.inArray(productID, list), 1);
            var prod = productID.replace(" ", "");
            $('#' + prod).remove();
            hideComparePanel();

        }
        if (list.length > 1) {

            $(".cmprBtn").addClass("active");
            $(".cmprBtn").removeAttr('disabled');
        } else {
            $(".cmprBtn").removeClass("active");
            $(".cmprBtn").attr('disabled', '');
        }

    });
    /*function to be executed when compare button is clicked*/
    $(document).on('click', '.cmprBtn', function () {
            if ($(".cmprBtn").hasClass("active")) {

            product = $('.selectProduct[data-title="' + list[0] + '"]');
            if($(product).data('cate') == 1) {
                $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">'  + '<li class=" relPos compHeader"><p class="w3-display-middle">Features</p></li>'+'<li class="cpu">Loại</li>' + '<li class="cpu">Độ phân giải</li>' + '<li class="cpu">Hệ điều hành</li>' + '<li class="cpu">Màn hình</li>' + '<li class="cpu">Xuất xứ</li>' + '</ul>'+'</div>');
            } else if($(product).data('cate') == 2) {
                $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">'  + '<li class=" relPos compHeader"><p class="w3-display-middle">Features</p></li>'+'<li class="cpu">Loại</li>' + '<li class="cpu">CPU</li>' + '<li class="cpu">Hệ điều hành</li>' + '<li class="cpu">Màn hình</li>' + '<li class="cpu">Xuất xứ</li>'  + '</ul>' + '</div>');
            } else {
                $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">'  + '<li class=" relPos compHeader"><p class="w3-display-middle">Features</p></li>'+'<li class="cpu">Loại</li>' + '<li class="cpu">CPU</li>' + '<li class="cpu">Hệ điều hành</li>' + '<li class="cpu">Màn hình</li>' + '<li class="cpu">Xuất xứ</li>'  + '</ul>' + '</div>');
            }

            for (var i = 0; i < list.length; i++) {
                product = $('.selectProduct[data-title="' + list[i] + '"]');
                /* this is to add the items to popup which are selected for comparision */
                if($(product).data('cate') == 1){
                    
                    var image = $(product).data('image');
                    /*appending to div*/
                    $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">' + '<li class="compHeader"><img height="150px" src="'+image+'" class="compareThumb"></li>' + '<li class="cpu">' + $(product).data('loai') + '</li>' + '<li class="cpu">' + $(product).data('dophangiai') + '<li class="cpu">' + $(product).data('hedieuhanh') + '</li>' + '<li class="cpu">' + $(product).data('manhinh') + '<li class="cpu">' + $(product).data('xuatxu') + '</li>' + '</ul>' + '</div>');
                } else if($(product).data('cate') == 2) {
                    var image = $(product).data('image');
                    /*appending to div*/
                    $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">' + '<li class="compHeader"><img height="150px" src="'+image+'" class="compareThumb"></li>' + '<li class="cpu">' + $(product).data('loai') + '</li>' + '<li class="cpu">' + $(product).data('cpu') + '<li class="cpu">' + $(product).data('hedieuhanh') + '</li>' + '<li class="cpu">' + $(product).data('manhinh') + '<li class="cpu">' + $(product).data('xuatxu') + '</li>' + '</ul>' + '</div>');
                
                } else if($(product).data('cate') == 3) {
                   var image = $(product).data('image');
                    /*appending to div*/
                    $(".contentPop").append('<div class="w3-col s3 m3 l3 compareItemParent relPos">' + '<ul class="product">' + '<li class="compHeader"><img height="150px" src="'+image+'" class="compareThumb"></li>' + '<li class="cpu">' + $(product).data('loai') + '</li>' + '<li class="cpu">' + $(product).data('cpu') + '<li class="cpu">' + $(product).data('hedieuhanh') + '</li>' + '<li class="cpu">' + $(product).data('manhinh') + '<li class="cpu">' + $(product).data('xuatxu') + '</li>' + '</ul>' + '</div>');
                
                }
            }
        }
        $(".modPos").show();
    });

    /* function to close the comparision popup */
    $(document).on('click', '.closeBtn', function () {
        $(".contentPop").empty();
        $(".comparePan").empty();
        $(".comparePanle").hide();
        $(".modPos").hide();
        $(".selectProduct").removeClass("selected");
        $(".cmprBtn").attr('disabled', '');
        list.length = 0;
        $(".rotateBtn").toggleClass("rotateBtn");
    });

    /*function to remove item from preview panel*/
    $(document).on('click', '.selectedItemCloseBtn', function () {

        var test = $(this).siblings("p").attr('id');
        $('[data-title=' + test + ']').find(".addToCompare").click();
        hideComparePanel();
    });

    function hideComparePanel() {
        if (!list.length) {
            $(".comparePan").empty();
            $(".comparePanle").hide();
        }
    }
})(jQuery);