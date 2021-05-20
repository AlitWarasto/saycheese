<?php
/*
VERSION : 1.8.10.12
*/
  global $wp;
  $permaLink = get_the_permalink();
  $alink = home_url( $wp->request );

  /* ATTACHMENT TITLE */
  $atit = explode('-',str_replace(array("\n","\r","\t"),'',strip_tags($post->post_title)));
  $attitle = implode(" ",array_splice($atit,0,30));
  $seoatts = explode(' ',$attitle);
  shuffle ($seoatts);
  $seoatt = implode(' ',$seoatts);
          
  /* PAGE TITLE */
  $seots = explode('-',str_replace(array("\n","\r","\t"),'',strip_tags($post->post_title)));
  $seot = implode(' ',$seots);
  
  /* XCERPT */
  $wlimit = 20;
  $xco = explode(' ',str_replace(array("\n","\r","\t"),'',strip_tags($post->post_content)));
  $xcerpt = implode(" ",array_splice($xco,0,$wlimit));
  
  if (is_home()) {
    $mt = '<title>'.$post->post_title.' | '.$sitename.'</title>';
    $md = '<meta name="description" content="'.$xcerpt.'"/>';
    $mk = '<meta name="keywords" content="'.$seot.'"/>';
    $cu = '<link href="'.$permaLink.'" rel="canonical"/>';
  } elseif(is_page()) {
    $mt = '<title>'.$post->post_title.' | '.$sitename.'</title>';
    $md = '<meta name="description" content="'.$xcerpt.'"/>';
    $mk = '<meta name="keywords" content="'.$seot.'"/>';
    $cu = '<link href="'.$permaLink.'" rel="canonical"/>';
  } elseif(is_archive()) {
    $ptitle = get_the_archive_title();
    $arraytitle = array();
    $arrayxcerpt = array();
    $wppc = $wp_query->post_count;
    
    if(have_posts()) {
      while(have_posts()){
        the_post();
        $wlimit = 30;
        $xco = explode(' ',str_replace(array("\n","\r","\t"),'',strip_tags($post->post_content)));
        $xcerpt = implode(" ",array_splice($xco,0,$wlimit));
        
        $arraytitle[] = $post->post_title;
        $arrayxcerpt[] = $xcerpt;
      };
    } else {
      echo "no post";
      wp_reset_postdata();
   };
    
    /*== Custom Title - Desc ==*/
    $pc = 0;
    $rpc = array();
    while ($pc != $wppc){
      $rpc[] = $pc;
      $pc++;
    }
    shuffle($rpc);
    /*print_r($wppc);
    print_r($rpc);
    print_r($arraytitle);
    print_r($arrayxcerpt);*/
    
    $mt = '<title>'.$ptitle.' | '.$sitename.'</title>';
    $md = '<meta name="description" content="'.$arraytitle[$rpc[1]].' - '.$arrayxcerpt[$rpc[1]].'"/>';
    $mk = '<meta name="keywords" content="'.$arraytitle[$rpc[1]].'"/>';
    $cu = '<link href="'.$alink.'" rel="canonical"/>';

    /*====== SINGLE ============*/
  } elseif(is_single()) {
    $mt = '<title>'.$attitle.' - '.$sitename.'</title>';
    $md = '<meta name="description" content="'.$seot.' ~ '.$xcerpt.' "/>';
    $mk = '<meta name="keywords" content="'.$seoatt.'"/>';
    $cu = '<link href="'.$permaLink.'" rel="canonical"/>';
  /* 404 ------------------------------------ */
  } elseif(is_404()) {
    $mt = '<title>Error 404 Page Not Found | '.$sitename.'</title>';
    $md = '';
    $mk = '';
  /* ATTACHMENT ------------------------------------ */
  } elseif (is_attachment()) {  
    $mt = '<title>'.$attitle.' | '.$sitename.'</title>';
    $md = '<meta name="description" content="'.$lalt.'"/>';
    $mk = '<meta name="keywords" content="'.$seoatt.'"/>';
    $cu = '<link href="'.$permaLink.'" rel="canonical"/>';
  /* OTHERS --------------------------------- */
  } else {
    $mt = '';
    $md = '';
    $mk = '';

}

?>