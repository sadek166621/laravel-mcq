@extends('frontend.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Join us as a Teacher</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Register Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row d-flex flex-column-reverse flex-lg-row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form
                    with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're
                    done. <a href="#">Download Now</a>.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">House-7, Road 6, Bosila Rd, Dhaka-1207</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">+88 01700 000000</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h5>Include Your Information</h5>
                <form action="{{ route('teacher-reg-submit') }}" method="post" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <div class="col-md-12">
                        <label for="studentname" class="form-label fw-bold fw-bold">Full Name</label>
                        <input name="name" type="text" class="form-control" id="studentname"
                            placeholder="Enter Your Full Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="department" class="form-label fw-bold">Department</label>
                        <select id="department" class="form-select" name="department_id" required>
                            <option selected>Select Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="desigantion" class="form-label fw-bold">Designation</label>
                        <input name="designation" type="text" class="form-control" id="designation"
                            placeholder="Enter Your Designation" required>
                    </div>

                    <div class="col-md-6">
                        <label for="number" class="form-label fw-bold">Phone Number</label>
                        <input name="phone" type="number" class="form-control" id="number"
                            placeholder="Enter Your Phone Number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fw-bold">Email</label>
                        <input name="email" type="email" class="form-control" id="inputEmail4"
                            placeholder="Enter Your Email" required>
                    </div>
                    <div class="col-12">
                        <label for="education" class="form-label fw-bold">Educational Qualification</label>
                        <textarea name="edu_qualification" type="text" class="form-control" id="education"
                            placeholder="Enter Your Educational Qualification" required></textarea>
                    </div>
                    <div class="col-12">
                        <label for="experience" class="form-label fw-bold">Experience</label>
                        <textarea name="experience" type="text" class="form-control" id="experience"
                            placeholder="Enter Your Experience" required></textarea>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fw-bold">Which Institution Do You Involve At Present
                            ?</label>
                        <input name="widyiap" type="text" class="form-control" id="inputAddress"
                            placeholder="Enter School, College or University Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fw-bold">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword4"
                            placeholder="********" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fw-bold">Confirm Password</label>
                        <input name="confirm_password" type="password" class="form-control" id="inputPassword4"
                            placeholder="********" required>
                    </div>
                    <div class="col-md-6">
                        <label for="formFile" class="form-label fw-bold">Image</label>
                        <input class="form-control" name="image" type="file" id="formFile" placeholder="Upload Image"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fw-bold">Full Address</label>
                        <input name="address" type="text" class="form-control" id="inputAddress"
                            placeholder="Enter Your Full Address" required>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                By clicking submit, I agree that my all information is true.
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register End -->
@endsection
