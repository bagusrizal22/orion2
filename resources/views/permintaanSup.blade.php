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
              <td><a class="btn btn-secondary" href="formeditPermintaan/{{$item->id_permintaan}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>

@stop
