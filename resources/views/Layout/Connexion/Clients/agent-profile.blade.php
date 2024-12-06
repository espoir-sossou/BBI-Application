@extends('Layout.agence_layout')

@section('content')
    <!-- Image de fond de la bannière -->
    <img class="position-absolute w-85 h-5" src="{{ asset('Frontend/Home/assets/imgs/banner-01.jpg') }}" style="object-fit: cover;">

    <div class="container mt-5">
        <!-- Notifications de succès ou d'erreur -->
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if (Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        <!-- Bannière de bienvenue -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="position-relative p-5" style="background: rgba(0, 0, 0, 0.5); border-radius: 10px;">
                    <h1 class="display-4 text-white">Mon Profil</h1>
                    <p class="text-white">Bienvenue sur votre espace personnel</p>
                    <a class="btn btn-outline-light mt-3" href="#">Votre Profil</a>
                </div>
            </div>
        </div>

       <!-- Informations agent -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card mx-auto shadow-lg" style="max-width: 800px; border-radius: 10px;">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4" style="color: #318093;">Informations personnelles</h4>
                <div class="row">
                    <!-- Nom -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Nom :</h6>
                                <p class="m-0">{{ $agent->nom ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Prénom -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Prénom :</h6>
                                <p class="m-0">{{ $agent->prenom ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Email :</h6>
                                <p class="m-0">{{ $agent->email }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Téléphone -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Téléphone :</h6>
                                <p class="m-0">{{ $agent->telephone ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Adresse -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Adresse :</h6>
                                <p class="m-0">{{ $agent->adresse ?? 'Non spécifié' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rôle -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-cogs fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Rôle :</h6>
                                <p class="m-0">{{ ucfirst(strtolower($agent->role)) }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Statut -->
                    <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-toggle-on fa-2x me-3" style="color: #318093;"></i>
                            <div>
                                <h6 class="mb-0">Statut :</h6>
                                <span class="badge {{ $agent->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($agent->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
@endsection
