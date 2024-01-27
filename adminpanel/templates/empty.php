<h4><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h4>
<?php if (isset($flash['success'])) : ?>
    <div class="alert alert-success"><?php echo $flash['success']; ?></div>
<?php endif; ?>
<?php if (isset($flash['errors'])) : ?>
    <div class="alert alert-danger"><?php echo $flash['errors']; ?></div>
<?php endif; ?>