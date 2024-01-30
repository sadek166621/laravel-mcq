@extends('superadmin.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Teacher List</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('superadmin.teacher.add') }}" class="btn btn-info float-right">Add New</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <form action="" class="form-inline mb-2">
              <div class="form-group mx-sm-3 mb-2">
                <select name="department" id="department" class="form-control">
                  <option value="">--Select Department--</option>
                  @foreach ($departments as $department)
                    @isset($_GET['department'])
                      <option value="{{ $department->id }}" @if($_GET['department'] == $department->id) selected @endif>{{ $department->name }}</option>
                    @else
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endisset
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Desigantion</th>
                  <th>Join Date</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($teachers) > 0)
                  @foreach ($teachers as $key => $teacher)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $teacher->name }}</td>
                      <td>{{ $teacher->department->name }}</td>
                      <td>{{ $teacher->designation }}</td>
                      <td>{{ $teacher->join_date }}</td>
                      <td>{{ $teacher->phone }}</td>
                      <td>{{ $teacher->email }}</td>
                      <td>
                        <img src="{{ asset('assets') }}/images/uploads/teachers/{{ $teacher->image }}" alt="Teacher image" width="100px" height="100px">
                      </td>
                      <td>
                        @if ($teacher->status == 1)
                          <span class="badge bg-success">Active</span>
                        @else
                          <span class="badge bg-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('superadmin.teacher.edit', $teacher->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('superadmin.teacher.delete', $teacher->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="10" class="text-center">No teacher found</td>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
