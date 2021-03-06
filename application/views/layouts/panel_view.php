<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=@$tlp_title;?></title>
    <base href="<?=base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="none" />
    <link href="public/images/favicon.ico" rel="stylesheet icon" type="image/ico" />
    <?php echo $this->assets->css(); ?>
    <!--[if lt IE 8]><link rel="stylesheet" href="public/css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
    <!--[if IE 6]><link rel="stylesheet" href="public/css/styleIE6.css" type="text/css" media="screen, projection"/><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="public/css/styleIE7.css" type="text/css" media="screen, projection"/><![endif]-->
    <?php echo $this->assets->js(); ?>
</head>
<body>
    <div class="container">
        <div class="span-24 last header"> 
        <?php require(APPPATH . 'views/includes/header_panel_inc.php')?>
        </div>
        <div class="clear span-24 last main-container">
        <?php echo $this->template->yield(); ?>
        </div>
        <div class="clear span-24 last footer"> 
        <?php require(APPPATH . 'views/includes/footer_panel_inc.php')?>
        </div>
    </div>
</body>
</html>