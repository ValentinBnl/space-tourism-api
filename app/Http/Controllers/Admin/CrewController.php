<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        $crews = Crew::all();
        return view('admin.crews.index', compact('crews'));
    }

    public function create()
    {
        return view('admin.crews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|url'
        ]);

        Crew::create($request->all());

        return redirect()->route('admin.crews.index')->with('success', 'Crew member created successfully.');
    }

    public function show(Crew $crew)
    {
        return view('admin.crews.show', compact('crew'));
    }

    public function edit(Crew $crew)
    {
        return view('admin.crews.edit', compact('crew'));
    }

    public function update(Request $request, Crew $crew)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|url'
        ]);

        $crew->update($request->all());

        return redirect()->route('admin.crews.index')->with('success', 'Crew member updated successfully.');
    }

    public function destroy(Crew $crew)
    {
        $crew->delete();

        return redirect()->route('admin.crews.index')->with('success', 'Crew member deleted successfully.');
    }
}
