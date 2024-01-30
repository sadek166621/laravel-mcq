@extends('superadmin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Teacher</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <!-- /.card-header -->
          <!-- form start -->
          <form action="@isset($teacher){{ route('superadmin.teacher.update', $teacher->id) }}@else{{ route('superadmin.teacher.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" @isset($teacher) value="{{ $teacher->name }}" @endisset required>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="department_id">Department</label>
                    <select class="form-control" name="department_id" id="department_id" required>
                      <option value="">--Select Department--</option>
                      @foreach ($departments as $department)
                        @isset($teacher)
                          <option value="{{ $department->id }}" @if($teacher->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                        @else
                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endisset
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desigantion</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter designation" @isset($teacher) value="{{ $teacher->designation }}" @endisset required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Join Date</label>
                    <input type="date" name="join_date" class="form-control" id="exampleInputEmail1" placeholder="Enter join date" @isset($teacher) value="{{ $teacher->join_date }}" @endisset >
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone no" @isset($teacher) value="{{ $teacher->phone }}" @endisset required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Educational Qualification</label>
                    <textarea type="text" name="edu_qualification" class="form-control" id="exampleInputEmail1" placeholder="Enter Educational Qualification"  required> @isset($teacher){{ $teacher->edu_qualification }}@endisset </textarea>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Experience</label>
                    <textarea type="text" name="experience" class="form-control" id="exampleInputEmail1" placeholder="Enter Experience"  required> @isset($teacher) {{ $teacher->experience }} @endisset </textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" @isset($teacher) value="{{ $teacher->email }}" @endisset >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" @isset($teacher) value="{{ $teacher->password_show }}" @endisset >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" @isset($teacher) value="{{ $teacher->password_show }}" @endisset>
              </div>
              <div class="form-group">
                @isset($teacher) <img src="{{ asset('assets') }}/images/uploads/teachers/{{ $teacher->image }}" alt="Teacher image" width="100px" height="100px"><br/> @endisset
                <label for="exampleInputFile">@isset($teacher) Change Teacher Image @else Choose Teacher Image @endisset</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="form-control" @isset($teacher) @else required @endisset>
                  </div>
                </div>
              </div>

              <div class="form-check">
                <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($teacher) @if($teacher->status == 1) checked @endif @else checked @endisset>
                <label class="form-check-label" for="exampleCheck1">Active</label>
              </div>
            </div>
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
