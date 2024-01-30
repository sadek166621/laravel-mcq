<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Student;
use App\Models\Admin\Subject;
use App\Models\Admin\Studentsub;
use App\Models\Admin\Classess;
use App\Models\User;
// use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request){
    // {  if(isset($_GET['session']) && $_GET['session']>0){
    //     $data['students'] = Student::where('devision', $request->devision)->where('session',$request->session)->latest()->get();
    //     }
        // else{
            // $data['students'] = Student::where('status',1)->latest()->get();
            $data['students'] = Student::where('status',1)->latest()->get();
        // }
        return view('superadmin.student.list', $data);
    }

    public function applystudent(){

            $data['students'] = Student::where('status',0)->latest()->get();

        return view('superadmin.student.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['subjects'] =Subject::where('status',1)->latest()->get();
        $data['classes'] =Classess::latest()->get();
        return view('superadmin.student.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validated = $request->validate([
            'first_name' => 'required',
            'image' => 'required',
            'email' => 'required|unique:students',
            'password' => 'required|min:8',
        ]);

        if (!$request->status || $request->status == NULL) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }


        $image = $request->file('image');
        if($image){
            $currentDate = Carbon::now()->toDateString();
            //dd($image->getClientOriginalExtension());

            $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/images/uploads/students')) {
                mkdir('assets/images/uploads/students', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/students'), $imageName);
            // $image->move(base_path().'/assets/images/uploads/students', $imageName);

            $image = $imageName;
        }


            $student = Student::create([
                'first_name' => $request->first_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'guardian_number' => $request->guardian_number,
                'village' => $request->village,
                'reg_num' => rand(00000,99999),
                'phone' => $request->phone,
                'class_id' => $request->class_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fwshgs' => $request->fwshgs,
                'image' => $image,
                'status' => $request->status,
                'address' => $request->address,
            ]);

               if($request->subject_id){
                foreach($request->subject_id as $subject){
                    $tropic = new Studentsub();
                    $tropic->student_id = $student->id;
                    $tropic->subject_id = $subject;
                    $tropic->save();
                }
               }

               $user = User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
               ]);

            $student->user_id = $user->id;
            $student->save();



        // Toastr::success('student added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('superadmin.student.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['student'] = Student::findOrFail($id);
        // $data['groups'] =Group::where('status',1)->latest()->get();
        $data['classes'] =Classess::latest()->get();
        $data['subjects'] = Subject::where('status',1)->latest()->get();

        $data['substudents'] = DB::table('studentsubs')
        ->join('subjects', 'subjects.id', '=', 'studentsubs.subject_id')
        ->select('subjects.*')
        ->where('studentsubs.student_id', $id)
        ->get();

        $sids = array();
        $student = $data['student'];
        foreach($student->subjects as $subject){
            array_push($sids, $subject->subject_id);
        }
        $data['sids'] = $sids;

        if($data['student']){
            return view('superadmin.student.form', $data);
        }

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $student = Student::find($id);

       DB::table('studentsubs')->where('student_id', $id)->delete();

        if($student){

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $target_image = $student->image;
            $image = $request->file('image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                //dd($image->getClientOriginalExtension());

                $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!file_exists('assets/images/uploads/students')) {
                    mkdir('assets/images/uploads/students', 0777, true);
                }

                $image->move(public_path('assets/images/uploads/students'), $imageName);
                // $image->move(base_path().'/assets/images/uploads/students', $imageName);

                $target_image = $imageName;
            }


            $student->update([
                'first_name' => $request->first_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'guardian_number' => $request->guardian_number,
                'village' => $request->village,
                'phone' => $request->phone,
                'class_id' => $request->class_id,
                'email' => $request->email,
                'fwshgs' => $request->fwshgs,
                'image' => $target_image,
                'status' => $request->status,
                'address' => $request->address,
            ]);

            if($request->password){
                $student->password = Hash::make($request->password);
                $student->save();
            }

            if($request->subject_id){
                foreach($request->subject_id as $subject){
                    $tropic = new Studentsub();
                    $tropic->student_id = $student->id;
                    $tropic->subject_id = $subject;
                    $tropic->save();
                }
               }

               $user = DB::table('users')->where('id', $student->user_id)->update(['status' => $request->status]);
            //    dd($user);
            //    $user->update([
            //     'status' => $request->status,
            //    ]);





            // Toastr::success('student updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('superadmin.student.list');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $userstudent= Student::where('id',$id)->first();
        DB::table('users')->where('id', $userstudent->user_id)->delete();
        DB::table('studentsubs')->where('student_id',$id)->delete();
        if($student){
            // DB::table('results')->where('student_id', $id)->delete();
            $student->delete();
            // Toastr::success('student deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        }

        return back();
    }

    public function getSubjectsByClass($classId)
    {
        $subjects = Subject::where('classess_id', $classId)->get();
        return response()->json($subjects);
    }

}
