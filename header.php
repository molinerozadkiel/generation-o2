<!DOCTYPE html>
<html class="html" lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, user-scalable=no"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php body_class('body'); ?> id="body">

	<view id="load" class="load">
			<div class="circle"></div>
	</view>

  <header class="header" id="header">

    <a class="logo" href="<?php echo get_site_url(); ?>">
      <svg class="logo_svg" viewBox="0 0 98 66" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.56116 26.0257V25.9254C6.56116 15.9573 14.3128 7.79236 24.9162 7.79236C31.2174 7.79236 35.0185 9.49339 38.6736 12.6012L33.8228 18.4612C31.1206 16.2074 28.7275 14.9061 24.6699 14.9061C19.0651 14.9061 14.6169 19.8646 14.6169 25.825V25.9254C14.6169 32.3365 19.0175 37.045 25.2202 37.045C28.021 37.045 30.5211 36.3442 32.4726 34.9408V29.9381H24.7158V23.2751H39.9134V38.5028C36.3127 41.5646 31.3618 44.0634 24.9672 44.0634C14.0632 44.0566 6.56116 36.402 6.56116 26.0257Z" fill="#90B73B"/>
        <path d="M45.2244 30.1882V30.0879C45.2244 22.3737 51.4271 16.1122 59.7784 16.1122C68.082 16.1122 74.2338 22.275 74.2338 29.9875V30.0879C74.2338 37.802 68.0311 44.0635 59.6782 44.0635C51.3762 44.0567 45.2244 37.9024 45.2244 30.1882ZM66.7301 30.1882V30.0879C66.7301 26.1313 63.8801 22.6748 59.6782 22.6748C55.3284 22.6748 52.7264 26.0309 52.7264 29.9892V30.0896C52.7264 34.0479 55.5781 37.5026 59.7784 37.5026C64.1298 37.5009 66.7301 34.1448 66.7301 30.1882Z" fill="#9C1F1E"/>
        <path d="M75.9984 54.5588L82.9433 48.8569C85.5369 46.7085 86.5508 45.574 86.5508 43.8423C86.5508 42.0817 85.3874 41.1207 83.7484 41.1207C82.1383 41.1207 81.0309 42.0154 79.4853 43.9274L76.26 41.335C78.3168 38.5283 80.3142 37.0059 84.0405 37.0059C88.3614 37.0059 91.2232 39.5438 91.2232 43.4545V43.514C91.2232 47.0062 89.4348 48.7379 85.739 51.6041L82.3421 54.2322H91.4339V58.2024H75.9984V54.5588Z" fill="#90B73B"/>
      </svg>
    </a>

    <div class="navigation_menu">
      <?php
      $args = array(
        'theme_location' => 'header',
        'depth' => 0,
        'container'	=> false,
        'fallback_cb' => false,
        'menu_class' => 'navBar',
      );
      wp_nav_menu($args);
      ?>

      <?php  include 'inc/socialmedia.php'; ?>
    </div>

    <div class="btn_dona">
      <p class="dona_p" onclick="altClassFromSelector('active', '.hidden_list_menu')"><?php echo get_post_meta('21', '5-palabra-dona', true); ?></p>
      <ul class="hidden_list_menu">
        <p class="close_hidden_list" onclick="altClassFromSelector('active', '.hidden_list_menu')">+</p>
        <li class="hidden_list_menu_item">
          <a href="https://www.teaming.net/asociaciongo2" target="_blank" class="hidden_list_menu_link">&#187;Donar 1€</a>
        </li>
      </ul>
    </div>

    <div class="hamburger_menu" onclick="altClassFromSelector('active','.header')">
      <span class="hamStripe"></span>
      <span class="hamStripe"></span>
      <span class="hamStripe"></span>
    </div>

  </header>
