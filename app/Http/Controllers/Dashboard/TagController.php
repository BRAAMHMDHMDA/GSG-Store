<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index()
    {
        return view('dashboard.tags.index')->with([
            'tags' => Tag::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('dashboard.tags.create')->with([
           'tag' => new Tag(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:tags']);
        $request->merge([
           'slug' => Str::slug($request->name)
        ]);
        Tag::create($request->all());

        return redirect()->route('tags.index')->with([
           'success' => "($request->name) Tag Created Successfully"
        ]);
    }


    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit')->with([
           'tag' => $tag
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required',Rule::unique('tags','name')->ignore($tag->id)]);
        $tag->update($request->all());

        return redirect()->route('tags.index')->with([
           'success' => "($request->name) Tag Updated Successfully"
        ]);
    }

    public function destroy(Tag $tag)
    {
        if ($tag->products()->count())
        {
            return redirect()->route('tags.index')->with([
                'warning' => "($tag->name) Tag Linked with Products, First Must Delete Linked Products"
            ]);
        }
        $tag->delete();

        return redirect()->route('tags.index')->with([
           'success' => "($tag->name) Tag Deleted Sucessfully"
        ]);
    }
}
