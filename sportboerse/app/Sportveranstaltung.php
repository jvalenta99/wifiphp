<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sportveranstaltung extends Model
{
    // $allTasks = Task::orderBy('created_at', 'desc')->get();
        $alleVeranstaltungen = Sportveranstaltung::orderBy('created_at', 'desc')->get();
        // Wir geben $allTasks in einem Array an die View weiter.
        return view('veransuch', [
            'alleVeranstaltungen' => $alleVeranstaltungen,
        ]);
}
