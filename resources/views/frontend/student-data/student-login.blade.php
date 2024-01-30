@extends('frontend.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Join us as a Student</h1>
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
                <form action="{{ route('student-registration-form-submit') }}" method="Post" class="row g-3" enctype="multipart/form-data" id="student-form">
                    @csrf
                    <div class="col-md-12">
                        <label for="studentname" class="form-label fw-bold fw-bold">Full Name</label>
                        <input name="first_name" type="text" class="form-control" id="studentname" placeholder="Enter Your Full Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="fathername" class="form-label fw-bold">Father's Name</label>
                        <input name="father_name" type="text" class="form-control" id="fathername" placeholder="Enter Your Father's Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="mothername" class="form-label fw-bold">Mother's Name</label>
                        <input name="mother_name" type="text" class="form-control" id="mothername" placeholder="Enter Your Mother's Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="guardiannumber" class="form-label fw-bold">Guardian Number</label>
                        <input name="guardian_number" type="number" class="form-control" id="guardiannumber" placeholder="Enter Your Guardian Number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label fw-bold">City Name</label>
                        <input name="village" type="text" class="form-control" id="city" placeholder="Enter Your City Name" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fw-bold">Full Address</label>
                        <input name="address" type="text" class="form-control" id="inputAddress" placeholder="Enter Your Full Address" required>
                    </div>
                    <div class="col-md-6">
                        <label for="class" class="form-label fw-bold">Class</label>
                        <select  class="form-select" id="class_id" name="class_id">
                          <option selected>Select Class</option>
                          @foreach ($classes as $class )
                          <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subjects</label><br>
                            <input type="checkbox" class="form-check-input" id="selectAll"> Select All
                            <div id="subject-checkboxes">

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label fw-bold">Which School/College Do You Study ?</label>
                        <input name="fwshgs" type="text" class="form-control" id="inputAddress" placeholder="Enter Your School or College Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="number" class="form-label fw-bold">Phone Number</label>
                        <input name="phone" type="number" class="form-control" id="number" placeholder="Enter Your Number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fw-bold">Email</label>
                        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Enter Your Email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fw-bold">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="********" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fw-bold">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputPassword4" placeholder="********" required>
                    </div>
                    <div class="col-md-6">
                        <label for="formFile" class="form-label fw-bold">Student Image</label>
                        <input class="form-control" name="image" type="file" id="formFile" placeholder="Upload Image" required>
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

@push('js')
<script>
    $(document).ready(function () {
        // Update subjects when the class selection changes
        $('#class_id').on('change', function () {
            var classId = $(this).val();
            updateSubjects(classId);
            // alert();
        });

        // Check/uncheck all checkboxes when the "Select All" checkbox is clicked
        $('#selectAll').on('change', function () {
            // alert();
            $('.subject-checkbox').prop('checked', $(this).prop('checked'));
        });
    });

    function updateSubjects(classId) {
        var url = "{{ route('frontendgetSubjectsByClass', 'classId') }}";
        url = url.replace("classId", classId);
        //alert(url);
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                var checkboxesHtml = '';

                response.forEach(function (subject) {
                    checkboxesHtml += `
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input subject-checkbox" id="subject_${subject.id}" name="subject_id[]" value="${subject.id}">
                            <label class="form-check-label" for="subject_${subject.id}">${subject.subject_name}</label>
                        </div>
                    `;
                });

                $('#subject-checkboxes').html(checkboxesHtml);
            },
            error: function (error) {
                console.error('Error fetching subjects:', error);
            }
        });
    }
</script>
@endpush
