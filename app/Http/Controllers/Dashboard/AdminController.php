<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:admin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
//        $admins = Admin::whereHas('roles', function ($query) {
//            $query->where('name','!=', 'owner');
//        })
//            ->latest()
//            ->paginate();

        $admins = Admin::latest()->paginate();
        return view('dashboard.admins.index')->with([
            'admins' => $admins,
        ]);
    }

    public function create()
    {
        return view('dashboard.admins.create', [
            'roles' => Role::get(['id', 'name']),
            'admin' => new Admin(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(Admin::validateRules($request->id));

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image = $image->store('/admins', 'media');
            $data['image'] = $image;
        }
        $data['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {
            $admin = Admin::create($data);
            $admin->assignRole($request->roles);

            DB::commit();
            return redirect()->route('admins.index')->with('success', 'Admin Created Successfully');

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Admin $admin)
    {
        $admin->load('roles:id');
        foreach ($admin->roles as $role) {
            $roles_id[] = $role->id;
        }
        return view('dashboard.admins.edit', [
            'admin' => $admin,
            'roles' => Role::get(['id', 'name']),
            'roles_id' => $roles_id,
        ]);
    }


    public function update(Request $request, Admin $admin)
    {
        $request->validate(Admin::validateRules($admin->id));
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            if ($admin->image){
                $image = $image->storeAs('/', $admin->image, 'media');
            }else{
                $image = $image->store('/admins', 'media');
            }
            $data['image'] = $image;
        }
        $data['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {
            $admin->update($data);
            $admin->syncRoles($request->roles);

            DB::commit();
            return redirect()->route('admins.index')->with('success', 'Admin Updated Successfully');

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function destroy(Admin $admin)
    {
        Storage::disk('media')->delete($admin->image);
        $admin->delete();

        return redirect()->route('admins.index')->with([
            'success' => 'Admin Deleted Successfuly'
        ]);
    }
}
