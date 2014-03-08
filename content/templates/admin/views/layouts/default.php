<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title><?php echo $template['title']; ?></title>
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Content Management System Created by DIY - Developer Team" name="description" />
    <meta content="" name="author" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

    <body>
        <?php echo $template['partials']['header'] ?>
        <?php echo $template['partials']['navigation'] ?>
        <?php echo $user['username'] ?>
        <h3> {module_name} <small> {module_desc} </small></h3>
        <?php echo $template['body'] ?>
        <?php echo $template['partials']['footer'] ?>
    </body>
</html>