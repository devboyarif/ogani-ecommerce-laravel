<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserAuth;
use Carbon\Carbon;
class Register extends Component
{

    public function render()
    {
        return view('livewire.register');
    }

    public $name;
    public $email;
    public $password;
    
    // validation form 
    public function updated($field){

        $this->validateOnly($field, [
            'name' => 'required|min:5',
            'email' => 'required|unique:user_auths,email',
            'password' => 'required|min:5',
           
        ],[
            'name.required' => 'Please Provide Name Field',
            'email.required' => 'Please Provide Email Field',
            'password.required' => 'Please Provide Password Field',
            'password.min' => 'Password must be greater than 5 letters',
        ]);

    }

    // save form 
    public function user_register(){

        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:user_auths,email',
            'password' => 'required|min:5',
        ],[
            'name.required' => 'Please Provide Name Field',
            'email.required' => 'Please Provide Email Field',
            'password.required' => 'Please Provide Password Field',
            'password.min' => 'Password must be greater than 5 letters',
        ]);
            
        $user_info = UserAuth::create([
            'name' =>  $this->name, 
            'email' => $this->email,
            'password' => $this->password,
            'user_ip' => request()->ip(),
            'created_at' => Carbon::now(),
        ]);

        return redirect('/user_login_show')->back()->with('success',"You're successfully registered!");

    }
 
    // null form field 
     private function cleanevars(){

        $this->name = null;
        $this->email = null;
        $this->password = null;
            
    }

}
