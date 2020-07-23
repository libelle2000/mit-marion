ready(function () {
    const setCookieMessageCookieIfNeeded = function () {
        const cookieMessageFlag = getCookieMessageCookie();
        if (cookieMessageFlag === getCookieMessageCookieValueAccepted()) {
            return;
        }
        if (cookieMessageFlag === getCookieMessageCookieValueNotAccepted()) {
            return;
        }
        setCookieMessageCookieToNotAcceptedYet()
        displayCookieMessage();
    };

    setCookieMessageCookieIfNeeded();
});
