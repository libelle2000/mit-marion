function ready(callbackFunc) {
    if (document.readyState !== 'loading') {
        // Document is already ready, call the callback directly
        callbackFunc();
    } else if (document.addEventListener) {
        // All modern browsers to register DOMContentLoaded
        document.addEventListener('DOMContentLoaded', callbackFunc);
    } else {
        // Old IE browsers
        document.attachEvent('onreadystatechange', function () {
            if (document.readyState === 'complete') {
                callbackFunc();
            }
        });
    }
}

ready(function () {

    const toggleFlyout = function (e) {
        if (e.currentTarget.classList.contains('open')) {
            closeFlyout(e);
        } else {
            openFlyout(e);
        }

        e.preventDefault();
    };

    const openFlyout = function(e) {
        e.currentTarget.classList.replace('closed', 'open');
        e.preventDefault();
    };

    const closeFlyout = function(e) {
        e.currentTarget.classList.replace('open', 'closed');
        e.preventDefault();
    };

    [].forEach.call(document.querySelectorAll('.jsFlyoutToggle'), function (el) {
        el.addEventListener('click', toggleFlyout)
    });
});
