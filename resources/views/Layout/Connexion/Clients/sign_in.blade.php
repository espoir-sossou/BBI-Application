@extends('Layout.headMaster')


@section('content')
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('{{ asset('Frontend/Home/assets/imgs/aub25.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 90vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

            <div class="col-md-12" style="margin-top: -50px;">
                <div class="containair">
                    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                    <div class="row d-flex align-items-center justify-content-center" style="height: 80vh;">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 p-5"
                            style="background-color: #fff;  border-radius: 10px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            @if (Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif

                            @if (Session::get('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif

                            <h4 class="">Se connecter ou s'inscrire</h4>
                            <form action="{{ route('login.post') }}" method="POST" class="mt-4">
                                @csrf
                                <!-- Champs du formulaire -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label text-dark">Email Address</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label text-dark">Mot de passe</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 10px;">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn w-100 mt-3"
                                    style="background-color: #318093; color:white; border: 1px solid #ccc; border-radius: 30px; padding: 10px; margin-bottom: 10px;">
                                    Submit
                                </button>

                                <!-- Social Login -->
                                <!--           <div class="form-group col-lg-12 mx-auto">
                                    <a href="#" class="btn  btn-block py-2 btn-facebook"
                                         style="background-color: #318093; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                                        <i class="fa fa-facebook-f mr-2"></i>
                                        <span class="font-weight-bold">Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="btn btn-block py-2 btn-twitter"
                                         style="background-color: #318093; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                                        <i class="fa fa-twitter mr-2"></i>
                                        <span class="font-weight-bold">Continue with Twitter</span>
                                    </a>
                                </div>

                                <!-- Already Registered -->
                                <div class="text-center w-100" style="font-size: 25px">
                                    <p class="text-muted font-weight-bold">Vous n'avez pas de compte ?
                                        <a href="{{ route('signUpPage') }}" class="ml-2" style="color:#318093;">Créer un
                                            compte</a>
                                    </p>
                                </div>

                                <!-- Ligne avec "ou" centré entre deux traits horizontaux -->
                                <div class="d-flex align-items-center my-4">
                                    <hr class="flex-grow-1" style="border: 1px solid #ccc;">
                                    <span class="px-3 text-muted" style="font-size: 18px;">ou</span>
                                    <hr class="flex-grow-1" style="border: 1px solid #ccc;">
                                </div>

                                <!-- Bouton Se connecter avec Google -->
                                <div class="text-center">
                                    <a href="{{ route('login.google') }}" class="btn btn-outline-primary"
                                        style="font-size: 18px; padding: 10px 20px; color: #318093; border-color: #318093;">
                                        <img src="Frontend/Home/assets/imgs/google.png" alt="Google"
                                            style="width: 30px; height: auto; margin-right: 10px;"> Se connecter avec Google
                                    </a>
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
@section('scripts')
    <script>
        // Désactive le bouton retour après déconnexion
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, null, window.location.href);
            };
        }
    </script>
@endsection
