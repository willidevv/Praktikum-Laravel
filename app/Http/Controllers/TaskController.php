<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Pastikan request berisi data yang benar
        $data = $request->all();

        // Debug data yang diterima
        Log::info($data);

        // Validasi dan simpan data
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'due_date' => 'required|date',
        // Aturan lainnya
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index');
        }

    public function show($id)
    {
        $task = Task::find($id);
        
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found.');
        }

        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari task berdasarkan ID
        $task = Task::find($id);
    
        // Jika task ditemukan, hapus
        if ($task) {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }
    
        // Jika task tidak ditemukan
        return redirect()->route('tasks.index')->with('error', 'Task not found.');
    }
}
