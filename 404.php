<?php
#404.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center" style="width: 100vw;height: 100vh;font-family: 'Roboto', sans-serif;font-size: 5vw;font-weight: 900;color: black;">
      <h1>PAGE NOT FOUND. ERROR 404</h1><br>
      <h3><a href="<?php echo $siteurl; ?>">Back to Home</a></h3>
    </div>
  </div>
</div>
<?php
get_footer();
} else {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center" style="width: 100vw;height: 100vh;font-family: 'Roboto', sans-serif;font-size: 5vw;font-weight: 900;color: black;">
          <h1>PAGE NOT FOUND. ERROR 404</h1><br>
          <h3><a href="<?php echo $siteurl; ?>"> <<< Back to Home</a></h3>
        </div>
      </div>
    </div>
  <?php
}
get_footer();
?>