<?php

namespace Controllers;

use App\Request;

use Models\Team as TeamManager;
use Models\Contact as MessageManager;

class Misc extends Controller
{
    public function showHome()
    {
        return view('misc.home');
    }

    public function showFaq()
    {
        return view('misc.faq');
    }

    public function showAboutUs()
    {
        $teams = TeamManager::orderByRand()->all();

        return view('misc.about', compact('teams'));
    }

    public function showHowItWork()
    {
        return view('misc.work');
    }

    public function showCharter()
    {
        return view('misc.charter');
    }

    public function showContact()
    {
        return view('misc.contact');
    }

    public function contact()
    {
        $request = new Request;

        if (auth())
        {
            $this->validate($request, [
                'message' => 'required|string'
            ]);

            MessageManager::add([
                'name' => user()->last_name,
                'first_name' => user()->first_name,
                'email' => user()->email,
                'message' => $request->message
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required|string',
                'firstname' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string'
            ]);

            MessageManager::add([
                'name' => $request->name,
                'first_name' => $request->firstname,
                'email' => $request->email,
                'message' => $request->message
            ]);
        }

        return redirect()->with(['success' => 'Votre message a bien été envoyé.'])->route('contact');
    }
}