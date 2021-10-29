<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        return view('dashboard.brands.index')->with([
            'brands' => brand::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('dashboard.brands.create')->with([
            'brand' => new brand(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:brands|min:2|max:255']);

        brand::create($request->all());

        return redirect()->route('brands.index')->with([
            'success' => "($request->name) brand Created Successfully"
        ]);
    }


    public function show(brand $brand)
    {
        //
    }

    public function edit(brand $brand)
    {
        return view('dashboard.brands.edit')->with([
            'brand' => $brand
        ]);
    }

    public function update(Request $request, brand $brand)
    {
        $request->validate(['name' => 'required',Rule::unique('brands','name')->ignore($brand->id)]);
        $brand->update($request->all());

        return redirect()->route('brands.index')->with([
            'success' => "($request->name) brand Updated Successfully"
        ]);
    }

    public function destroy(brand $brand)
    {
        if ($brand->products()->count())
        {
            return redirect()->route('brands.index')->with([
                'warning' => "($brand->name) brand Linked with Products, First Must Delete Linked Products"
            ]);
        }
        $brand->delete();

        return redirect()->route('brands.index')->with([
            'success' => "($brand->name) brand Deleted Sucessfully"
        ]);
    }
}
