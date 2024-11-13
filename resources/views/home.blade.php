<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCM Device Token</title>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"></script>
</head>

<body>
    <h1>Firebase Device Token</h1>
    <button id="get-token-btn">Get Device Token</button>
    <p id="token"></p>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCzGJmWi6Iaywtai_skfwyf-f_yShg-tnM",
            authDomain: "anonymous-12318.firebaseapp.com",
            projectId: "anonymous-12318",
            storageBucket: "anonymous-12318.appspot.com",
            messagingSenderId: "967559900359",
            appId: "1:967559900359:web:7fbba5b122b544a3d8a2e2",
        };
        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();

        document.getElementById('get-token-btn').onclick = async function () {
            try {
                const token = await messaging.getToken({ vapidKey: "BJycZhwa2usY52shwCXfABdl7huPYrJZgF9MTbPGeiD4d_uOzTFQ21kb9ZTzJx0XlCkaNeuz_fhO9WBM2TXHbFI" });
                document.getElementById('token').innerText = token;
            } catch (error) {
                console.error("Error getting token:", error);
            }
        };

        messaging.onMessage((payload) => {
            console.log("Message received: ", payload);
            // Optionally, show notification in the UI
        });
    </script>
</body>

</html>