<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("edit", ['tasks' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveTaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('index')->with('success', 'Tâche ajoutée avec succès!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('index')->with('success', 'Tâche modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('index')->with('success', 'Tâche supprimée avec succès!');
    }
}
