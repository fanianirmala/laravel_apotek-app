<?php

namespace App\Http\Controllers;

use App\Exports\SuratExport;
use Illuminate\Http\Request;
use App\Models\LetterType;
use App\Models\User;
use App\Models\Letter;
use Maatwebsite\Excel\Facades\Excel;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = Letter::with('lettertype', 'user')->get();
        return view('surat.index', compact('surat'));
    }

    public function exportExcel()
    {
        $file_name = 'Data_Surat' . ".xlsx";
        return Excel::download(new SuratExport, $file_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = User::all()->where('role', 'guru');
        $data = LetterType::all();

        return view('surat.create', compact('data', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->input('recipients'))){
            $recipients = join(',', $request->input('recipients'));
        }
        else{
            $recipients = '';
        }
        Letter::create([
            'letter_perihal' => $request->letter_perihal,
            'letter_type_id' => $request->letter_type_id,
            'content' => $request->content,
            'recipients' => $recipients,
            'attachment' => $request->attachment,
            'notulis' => $request->notulis,
        ]);
        return redirect()->route('surat.index')->with('success', 'Berhasil menambahkan Data Surat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $letter = Letter::find($id);
        return view('surat.edit', compact('letter'));
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
        $letter = Letter::find($id);

        $request->validate([
            'letter_perihal' => 'required',
            'letter_type_id' => 'required',
            'content' => 'required',
            'recipients' => 'required',
            'notulis' => 'required',
        ]);

        if($request->password){
            $letter->update([
                'letter_perihal' => $request->letter_perihal,
                'letter_type_id' => $request->letter_type_id,
                'content' => $request->content,
                'recipients' => $request->recipients,
                'attachment' => $request->attachment,
                'notulis' => $request->notulis,
            ]);
        }else{
            $letter->update([
                'letter_perihal' => $request->letter_perihal,
                'letter_type_id' => $request->letter_type_id,
                'content' => $request->content,
                'recipients' => $request->recipients,
                'attachment' => $request->attachment,
                'notulis' => $request->notulis,
            ]);
        }
        return redirect()->route('surat.index')->with('success', 'Berhasil mengubah data Data Surat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Letter::where('id', $id)->delete();
        return redirect()->route('surat.index')->with('error', 'Berhasil menghapus Data Surat!');
    }
}
