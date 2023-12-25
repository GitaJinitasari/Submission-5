@extends('layout.template')
  <!-- START FORM -->
  @section('konten')
  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action='{{ url('Bukutamu/'.$data->Nama) }}' method='post'>
    @method('PUT')
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('Bukutamu') }}' class="btn btn-secondary"><< kembali</a>
    </div>
    </div>  
    </div>
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            {{ $data->Nama }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="WhatsApp" class="col-sm-2 col-form-label">WhatsApp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='WhatsApp' value="{{ $data->WhatsApp }}" id="WhatsApp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Alamat' value="{{ $data->Alamat }}" id="Alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Alamat" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM --> 
  @endsection
