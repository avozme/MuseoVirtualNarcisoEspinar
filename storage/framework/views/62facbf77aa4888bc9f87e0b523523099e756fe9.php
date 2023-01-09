

<?php $__env->startSection("title", "Modificación de productos"); ?>

<?php $__env->startSection("header", "Modificación de productos"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($producto)): ?>
        <form  action="<?php echo e(route('productos.update', ['producto' => $producto->id])); ?>" method="POST" id="formulario">
            <div class="container-fluid" id="miFormulario">
                <?php $__currentLoopData = $producto->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php echo e($item->name); ?> <input class="form-control" type="text" value='<?php echo e($item->pivot->value); ?>'><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
    <form action="<?php echo e(route('productos.store')); ?>" method="POST" id="formulario">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid" id="miFormulario">
            Nombre del producto:<input required class="form-control" type="text" name="name" value="<?php echo e($producto->name ?? ''); ?>"><br>
            Descripción:<input required class="form-control" type="text" name="description" value="<?php echo e($producto->description ?? ''); ?>"><br>
            Dimensiones:<input required class="form-control" type="text" name="dimensions" value="<?php echo e($producto->dimensions ?? ''); ?>"><br>
            Colección:<input required class="form-control" type="text" name="collection" value="<?php echo e($producto->collection ?? ''); ?>"><br>
            Técnica:<input required class="form-control" type="text" name="technique" value="<?php echo e($producto->technique ?? ''); ?>"><br>
            Imagen: <input class="form-control" type="file" name="image" accept="image/*" value="<?php echo e($producto->image ?? ''); ?>"<br>
            
            <?php if(isset($producto)): ?><img src='<?php echo e(url("/images")."/".$producto->image); ?>'><?php endif; ?>
            Categoria:<select class="form-select" type="text" name="categoria_id" id="categoria_id" onchange="actualizar_items()">
                <option value=''>Selecciona</option>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                <option value='<?php echo e($categoria->id); ?>' <?php if(isset($producto->categoria) && $producto->categoria->id == $categoria->id): ?> selected <?php endif; ?>><?php echo e($categoria->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div id="listItems">
                <?php if(isset($itemsProductos)): ?>
                    <?php $__currentLoopData = $itemsProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemProducto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="mt-4"><?php echo e($itemProducto->item->name); ?></label>
                        <input required class="form-control" type="text" name="items[<?php echo e($key); ?>][value]" value="<?php echo e($itemProducto->value ?? ''); ?>">
                        <input type="hidden" name="items[<?php echo e($key); ?>][id]" value="<?php echo e($itemProducto->items_id ?? ''); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <input class="btn btn-dark center mt-3" type="submit" value="Enviar" id="submitButton">    
        </div>
    </form>
<?php $__env->stopSection(); ?>



<script>
    function actualizar_items() {
        id_categoria = document.getElementById("categoria_id").value;
        var listItems = document.getElementById("listItems");
        listItems.innerHTML = "";
        var cont = 0;
        fetch("/categorias/get_items/" + id_categoria).then(data=> data.json()).then(json=> {         
                json.forEach(item => {
                    var input = document.createElement("input");
                    var hidden = document.createElement("input");
                    var label = document.createElement("label");
                    input.type = "text";
                    hidden.type = "hidden";
                    input.name = `items[${cont}][value]`;
                    hidden.name = `items[${cont}][id]`;
                    hidden.value = item.id;
                    label.innerHTML = item.name;
                    input.classList.add("form-control");
                    label.classList.add("mt-4");
                    listItems.appendChild(label);
                    listItems.appendChild(hidden);
                    listItems.appendChild(input);
                    console.log(item);
                    cont++;
                });
            })
        }  
</script>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/productos/form.blade.php ENDPATH**/ ?>