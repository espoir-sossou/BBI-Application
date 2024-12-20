@extends('Layout.agence_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Liste des Annonces</h1>
        <p class="mb-4">Voici toutes les annonces disponibles dans la base de données.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Annonces</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (!$hasAnnonces)
                        <div class="alert alert-warning">
                            <strong>Vous n'avez pas encore créé d'annonce.</strong>
                            <p>Commencez dès maintenant en créant votre première annonce !</p>
                            <a href="{{ route('annonce.add.page') }}" class="btn btn-primary">Créer une annonce</a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Type de Propriété</th>
                                        <th>Montant</th>
                                        <th>Superficie</th>
                                        <th>Nb Chambres</th>
                                        <th>Nb Salles de Douche</th>
                                        <th>Véranda</th>
                                        <th>Terrasse</th>
                                        <th>Cuisine</th>
                                        <th>Dépendance</th>
                                        <th>Piscine</th>
                                        <th>Garage</th>
                                        <th>Titre Foncier</th>
                                        <th>Localité</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Carte</th>
                                        <th>Lien Google Maps</th>
                                        <th>Détails</th>
                                        <th>Type de Transaction</th>
                                        <th>Visite 360°</th>
                                        <th>Image</th>
                                        <th>Valider</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($annonces as $annonce)
                                        <tr>
                                            <td>{{ $annonce->annonce_id }}</td>
                                            <td>{{ $annonce->titre }}</td>
                                            <td>{{ $annonce->description }}</td>
                                            <td>{{ $annonce->typePropriete }}</td>
                                            <td>{{ $annonce->montant }}</td>
                                            <td>{{ $annonce->superficie }}</td>
                                            <td>{{ $annonce->nbChambres }}</td>
                                            <td>{{ $annonce->nbSalleDeDouche }}</td>
                                            <td>{{ $annonce->veranda ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->terrasse ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->cuisine ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->dependance ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->piscine ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->garage ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->titreFoncier ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $annonce->localite }}</td>
                                            <td>{{ $annonce->latitude }}</td>
                                            <td>{{ $annonce->longitude }}</td>
                                            <td>
                                                @if ($annonce->latitude && $annonce->longitude)
                                                    <iframe width="200" height="150" frameborder="0" style="border:0;"
                                                        src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&center={{ $annonce->latitude }},{{ $annonce->longitude }}&zoom=15"
                                                        allowfullscreen>
                                                    </iframe>
                                                @else
                                                    Non disponible
                                                @endif
                                            </td>

                                            <td>
                                                @if ($annonce->latitude && $annonce->longitude)
                                                    <a href="https://www.google.com/maps?q={{ $annonce->latitude }},{{ $annonce->longitude }}"
                                                        target="_blank">
                                                        Voir sur Google Maps
                                                    </a>
                                                @else
                                                    Non disponible
                                                @endif
                                            </td>
                                            <td>{{ $annonce->details }}</td>
                                            <td>{{ $annonce->typeTransaction }}</td>
                                            <td>{{ $annonce->visite360 }}</td>
                                            <td>
                                                @if ($annonce->images->isNotEmpty())
                                                    <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                        @foreach ($annonce->images as $image)
                                                            @php
                                                                // Vérifier si le chemin de l'image existe dans le disque public
                                                                $imageUrl = Storage::disk('public')->exists($image->path)
                                                                    ? Storage::disk('public')->url($image->path)
                                                                    : asset('default-image.jpg'); // Image par défaut
                                                            @endphp
                                                            <div style="width: 50px; height: 50px; overflow: hidden; border-radius: 5px;">
                                                                <img src="{{ $imageUrl }}" alt="Image Annonce" style="width: 100%; height: 100%; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span>Aucune image</span>
                                                @endif
                                            </td>


                                            <td>{{ $annonce->validee ? 'Oui' : 'Non' }}</td>

                                            <td>
                                                <!-- Lien pour l'édition -->
                                                <a href="{{ route('annonce.edit', $annonce->annonce_id) }}"
                                                    class="btn btn-warning btn-sm ml-2">
                                                    <i class="fa fa-edit"></i> <!-- Icone d'édition -->
                                                </a>
                                                <!-- Formulaire pour Supprimer -->
                                                <form action="{{ route('annonces.destroy', $annonce->annonce_id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> <!-- Icone de suppression -->
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('Frontend/Home/assets/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('Frontend/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('Frontend/Home/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset('Frontend/Home/assets/js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('Frontend/Home/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('Frontend/Home/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('Frontend/Home/assets/js/demo/datatables-demo.js') }}"></script>
        @endsection
