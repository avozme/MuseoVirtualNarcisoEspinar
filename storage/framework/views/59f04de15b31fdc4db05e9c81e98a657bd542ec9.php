

<?php $__env->startSection("title", "Inserción de imágenes"); ?>

<?php $__env->startSection("header", "Inserción de imágenes"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($imagene)): ?>
        <form action="<?php echo e(route('imagenes.update', ['imagene' => $imagene->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
        <form action="<?php echo e(route('imagenes.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
        Nombre imagen:<input class="form-control" type="file" name="image" accept="image/*" value="<?php echo e($imagene->image ?? ''); ?>"><br>
        <div id="subida_imagen" type="hidden">
        <?php echo e(storage_path("app/public")); ?>

        </div>
        Producto:<select class="form-select" type="text" name="producto_id" id="producto_id" onchange="actualizar_items()">

        <?php $__currentLoopData = $productosList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                <option value='<?php echo e($producto->id); ?>'><?php echo e($producto->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
        <input class="btn btn-dark center mt-3" type="submit" value="Enviar">
        </div>
        </form>
<?php $__env->stopSection(); ?>

<script>
    function actualizar_items() {
        id_producto = document.getElementById("producto_id").value;

        //let lista_items = null;
        fetch("/producto/get_items/" + id_producto).then(data=> data.json()).then(json=> {        
                /*let lista_items = */
                console.log(json);
                json.forEach(item => {
                    formulario.append("<input class='form-control' type='text' name='"+item.name+"'>" );
                    console.log(item);
                });
            })
        }      
</script>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/imagenes/form.blade.php ENDPATH**/ ?>