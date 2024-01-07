@extends('layouts.app')
    <!-- START DATA -->
    @section('content')

    <div class="row justify-content-center">
    <div class="col-md-10">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ route('Bukutamu.message') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <!-- <div class="pb-3">
      <a href='{{ url('Bukutamu/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div> -->

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-4">Message</th>
                <th class="col-md-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i =$data->firstItem()?>
           @foreach ($data as $item)
           <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->Nama }}</td>
            <td>{{ $item->Message }}</td>
            <td>
                <form action="{{ route('Bukutamu.message.status', ['id' => $item->id]) }}" method="get">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" onclick="form.submit();" id="flexCheckChecked" @if($item->Status) checked @endif>
                    <label class="form-check-label" for="flexCheckChecked">
                        @if ($item->Status)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </label>
                </div>
                </form>
            </td>
        </tr>
        <?php $i++?>
           @endforeach
        </tbody>
    </table>
   {{ $data->withQueryString()->links() }}
        </div>
    </div>
</div>
<!-- AKHIR DATA -->
@endsection

