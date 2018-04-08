<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Image;
use Redirect;
use Storage;
use File;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Settings = Settings::all();
        if ($Settings->count() > 0) {
            $settings = Settings::orderBy('created_at', 'desc')->first();

            return redirect()->action(
                'SettingsController@edit', ['id' => $settings->id]
            );
        } else {
            return view('admin.crud.settings.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'min_payout' => 'required',
            'referal_per' => 'required',
            'captcha' => 'required',
            'email_verify' => 'required',
            'admin_register' => 'required',
            'site_name' => 'required',
            'footer' => 'required',
            'site_logo' => 'image|mimes:png,jpg,gif|max:2048',
            'favicon' => 'image|mimes:png,jpg,gif|max:2048'
        ));

        $settings = new Settings();

        $settings->min_payout = $request->min_payout;
        $settings->nav_foo_color = $request->color_pick;
        $settings->referal_per = $request->referal_per;
        $settings->captcha = $request->captcha;
        $settings->admin_register = $request->admin_register;
        $settings->google_api = $request->google_api;
        $settings->mail_conform = $request->email_verify;
        $settings->site_name = $request->site_name;
        $settings->description = $request->site_description;
        $settings->keywords = $request->meta_keywords;
        $settings->footer_text = $request->footer;
        $settings->facebook = $request->facebook;
        $settings->google_plus = $request->google;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            if (File::isDirectory(public_path('site'))) {
                $location = public_path('site/'.$filename);
            } else {
                $location = base_path('public_html/site/'.$filename);
            }
            Image::make($image)->save($location);

            $settings->site_logo = $filename;
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $filename = time().'.'.$image->getClientOriginalExtension();
            if (File::isDirectory(public_path('favicon'))) {
                $location = public_path('favicon/'.$filename);
            } else {
                $location = base_path('public_html/favicon/'.$filename);
            }
            Image::make($image)->save($location);

            $settings->site_favicon = $filename;
        }

        $settings->save();

        return Redirect::back()->with('success', 'Settings Made Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Settings::find($id);

        return view('admin.crud.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'min_payout' => 'required',
            'referal_per' => 'required',
            'captcha' => 'required',
            'email_verify' => 'required',
            'admin_register' => 'required',
            'site_name' => 'required',
            'footer' => 'required',
            'site_logo' => 'image|mimes:png,jpg,gif|max:2048',
            'favicon' => 'image|mimes:png,jpg,gif|max:2048'
        ));

        $settings = Settings::find($id);

        $settings->min_payout = $request->min_payout;
        $settings->nav_foo_color = $request->color_pick;
        $settings->referal_per = $request->referal_per;
        $settings->captcha = $request->captcha;
        $settings->admin_register = $request->admin_register;
        $settings->google_api = $request->google_api;
        $settings->mail_conform = $request->email_verify;
        $settings->site_name = $request->site_name;
        $settings->description = $request->site_description;
        $settings->keywords = $request->meta_keywords;
        $settings->footer_text = $request->footer;
        $settings->facebook = $request->facebook;
        $settings->google_plus = $request->google;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            if (File::isDirectory(public_path('site'))) {
                $location = public_path('site/'.$filename);
            } else {
                $location = base_path('public_html/site/'.$filename);
            }
            Image::make($image)->save($location);

            $oldFileName = $settings->site_logo;
            $settings->site_logo = $filename;
            Storage::delete($oldFileName);

            $settings->site_logo = $filename;
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $filename = time().'.'.$image->getClientOriginalExtension();
             if (File::isDirectory(public_path('favicon'))) {
                $location = public_path('favicon/'.$filename);
            } else {
                $location = base_path('public_html/favicon/'.$filename);
            }
            Image::make($image)->save($location);

            $oldFileName = $settings->site_favicon;
            $settings->site_favicon = $filename;
            Storage::delete($oldFileName);

            $settings->site_favicon = $filename;
        }

        $settings->save();

        return Redirect::back()->with('success', 'Settings Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
