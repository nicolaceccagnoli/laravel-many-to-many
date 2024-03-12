@extends('layouts.guest')

@section('page-title', '{{ $project->title }}')

@section('main-content')
<section id="show-guest">
    <div class="row g-0">
        <div class="col d-flex justify-content-center">
            <div class="my-card">
                <div class="my-card-body">
                    <h1 class="text-center mb-5">
                        {{ $project->title }}
                    </h1>

                    <p class="mb-3">                        
                        {{ $project->content }}
                    </p>

                    <div class="mb-3">

                        @if ($project->type != null)

                            <span>
                                Linguaggio utilizzata:
                            </span>
                            <br>
                            <a href="{{ route('types.show', ['type' => $project->type->slug]) }}"> 
                                {{ $project->type->title }}
                            </a>

                        @else
                            -
                        @endif

                    </div>

                    {{-- Se il valore della colonna cover_img del singolo project è diverso da null --}}
                    @if ($project->cover_img != null)
                        <div class="mb-3">

                            <img src="{{ asset('storage/'.$project->cover_img) }}" alt="{{ $project->title }}">

                        </div>
                    @endif

                    <div class="mb-3">
                        <div>
                            Tecnologie:
                            <br>
                            @forelse ($project->technologies as $technology)
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-primary">
                                    {{ $technology->title }}
                                </a>
                            @empty
                                -
                            @endforelse
                        </div>
                    </div>

                    <div>
                        Creato il: 
                        <span class="text-success">
                            {{ $project->created_at->format('d/m/Y') }}
                        </span>
                        <br>
                        Alle: 
                        <span>
                            {{ $project->created_at->format('H:i')  }}
                        </span>
                    </div>

                    @if ($project['updated_at'] != $project['created_at'])
                        <div>
                            Modificato il: 
                            <span class="text-warning">
                                {{ $project->updated_at->format('d/m/Y') }}
                            </span>
                            <br>
                            Alle: 
                            <span>
                                {{ $project->updated_at->format('H:i')  }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection