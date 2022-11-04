<?php $__env->startSection('judul'); ?>
  Barang Keluar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
<?php endif; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dataBarang">Data Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>
    </ol>
  </nav>
<div class="card container">
    <div class="card-body">

        <?php echo Form::open(array('method'=>'POST','class'=>'form','url'=>'/tambahbarangkeluar')); ?>


        <div class="form-floating mb-3" style=" margin: 30px">
            <select name="nama_barang" class="form-select">
                <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id_barang); ?>"><?php echo e($item->nama_barang); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> --}}
            </select>
            <label for="floatingInput">Nama Barang</label>
        </div>
        <div class="form-floating mb-3" style=" margin: 30px">
            <select name="nama_supplier" class="form-select">
                <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id_supplier); ?>"><?php echo e($item->nama_supplier); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> --}}
            </select>
            <label for="floatingInput">Nama Supplier</label>
        </div>

        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::number('batch','', ['placeholder'=>'batch','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Jumlah Batch</label>
        </div>
        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::number('jumlah','', ['placeholder'=>'Jumlah','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Jumlah</label>
        </div>

        <div class="card" style="width: 1180px; margin-left: auto; margin-right: auto">
            <?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

        </div>

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/barangKeluar.blade.php ENDPATH**/ ?>