


<?php $__env->startSection("title", "Modificación de productos"); ?>

<?php $__env->startSection("header", "Modificación de productos"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($product)): ?>
        <form  action="<?php echo e(route('product.update', ['product' => $product->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
    <form action="<?php echo e(route('product.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container w-50">
            Nombre del producto:<input class="form-control" type="text" name="name" value="<?php echo e($product->name ?? ''); ?>"><br>
            Descripción:<input class="form-control" type="text" name="description" value="<?php echo e($product->description ?? ''); ?>"><br>
            Precio:<input class="form-control" type="text" name="price" value="<?php echo e($product->price ?? ''); ?>"><br>
            <input class="btn btn-dark center" type="submit">    
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/product/form.blade.php ENDPATH**/ ?>