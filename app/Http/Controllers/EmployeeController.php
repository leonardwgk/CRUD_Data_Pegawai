<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        };

        return view('home', compact('data'), [
            'title' => 'Home'
        ]);
    }

    public function tambah()
    {
        return view('tambah', [
            'title' => 'Tambah Data Pegawai'
        ]);
    }

    public function insertdata(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    // parameter $id diambil dari id yang dikirim saat menekan tombol edit
    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        return view('edit', compact('data'), [
            'title' => 'Edit Data Pegawai'
        ]);
    }

    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus');
    }
}
