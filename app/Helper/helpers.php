<?php
use App\Models\Admin\Setting;
use App\Models\user_exam;

if (!function_exists('getSetting')) {
    function getSetting()
    {
        $setting = Setting::first();
        return $setting;
    }
}

function getUserExamByid($id)
{
    if(user_exam::where('exam_id', $id)->first()){
        return true;
    }
    return false;
}

function updateUserExams()
{
    $exams = user_exam::where('exam_joined', 0)->get();

}
