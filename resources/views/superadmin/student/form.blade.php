@extends('superadmin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        @isset($student)
        <h1>Update New Student</h1>
          @else
          <h1>Add New Student</h1>
          @endisset

      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="@isset($student){{ route('superadmin.student.update', $student->id) }}@else{{ route('superadmin.student.store') }}@endisset"method="post" enctype="multipart/form-data" id="student-form">
            @csrf
            <div class="card-body">
              <div class="col-sm-12">
                <div class="col-sm-12" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" @isset($student) value="{{ $student->first_name }}" @endisset required>
                  </div>
                </div>
                {{-- <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" @isset($student) value="{{$student->last_name}}" @endisset required>
                  </div>
                </div> --}}
              </div>

              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Father's Name</label>
                <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" placeholder="Enter father's Name" @isset($student) value="{{ $student->father_name }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mother's Name</label>
                    <input type="text" name="mother_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Mother's Name" @isset($student) value="{{ $student->mother_name }}" @endisset required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Guardian Number</label>
                <input type="number" name="guardian_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Guardian Number" @isset($student) value="{{ $student->guardian_number }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Village</label>
                    <input type="text" name="village" class="form-control" id="exampleInputEmail1" placeholder="Enter village" @isset($student) value="{{ $student->village }}" @endisset required>
                  </div>
                </div>
              </div>

            <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <select class="form-control" id="class_id" name="class_id">
                        <option value="">select Class</option>
                       @foreach ($classes as $class )
                        <option value="{{ $class->id }}" @isset($student){{ $student->class_id ==  $class->id ? 'selected': ' ' }} @endisset>{{ $class->class_name }}</option>
                       @endforeach
                        <!-- Add other class options dynamically based on your data -->
                    </select>
                  </div>
                </div>
                 <div class="col-sm-6" style="float: left">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subject</label><br>
                        <input type="checkbox" id="selectAll"> Select All
                        <div id="subject-checkboxes">
                            @isset($student)
                                @foreach ($student->class->subjects as $subject )
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input subject-checkbox" @if(in_array($subject->id,$sids)) checked @endif  name="subject_id[]" value="{{ $subject->id }}">
                                        <label class="form-check-label">{{$subject->subject_name}}</label>
                                    </div>
                                @endforeach
                            @endisset

                            {{-- @isset($substudents)
                            @foreach ($substudents as $stsubject )
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input subject-checkbox" checked  name="subject_id[]" value="{{ $stsubject->id }}">
                                <label class="form-check-label">{{$stsubject->subject_name}}</label>
                            </div>
                            @endforeach
                            @endisset --}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-12" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Which School/College Do You Read?</label>
                    <input type="text" name="fwshgs" class="form-control" id="exampleInputEmail1" placeholder="Which School/College Do You Read" @isset($student) value="{{ $student->fwshgs }}" @endisset required>
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" @isset($student) value="{{ $student->phone }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                    <div class="form-group">
                        <label for="exampleInputFile">@isset($student) Change student Image @else Choose student Image @endisset</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="form-control" @isset($student) @else required @endisset>
                          </div>
                        </div>
                        @isset($student) <img src="{{ asset('assets') }}/images/uploads/students/{{ $student->image }}" alt="student image" width="100px" height="100px"><br/> @endisset
                      </div>
                </div>
            </div>
            {{-- <div class="col-sm-12"> --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" @isset($student) value="{{ $student->email }}" @endisset >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Address</label>
                    {{-- <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" @isset($student) value="{{ $student->phone }}" @endisset required> --}}
                    <textarea class="form-control" placeholder="Enter address" name="address" required>
                        @isset($student) {{ $student->address }} @endisset
                    </textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($student) @if($student->status == 1) checked @endif @else checked @endisset>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
            {{-- </div> --}}
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


<!-- /.content -->
@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

{{-- <script>
    $(document).ready(function () {
        // Update subjects when the class selection changes
        $('#class_id').on('change', function () {
            var classId = $(this).val();
            updateSubjects(classId);
        });

        $('#selectAll').on('change', function () {
            $('.subject-checkbox').prop('checked', $(this).prop('checked'));
        });
    });

    function updateSubjects(classId) {
        // alert(classId);
        $.ajax({
            url: 'getSubjectsByClass/' + classId,
            type: 'GET',
            success: function (response) {

                // console.log(response);

                var checkboxesHtml = '';

                response.forEach(function (subject) {
                    // alert(subject);
                    console.log(subject);

                    checkboxesHtml += `
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="subject_${subject.id}" name="subjects[]" value="${subject.id}">
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
</script> --}}
<script>
    $(document).ready(function () {
        // Update subjects when the class selection changes
        $('#class_id').on('change', function () {
            var classId = $(this).val();
            updateSubjects(classId);
        });

        // Check/uncheck all checkboxes when the "Select All" checkbox is clicked
        $('#selectAll').on('change', function () {
            $('.subject-checkbox').prop('checked', $(this).prop('checked'));
        });
    });

    function updateSubjects(classId) {
        var url = "{{ route('superadmin.student.getSubjectsByClass', 'classId') }}";
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
