

<?php $__env->startSection('judul'); ?>
Beranda
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>

<div class="card" style="height: 240px; background: linear-gradient(to right,#d5edeb ,  #88d1ca ) ;">
    <a href="dataBarangSup" class="card-body" style="text-decoration: none" >
        <h5 class="card-title" style="color: black;">
            Data Barang
        </h5>
        <img src="<?php echo asset('assets/warehouse.png'); ?>" alt="" width="200" height="200" class="d-inline-block align-top" style=" position: absolute;
        top: 0;
        bottom: 0;
        margin: auto; margin-left: 40%;">
    </a>

 </div>

    <div class="col">
        <div class="card" style=";height: 240px; background: linear-gradient(to right, #e67ccb , #e67ccb ); margin-top: 20px">
            <a href="permintaanSup" class="card-body" style="text-decoration: none" >
                <h5 class="card-title" style="color: #262e59; text-align: right">
                    Permintaan
                </h5>
                <img src="<?php echo asset('assets/gambar/supplier.png'); ?>" alt="" width="200" height="200" class="d-inline-block align-top" style=" position: absolute;
                top: 0;
                bottom: 0;
                margin: auto; margin-left: 40%;">
            </a>

        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Applications\orion2\resources\views/berandaSupplier.blade.php ENDPATH**/ ?>