<?php /* C:\Users\Dong Guillen's\Desktop\epoy\resources\views/cms/edit.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('cms.update', $customer->c_id)); ?>">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" name="fname" value=<?php echo e($customer->fname); ?> />
        </div>
        <div class="form-group">
          <label for="mname">Middle Name:</label>
          <input type="text" class="form-control" name="mname" value=<?php echo e($customer->mname); ?> />
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" name="lname" value=<?php echo e($customer->lname); ?> />
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>