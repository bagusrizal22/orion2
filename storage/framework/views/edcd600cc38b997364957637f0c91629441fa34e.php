
<?php $__env->startSection('judul'); ?>
  Permintaan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
  <?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
    <?php endif; ?>
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
            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            <?php $__currentLoopData = $permintaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($item->nama_barang); ?></td>
              <td><?php echo e($item->jumlah); ?></td>
              <td><?php echo e($item->supplier); ?></td>
              <td><?php echo e($item->status); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/permintaanSup.blade.php ENDPATH**/ ?>