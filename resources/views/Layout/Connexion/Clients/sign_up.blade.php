@extends('Layout.headMaster')


@section('content')
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('Frontend/Home/assets/imgs/aub25.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 120vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

            <div class="col-md-12" style="margin-top: -50px;">
                <div class="containair">
                    <div class="row d-flex align-items-center justify-content-center" style="height: 80vh;">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 p-5"
                            style="background-color: #fff;  border-radius: 10px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            <h4 class="">Se connecter ou s'inscrire</h4>
                            <form action="{{ route('signup.user') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="lastname" class="form-label text-dark">Nom</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;" value="{{ old('lastname') }}">
                                    <span class="text-danger">
                                        @error('lastname') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="firstname" class="form-label text-dark">Prénom</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;" value="{{ old('firstname') }}">
                                    <span class="text-danger">
                                        @error('firstname') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label text-dark">Numéro de téléphone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;" value="{{ old('phone') }}">
                                    <span class="text-danger">
                                        @error('phone') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="sexe" class="form-label text-dark">Sexe</label>
                                    <select name="sexe" id="sexe" class="form-control" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                        <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                                        <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('sexe') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="role" class="form-label text-dark">Rôle</label>
                                    <select name="role" id="role" class="form-control" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                        <option value="ACHETEUR" {{ old('role') == 'ACHETEUR' ? 'selected' : '' }}>Acheteur</option>
                                        <option value="VENDEUR" {{ old('role') == 'VENDEUR' ? 'selected' : '' }}>Vendeur</option>
                                        <option value="AGENCE" {{ old('role') == 'AGENCE' ? 'selected' : '' }}>Agence</option>
                                        <option value="USER" {{ old('role') == 'USER' ? 'selected' : '' }}>Simple Utilisateur</option>
                                        <option value="ADMIN" {{ old('role') == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>

                                    </select>
                                    <span class="text-danger">
                                        @error('role') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label text-dark">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;" value="{{ old('email') }}">
                                    <span class="text-danger">
                                        @error('email') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label text-dark">Mot de passe</label>
                                    <input type="text" class="form-control" name="password" id="password" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                    <span class="text-danger">
                                        @error('password') {{ $message }} @enderror
                                    </span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="adresse" class="form-label text-dark">Adresse</label>
                                    <textarea name="adresse" id="adresse" class="form-control" rows="3" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">{{ old('adresse') }}</textarea>
                                    <span class="text-danger">
                                        @error('adresse') {{ $message }} @enderror
                                    </span>
                                </div>

                                <button type="submit" class="btn w-100 mt-3" style="background-color: #318093; color:white; border: 1px solid #ccc; border-radius: 30px; padding: 10px;">S'inscrire</button>
                                <div class="text-center w-100" style="font-size: 25px">
                                    <p class="text-muted font-weight-bold">Vous avez deja un compte ?
                                        <a href="{{ route('loginPage') }}" class="ml-2" style="color:#318093;">Se connecter</a>
                                    </p>
                                </div>
                            </form>


                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
