<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'name_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas,peminjam',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name_lengkap = $request->name_lengkap;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'name_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas,peminjam',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->name_lengkap = $request->name_lengkap;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $user = User::where('username', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->orWhere('alamat', 'LIKE', "%$query%")
                    ->orWhere('name_lengkap', 'LIKE', "%$query%")
                    ->orWhere('role', 'LIKE', "%$query%")
                    ->paginate(10);
        
        if ($user->isEmpty()) {
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan.');
        }

        return view('admin.user.index', compact('user'));
    }

    // public function exportPdf()
    // {        
    //     $user = User::all();
    //     $pdf = Pdf::loadView('pdf.export-user', ['user' => $user])->setOption(['defaultFont' => 'sans-serif']);
    //     // Membuat nama file PDF dengan waktu saat ini
    //     $fileName = 'export-user-' . Date::now()->format('Y-m-d_H-i-s') . '.pdf';
        
    //     return $pdf->download($fileName);
    // }

    // public function exportExcel()
    // {
    //     return (new UserExport)->download('user-'.Carbon::now()->timestamp.'.xlsx');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   // Mengambil user yang akan dihapus
   $user = User::findOrFail($id);
    
   // Memeriksa apakah user yang akan dihapus adalah admin
   if($user->role === 'admin') {
       // Memeriksa apakah user yang sedang login juga adalah admin
       if(Auth::user()->role !== 'admin') {
           // Jika tidak, maka tampilkan pesan error dan kembalikan ke halaman sebelumnya
           return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus admin lain');
       }
   }

   // Jika user yang akan dihapus bukan admin atau user yang sedang login adalah admin, lanjutkan penghapusan
   $user->delete();
   return redirect()->route('users.index')->with('success', 'User berhasil dihapus');

    }
}
