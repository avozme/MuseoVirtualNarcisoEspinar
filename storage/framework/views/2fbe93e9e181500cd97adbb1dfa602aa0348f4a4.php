

<?php $__env->startSection("title", "vista de productos"); ?>

<?php $__env->startSection("header", "vista de productos"); ?>

<?php $__env->startSection("content"); ?>

<form id="formulario">
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" disabled type="text" name="name" value="<?php echo e($producto->name ?? ''); ?>"><br>
            Dimensiones:<input class="form-control" type="text" disabled name="dimensions" value="<?php echo e($producto->dimensions ?? ''); ?>"><br>
            Categoria:<input class="form-control" type="text" disabled name="categoria_id" value="<?php echo e($producto->categoria->name); ?>" id="categoria_id"><br>

            <?php $__currentLoopData = $producto->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <?php echo e($item->name); ?> <input class="form-control" disabled type="text" value='<?php echo e($item->pivot->value); ?>'><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </select>  
        Imagen: <br> <img src='<?php echo e(asset("storage/$producto->image")); ?>' width="70">

        </div>
       
    </form>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/productos/show.blade.php ENDPATH**/ ?>