<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
      // Output CSS variable for header banner with versioning
      $theme_version = wp_get_theme()->get('Version'); 
    ?>
      <style>
          :root {
              --banner-url: url('<?php echo get_template_directory_uri(); ?>/media/banner.jpeg?v=<?php echo $theme_version; ?>');
          }
      </style>

    <?php wp_head();?>

    <meta name="color-scheme" content="light">
</head>
<body>
<header class="site-header">
  <div class="header-inner container">
    <div class="header-main">
    <h1 class="site-title">Adam Malczewski</h1>
    <div data-theme="dark">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'top-menu',
        'container' => 'nav',
        'container_class' => 'main-nav',
        'container_aria_label' => 'Main menu',
        'menu_class' => 'nav-list',
        'fallback_cb' => false
      )
    );
    ?>
    </div>
    <!--nav class="main-nav" aria-label="Main menu" data-theme="dark">
      <ul class="nav-list">
        <li><a href="<?php echo home_url(); ?>" class="contrast underline">Home</a></li>
        <li><a href="<?php echo home_url('/musings'); ?>" class="contrast underline">Musings</a></li>
        <li><a href="<?php echo home_url('/projects'); ?>" class="contrast underline">Projects</a></li>
      </ul>
    </nav-->
    </div>

    <nav class="theme-selector">
      <details class="dropdown">
        <summary role="button" class="outline contrast" data-theme="dark">Theme</summary>
        <ul class="dropdown-menu">
          <li><a href="#" data-theme-switcher="auto">Auto</a></li>
          <li><a href="#" data-theme-switcher="light">Light</a></li>
          <li><a href="#" data-theme-switcher="dark">Dark</a></li>
        </ul>
      </details>
    </nav>
  </div>
</header>