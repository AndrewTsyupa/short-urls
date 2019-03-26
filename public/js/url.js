

$(document).on('click', '.action-button', function () {
    var element = $(this);
    $.ajax({
        url: '/url',
        dataType: 'html',
        cache: false,
        data: {
            url: $('.url').val()
        },
        success: function (data) {

        }
    })
});
