<nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets') }}/images/uploads/settings/{{ getSetting()->site_icon }}" alt="" style="height: 50px;width:233px" class="elevation-3" style="opacity: .8">
        </a>
        <a href="{{ url('/') }}" style="color: #06BBCC;">
            <i class="fa fa-home" aria-hidden="true" style="font-size: 22px;position: relative;right: 10px;"></i>
        </a>

        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="mr-auto navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
             <ul class="ml-auto navbar-nav">
                <!-- Authentication Links -->


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Back To Home</a>
                        </li>




            </ul>
        </div> --}}
    </div>
</nav>
