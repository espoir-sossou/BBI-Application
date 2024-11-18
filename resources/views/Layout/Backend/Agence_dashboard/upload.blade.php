@extends('Layout.agence_layout')

@section('content')
    <div class="container">
        <h2>Créer une nouvelle annonce</h2>

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

        <form action="{{ route('upload.file.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="file">Upload file:</label>
            <input type="file" name="file" id="file" required> <!-- Nom du champ est "file" -->
            <button type="submit">Upload</button>
        </form>

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif


    </div>
@endsection
