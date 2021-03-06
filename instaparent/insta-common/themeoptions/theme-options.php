<?php
/**
 * Theme Options Page
 * Version: 1.6.0
 * Bookt 2013
 */

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'instaparent_options', 'instaparent_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	/* the function is like this -> add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function ) */
	add_theme_page( __( 'Theme Options', 'instaparent' ), __( 'Theme Options', 'instaparent' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/*
* Add Styles And JS to the Theme Options page only
*/
function my_enqueue($hook) {
	/* if we are in our theme options page the $hook will be appearance_page_ plus the $menu_slug we used when using add_theme_page */
   if( 'appearance_page_theme_options' == $hook )
   {
	   /* the JS for the tabs */
		wp_enqueue_script( 'jquery-ui-tabs' );
		
		/* colorpicker CSS and JS */		
		wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'wp-color-picker' );
		
		/* our CSS file for the Theme options page */
	    wp_enqueue_style( 'ThemeOptionsCSS', get_template_directory_uri() . '/insta-common/themeoptions/style.css', false, '1.0', 'all' );
   }
   
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

$presetStyle_options = array(
	/*'default' => array(
		'value' => 'default',
		'label' => __( 'Default', 'instaparent' )
	),*/
	'style01' => array(
		'value' => 'style01',
		'label' => __( 'Standard Interiors', 'instaparent' ),
		'description' => 'Lorem ipsum dolor sit amet, consec adipiscing elit, sed diam nonummy nibh.'
	),
	'style02' => array(
		'value' => 'style02',
		'label' => __( 'Luxury Interiors', 'instaparent' ),
		'description' => 'Lorem ipsum dolor sit amet, consec adipiscing elit, sed diam nonummy nibh.'
	),
	'style03' => array(
		'value' => 'style03',
		'label' => __( 'Family Getaway', 'instaparent' ),
		'description' => 'Lorem ipsum dolor sit amet, consec adipiscing elit, sed diam nonummy nibh.'
	),
	'style04' => array(
		'value' => 'style04',
		'label' => __( 'Big City', 'instaparent' ),
		'description' => 'Lorem ipsum dolor sit amet, consec adipiscing elit, sed diam nonummy nibh.'
	),
	'style05' => array(
		'value' => 'style05',
		'label' => __( 'Pacific Coast', 'instaparent' ),
		'description' => 'Lorem ipsum dolor sit amet, consec adipiscing elit, sed diam nonummy nibh.'
	),
	'style06' => array(
		'value' => 'style06',
		'label' => __( 'Florida Beach', 'instaparent' ),
		'description' => 'Comming Soon!!'
	),
	'style07' => array(
		'value' => 'style07',
		'label' => __( 'Ski Mountain', 'instaparent' ),
		'description' => 'Comming Soon!!'
	),
	'style08' => array(
		'value' => 'style08',
		'label' => __( 'Lake Cabin', 'instaparent' ),
		'description' => 'Comming Soon!! (missing Slideshow Images)'
	),
	'style09' => array(
		'value' => 'style09',
		'label' => __( 'Caribbean Beach', 'instaparent' ),
		'description' => 'Comming Soon!! (missing proof)'
	),
	'style10' => array(
		'value' => 'style10',
		'label' => __( 'Mediterranean Beach', 'instaparent' ),
		'description' => 'Comming Soon!!'
	),
	'style11' => array(
		'value' => 'style11',
		'label' => __( 'European City', 'instaparent' ),
		'description' => 'Comming Soon!!'
	),
	'style12' => array(
		'value' => 'style12',
		'label' => __( 'Desert', 'instaparent' ),
		'description' => 'Comming Soon!!'
	),
);

$menustyles_options = array(
	'default' => array(
		'value' => 'default',
		'label' => __( 'Default', 'instaparent' ),
		'CSS' => ''
	),
	'menustyle01' => array(
		'value' => 'menustyle01',
		'label' => __( 'White', 'instaparent' ),
		'CSS' => ''
	),
	'menustyle02' => array(
		'value' => 'menustyle02',
		'label' => __( 'Gray', 'instaparent' ),
		'CSS' => ''
	),
	'customMenuStyle' => array(
		'value' => 'customMenuStyle',
		'label' => __( 'Custom', 'instaparent' )
	)
);

$FPstyles_options = array(
	'default' => array(
		'value' => 'default',
		'label' => __( 'Default', 'instaparent' )
	),
	'FPcustomStyle' => array(
		'value' => 'FPcustomStyle',
		'label' => __( 'Custom', 'instaparent' )
	)	
);

/* lets get the name of the theme folder to see which theme it is */
$currentThemeName = substr(strrchr(get_stylesheet_directory(), "/"), 1);

/* List of themes and configurations */
$themeSetting = array(
	'instatheme01' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'medium'
	),
	'instatheme02' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'large'
	),
	'instatheme04' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'small'		
	),
	'instatheme05' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'medium'
	),
	'instatheme07' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'small'
	),
	'instatheme08' => array(
		'logoSizeNo' => 'original',
		'logoDefault' => 'small'		
	)
);

$logoSize_options = array(
	'small' => array(
		'value' => 'small',
		'label' => __( 'Small', 'instaparent' )
	),
	'medium' => array(
		'value' => 'medium',
		'label' => __( 'Medium', 'instaparent' )
	),
	'large' => array(
		'value' => 'large',
		'label' => __( 'Large', 'instaparent' )
	),
	'original' => array(
		'value' => 'original',
		'label' => __( 'Original', 'instaparent' )
	),
	'custom' => array(
		'value' => 'custom',
		'label' => __( 'Custom', 'instaparent' )
	)
);

$logoSize_custom_options = 0;

$customCSS_options = array(
	'on' => array(
		'value' => '1',
		'label' => __( 'On', 'instaparent' )
	),
	'off' => array(
		'value' => '0',
		'label' => __( 'Off', 'instaparent' )
	)
);

$itsGenericTheme = strpos($currentThemeName,'instatheme') === False ? false : true;

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $presetStyle_options,$menustyles_options,$FPstyles_options,$logoSize_options,$logoSize_custom_options,$currentThemeName,$themeSetting,$customCSS_options,$itsGenericTheme;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>

<div class="wrap">
  <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'instaparent' ) . "</h2>"; ?>
  <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
  <div class="updated fade">
    <p><strong>
      <?php _e( 'Options saved', 'instaparent' ); ?>
      </strong></p>
  </div>
  <?php endif; ?>
  <form method="post" action="options.php">
    <?php settings_fields( 'instaparent_options' ); ?>
    <?php $options = get_option( 'instaparent_theme_options' );
		
	?>
    <!-- Start Tabs -->
    <div id="tabs">
      <ul>
		<?php if($itsGenericTheme){ ?>
        <li><a href="#tabs-1">Styling</a></li>
        <li><a href="#tabs-2">General</a></li>
		<?php } ?>
        <li><a href="#tabs-3">Custom CSS</a></li>
      </ul>
      <?php if($itsGenericTheme){ ?>
      <!-- Start Tab 1 -->
      <div id="tabs-1">
        <div class="themeOptionBox">
          <div class="themeOptionHeader">
            <h2>Select Your Style</h2>
          </div>
          <div class="themeOptionContent">
            <?php
				/**
				 * The list of presets we have
				 */
				?>
            <fieldset>
              <?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $presetStyle_options as $option ) {
								$radio_setting = $options['presetStyle'];

								if ( '' != $radio_setting ) {
									
								if ( $options['presetStyle'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
              <div class="presetWrapper">
                <div class="thumbnail">                
                <img src="<?php echo get_template_directory_uri() . '/insta-common/themeoptions/presets/' . $option['value'] . '/images/thumbnail-'.$currentThemeName.'.jpg'; ?>" alt="<?php echo $option['label']; ?>" title="<?php echo $option['label']; ?>" width="256" height="156"/>
                
                </div>
                <div class="preset-info">
                  <h3><?php echo $option['label']; ?></h3>
                </div>
                <label class="SetPreset <?php if ($checked != '') { echo "active"; } ?>">
                  <input type="radio" name="instaparent_theme_options[presetStyle]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
                  <?php
								if($checked == '')
								{
									echo 'Select Style';
								}else{
									echo 'Currently Active';
								}
								?>
                </label>
                <a target="_blank" href="<?php echo get_site_url().'?presetpreview='.$option['value']; ?>" class="button-primary" >
                <?php _e( 'Preview', 'instaparent' ); ?>
                </a> </div>
              <?php
							}
						?>
            </fieldset>
          </div>
          <div class="themeOptionFooter">
            <div class="save-btn">
              <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'instaparent' ); ?>" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Tab 1 --> 
      <!-- Start Tab 2 -->
      <div id="tabs-2">
        <div class="themeOptionBox">
          <div class="themeOptionHeader">
            <h2>General Settings</h2>
          </div>
          <div class="themeOptionContent">
            <table class="form-table">
              <?php
				/**
				 * The Menu Style option
				 */
				?>
              <tr class="menustyle" valign="top">
                <th scope="row"><?php _e( 'Menu Style', 'instaparent' ); ?></th>
                <td><?php
							if ( ! isset( $checked2 ) )
								$checked2 = '';
							foreach ( $menustyles_options as $menustyle ) {
								$menustyle_setting = $options['menustyles'];

								if ( '' != $menustyle_setting ) {
									
								if ( $options['menustyles'] == $menustyle['value'] ) {
										$checked2 = "checked=\"checked\"";
									} else {
										$checked2 = '';
									}
								}
								?>
                  <label>
                    <input id="<?php esc_attr_e( $menustyle['value'] ); ?>" type="radio" name="instaparent_theme_options[menustyles]" value="<?php esc_attr_e( $menustyle['value'] ); ?>" <?php echo $checked2; ?> />
                    <?php echo $menustyle['label']; ?> </label>
                  <br/>
                  <?php
							}
						?></td>
              </tr>
              <?php
				/**
				 * The Menu Style colorpicker
				 */
				?>
              <tr class="customMenuStyleBlock subBlock" >
              <td colspan="2">
              
              <table>
              <tr valign="top">
                <th scope="row"><?php _e( 'Menu Background Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_menuBackgroundColor" name="instaparent_theme_options[menuBackgroundColor]" value="<?php esc_attr_e( $options['menuBackgroundColor'] ); ?>" data-default-color="#000000" />                  
                  </td>
              </tr>
              <tr valign="top">
                <th scope="row"><?php _e( 'Menu Text Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_menuTextColor" name="instaparent_theme_options[menuTextColor]" value="<?php esc_attr_e( $options['menuTextColor'] ); ?>" data-default-color="#ffffff" /></td>
              </tr>
              </table>
              
              <?php
				/**
				 * The Menu Hover Style colorpicker
				 */
				?>
              <table>
              <tr valign="top">
                <th scope="row"><?php _e( 'Menu Hover Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_menuHoverColor" name="instaparent_theme_options[menuHoverColor]" value="<?php esc_attr_e( $options['menuHoverColor'] ); ?>" data-default-color="#000000" />                  
                  </td>
              </tr>
              <tr valign="top">
                <th scope="row"><?php _e( 'Menu Hover Text Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_menuHoverTextColor" name="instaparent_theme_options[menuHoverTextColor]" value="<?php esc_attr_e( $options['menuHoverTextColor'] ); ?>" data-default-color="#ffffff" /></td>
              </tr>
              </table>
              
              </td>
              </tr>
              
              <tr>
                <td colspan="2"><hr/></td>
              </tr>
              <?php
				/**
				 * The Featured Properties Style option
				 */
				?>
              <tr class="FPstyle" valign="top">
                <th scope="row"><?php _e( 'Featured Properties Style', 'instaparent' ); ?></th>
                <td><?php				
							if ( ! isset( $checked3 ) )
								$checked3 = '';
							foreach ( $FPstyles_options as $FPstyle ) {
								$FPstyle_setting = $options['FPstyles'];

								if ( '' != $FPstyle_setting ) {
									
								if ( $options['FPstyles'] == $FPstyle['value'] ) {
										$checked3 = "checked=\"checked\"";
									} else {
										$checked3 = '';
									}
								}
								?>
                              <label>
                                <input id="<?php esc_attr_e( $FPstyle['value'] ); ?>" type="radio" name="instaparent_theme_options[FPstyles]" value="<?php esc_attr_e( $FPstyle['value'] ); ?>" <?php echo $checked3; ?> />
                                <?php echo $FPstyle['label']; ?> </label>
                              <br/>
                              <?php
							}
						?></td>
              	<tr class="customFPStyleBlock subBlock" >
              	<td colspan="2">
                
                
                <?php
				/**
				 * The Featured Properties Style colorpicker
				 */
				?>
                <table>
              <tr valign="top">
                <th scope="row"><?php _e( 'Background Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_FPBackgroundColor" name="instaparent_theme_options[FPBackgroundColor]" value="<?php esc_attr_e( $options['FPBackgroundColor'] ); ?>" data-default-color="#000000" />                  
                  </td>
              </tr>
              <tr valign="top">
                <th scope="row"><?php _e( 'Text Color', 'instaparent' ); ?></th>
                <td><input type="text" id="instaparent_theme_options_FPTextColor" name="instaparent_theme_options[FPTextColor]" value="<?php esc_attr_e( $options['FPTextColor'] ); ?>" data-default-color="#ffffff" /></td>
              </tr>
              </table>
                
                
                </td>
                </tr>
                
              </tr>
              <tr>
                <td colspan="2"><hr/></td>
              </tr>
              <?php
				/**
				 * The Logo Size option
				 */
				?>
                <tr class="logoSize" valign="top">
                <th scope="row"><?php _e( 'Logo Size', 'instaparent' ); ?></th>
                <td><?php
				
				/*lets check the logosize setting for this theme, by default the instatheme01 setting is set, if theme not found on the themesettting array */
				if($themeSetting[$currentThemeName]['logoSizeNo'] == '')
				{
					$dontOutputThisOne = $themeSetting['instatheme01']['logoSizeNo'];
					$theDefaultLogoSize = $themeSetting['instatheme01']['logoDefault'];
				}else{
					$dontOutputThisOne = $themeSetting[$currentThemeName]['logoSizeNo'];
					$theDefaultLogoSize = $themeSetting[$currentThemeName]['logoDefault'];
				}
				
							if ( ! isset( $checked4 ) )
								$checked4 = '';
							foreach ( $logoSize_options as $logoSize ) {
								$logoSize_setting = $options['logoSize'];

								if ( '' != $logoSize_setting ) {
									
								if ( $options['logoSize'] == $logoSize['value']) {
										$checked4 = "checked=\"checked\"";
									} else {
										$checked4 = '';
									}
								}
							/* lets output only the ones that are not in the logosize setting, which is the one that shoulnt be outputted based on the theme */
							if($logoSize['value'] != $dontOutputThisOne ){
								?>
                              <label>
                                <input id="<?php esc_attr_e( $logoSize['value'] ); ?>" type="radio" name="instaparent_theme_options[logoSize]" value="<?php esc_attr_e( $logoSize['value'] ); ?>" <?php echo $checked4; ?> />
                                <?php
								if($logoSize['value'] == $theDefaultLogoSize)
								{
									echo $logoSize['label'] . ' (Default)'; 
								}else{
									echo $logoSize['label'];
								}
								?> </label>
                              <br/>
                              <?php
							}
							  
							}
						?>
                       </td>
                       <tr class="customLogoSizeBlock subBlock" >
              	       <td colspan="2">
						<?php
                        /**
                         * The Custom Logo
                         */
                        ?>
                        <table>
                      <tr valign="top">
                        <th scope="row"><?php _e( 'Height in pixels', 'instaparent' ); ?></th>
                        <td> <input id="instaparent_theme_options_custom" type="text" name="instaparent_theme_options[logoSize_custom]" value="<?php esc_attr_e( $options['logoSize_custom'] ); ?>" />                 
                          </td>
                      </tr>              
                      </table> 
                      </td>
                      </tr>
              </tr>
              <tr>
                <td colspan="2"><hr/></td>
              </tr>
              <?php
				/**
				 * The Favicon input option
				 */
				?>
              <tr valign="top">
                <th scope="row"><?php _e( 'Favicon', 'instaparent' ); ?></th>
                <td><input id="instaparent_theme_options_faviconurl" class="regular-text" type="text" name="instaparent_theme_options[faviconurl]" value="<?php esc_attr_e( $options['faviconurl'] ); ?>" />
                  <input type="button" id="instaparent_theme_options_faviconUrl_select" name="instaparent_theme_options_faviconUrl_select" value="<?php _e( 'Select Favicon', 'instaparent' ); ?>" for="instaparent_theme_options_faviconurl" class="button" />
                  <input type="button" id="instaparent_theme_options_faviconUrl_clear" name="instaparent_theme_options_faviconUrl_clear" value="<?php _e( 'Clear', 'instaparent' ); ?>" for="instaparent_theme_options_faviconurl" class="button" />
                  <br/>
                  <label class="description" for="instaparent_theme_options_faviconurl">
                    <?php _e( 'A favicon must be 16 x 16 pixels square.', 'instaparent' ); ?>
                  </label></td>
              </tr>
            </table>
          </div>
          <div class="themeOptionFooter">
            <div class="save-btn">
              <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'instaparent' ); ?>" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Tab 2 -->
      <?php } ?>
      <!-- Start Tab 3 -->
      <!-- If you are seeing this comment instead of the tab, you dont have permission to use this tab -->
      <div id="tabs-3">
      	<div class="themeOptionBox">
          <div class="themeOptionHeader">
            <h2>Custom CSS Settings</h2>
          </div>
          <div class="themeOptionContent">
            <table class="form-table">
              <?php
				/**
				 * The Custom CSS option
				 */
				?>
              <tr class="customCss" valign="top">
                <th scope="row"><?php _e( 'Custom CSS', 'instaparent' ); ?></th>                
                
                <td><div class="radiobtns"><?php
							if ( ! isset( $checked5 ) )
								$checked5 = '';
							foreach ( $customCSS_options as $customCSS_option ) {
								$customCSS_setting = $options['customCSS'];

								if ( '' != $customCSS_setting ) {
									
								if ( $options['customCSS'] == $customCSS_option['value'] ) {
										$checked5 = "checked=\"checked\"";
									} else {
										$checked5 = '';
									}
								}
								?>
                  <label>
                    <input id="<?php esc_attr_e( $customCSS_option['value'] ); ?>" type="radio" name="instaparent_theme_options[customCSS]" value="<?php esc_attr_e( $customCSS_option['value'] ); ?>" <?php echo $checked5; ?> />
                    <?php echo $customCSS_option['label']; ?> </label>&nbsp;&nbsp;&nbsp;
                  <?php
							}
						?></div>
                        <div class="legend">
                        <label class="description">Custom CSS changes have the potential to cause harm to the style of your website.  <strong><em>Any changes made are at your own risk</em></strong>.  <br/>If you need to revert your changes for any reason, simply turn off custom CSS.</label>
                        </div>
              </td>
              </tr>    
             
              <tr>
                <td colspan="2"><hr/></td>
              </tr>
              <?php
				/**
				 * The Custom inline CSS option
				 */
				?>
              <tr class="customInlineCSS" valign="top">
                <th scope="row"><?php _e( 'Enter your custom CSS styles.', 'instaparent' ); ?>			
                <h3>CSS Tips</h3>
                <div class="background1">
                
                <ul>
                <li><strong>Logo</strong> <span>body .bapi-logo img{}</span></li>
                <li><strong>Quick Search</strong> <span>.home .widget_bapi_hp_search{}</span></li>
                <li><strong>Featured Properties</strong> <span>.widget_bapi_featured_properties .fp-outer{}</span></li>
                <li><strong>Property Finders</strong> <span>.widget_bapi_property_finders .pf-outer{}</span></li>
                <li><strong>About us</strong> <span>.home .hp-content{}</span></li>
                </ul>
                </div>
                </th>
                <td>
                <textarea id="instaparent_theme_options[customInlineCSS]" class="inline-css large-text" cols="50" rows="30" name="instaparent_theme_options[customInlineCSS]"><?php if (!empty($options['customInlineCSS'])) echo esc_textarea($options['customInlineCSS']); ?></textarea>                
                </td>
              </tr> 
              
            </table>
          </div>
          <div class="themeOptionFooter">
            <div class="save-btn">
              <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'instaparent' ); ?>" />
            </div>
          </div>
        </div>
      </div>
      <!-- End Tab 3 -->
    </div>
    <!-- End Tabs -->
    
  </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
	/* initialize the tabs */	
  jQuery("#tabs").tabs();
  
 jQuery(".customInlineCSS h3").click(function(){
     jQuery(".background1").slideToggle();
});
  
  /* For the color picker */
  	jQuery('#instaparent_theme_options_menuBackgroundColor').wpColorPicker();
	jQuery('#instaparent_theme_options_menuHoverTextColor').wpColorPicker();
	jQuery('#instaparent_theme_options_menuHoverColor').wpColorPicker();
	jQuery('#instaparent_theme_options_menuTextColor').wpColorPicker();	
	jQuery('#instaparent_theme_options_FPBackgroundColor').wpColorPicker();
	jQuery('#instaparent_theme_options_FPTextColor').wpColorPicker();	
	
	/* show colorpickers if the user selects the custom option */
	customStyleSelected("#customMenuStyle",".customMenuStyleBlock");
	customStyleSelected("#FPcustomStyle",".customFPStyleBlock");	
	customStyleSelected("#custom",".customLogoSizeBlock");
	
	jQuery(".logoSize").click(function(){
   		customStyleSelected("#custom",".customLogoSizeBlock");
	});
	
	jQuery(".menustyle").click(function(){
   		customStyleSelected("#customMenuStyle",".customMenuStyleBlock");
	});
	jQuery(".FPstyle").click(function(){
   		customStyleSelected("#FPcustomStyle",".customFPStyleBlock");
	});
	
  /* open the built-in media manager for the favicon */
  jQuery('#instaparent_theme_options_faviconUrl_select').click(function() {
	  
		wp.media.editor.send.attachment = function(props, attachment) {
			
			jQuery('#instaparent_theme_options_faviconurl').val(attachment.url);
			
		}
	
		wp.media.editor.open(this);
	
		return false;       
	});
	
	/* Clear the Favicon input field */
	jQuery('#instaparent_theme_options_faviconUrl_clear').click(function() {
			jQuery('#instaparent_theme_options_faviconurl').val('');
		return false;       
	});
	
	/* Custom Logo Size */
	jQuery("input[name='instaparent_theme_options[logoSize]']").click(function(){
		if(jQuery("input[name='instaparent_theme_options[logoSize]']:checked").val() != 'custom'){	
		   jQuery('#instaparent_theme_options_custom').val('');
		}
});
});
function customStyleSelected(toCheck,toHide){
	// If checked
    if (jQuery(toCheck).is(":checked")) {
        //show the hidden div		
        jQuery(toHide).show("slide");
    } else {
        //otherwise, hide it
        jQuery(toHide).hide("slide");
    }
}
</script>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $presetStyle_options,$menustyles_options,$FPstyles_options,$logoSize_options,$logoSize_custom_options,$customCSS_options;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['presetStyle'] ) )
		$input['presetStyle'] = null;
	if ( ! array_key_exists( $input['presetStyle'], $presetStyle_options ) )
		$input['presetStyle'] = null;
		
	// Our menu style must actually be in our array of menu styles
	if ( ! isset( $input['menustyles'] ) )
		$input['menustyles'] = null;
	if ( ! array_key_exists( $input['menustyles'], $menustyles_options ) )
		$input['menustyles'] = null;
		
	// Our FP style must actually be in our array of FP styles
	if ( ! isset( $input['FPstyles'] ) )
		$input['FPstyles'] = null;
	if ( ! array_key_exists( $input['FPstyles'], $FPstyles_options ) )
		$input['FPstyles'] = null;
	
	// Our Logo Size must actually be in our array of Logo Sizes
	if ( ! isset( $input['logoSize'] ) )
		$input['logoSize'] = null;
	if ( ! array_key_exists( $input['logoSize'], $logoSize_options ) )
		$input['logoSize'] = null;
	
	// Custom Logo Size
	if (! isset( $input['logoSize_custom']))
			$input['logoSize_custom'] = null;
		else{
			if(!is_numeric($input['logoSize_custom']))
			   	$input['logoSize_custom'] = 0;
		}
	
	// we check if the var is set
	if ( ! isset( $input['customCSS']))
		$input['customCSS'] = null;
		
	$input['customInlineCSS'] = wp_kses_stripslashes($input['customInlineCSS']);
	
	// Say our text option must be safe text with no HTML tags
	//$input['faviconUrl'] = wp_filter_nohtml_kses( $input['faviconUrl'] );
	return $input;
}
