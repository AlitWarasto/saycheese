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
    .fg{
      max-width: 100%;
      margin-top: 1rem;
      margin-right: 1rem;
      display: flex;
      flex-direction: column;
    }
    .img-icon{
      max-width: 6vw;
      width: 6vw;
      height: 6vw;
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
  </style>
  <div class="wrap">
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
      <h2>Varian Button Image</h2>
      <div class="btn-wrap">
        <div class="fg">
          <label for="img_mixzone">Mixzone Display Image</label>
          <img id="img-mixzone" src="<?php echo get_option('img_mixzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-mixzone"/>
          <input id="img_mixzone" type="hidden" name="img_mixzone" value="<?php echo get_option('img_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_inout">In & Out Button Image</label>
          <img id="img-inout" src="<?php echo get_option('img_inout'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-inout"/>
          <input id="img_inout" type="hidden" name="img_inout" value="<?php echo get_option('img_inout'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_slice">Slice Button Image</label>
          <img id="img-slice" src="<?php echo get_option('img_slice'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-slice"/>
          <input id="img_slice" type="hidden" name="img_slice" value="<?php echo get_option('img_slice'); ?>"/>
        </div>
        <div class="fg">
          <label for="img_calzone">Calzone Button Image</label>
          <img id="img-calzone" src="<?php echo get_option('img_calzone'); ?>" class="img-icon"/>
          <input type="button" value="Upload Image" class="button-primary" id="upload-img-calzone"/>
          <input id="img_calzone" type="hidden" name="img_calzone" value="<?php echo get_option('img_calzone'); ?>"/>
        </div>
        
      </div>
      <div class="fg">
        <label><h4>Save Settings</h4></label>
        <input type="submit" name="submit" value="Save Changes" class="button-primary"/>
      </div>
    </form>

  </div>
  <script type="text/javascript">
  /* Upload Btn Mixzone*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-mixzone').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-mixzone').attr('src', response.sizes.thumbnail.url);
            $('#btn_mixzone').attr('value', response.sizes.thumbnail.url);
            $('#btn-mixzone').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Btn In Out*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-inout').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-inout').attr('src', response.sizes.thumbnail.url);
            $('#btn_inout').attr('value', response.sizes.thumbnail.url);
            $('#btn-inout').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Btn Slice*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-slice').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-slice').attr('src', response.sizes.thumbnail.url);
            $('#btn_slice').attr('value', response.sizes.thumbnail.url);
            $('#btn-slice').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
/* Upload Btn Calzone*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-calzone').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-calzone').attr('src', response.sizes.thumbnail.url);
            $('#btn_calzone').attr('value', response.sizes.thumbnail.url);
            $('#btn-calzone').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );

  /* Upload Display Mixzone*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-img-calzone').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#img-mixzone').attr('src', response.sizes.thumbnail.url);
            $('#img_mixzone').attr('value', response.sizes.thumbnail.url);
            $('#img-mixzone').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Display In Out*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-img-inout').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#img-inout').attr('src', response.sizes.thumbnail.url);
            $('#img_inout').attr('value', response.sizes.thumbnail.url);
            $('#img-inout').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Slice*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-slice').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-slice').attr('src', response.sizes.thumbnail.url);
            $('#btn_slice').attr('value', response.sizes.thumbnail.url);
            $('#btn-slice').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
/* Upload Calzone*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-calzone').click(open_custom_media_window);

      function open_custom_media_window() {
        if (this.window === undefined) {
          this.window = wp.media({
            title: 'Insert Image',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert Image'}
          });

          var self = this;
          this.window.on('select', function() {
            var response = self.window.state().get('selection').first().toJSON();

            $('.wp_attachment_id').val(response.id);
            $('#btn-calzone').attr('src', response.sizes.thumbnail.url);
            $('#btn_calzone').attr('value', response.sizes.thumbnail.url);
            $('#btn-calzone').show();
          });
        }

        this.window.open();
        return false;
      }
    });
  })( jQuery );
  </script>
  <?php
}