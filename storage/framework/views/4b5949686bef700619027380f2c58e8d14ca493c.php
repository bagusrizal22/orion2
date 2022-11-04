<?php $__env->startSection('judul'); ?>
  Daftar Supplier
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
  <?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
    <?php endif; ?>
    <div class="">
      <a href="tambahSupplier" class="btn btn-primary"style="margin: 20px">Tambah Supplier</a>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Supplier</th>
              <th>Deskripsi</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($no++); ?></td>
              <td><?php echo e($item->nama_supplier); ?></td>
              <td><?php echo e($item->deskripsi); ?></td>
              <td><a class="btn btn-danger" href="hapusSupplier/<?php echo e($item->id_supplier); ?>">Hapus</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="formeditSupplier/<?php echo e($item->id_supplier); ?>">Edit</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views//supplier.blade.php ENDPATH**/ ?>