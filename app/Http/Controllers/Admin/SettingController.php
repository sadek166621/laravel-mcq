<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    return view('superadmin.setting.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = Setting::first();
        return view('superadmin.setting.form',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $id;
        $setting = Setting::findOrFail($id);

        if($setting){
            $setting->update([
                'site_name' => $request->site_name,
                'site_title' => $request->site_title,
                'site_tagline' => $request->site_tagline,
                'site_contact_no' => $request->site_contact_no,
                'site_email' => $request->site_email,
                'site_address' => $request->site_address,
                'google_map_link' => $request->google_map_link,
                'youtube_video_left_link' => $request->youtube_video_left_link,
                'youtube_video_right_link' => $request->youtube_video_right_link,
                'site_meta_title' => $request->site_meta_title,
                'site_meta_description' => $request->site_meta_description,
                'vice_principal_name' => $request->vice_principal_name,
                'vice_principal_bio' => $request->vice_principal_bio,
                'vice_principal_message' => $request->vice_principal_message,
                'principal_name' => $request->principal_name,
                'principal_bio' => $request->principal_bio,
                'principal_message' => $request->principal_message,
                // 'campus_image' => $request->principal_message,
                'campus_history' => $request->campus_history,
                'important_link_text_1' => $request->important_link_text_1,
                'important_link_1' => $request->important_link_1,
                'important_link_text_2' => $request->important_link_text_2,
                'important_link_2' => $request->important_link_2,
                'important_link_text_3' => $request->important_link_text_3,
                'important_link_3' => $request->important_link_3,
                'important_link_text_4' => $request->important_link_text_4,
                'important_link_4' => $request->important_link_4,
                'important_link_text_5' => $request->important_link_text_5,
                'important_link_5' => $request->important_link_5,
                'important_link_text_6' => $request->important_link_text_6,
                'important_link_6' => $request->important_link_6,
                'important_link_text_7' => $request->important_link_text_7,
                'important_link_7' => $request->important_link_7,
                'important_link_text_8' => $request->important_link_text_8,
                'important_link_8' => $request->important_link_8,
                'message_from_1' =>$request->message_from_1,
                'message_from_2' =>$request->message_from_2,
                'contact' =>$request->contact,
            ]);

            $campus_images = $setting->campus_image;
            $image_campus = $request->file('campus_image');
            if($image_campus){
                $currentDate = Carbon::now()->toDateString();
                $campus_images = $currentDate.'-'.uniqid().'.'.$image_campus->getClientOriginalExtension();


                if (!file_exists('assets/images/uploads/settings')) {
                    mkdir('assets/images/uploads/settings', 0777, true);
                }
                $image_campus->move(public_path('assets/images/uploads/settings'), $campus_images);
                // $image->move(base_path().'/assets/images/uploads/settings', $campus_history);

            }
            $setting->campus_image = $campus_images;



            $logo = $setting->site_logo;
            $image = $request->file('site_logo');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                $logo = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


                if (!file_exists('assets/images/uploads/settings')) {
                    mkdir('assets/images/uploads/settings', 0777, true);
                }
                $image->move(public_path('assets/images/uploads/settings'), $logo);
                // $image->move(base_path().'/assets/images/uploads/settings', $logo);

            }

            $setting->site_logo = $logo;

            $icon = $setting->site_icon;
            $image_icon = $request->file('site_icon');
            if($image_icon){
                $currentDate = Carbon::now()->toDateString();
                $icon = $currentDate.'-'.uniqid().'.'.$image_icon->getClientOriginalExtension();


                if (!file_exists('assets/images/uploads/settings')) {
                    mkdir('assets/images/uploads/settings', 0777, true);
                }
                $image_icon->move(public_path('assets/images/uploads/settings'), $icon);
                // $image_icon->move(base_path().'/assets/images/uploads/settings', $icon);

            }
            $setting->site_icon = $icon;

            $vc_image = $setting->vice_principal_image;
            $image = $request->file('vice_principal_image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                $vc_image = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


                if (!file_exists('assets/images/uploads/settings')) {
                    mkdir('assets/images/uploads/settings', 0777, true);
                }
                $image->move(public_path('assets/images/uploads/settings'), $vc_image);
                // $image->move(base_path().'/assets/images/uploads/settings', $vc_image);

            }
            $setting->vice_principal_image = $vc_image;

            $image_name = $setting->principal_image;
            $image = $request->file('principal_image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                $image_name = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


                if (!file_exists('assets/images/uploads/settings')) {
                    mkdir('assets/images/uploads/settings', 0777, true);
                }
                $image->move(public_path('assets/images/uploads/settings'), $image_name);
                // $image->move(base_path().'/assets/images/uploads/settings', $image_name);

            }
            $setting->principal_image = $image_name;

            $setting->save();

            // Toastr::success('Settings updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
