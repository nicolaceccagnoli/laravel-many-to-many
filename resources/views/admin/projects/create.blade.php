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
                                Seleziona una tecnologia...
                            </option>
                            @foreach ($types as $singleType)
                                <option 
                                {{ old('type_id') == $singleType->id ? 'selected' : '' }}
                                value="{{ $singleType->id }}">
                                    {{ $singleType->title }}
                                </option>
                            @endforeach
                        </select>

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