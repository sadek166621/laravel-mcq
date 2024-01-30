<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Classess;
use App\Models\Admin\Subject;
use App\Models\Admin\Studentsub;
use App\Models\Admin\Student;
use App\Models\Admin\Department;
use App\Models\Admin\Teacher;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Hash;
use Toastr;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  ===============================All Pages Route Are Here================
    public function index()
    {
       return view('frontend.home.index');
    }

    public function about(){

        return view('frontend.about.about');
    }
    public function subject(){

        return view('frontend.subject.subject');
    }
    public function notes(){

        return view('frontend.notes.notes');
    }
    public function team(){

        return view('frontend.team.team');
    }
    public function testimonial(){

        return view('frontend.testimonial.testimonial');
    }
    public function contact(){

        return view('frontend.contact.contact');
    }
// =======================End=================================


    // ===============================Student Registration============================

    public function studentlogin(){
        $data['classes'] =Classess::latest()->get();
        return view('frontend.student-data.student-login',$data);
    }

    public function getSubjectsByClass($classId)
    {
        $subjects = Subject::where('classess_id', $classId)->get();
        return response()->json($subjects);
    }
    public function studentregistrationformsubmit(Request $request){
        $validated = $request->validate([
            'first_name' => 'required',
            'image' => 'required',
            'guardian_number' => 'required|min:11|max:15',
            'phone' => 'required|min:11|max:15',
            'email' => 'required|unique:students',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|',
        ]);
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
                'status' => '0',
               ]);

            $student->user_id = $user->id;
            $student->status = 0;
            $student->save();

            Toastr::success('Please Wait For Admin Approvement!', 'Registration Done', ["positionClass" => "toast-top-right"]);
            return back();

    }

    // ========================End Student Registration==========================


// ==========================Teacher Registration===========================
    public function teacherregistration(){
        $data['departments'] = Department::where('status',1)->latest()->get();
        return view('frontend.Applied-teacher.teacher-data',$data);
    }

    public function teacherregsubmit(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'image' => 'required',
            'phone' => 'required|min:11|max:15',
            'email' => 'required|unique:teachers',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $image = $request->file('image');
        if($image){
            $currentDate = Carbon::now()->toDateString();
            //dd($image->getClientOriginalExtension());

            $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/images/uploads/teachers')) {
                mkdir('assets/images/uploads/teachers', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/teachers'), $imageName);
            // $image->move(base_path().'/assets/images/uploads/teachers', $imageName);

            $image = $imageName;
        }

        $teacher = Teacher::create([
            'name' => $request->name,
            'username' => Str::slug($request->name).Str::random(6),
            'department_id' => $request->department_id,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'edu_qualification' => $request->edu_qualification,
            'experience' => $request->experience,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_show' => $request->password,
            'widyiap' => $request->widyiap,
            'address' => $request->address,
            'image' => $image,
            'status' => '0',
        ]);

        $superadmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $superadmin->status = 0;
        $superadmin->save();

        $teacher->user_id = $superadmin->id;
        $teacher->save();
        
        Toastr::success('Please Wait For Admin Approvement!', 'Registration Done', ["positionClass" => "toast-top-right"]);
        return back();


    }

// ============================End Teacher Registration==========================

}
