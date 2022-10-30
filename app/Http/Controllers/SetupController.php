<?php

namespace App\Http\Controllers;


use App\Setup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class SetupController extends Controller
{
    public function pre_setup()
    {
        return view('pages.pre-setup');
    }

    public function post_setup(Request $request)
    {
        Artisan::call('migrate:fresh', array('--path' => 'database/migrations', '--force' => true));

        $this->validate(request(), [
            "name" => "required",
            "email" => "required|unique:users,email",
        ]);


        $name = $request->input('name');
        $email = $request->input('email');

        #if ($request->hasFile('avatar')) {
        #    $request->avatar->storeAs('public', 'icons8-anonymous-mask.png');
        #} else {
        #    File::copy(public_path() . "/img/icons8-anonymous-mask.png", public_path() . "/storage/icons8-anonymous-mask.png");
        #}

        $hashed_random_password = Hash::make(str_random(8));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($hashed_random_password),
        ]);

        Artisan::call('storage:link');

        Setup::install();

        Auth::login($user, true);

        return view('pages.post-setup', compact('hashed_random_password'));
    }
}
