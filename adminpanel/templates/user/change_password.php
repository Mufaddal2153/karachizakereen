<?php
if(isset($_REQUEST) && !empty($_REQUEST)) {
  $data = $_REQUEST;
}
else {
  unset($data);
}

?>
<div class="row-fluid">
    <div class="box">
          <?php
          if(isset($_SESSION['error'])) {
          	?>
          	<div class="alert alert-error fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $_SESSION['error']; ?></div>
          	<?php
          	unset($_SESSION['error']);
          }
          elseif(isset($_SESSION['success'])) {
          	?>
              <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $_SESSION['success']; ?></div>
          	<?php
          	unset($_SESSION['success']);
          }
          ?>
        <div class="box-header well">
            <h2><i class="icon-edit"></i> Change Password</h2>
        </div>

        <div class="box-content">
            <form class="form form-horizontal" method="post" action="">
               <fieldset>
               <div class="row">
                    <div class="control-group">
                        <label class="control-label" for="old_pass">Old Password: </label>
                        <div class="controls">
                            <input type="password" name="old_pass" id="old_pass" value="<?php echo (isset($data) ? $data['old_pass'] : ''); ?>" required />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="control-group">
                        <label class="control-label" for="new_pass">New Password: </label>
                        <div class="controls">
                            <input type="password" name="new_pass" id="new_pass" value="<?php echo (isset($data) ? $data['new_pass'] : ''); ?>" required />
                            <span class="muted">Password should be atleast 5 characters long</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="control-group">
                        <label class="control-label" for="cnf_pass">Confirm Password: </label>
                        <div class="controls">
                            <input type="password" name="cnf_pass" id="cnf_pass" value="<?php echo (isset($data) ? $data['cnf_pass'] : ''); ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-check icon-white"></i></button>
                    <button type="reset" name="reset" class="btn">Reset <i class="icon-refresh"></i></button>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>