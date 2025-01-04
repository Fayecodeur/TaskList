@extends('layouts.app')
@section('title','Modifier une tache')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="shadow-lg rounded p-4 bg-white">
                    <form action="{{route('update', $task->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <!-- Section titre et bouton "Retour" -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3>Modifier une Tâche</h3>
                            <a href="{{ route('index') }}" class="btn btn-outline-primary">Retour</a>
                        </div>


                        <!-- Champ Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" value="{{old('title', $task->title)}}" class="form-control @error('title') is-invalid @enderror " id="title" name="title">
                            @error('title')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Champ Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror " id="description" name="description" rows="4"> {{old('description', $task->description)}}</textarea>
                            @error('description')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Checkbox Terminé -->
                        <div class="mb-3 form-check">
                            <input type="checkbox"
                                   {{$task->status == 1? 'checked' : '' }}
                                   class="form-check-input"
                                   id="status"
                                   name="status">
                            <label class="form-check-label" for="status">Terminé</label>
                        </div>

                        <!-- Bouton Ajouter -->
                        <button type="submit" class="btn btn-warning w-100">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
