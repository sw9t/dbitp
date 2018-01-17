$(document).ready(function () {

    // Write your custom Javascript codes here...

});
$('.btn-modal').click(function (e) {
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
});