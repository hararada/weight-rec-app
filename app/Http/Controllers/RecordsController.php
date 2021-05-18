<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $records = $user->records()->orderBy('created_at', 'desc')->paginate(10);

        return view('records.records', [
            'records' => $records,
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'weight' => 'required',
            'calorie' => 'required',
        ]);

        $request->user()->records()->create([
            'weight' => $request->weight,
            'calorie' => $request->calorie,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $record = \App\Record::findOrFail($id);

        $record->delete();

        return back();
    }
}
