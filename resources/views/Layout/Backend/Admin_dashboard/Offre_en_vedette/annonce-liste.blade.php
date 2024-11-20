@extends('Layout.admin_layout')

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
                                @foreach ($OffreEnVedette as $OffreEnVedette)
                                    <tr>
                                        <td>{{ $OffreEnVedette->offre_en_vedettes_id }}</td>
                                        <td>{{ $OffreEnVedette->titre }}</td>
                                        <td>{{ $OffreEnVedette->description }}</td>
                                        <td>{{ $OffreEnVedette->typePropriete }}</td>
                                        <td>{{ $OffreEnVedette->montant }}</td>
                                        <td>{{ $OffreEnVedette->superficie }}</td>
                                        <td>{{ $OffreEnVedette->nbChambres }}</td>
                                        <td>{{ $OffreEnVedette->nbSalleDeDouche }}</td>
                                        <td>{{ $OffreEnVedette->veranda ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->terrasse ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->cuisine ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->dependance ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->piscine ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->garage ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->titreFoncier ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $OffreEnVedette->localite }}</td>
                                        <td>{{ $OffreEnVedette->localisation }}</td>
                                        <td>{{ $OffreEnVedette->details }}</td>
                                        <td>{{ $OffreEnVedette->typeTransaction }}</td>
                                        <td>{{ $OffreEnVedette->visite360 }}</td>
                                        <td>{{ $OffreEnVedette->video }}</td>
                                        <td>
                                            @if ($OffreEnVedette->image)
                                                <img src="{{ asset('storage/' . $OffreEnVedette->image) }}"
                                                    alt="Image Annonce" width="50">
                                            @else
                                                Aucun
                                            @endif
                                        </td>

                                        <td>{{ $OffreEnVedette->validee ? 'Oui' : 'Non' }}</td>
                                        <td class="text-right">
                                            <div class="button-container d-flex justify-content-end">
                                                <!-- Formulaire pour Valider / Annuler la validation -->
                                                @if ($OffreEnVedette->validee)
                                                    <form
                                                        action="{{ route('admin.OffreEnVedette.valider', $OffreEnVedette->offre_en_vedettes_id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="action" value="unvalidate">
                                                        <button type="submit" class="btn btn-success btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                           <span> <i class="fa fa-check-circle"></i> Retirer</span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.OffreEnVedette.valider', $OffreEnVedette->offre_en_vedettes_id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="action" value="validate">
                                                        <button type="submit" class="btn btn-warning btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                          <span>  <i class="fa fa-times-circle"></i>Approuver</span>
                                                        </button>
                                                    </form>
                                                @endif
                                                <!-- Formulaire pour Supprimer -->
                                                <form
                                                    action="{{ route('admin.offreEnVedette.destroy', $OffreEnVedette->offre_en_vedettes_id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
