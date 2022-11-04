<?php $__env->startSection('judul'); ?>
  Tambah Supplier
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
<?php endif; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="supplier">Supplier</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Supplier</li>
    </ol>
  </nav>
<div class="card">
    <div class="card-body text-center">

        <?php echo Form::open(array('method'=>'POST','class'=>'form','url'=>'/tambahsupplier')); ?>

        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('nama_supplier','', ['placeholder'=>'Nama Supplier','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Nama Supplier</label>
        </div>
        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('deskripsi','', ['placeholder'=>'Deskripsi','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Deskripsi</label>
        </div>

        <?php echo Form::submit('Simpan', ['class'=>'btn btn-success']); ?>

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/tambahSupplier.blade.php ENDPATH**/ ?>