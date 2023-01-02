

<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("content"); ?>
    <table class="table" >
    <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td>
                <a class="btn btn-outline-success" href="<?php echo e(route('product.edit', $product->id)); ?>">Modificar</a></td>
            <td>
                <form action = "<?php echo e(route('product.destroy', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a class="btn btn-outline-dark" href="<?php echo e(route('product.create')); ?>">Nuevo</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/product/all.blade.php ENDPATH**/ ?>