<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Lijst met alle taken tonen
    public function index()
    {
        // Haal alle taken op, nieuwste eerst
        $tasks = Task::orderBy('created_at', 'desc')->get();

        // Geef de taken door aan de view resources/views/tasks/index.blade.php
        return view('tasks.index', compact('tasks'));
        // compact('tasks') == ['tasks' => $tasks]
    }

    // Formulier voor nieuwe taak
    public function create()
    {
        return view('tasks.create');
    }

    // Nieuwe taak opslaan in de database
    public function store(Request $request)
    {
        // Validatie: titel is verplicht
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        // Maak een nieuwe taak met de gevalideerde data
        Task::create($validated);

        // Terug naar de lijst met een succesbericht
        return redirect()->route('tasks.index')
            ->with('success', 'Taak aangemaakt.');
    }

    // Formulier om taak te bewerken
    public function edit(Task $task)
    {
        // De $task komt automatisch uit de database (route model binding)
        return view('tasks.edit', compact('task'));
    }

    // Bestaande taak bijwerken
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Taak bijgewerkt.');
    }

    // Taak verwijderen
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Taak verwijderd.');
    }
}
