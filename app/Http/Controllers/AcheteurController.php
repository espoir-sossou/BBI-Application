<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcheteurController extends Controller
{
    public function acheteurDashboard()
    {
        return view('Layout.Backend.Acheteur_dashboard.index');
    }
      public function acheteurTable()
    {
        return view('Layout.Backend.Acheteur_dashboard.table');
    }
    public function acheteurChart()
    {
        return view('Layout.Backend.Acheteur_dashboard.charts');
    }
}
