
<?php
$site = '6LeE7b8ZAAAAAJSXcqghZa6spv9aUCuaZm1k8hjh';
$scrt = '6LeE7b8ZAAAAALYT37X6JwPR0gbVFLpU7I-J-DOk';
?>


  <footer class="footer grid_1_1-2" id="footer">

    <div class="">
      <?php
      $args = array(
        'theme_location' => 'footerNav',
        'depth' => 0,
        'container'	=> false,
        'fallback_cb' => false,
        'menu_class' => 'column_nav_bar',
      );
      wp_nav_menu($args);
      ?>

      <?php include 'inc/socialmedia.php'; ?>
    </div>

    <form class="form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <input type="text" name="a00" value="" placeholder="jeje" hidden>
      <h3 class="form_title">Contáctanos</h3>
      <div class="form_imp">
          <label class="form_label" for="foot_sumate_name">Nombre</label>
          <input class="form_input" type="text" name="nombre" id="foot_sumate_name" required>
      </div>
      <div class="form_imp">
          <label class="form_label" for="foot_sumate_mail">E-mail</label>
          <input class="form_input" type="email" name="email" id="foot_sumate_mail" required>
      </div>
      <div class="form_imp sumarme_textarea">
          <label class="form_label" for="foot_sumate_nota">Nota</label>
          <textarea class="form_input" type="text" id="foot_sumate_nota" name="nota"  required></textarea>
      </div>
      <div class="form_checkbox">
        <input type="checkbox" required>
        <p class="termsDescription">Acepto los <a href="https://generacion-o2.org/politica-privacidad/" target="_blank" style="text-decoration: underline;"> términos y condiciones</a> de Generación o2</p>
      </div>

      <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="<?php echo $site; ?>"></div>
      <input class="recaptcha" type="text" hidden value="">

      <input class="btn contact_btn buttonSend" disabled type="submit" name="submit" value="ENVIAR">
    </form>
    <p class="copyright"><?php echo get_post_meta('21', '6-copyright-footer', true); ?></p>
  </footer>
  <!-- <sign class="signature">
    <p>&#60;&#47;&#62; width ❤️ by <a href="https://lattedev.com/" target="_blank" class="latteLink">Latte</a></p>
  </sign> -->
  <?php wp_footer(); ?>
  <script src="https://www.google.com/recaptcha/api.js"></script>

</body>
</html>
