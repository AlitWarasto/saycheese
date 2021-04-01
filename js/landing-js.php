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
            $('#btn-mixzone').attr('src', response.url);
            $('#btn_mixzone').attr('value', response.url);
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
            $('#btn-inout').attr('src', response.url);
            $('#btn_inout').attr('value', response.url);
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
            $('#btn-slice').attr('src', response.url);
            $('#btn_slice').attr('value', response.url);
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
            $('#btn-calzone').attr('src', response.url);
            $('#btn_calzone').attr('value', response.url);
          });
        }
        this.window.open();
        return false;
      }
    });
  })( jQuery );

  /* Upload Display Mixzone
  Another Methode*/
  jQuery(function(){
    jQuery('#upload-img-mixzone').on("click", function(){
      var images = wp.media({
                    title     : "Upload Image",
                    multiple  : false
      }).open().on("select", function(e){
        var uImg = images.state().get("selection").first().toJSON();
        var sImg= uImg.url;
        jQuery('#img-mixzone').attr('src', sImg);
        jQuery('#img_mixzone').attr('value', sImg);
      });
    });
  });
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
            $('#img-inout').attr('src', response.url);
            $('#img_inout').attr('value', response.url);
          });
        }
        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Display Slice*/
  (function( $ ) {
  'use strict';
    $(function() {
      $('#upload-img-slice').click(open_custom_media_window);

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
            $('#img-slice').attr('src', response.url);
            $('#img_slice').attr('value', response.url);
          });
        }
        this.window.open();
        return false;
      }
    });
  })( jQuery );
/* Upload Display Calzone*/
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
            $('#img-calzone').attr('src', response.url);
            $('#img_calzone').attr('value', response.url);
          });
        }
        this.window.open();
        return false;
      }
    });
  })( jQuery );
  /* Upload Display Phone */
  jQuery(function(){
    jQuery('#upload-img-phone').on("click", function(){
      var images = wp.media({
                    title     : "Upload Image",
                    multiple  : false
      }).open().on("select", function(e){
        var uImg = images.state().get("selection").first().toJSON();
        var sImg= uImg.url;
        jQuery('#img-phone').attr('src', sImg);
        jQuery('#img_phone').attr('value', sImg);
          //console.log(selectedImage.sizes.medium.url);
      });
    });
  });
  </script>