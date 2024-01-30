<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>myTEACHERS</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('subject') }}" class="nav-item nav-link">Subjects</a>
            <a href="{{ route('notes') }}" class="nav-item nav-link">Notes</a>
            <a href="{{ route('team') }}" class="nav-item nav-link">Our Team</a>
            <a href="{{ route('testimonial') }}" class="nav-item nav-link">Testimonial</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Log In</a>
                <div class="dropdown-menu fade-down m-0">
                    {{-- <a href="{{ url('/login') }}" class="dropdown-item">Student Login</a> --}}
                    @if(auth()->check())
                    <a href="{{ url('/student/dashboard') }}" class="dropdown-item">Dashboard</a>
                    @else
                    <a href="{{ url('/login') }}" class="dropdown-item">Student Login</a>
                    @endif
                    <a href="{{ url('/teacher/login') }}" class="dropdown-item">Teacher Login</a>
                </div>
            </div>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
        </div>
        <div class="nav-item dropdown d-block d-lg-none">
            <a href="#" class="nav-link py-4 mx-2 mobile-join-btn" data-bs-toggle="dropdown">Join Now <i
                    class="fa fa-arrow-right ms-3"></i></a>
            <div class="dropdown-menu fade-down m-0">
                <a href="{{ route('student-login') }}" class="dropdown-item">As a Student <i class="fa fa-arrow-right ms-3"></i></a>
                <hr>
                <a href="{{ route('teacher-registration') }}" class="dropdown-item">As a Teacher <i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
        <div class="nav-item dropdown d-none d-lg-block">
            <a href="#" class="btn btn-primary py-4 px-5 nav-link " data-bs-toggle="dropdown">Join Now <i
                    class="fa fa-arrow-right ms-3"></i></a>
            <div class="dropdown-menu fade-down m-0">
                <a href="{{ route('student-login') }}" class="dropdown-item">As a Student <i class="fa fa-arrow-right ms-3"></i></a>
                <hr>
                <a href="{{ route('teacher-registration') }}" class="dropdown-item">As a Teacher <i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
</nav>
