@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('Bukutamu') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{ url('Bukutamu/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-4">WhatsApp</th>
                <th class="col-md-2">Alamat</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i =$data->firstItem()?>
           @foreach ($data as $item)
           <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->Nama }}</td>
            <td>{{ $item->WhatsApp }}</td>
            <td>{{ $item->Alamat }}</td>
            <td>
                <a href='{{ url ('Bukutamu/'.$item->Nama.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                <form onsubmit="return confirm('Yakin akan menghapus data?')";
                class='d-inline' action="{{ url('Bukutamu/'.$item->Nama) }}"method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"class="btn btn-danger btn-sm">Del</button>
            </form>
            </td>
        </tr>
        <?php $i++?>
           @endforeach
        </tbody>
    </table>
   {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->   
@endsection

    