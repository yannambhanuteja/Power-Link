<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Links;
use App\country;
use Auth;
use Redirect;
use App\Settings;
use App\Payments;

class UserController extends Controller
{
    public function deleteLink($id)
    {
        $link = Links::find($id);


        if ($link && Auth::check()) {
            if (Auth::user()->id==$link->user_id or Auth::user()->role == 'admin') {
                $link->delete();
                return Redirect::back()->withMessageDelete('Deleted Successfully');
            } else {
                return Redirect('/');
            }
        } else {
            return Redirect('/');
        }
    }

    public function withdraw($id)
    {
        $payments_history = Payments::where('user_id', Auth::user()->id)->where('success', '0')->get();

        if ($payments_history->count() > 0) {
            return Redirect::back()->withErrors('Your previous payment is already under process');
        } else {
            if (Auth::user()->id==$id) {
                $Settings = Settings::orderBy('created_at', 'desc')->first();

                $total = number_format((float)Auth::user()->earnings, 4, '.', '');
           if ($total==0) {
                  return Redirect::back()->withErrors('No earnings in your account');
                }
                if ($total>1) {
                    $req_amount = round($total)-1;
                } 
                if($total==1) {
                    $req_amount = $total;
                }

                if($total<1)
                {
                    $req_amount = $total;
                }



                 if ($req_amount>$Settings->min_payout) {
                    if (Auth::user()->paypal_email== null) {
                        return Redirect::back()->withErrors('Please update your paypal email');
                    }

                        else {
                        $payment  = new Payments();
                        $payment->user_id = Auth::user()->id;
                        $payment->amount = $req_amount;
                        $payment->mode = 'paypal';
                        $payment->save();

                        $user = User::find(Auth::user()->id);
                        $user->earnings = $total-$req_amount;
                        $user->ref_income = '0';
                        $user->request_amount = $req_amount;
                        $user->save();
                        return Redirect::back()->withSuccess('Payment Request Successfully queued ');
                    }
                } 

                if ($req_amount==$Settings->min_payout) {
                    if (Auth::user()->paypal_email== null) {
                        return Redirect::back()->withErrors('Please update your paypal email');
                    }

                        else {
                        $payment  = new Payments();
                        $payment->user_id = Auth::user()->id;
                        $payment->amount = $req_amount;
                        $payment->mode = 'paypal';
                        $payment->save();

                        $user = User::find(Auth::user()->id);
                        $user->earnings = '0';
                        $user->ref_income = '0';
                        $user->request_amount = $req_amount;
                        $user->save();
                        return Redirect::back()->withSuccess('Payment Request Successfully queued ');
                    }
                } 

           
            if($req_amount<$Settings->min_payout) {
                    $requ_amount= ($Settings->min_payout)-$total;
                    return Redirect::back()->withErrors('You Still need '.$requ_amount.' $ to make request for withdraw');
                }
            }

            else{

                return Redirect('/');
            }
        }
    }



    public function myPayments($id)
    {
        if (Auth::user()->id==$id) {
            $payment_success = Payments::where('user_id', $id)->where('success', '1')->get();
            $payment_process = Payments::where('user_id', $id)->where('success', '0')->get();
            return view('mypayments', compact('payment_process', 'payment_success'));
        } else {
            return Redirect('/');
        }
    }
    public function mySettings($id)
    {
        if (Auth::user()->id==$id) {
            $users = User::find($id);
            return view('mysettings', compact('users'));
        } else {
            return Redirect('/');
        }
    }

    public function mySettingsSave(Request $request, $id)
    {
        if (Auth::user()->id==$id) {
            $users = User::find($id);
            $users->name = strip_tags($request->name);
            $users->paypal_email = strip_tags($request->paypal_email);

            if ($request->password && $request->newpassword) {
                if (hash::check($request->password, $users->password)) {
                    $users->password = bcrypt($request->newpassword);
                } else {
                    return Redirect::back()->withErrors('You have entered your old password Incorrectly');
                }
            }
            $users->save();
            return Redirect::back()->withSuccess('Settings Changed Successfully');
        } else {
            return Redirect('/');
        }
    }


    public function manageLinks($id)
    {
        if (Auth::user()->id==$id) {
            $countries = Country::orderBy('updated_at', 'desc')->first();
            $links = Links::where('user_id', Auth::user()->id)->paginate(10);
            return view('managelinks', compact('links', 'countries'));
        } else {
            return Redirect('/');
        }
    }
}
