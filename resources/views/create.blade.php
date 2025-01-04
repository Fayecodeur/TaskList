@extends('layouts.app')

@section('title', isset($task) ? ' Modifier une tâche' : 'Ajouter une tâche')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Formulaire centré avec une largeur max -->
            <div class="col-md-6">
                <div class="shadow-lg rounded p-4 bg-white">
                    <form action="{{ isset($task)? route('task.update', $task->id): route('task.store') }}" method="POST">
                        @if(isset($task))
                            @method("PUT")
                        @endif
                        <!-- Section titre et bouton "Retour" -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3> {{isset($task)? 'Modifier une tache' : 'Ajouter une Tâche' }} </h3>
                            <a href="{{ route('task.index') }}" class="btn btn-outline-primary">Retour</a>
                        </div>

                        @csrf

                        <!-- Champ Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text"
                                   value="{{isset($task)? $task->title : old('title')}}"
                                   class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Champ Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="4">{{ isset($task) ? $task->description : old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Checkbox Terminé -->
                        <div class="mb-3 form-check">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" class="form-check-input" id="status" name="status"
                                   value="1" {{ (isset($task) && $task->status) || old('status') ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Terminé</label>
                        </div>


                        <!-- Bouton Ajouter -->
                        <button type="submit" class="btn btn-primary w-100">{{isset($task)? 'Mettre à jour' : 'Ajouter'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
