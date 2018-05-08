<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Teste</title>
    <meta name="description" content="Sistema Teste">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url()?>utils/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>utils/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>utils/vendor/twbs/bootstrap/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?php echo base_url()?>utils/vendor/datatables/datatables/media/css/datatables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>utils/vendor/datatables/datatables/media/css/jquery.datatables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>utils/vendor/components/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url()?>utils/css/style.css">

    <script src="<?php echo base_url(); ?>utils/vendor/components/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/datatables/datatables/media/js/jquery.datatables.min.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/datatables/datatables/media/js/datatables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/drmonty/datatables-responsive/js/datatables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/drmonty/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

 
</head>
<body>
    <nav class='nav navbar-nav navbar-dark navbar-p'>
        <?php echo $header; ?>        
    </nav>
    
    <div class='container' id='container'>
        <div class=''>
             <?php echo $content; ?>  
        </div>
        
    </div>
    
 
    


    

</body>
</html>
