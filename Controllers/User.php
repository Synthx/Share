<?php

namespace Controllers;

use App\{Auth, Request};

use Models\{User as UserManager, Trip as TripManager};

use Library\Notifications;

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

        $register_date = new \DateTime('NOW');

        UserManager::add([
            'email' => $request->register_email,
            'password' => password_hash($request->register_password, PASSWORD_BCRYPT),
            'last_name' => $request->name,
            'first_name' => $request->firstname,
            'sex' => $request->sex,
            'birth_year' => $request->year,
            'register_date' => $register_date->format('Y-m-d H:i:s')
        ]);

        return redirect()->with(['success' => 'Vous pouvez dès maintenant vous connecter.'])->route('user.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function viewProfile()
    {
        $request = new Request;

        $this->validate($request, [
            'id' => 'required|num|exist:users,id'
        ], 'home');

        $user = UserManager::find($request->id);

        return view('user.profile', compact('user'));
    }

    /* DASHBOARD */

    public function showDashboard()
    {
        $notifs = new Notifications(user());

        return view('user.dashboard.home', compact('notifs'));
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

    public function showReservations()
    {
        $trips = TripManager::where('passengers', 'like', '%' . user()->id . '%')->afterToday('date')->orderBy('date')->limit(5)->get();

        return view('user.dashboard.reservations', compact('trips'));
    }
}