<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function paiementTotal($annonce_id)
    {
        $annonce = Annonce::find($annonce_id);

        // Vérifie si l'annonce existe
        if (!$annonce) {
            return redirect()->route('panier')->withErrors(['error' => 'Annonce non trouvée.']);
        }

        return view('Payement.payement-total', compact('annonce'));
    }

    public function paiementInstallments($annonce_id)
    {
        $annonce = Annonce::find($annonce_id);

        // Vérifie si l'annonce existe
        if (!$annonce) {
            return redirect()->route('panier')->withErrors(['error' => 'Annonce non trouvée.']);
        }

        return view('Payement.payement-installments', compact('annonce'));
    }
}
