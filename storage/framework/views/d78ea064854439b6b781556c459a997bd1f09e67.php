

<?php $__env->startSection("title", "Administración de opciones"); ?>

<?php $__env->startSection("header", "Administración de opciones"); ?>

<?php $__env->startSection("content"); ?>
   
<table class="table table-hover">
    <tr>
      <th scope="col">Tipo</th>
      <th scope="col"></th> 
      <th scope="col"></th>
      <th scope="col"></th>  
    </tr>
    <?php $__currentLoopData = $opcionesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($opcion->value); ?></td>
            <td><?php echo e($opcion->key); ?></td>
            <td>
                <a class="btn btn-outline-secondary" href="<?php echo e(route('opciones.edit', $opcion->id)); ?>">Modificar</a></td>
            <td>
                <form action = "<?php echo e(route('opciones.destroy', $opcion->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>
            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="<?php echo e(route('opciones.create')); ?>">Nuevo</a>
    </div>
<?php $__env->stopSection(); ?>

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/opciones/all.blade.php ENDPATH**/ ?>