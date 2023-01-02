

<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("content"); ?>
<table class="table table-hover">
    <?php $__currentLoopData = $productoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($producto->name); ?></td>
            <td><?php echo e($producto->description); ?></td>
            <td><?php echo e($producto->dimensions); ?></td>
            <td><?php echo e($producto->collection); ?></td>
            <td><?php echo e($producto->technique); ?></td>

            <td>
                <a class="btn btn-outline-secondary" href="<?php echo e(route('producto.edit', $producto->id)); ?>">Modificar</a></td>
            <td>
                <form action = "<?php echo e(route('producto.destroy', $producto->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a class="btn btn-outline-success"  href="<?php echo e(route('producto.create')); ?>">Nuevo</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/producto/all.blade.php ENDPATH**/ ?>