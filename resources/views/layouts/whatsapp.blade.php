<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wozzap</title>

    <style>
        .whatsapp-help {
            position: fixed;
            bottom: 20px;
            /* Adjust as needed for spacing from the bottom */
            right: 20px;
            /* Adjust as needed for spacing from the right */
            z-index: 1000;
            /* Ensure it stays on top of other content */
            text-align: center;
            font-family: sans-serif;
            /* Or your preferred font */
        }

        .whatsapp-help p {
            margin-bottom: 5px;
            /* Space between text and icon */
            font-size: 14px;
            /* Adjust font size as needed */
            color: #333;
            /* Adjust text color as needed */
        }

        .whatsapp-help a img {
            width: 50px;
            /* Adjust icon size as needed */
            height: auto;
            display: block;
        }

        @media (max-width: 600px) {
            .whatsapp-help a img {
                width: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="whatsapp-help">
        <p>Need Help?</p>
        <a href="https://wa.me/254737444066" target="_blank">
            <img src="{{ asset('images/whatsapp.webp') }}" alt="WhatsApp Chat">
        </a>
    </div>

</body>

</html>