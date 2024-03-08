@extends('layouts.guest')

@section('page-title', $type->title)

@section('main-content')
    <section id="type-show">
        <div class="row g-0">
            <div class="col d-flex justify-content-center">
                <div class="my-card">
                    <div class="my-card-body">
                        <h1 class="text-center mb-5">
                            {{ $type->title }}
                        </h1>

                    <div class="text-center">

                        <ul>

                            {{-- Per ogni progetto che ho realizzato con la relativa tecnologia 
                            stampo un link che mi riporta al singolo progetto --}}
                            @foreach ($type->projects as $project)
                                <li class="text-start">
                                    <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="mb-3"> 
                                        {{ $project->title }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection