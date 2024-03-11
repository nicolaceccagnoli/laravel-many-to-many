@extends('layouts.app')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <section id="index-admin">
        <div id="add">
            <a href="{{ route('admin.projects.create') }}" class="add-button mb-5">
                <span>Aggiungi</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="row g-0">
            @foreach ($projects as $project)
                <div class="d-flex justify-content-center col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="my-card m-1">
                        <div class="my-card-body d-flex flex-column justify-content-between h-100">
                            <h3 class="text-center">
                                {{ $project->title }}
                            </h3>

                            <p>
                                {{ $project->content }}
                            </p>

                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="show-button align-self-baseline">
                                Mostra
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection