function set_alert( class_name = 'success', message='all rights') {
    let bgColor = (class_name === 'success') ? '#28a745' : 
                  (class_name === 'error') ? '#dc3545' : 
                  (class_name === 'warning') ? '#ffc107' : '#6c757d';

    $("<div class='cart-toast'>" + message + "</div>")
        .css({
            "background": bgColor
        })
        .appendTo("body")
        .fadeIn()
        .delay(2000)
        .fadeOut(function () {
            $(this).remove();
        });
}
