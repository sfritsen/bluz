<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;

class MainMenuController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['groups'] = Groups::where('active', '1')->get();
        return view('main_menu', $data);
    }
}
