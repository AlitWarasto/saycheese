<?php
function wpem(){
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wpem' );
#reg setting DB hook
function saycheese_reg() {
  #register_setting('nama_group_setting','nama_input_nya');
  register_setting('saycheese_sett','btn_mixzone');
  register_setting('saycheese_sett','btn_inout');
  register_setting('saycheese_sett','btn_slice');
  register_setting('saycheese_sett','btn_calzone');
  register_setting('saycheese_sett','img_mixzone');
  register_setting('saycheese_sett','img_inout');
  register_setting('saycheese_sett','img_slice');
  register_setting('saycheese_sett','img_calzone');
  register_setting('saycheese_sett','img_phone');
  register_setting('saycheese_sett','woofeature');
}
add_action('admin_init', 'saycheese_reg');

#add admin menu for home page settings
function saycheese_landing_settings() {
  #add main menu
  add_menu_page(
    __('Landing Page Settings', 'saycheese'),
    __('Landing Page', 'saycheese'),
    'manage_options',
    'landing-page-settings',
    'saycheese_home_settings',
    'dashicons-coffee',
    '4'
  );
  #add sub menu
  #add_submenu_page('landing-page-settings','Setting Images','Image Settings','manage_options','landing-subpage-settings','saycheese_subhome_settings');
}
add_action('admin_menu', 'saycheese_landing_settings');

function saycheese_home_settings(){
  /* KONFIRMASI */
  if(isset($_REQUEST['settings-updated'])) {
    echo '<div class="updated"><strong>Settings saved.</strong></div>';
  } else {}
  ?>
  <style type="text/css">
    .btn-wrap{
      display: inline-flex;
    }
    .say-wrap :is(h1,h2,h3,h4,h5,h6){
      margin-bottom: .5rem;
    }
    .fg{
      max-width: 100%;
      margin-right: 1rem;
      display: flex;
      flex-direction: column;
      margin-bottom: 1rem;
    }
    .img-icon{
      max-width: 6vw;
      min-height: 6vw;
      width: 6vw;
      height: auto;
      margin: .5rem 0;
      padding: 2px;
      border: solid white 1px;
      border-radius: 5%;
    }
    .button-primary{
      align-self: flex-start;
      text-align: center;
      overflow: hidden;
    }
     /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    input:checked + .slider {
      background-color: #2196F3;
    }
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    .slider.round:before {
      border-radius: 50%;
    } 
  </style>
  <div class="wrap say-wrap">
    <h1>Landing Page Settings</h1>
    <form action="options.php" method="post">
      <?php settings_fields('saycheese_sett'); do_settings_sections('saycheese_sett'); ?>
      <h2>Varian Button Image</h2>
      <div class="btn-wrap">
        <div class="fg">
          <label for="btn_mixzone">Mixzone Button Image</label>
          <img id="btn-mixzone" src="<?php echo get_option('btn_mixzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-mixzone"/>
          <input id="btn_mixzone" type="hidden" name="btn_mixzone" value="<?php echo get_option('btn_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="btn_mixzone">In & Out Button Image</label>
          <img id="btn-inout" src="<?php echo get_option('btn_inout'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-inout"/>
          <input id="btn_inout" type="hidden" name="btn_inout" value="<?php echo get_option('btn_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="btn_slice">Slice Button Image</label>
          <img id="btn-slice" src="<?php echo get_option('btn_slice'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-slice"/>
          <input id="btn_slice" type="hidden" name="btn_slice" value="<?php echo get_option('btn_slice'); ?>"/>
        </div>
        <div class="fg">
          <label for="btn_calzone">Calzone Button Image</label>
          <img id="btn-calzone" src="<?php echo get_option('btn_calzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-calzone"/>
          <input id="btn_calzone" type="hidden" name="btn_calzone" value="<?php echo get_option('btn_calzone'); ?>"/>
        </div>
      </div>
      <h2>Varian Display Image</h2>
      <div class="btn-wrap">
        <div class="fg">
          <label for="img_mixzone">Mixzone Display Image</label>
          <img id="img-mixzone" src="<?php echo get_option('img_mixzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-mixzone"/>
          <input id="img_mixzone" type="hidden" name="img_mixzone" value="<?php echo get_option('img_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_inout">In & Out Display Image</label>
          <img id="img-inout" src="<?php echo get_option('img_inout'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-inout"/>
          <input id="img_inout" type="hidden" name="img_inout" value="<?php echo get_option('img_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_slice">Slice Display Image</label>
          <img id="img-slice" src="<?php echo get_option('img_slice'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-slice"/>
          <input id="img_slice" type="hidden" name="img_slice" value="<?php echo get_option('img_slice'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_calzone">Calzone Display Image</label>
          <img id="img-calzone" src="<?php echo get_option('img_calzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-calzone"/>
          <input id="img_calzone" type="hidden" name="img_calzone" value="<?php echo get_option('img_calzone'); ?>"/>
        </div>
      </div>
      <h2>Phone Display Image</h2>
      <div class="btn-wrap">
        <div class="fg">
          <label for="img_calzone">Phone Display Image</label>
          <img id="img-phone" src="<?php echo get_option('img_phone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-phone"/>
          <input id="img_phone" type="hidden" name="img_phone" value="<?php echo get_option('img_phone'); ?>"/>
        </div>
      </div>
      <h2>Woocommerce Feature</h2>
      <div class="btn-wrap">
        <div class="fg">
          <label class="switch">
            <input type="checkbox" name="woofeature" id="checkbox" value="1">
            <span class="slider round"></span>
          </label>
          <div class="" id="switch_status">Switched off.</div>
        </div>
      </div>
      <div class="fg">
        <label><h4>Save Settings</h4></label>
        <input type="submit" name="submit" value="Save Changes" class="button-primary"/>
      </div>
    </form>
  </div>
  <?php
  include(TEMPLATEPATH.'/js/landing-js.php');
}