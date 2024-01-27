<div class="row-fluid">
    <div class="row middle">
        <?php if (isset($flash['errors'])) : ?>
            <div class="col-md-offset-4 col-md-4 alert alert-danger"><a class='close' data-dismiss='alert'>x</a> <i class="glyphicon glyphicon-warning-sign"></i> <?php echo $flash['errors']; ?></div>
        <?php endif; ?>
        <div class="login-box col-md-offset-4 col-md-4">
        <?php if($token): ?>
            <form method="post" action="" class="form-horizontal reset-password" id="reset-password-form">
                <fieldset>
                    <h2>Reset Your Password</h2>
                    <div class="form-box">
                        <div class="form-group">
                            <label for="password" class="col-sm-5 control-label">New Password: </label>
                            <div class="col-sm-7">
                                <input type="password" name="new-password" id="new-password" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-5 control-label">Confirm Password: </label>

                            <div class="col-sm-7">
                                <input type="password" name="confirm-password" id="confirm-password" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" name="submit" class="btn btn-lg btn-success pull-right">Change Password</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        <?php else: ?>
            <h2>Reset Password</h2>
            <div class="form-box text-center">
                <div class="col-sm-12 text-center form-group">
                    This link to reset password has expired or invalid. <br /><a href="<?php echo HTTP_SERVER ?>login">Request an email</a> with a new link to reset your password.
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>