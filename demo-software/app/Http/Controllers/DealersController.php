<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EncryptedCoefficient;
use App\FunctionValue;


class DealersController extends Controller
{
    public function dashboard(Request $request)
    {
    	$users = User::where('isDealer','=','0')->get();
    	return view('dealer.dashboard', ['users' => $users]);
    }

    public function newClient()
    {
    	return view('dealer.newClient');
    }

    public function addClient(Request $request)
    {
    	$user = User::where('email', '=', $request->email)->first();
        
        if ($user) {
            return redirect()->back()->with('error', "Sorry this email is already registerd!");
        } else {
            $user = new User();
            if ($request->password==$request->cnf_password) {
                /** Request a new data using the requst data */
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                /* Save if to the database */
                if ($user->save()) {
                    /** Redirect back to add user page */
                    return redirect()->back()->with('success', "Successfully added a new client!");
                } else {
                    return redirect()->back()->with('error', "Something went wrong, please try again later!");
                }
            } else {
                return redirect()->back()->with('error', "Password and confirm password should be matched!");
            }
        }
    }

    public function deleteClient($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->delete()) {
                return redirect()->back()->with('success', "Successfully deleted this client!");
            } else {
                return redirect()->back()->with('error', "Something went wrong, please try again later!");
            }
        } else {
            return redirect()->back()->with('error', "Sorry this client doen't exist!");
        }
    }

    public function encrypt(Request $request)
    {
        $user = User::orderBy('id', 'desc')->first();  // Getting id of the last user added
        // dd($user->id);
        return view('dealer.encrypt', ['maxid' => $user->id]);
    }
    
    public function encryptKey(Request $request)
    {
        User::where('isDealer', 0)->update(['isVerified' => 0]);

        $a0 = $request->a0;
        $a1 = $request->a1;
        $a2 = $request->a2;
        $g = $request->g;
        $x = $request->x;
        //dd($g);
        $maxId = User::orderBy('id', 'desc')->first(); // Getting id of the last user added

        $Polynomial = array(); // Polynomial // f(x) = 4 + 5x + 7x^2    
        $Polynomial[0] = $a0;
        $Polynomial[1] = $a1;
        $Polynomial[2] = $a2;
        $encrytionResult = FunctionValue::encrypting($Polynomial, $maxId->id, $g, $x);

        if($encrytionResult){
            return redirect()->back()->with('success', "Successfully encrypted key");
        } else {
            return redirect()->back()->with('error', "Key Encryption Failed");
        }    
    }

}
