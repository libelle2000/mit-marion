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
        e.stopPropagation();
    };

    const openFlyout = function(e) {
        e.currentTarget.classList.replace('closed', 'open');
    };

    const closeFlyout = function(e) {
        e.currentTarget.classList.replace('open', 'closed');
    };

    const toggleFlyoutDelegate = function(e) {
        e.currentTarget.closest('.jsFlyoutToggle').click()
        e.preventDefault();
        e.stopPropagation();
    };

    [].forEach.call(document.querySelectorAll('.jsFlyoutToggle'), function (el) {
        el.addEventListener('click', toggleFlyout)
    });

    [].forEach.call(document.querySelectorAll('.jsFlyoutToggleDelegate'), function (el) {
        el.addEventListener('click', toggleFlyoutDelegate)
    });
});
