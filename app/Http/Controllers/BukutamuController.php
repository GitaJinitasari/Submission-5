<?php

namespace App\Http\Controllers;

use App\Models\Bukutamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BukutamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci=$request->katakunci;
        $jumlahbaris=4;
        if(strlen($katakunci)){
            $data=Bukutamu::where('Nama','like',"%$katakunci%")
            ->orWhere ('Alamat','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            
            $data=Bukutamu::orderBy('Nama','desc')->paginate($jumlahbaris);
        }
        return view('Bukutamu.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bukutamu.create');
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
        'Nama' => 'required',
        'WhatsApp' => ['required', 'numeric', 'digits_between:10,15'],
        'Alamat' => 'required',
    ], [
        'WhatsApp.required' => 'Nomor WhatsApp harus diisi.',
        'WhatsApp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        'WhatsApp.digits_between' => 'Nomor WhatsApp harus memiliki panjang antara 10 dan 15 digit.',
        'Alamat.required' => 'Alamat harus diisi.',
    ]);

    Bukutamu::create([
        'Nama' => $request->Nama,
        'WhatsApp' => $request->WhatsApp,
        'Alamat' => $request->Alamat,
    ]);

    return redirect()->to('Bukutamu')->with('success', 'Data berhasil disimpan.');
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
        $data=Bukutamu::where('Nama',$id)->first();
        return View('Bukutamu.edit')->with('data',$data);
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
        $request->validate([
            'WhatsApp' => ['required', 'numeric', 'digits_between:10,15'],
            'Alamat' => 'required',
        ], [
            'WhatsApp.required' => 'Nomor WhatsApp harus diisi.',
            'WhatsApp.numeric' => 'Nomor WhatsApp harus berupa angka.',
            'WhatsApp.digits_between' => 'Nomor WhatsApp harus memiliki panjang antara 10 dan 15 digit.',
            'Alamat.required' => 'Alamat harus diisi.',
        ]);
    
        $data=[
            'WhatsApp' => $request->WhatsApp,
            'Alamat' => $request->Alamat,
        ];
        Bukutamu::where('Nama',$id)->update($data);
        return redirect()->to('Bukutamu')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bukutamu::where('Nama',$id)->delete();
        return redirect()->to('Bukutamu')->with('succes','Berhasil Melakukan Hapus Data');
    }
}
