<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('asset/css/Dashboard/superadmin.css') }}">

    <!-- External Ionicons for icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <!-- Welcome Message -->
    <div class="welcome-message">
        <h1>Welcome to Your Admin Dashboard!</h1>
    </div>

    <!-- Dashboard Info Section -->
    <div class="dashboard-info">
        <div class="card">
            <h3>120</h3>
            <p>Users</p>
        </div>
        <div class="card">
            <h3>75</h3>
            <p>Orders</p>
        </div>
        <div class="card">
            <h3>50</h3>
            <p>Messages</p>
        </div>
    </div>

    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="logo-google"></ion-icon></span>
                    <span class="title">Admin Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                    <span class="title">Customers</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                    <span class="title">Messages</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                    <span class="title">Help</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <span class="title">Password</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Signout</span>
                </a>
            </li>
        </ul>
        <div class="toggle">
        </div>
    </div>

    <!-- JavaScript to toggle navigation -->
    <script>
        let navigation = document.querySelector('.navigation');
        let toggle = document.querySelector('.toggle');
        toggle.onclick = function() {
            navigation.classList.toggle('active');
        }
    </script>

</body>

</html>
