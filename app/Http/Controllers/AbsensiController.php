<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function create()
    {
        return view('absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:absensis,nim',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM tersebut sudah melakukan absensi.',
        ]);

        Absensi::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
        ]);

        return redirect()
            ->route('absensi.create')
            ->with('success', 'Absensi berhasil dilakukan!');
    }

    public function index()
    {
        $absensis = Absensi::latest()->get();

        return view('absensi.index', compact('absensis'));
    }

    public function print()
    {
        $absensis = Absensi::latest()->get();

        return view('absensi.print', compact('absensis'));
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Data absensi berhasil dihapus!');
    }
}