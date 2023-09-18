<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $akun = Akun::all();
        return response()->json(['data' => $akun , 'message' => 'Sukses, mengambil data semua akun'], 200);
    }
    

    public function show($id)
    {
        $akun = Akun::find($id);
            if (!$akun) {
                return response()->json(['message' => 'Error, data akun tidak ditemukan'], 404);
            }
        return response()->json(['data' => $akun , 'message' => 'Success, data akun dengan id '. $id .' berhasil diambil'],200);
    }


    public function store(Akun $akun)
    {
        $akun = Akun::all();
        
        $idBaru = count($akun) + 1;
        $akunBaru = Akun::create([
            'id' => $idBaru,
            'username' => 'pengguna' . $idBaru,
            'email' => 'pengguna' . $idBaru . '@example.com',
            'password' => Hash::make('katasandi' . $idBaru),

        ]);

        // Menambahkan data akun baru ke dalam array
        $this->akun[] = $akunBaru;

        return response()->json(['data' => $akunBaru , 'message' => 'Success, akun berhasil dibuat',], 201);
    }

    public function update(Akun $akun,$id)
    {
        $akun = Akun::find($id);
            if (!$akun) {
                return response()->json(['message' => 'Error, data akun tidak ditemukan'], 404);
            }
        $akunLama = $akun;

        $akun->username = 'username(update)';
        $akun->email = 'emaildiperbaharui@example.com';
        $akun->password = bcrypt('katasandi');
        $akun->save();

        $akunBaru = $akun;
        
        return response()->json(['data'=> $akunLama,'message' => 'Success, data akun berhasil diperbarui'],200);
    }

    public function destroy(Akun $akun,$id)
    {
        $akun = Akun::find($id);
            if (!$akun) {
                return response()->json(['message' => 'Error, data akun tidak ditemukan'], 404);
            }
        $akun->delete();
        return response()->json(['message' => 'Success, data akun  berhasil dihapus'], 204);
                

    }
}
