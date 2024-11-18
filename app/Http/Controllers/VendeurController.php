<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function vendeurDashboard()
    {
        return view('Layout.Backend.Vendeur_dashboard.index');
    }

    public function vendeurTable()
    {
        return view('Layout.Backend.Vendeur_dashboard.table');
    }
    public function vendeurChart()
    {
        return view('Layout.Backend.Vendeur_dashboard.charts');
    }
}
