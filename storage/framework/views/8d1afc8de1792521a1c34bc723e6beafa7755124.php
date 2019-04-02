<?php /* C:\Users\Dong Guillen's\Desktop\epoy\resources\views/cms/index.blade.php */ ?>
<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <div class="container">
    <h1>Contacts</h1><hr/>
  </div>
  <div class="form-group">
    <form action="<?php echo e(route('cms.index')); ?>" method="get">
      <div class="input-group col-sm-12">
        <?php echo e(csrf_field()); ?>

        <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-success ">Add New Record</a>
        <span class="col-sm-4"></span>
        <input  class="form-control" name="search_text" type="text" value="<?php echo e(isset($_GET['search_text']) ? $_GET['search_text']:''); ?>" />

        <div class="input-group-prepend">
           <input class="form-control btn btn-primary" type="submit" name="search" value="Search" />
        </div>

      </div>
    </form>

  </div>
  <div class="container">
    <table class="table table-striped table-bordered">
      <thead class="table-primary">
          <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Last Name</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $customers['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($cust->c_id); ?></td>
              <td><?php echo e($cust->fname); ?></td>
              <td><?php echo e($cust->mname); ?></td>
              <td ><?php echo e($cust->lname); ?></td>
              <td>
                <form action="<?php echo e(route('cms.destroy', $cust->c_id)); ?>" method="post">
                  <a href="<?php echo e(route('cms.edit',$cust->c_id)); ?>" class="btn btn-primary">Edit</a>
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if(isset($customers['msg'])): ?>
              <td colspan="5" class="table-danger" align="center">
                <?php echo e($customers['msg']); ?>

              </td>
          <?php endif; ?>
      </tbody>
    </table>
  <?php echo e($customers['data']->links()); ?>

  </div>
<div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>