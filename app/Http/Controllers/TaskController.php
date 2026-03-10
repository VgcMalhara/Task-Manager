<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks (with Pagination & Filtering).
     */
    public function index(Request $request)
    {
        // Login wela inna user ge tasks vitharak gannawa
        $query = Task::where('user_id', Auth::id());

        // Status filter ekak thiyenawanam (pending/completed etc.)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pagination: Page ekakata tasks 10 gane pennanna
        $tasks = $query->latest()->paginate(10)->withQueryString();

        return view('dashboard', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create'); // Create form ekata yana view eka
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        // User ID eka ekka task eka save kirima
        Task::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        // Task eka aithi me user tatama kiyala check karanawa (Security)
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified task from storage (Soft Delete).
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        // Model eke 'use SoftDeletes' thiyena nisa meka auto soft delete wenawa
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully (Soft Deleted)!');
    }
}
