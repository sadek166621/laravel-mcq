@extends('layouts.student')
@section('title','Student dashboard')
@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">

            {{-- @php
                dd($portal_exams)
            @endphp --}}
          @foreach ($portal_exams as $key=>$exam)

          <?php

              if(strtotime(date('Y-m-d')) > strtotime($exam['exam_date']))
              {
                  $cls="bg-danger";
              }
              else
              {
                  $val=$key+1;
                  if($val%2==0)
                      $cls="bg-info";
                  else
                      $cls="bg-success";
              }



          ?>
          <div class="col-lg-6 col-sm-12">
              <div class="small-box <?php echo $cls; ?>">
                  <div class="inner">
                  <h3>{{ $exam['title']}}</h3>

                  {{-- <p>{{ $exam['cat_name']}}</p> --}}
                  <p>Exam date : {{ $exam['exam_date'].' '.$exam['exam_time'] }}</p>
                  <p>Duration : {{ $exam['exam_duration'] }} minutes</p>
                  </div>
                  <div class="icon">
                  <i class="ion ion-bag"></i>
                  </div>
                    @if (strtotime(date('Y-m-d')) >= strtotime($exam['exam_date']))

                        @php
                            $times = explode(':', $exam['exam_time']);
                            $total_seconds = time() - strtotime($exam['exam_date'].' '.$exam['exam_time'].':00');
                        @endphp

                        {{-- <a data-id="{{ $exam['id']}}"  class="apply_exam small-box-footer">Join<i class="fas fa-arrow-circle-right"></i></a> --}}
                        @if (getUserExamByid($exam['id'])== true)
                        <a href="#"  class="small-box-footer">You Are Already Joined<i class=""></i></a>
                        @else
                            @if(strtotime(date('H:i')) >= strtotime($exam['exam_time']))
                                @if($total_seconds <= ($exam['exam_duration']*60))
                                    <a href="{{ route('student.apply_exam', $exam['id']) }}"  class="small-box-footer">{{ getUserExamByid($exam['id'])== true ? 'Joined': 'Join' }}<i class="fas fa-arrow-circle-right"></i></a>
                                @else
                                    <span class="small-box-footer">Time Up!</span>
                                @endif
                            @elseif($times[0]<date('H'))
                                <span class="small-box-footer">Time Up!</span>
                            @endif
                        @endif

                        {{-- <span>Time left: {{ $times[0].'-'.date('H').'---'.$total_seconds }}</span> --}}
                        {{-- <a href="{{ route('student.apply_exam', $exam['id']) }}"  class="small-box-footer">{{ getUserExamByid($exam['id'])== true ? 'Joined': 'Join' }}<i class="fas fa-arrow-circle-right"></i></a> --}}
                    @endif

              </div>
          </div>
      @endforeach

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection
