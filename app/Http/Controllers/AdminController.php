<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\log;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function homeadmin()
    {
        $menu = menu::all();
        return view('admin.homeadmin', compact('menu'));
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('admin.tambah', compact('kategori'));
    }

    public function posttambah(Request $request)
    {
        $request->validate([
            'kategori_id'=>'required',
            'nama'=>'required',
            'foto'=>'file|image',
            'harga'=>'required',
            'catatan' => 'required'
        ]);

        Menu::create([
            'user_id'=> auth()->id() ,
            'kategori_id'=>$request->kategori_id,
            'nama'=>$request->nama,
            'catatan' => $request->catatan,
            'foto'=>$request->foto->store('img'),
            'harga'=>$request->harga,
        ]);
        return redirect()->route('homeadmin');
    }

    public function edit(Menu $menu)
    {
        $kategori = Kategori::all();
        return view('admin.edit', compact('kategori', 'menu'));
    }

    public function postedit(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'kategori_id'=>'required',
            'nama'=>'required',
            'harga'=>'required',
            'catatan' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img');
        }   else {
            unset($data['foto']);
        }
        $menu->update($data);
        return redirect()->route('homeadmin');
    }

    public function kelolauser()
    {
        $user = user::all();
        return view('admin.kelolauser', compact('user'));
    }

    public function tampiltambahdatauser()
    {
        return view('admin.tambahdatauser');
    }

    public function tambahdatauser(Request $request)
    {
        $cek = $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        User::create([
            'nama'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'role'=> $request->role,
        ]);
        return redirect()->route('kelolauser');
    }

    public function tampileditdatauser($id)
    {
        $user = User::findOrfail($id);
        return view('admin.editdatauser', compact('user'));
    }

    public function editdatauser(Request $request, $id)
    {
        $request -> validate([
            'nama'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required',
        ]);

        $user = User::findOrfail($id);
        if ($request->has('password')) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'password'=> $password,
            'role'=> $request->role,
        ]);
        return redirect()->route('kelolauser')->with('success', 'Data User Berhasil Di Update');
    }

    public function hapususer(User $user)
    {
        $user->delete();
        return redirect()->route('kelolauser');
    }

    public function log()
    {
        $log = log::with('user')->get();
        return view('admin.log', compact('log'));
    }

    public function hapus(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('homeadmin');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
