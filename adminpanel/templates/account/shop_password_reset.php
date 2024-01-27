
<div class="row-fluid">

    <div class="row middle">
        <?php if (isset($flash['errors'])) : ?>
            <div class="col-md-offset-4 col-md-4 alert alert-danger"><a class='close' data-dismiss='alert'>x</a> <i class="glyphicon glyphicon-warning-sign"></i> <?php echo $flash['errors']; ?></div>
        <?php endif; ?>

        <div class="login-box col-md-offset-4 col-md-4">
            <form method="post" action="" class="form-horizontal reset-password" id="resetpassword-form">
                <fieldset>
                    <h2>Reset Your Password</h2>
                    <div class=" form-box">
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
        </div>
    </div>
</div>


<html>
<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>

        $(function () {

            $('#resetpassword-form').bind('submit', function () {

                data = $('#new-password').val();

                if($('#new-password').val() != $('#confirm-password').val()) {
                    alert("Password and Confirm Password don't match");
                    // Prevent form submission
                    event.preventDefault();
                }




            });
        });

    </script>
</head>
</html>