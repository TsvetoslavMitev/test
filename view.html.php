
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home">


        <div class="rm_input rm_text">
            <label for="pp_button_bg_color">
                <h2>Overall Elements Colors</h2>
                Overall Elements Background Color
            </label>
            <br>

            <?php $plugins_url = admin_url('admin.php?page=builder');
            ?>
            <form name="input" action="<?php echo $plugins_url ?>" method="post">
                <input id="color" class="color_picker" type="text"  style="width: 200px; float: left;" value="<?php echo get_option('btn-primary-color'); ?>" name="btn-primary-color">Buy button text color.<br>
                <input id="btn-primary-hover-text-color" class="color_picker" type="text"  style="width: 200px; float: left;" value="<?php echo get_option('btn-primary-hover-text-color'); ?>" name="btn-primary-hover-text-color"><br>
                


<script type='text/javascript'>
                    jQuery(function () {
                        jQuery('.color_picker').wpColorPicker();
                    });
                </script>
                <small>Select color for button and overall elements background</small>
                <div class="clearfix"></div>
                <input type="submit" value="Submit">
           


<script type="text/javascript">
			
      jQuery(function () {
        jQuery("#fontselect").fontselect();

    
      });
	  
    </script>
			
				<input value='<?php echo get_option('btn-primary-font-family'); ?>' name="btn-primary-font-family" id="fontselect"   />
		        
				
				
		   
			   
			   
			   
			   
			   
			   
			   
			   
			   
<div class="slider"></div>

				<input type="hidden" value='<?php echo get_option('btn-primary-font-size'); ?>' name="btn-primary-font-size" id="slider" />
		      
               
			  
<script type="text/javascript">
jQuery(function () {

jQuery(".slider")
    .slider({ 
        min: 7, 
        max: 36, 
        range: false, 
        values: [jQuery("input#slider").val()],
		slide: function (event, ui) {
                  
                    jQuery("input#slider").val(ui.values[ 0 ]);
                }
		
    })
	 .slider("pips", {
        
    })
                        
    .slider("float");
});
</script>
	<div class="slider2"></div>

				<input type="hidden" value='<?php echo get_option('btn-primary-height-size'); ?>' name="btn-primary-height-size" id="slider2" />
		      
               
			  
<script type="text/javascript">
jQuery(function () {

jQuery(".slider2")
    .slider({ 
        min: 2, 
        max: 36, 
        range: false, 
        values: [jQuery("input#slider2").val()],
		slide: function (event, ui) {
                  
                    jQuery("input#slider2").val(ui.values[ 0 ]);
                }
		
    })
	 .slider("pips", {
        
    })
                        
    .slider("float");
});
</script>
	
			  
			 <div class="slider3"></div>

				<input type="hidden" value='<?php echo get_option('btn-primary-width-size'); ?>' name="btn-primary-width-size" id="slider3" />
		      
               
			  
<script type="text/javascript">
jQuery(function () {

jQuery(".slider3")
    .slider({ 
        min: 2, 
        max: 36, 
        range: false, 
        values: [jQuery("input#slider3").val()],
		slide: function (event, ui) {
                  
                    jQuery("input#slider3").val(ui.values[ 0 ]);
                }
		
    })
	 .slider("pips", {
        
    })
                        
    .slider("float");
});
</script> 
			  
			  
			  
			  
			  
			  
		   </form> 
		
			
     
     

        </div>













    </div>
    
</div>
<?php
echo $_POST['btn-primary-color'];
echo $_POST['btn-primary-font-family'];
echo get_option('btn-primary-color');
?>
