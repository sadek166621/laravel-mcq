@extends('superadmin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Site Settings</h1>
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
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('superadmin.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Site Name</label>
                <input type="text" name="site_name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{ $setting->site_name }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Site Title</label>
                <input type="text" name="site_title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{ $setting->site_title }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Sub Tagline</label>
                <input type="text" name="site_tagline" class="form-control" id="exampleInputEmail1" placeholder="Enter subtitle" value="{{ $setting->site_tagline }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contact No</label>
                <input type="text" name="site_contact_no" class="form-control" id="exampleInputEmail1" placeholder="Enter button link" value="{{ $setting->site_contact_no }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="site_email" class="form-control" id="exampleInputEmail1" placeholder="Enter button text" value="{{ $setting->site_email }}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea name="site_address" id="address" cols="30" rows="10" class="form-control">{{ $setting->site_address }}</textarea>
              </div>
              <div class="form-group">
                <label for="google_map_link">Google map link (Embedded Link)</label>
                <input type="text" name="google_map_link" class="form-control" id="google_map_link" placeholder="Enter google map link" value="{{ $setting->google_map_link }}">
              </div>
              <div class="form-group">
                <label for="youtube_video_left_link">Youtube video left link (Embedded Link)</label>
                <input type="text" name="youtube_video_left_link" class="form-control" id="youtube_video_left_link" placeholder="Enter youtube video left link" value="{{ $setting->youtube_video_left_link }}">
              </div>
              <div class="form-group">
                <label for="youtube_video_right_link">Youtube video right link (Embedded Link)</label>
                <input type="text" name="youtube_video_right_link" class="form-control" id="youtube_video_right_link" placeholder="Enter youtube video right link" value="{{ $setting->youtube_video_right_link }}">
              </div>
              <div class="form-group">
                @if($setting->site_logo) <img src="{{ asset('assets') }}/images/uploads/settings/{{ $setting->site_logo }}" alt="Site logo" width="70px"><br/> @endif
                <label for="exampleInputFile">Change Logo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="site_logo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                @if($setting->site_icon) <img src="{{ asset('assets') }}/images/uploads/settings/{{ $setting->site_icon }}" alt="Site fav icon" width="70px"><br/> @endif
                <label for="exampleInputFile">Change Fav Icon</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="site_icon" class="form-control">
                  </div>
                </div>
              </div>
              <p></p>

              

            </div>





            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Save Changes</button>
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
     $(document).ready(function () {
        $('#address').summernote();

        $('#vice_principal_message').summernote();
        $('#vice_principal_bio').summernote();
        $('#contact').summernote();

        $('#principal_message').summernote();
        $('#principal_bio').summernote();
     });
</script>
@endpush
