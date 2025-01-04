<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(SaveTaskRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status, // Directement la valeur envoyée (0 ou 1)
        ]);

        return redirect()->route('index')->with('success', 'Tâche ajoutée avec succès!');
    }


  public function edit(int $id)
  {
      $task = Task::findOrFail($id);
      return view('create', compact('task'));
  }

    public function update(SaveTaskRequest $request, int $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return redirect()->route('index')->with('success', 'Tâche modifiée avec succès!');

    }

    public function delete(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index')->with('success', 'Tâche supprimée avec succès!');

    }





}
