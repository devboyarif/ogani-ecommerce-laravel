<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserAuth;
use Carbon\Carbon;
use Session;
class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }

    public $email;
    public $password;
    
    // validation form 
    public function updated($field){

        $this->validateOnly($field, [
            'email' => 'required',
            'password' => 'required',
           
        ],[
            'email.required' => 'Please Provide Email Field',
            'password.required' => 'Please Provide Password Field',
        ]);

    }

    // save form 
    public function user_login(){

        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Please Provide Email Field',
            'password.required' => 'Please Provide Password Field',
        ]);

        $login_check = UserAuth::where('email', $this->email)->where('password',$this->password)->first();

        if ($login_check) {
            Session::put('user_id',$login_check->id);
            Session::put('user_ip',request()->ip());
            return redirect('/')->back()->with('success',"You're successfully logged in!");
        }else{
            $this->password = null;
            return redirect('/user_login_show')->back()->with('login_error',"Your given information doesn't match of our records!");
        }
       

    }
 
    // null form field 
     private function cleanevars(){

        $this->email = null;
        $this->password = null;
            
    }






}
