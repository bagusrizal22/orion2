<?php $__env->startSection('judul'); ?>
  Ubah Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<?php if(Session::has('message')): ?>
    <script>
        alert("<?php echo Session::get('message'); ?>");
      </script>
<?php endif; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../dataBarang">Data Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Barang</li>
    </ol>
  </nav>
<div class="card">
    <div class="card-body text-center">

        <?php echo Form::open(array('method'=>'POST','class'=>'form','url'=>'/ubahbarang')); ?>

        <?php echo Form::hidden('id',$barang->id_barang, ['class' => 'form-control']); ?>

        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('nama_barang',$barang->nama_barang, ['class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Nama Barang</label>
        </div>
        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('satuan',$barang->satuan, ['placeholder'=>'Satuan','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Satuan</label>
        </div>
        <div class="form-floating mb-3" style=" margin: 30px">
            <?php echo Form::text('deskripsi',$barang->deskripsi, ['placeholder'=>'Deskripsi','class'=>'form-control','id'=>'floatingInput','required','autofocus','autocomplete'=>'off']); ?>

            <label for="floatingInput">Deskripsi</label>
        </div>

        <?php echo Form::submit('Simpan', ['class'=>'btn btn-success']); ?>

        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/ubahBarang.blade.php ENDPATH**/ ?>