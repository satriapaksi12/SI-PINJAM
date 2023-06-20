<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Exports\RolesExport;
use App\Imports\RolesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreRoleRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('roles.roles', ['roleList' => $role]);
    }

    public function create()
    {
        return view('roles.roles-add');
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        if ($role) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/role');
    }

    public function edit(Role $role,$id)
    {
        $role = Role::findOrFail($id);
        return view('roles.roles-edit',['role' => $role]);
    }

    public function update(UpdateRoleRequest $request, Role $role,$id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        if ($role) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/role');
    }
    public function destroy(Role $role,$id)
    {
        $deletedRole = Role::findORFail($id);
        $deletedRole->delete();
        if ($deletedRole) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/role');
    }

    public function exportRoles()
    {
        return Excel::download(new RolesExport, 'roles.xlsx');
    }

    public function importRoles(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RolesImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
