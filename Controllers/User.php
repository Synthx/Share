<?php

namespace Controllers;

use App\Auth;
use App\Request;

use Models\User as UserManager;
use Models\Trip as TripManager;

class User extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login()
    {
        $request = new Request;

        $this->validate($request, [
            'login_email' => 'required|email|exist:users,email',
            'login_password' => 'required|alpha_num',
        ]);

        if (Auth::login($request->login_email, $request->login_password, $request->remember))
            return redirect()->route('user.dashboard');

        return redirect()->withInputs($request)->with(['error' => 'Le mot de passe est incorrect.'])->back();
    }

    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function register()
    {
        $request = new Request;

        $this->validate($request, [
            'register_email' => 'required|email|unique:users,email',
            'register_password' => 'required|alpha_num|min_size:6',
            'name' => 'required|string',
            'firstname' => 'required|string',
            'sex' => 'required|sex',
            'year' => 'required|num|size:4|max:' . (date('Y')-18) . '|min:' . (date('Y')-100)
        ]);

        UserManager::add([
            'email' => $request->register_email,
            'password' => password_hash($request->register_password, PASSWORD_BCRYPT),
            'last_name' => $request->name,
            'first_name' => $request->firstname,
            'sex' => $request->sex,
            'birth_year' => $request->year
        ]);

        return redirect()->with(['success' => 'Vous pouvez dès maintenant vous connecter.'])->route('user.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    /* DASHBOARD */

    public function showDashboard()
    {
        return view('user.dashboard.home');
    }

    public function showTrips()
    {
        $trips = TripManager::where('driver', user()->id)->afterToday('date')->orderBy('date')->limit(5)->get();

        return view('user.dashboard.trips', compact('trips'));
    }

    public function showProfile()
    {
        return view('user.dashboard.profile');
    }

    public function changeInformations()
    {
        $request = new Request;

        $this->validate($request, [

        ]);

        return redirect()->route('user.dashboard.profile');
    }

    public function showReservations()
    {
        $trips = TripManager::where('passengers', 'like', '%' . user()->id . '%')->afterToday('date')->orderBy('date')->limit(5)->get();

        return view('user.dashboard.reservations', compact('trips'));
    }
}