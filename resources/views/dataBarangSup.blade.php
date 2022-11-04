@extends('index')
@section('judul')
  Data Barang
@stop

@section('section')
  @if (Session::has('message'))
    <script>
        alert("{!!Session::get('message')!!}");
      </script>
    @endif
    <div class="">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Barang</th>
              <th>Satuan</th>
              <th>Stok</th>
              <th>Deskripsi</th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            @foreach ($barang as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nama_barang}}</td>
              <td>{{$item->satuan}}</td>
              <td>{{$item->stok}}</td>
              <td>{{$item->deskripsi}}</td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>

@stop
