<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        //$categories = Category::latest()->paginate(10);

//        $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
//            ->select([
//                'categories.*',
//                'parents.name as parent_name'
//            ])
//            ->orderBy('categories.created_at', 'DESC')
//            ->orderBy('categories.name', 'ASC')
//            ->get();
        $categories = Category::with('children','parent')->latest()->paginate(10);
         return view('dashboard.categories.index',[
           'categories' => $categories
        ]);
    }


    public function create()
    {
        return view('dashboard.categories.create',[
            'parents' => Category::latest()->get(['name','id']),
            'category' => new Category(),
        ]);
    }


    public function store(Request $request)
    {
        //$request->dd();
        $request->validate(Category::validateRules($request->id));

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $image = $image->store('/categories', 'media');
            $data['image'] = $image;
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('id','<>',$category->id)->latest()->get(['id','name']);
        return view('dashboard.categories.edit',[
            'category' => $category,
            'parents' => $parents
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Category::validateRules($id));
        $category = Category::findOrFail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $image = $image->storeAs('/', $category->image ,'media');
            $data['image'] = $image;
            $data['image'] = $image;
        }

        $category->update($data);
        return redirect()->route('categories.index')->with([
           'success' => 'Category Updated Successfully'
        ]);
    }


    public function destroy($id)
    {
        $category = Category::whereId('100000')->delete();
//        dd($category!=0);
        if ($category!=0){
            return redirect()->route('categories.index')->with([
                'success' => 'Category Deleted Successfuly'
            ]);
        }
        return  redirect()->route('categories.index')->with([
        'error' => 'Category Not deleted'
    ]);
    }
}
