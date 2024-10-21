<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = UserModel::findOrFail(Auth::id());

        $breadcrumb = (object) [
            'title' => 'Profil',
            'list'  => ['Home', 'Profil']
        ];

        $activeMenu = 'profile';

        return view('profile', compact('user'), [
            'breadcrumb' => $breadcrumb, 
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama'     => 'required|string|max:100',
            'old_password' => 'nullable|string',
            'password' => 'nullable|min:5',
        ]);

        $user = UserModel::find($id);

        // Cek apakah ada perubahan pada data
        $isChanged = false;

        if ($user->username != $request->username || $user->nama != $request->nama) {
            $isChanged = true;
        }

        if ($request->filled('old_password') && Hash::check($request->old_password, $user->password)) {
            $isChanged = true;
        }

        // Jika ada file avatar yang diupload, anggap ada perubahan
        if ($request->hasFile('avatar')) {
            $isChanged = true;
        }

        // Jika tidak ada perubahan
        if (!$isChanged) {
            return redirect()->back()->with('info', 'Tidak ada perubahan pada profil Anda.');
        }

        // Update data pengguna
        $user->username = $request->username;
        $user->nama = $request->nama;

        // Jika password lama benar dan password baru diisi, lakukan perubahan password
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return back()
                    ->withErrors(['old_password' => 'Password lama salah'])
                    ->withInput();
            }
        }

        // Handle upload avatar baru
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && file_exists(storage_path('app/public/photos/' . $user->avatar))) {
                Storage::delete('public/photos/' . $user->avatar);
            }

            // Simpan avatar baru
            $file = $request->file('avatar');
            $fileName = $file->hashName();
            $file->storeAs('public/photos', $fileName);
            $user->avatar = $fileName;
        }

        // Simpan perubahan pada user
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profile berhasil diperbarui!');
    }
}
