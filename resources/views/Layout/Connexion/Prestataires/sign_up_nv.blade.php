@extends('Layout.headMaster')


@section('content')
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('Admin_dashboard/assets/images/aub6.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 90vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

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
                            <h4 class="">Se connecter en tant que Proprietaire</h4>
                            <form action="{{ route('prestataire_post_sign_up') }}" method="POST" class="mt-4">
                                @csrf
                                <div class=" form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Username</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="nameHelp"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Email Address</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                        <div class=" form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label text-dark">Mot de passe</label>
                            <input type="text" name="password" class="form-control" id="password"
                                style=" border: 1px solid #ccc;  border-radius: 5px; padding: 10px;margin-bottom: 10px;">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn  w-100 mt-3" id="logout-form"
                            style="background-color: #fd7e14; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">Submit</button>

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
                        <p class="text-muted font-weight-bold" >Pas de compte Registerer? <a
                                href="{{ route('prestataire_sign_in') }}" class=" ml-2" style="color:#fd7e14;">Se Connecter</a>
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
