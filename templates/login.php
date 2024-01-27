<?php if (isset($flash['errors'])) : ?>
    <div class="col-md-offset-4 col-md-4 alert alert-danger"><a class='close' data-dismiss='alert'>x</a> <i class="glyphicon glyphicon-warning-sign"></i> <?php echo $flash['errors']; ?></div>
<?php endif; ?>
       
<?php if (isset($flash['success'])) : ?>
    <div class="col-md-offset-4 col-md-4 alert alert-success"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
<?php endif; ?>

<div class="login-box col-md-offset-4 col-md-4 adminloginform">
    <form method="post" action="" class="form-horizontal login-form">
        <fieldset>
            <h2 class="loginheading">Aamilsaheb Login</h2>
            <div class=" form-box">
                <div class="form-group">
                    <label for="user" class="col-sm-5 control-label">Aamil: </label>
                    <div class="col-sm-7">
                        <input type="text" name="user" id="user" class="form-control" value="<?php echo (isset($_SESSION['user']) ? $_SESSION['user'] : ''); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-5 control-label">Password: </label>
                    <div class="col-sm-7">
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo (isset($_SESSION['password']) ? $_SESSION['password'] : ''); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button type="submit" name="submit" class="btn btn-md btn-success pull-right">LOGIN</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clearfix"></div>
<br />