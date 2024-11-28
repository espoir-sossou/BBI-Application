@extends('Layout.home')

@section('content')
<div class="row mb-5" style="position: relative;">
    <div class="col-lg-12">
        <div class="section properties annonce">
            <div class="container">
                <div class="row properties-box">
                    @forelse ($annonces as $annonce)
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                        <div class="item">
                            @php
                                $imagePath = $annonce->image
                                    ? Storage::url($annonce->image)
                                    : asset('Frontend/Home/assets/imgs/default.jpg');
                            @endphp
                            <a href="{{ route('annonce.details', $annonce->annonce_id) }}">
                                <img src="{{ $imagePath }}" alt="Image Annonce" style="max-width: 400px; height: 200px">
                            </a>
                            <span class="category"
                                style="
                                background-color: {{ $annonce->typeTransaction === 'A louer' ? 'green' : ($annonce->typeTransaction === 'A vendre' ? '#17a2b8' : 'transparent') }};
                                color: white;
                                padding: 5px 10px;
                                border-radius: 5px;
                                font-size: 14px;
                                display: inline-block;">
                                {{ $annonce->typeTransaction }}
                            </span>
                            <h6>{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</h6>
                            <h4>
                                <a href="{{ route('annonce.details', $annonce->annonce_id) }}">{{ $annonce->titre }}</a>
                            </h4>
                            <ul>
                                <li>nbr Chambres : <span>{{ $annonce->nbChambres }}</span></li>
                                <li>Salles de bain : <span>{{ $annonce->nbSalleDeDouche }}</span></li>
                                <li>Superficie : <span>{{ $annonce->superficie }} m²</span></li>
                                <li>Parking : <span>{{ $annonce->garage ? '1' : '0' }}</span></li>
                                <li>Garage : <span>{{ $annonce->garage ? 'Oui' : 'Non' }}</span></li>
                                <li>Piscine : <span>{{ $annonce->piscine ? 'Oui' : 'Non' }}</span></li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <p>Aucune annonce ne correspond à vos critères de recherche.</p>
                @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
