<script type="text/javascript">
  (function( $ ) {
    /* Upload Btn Mixzone*/
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
    /* Upload Btn In Out*/
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
    /* Upload Btn Slice*/
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
    /* Upload Btn Calzone*/
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

    /* Upload Display Mixzone
    Another Methode*/
    $(function(){
      $('#upload-img-mixzone').on("click", function(){
        var images = wp.media({
                      title     : "Upload Image",
                      multiple  : false
        }).open().on("select", function(e){
          var uImg = images.state().get("selection").first().toJSON();
          var sImg= uImg.url;
          $('#img-mixzone').attr('src', sImg);
          $('#img_mixzone').attr('value', sImg);
        });
      });
    });
    /* Upload Display In Out*/
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
    /* Upload Display Slice*/
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
    /* Upload Display Calzone*/
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
    /* Upload Display Phone */
    $(function(){
      $('#upload-img-phone').on("click", function(){
        var images = wp.media({
                      title     : "Upload Image",
                      multiple  : false
        }).open().on("select", function(e){
          var uImg = images.state().get("selection").first().toJSON();
          var sImg= uImg.url;
          $('#img-phone').attr('src', sImg);
          $('#img_phone').attr('value', sImg);
            //console.log(selectedImage.sizes.medium.url);
        });
      });
    });/* Upload Display Pizza Image */
    $(function(){
      $('#upload-img-pizza').on("click", function(){
        var images = wp.media({
                      title     : "Upload Image",
                      multiple  : false
        }).open().on("select", function(e){
          var uImg = images.state().get("selection").first().toJSON();
          var sImg= uImg.url;
          $('#img-pizza').attr('src', sImg);
          $('#img_pizza').attr('value', sImg);
            //console.log(selectedImage.sizes.medium.url);
        });
      });
    });
    /* woo feature on / off */
    if ($('#woofeature').val()=="1") {
      $('#checkbox').prop('checked', true);
      $('#switch_status').html('Switched <span style="color:green;font-weight:bold;font-size:large;">ON</span>.');
    }else{
      $('#checkbox').prop('checked', false);
      $('#switch_status').html('Switched <span style="color:#8c8f94;font-weight:bold;font-size:large;">OFF</span>.');
    };
    $('#checkbox').click(function(){
      if($(this).prop('checked')){
        $('#switch_status').html('Switched <span style="color:green;font-weight:bold;font-size:large;">ON</span>.');
        $('#woofeature').attr('value',"1");
      }else{
        $('#switch_status').html('Switched <span style="color:#8c8f94;font-weight:bold;font-size:large;">OFF</span>.');
        $('#woofeature').attr('value',"0");
      }
    });
  })( jQuery );
</script>