@extends('Layout.home')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg p-4" style="border-radius: 12px;  margin-bottom:150px">
        <h3 class="text-center mb-4 text-primary">Filtrer les Propriétés</h3>
        <form action="" method="GET">
            <div class="row">
                <!-- Type de propriété -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="typePropriete" class="font-weight-bold">Type de Propriété</label>
                        <select class="form-control" name="typePropriete" id="typePropriete">
                            <option value="">Sélectionnez...</option>
                            <option value="Maison">Maison</option>
                            <option value="Appartement">Appartement</option>
                            <option value="Villa">Villa</option>
                        </select>
                    </div>
                </div>

                <!-- Localité -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="localite" class="font-weight-bold">Localité</label>
                        <select class="form-control" name="localite" id="localite">
                            <option value="">Sélectionnez...</option>
                            <option value="Paris">Paris</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Nice">Nice</option>
                        </select>
                    </div>
                </div>

                <!-- Nombre de chambres -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nbChambres" class="font-weight-bold">Nombre de Chambres</label>
                        <select class="form-control" name="nbChambres" id="nbChambres">
                            <option value="">Sélectionnez...</option>
                            <option value="1">1 chambre</option>
                            <option value="2">2 chambres</option>
                            <option value="3">3+ chambres</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Piscine -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="piscine" class="font-weight-bold">Piscine</label>
                        <select class="form-control" name="piscine" id="piscine">
                            <option value="">Sélectionnez...</option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                        </select>
                    </div>
                </div>

                <!-- Garage -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="garage" class="font-weight-bold">Garage</label>
                        <select class="form-control" name="garage" id="garage">
                            <option value="">Sélectionnez...</option>
                            <option value="1">1 Garage</option>
                            <option value="2">2+ Garages</option>
                        </select>
                    </div>
                </div>

                <!-- Véranda -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="veranda" class="font-weight-bold">Véranda</label>
                        <select class="form-control" name="veranda" id="veranda">
                            <option value="">Sélectionnez...</option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Cuisine -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cuisine" class="font-weight-bold">Cuisine</label>
                        <select class="form-control" name="cuisine" id="cuisine">
                            <option value="">Sélectionnez...</option>
                            <option value="1">Cuisine 1</option>
                            <option value="2">Cuisine 2+</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-lg btn-dark" style="width: 40%; padding: 15px; font-size: 18px; border-radius: 12px; background-color: #318093; color: white;">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
