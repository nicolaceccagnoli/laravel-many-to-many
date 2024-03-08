@extends('layouts.app')

@section('page-title', 'Tutte le tecnologie')

@section('main-content')
<section id="index-technologies">
{{-- <div id="add">
    <a href="{{ route('admin.types.create') }}" class="add-button mb-5">
        <span>Aggiungi</span>
        <i class="fa-solid fa-plus"></i>
    </a>
</div> --}}

    <div class="row g-0">
        @foreach ($allTechnologies as $technology)
            <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                <div class="my-card m-1">
                    <div class="my-card-body d-flex flex-column justify-content-center h-100">
                        <h3 class="text-center">
                            {{ $technology->title }}
                        </h3>

                        <p>
                            {{ $technology->content }}
                        </p>

                        {{-- <div class="align-self-center">
                            <a href="{{ route('admin.types.show', ['type' => $singleType->slug]) }}" class="show-button align-self-baseline">
                                Mostra
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
