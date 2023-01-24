<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
        [
            'name' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'emailAddress' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'name.required' => 'Complete the name',
            'emailAddress.required' => "Complete the email",
            'emailAddress.unique' => "Email already taken",
            'password.required' => 'Password required',
            'password.confirmed' => 'Confirm the right password',
        ]);

        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'companyName' => $request->companyName,
            'emailAddress' => $request->emailAddress,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
