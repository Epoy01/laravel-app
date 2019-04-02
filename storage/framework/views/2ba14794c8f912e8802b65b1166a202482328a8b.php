<?php /* C:\Users\Dong Guillen's\Desktop\epoy\resources\views/cms/create.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Customer
  </div>
  <div class="card-body">
      <form method="post" action="<?php echo e(route('cms.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="fname">First Name:</label>
              <input type="text" id="fname" class="form-control <?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" onkeydown="" />
              <?php if($errors->has('fname')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('fname')); ?></strong>
                </span>
              <?php endif; ?>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="mname">Middle Name:</label>
              <input type="text" class="form-control <?php echo e($errors->has('mname') ? ' is-invalid' : ''); ?>" name="mname" value="<?php echo e(old('mname')); ?>"/>
              <?php if($errors->has('mname')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('mname')); ?></strong>
                </span>
              <?php endif; ?>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control <?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>"/>
              <?php if($errors->has('lname')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('lname')); ?></strong>
                </span>
              <?php endif; ?>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
<script type="text/javascript">
  function check(){
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>