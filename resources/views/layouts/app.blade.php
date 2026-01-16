<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Home</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #FFC107; /* yellow background */
        }
        .btn-report {
            background-color: #dc3545; /* red */
            color: white;
            font-weight: bold;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🐾 Paw Home</a>
            <a href="/report" class="btn btn-report ms-2">REPORT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link fw-bold" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="/adopt">Adopt</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="/volunteer">Volunteer</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="#">Adoption Tips</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="/rehome">Rehome</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="#">Aboutus</a></li>
                </ul>
                <a href="/register" class="btn btn-primary ms-3">Sign Up</a>
               
                <a href="/login" class="btn btn-primary ms-3">login</a>
       <form method="POST" action="{{ route('logout') }}" style="display:inline">
    @csrf
    <button type="submit" style="background:none;border:none;color:blue;cursor:pointer">
        Logout
    </button>
</form>




            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="fw-bold">For Donors</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Donate</a></li>
                        <li><a href="#">How to Help</a></li>
                        <li><a href="#">Previous Donations</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">For Volunteers</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Join Us</a></li>
                        <li><a href="#">Training</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">For Community</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
