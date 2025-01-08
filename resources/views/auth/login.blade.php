@extends('layouts.app')

@section('title', "Connexion")

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="shadow-lg p-5 rounded bg-white" style="width: 100%; max-width: 500px;">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <!-- Bouton de fermeture avec btn-close (pour Bootstrap 5) -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3 class="mb-4 text-center">Connexion</h3>
        <form method="POST" class="py-4" action="{{ route('login') }}">
            @csrf
            <!-- Champ Email -->
            <div class="mb-4">
                <label for="email" class="form-label">Adresse email</label>
                <input type="text"
                 class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Entrez votre adresse email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Champ Mot de Passe -->
            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Entrez votre mot de passe">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Bouton Connexion -->
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</div>
@endsection
