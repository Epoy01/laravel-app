<?php /* C:\Users\Dong Guillen's\Desktop\epoy\resources\views/contacts/index.blade.php */ ?>
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
    <form action="<?php echo e(route('contacts.index')); ?>" method="get">
      <div class="input-group col-sm-12">
        <?php echo e(csrf_field()); ?>

        <a href="<?php echo e(route('contacts.create')); ?>" class="btn btn-success ">Add New Record</a>
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
            <td>Age</td>
            <td>Gender</td>
            <td>Contact Number</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $contacts['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($cont->cont_id); ?></td>
              <td><?php echo e($cont->fname); ?></td>
              <td><?php echo e($cont->mname); ?></td>
              <td ><?php echo e($cont->lname); ?></td>
              <td><?php echo e($cont->age); ?></td>
              <td><?php echo e($cont->gen); ?></td>
              <td><?php echo e($cont->contact); ?></td>
              <td>
                <a href="<?php echo e(route('contacts.edit',$cont->cont_id)); ?>" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="del(<?php echo e($cont); ?>)">Delete</button>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if(isset($contacts['msg'])): ?>
              <td colspan="8" class="table-danger" align="center">
                <?php echo e($contacts['msg']); ?>

              </td>
          <?php endif; ?>
      </tbody>
    </table>
  <?php echo e($contacts['data']->links()); ?>

  </div>
<div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo e(route('contacts.destroy',0)); ?>" method="post">
      <?php echo e(method_field('delete')); ?>

      <?php echo e(csrf_field()); ?>

      <div class="modal-header alert-danger">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert-danger" >
        <input type="text" name="del_id" id="my_selected" hidden>
        <div id="del_item">   
        </div>
      </div>
      <div class="modal-footer alert-danger">
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function del(cont){
    data='<p>ID: '+cont['cont_id']+'<br/>Name: '+cont['fname']+' '+cont['mname']+' '+cont['lname']+'<br/>Age: '+cont['age']+'<br/>Gender: '+cont['gen']+'<br/>Contact Number: '+cont['contact']+'</p>'
    $('#del_item').html(data);
    $('#my_selected').val(cont['cont_id']);
  }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>