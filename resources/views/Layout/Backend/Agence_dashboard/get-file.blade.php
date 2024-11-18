@extends('Layout.agence_layout')

@section('content')
<h1>Galerie d'Images</h1>

@if (count($files) > 0)
    <div class="gallery">
        @foreach ($files as $file)
            <div class="image-item">
                <img src="{{ $file['url'] }}" alt="{{ $file['fileName'] }}" style="max-width: 100%; height: auto;">
            </div>
        @endforeach
    </div>
@else
    <p>Aucune image disponible.</p>
@endif

    <a href="{{ route('upload.file') }}">Téléverser un autre fichier</a>
@endsection
