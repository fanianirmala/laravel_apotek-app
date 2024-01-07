<?php

namespace App\Http\Controllers;

use App\Models\LetterType;
use App\Models\User;
use App\Models\Letter;
use App\Exports\KlasifikasiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $let = LetterType::all();
        return view('klasifikasi.index', compact('let'));
    }

    public function exportExcel()
    {
        $file_name = 'Data_Klasifikasi' . ".xlsx";
        return Excel::download(new KlasifikasiExport, $file_name);
    }

    public function downloadPDF($id)
    {
        $letterType = LetterType::find($id);

        if (!$letterType) {
            return response()->json(['error' => 'Data surat tidak ditemukan'], 404);
        }

        view()->share('letterType', $letterType);

        $pdf = PDF::loadView('klasifikasi.download-pdf');

        return $pdf->download('data_surat.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);

        $letterType = Letter::count();

        LetterType::create([
            'letter_code' =>$request->letter_code . '-' . $letterType,
            'name_type' =>$request->name_type,
        ]);

        return redirect()->route('klasifikasi.index')->with('success', 'Berhasil menambahkan Data Klasifikasi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = User::all()->where('role', 'guru');
        $detail = LetterType::all();
        return view('klasifikasi.show', compact('detail', 'guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $letters = LetterType::find($id);
        return view('klasifikasi.edit', compact('letters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $letters = LetterType::find($id);

        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);

        if($request->password){
            $letters->update([
                'letter_code' => $request->letter_code,
                'name_type' => $request->name_type,
            ]);
        }else{
            $letters->update([
                'letter_code' => $request->letter_code,
                'name_type' => $request->name_type,
            ]);
        }
        return redirect()->route('klasifikasi.index')->with('success', 'Berhasil mengubah data Data Klasifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LetterType::where('id', $id)->delete();
        return redirect()->route('klasifikasi.index')->with('error', 'Berhasil menghapus Data Klasifikasi!');
    }
}
