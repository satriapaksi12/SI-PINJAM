<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('user.user', ['userList' => $user]);
    }

    /**
     * Show the form for creating a new resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::with('role', 'unit')->get();
        $role = Role::all();
        $unit = Unit::all();
        return view('user.user-add', ['user' => $user, 'role' => $role, 'unit' => $unit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        // $newName = '';
        // if ($request->file('nama_foto')) {
        //     $extension = $request->file('nama_foto')->getClientOriginalExtension();
        //     $newName = $request->nama . $request->nomor_induk . '-' . now()->timestamp . '.' . $extension;
        //     $request->file('nama_foto')->storeAs('nama_foto', $newName);
        // }

        // $request['nama_foto'] = $newName;


        $foto = $request->nama_foto;
        $name = $foto->hashName();
        $foto->move(public_path('/img/'), $name);
        $namaFoto = 'img/' . $name;


        $user = new User();
        $user->nama = $request->nama;
        $user->nomor_induk = $request->nomor_induk;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->nama_foto = $namaFoto;
        $user->role_id = $request->role_id;
        $user->unit_id = $request->unit_id;
        $user->save();
        if ($user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(USer $user, $id)
    {
        $user = User::with('role', 'unit')->findOrFail($id);
        return view('user.user-detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $user = User::with('role', 'unit')->findOrFail($id);
        $unit = Unit::all();
        $role = Role::all();

        return view('user.user-edit', ['user' => $user,'unit' => $unit,'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, $id)
    {

        $data = $request->all();
       
        $user = User::with('role', 'unit')->findOrFail($id);
        if ($request->nama_foto) {
            if ($user->nama_foto != null) {
                if (file_exists($user->nama_foto )) {
                    unlink(public_path($user->nama_foto ));
                }
            }
            $foto = $request->nama_foto;
            $name = $foto->hashName();
            $foto->move(public_path('/img/'), $name);
            $namaFoto = 'img/' . $name;
        }
        // $request->nama_foto = $namaFoto;


        $user->update($request->all());
        if ($user) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $deletedUser = User::findORFail($id);
        $deletedUser->delete();
        if ($deletedUser) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'User berhasil dinonaktifkan');
        }
        return redirect('/user');
    }

    public function deletedUser()
    {
        $deletedUser = User::onlyTrashed()->get();
        return view('user.user-deleted', ['deletedUser' => $deletedUser]);
    }

    public function restore($id)
    {
        $deletedUser = User::withTrashed()->where('id',$id)->restore();
         if ($deletedUser) {
            Session::flash('status-restore', 'success');
            Session::flash('message-restore', 'User berhasil diaktifkan');
        }
        return redirect('/user');
    }
}
