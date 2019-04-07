<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class userController extends Controller
{
    //
    public function index()
    {

    }

    public function userSingUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $password = bcrypt($request->password);
        $user = new User();
        $user->email = $request->email;
        $user->password = $password;
        $user->name = $request->name;
        $user->id = $request->id;
        $user->save();
        Auth::login($user);
        return view('home');

    }

    public function userSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended('/');
        } else {
            if (User::where('email', $request['email'])->first()) {
                return redirect()->back()->with('auth_failed', ['Wrong password ']);
            } else {
                return redirect()->back()->with('auth_failed', ['Wrong email ']);
            }
        }
    }

//    public function settings()
//    {
//        $fixedExpens = fixedExpenses::join('expense_cats', 'expense_cats.id', '=', 'fixed_expenses.cat_id')
//            ->where('user_id', Auth::id())
//            ->get();
//
//        $all_cat = expenseCat::all();
//        $all_cat = (array)json_decode($all_cat);
//        $button_title = 'Save';
//
//        if ($fixedExpens) {
//            $unfilled_fixed_expenses = DB::table("expense_cats")->select('*')
//                ->whereNOTIn('id', function ($query) {
//                    $query->select('cat_id')->from('fixed_expenses')->where('user_id', Auth::id());
//                })
//                ->get()->toArray();
//
//            $fixedExpens = (array)json_decode($fixedExpens);
//
//
//            $all_cat = array_merge($fixedExpens, $unfilled_fixed_expenses);
//            $button_title = 'Update';
//
//
//        }
//
////        $result = (array) json_decode($all_cat);
//
//        return view('settings')
//            ->with('data', ['all_cat' => $all_cat, 'button_title' => $button_title]);
//
//    }
    public function signup(){
        return view('auth/signup');
    }

//    public function saveSettings(Request $request)
//    {
//
//        $checkValid = $this->validate($request, [
//            'rent' => "required_if:rentCheck,==,on",
//            'electric_bill' => "required_if:electric_billCheck,==,on",
//            'gas_bill' => "required_if:gas_billCheck,==,on",
//            'water_bill' => "required_if:water_billCheck,==,on",
//            'bazar_bill' => "required_if:bazar_billCheck,==,on",
//            'maid_bill' => "required_if:maid_billCheck,==,on",
//            'internet_bill' => "required_if:internet_billCheck,==,on",
//            'other_bill' => "required_if:other_billCheck,==,on",
//        ]);
//
//        if ($checkValid) {
//            $all_cat_slug = expenseCat::all()
//                ->pluck('cat_slug', 'id');
//            foreach ($all_cat_slug as $key => $value) {
//                if ($request[$value] && $request[$value . 'Check']) {
//                     fixedExpenses::updateOrCreate(
//                        ['user_id' => Auth::id(), 'cat_id' => $key],
//                        ['amount' => $request[$value]])->toArray();
//                } else { //delete if check is not clicked
//                    DB::table('fixed_expenses')
//                        ->where('user_id', '=', Auth::id())
//                        ->where('cat_id', '=', $key)
//                        ->delete();
//                }
//
//            }
//
//        }
//
//        return redirect('settings');
//
//    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}