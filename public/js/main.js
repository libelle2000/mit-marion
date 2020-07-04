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
        const flyoutWrapper = _getFlyoutWrapper(e);
        if (flyoutWrapper.classList.contains('open')) {
            _setClosed(flyoutWrapper);
        } else {
            _setOpen(flyoutWrapper);
        }

        e.preventDefault();
        e.stopPropagation();
    };

    const openFlyout = function (e) {
        const flyoutWrapper = _getFlyoutWrapper(e);
        _setOpen(flyoutWrapper);
        e.preventDefault();
        e.stopPropagation();
    };

    const closeFlyout = function (e) {
        const flyoutWrapper = _getFlyoutWrapper(e);
        _setClosed(flyoutWrapper);
        e.preventDefault();
        e.stopPropagation();
    };

    const _setOpen = function (el) {
        el.classList.replace('closed', 'open');
    };

    const _setClosed = function (el) {
        el.classList.replace('open', 'closed');
    };

    const _getFlyoutWrapper = function(e) {
        return e.currentTarget.closest('.jsFlyoutWrapper');
    };

    [].forEach.call(document.querySelectorAll('.jsFlyoutClickToggle'), function (el) {
        el.addEventListener('click', toggleFlyout);
    });

    [].forEach.call(document.querySelectorAll('.jsFlyoutHoverToggle'), function (el) {
        el.addEventListener('mouseenter', openFlyout);
        el.addEventListener('mouseleave', closeFlyout);
    });
});
