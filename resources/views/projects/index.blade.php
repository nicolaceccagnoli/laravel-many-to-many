@extends('layouts.guest')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <section id="index-admin">
        <div class="container">
            <div class="row g-0">
                @foreach ($projects as $project)
                    <div class="d-flex justify-content-center col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                        <div class="my-card">
                            <div class="my-card-body d-flex flex-column justify-content-between h-100">
                                <h3 class="text-center">
                                    {{ $project->title }}
                                </h3>
    
                                <p>
                                    {{ $project->content }}
                                </p>
    
                                <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="show-button align-self-baseline">
                                    Mostra
                                </a>
    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection