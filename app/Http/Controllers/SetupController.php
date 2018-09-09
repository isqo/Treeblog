<?php

namespace App\Http\Controllers;


use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

        $this->validate(request(), [
            "name" => "required",
            "email" => "required|unique:users,email",
        ]);

        Artisan::call('migrate:fresh', array('--path' => 'database/migrations', '--force' => true));

        $name = $request->input('name');
        $email = $request->input('email');

        if ($request->hasFile('avatar')) {
            $request->avatar->storeAs('public', 'avatar.png');
        } else {
            File::copy(public_path() . "/img/icons8-anonymous-mask.png", public_path() . "/storage/avatar.png");
        }
        $userRegistrationController = app(\App\Http\Controllers\auth\RegisterController::class);
        $hashed_random_password = Hash::make(str_random(8));
        $userData = array("name" => $name, "email" => $email, "password" => $hashed_random_password);
        $userRegistrationController->create($userData);

        Artisan::call('storage:link');

        Setup::install();

        Auth();

        return view('pages.post-setup', compact('hashed_random_password'));
    }
}
