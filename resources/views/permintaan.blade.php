@extends('index')
@section('judul')
  Permintaan
@stop

@section('section')
  @if (Session::has('message'))
    <script>
        alert("{!!Session::get('message')!!}");
      </script>
    @endif
    <div class="">
      <a href="tambahPermintaan" class="btn btn-primary"style="margin: 20px">Tambah Permintaan</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Supplier</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            @foreach ($permintaan as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nama_barang}}</td>
              <td>{{$item->jumlah}}</td>
              <td>{{$item->supplier}}</td>
              <td>{{$item->status}}</td>
              <td><a class="btn btn-danger" href="hapusPermintaan/{{$item->id_permintaan}}">Hapus</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="formeditBarang/{{$item->id_permintaan}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>

@stop
