<?php

function fub_form( $atts ) {
	global $wp, $wpdb;
	$args = shortcode_atts( 
		array(
			'title' => 'General Enquiry',
			'subtitle' => '',
			'tags' => '',
			'template' => '1', // 1,2,contact,contact-info,virtual-appointment,appointment
			'show_title' => 'false',
			'show_subtitle' => 'false',
			'submit_btn_text' => 'Submit',
			'lead_type' => '' //"Registration", "Inquiry", "Seller Inquiry", "Property Inquiry", "General Inquiry", "Viewed Property", "Saved Property", "Visited Website", "Incoming Call", "Unsubscribed", "Property Search", "Saved Property Search", "Visited Open House" or "Viewed Page"
		), 
		$atts
	);
	ob_start();
  ?>
	<form method="post" class="fub-custom-form form-container template-<?php echo $args['template']; ?>" onsubmit="return validateFubForm(this, event);">
		<input type="hidden" name="fub_form_posted" value="1"/>
		<input type="hidden" name="admin_ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>"/>
		<input type="hidden" name="fub_lead_type" value="<?php echo !empty($args['lead_type']) ? $args['lead_type'] : $args['title']; ?>"/>
		<input type="hidden" name="fub_tags" value="<?php echo $args['tags']; ?>"/>
		<input type="hidden" name="fub_template" value="<?php echo $args['template']; ?>"/>
		<div class="fub-ajax-loader">
			<img src="<?php echo plugins_url(FUB_PLUGIN_NAME.'/assets/img/ajax-loader.gif'); ?>"/>
		</div>
		<?php if($args['show_title'] == 'true'){ ?>
			<div class="row form-title"><div class="col-sm-12"><?php echo $args['title']; ?></div></div>
		<?php } ?>
		<?php if($args['show_subtitle'] == 'true'){ ?>
			<div class="row form-subtitle"><div class="col-sm-12"><?php echo $args['subtitle']; ?></div></div>
		<?php } ?>
		<?php 
		switch($args['template']){
			case 'generic':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/generic.php');
				break;
			case 'generic-full':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/generic-full.php');
				break;
			case 'investor':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/investor.php');
				break;
			case 'seller':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/seller.php');
				break;
			case 'appointment':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/appointment.php');
				break;
			case 'virtual-appointment':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/virtual-appointment.php');
				break;
			case '2':
			case 'contact':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/contact.php');
				break;
			case '1':
			case 'contact-info':
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/contact-info.php');
				break;
			default:
				include(ABSPATH.'wp-content/plugins/'.FUB_PLUGIN_NAME.'/templates/contact-info.php');
				break;
		} 
		?>
    <div class="row">
        <div class="col-sm-12">
            <input type="submit" value="<?php echo $args['submit_btn_text']; ?>" class="btn-submit">
        </div>
		</div>
		<div class="fub-response"></div>
	</form>
	<?php 
	$output = ob_get_contents();
	ob_end_clean();
  return $output;
}
add_shortcode('fub-custom-form', 'fub_form');