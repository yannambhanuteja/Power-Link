<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Links;
use App\User;
use App\country;
use App\Settings;
use Auth;
use Jenssegers\Agent\Agent;
use App\Ip;
use Carbon\Carbon;
use Redirect;

class LinkController extends Controller
{

  /** Add a new Link  */
  public function store(Request $request)
  {
    $this->validate($request,array(


      'url'=>'required|url|max:255'


    ));
    $google_api = Settings::orderBy('created_at','desc')->first()->google_api;
    $settingEnable = Settings::orderBy('created_at','desc')->first()->captcha;
    if($google_api && $settingEnable=='yes'){
      $token = $request->input('g-recaptcha-response');
    if($token){
    $str = $this->generateRandomString(10);
    $link = new Links();

    if(Auth::check())
    {
      $link->user_id = Auth::user()->id;
    }

    $link->url = $request->url;

    $link->link =  $str;


    $link->save();

    return Redirect::back()->with('links_s',$link->link);

   }
    else
     {
      return Redirect::back()->withErrors('Please Submit Captcha');
     }
    }
    else{

      $str = $this->generateRandomString(10);
    $link = new Links();

    if(Auth::check())
    {
      $link->user_id = Auth::user()->id;
    }

    $link->url = $request->url;

    $link->link =  $str;


    $link->save();

    return Redirect::back()->with('links_s',$link->link);


    }
    
  }

  public function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  public function captcha(Request $request)
  {
    $link = $request->linkname;
    $token = $request->input('g-recaptcha-response');
    if($token)
    { 
      if($link)
        return $this->show($link);
      else
        return Redirect('/');
    }
    else
    {
      return Redirect::back()->withErrors('Please Submit Captcha');
    }

  }
  public function show($id)
  {
    $link = Links::where('link',$id)->first();

    if($link)

    {

      $settings = Settings::orderBy('created_at','desc')->first();

      $country = country::orderBy('created_at')->first();




      $ip = request()->ip();
      $ip_list = Ip::where('ip',$ip)->where('created_at', '>=', Carbon::now()->subDay())->get();
      $ips = new Ip();
      $ips->ip = $ip;
      $ips->save();
      $data = \Location::get($ip);
      $visit = strval($data->countryCode);

      $visit = str_replace('"', '', $visit);
      $agent = new Agent();
      $mobile = $agent->isMobile();
      $tablet = $agent->isTablet();


      if($visit=="CA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }

      if($visit=="US")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->US_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->US_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->US_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->US_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->US_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->US_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->US_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->US_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->US_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->US_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->US_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->US_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->US_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->US)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->US)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->US)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }



      if($visit=="GB")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GB_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GB_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GB_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GB_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GB_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GB_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GB_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GB_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GB_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GB_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GB_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GB_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GB_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GB)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GB)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GB)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }



      if($visit=="AU")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AU_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AU_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AU_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AU_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AU_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AU_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AU_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AU_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AU_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AU_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AU_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AU_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AU_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AU)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AU)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AU)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }


      if($visit=="DE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->DE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->DE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->DE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }

      if($visit=="NO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }


      if($visit=="AE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="ZA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ZA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->ZA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ZA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ZA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->ZA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ZA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ZA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ZA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ZA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ZA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ZA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ZA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->ZA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ZA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ZA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ZA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="FI")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->FI_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->FI_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FI_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FI_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->FI_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FI_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FI_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FI_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->FI_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FI_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FI_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FI_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->FI_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FI)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FI)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FI)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="DK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->DK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->DK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->DK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="NZ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NZ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NZ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NZ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NZ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NZ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NZ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NZ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NZ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NZ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NZ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NZ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NZ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NZ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NZ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NZ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NZ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PL")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PL_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PL_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PL_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PL_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PL_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PL_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PL_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PL_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PL_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PL_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PL_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PL_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PL_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PL)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PL)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PL)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CH")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CH_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CH_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CH_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CH_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CH_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CH_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CH_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CH_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CH_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CH_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CH_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CH_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CH_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CH)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CH)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CH)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="KW")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KW_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->KW_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KW_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KW_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->KW_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KW_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KW_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KW_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KW_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KW_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KW_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KW_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->KW_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KW)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KW)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KW)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="QA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->QA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->QA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->QA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->QA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->QA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->QA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->QA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->QA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->QA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->QA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->QA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->QA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->QA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->QA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->QA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->QA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="ES")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ES_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->ES_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ES_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ES_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->ES_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ES_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ES_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ES_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ES_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ES_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ES_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ES_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->ES_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ES)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ES)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ES)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="KR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->KR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->KR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->KR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="OM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->OM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->OM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->OM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->OM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->OM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->OM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->OM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->OM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->OM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->OM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->OM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->OM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->OM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->OM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->OM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->OM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CY")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CY_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CY_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CY_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CY_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CY_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CY_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CY_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CY_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CY_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CY_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CY_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CY_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CY_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CY)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CY)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CY)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="NL")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NL_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NL_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NL_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NL_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NL_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NL_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NL_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NL_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NL_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NL_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NL_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NL_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NL_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NL)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NL)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NL)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CZ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CZ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CZ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CZ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CZ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CZ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CZ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CZ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CZ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CZ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CZ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CZ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CZ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CZ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CZ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CZ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CZ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IS")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IS_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IS_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IS_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IS_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IS_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IS_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IS_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IS_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IS_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IS_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IS_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IS_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IS_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IS)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IS)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IS)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LU")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LU_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LU_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LU_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LU_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LU_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LU_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LU_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LU_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LU_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LU_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LU_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LU_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LU_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LU)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LU)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LU)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="FR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->FR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->FR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->FR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->FR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->FR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->FR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->FR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->FR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SG")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SG_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SG_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SG_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SG_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SG_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SG_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SG_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SG_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SG_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SG_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SG_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SG_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SG_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SG)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SG)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SG)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="JP")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->JP_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->JP_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JP_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JP_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->JP_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JP_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JP_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JP_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->JP_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JP_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JP_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JP_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->JP_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JP)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JP)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JP)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MY")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MY_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MY_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MY_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MY_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MY_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MY_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MY_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MY_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MY_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MY_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MY_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MY_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MY_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MY)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MY)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MY)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="NG")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NG_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NG_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NG_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NG_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NG_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NG_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NG_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NG_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NG_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NG_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NG_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NG_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NG_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NG)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NG)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NG)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IQ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IQ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IQ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IQ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IQ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IQ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IQ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IQ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IQ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IQ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IQ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IQ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IQ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IQ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IQ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IQ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IQ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LV")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LV_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LV_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LV_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LV_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LV_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LV_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LV_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LV_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LV_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LV_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LV_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LV_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LV_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LV)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LV)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LV)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PS")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PS_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PS_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PS_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PS_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PS_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PS_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PS_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PS_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PS_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PS_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PS_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PS_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PS_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PS)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PS)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PS)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SI")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SI_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SI_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SI_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SI_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SI_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SI_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SI_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SI_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SI_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SI_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SI_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SI_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SI_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SI)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SI)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SI)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="RU")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RU_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->RU_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RU_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RU_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->RU_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RU_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RU_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RU_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RU_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RU_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RU_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RU_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->RU_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RU)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RU)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RU)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BG")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BG_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BG_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BG_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BG_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BG_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BG_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BG_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BG_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BG_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BG_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BG_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BG_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BG_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BG)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BG)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BG)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="RS")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RS_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->RS_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RS_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RS_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->RS_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RS_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RS_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RS_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RS_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RS_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RS_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RS_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->RS_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RS)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RS)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RS)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="ME")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ME_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->ME_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ME_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ME_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->ME_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ME_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ME_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ME_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->ME_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ME_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ME_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ME_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->ME_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->ME)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->ME)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->ME)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="TH")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TH_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->TH_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TH_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TH_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->TH_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TH_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TH_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TH_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TH_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TH_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TH_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TH_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->TH_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TH)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TH)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TH)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="JO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->JO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->JO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->JO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->JO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->JO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->JO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->JO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->JO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="KE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->KE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->KE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->KE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GH")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GH_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GH_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GH_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GH_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GH_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GH_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GH_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GH_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GH_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GH_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GH_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GH_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GH_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GH)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GH)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GH)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="KZ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KZ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->KZ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KZ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KZ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->KZ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KZ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KZ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KZ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KZ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KZ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KZ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KZ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->KZ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KZ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KZ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KZ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BD")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BD_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BD_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BD_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BD_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BD_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BD_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BD_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BD_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BD_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BD_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BD_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BD_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BD_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BD)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BD)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BD)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="EE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->EE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->EE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->EE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GE")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GE_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GE_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GE_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GE_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GE_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GE_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GE_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GE_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GE_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GE_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GE_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GE_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GE_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GE)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GE)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GE)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MX")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MX_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MX_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MX_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MX_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MX_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MX_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MX_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MX_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MX_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MX_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MX_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MX_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MX_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MX)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MX)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MX)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MD")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MD_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MD_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MD_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MD_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MD_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MD_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MD_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MD_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MD_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MD_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MD_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MD_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MD_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MD)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MD)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MD)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="TZ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TZ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->TZ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TZ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TZ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->TZ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TZ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TZ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TZ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TZ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TZ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TZ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TZ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->TZ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TZ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TZ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TZ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="INDO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->INDO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->INDO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->INDO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->INDO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->INDO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->INDO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->INDO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->INDO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->INDO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->INDO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->INDO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->INDO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->INDO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->INDO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->INDO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->INDO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CI")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CI_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CI_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CI_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CI_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CI_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CI_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CI_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CI_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CI_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CI_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CI_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CI_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CI_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CI)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CI)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CI)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="HN")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HN_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->HN_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HN_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HN_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->HN_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HN_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HN_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HN_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HN_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HN_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HN_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HN_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->HN_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HN)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HN)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HN)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="IN")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IN_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->IN_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IN_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IN_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->IN_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IN_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IN_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IN_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->IN_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IN_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IN_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IN_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->IN_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->IN)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->IN)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->IN)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="VN")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->VN_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->VN_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->VN_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->VN_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->VN_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->VN_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->VN_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->VN_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->VN_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->VN_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->VN_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->VN_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->VN_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->VN)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->VN)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->VN)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="TW")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TW_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->TW_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TW_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TW_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->TW_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TW_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TW_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TW_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TW_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TW_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TW_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TW_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->TW_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TW)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TW)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TW)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CN")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CN_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CN_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CN_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CN_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CN_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CN_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CN_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CN_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CN_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CN_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CN_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CN_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CN_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CN)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CN)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CN)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="KH")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KH_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->KH_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KH_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KH_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->KH_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KH_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KH_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KH_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->KH_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KH_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KH_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KH_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->KH_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->KH)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->KH)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->KH)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="AT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="AM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="AL")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AL_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AL_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AL_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AL_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AL_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AL_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AL_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AL_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AL_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AL_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AL_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AL_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AL_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AL)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AL)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AL)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="TM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->TM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->TM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->TM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LB")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LB_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LB_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LB_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LB_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LB_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LB_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LB_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LB_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LB_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LB_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LB_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LB_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LB_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LB)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LB)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LB)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="EC")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EC_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->EC_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EC_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EC_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->EC_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EC_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EC_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EC_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EC_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EC_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EC_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EC_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->EC_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EC)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EC)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EC)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PH")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PH_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PH_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PH_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PH_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PH_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PH_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PH_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PH_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PH_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PH_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PH_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PH_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PH_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PH)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PH)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PH)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="HU")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HU_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->HU_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HU_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HU_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->HU_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HU_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HU_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HU_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HU_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HU_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HU_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HU_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->HU_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HU)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HU)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HU)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="EG")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EG_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->EG_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EG_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EG_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->EG_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EG_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EG_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EG_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->EG_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EG_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EG_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EG_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->EG_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->EG)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->EG)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->EG)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="PK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->PK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->PK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->PK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->PK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->PK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->PK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->PK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="UA")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->UA_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->UA_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->UA_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->UA_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->UA_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->UA_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->UA_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->UA_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->UA_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->UA_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->UA_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->UA_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->UA_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->UA)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->UA)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->UA)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="NC")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NC_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NC_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NC_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NC_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NC_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NC_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NC_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NC_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NC_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NC_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NC_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NC_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NC_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NC)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NC)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NC)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LY")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LY_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LY_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LY_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LY_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LY_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LY_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LY_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LY_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LY_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LY_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LY_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LY_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LY_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LY)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LY)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LY)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="AR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="HK")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HK_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->HK_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HK_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HK_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->HK_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HK_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HK_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HK_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->HK_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HK_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HK_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HK_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->HK_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->HK)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->HK)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->HK)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="TR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->TR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->TR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->TR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->TR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->TR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->TR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->TR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="DZ")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DZ_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->DZ_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DZ_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DZ_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->DZ_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DZ_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DZ_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DZ_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->DZ_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DZ_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DZ_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DZ_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->DZ_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->DZ)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->DZ)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->DZ)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="RO")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RO_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->RO_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RO_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RO_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->RO_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RO_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RO_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RO_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->RO_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RO_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RO_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RO_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->RO_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->RO)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->RO)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->RO)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BS")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BS_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BS_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BS_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BS_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BS_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BS_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BS_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BS_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BS_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BS_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BS_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BS_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BS_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BS)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BS)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BS)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GL")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GL_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GL_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GL_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GL_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GL_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GL_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GL_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GL_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GL_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GL_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GL_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GL_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GL_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GL)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GL)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GL)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="LR")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LR_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->LR_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LR_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LR_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->LR_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LR_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LR_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LR_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->LR_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LR_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LR_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LR_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->LR_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->LR)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->LR)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->LR)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="MF")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MF_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->MF_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MF_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MF_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->MF_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MF_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MF_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MF_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->MF_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MF_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MF_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MF_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->MF_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->MF)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->MF)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->MF)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="BT")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BT_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->BT_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BT_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BT_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->BT_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BT_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BT_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BT_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->BT_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BT_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BT_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BT_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->BT_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->BT)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->BT)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->BT)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="GF")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GF_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->GF_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GF_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GF_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->GF_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GF_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GF_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GF_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->GF_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GF_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GF_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GF_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->GF_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->GF)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->GF)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->GF)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="NP")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NP_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->NP_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NP_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NP_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->NP_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NP_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NP_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NP_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->NP_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NP_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NP_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NP_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->NP_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->NP)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->NP)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->NP)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="AF")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AF_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->AF_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AF_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AF_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->AF_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AF_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AF_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AF_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->AF_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AF_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AF_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AF_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->AF_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->AF)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->AF)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->AF)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="CU")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CU_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->CU_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CU_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CU_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->CU_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CU_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CU_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CU_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->CU_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CU_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CU_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CU_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->CU_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->CU)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->CU)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->CU)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SV")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SV_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SV_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SV_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SV_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SV_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SV_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SV_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SV_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SV_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SV_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SV_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SV_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SV_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SV)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SV)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SV)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }
      if($visit=="SM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SM_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->SM_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SM_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SM_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->SM_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SM_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SM_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SM_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->SM_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SM_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SM_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SM_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->SM_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->SM)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->SM)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->SM)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }

      }

      if($visit==null OR $visit=="" AND $visit !=="US" AND $visit !=="CA" AND $visit !=="GB" AND $visit !=="AU"  AND $visit !=="DE" AND $visit !=="NO"  AND $visit !=="AE" AND $visit !=="SE"  AND $visit !=="ZA" AND $visit !=="FI"  AND $visit !=="DK" AND $visit !=="NZ"  AND $visit !=="PL" AND $visit !=="IE" AND $visit !=="CH" AND $visit !=="KW"  AND $visit !=="QA" AND $visit !=="SA"  AND $visit !=="BE" AND  $visit !=="ES"  AND $visit !=="KR" AND $visit !=="OM"  AND $visit !=="CY" AND $visit !=="NL"  AND $visit !=="CZ" AND $visit !=="IS"  AND $visit !=="LU" AND $visit !=="GR"  AND $visit !=="FR"  AND $visit !=="SG" AND $visit !=="IL"  AND $visit !=="JP" AND $visit !=="MY"  AND $visit !=="NG" AND $visit !=="PT"  AND $visit !=="IQ" AND $visit !=="LV"  AND $visit !=="PS" AND $visit !=="SI"  AND $visit !=="RU" AND $visit !=="BG"  AND $visit !=="RS" AND $visit !=="ME"  AND $visit !=="TH" AND $visit !=="LK"  AND $visit !=="MM" AND $visit !=="IT"  AND $visit !=="JO" AND $visit !=="KE"  AND $visit !=="IR" AND $visit !=="GH"  AND $visit !=="PA" AND $visit !=="MO"  AND $visit !=="KZ" AND $visit !=="BD"  AND $visit !=="EE" AND $visit !=="LT"  AND $visit !=="GE" AND $visit !=="MX"  AND $visit !=="IO" AND $visit !=="MD"  AND $visit !=="TZ" AND $visit !=="INDO"  AND $visit !=="CI" AND $visit !=="BR"  AND $visit !=="BA" AND $visit !=="HN"  AND $visit !=="IN" AND $visit !=="VN"  AND $visit !=="TW" AND $visit !=="GT"  AND $visit !=="CN" AND $visit !=="KH"  AND $visit !=="AT" AND $visit !=="SK"  AND $visit !=="AM" AND $visit !=="AL"  AND $visit !=="MK" AND $visit !=="TM"  AND $visit !=="LB" AND $visit !=="EC"  AND $visit !=="PH" AND $visit !=="HU"  AND $visit !=="EG" AND $visit !=="PK"  AND $visit !=="CM" AND $visit !=="UA"  AND $visit !=="BM" AND $visit !=="NC"  AND $visit !=="LY" AND $visit !=="AR"  AND $visit !=="HK" AND $visit !=="TR"  AND $visit !=="DZ" AND $visit !=="RO"  AND $visit !=="BS" AND $visit !=="GL"  AND $visit !=="LR" AND $visit !=="MF"  AND $visit !=="BT" AND $visit !=="GF"  AND $visit !=="NP" AND $visit !=="AF"  AND $visit !=="CU" AND $visit !=="SV"  AND $visit !=="SM")
      {
        if($mobile || $tablet)
        {

          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->others_visit_mr += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country_mr->others_mr)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->others_mr)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->others_mr)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
          else
          { 
            $links= Links::find($link->id);
            $new = '1';

            $links->others_visit_mobile += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->others_m)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->others_m)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->others_m)/1000)*($settings->referal_per)/100;
                $ref->save();
              }

            }
          }

        }
        else
        {
          if($ip_list->count()>0)
          {

            $links= Links::find($link->id);
            $new = '1';

            $links->others_visit_r += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->others_r)/1000;
              $user->save();

              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->others_r)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->others_r)/1000)*($settings->referal_per)/100;

                $ref->save();
              }

            }

          }
          else
          {
            $links= Links::find($link->id);
            $new = '1';
            $links->others_visit += $new;

            $links->save();
            if($link->user_id)
            {
              $user = User::find($link->user_id);
              $user->earnings  += ($country->others)/1000;
              $user->save();
              if($user->ref_id)
              {
                $ref = User::find($user->ref_id);
                $ref->ref_income += (($country->others)/1000)*($settings->referal_per)/100;
                $ref->earnings += (($country->others)/1000)*($settings->referal_per)/100;
                $ref->save();
              }
            }
          }
        }



      }

      return view('ads',compact('link'));
    }

    else{



      return view('errors.401');
    }



  }

  public function ip(Request $request)
  {

    $ip = '171.255.199.131';
    $data = \Location::get($ip);
    dd($data);

  }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function edit($id)
  {
    //
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
    //
  }

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
  {
    //
  }
}