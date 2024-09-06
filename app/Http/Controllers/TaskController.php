<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Filtro de Status
        $status = $request->query('status');
        // Busca tarefas de acordo com o filtro de status e o user_id do usuário autenticado
        $tasks = Task::where('user_id', Auth::user()->getAuthIdentifier()) // Filtra pelo user_id do usuário autenticado
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10);

        // Formatar as datas
        $tasks->getCollection()->transform(function ($task) {
            $task->due_date = Carbon::parse($task->due_date)->format('d/m/Y');
            return $task;
        });

        return view('index', compact('tasks'));
    }

    public function markComplete($id)
    {
        // Buscar a tarefa pelo ID
        $task = Task::findOrFail($id);

        // Atualizar o status para 'concluída'
        $task->update(['status' => 'completo']);

        return redirect()->route('tasks.index')->with('success', 'Tarefa marcada como concluída.');
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
