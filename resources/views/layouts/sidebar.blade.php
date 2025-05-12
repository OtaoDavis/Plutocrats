<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        #adminSidebar {
            background-color: #b48f20;
            color: white;
            width: 250px;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            position: fixed;
            /* Keep sidebar fixed on scroll */
            top: 0;
            left: 0;
            height: 100vh;
            /* Make it take full viewport height */
            z-index: 100;
            /* Ensure it's above other content */
        }

        #adminSidebar img {
            margin-top: 20px;
            /* Adjust margin from the top */
            height: auto;
            max-width: 150px;
            /* Ensure image doesn't overflow */
        }

        #adminSidebar h4 {
            margin-top: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        #adminSidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
            margin-bottom: 20px;
            /* Add some space before logout */
        }

        #adminSidebar ul li a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
        }

        #adminSidebar ul li a:hover {
            color: #fff;
            background-color: #1A374D;
            cursor: pointer;
        }

        #adminSidebar .logout-link {
            width: 100%;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
            /* Push to the bottom */
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            /* Subtle separator */
            border-bottom-right-radius: 20px;
        }

        #adminSidebar .logout-link button {
            background: none;
            color: #fff;
            border: none;
            padding: 15px 0;
            margin: 0;
            font-weight: inherit;
            font-size: inherit;
            text-decoration: none;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #adminSidebar .logout-link button:hover {
            background-color: #1A374D;
        }
    </style>
</head>

<body>
    <div id="adminSidebar">
        <img src="{{ asset('images/ico_full.svg') }}" alt="Plutocrats Travel">
        <h4>{{ Auth::user()->name }}</h4>
        <ul>
            <li><a href="{{ route('admin_bookings') }}">Bookings</a></li>
        </ul>
        <div class="logout-link">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>

</html>