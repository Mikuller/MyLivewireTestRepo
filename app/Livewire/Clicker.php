<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
   // use WithPagination;
    #[Rule('required|max:40|min:2|unique:users')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:6')]
    public $password;


    public $title = "Live wire Test";

    public function createNewUser(){
        $this->validate();
        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ]);
        $this->reset(['name','email','password']);
        request()->session()->flash("success","user created");
    }
    public function render()
    {
        $users = User::paginate(3);
        return view('livewire.clicker',compact('users'));
    }
}
