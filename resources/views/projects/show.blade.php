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
                                    Tecnologia utilizzata:
                                </span>
                                <br>
                                <a href="{{ route('types.show', ['type' => $project->type->slug]) }}"> 
                                    {{ $project->type->title }}
                                </a>

                            @else
                                -
                            @endif
    
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