@extends('superadmin.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Subject</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>
<style>
    .select2-container .select2-selection--single {
    height: 38px !important;
}
</style>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('superadmin.class.update',$classes->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <input type="text" name="class_name" value="{{ $classes->class_name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Class name" required>
                </div>
                <div id="input-container">
                    <input type="hidden" id="subject-count" value="{{ count($classes->subjects) }}">
                    <div class="form-group input-container" id="subject-add">
                        <button class="btn btn-success" onclick="addInputField()">+</button>
                        @foreach ($classes->subjects as $key => $subject)
                            <div class="row" id="row-{{ $key }}">
                                <div class="col-md-5">
                                    <label for="subject_name{{ $key+1 }}">Subject</label>
                                    <input type="text" name="subject_name[]" value="{{ $subject->subject_name }}" class="form-control" id="subject_name{{ $key+1 }}" placeholder="Enter Subject name" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="teacher{{ $key+1 }}">Teacher</label>
                                    <select class="form-control js-example-basic-multiple" id="teacher{{ $key+1 }}" name="teacher_id_{{ $key }}[]" multiple="multiple" required>
                                        @foreach ($teachers as $teacher )
                                            <option value="{{ $teacher->id }}" @if(in_array($teacher->id,$tids[$key])) selected @endif>{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <br><button class="btn btn-danger" style="position: relative;top: 7px;" onclick="deleteSubject({{ $key }})">-</button>
                                </div>
                            </div>
                        @endforeach
                        {{-- {{dd($subteachers)}} --}}

                    </div>

                    <div class="form-group input-container" id="batch-add">
                        <input type="hidden" id="batch-count" value="{{ count($batches) }}">
                        <button class="btn btn-success" onclick="addBatch()">+</button>
                        @foreach ($batches as $key=> $batch )
                        <div class="row" id="row2-{{ $key }}">
                            <div class="col-md-5">
                                <label for="subject_name1">Batch Name</label>
                                <input type="text" name="batch_name[]" value="{{ $batch->batch_name }}" class="form-control" placeholder="Enter Batch name" >
                            </div>
                            <div class="col-md-5">
                                <label for="teacher1">Teacher</label>
                                <select class="form-control js-example-basic-single" name="batch_teacher_id[]" required>
                                    @foreach ( $teachers as $teacher )
                                    <option value="{{ $teacher->id }}" {{ $batch->batch_teacher_id ==  $teacher->id ? 'selected': ' ' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 col-sm-12">
                            <br>
                            <button class="btn btn-danger" style="position: relative;top: 7px;" onclick="deleteBatch({{$key}})">-</button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($class) @if($class->status == 1) checked @endif @else checked @endisset>
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
@push('js')

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    function loadSelect2(){
        $('.js-example-basic-multiple').select2();
    }
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    });
    function selectbatchload(){
        $('.js-example-basic-single').select2();
    }

</script>
<script>
    function addInputField() {
        var count = parseInt($('#subject-count').val()) + 1;
        var html = `<div class="row" id="row-${count}">
                        <div class="col-md-5 col-sm-12">
                            <label for="subject_name${count}">Subject</label>
                            <input type="text" name="subject_name[]" class="form-control" id="subject_name${count}" placeholder="Enter Subject name" required>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <label for="teacher${count}">Teacher</label>
                            <select class="form-control js-example-basic-multiple" id="teacher${count}" name="teacher_id_${count-1}[]" multiple="multiple" required>
                                @foreach ( $teachers as $teacher )
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <br><button class="btn btn-danger" style="position: relative;top: 7px;" onclick="deleteSubject(${count})">-</button>
                        </div>
                    </div>`;

        $('#subject-add').append(html);
        loadSelect2();
        $('#subject-count').val(count);
    }

    function deleteSubject(rowId) {
        // alert('ok');
        $('#row-' + rowId).remove();
    }
  </script>
  <script>



   function addBatch() {
    var batchcount = parseInt($('#batch-count').val()) + 1;
    var html = `<div class="row" id="row-${batchcount}">
                    <div class="col-md-5 col-sm-12">
                        <label>batch_name</label>
                        <input type="text" name="batch_name[]" class="form-control" placeholder="Enter Batch name" required>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <label>Teacher</label>
                        <select class="form-control js-example-basic-single" name="batch_teacher_id[]" required>
                            @foreach ( $teachers as $teacher )
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <br><button class="btn btn-danger" style="position: relative;top: 7px;" onclick="deleteBatch(${batchcount})">-</button>
                    </div>
                </div>`;

    $('#batch-add').append(html);
    selectbatchload();
    $('#batch-count').val(batchcount);
}

function deleteBatch(rowId) {
        $('#row2-' + rowId).remove();
    }
  </script>



@endpush
