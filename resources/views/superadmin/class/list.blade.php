@extends('superadmin.master')
@section('content')

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Class List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>

                  <div class="card-tools">
                        <a class="btn btn-info btn-sm" href="{{ route('superadmin.class.add') }}">Add new</a>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                {{-- <th>DOB</th> --}}
                                {{-- <th>Exam</th>
                                <th>Exam Date</th>
                                <th>Result</th> --}}
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($classes as $key=>$class)
                              <tr>
                                  <td>{{ $key+1}}</td>
                                  <td>{{ $class->class_name}}</td>

                                  </td>
                                  <td>
                                    @if ($class->status == 1)
                                      <span class="badge bg-success">Active</span>
                                    @else
                                      <span class="badge bg-danger">Inactive</span>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="{{ route('superadmin.class.edit', $class->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('superadmin.class.delete', $class->id) }}" onclick="if(!confirm('Are You Sure?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                  </td>
                              </tr>
                          @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-header -->

    <!-- Modal -->
    <style>
      .select2-selection {
    width: 464px;

    }
    </style>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="" method="" class="database_operation">
            @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Class</label>

                            <input type="text" required="required" name="class" placeholder="Enter Class" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div id="input-container">
                        <div class="form-group input-container">
                            {{-- <label for="">Enter Subject</label> --}}
                            <div class="row">
                                {{-- {{-- <div class="col-sm-10"> --}}
                                    {{-- <input type="text" name="subject_name[]" class="form-control" placeholder="Enter Subject">
                                </div> --}}
                                <div class="col-sm-2">
                                    <button class="btn btn-success" onclick="addInputField()">+</button>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div id="input-select-containner">
                        <div class="form-group input-select-containner">
                            {{-- <label for="exampleInputEmail1">Enter Teacher</label> --}}
                            {{-- <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="">Select</option>
                            </select> --}}
                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Select DOB</label>
                            <input type="date" required="required" name="dob"  class="form-control">
                        </div>
                    </div> --}}
                    <div class="col-sm-12">
                        {{-- <div class="form-group">
                            <label for="">Select exam</label>
                            <select class="form-control" required="required" name="exam">
                                <option value="">Select</option>
                                {{-- @foreach ($exams as $exam)
                                    <option value="{{ $exam['id']}}">{{ $exam['title']}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="col-sm-12">
                        {{-- <div class="form-group">
                            <label for="">password</label>
                            <input type="password" required="required" name="password" placeholder="Enter password" class="form-control">
                        </div> --}}
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary">Add</button>


                        </div>
                    </div>
                </div>
            </form>
      </div>

    </div>
    {{-- </div> --}}

@endsection
@push('js')
<script>
    function addInputField() {
      // Create a new input field
      var newInput = document.createElement('div');
      newInput.className = 'input-container';
      newInput.innerHTML = '<div class="col-sm-10"><input type="text" name="subject_name[]" class="form-control" placeholder="Enter Subject"> <br> </div>';

      // Append the new input field to the container
      document.getElementById('input-container').appendChild(newInput);

      var newselect = document.createElement('div');
      newselect.className = 'input-select-containner';
      newselect.innerHTML = '<select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple"><option value="">Select</option></select> <br>';

      document.getElementById('input-select-containner').appendChild(newselect);


    }
  </script>
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush
