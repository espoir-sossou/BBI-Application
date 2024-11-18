<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('Layout.Backend.User_dashboard.index');
    }
    public function filtrePage()
    {
        return view('Layout.Frontend..filtre-page');
    }







    public function userTable()
    {
        return view('Layout.Backend.User_dashboard.table');
    }
    public function userChart()
    {
        return view('Layout.Backend.User_dashboard.charts');
    }

}
