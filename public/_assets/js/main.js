const setCssClassHidden = function (el) {
    el.classList.replace('visible', 'hidden');
};

const setCssClassVisible = function (el) {
    el.classList.replace('hidden', 'visible');
};

const getCookie = function (cname) {
    const name = cname + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
};

const setCookie = function (cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";Secure;path=/";
};

const getCookieMessageCookieName = function () {
    return 'cookieMessage';
};

const getCookieMessageCookieValueAccepted = function () {
    return 'accepted';
};

const getCookieMessageCookieValueNotAccepted = function () {
    return 'notAccepted';
};

const getCookieMessageCookie = function () {
    return getCookie(getCookieMessageCookieName());
};

const setCookieMessageCookieToAccepted = function () {
    setCookie(getCookieMessageCookieName(), getCookieMessageCookieValueAccepted(), 14)
};

const setCookieMessageCookieToNotAcceptedYet = function () {
    setCookie(getCookieMessageCookieName(), getCookieMessageCookieValueNotAccepted(), 14)
};

const displayCookieMessage = function () {
    [].forEach.call(document.querySelectorAll('.cookieMessage'), function (el) {
        setCssClassVisible(el);
    });
};

const closeCookieMessage = function () {
    [].forEach.call(document.querySelectorAll('.cookieMessage'), function (el) {
        setCssClassHidden(el);
    });
};

const closeCookieMessageAndSetCookieToAccepted = function () {
    setCookieMessageCookieToAccepted();
    closeCookieMessage();
};

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
            _setClosedToAll();
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

    const _setClosedToAll = function (el) {
        [].forEach.call(document.querySelectorAll('.open'), function (el) {
            _setClosed(el);
        });
    };

    const _getFlyoutWrapper = function(e) {
        return e.currentTarget.closest('.jsFlyoutWrapper');
    };

    [].forEach.call(document.querySelectorAll('.jsFlyoutTouchToggle'), function (el) {
        el.addEventListener('touchstart', toggleFlyout, {passive: true});
    });

    [].forEach.call(document.querySelectorAll('.jsFlyoutHoverToggle'), function (el) {
        el.addEventListener('mouseenter', openFlyout);
        el.addEventListener('mouseleave', closeFlyout);
    });

    const displayCookieMessageIfNeeded = function () {
        if (document.cookie.length === 0) {
            closeCookieMessage();
            return;
        }
        const cookieMessageFlag = getCookieMessageCookie();

        if (cookieMessageFlag !== getCookieMessageCookieValueAccepted()) {
            displayCookieMessage();
            return;
        }
        closeCookieMessage();
    };


    [].forEach.call(document.querySelectorAll('.closeMessage'), function (el) {
        el.addEventListener('click', closeCookieMessageAndSetCookieToAccepted);
    });

    displayCookieMessageIfNeeded();
});
