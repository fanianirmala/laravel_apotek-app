<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengelolaan Surat App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b9635da605.js" crossorigin="anonymous"></script>
    <style>
        *,
        ::after,
        ::before {
            ,
            box-sizing: border-box;
        }

        body {
            font-size: 0.875rem;
            opacity: 1;
            overflow-y: scroll;
            margin: 0;
        }

        a {
            cursor: pointer;
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        .wrapper {
            align-items: stretch;
            display: flex;
            width: 100%;
        }

        #sidebar {
            max-width: 264px;
            min-width: 264px;
            background: var(--bs-primary);
            transition: all 0.35s ease-in-out;
        }

        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            width: 100%;
            background: var(--bs-light-bg-subtle);
        }

        .sidebar-logo {
            padding: 1.15rem;
        }

        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.15rem;
            font-weight: 600;
        }

        .sidebar-nav {
            flex-grow: 1;
            list-style: none;
            margin-bottom: 0;
            padding-left: 0;
            margin-left: 0;
        }

        .sidebar-header {
            color: #e9ecef;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #e9ecef;
            position: relative;
            display: block;
            font-size: 0.875rem;
        }

        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        #sidebar.collapsed {
            margin-left: -264px;
        }

        .avatar {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .navbar-expand .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#" class="text-light">Pengelolaan Surat</a>
                </div>
                @if (Auth::check())
                    @if (Auth::user()->role == 'staff')
                        <ul class="sidebar-nav">
                            <li class="sidebar-item">
                                <a href="{{ route('home.page') }}" class="sidebar-link text-light">
                                    <i class="bi bi-grid"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed text-light" data-bs-target="#pages"
                                    data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-clipboard-data"></i>
                                    Data User
                                </a>
                                <ul id="pages" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="{{ route('staff.index') }}" class="sidebar-link text-light"> • Data
                                            Staff Tata Usaha</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('guru.index') }}" class="sidebar-link text-light"> • Data
                                            Guru</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('user.index') }}" class="sidebar-link text-light"> • Data
                                            User</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed text-light" data-bs-target="#pages"
                                    data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-clipboard-data"></i>
                                    Data Surat
                                </a>
                                <ul id="pages" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="{{ route('klasifikasi.index') }}" class="sidebar-link text-light"> •
                                            Data Klasifikasi Surat</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('surat.index') }}" class="sidebar-link text-light"> • Data
                                            Surat</a>
                                    </li>
                                </ul>
                            </li>
                            <form action="#" method="POST">
                                <button type="button" class="dropdown-item">
                                    <a href="{{ route('logout') }}" class="sidebar-link collapsed text-light"><i
                                            class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </a>
                                </button>
                            </form>
                        @else
                            <li class="sidebar-item">
                                <a href="{{ route('home.page') }}" class="sidebar-link text-light">
                                    <i class="bi bi-grid"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed text-light" data-bs-target="#pages"
                                    data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-clipboard-data"></i>
                                    Data Surat
                                </a>
                                <ul id="pages" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="{{ route('surat.index') }}" class="sidebar-link text-light"> • Data
                                            Surat</a>
                                    </li>
                                </ul>
                            </li>
                            <form action="#" method="POST">
                                <button type="button" class="dropdown-item">
                                    <a href="{{ route('logout') }}" class="sidebar-link collapsed text-light"><i
                                            class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </a>
                                </button>
                            </form>
                    @endif
                @endif
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav">
                    @auth
                        <p class="sidebar-link collapsed mt-3" style="color: black"><i class="bi bi-person"
                                style="font-size: 15px; color: black"></i>
                            {{ Auth::user()->role }}
                        </p>
                    @else
                        <a href="{{ route('login') }}" class="sidebar-link collapsed" style="color: black"><i
                                class="bi bi-box-arrow-in-right" style="font-size: 15px; color: black"></i>
                            Login
                        </a>
                    @endauth
                </ul>
            </nav>
            <main class="content px-3 py-2">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        const sidebarToggle = document.querySelector('#sidebar-toggle');
        sidebarToggle.addEventListener('click', function() {
            document.querySelector('#sidebar').classList.toggle('collapsed');
        });

        new DataTable('#table');
    </script>
</body>

</html>
