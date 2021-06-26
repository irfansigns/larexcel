<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\Party;

class UsersImportController extends Controller
{
    public function index(){
        return view('start.mainPage');
    }

    public function show()
    {
        return view('users.index');
    }

    public function store(Request $request)
    {
        Party::query()->delete();
        $file = $request->file('file')->store('import');

        $import = new UsersImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}