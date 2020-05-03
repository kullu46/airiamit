<?php

function fub_form( $atts ) {
	global $wp, $wpdb;
	$args = shortcode_atts( 
		array(
			'title' => 'General Enquiry',
			'subtitle' => '',
			'tags' => '',
			'template' => '1',
			'show_title' => 'false',
			'show_subtitle' => 'false',
			'submit_btn_text' => 'Submit',
			'lead_type' => ''
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
		<div class="fub-ajax-loader">
			<img src="<?php echo plugins_url(FUB_PLUGIN_NAME.'/assets/img/ajax-loader.gif'); ?>"/>
		</div>
		<?php if($args['show_title'] == 'true'){ ?>
			<div class="row form-title"><div class="col-sm-12"><?php echo $args['title']; ?></div></div>
		<?php } ?>
		<?php if($args['show_subtitle'] == 'true'){ ?>
			<div class="row form-subtitle"><div class="col-sm-12"><?php echo $args['subtitle']; ?></div></div>
		<?php } ?>
    <div class="row">
        <div class="col-sm-4">
            <label>
							<input type="text" name="fub_name" value="" size="40" class="" placeholder="Full Name" required>
						</label>
        </div>
        <div class="col-sm-4">
            <label>
							<input type="email" name="fub_email" value="" size="40" class="" placeholder="Email Address" required>
						</label>
        </div>
        <div class="col-sm-4">
            <label>
							<input type="text" name="fub_phone" value="" size="40" class=""placeholder="Phone number (e.g: +1 909-545-8200)" required>
						</label>
        </div>
    </div>
		<?php if($args['template'] == 1){ ?>
			<div class="row">
				<div class="col-sm-8">
					<label>
						<textarea name="fub_message" cols="40" rows="10" placeholder="Type here message"></textarea>
					</label>
				</div>
			</div>
		<?php } ?>
    <div class="row">
        <div class="col-sm-12">
            <input type="submit" value="<?php echo $args['submit_btn_text']; ?>" class="btn-submit">
        </div>
		</div>
		<div class="fub-response"></div>
	</form>
	<?php 
   $output = ob_get_clean();
   return $output;
}
add_shortcode('fub-custom-form', 'fub_form');