

<?php $__env->startSection("title", "Inserción de categorias"); ?>

<?php $__env->startSection("header", "Inserción de categorias"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($categoria)): ?>
        <form action="<?php echo e(route('categorias.update', ['categoria' => $categoria->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
        <form action="<?php echo e(route('categorias.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            Nombre de la categoria:<input class="form-control" type="text" name="name" value="<?php echo e($categoria->name ?? ''); ?>"><br>
            <input class="btn btn-dark center" type="submit" value="Enviar">    
        </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/categorias/form.blade.php ENDPATH**/ ?>