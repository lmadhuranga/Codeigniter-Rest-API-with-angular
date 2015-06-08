<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $meta_title ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo(base_url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo(base_url('assets/css/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo(base_url('assets/css/sb-admin.css')); ?>" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">

                        <?php echo $custom_error; ?>
                        <?php echo $this->session->flashdata('error'); ?>
    
                        <h3 class="panel-title">Forget password</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('user/admin/forget_password'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label>Enter email address</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required='required'>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo(base_url('assets/js/jquery-1.10.2.js')); ?>"></script>
    <script src="<?php echo(base_url('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo(base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
