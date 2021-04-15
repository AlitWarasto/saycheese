<div itemtype="http://schema.org/Product" itemscope>
  <meta itemprop="name" content="<?php the_title(); ?>" />
  <?php
  $sm16x9 = 1;
  foreach($atts as $att) {
    if($sm16x9 === 2) {
      $mimg = wp_get_attachment_image_src($att->ID,'16x9');
      $murl = $mimg[0];
      ?>
      <link itemprop="image" href="<?php echo $murl; ?>" />
    <?php
    } else {}
    $sm16x9++; 
  };
  ?>
  <?php
  $sm4x6 = 1;
  foreach($atts as $att) {
    if($sm4x6 === 2) {
      $mimg = wp_get_attachment_image_src($att->ID,'4x3');
      $murl = $mimg[0];
      ?>
    <link itemprop="image" href="<?php echo $murl; ?>" />
    <?php
    } else {}
    $sm4x6++; 
  };
  ?>
  <?php
  $sm1x1 = 1;
  foreach($atts as $att) {
    if($sm1x1 === 2) {
      $mimg = wp_get_attachment_image_src($att->ID,'1x1');
      $murl = $mimg[0];
      ?>
      <link itemprop="image" href="<?php echo $murl; ?>" />
    <?php
    } else {}
    $sm1x1++; 
  };
  ?>
  <meta itemprop="description" content="<?php echo get_the_content(); ?>." />
  <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
    <link itemprop="url" href="<?php echo $posurl; ?>" />
    <meta itemprop="availability" content="https://schema.org/InStock" />
    <meta itemprop="priceCurrency" content="IDR" />
    <meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
    <meta itemprop="price" content="<?php echo $hw1;?>"/>
    <div itemprop="seller" itemtype="http://schema.org/Organization" itemscope>
      <meta itemprop="name" content="PANTIES PIZZA" />
    </div>
  </div>
  <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
    <meta itemprop="reviewCount" content="<?php echo $users; ?>" />
    <meta itemprop="ratingValue" content="<?php echo $raval; ?>" />
  </div>
  <div itemprop="review" itemtype="http://schema.org/Review" itemscope>
    <div itemprop="author" itemtype="http://schema.org/Person" itemscope>
      <meta itemprop="name" content="Panties Pizza Customers" />
    </div>
    <div itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
      <meta itemprop="ratingValue" content="<?php echo $raval; ?>" />
      <meta itemprop="bestRating" content="5" />
    </div>
  </div>
  <div itemprop="brand" itemtype="http://schema.org/Thing" itemscope>
    <meta itemprop="name" content="<?php the_title(); ?>" />
  </div>
</div>