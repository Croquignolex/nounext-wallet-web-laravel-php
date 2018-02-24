$(window).on('load', function () {
    $(".loader").fadeOut();
});

function notification(notificationTitle, notificationMessage, notificationType, notificationIcon, notificationEnter, notificationExit, notificationDelay){
    $.notify({
        icon: notificationIcon,
        title: '<strong>' + notificationTitle + '</strong><br />',
        message: notificationMessage
    },{
        type: notificationType,
        delay: notificationDelay,
        animate: {
            enter: 'animated ' + notificationEnter,
            exit: 'animated ' + notificationExit
        },
        placement: {
            from: 'top',
            align: 'center'
        }
    });
}