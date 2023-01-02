

<?php $__env->startSection("title", "Administración de items"); ?>

<?php $__env->startSection("header", "Administración de items"); ?>

<?php $__env->startSection("content"); ?>
    
    <table class="table table-hover">
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Categoria</th>  
      <th scope="col"></th> 
      <th scope="col"></th> 
    </tr>
    <?php $__currentLoopData = $itemsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->categoria->name); ?></td>
            <td>
                <a class="btn btn-outline-secondary" href="<?php echo e(route('items.edit', $item->id)); ?>">Modificar</a></td>
            <td>
                <form action = "<?php echo e(route('items.destroy', $item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="<?php echo e(route('items.create')); ?>">Nuevo</a>
    </div>
<?php $__env->stopSection(); ?>

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/items/all.blade.php ENDPATH**/ ?>