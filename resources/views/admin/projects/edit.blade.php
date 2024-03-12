@extends('layouts.app')

@section('page-title', $project->title.' edit')

@section('main-content')
    <div class="row g-0">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        modifica Progetto
                    </h1>

                    <form action="{{ route('admin.projects.update',['project' => $project->slug])  }}" method="POST" enctype="multipart/form-data">
                        
                        @method('PUT')

                        @csrf

                        <label for="title" class="form-label">Nome Progetto</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                            maxlength="1024" value="{{$project->title, old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="cover_img" class="form-label"> Cover Image </label>
                        <input type="file" class="form-control" id="cover_img" name="cover_img">

                        {{-- Se il progetto ha già una cover_img --}}
                        @if ($project->cover_img != null)
                            <div class="mt-2">
                                <h4>
                                    Cover attuale:
                                </h4>
                                <img src="{{ asset( 'storage/'.$project->cover_img) }}" alt="cover">
                                {{-- Creo una checkbox per chiedere se voglio eliminare la cover --}}
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" id="delete_cover_img" name="delete_cover_img">
                                    <label class="form-check-label" for="delete_cover_img">
                                        Rimuovi immagine
                                    </label>
                                </div>
                            </div>
                        @endif
                        <label for="content" class="form-label">Descrizione</label>
                        <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                            maxlength="1024" value="{{$project->content, old('content') }}">
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="type_id" class="form-label">Tecnologia</label>
                        <select name="type_id" id="type_id" class="form-select mb-3">
                            <option
                                {{ old('type_id', $project->type_id) == null ? 'selected' : '' }} 
                                value="">
                                Seleziona un Linguaggio...
                            </option>
                            @foreach ($types as $singleType)
                                <option {{ old('type_id', $project->type_id) == $singleType->id ? 'selected' : '' }} 
                                value="{{ $singleType->id }}">
                                    {{ $singleType->title }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input
                                        {{-- Se c'è l'old, vuol dire che c'è stato un errore --}}
                                        @if ($errors->any())
                                            {{-- Faccio le verifiche sull'old --}}
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                        @else
                                            {{-- Faccio le verifiche sulla collezione --}}
                                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                                        @endif
                                        class="form-check-input"
                                        type="checkbox"
                                        id="technology-{{ $technology->id }}"
                                        name="technologies[]"
                                        value="{{ $technology->id }}">
                                    <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiorna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection