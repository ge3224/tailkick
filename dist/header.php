<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <!--<meta name="author" content=""> -->
  <!--<link rel="icon" href="../../favicon.ico">-->
  <title>
    <?php bloginfo('name'); ?> | 
    <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
  </title>
  <link href="<?php bloginfo('template_url'); ?>/css/tailkick_1.css" rel="stylesheet">
  <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
  <?php wp_head(); ?>
</head>
