<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers as BaseController;
use App\Http\Request\User\Checkout\Store;
use App\Models\checkouts;
use App\Models\camp;
use App\Models\User;
use Auth;
use Mail;
Use App\Mail\Checkout\AfterCheckout;

class CheckoutController extends Controller
{
    public function create(camp $camp) 
    {
        return view ('checkout.create',[
            "camp"=>$camp
        ]);
    }

    public function store(Store $request, camp $camp) {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['camp_id'] = $camp_id;

            $user = Auth::user();
            $user->email =  $data['email'];
            $user->name = $data['name'];
            $user->occupation = $data['occupation'];
            $user->save();

            $checkout = checkout::create($data);
            Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));
            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }catch(\Throwtable $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }
        return redirect(route('checkout.success'));
    }

    public function success()
    {
        return view ('checkout.success');
    }
}
