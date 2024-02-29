<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;
        $check = $request->filters;
        $todos = Todo::query();


        if (!empty($search)) {
            $todos->where('task', 'like', '%' . $search . '%');
        }

        switch ($check) {
            case 'complete':
                $todos->where('done', 1);
                break;
            case 'uncomplete':
                $todos->where('done', 0);
                break;
            case 'all':
                $todos->get();
                break;
        }
        $todos = $todos->get();

        return view('todos.index', compact('todos', 'search'));
    }

    public function addTodo(Request $request)
    {
        $data = $request->validate([
            'task' => 'required',

        ]);

        $data['user_id'] = auth()->id();

        Todo::create($data);

        return back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'task' => 'required',

        ]);

        $todo->update($data);
        return redirect()->route('todos.index');
    }

    public function toggle(Todo $todo)
    {
        $todo->update([
            'done' => !$todo->done,
        ]);
        return back();
    }
}
