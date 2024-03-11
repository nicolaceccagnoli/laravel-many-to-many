@extends('layouts.guest')

@section('page-title', 'Tutti i Linguaggi')

@section('main-content')

<section id="guest-index-types">
    <div class="row g-0 justify-content-around ">
        @foreach ($types as $singleType)
            <div class="d-flex justify-content-center col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                <div class="my-card m-1">
                    <div class="my-card-body d-flex flex-column justify-content-center h-100">
                        <h3 class="text-center">
                            {{ $singleType->title }}
                        </h3>

                        <p>
                            {{ $singleType->content }}
                        </p>

                        <div class="align-self-center">
                            <a href="{{ route('types.show', ['type' => $singleType->slug]) }}" class="show-button align-self-baseline">
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