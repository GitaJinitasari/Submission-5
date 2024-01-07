<?php

namespace App\Http\Controllers;

use App\Models\Bukutamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        }
        else{
            $data=Bukutamu::orderBy('Nama','desc')->paginate($jumlahbaris);
        }
        return view('bukutamu.index')->with('data',$data);
    }

    public function indexWish(Request $request)
    {
        $katakunci=$request->katakunci;
        $jumlahbaris=4;
        if(strlen($katakunci)){
            $data=Bukutamu::where('Nama','like',"%$katakunci%")
                ->orWhere ('Message','like',"%$katakunci%")
                ->paginate($jumlahbaris);
        }
        else{
            $data=Bukutamu::orderBy('Nama','desc')->paginate($jumlahbaris);
        }
        return view('bukutamu.wishIndex')->with('data',$data);
    }

    public function updateStatus($id = null)
    {
        $data = Bukutamu::findOrFail($id)->first();

        if($data->Status == 0){
            $data->Status = 1;
        }
        else{
            $data->Status = 0;
        }
        $data->update();
        return back()->with(['success' => 'Berhasil update status pesan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bukutamu.create');
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
        'Gender' => 'required',
        'Message' => 'required'
    ], [
        'Nama.required' => 'Nama harus diisi',
        'WhatsApp.required' => 'Nomor WhatsApp harus diisi.',
        'WhatsApp.numeric' => 'Nomor WhatsApp harus berupa angka.',
        'WhatsApp.digits_between' => 'Nomor WhatsApp harus memiliki panjang antara 10 dan 15 digit.',
        'Alamat.required' => 'Alamat harus diisi.',
        'Gender.required' => 'Gender harus diisi.',
        'Message.required' => 'Message harus diisi.',
    ]);
    if(Bukutamu::count() >= 6)
    {
        Bukutamu::create([
            'Nama' => $request->Nama,
            'WhatsApp' => $request->WhatsApp,
            'Alamat' => $request->Alamat,
            'Message' => $request->Message,
            'Status' => 0,
            'Gender' => $request->Gender
        ]);
    }
    else{
        Bukutamu::create([
            'Nama' => $request->Nama,
            'WhatsApp' => $request->WhatsApp,
            'Alamat' => $request->Alamat,
            'Message' => $request->Message,
            'Status' => 1,
            'Gender' => $request->Gender
        ]);
    }
    return back()->with('success', 'Terimakasih telah hadir dan memberikan pesan');
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
        return View('bukutamu.edit')->with('data',$data);
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
