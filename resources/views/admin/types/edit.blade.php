@extends('layouts.app')

@section('page-title', $type->title.' Edit')

@section('main-content')
    <div class="row g-0">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        Modifica Linguaggio
                    </h1>

                    <form action="{{ route('admin.types.update',['type' => $type->slug])  }} " method="POST">
                        
                        @method('PUT')

                        @csrf

                        <label for="title" class="form-label">Nome Linguaggio</label>
                        <input type="text" class="mb-3 form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del linguaggio"
                            maxlength="64" value="{{$type->title, old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
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