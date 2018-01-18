$(document).ready(function () {

    // Write your custom Javascript codes here...

});
$(document).on('click', '.btn-modal', function (e) {
    e.preventDefault();
    var action = $(this).data('action');
    var modal_class = $(this).data('modalclass');
    if (modal_class !== undefined) {
        $('#pModal').find('.modal-dialog').addClass(modal_class);
    }

    var header = action == 'create' ? 'Добавить ' + text : 'Редактировать ' + text;
    $('#pModal').modal('show')
        .find('.modal-header h2').text(header).parent().parent()
        .find('.modal-body')
        .load($(this).attr('href'));
    setTimeout(function () {
        $(document).find('#redirect-url').val(window.location);
    }, 200);
});

$('.btn-type-action').click(function (e) {
    e.preventDefault();
    $('.btn-type-action').removeClass('btn-primary').addClass('btn-default');
    $(this).addClass('btn-primary').removeClass('btn-default');
    var qwe = this;
    $.pjax.reload({
        container: '#tickets-pjax',
        url: $(qwe).attr('href')
    });
});

$(document).on('click', '.delete-ajax', function (e) {
    var qwe = this;
    e.preventDefault();
    var r = confirm('Удалить эту заявку? Действие будет необратимо.');
    if (r == true) {
        performAjaxAction(this);
    }
});
$(document).on('click', '.execute-ajax', function (e) {
    e.preventDefault();
    var r = confirm('Принять эту заявку к исполнению?');
    if (r == true) {
        performAjaxAction(this);
    }
});

function performAjaxAction(qwe) {
    $.ajax({
        method: 'POST',
        url: $(qwe).attr('href'),
        success: function () {
            $.pjax.reload({
                container: '#tickets-pjax'
            });
        }
    })
}

$(function () {
    var timerId = setInterval(function () {
        $.pjax.reload({
            container: '#tickets-pjax',
        });
    }, 10000);
});