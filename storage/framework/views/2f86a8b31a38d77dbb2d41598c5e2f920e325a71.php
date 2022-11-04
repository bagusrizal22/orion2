<?php $__env->startSection('judul'); ?>
  Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
  <?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
    <?php endif; ?>
    <div class="">
      <a href="tambahBarang" class="btn btn-primary" style="margin: 20px">Tambah Barang</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Barang</th>
              <th>Satuan</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($item->nama_barang); ?></td>
              <td><?php echo e($item->satuan); ?></td>
              <td><?php echo e($item->stok); ?></td>
              <td><?php echo e($item->deskripsi); ?></td>
              <td><a class="btn btn-danger" href="hapusBarang/<?php echo e($item->id_barang); ?>">Hapus</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="formeditBarang/<?php echo e($item->id_barang); ?>">Edit</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>


    <div class="row" style="margin-top: 50px">
        <div class="col card">
            <a href="barangMasuk" class="btn btn-primary" style="margin: 20px;float: right; ">Barang Masuk</a>
            <div class="table-responsive" style="margin-top: 20px">
                <h3 style="margin-bottom: 20px">Riwayat Barang Masuk</h3>
                <table class="table table-hover">
                  <thead>
                    <tr class="table-dark">
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php $no=1 ?>
                    <?php $__currentLoopData = $barangmasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($no++); ?></td>
                      <td><?php echo e($item->nama_barang); ?></td>
                      <td><?php echo e($item->tanggal_masuk); ?></td>
                      <td><?php echo e($item->jumlah); ?></td>
                      <td><?php echo e($item->satuan); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
        </div>
        <div class="col card">
            <a href="barangKeluar" class="btn btn-primary" style="margin: 20px;float: left; ">Barang keluar</a>

            <div class="table-responsive" style="margin-top: 20px">
                <h3 style="margin-bottom: 20px">Riwayat Barang Keluar</h3>
                <table class="table table-hover">
                  <thead>
                    <tr class="table-dark">
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    <?php $__currentLoopData = $barangkeluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($no++); ?></td>
                      <td><?php echo e($item->nama_barang); ?></td>
                      <td><?php echo e($item->tanggal_keluar); ?></td>
                      <td><?php echo e($item->jumlah); ?></td>
                      <td><?php echo e($item->satuan); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
              </div>
        </div>
      </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/dataBarang.blade.php ENDPATH**/ ?>