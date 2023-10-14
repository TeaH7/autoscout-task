<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //shows all tags in Admin
    public function index()
    {

        $tags = Tag::all();

        return view('back.tags.index', ['tags' => $tags]);
    }

    //returns create tag view in Admin
    public function create()
    {
        return view('back.tags.create');
    }


    //insert tag data in DB
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|unique:tags,name'
        ]);

        Tag::create([
            'name' => $data['name']
        ]);

        return redirect()->route('tags.index')->with('success', "Tag created successfully");
    }


    //returns edit tag view by ID
    public function edit(Tag $tag)
    {
        return view('back.tags.edit', ['tag' => $tag]);
    }

    //modifies tag data in DB by ID
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $tag->update([
            'name' => $data['name']
        ]);

        return redirect()->route('tags.index')->with('success', "Tag updated successfully");
    }

    //deletes tag data in DB by ID
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', "Tag deleted successfully");
    }
}
