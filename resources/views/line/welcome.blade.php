<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIFF - LINE Front-end Framework</title>
    <style>
        body { margin: 16px }
        img {width: 40% ; align-items: center}
        button { padding: 16px; align-items: center}
    </style>
</head>
<body>

<img id="pictureUrl">
<p id="userid"></p>
<p id="name"></p>

<button id="btnLogIn" onclick="logIn()" class="background:green;color:white;">Log In</button>
<button id="btnLogOut" onclick="logOut()" class="background:green ;color:white;">Log Out</button>
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script>
    function logOut() {
        liff.logout()
        window.location.reload()
    }
    function logIn() {
        liff.login({ redirectUri: window.location.href })
    }
    async function getUserProfile() {
        const profile = await liff.getProfile()
        document.getElementById("pictureUrl").style.display = "block"
        document.getElementById("pictureUrl").src = profile.pictureUrl
        document.getElementById("userid").innerHTML = "<b>userId:</b> " + profile.userId
        document.getElementById("name").innerHTML = "<b>displayName:</b> " + profile.displayName
    }
    async function main() {
        await liff.init({ liffId: "1657528860-bRBEB7dK" })
        if (liff.isInClient()) {
            getUserProfile()
        } else {
            if (liff.isLoggedIn()) {
                getUserProfile()
                document.getElementById("btnLogIn").style.display = "none"
                document.getElementById("btnLogOut").style.display = "block"
            } else {
                document.getElementById("btnLogIn").style.display = "block"
                document.getElementById("btnLogOut").style.display = "none"
            }
        }
    }
    main()
</script>
</body>
</html>
