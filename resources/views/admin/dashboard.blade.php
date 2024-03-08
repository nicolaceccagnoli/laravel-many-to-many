@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <section id="dashboard">
        <div class="row g-0">
            <div class="col-12 text-center">
                
                @if ($stringaSalutaUtente != null)
                    <h1>
                        Benvenuto
                        <span>{{ $stringaSalutaUtente }}</span> !
                    </h1>
                @endif
                    
            </div>
        </div>
    </section>
@endsection
