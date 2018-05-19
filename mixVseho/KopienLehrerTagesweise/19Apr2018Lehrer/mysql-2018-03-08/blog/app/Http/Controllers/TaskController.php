<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Bei Verwendung des Validtor, kann die Klasse per user verwendet werden.
use Validator;
use App\Task;

class TaskController extends Controller
{

    public function index() {
        // Über das Model Task werden alle Datensätze sortiert ausgelesen
        $allTasks = Task::orderBy('created_at', 'desc')->get();
        
        // Wir geben $allTasks in einem Array an die View weiter.
        return view('tasks', [
            'allTasks' => $allTasks
        ]);
    }

    public function createTask(Request $request) {
        // Daten validieren
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|min:3',        
        ]);
            
        // Trat ein Fehler auf?
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Task anlegen
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function delete($id) {
        /* $validator = Validator::make(['id' => $id], [
            'name' => 'int',        
        ]);
        
        if (!$validator->fails()){
            Task::findOrFail($id)->delete();
        } */
        try {
            Task::findOrFail($id)->delete();
        }
        catch (Exception $e) {
            return redirect('/'); 
        }

        return redirect('/');
    }
}
