@extends('Layout.agence_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Liste des Offres en vedette</h1>
        <p class="mb-4">Voici toutes les Offres en vedette disponibles dans la base de données.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Offres en vedette</h6>
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
                    @if (!$hasOffres)
                        <div class="alert alert-warning">
                            <strong>Aucune offre en vedette disponible.</strong>
                            <p>Commencez à promouvoir vos propriétés en ajoutant des offres en vedette !</p>
                            <a href="{{ route('offreEnVedette.add.page') }}" class="btn btn-primary">Créer une offre en vedette</a>
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
                                        <th>Localisation</th>
                                        <th>Détails</th>
                                        <th>Type de Transaction</th>
                                        <th>Visite 360°</th>
                                        <th>Vidéo</th>
                                        <th>Image</th>
                                        <th>Valider</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offresEnVedette as $offre)
                                        <tr>
                                            <td>{{ $offre->offre_en_vedettes_id }}</td>
                                            <td>{{ $offre->titre }}</td>
                                            <td>{{ $offre->description }}</td>
                                            <td>{{ $offre->typePropriete }}</td>
                                            <td>{{ $offre->montant }}</td>
                                            <td>{{ $offre->superficie }}</td>
                                            <td>{{ $offre->nbChambres }}</td>
                                            <td>{{ $offre->nbSalleDeDouche }}</td>
                                            <td>{{ $offre->veranda ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->terrasse ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->cuisine ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->dependance ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->piscine ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->garage ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->titreFoncier ? 'Oui' : 'Non' }}</td>
                                            <td>{{ $offre->localite }}</td>
                                            <td>{{ $offre->localisation }}</td>
                                            <td>{{ $offre->details }}</td>
                                            <td>{{ $offre->typeTransaction }}</td>
                                            <td>{{ $offre->visite360 }}</td>
                                            <td>{{ $offre->video }}</td>
                                            <td>
                                                @if ($offre->image)
                                                    <img src="{{ asset('uploads/offres/' . $offre->image) }}" alt="Image Offre" width="50">
                                                @else
                                                    Aucun
                                                @endif
                                            </td>
                                            <td>{{ $offre->validee ? 'Oui' : 'Non' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('offreEnVedette.edit', $offre->offre_en_vedettes_id) }}" class="btn btn-warning btn-sm ml-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('offreEnVedette.destroy', $offre->offre_en_vedettes_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
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
