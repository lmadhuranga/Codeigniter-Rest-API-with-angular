<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <title><?php echo $meta_title ?></title>
    <script type="text/javascript">
        var base_url = "<?php  echo(base_url()); ?>";
        var site_url = "<?php  echo(site_url()); ?>"
    </script>
</head>
<h1>Front Header</h1>
<a href="<?php echo site_url('admin/user/logout') ?>">log out</a>