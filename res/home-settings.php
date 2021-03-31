<?php
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
  add_submenu_page('landing-page-settings','Setting Images','Image Settings','manage_options','landing-subpage-settings','saycheese_subhome_settings');
}
add_action('admin_menu', 'saycheese_landing_settings');

function saycheese_home_settings(){
  ?>
  <div class="wrap">
    <h1>Landing Page Settings</h1>
    <div class="form-group ">
        <label for="btn_mixzone">Mixzone Button</label>
        <input class="form-control" type="text" name="btn_mixzone" placeholder="Mixzone Button">
    </div>
  </div>
  <?php
}
function saycheese_subhome_settings(){
  ?>
  <div class="wrap"><h1>Image Settings</h1></div>
  <?php
}
