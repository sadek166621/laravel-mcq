<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;
use App\Models\Admin\Classess;
use App\Models\Admin\Subject;
use App\Models\Admin\SubTeacher;
use App\Models\Admin\ClassSubject;
use App\Models\Admin\Batch;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Hash;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data['classes'] = Classess::latest()->get();
        return view('superadmin.class.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['teachers'] =Teacher::where('status',1)->latest()->get();
        return view('superadmin.class.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // dd($request);
                $validated = $request->validate([
                    'class_name' => 'required',
                ]);

                if (!$request->status || $request->status == NULL) {
                    $request->status = 0;
                } else {
                    $request->status = 1;
                }

                $class = Classess::create([
                    'class_name' => $request->class_name,
                ]);



                if($request->subject_name){
                    for($i=0; $i < count($request->subject_name); $i++){
                        $sub = new Subject();
                        $sub->subject_name = $request->subject_name[$i];
                        $sub->classess_id = $class->id;
                        $sub->save();

                        // $classSub = new ClassSubject();
                        // $classSub->class_id = $class->id;
                        // $classSub->subject_id = $sub->id;
                        // $classSub->save();

                        $teacher = "teacher_id_".$i;

                        for($j=0; $j < count($request->$teacher); $j++){
                            $subteacher = new SubTeacher();
                            $subteacher->class_id = $class->id;
                            $subteacher->subject_id = $sub->id;
                            $subteacher->teacher_id = $request->$teacher[$j];
                            $subteacher->save();
                        }

                    }

                    foreach ($request->batch_name as $key => $batchName) {
                        $batch = new Batch();
                        $batch->class_id = $class->id;
                        $batch->batch_name = $batchName;
                        $batch->batch_teacher_id = $request->batch_teacher_id[$key];
                        $batch->save();
                    }
                }


        // Toastr::success('student added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('superadmin.class.list');

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
        $data['teachers'] = Teacher::where('status',1)->latest()->get();
        $data['classes'] = Classess::find($id);
        // $data['subjects'] = DB::table('class_subjects')
        //     ->join('subjects', 'subjects.id', '=', 'class_subjects.sub_id')
        //     ->select('subjects.*')
        //     ->where('class_subjects.class_id',$id)
        //     ->get();

        //$subject =ClassSubject::where('class_id',$id)->first();
        //$data['subteachers'] = SubTeacher::where('sub_id',$subject->sub_id)->get();

        $class = $data['classes'];
        $tids = array();
        foreach($class->subjects as $key => $subject){
            $teacherIds = array();
            foreach($subject->sub_teachers as $teacher){
                array_push($teacherIds, $teacher->teacher_id);
            }
            array_push($tids, $teacherIds);
        }

        $data['tids'] = $tids;


         $data['batches'] = Batch::where('class_id',$id)->get();



        return view('superadmin.class.edit',$data);
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
        $class = Classess::find($id);

        foreach($class->subjects as $key => $subject){
            // dd($subject);
            DB::table('sub_teachers')->where('subject_id', $subject->id)->delete();
        }
        DB::table('subjects')->where('classess_id', $id)->delete();

        DB::table('batches')->where('class_id', $id)->delete();


        $class->update([
            'class_name' => $request->class_name,
        ]);

        if($request->subject_name){
            for($i=0; $i < count($request->subject_name); $i++){
                $sub = new Subject();
                $sub->subject_name = $request->subject_name[$i];
                $sub->classess_id = $id;
                $sub->save();

                $teacher = "teacher_id_".$i;

                for($j=0; $j < count($request->$teacher); $j++){
                    $subteacher = new SubTeacher();
                    $subteacher->subject_id = $sub->id;
                    $subteacher->teacher_id = $request->$teacher[$j];
                    $subteacher->save();
                }

            }
        }
        foreach ($request->batch_name as $key => $batchName) {
                $batch = new Batch();
                $batch->class_id = $class->id;
                $batch->batch_name = $batchName;
                $batch->batch_teacher_id = $request->batch_teacher_id[$key];
                $batch->save();
        }

        return redirect()->route('superadmin.class.list');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classess::find($id);
        foreach($class->subjects as $key => $subject){
            // dd($subject);
            DB::table('sub_teachers')->where('subject_id', $subject->id)->delete();
        }
        DB::table('subjects')->where('classess_id', $id)->delete();

        DB::table('batches')->where('class_id', $id)->delete();

        DB::table('classesses')->where('id', $id)->delete();

        return back();


    }
}
