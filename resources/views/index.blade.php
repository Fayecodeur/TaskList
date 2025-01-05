@extends('layouts.app')

@section('title', 'Liste des Tâches')

@section('content')
<div class="container mt-3">
    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
        <i class="bi bi-check-circle-fill me-2" style="font-size: 1.5rem;"></i>
        <div>
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="shadow-lg rounded p-4 bg-white">
        <div class="d-flex justify-content-between mb-3">
            <h5>Liste des Tâches</h5>
            <a href="{{ route('task.create') }}" class="btn btn-outline-primary btn-sm align-item-center">Ajouter une Tâche</a>
        </div>

        <!-- Tableau des tâches -->
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->status == 1)
                                <span class="badge text-bg-success">Terminé</span>
                            @else
                                <span class="badge text-bg-warning">En cours</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method("DELETE")
                                <button onclick="return confirm('Etes vous sur de supprimer cette tâche ?')" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
