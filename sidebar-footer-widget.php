<?php
if( ! is_active_sidebar( 'footer-widget' ) ) {
  return;
}
?>

<div id="tertiary" class="widget-area" role="complementary">

  <?php dynamic_sidebar( 'footer-widget' ); ?>

</div>