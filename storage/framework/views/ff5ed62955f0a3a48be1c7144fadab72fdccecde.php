

<?php $__env->startSection("title", "Inserción de items"); ?>

<?php $__env->startSection("header", "Inserción de items"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($item)): ?>
        <form action="<?php echo e(route('items.update', ['item' => $item->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
        <form action="<?php echo e(route('items.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
        Item:<input class="form-control" type="text" name="name" value="<?php echo e($item->name ?? ''); ?>"><br>
        Categorias:<select class="form-select" type="text" name="categoria_id">

        <?php $__currentLoopData = $categoriasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
            <option value='<?php echo e($categoria->id); ?>'><?php echo e($categoria->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <input class="btn btn-dark center mt-3" type="submit" value="Enviar">
        </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/items/form.blade.php ENDPATH**/ ?>