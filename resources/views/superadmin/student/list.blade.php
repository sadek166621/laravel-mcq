@extends('superadmin.master')
@section('content')
{{-- <style>
    .card-body{
        background-color: white;
    }
</style> --}}
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Student List</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('superadmin.student.add') }}" class="btn btn-info float-right">Add New</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card" id="invoice_wrapper">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{-- <form action="{{ route('superadmin.student.list') }}" method="get" class="form-inline mb-2">
                        <div class="form-group mx-sm-3 mb-2">
                            <select name="devision" class="form-control" required>
                                <option value="">--Select Group--</option>

                                    <option value="1" @isset($student) @if($student->devision == 1) selected @endif @endisset>Science</option>
                                    <option value="2" @isset($student) @if($student->devision == 2) selected @endif @endisset>Commnerce</option>
                                    <option value="3"@isset($student) @if($student->devision == 3) selected @endif @endisset>Arts</option>
                                    <option value="4"@isset($student) @if($student->devision == 4) selected @endif @endisset>Others</option>

                           </select>

                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                           <select name="session" class="form-control" required>
                            <option value="">--Select Session--</option>

                                <option value="1" @isset($student) @if($student->session == 1) selected @endif @endisset>19-20</option>
                                <option value="2" @isset($student) @if($student->session == 2) selected @endif @endisset>20-21</option>
                                <option value="3"@isset($student) @if($student->session == 3) selected @endif @endisset>21-22</option>
                                <option value="4"@isset($student) @if($student->session == 4) selected @endif @endisset>22-23</option>
                                <option value="5"@isset($student) @if($student->session == 5) selected @endif @endisset>23-24</option>
                                <option value="6"@isset($student) @if($student->session == 6) selected @endif @endisset>24-25</option>
                                <option value="7"@isset($student) @if($student->session == 7) selected @endif @endisset>25-26</option>
                                <option value="8"@isset($student) @if($student->session == 8) selected @endif @endisset>26-27</option>
                                <option value="9"@isset($student) @if($student->session == 9) selected @endif @endisset>27-28</option>
                                <option value="10"@isset($student) @if($student->session == 10) selected @endif @endisset>28-29</option>
                                <option value="11"@isset($student) @if($student->session == 11) selected @endif @endisset>29-30</option>
                                <option value="12"@isset($student) @if($student->session == 12) selected @endif @endisset>30-31</option>
                                <option value="13"@isset($student) @if($student->session == 13) selected @endif @endisset>31-32</option>
                                <option value="14"@isset($student) @if($student->session == 14) selected @endif @endisset>32-33</option>
                                <option value="15"@isset($student) @if($student->session == 15) selected @endif @endisset>33-34</option>
                                <option value="16"@isset($student) @if($student->session == 16) selected @endif @endisset>34-35</option>
                                <option value="17"@isset($student) @if($student->session == 17) selected @endif @endisset>35-36</option>
                                <option value="18"@isset($student) @if($student->session == 18) selected @endif @endisset>36-37</option>
                                <option value="19"@isset($student) @if($student->session == 19) selected @endif @endisset>37-38</option>
                                <option value="20"@isset($student) @if($student->session == 20) selected @endif @endisset>38-39</option>
                                <option value="21"@isset($student) @if($student->session == 21) selected @endif @endisset>40-41</option>

                       </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>

                      </form> --}}
                </div>
                {{-- <div class="col-md-6">
                    <a id="invoice_download_btn" class="btn btn-success" style="float: right">
                        Download
                    </a>
                </div> --}}
            </div>

            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Student Name</th>
                  <th>Father's name & Mother's name</th>
                  <th>Guardian & Student Mobile Number</th>
                  <th>Which School?College Do You Read </th>
                  <th>Reg</th>
                  <th>Full Address</th>
                  <th>Picture</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($students) > 0)
                  @foreach ($students as $key => $student)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $student->first_name }}</td>
                     <td>{{ $student->father_name }} <br> {{ $student->mother_name }}</td>
                      <td>{{ $student->guardian_number }} <br> {{ $student->phone }}</td>
                      <td>{{ $student->fwshgs }}</td>
                       <td>{{ $student->reg_num }}</td>
                      <td>{{ $student->address }}</td>
                      <td>
                        <img src="{{ asset('assets') }}/images/uploads/students/{{$student->image}}" alt="student image" width="100px" height="100px">
                      </td>
                      <td>
                        @if ($student->status == 1)
                          <span class="badge bg-success">Active</span>
                        @else
                          <span class="badge bg-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('superadmin.student.edit', $student->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('superadmin.student.delete', $student->id) }}" onclick="if(!confirm('Are You Sure?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="10" class="text-center">No student found</td>
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
<script src="{{asset('assets-frontend/js/vendor/modernizr-3.6.0.min.js ') }}"></script>
<script src="{{asset('assets-frontend/js/vendor/jquery-3.6.0.min.js ') }}"></script>
   <!-- Invoice JS -->
   <script src="{{asset('assets-frontend')}}/js/invoice/jspdf.min.js"></script>
   <script src="{{asset('assets-frontend')}}/js/invoice/invoice.js"></script>

@endpush
