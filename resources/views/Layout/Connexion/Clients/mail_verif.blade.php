@extends('Layout.headMaster')


@section('content')
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('Generales/img/aub25.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 90vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

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
                                <div
                                class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            <h4 class="text-center">Confirmons que c'est bien Vous</h4>
                            <p class="text-center">Nous avons mis à jour notre expérience et devons confirmer votre adresse e-mail. Entrez le code sécurisé que nous avons envoyé dans votre boîte de réception.</p>
                            <form action="{{ route('post_sclient_ign_in') }}" method="POST" class="mt-4">
                                @csrf
                                <div class=" form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Code a 6 chiffres</label>
                                    <input type="text" class="form-control" name="code_verif" id="code_verif"
                                        aria-describedby="emailHelp"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;" placeholder="Entrer le code">
                                    <span style="text-danger">
                                        @error('code_verif')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                        <button type="submit" class="btn  w-100 mt-3"
                            style="background-color: #fd7e14; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">Valider</button>

                                    <!-- Social Login -->
          <!--           <div class="form-group col-lg-12 mx-auto">
                        <a href="#" class="btn  btn-block py-2 btn-facebook"
                             style="background-color: #fd7e14; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continue with Facebook</span>
                        </a>
                        <a href="#" class="btn btn-block py-2 btn-twitter"
                             style="background-color: #fd7e14; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                            <i class="fa fa-twitter mr-2"></i>
                            <span class="font-weight-bold">Continue with Twitter</span>
                        </a>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100" style="font-size: 25px">
                        <p class="text-muted font-weight-bold text-center" >Vérifiez le courrier indésirable s'il n'est pas dans votre boîte de réception</p>
                      <a href=""><h4 class="text-center text-success">Renvoyez le code</h4></a>
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
