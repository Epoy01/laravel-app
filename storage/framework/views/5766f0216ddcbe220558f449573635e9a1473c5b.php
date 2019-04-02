<?php /* C:\Users\Dong Guillen's\Desktop\epoy\resources\views/contacts/edit.blade.php */ ?>
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
      <form method="post" action="<?php echo e(route('contacts.update', $contacts->cont_id)); ?>">
        <?php echo method_field('PATCH'); ?>
        <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="fname">First Name:</label>
              <input type="text" id="fname" class="form-control <?php echo e($errors->all()&&$errors->first('fname') ? 'border border-danger':''); ?>" name="fname" value="<?php echo e($contacts->fname ? $contacts->fname:old('fname')); ?>" onkeydown="" />
              <p id="err_fname" class="text-danger"><?php echo e($errors->all() ? $errors->first('fname'):""); ?></font>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="mname">Middle Name:</label>
              <input type="text" class="form-control <?php echo e($errors->all()&&$errors->first('mname') ? 'border border-danger':''); ?>" name="mname" value="<?php echo e($contacts->mname ? $contacts->mname:old('mname')); ?>"/>
              <p class="text-danger"><?php echo e($errors->all() ? $errors->first('mname'):""); ?></p>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control <?php echo e($errors->all()&&$errors->first('lname') ? 'border border-danger':''); ?>" name="lname" value="<?php echo e($contacts->lname ? $contacts->lname:old('lname')); ?>"/>
              <p class="text-danger"><?php echo e($errors->all() ? $errors->first('lname'):""); ?></p>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="age">Age:</label>
              <input type="numeric" min='1' class="form-control <?php echo e($errors->all()&&$errors->first('age') ? 'border border-danger':''); ?>" name="age" value="<?php echo e($contacts->age ? $contacts->age:old('age')); ?>"/>
              <p class="text-danger"><?php echo e($errors->all() ? $errors->first('age'):""); ?></p>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="gen">Gender:</label>
              <select class="form-control <?php echo e($errors->all()&&$errors->first('gen') ? 'border border-danger':''); ?>" name="gen">
                <option selected="<?php echo e($contacts->gen ? $contacts->gen:old('gen')); ?>"><?php echo e($contacts->gen ? $contacts->gen:old('gen')); ?></option>
                <option>Male</option>
                <option>Female</option>
              </select>
              <p class="text-danger"><?php echo e($errors->all() ? $errors->first('gen'):""); ?></p>
          </div>
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="contact">Contact Number:</label>
              <input type="text" class="form-control <?php echo e($errors->all()&&$errors->first('contact') ? 'border border-danger':''); ?>" name="contact" value="<?php echo e($contacts->contact ? $contacts->contact:old('contact')); ?>"/>
              <p class="text-danger"><?php echo e($errors->all() ? $errors->first('contact'):""); ?></p>
          </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>