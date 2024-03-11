@extends('layouts.guest')

@section('page-title', 'Tutte le Tecnologie')

@section('main-content')

<section id="guest-index-technologies">
    <div class="row g-0 justify-content-around">
        @foreach ($technologies as $technology)
            <div class="col-12 d-flex justify-content-center col-xs-6 col-sm-4 col-md-3 mb-3">
                <div class="my-card m-1">
                    <div class="my-card-body d-flex flex-column justify-content-center h-100">
                        <h3 class="text-center">
                            {{ $technology->title }}
                        </h3>

                        <p>
                            {{ $technology->content }}
                        </p>

                        <div class="align-self-center">
                            <a href="{{ route('technologies.show', ['technology' => $technology->slug]) }}" class="show-button align-self-baseline">
                                Mostra
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


@endsection