<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<!-- admin container  -->
@auth('admin')
<div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                   
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('issued-books.index') }}">Issued Books</a>
                        </li>

                        <div class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>

                        </div>

                   
               
</ul>



</div>
</div>
@endauth
<!-- admin container ends here  -->

<!-- student container  -->


   
@auth('student')

<div class="container">
            <a class="navbar-brand" href="{{ route('student.dashboard') }}">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.books.index') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.issued-books.index') }}">My Books</a>
                        </li>



              
                </ul>

                
                <ul class="navbar-nav ms-auto">

<li class="nav-item">
    <a class="nav-link" href="{{ route('student.profile') }}">Profile</a>
</li>
<li class="nav-item">
    <form action="{{ route('student.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-link">Logout</button>
    </form>
</li>

</ul>

            

</div>
</div>
@endauth
<!-- student container ends here  -->

<!-- guest continer  -->

   
@guest

<div class="container">
            <a class="navbar-brand" href="#">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.login') }}">Student Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.register') }}">Student Register</a>
                        </li>
              
                </ul>

</div>
</div>
@endguest


<!-- guest end here  -->




        <div class="container d-none">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('issued-books.index') }}">Issued Books</a>
                        </li>
                    @endauth
                    
                    @auth('student')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.books.index') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.issued-books.index') }}">My Books</a>
                        </li>

                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                    
                    @auth('student')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('student.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.login') }}">Student Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.register') }}">Student Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
     
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>