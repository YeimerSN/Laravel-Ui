<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
        ]);

        $request->user()->tasks()->create($request->only('title', 'detail'));

        //Task::create($request->only('title', 'detail'));

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasks = Task::findOrFail($id);
        $this->authorize('update', $tasks);
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
        ]);

        $tasks = Task::findOrFail($id);
        $this->authorize('update', $tasks);
        $tasks->update($request->only('title', 'detail'));

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('update', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('sucess', 'Tarea eliminada exitosamente!');
    }
}
