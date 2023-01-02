

<?php $__env->startSection("title", "Inserción de opciones"); ?>

<?php $__env->startSection("header", "Inserción de opciones"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($opcion)): ?>
        <form action="<?php echo e(route('opciones.update', ['opcione' => $opcion->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
        <form action="<?php echo e(route('opciones.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
        Valor: <input class="form-control" type="text" name="value" value="<?php echo e($opcion->value ?? ''); ?>"><br>
        Clave: <input class="form-control" type="text" name="key" value="<?php echo e($opcion->key ?? ''); ?>"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/opciones/form.blade.php ENDPATH**/ ?>