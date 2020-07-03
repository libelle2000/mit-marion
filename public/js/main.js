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
        const flyoutWrapper = e.currentTarget.closest('.jsFlyoutWrapper');
        if (flyoutWrapper.classList.contains('open')) {
            closeFlyout(flyoutWrapper);
        } else {
            openFlyout(flyoutWrapper);
        }

        e.preventDefault();
        e.stopPropagation();
    };

    const openFlyout = function (el) {
        el.classList.replace('closed', 'open');
    };

    const closeFlyout = function (el) {
        el.classList.replace('open', 'closed');
    };

    [].forEach.call(document.querySelectorAll('.jsFlyoutToggle'), function (el) {
        el.addEventListener('click', toggleFlyout)
    });
});
