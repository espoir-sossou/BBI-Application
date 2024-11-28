<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\AcheteurController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\GoogleController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'homePage'])->name('homePage');
Route::get('/annonce/{annonce_id}', [HomeController::class, 'showAnnonce'])->name('annonce.details');

// Route pour ajouter au panier
Route::post('/ajouter-au-panier/{annonce_id}', [HomeController::class, 'ajouterAuPanier'])->name('ajouterAuPanier');
// Route pour afficher le panier
Route::get('/panier', [HomeController::class, 'afficherPanier'])->name('panier');
// Route pour supprimer une annonce du panier
Route::delete('/panier/supprimer/{annonce_id}', [HomeController::class, 'supprimerDuPanier'])->name('panier.supprimer');

Route::get('/cart/item-count', [HomeController::class, 'getCartItemCount'])->name('cart.itemCount');

Route::post('/panier/payer/{annonce_id}', [HomeController::class, 'payer'])->name('panier.payer');


// Route pour ajouter une annonce aux favoris
Route::post('/ajouter-aux-favoris/{annonce_id}', [HomeController::class, 'ajouterAuxFavoris'])->name('ajouterAuxFavoris');

// Route pour afficher les favoris
Route::get('/favoris', [HomeController::class, 'afficherFavoris'])->name('favoris');

// Route pour supprimer une annonce des favoris
Route::delete('/favoris/supprimer/{annonce_id}', [HomeController::class, 'supprimerDesFavoris'])->name('favoris.supprimer');

Route::get('/offres', [HomeController::class, 'offre'])->name('offre');

Route::get('/filtre-page', [HomeController::class, 'filtrePage'])->name('filtre.page');

Route::get('/recherche', [HomeController::class, 'recherche'])->name('annonces.recherche');

Route::get('/resultats-recherche', [HomeController::class, 'afficherResultats'])->name('annonces.resultats');



// Route pour le paiement total
Route::get('/paiement/total/{annonce_id}', [PayementController::class, 'paiementTotal'])->name('paiement.total');

// Route pour le paiement par tranches
Route::get('/paiement/installments/{annonce_id}', [PayementController::class, 'paiementInstallments'])->name('paiement.installments');





Route::get('/login-page', [AuthController::class, 'loginPage'])->name('loginPage');
Route::get('/agent/login-page', [AuthController::class, 'AgentloginPage'])->name('agent.loginPage');
Route::post('register-user', [AuthController::class, 'signup'])->name('signup.user');
Route::get('/signup-confirmation', [AuthController::class, 'signupConfirmation'])->name('signup.confirmation');
Route::post('/login-post', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth-logout', [AuthController::class, 'authLogout'])->name('authLogout');
Route::get('/auth-dashboard-logout', [AuthController::class, 'authDashboardLogout'])->name('auth.dashboard.Logout');

























// Routes publiques
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/auth/google/login', [AuthController::class, 'googleLogin'])->name('googleLogin');
Route::get('/signup-page', [AuthController::class, 'signUpPage'])->name('signUpPage');
Route::post('/sign-up', [AuthController::class, 'handleSignup'])->name('handleSignup');

Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');




// Route de déconnexion, accessible uniquement aux utilisateurs authentifiés
// Route::post('/user-logout', [AuthController::class, 'handleLogout'])->name('user.logout');

// Routes protégées par no-back-historyentification et non accessibles après déconnexion
Route::middleware(['no-back-history',])->group(function () {
    Route::get('/user-profil', [AuthController::class, 'userProfil'])->name('user.profil');


    // Routes de l'admin
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/table', [AdminController::class, 'adminTable'])->name('admin.table');
    Route::get('/admin/chart', [AdminController::class, 'adminChart'])->name('admin.chart');

    Route::get('/admin/annonce-liste', [AdminController::class, 'adminAnnonceListe'])->name('admin.annonce.liste');

    Route::post('/admin/annonces/{id}/validation', [AdminController::class, 'adminAnnonceValidader'])->name('admin.annonces.valider');
    Route::delete('/admin/annonces/{id}', [AdminController::class, 'adminDestroyAnnonce'])->name('admin.annonces.destroy');

    Route::get('/admin/offre-en-vedette-liste', [AdminController::class, 'adminOffreEnVedetteListe'])->name('admin.offreEnVedette.liste');
    Route::post('/admin/offre-en-vedette/{id}/validation', [AdminController::class, 'adminOffreEnVedetteValidader'])->name('admin.OffreEnVedette.valider');
    Route::delete('/admin/offre-en-vedette/{id}', [AdminController::class, 'adminDestroyOffreEnVedette'])->name('admin.offreEnVedette.destroy');

    // Routes de l'agence
    Route::get('/agence/dashboard', [AgenceController::class, 'agenceDashboard'])->name('agence.dashboard');
    Route::get('/agence/table', [AgenceController::class, 'agenceTable'])->name('agence.table');
    Route::get('/agence/chart', [AgenceController::class, 'agenceChart'])->name('agence.chart');
    Route::get('/annonce', [AgenceController::class, 'annonce'])->name('annonce');
    Route::post('/annonce-add', [AgenceController::class, 'annonceAdd'])->name('annonce.add');
    Route::get('/upload', [AgenceController::class, 'annonceAdd'])->name('annonce.add');
    Route::get('/upload', [AgenceController::class, 'uploadFile'])->name('upload.file');
    Route::post('/upload-ad', [AgenceController::class, 'uploadFileAdd'])->name('upload.file.add');
    Route::get('/get-file/{fileName}', [AgenceController::class, 'getFile'])->name('getFile');

    Route::get('/annonce-add-page', [AgenceController::class, 'annonceAddPage'])->name('annonce.add.page');
    Route::post('/annonce-create', [AgenceController::class, 'annonceCreate'])->name('annonce.create');
    Route::get('/annonce-liste', [AgenceController::class, 'annonceListe'])->name('annonce.liste');
    // Route pour afficher la page d'édition de l'annonce
    Route::get('/annonce-edit/{annonce_id}', [AgenceController::class, 'annonceEditPage'])->name('annonce.edit');

    // Route pour traiter la mise à jour de l'annonce
    Route::post('/annonce-update/{annonce_id}', [AgenceController::class, 'annonceUpdate'])->name('annonce.update');


    Route::delete('/annonce/{id}', [AgenceController::class, 'destroyAnnonce'])->name('annonces.destroy');

    Route::get('/offre-en-vedette-add-page', [AgenceController::class, 'offreEnVedetteAddPage'])->name('offreEnVedette.add.page');
    Route::post('/offre-en-vedette-create', [AgenceController::class, 'offreEnVedetteCreate'])->name('offreEnVedette.create');
    Route::get('/offre-en-vedette-liste', [AgenceController::class, 'offreEnVedetteListe'])->name('offreEnVedette.liste');

    Route::get('/offre-en-vedette-nce-edit/{annonce_id}', [AgenceController::class, 'offreEnVedetteditPage'])->name('offreEnVedette.edit');

    // Route pour traiter la mise à jour de l'annonce
    Route::post('/offre-en-vedette--update/{annonce_id}', [AgenceController::class, 'offreEnVedetteUpdate'])->name('offreEnVedette.update');

    Route::delete('/offre-en-vedette/{id}', [AgenceController::class, 'destroyoffreEnVedette'])->name('offreEnVedette.destroy');

    Route::get('/notifications/unread', [NotificationController::class, 'getUnreadNotifications']);











    // Routes du vendeur
    Route::get('/vendeur/dashboard', [VendeurController::class, 'vendeurDashboard'])->name('vendeur.dashboard');
    Route::get('/vendeur/table', [VendeurController::class, 'vendeurTable'])->name('vendeur.table');
    Route::get('/vendeur/chart', [VendeurController::class, 'vendeurChart'])->name('vendeur.chart');

    // Routes de l'acheteur
    Route::get('/acheteur/dashboard', [AcheteurController::class, 'acheteurDashboard'])->name('acheteur.dashboard');
    Route::get('/acheteur/table', [AcheteurController::class, 'acheteurTable'])->name('acheteur.table');
    Route::get('/acheteur/chart', [AcheteurController::class, 'acheteurChart'])->name('acheteur.chart');

    // Routes de l'utilisateur standard
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboards');
    Route::get('/user/dashboard', [UserController::class, 'redirectToDashboard'])->name('user.dashboard');
    Route::get('/user/chart', [UserController::class, 'userChart'])->name('user.chart');
    Route::get('/user/table', [UserController::class, 'userTable'])->name('user.table');

    Route::get('/messages/{receiver_id}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('/messages/{receiver_id}', [MessageController::class, 'sendMessage'])->name('messages.send');




});






