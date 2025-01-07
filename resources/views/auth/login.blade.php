@extends('layouts.app')

@section('title', "Connexion")

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="shadow-lg p-5 rounded bg-white" style="width: 100%; max-width: 500px;">
        <h3 class="mb-4 text-center">Connexion</h3>
        <form method="POST" class="py-4" action="#">
            @csrf
            <!-- Champ Email -->
            <div class="mb-4">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" >
            </div>
            
            <!-- Champ Mot de Passe -->
            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" >
            </div>

            <!-- Bouton Connexion -->
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</div>
@endsection
