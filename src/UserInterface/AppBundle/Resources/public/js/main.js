/**
 * Created by rafalglazar on 06.03.2015.
 */

$(document).ajaxSend(function (event, request, settings) {
    var loader = $('#loading-indicator');
    var wh = $(window).height();
    var ph = loader.outerHeight();
    var mt = (wh / 2) - (ph / 2);
    var ww = $(window).width();
    var pw = loader.outerWidth();
    var ml = (ww / 2) - (pw / 2);
    loader.css('top', mt + 'px');
    loader.css('left', ml + 'px');
    $('#loading-indicator-background').show();
    loader.show();
});

$(document).ajaxComplete(function (event, request, settings) {
    $('#loading-indicator').hide();
    $('#loading-indicator-background').hide();
});

$(document).on('click', '.select-all', function () {
    if ($(this).is(':checked')) {
        $('.ids').prop('checked', true);
    } else {
        $('.ids').prop('checked', false);
    }
});

$(document).on('click', '.ids', function () {
    var count = $('.ids').length;
    var checked = 0;
    $('.ids').each(function () {
        if ($(this).is(':checked')) {
            checked++;
        }
    });
    if (count == checked) {
        $('.select-all').prop('checked', true);
    } else {
        $('.select-all').prop('checked', false);
    }
});

$(document).on('click', '.btn-delete', function () {
    $('#confirm-delete').find('.btn-ok-delete').attr('href', $(this).data('href'));
});

$(document).on('click', '.btn-ok-delete', function (event) {
    event.preventDefault();

    $(this).parent().parent().parent().parent().modal('hide');

    var url = $(this).attr('href');
    $.ajax({
        type: 'post',
        url: url,
        success: function (response) {
            window.location.reload();
        }
    });
});

$(document).on('click', '.btn-ok', function (event) {
    event.preventDefault();

    var url = $(this).attr('href');
    $.ajax({
        type: 'post',
        url: url,
        success: function (response) {
            window.location.reload();
        }
    });
});
