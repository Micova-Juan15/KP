<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['user'] = User::all();
        // dd($data['user']);
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'plat' => 'required|min:6|max:12',
        // ]);
        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->save();
        // redirect ke user.index
        return redirect()->route('user.index')->with('success', $request->nama_user . ' berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        // dd($data['user']);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'plat' => 'required|min:6|max:12',
        ]);
        $user->plat = $request->plat;
        $user->save();
        return redirect()->route('user.index')->with('success', $request->nama_user . ' berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', $user->nama . ' berhasil dihapus.');
    }
}
