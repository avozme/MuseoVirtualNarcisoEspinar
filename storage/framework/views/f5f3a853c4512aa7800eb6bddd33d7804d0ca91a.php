

<?php $__env->startSection("title", "Inserción de usuarios"); ?>

<?php $__env->startSection("header", "Inserción de usuarios"); ?>

<?php $__env->startSection("content"); ?>
    <?php if(isset($usuario)): ?>
        <form action="<?php echo e(route('usuarios.update', ['usuario' => $usuario->id])); ?>" method="POST">
        <?php echo method_field("PUT"); ?>
    <?php else: ?>
        <form action="<?php echo e(route('usuarios.store')); ?>" method="POST">
    <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
        Nombre :<input class="form-control" type="text" name="name" value="<?php echo e($usuario->name ?? ''); ?>"><br>
        Usuario:<input class="form-control" type="text" name="user" value="<?php echo e($usuario->user ?? ''); ?>"><br>
        Contraseña:<input class="form-control" type="text" name="password" value="<?php echo e($usuario->password ?? ''); ?>"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/usuarios/form.blade.php ENDPATH**/ ?>