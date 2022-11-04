<?php $__env->startSection('judul'); ?>
  Ubah Permintaan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
<?php endif; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../permintaan">Permintaan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Permintaan</li>
    </ol>
  </nav>
<div class="card">
    <div class="card-body text-center">

        <?php echo Form::open(array('method'=>'POST','class'=>'form','url'=>'/ubahpermintaan')); ?>

        <?php echo Form::hidden('id',$permintaan->id_permintaan, ['class' => 'form-control']); ?>

        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('status',$permintaan->status, ['class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Keterangan</label>
        </div>

        <?php echo Form::submit('Simpan', ['class'=>'btn btn-success']); ?>

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/ubahPermintaan.blade.php ENDPATH**/ ?>