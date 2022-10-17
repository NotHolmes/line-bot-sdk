<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIFF - LINE Front-end Framework</title>
    <style>
        body { margin: 16px }
        button, img { display: none; width: 40% ; align-items: center}
        button { padding: 16px; align-items: center}
        * {
            text-align: center;
        }

    </style>
</head>
<body>

<p>liff login</p>

<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script>
    function logOut() {
        liff.logout()
        window.location.reload()
    }
    function logIn() {
        liff.login({ redirectUri: window.location.href })
    }

    async function main() {
        await liff.init({ liffId: "1657528860-bRBEB7dK" })
        if (liff.isInClient()) {
            getUserProfile()
        } else {
            if (liff.isLoggedIn()) {

            } else {
                logIn()
            }
        }

        window.close();
    }
    main()
</script>
</body>
</html>
