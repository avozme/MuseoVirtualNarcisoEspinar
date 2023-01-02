


<?php $__env->startSection("title", "Modificación de productos"); ?>

<?php $__env->startSection("header", "Modificación de productos"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($producto)): ?>
        <form  action="<?php echo e(route('producto.update', ['producto' => $producto->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
    <form action="<?php echo e(route('producto.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" type="text" name="name" value="<?php echo e($producto->name ?? ''); ?>"><br>
            Descripción:<input class="form-control" type="text" name="description" value="<?php echo e($producto->description ?? ''); ?>"><br>
            Dimensiones:<input class="form-control" type="text" name="dimensions" value="<?php echo e($producto->dimensions ?? ''); ?>"><br>
            Colección:<input class="form-control" type="text" name="collection" value="<?php echo e($producto->collection ?? ''); ?>"><br>
            Técnica:<input class="form-control" type="text" name="technique" value="<?php echo e($producto->technique ?? ''); ?>"><br>
            <input class="btn btn-dark center" type="submit" value="Enviar">    
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/producto/form.blade.php ENDPATH**/ ?>