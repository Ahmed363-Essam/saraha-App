<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Visit;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Message::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $visits = Visit::where('user_id', auth()->user()->id)->count();
        $users = User::where('id','!=',auth()->user()->id)->get();


        return view('home', compact('messages', 'visits','users'));
    }

    public function lastTenVisists(Request $request)
    {
        try {
            $visits = Visit::where('user_id', auth()->user()->id)->latest()->take(10)->get();
            $visitsNo = Visit::where('user_id', auth()->user()->id)->count();
            $users = User::all();
            return view('last_ten_visits', compact('visits', 'visitsNo','users'));
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
