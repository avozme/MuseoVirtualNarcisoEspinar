

<?php $__env->startSection("title", "Administración de productos"); ?>

<?php $__env->startSection("header", "Administración de productos"); ?>

<?php $__env->startSection("content"); ?>
<table class="table table-hover">
<tr>
      <th scope="col">Nombre
      </th>
      </th>
      <th scope="col">Foto Principal
      </th>
      <th scope="col">Categoría
      </th>
      <th scope="col"></th>  
      <th scope="col"></th> 
      <th scope="col"></th>  
      <th scope="col"></th> 
    </tr>

    <?php $__currentLoopData = $productosList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($producto->name); ?></td>
            <td><img src='<?php echo e(asset("storage/$producto->id/$producto->image")); ?>' width="120"></td>
            <td><?php echo e($producto->categoria->name); ?></td>


            <td>
                <a class="btn btn-outline-secondary" href="<?php echo e(route('productos.edit', $producto->id)); ?>">Modificar</a></td>
            <td>
                <a class="btn btn-outline-secondary" href="<?php echo e(route('productos.show', $producto->id)); ?>">Ver más</a></td>
            <td>
                <form action = "<?php echo e(route('productos.destroy', $producto->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
    <a class="btn btn-outline-success"  href="<?php echo e(route('productos.create')); ?>">Nuevo</a>
    </div>
<?php $__env->stopSection(); ?>

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/productos/all.blade.php ENDPATH**/ ?>