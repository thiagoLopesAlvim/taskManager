<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', '=', Auth::id())->paginate(10);
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
            'status' => 'nullable|in:pendente,completo',
        ]);
        $dados = [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status ?: 'pendente',
        ];
        Task::create($dados);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task =  Task::where('user_id', '=', Auth::id(), 'AND', 'id', '=', $id)->firstOrFail();
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
            'status' => 'required|in:pendente,completo',
        ]);
        $task = Task::where('user_id', '=', Auth::id(), 'AND', 'id', '=', $id)->firstOrFail();
        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', '=', Auth::id(), 'AND', 'id', '=', $id)->firstOrFail();
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
