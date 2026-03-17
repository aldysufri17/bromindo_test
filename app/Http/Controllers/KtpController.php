<?php

namespace App\Http\Controllers;

use App\Models\Ktp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KtpImport;
use App\Exports\KtpExport;
use Barryvdh\DomPDF\Facade\Pdf;

class KtpController extends Controller
{

    public function index(Request $request)
    {
        $data = Ktp::when($request->search, function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        })->paginate(20);

        return view('ktp.index', compact('data'));
    }

    public function create()
    {
        return view('ktp.create');
    }

    public function store(Request $request)
    {
        $umur = calculateAge($request->tanggal_lahir);
        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto', 'public');
        }

        Ktp::create([
            'nik' => generateNik(),
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $umur,
            'alamat' => $request->alamat,
            'foto' => $foto
        ]);

        return redirect()->route('ktp.index');
    }

    public function show($id)
    {
        $data = Ktp::findOrFail($id);
        return view('ktp.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Ktp::findOrFail($id);

        return view('ktp.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Ktp::findOrFail($id);
        $umur = calculateAge($request->tanggal_lahir);

        $data->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $umur,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('ktp.index');
    }

    public function destroy($id)
    {
        Ktp::destroy($id);

        return back();
    }

    public function exportCSV()
    {
        return Excel::download(new KtpExport, 'data_ktp.csv');
    }

    public function exportPDF()
    {
        // set_time_limit(300);
        // ini_set('memory_limit', '512M');
        // $data = Ktp::all();

        $data = Ktp::limit(100)->get();
        
        $pdf = Pdf::loadView('ktp.pdf', compact('data'));
        return $pdf->download('data_ktp.pdf');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx'
        ]);

        Excel::import(new KtpImport, $request->file('file'));

        return redirect()->route('ktp.index')
            ->with('success', 'Data berhasil diimport');
    }
}