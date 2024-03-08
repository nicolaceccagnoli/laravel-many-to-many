@extends('layouts.app')

@section('page-title', 'Aggiungi una Tecnologia')

@section('main-content')
    <div class="row g-0">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        Aggiungi Tecnologia
                    </h1>

                    <form action="{{ route('admin.technologies.store')  }} " method="POST">
                        
                        @csrf

                        <label for="title" class="form-label">Nome Tecnologia</label>
                        <input type="text" class="mb-3 form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome della tecnologia"
                            maxlength="64" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
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