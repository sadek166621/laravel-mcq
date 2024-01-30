<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Oex_student;
use App\Models\Oex_exam_master;
use App\Models\Oex_question_master;
use App\Models\Oex_result;
use App\Models\User;
use App\Models\user_exam;
use App\Models\Admin\Student;
use App\Models\Admin\Studentsub;
use Auth;

class StudentOperation extends Controller
{
    //student dashboard
    public function dashboard(){
        // dd( Auth::id());

        $student= Student::where('user_id', Auth::id())->first();
        $std= Studentsub::where('student_id', $student->id)->get();
        $exam = Oex_exam_master::all();
        $array = array();
        // $collection = collect([
        //     // 'std' =>
        // ]);
        foreach($std as $subject){
            foreach($exam as $q){
                if($subject->subject_id == $q->subject_id){
                    array_push($array, $q);
                }
            }
        //     dd($subject);
        //  $subbss=Oex_exam_master::select(['oex_exam_masters.*','oex_categories.name as cat_name'])
        // ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
        // ->orderBy('id','desc')->where('oex_exam_masters.status','1')->where('subject_id',$subject->subject_id);
        }
        // dd($array);
        $data['portal_exams'] = $array;

        return view('student.dashboard',$data);
    }


    //Exam page
    public function exam(){


            // $student_info = user_exam::select(['user_exams.*','users.name','oex_exam_masters.title','oex_exam_masters.exam_date'])
            // ->join('users','users.id','=','user_exams.user_id')
            // ->join('oex_exam_masters','user_exams.exam_id','=','oex_exam_masters.id')->orderBy('user_exams.exam_id','desc')
            // ->where('user_exams.user_id',Session::get('id'))
            // ->where('user_exams.std_status','1')
            // ->get()->toArray();



            $student= Student::where('user_id', Auth::id())->first();
            $std= Studentsub::where('student_id', $student->id)->get();
            // $exam = Oex_exam_master::all();
            $exam = Oex_exam_master::select(['user_exams.*','oex_exam_masters.*'])
            ->join('user_exams','user_exams.exam_id','=','oex_exam_masters.id')
            ->where('user_exams.user_id',Session::get('id'))
            ->where('user_exams.std_status','1')
            ->get();
            $array = array();
            foreach($std as $subject){
                foreach($exam as $q){
                    if($subject->subject_id == $q->subject_id){
                        array_push($array, $q);
                    }
                }
            }
            $student_info = $array;

            return view('student.exam',['student_info'=>$student_info]);

    }


    //join exam page
    public function join_exam($id){

        // if(session()->has('exam_time')){
        //     dd(session()->get('exam_time'));
        // }

        $question= Oex_question_master::where('exam_id',$id)->get();
        $exam=Oex_exam_master::where('id',$id)->get()->first();

        $total_seconds = time() - strtotime($exam['exam_date'].' '.$exam['exam_time'].':00');
        $exam_seconds = $exam['exam_duration']*60;
        $exam_seconds = $exam_seconds - $total_seconds;

        if($exam_seconds<=0){
            $std_info = user_exam::where('user_id',Session::get('id'))->where('exam_id',$id)->get()->first();
            $std_info->exam_joined=1;
            $std_info->update();
            return redirect()->route('student.exam');
        }

        return view('student.join_exam',['question'=>$question,'exam'=>$exam]);
    }



    //On submit
    public function submit_questions(Request $request){


        $yes_ans=0;
        $no_ans=0;
        $data= $request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++){

            if(isset($data['question'.$i])){
                    $q=Oex_question_master::where('id',$data['question'.$i])->get()->first();

                    if($q->ans==$data['ans'.$i]){
                        $result[$data['question'.$i]]='YES';
                        $yes_ans++;
                    }else{
                        $result[$data['question'.$i]]='NO';
                        $no_ans++;
                    }
            }
        }

       $std_info = user_exam::where('user_id',Session::get('id'))->where('exam_id',$request->exam_id)->get()->first();
       $std_info->exam_joined=1;
       $std_info->update();


       $res = new Oex_result();
       $res->exam_id=$request->exam_id;
       $res->user_id = Session::get('id');
       $res->yes_ans=$yes_ans;
       $res->no_ans=$no_ans;
       $res->result_json=json_encode($result);

       echo $res->save();
       return redirect(url('student/exam'));
    }



    //Applying for exam
    public function apply_exam($id){
            //dd($id);
            $checkuser = user_exam::where('user_id',Session::get('id'))->where('exam_id',$id)->get()->first();

            if($checkuser){
                $arr = array('status'=>'false','message'=>'Already applied, see your exam section');
            }
            else
            {
                $exam_user = new user_exam();
                $exam_user->user_id= Session::get('id');
                $exam_user->exam_id=$id;
                $exam_user->std_status=1;
                $exam_user->exam_joined=0;
                $exam_user->save();

                $arr = array('status'=>'true','message'=>'applied successfully','reload'=>url('student/dashboard'));
            }

            //dd('ok');

            return redirect()->route('student.join_exam', $id);

            //echo json_encode($arr);

    }


    //View Result
    public function view_result($id){

            $data['result_info'] = Oex_result::where('exam_id',$id)->where('user_id',Session::get('id'))->get()->first();

            $data['student_info'] = User::where('id',Session::get('id'))->get()->first();

            $data['exam_info']=Oex_exam_master::where('id',$id)->get()->first();

            return view('student.view_result',$data);
    }


    //View answer
    public function view_answer($id){

        $data['question']= Oex_question_master::where('exam_id',$id)->get()->toArray();

        return view('student.view_amswer',$data);
    }


    public function save_time($time){
        Session::put('exam_time', $time);
    }

    public function end_time_session(){
        Session::forget('exam_time');
    }

}
