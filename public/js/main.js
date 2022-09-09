$(document).ready(function () {
    //  EVEN MENU RESPON
    $('html').on('click', function (event) {
        var target = $(event.target);
        var site = $('#site');

        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function () {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });

    //    MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function () {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
            $(this).parent('li').find('.sub-menu').slideUp();
        } else {
            $('.sub-menu').slideUp();
            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });
    //update cart ajax
    $('.num-order').click(function () {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = {
            id: id,
            qty: qty
        };
        
        $.ajax({
            method: "POST",
            url: "?mod=cart&act=ajax",
            data: data,
            dataType: "json",
            success: function (data) {
                // $("#sub-total-" + id).text(data.sub_total);
                // $("#total-price span").text(data.total);
                console.log(data);
            },
            error: function (xhr,ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});