@extends('layouts.app')

@section('page-title', 'Aggiungi progetto')

@section('main-content')
    <div class="row g-0">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                       Nuovo Progetto
                    </h1>

                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        
                        <label for="title" class="form-label">Nome Progetto</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                            maxlength="1024" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="content" class="form-label">Descrizione</label>
                        <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                            maxlength="1024" value="{{ old('content') }}">
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <label for="type_id" class="form-label">Tecnologia</label>
                        <select id="type_id" name class="form-select">
                            <option 
                            {{ old('type_id') == null ? 'selected' : '' }}
                            value="">
                                Seleziona un Linguaggio...
                            </option>
                            @foreach ($types as $singleType)
                                <option 
                                {{ old('type_id') == $singleType->id ? 'selected' : '' }}
                                value="{{ $singleType->id }}">
                                    {{ $singleType->title }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label class="form-label">Tecnologie</label>
            
                            <div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                            class="form-check-input"
                                            type="checkbox"
                                            id="technology-{{ $technology->id }}"
                                            name="technologies[]"
                                            value="{{ $technology->id }}">
                                        <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection