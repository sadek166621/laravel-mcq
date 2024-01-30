@extends('superadmin.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Subject List</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('superadmin.subject.add') }}" class="btn btn-info float-right">Add New</a>
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($subjects) > 0)
                  @foreach ($subjects as $key => $subject)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $subject->name }}</td>
                      <td>
                        @if ($subject->status == 1)
                          <span class="badge bg-success">Active</span>
                        @else
                          <span class="badge bg-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('superadmin.subject.edit', $subject->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('superadmin.subject.delete', $subject->id) }}" onclick="if(!confirm('Are You Sure?')){return false}"  class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="8" class="text-center">No subject found</td>
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
@push('js')
<script>
    function confirmDelete() {
        // Display a confirmation dialog
        var result = confirm("Are you sure you want to delete?");
        if (result) {
            // Perform the delete operation or redirect to the delete route
            // Example: window.location.href = '/delete';
            alert("Deleted!");
        } else {
            // The user clicked "Cancel" or closed the dialog
            alert("Deletion canceled!");
        }
    }
</script>
@endpush
