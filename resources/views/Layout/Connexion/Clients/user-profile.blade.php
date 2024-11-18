@extends('Layout.headMaster')

@section('content')
    <!-- Image de fond de la bannière -->
    <img class="position-absolute w-100 h-55" src="Frontend/Home/assets/imgs/banner-01.jpg" style="object-fit: cover; ">

    <!-- Conteneur principal du profil -->
    <div class="container mt-5">
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
                    <a class="btn btn-outline-light mt-3" href="#">Modifier Profil</a>
                </div>
            </div>
        </div>


        <!-- Informations utilisateur -->
        <div class="row mt-4">
            @if (isset($user))
                <!-- Nom -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="bg-light p-4 rounded d-flex align-items-center">
                        <i class="fas fa-user-circle fa-2x mr-3" style="color: #318093;"></i>
                        <div>
                            <h5 class="font-weight-bold">Nom :</h5>
                            <p class="m-0">{{ $user['nom'] ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Prénom -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="bg-light p-4 rounded d-flex align-items-center">
                        <i class="fas fa-user fa-2x mr-3" style="color: #318093;"></i>
                        <div>
                            <h5 class="font-weight-bold">Prénom :</h5>
                            <p class="m-0">{{ $user['prenom'] ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="bg-light p-4 rounded d-flex align-items-center">
                        <i class="fas fa-envelope fa-2x mr-3" style="color: #318093;"></i>
                        <div>
                            <h5 class="font-weight-bold">Email :</h5>
                            <p class="m-0">{{ $user['email'] ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Téléphone -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="bg-light p-4 rounded d-flex align-items-center">
                        <i class="fas fa-phone fa-2x mr-3" style="color: #318093;"></i>
                        <div>
                            <h5 class="font-weight-bold">Téléphone :</h5>
                            <p class="m-0">{{ $user['telephone'] ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Rôle -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="bg-light p-4 rounded d-flex align-items-center">
                        <i class="fas fa-cogs fa-2x mr-3" style="color: #318093;"></i>
                        <div>
                            <h5 class="font-weight-bold">Rôle :</h5>
                            <p class="m-0">{{ $user['role'] ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Date de naissance (si disponible) -->
                @if (isset($user['date_naissance']))
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="bg-light p-4 rounded d-flex align-items-center">
                            <i class="fas fa-birthday-cake fa-2x mr-3" style="color: #318093;"></i>
                            <div>
                                <h5 class="font-weight-bold">Date de Naissance :</h5>
                                <p class="m-0">
                                    {{ \Carbon\Carbon::parse($user['date_naissance'])->format('d-m-Y') ?? 'Non renseigné' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Aucune information utilisateur disponible.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
