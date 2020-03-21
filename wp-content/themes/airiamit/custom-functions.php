<?php 


// register new_homes post type
// Register Custom Post Type
function init_custom_post_types() {

	$labels = array(
		'name'                  => _x( 'VIP Projects', 'Post Type General Name', 'airiamit' ),
		'singular_name'         => _x( 'VIP Project', 'Post Type Singular Name', 'airiamit' ),
		'menu_name'             => __( 'New Homes', 'airiamit' ),
		'name_admin_bar'        => __( 'New Homes', 'airiamit' ),
		'archives'              => __( 'New Homes', 'airiamit' ),
		'attributes'            => __( 'Item Attributes', 'airiamit' ),
		'parent_item_colon'     => __( 'Parent Item:', 'airiamit' ),
		'all_items'             => __( 'All Items', 'airiamit' ),
		'add_new_item'          => __( 'Add New Item', 'airiamit' ),
		'add_new'               => __( 'Add New', 'airiamit' ),
		'new_item'              => __( 'New Item', 'airiamit' ),
		'edit_item'             => __( 'Edit Item', 'airiamit' ),
		'update_item'           => __( 'Update Item', 'airiamit' ),
		'view_item'             => __( 'View Item', 'airiamit' ),
		'view_items'            => __( 'View Items', 'airiamit' ),
		'search_items'          => __( 'Search Item', 'airiamit' ),
		'not_found'             => __( 'Not found', 'airiamit' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'airiamit' ),
		'featured_image'        => __( 'Featured Image', 'airiamit' ),
		'set_featured_image'    => __( 'Set featured image', 'airiamit' ),
		'remove_featured_image' => __( 'Remove featured image', 'airiamit' ),
		'use_featured_image'    => __( 'Use as featured image', 'airiamit' ),
		'insert_into_item'      => __( 'Insert into item', 'airiamit' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'airiamit' ),
		'items_list'            => __( 'Items list', 'airiamit' ),
		'items_list_navigation' => __( 'Items list navigation', 'airiamit' ),
		'filter_items_list'     => __( 'Filter items list', 'airiamit' ),
	);
	$args = array(
		'label'                 => __( 'VIP Project', 'airiamit' ),
		'description'           => __( 'VIP Projects / Listings', 'airiamit' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields','post-attributes'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite' => array('slug' => 'new-homes'),
		'capability_type'       => 'page',
	);
	register_post_type( 'new_homes', $args );

}
add_action( 'init', 'init_custom_post_types', 0 );



function vip_projects_output( $atts, $content ) {
    $atts = shortcode_atts(array(
        'posts' => -1,
        'show_filters' => "false",
        'layout' => 'grid'
    ), $atts);
	$args = array(
			'post_type' => 'new_homes',
			'posts_per_page' => $atts['posts'],
			'offset' => 0,
			'category' => 0
		);

	$reqProject = $_REQUEST['project'];
	$req_location = stripcslashes($reqProject['location']);
	$req_type = stripcslashes($reqProject['type']);
	$req_bedrooms = stripcslashes($reqProject['bedrooms']);
	$req_bathrooms = stripcslashes($reqProject['bathrooms']);
	$req_price_range = stripcslashes($reqProject['price_range']);
	
	$hasFilters = false;
	$metaQuery = array('relation' => 'AND');
	if(!empty($req_location) || !empty($req_type) || !empty($req_bedrooms) || !empty($req_bathrooms) || !empty($req_price_range)){
		$hasFilters = true;
	}

	if($req_location != ''){
		$metaQuery[] = array(
				'key'	 	=> 'nh_location',
				'value'	  	=> array($req_location),
				'compare' 	=> 'IN'
			);
	}
	if($req_type != ''){
		$metaQuery[] = array(
				'key'	 	=> 'nh_type',
				'value'	  	=> array($req_type),
				'compare' 	=> 'IN'
			);
	}
	if($req_bedrooms != ''){
		$metaQuery[] = array(
				'key'	 	=> 'nh_bedrooms',
				'value'	  	=> $req_bedrooms,
				'compare' 	=> 'LIKE'
			);
	}
	if($req_bathrooms != ''){
		$metaQuery[] = array(
				'key'	 	=> 'nh_bathrooms',
				'value'	  	=> $req_bathrooms,
				'compare' 	=> 'LIKE'
			);
	}
	if($req_price_range != ''){
		$metaQuery[] = array(
				'key'	 	=> 'nh_price_range',
				'value'	  	=> array($req_price_range),
				'compare' 	=> 'IN'
			);
	}
	if($hasFilters){
		$args['meta_query']	= $metaQuery;
	}
	$projects = get_posts($args);
	

	$output = "";
	$output .= '<div class="vip-projects '.$atts['layout'].' vc_col-sm-12" data-filter-location="">';
	if(count($projects) > 0){
		$output .= '<div class="ajax-loader">
				<img src="'.get_template_directory_uri().'/assets/images/ajax-loader.gif" title="Loading..." alt="Loading..."/>
			</div>';
		$output .= '<div class="vip-projects-list">';
		/*if($atts['show_filters'] == "true"){
			$fieldCities = get_field_object('nh_location', $projects[0]->ID);
			$fieldCities = $fieldCities['choices'];
			
			$fieldCitiesHtml = '<option value="">--select--</option>';
			if(count($fieldCities) > 0) {
				foreach($fieldCities as $k => $v){
					$fieldCitiesHtml .= '<option value="'.$k.'">'.$v.'</option>';
				}
			}
			$output .= '<div class="project-filters">
					<div class="item-filter">
						<select name="project[city]">'.$fieldCitiesHtml.'</select>
					</div>
				</div>';
		}*/
		$output .= '<div class="vc_row">';
		$count=0; foreach($projects as $project){ $count++;
			$author = get_field('nh_author', $project->ID);
			$output .= '<div class="project vc_col-md-6 vc_col-sm-12 vc_col-xs-12">';
			$output .= '<div class="content">
						<div class="image"><div class="image-inner">'.get_the_post_thumbnail($project->ID, array(600, 380)).'</div></div>
						<div class="title"><a href="'.get_permalink($project->ID).'" class="no-style">'.$project->post_title.'</a></div>
						<div class="subtitle"><a href="'.get_permalink($project->ID).'" class="no-style">'.get_field('nh_subtitle', $project->ID).'</a></div>
						<div class="author"><span class="by">By</span>&nbsp;'.$author['nickname'].'</div>
						<div class="description">'.(strlen(strip_tags($project->post_content)) > 130 ? substr(strip_tags($project->post_content), 0, 147).'...' : strip_tags($project->post_content)).'&nbsp;<a href="'.get_permalink($project->ID).'" class="read-more">Read more</a></div>
					</div>';
			$output .= '</div>';
			if($count%2==0){
				$output .= '</div><div class="vc_row">';
			}
		}
		$output .= '</div>';
		$output .= '</div>';
	} else {
		$output .= '<div class="no-results">No results found!</div>';
	}
	$output .= '</div>';
	$output .= '<script type="text/javascript">var ajaxurl = "'.admin_url("admin-ajax.php").'";</script>';
    return do_shortcode($output);
}
add_shortcode( 'vip_projects', 'vip_projects_output');

function vip_projects_filters_output(){
	$args = array(
			'post_type' => 'new_homes',
			'posts_per_page' => 1,
			'offset' => 0,
			'category' => 0
		);
	$projects = get_posts($args);
	$output = '';
	if(count($projects) > 0){
		$reqProject = $_REQUEST['project'];
		$req_location = stripcslashes($reqProject['location']);
		$req_type = stripcslashes($reqProject['type']);
		$req_bedrooms = stripcslashes($reqProject['bedrooms']);
		$req_bathrooms = stripcslashes($reqProject['bathrooms']);
		$req_price_range = stripcslashes($reqProject['price_range']);

		$hasFilters = false;
		if(!empty($req_location) || !empty($req_type) || !empty($req_bedrooms) || !empty($req_bathrooms) || !empty($req_price_range)){
			$hasFilters = true;
			$reqUriClean = explode('?', $_SERVER['REQUEST_URI']);
			$reqUriClean = $reqUriClean[0];
			$baseUrlClean = ($_SERVER['REQUEST_SCHEME'] ? $_SERVER['REQUEST_SCHEME'] : 'http').'://'.$_SERVER['HTTP_HOST'].$reqUriClean;
		}

		$output .= '<div class="project-filters-external">';
		$fieldBedrooms = get_field_object('nh_bedrooms', $projects[0]->ID);
		$fieldBedrooms = $fieldBedrooms['choices'];
		$fieldBathrooms = get_field_object('nh_bathrooms', $projects[0]->ID);
		$fieldBathrooms = $fieldBathrooms['choices'];
		$fieldTypes = get_field_object('nh_type', $projects[0]->ID);
		$fieldTypes = $fieldTypes['choices'];
		$fieldPrices = get_field_object('nh_price_range', $projects[0]->ID);
		$fieldPrices = $fieldPrices['choices'];

		$fieldBedroomsHtml = '<option value="">--</option>';
		if(count($fieldBedrooms) > 0) {
			foreach($fieldBedrooms as $k => $v){
				$fieldBedroomsHtml .= '<option value="'.$k.'"'.($req_bedrooms == $k ? ' selected' : '').'>'.$v.'</option>';
			}
		}
		$fieldBathroomsHtml = '<option value="">--</option>';
		if(count($fieldBathrooms) > 0) {
			foreach($fieldBathrooms as $k => $v){
				$fieldBathroomsHtml .= '<option value="'.$k.'"'.($req_bathrooms == $k ? ' selected' : '').'>'.$v.'</option>';
			}
		}
		$fieldTypesHtml = '<option value="">--</option>';
		if(count($fieldTypes) > 0) {
			foreach($fieldTypes as $k => $v){
				$fieldTypesHtml .= '<option value="'.$k.'"'.($req_type == $k ? ' selected' : '').'>'.$v.'</option>';
			}
		}
		$fieldPricesHtml = '<option value="">--</option>';
		if(count($fieldPrices) > 0) {
			foreach($fieldPrices as $k => $v){
				$fieldPricesHtml .= '<option value="'.$k.'"'.($req_price_range == $k ? ' selected' : '').'>'.$v.'</option>';
			}
		}
		$output .= '<form class="project-filters" method="get">
				<div class="item-filter">
					<label>Search by Address</label>
					<input type="text" placeholder="City or Postal Code" name="project[location]" value="'.$req_location.'"/>
				</div>
				<div class="item-filter">
					<label>Type</label>
					<select name="project[type]">'.$fieldTypesHtml.'</select>
				</div>
				<div class="item-filter">
					<label>Bed</label>
					<select name="project[bedrooms]">'.$fieldBedroomsHtml.'</select>
				</div>
				<div class="item-filter">
					<label>Bath</label>
					<select name="project[bathrooms]">'.$fieldBathroomsHtml.'</select>
				</div>
				<div class="item-filter">
					<label>Price Range</label>
					<select name="project[price_range]">'.$fieldPricesHtml.'</select>
				</div>
				<div class="item-filter">
					<input type="submit" class="btn-search btn-search-listing" name="project[filter]" value="Serach Listing"/>
				</div>
			</form>';
			if($hasFilters){
				$output .= '<div class="clear-filters">
					<a href="'.$baseUrlClean.'" alt="Clear filters" title="Clear Filters">Clear Filters</a>
				</div>';
			}
	}

	$output .= '</div>';
    return do_shortcode($output);
}
add_shortcode( 'vip_projects_filters', 'vip_projects_filters_output');


function nh_inline_js() {
    wp_enqueue_script( 'custom',  get_template_directory_uri().'/assets/js/custom.js', array ( 'jquery' ), null, true);
}
add_action( 'wp_enqueue_scripts', 'nh_inline_js', PHP_INT_MAX);

function vip_projects_ajax_output(){
	$show_filters = false;
	$totalResults = 0;
	$args = array(
			'post_type' => 'new_homes',
			'posts_per_page' => $_POST['total'],
			'offset' => ($_POST['page'] - 1) * $_POST['total']
		);
	
	if($_POST['location'] != ''){
		$args['meta_query']	= array(
				'relation'		=> 'AND',
				array(
					'key'	 	=> 'nh_location',
					'value'	  	=> array($_POST['location']),
					'compare' 	=> 'IN',
				)
			);
	}

	$projects = get_posts($args);
		
	$output = "";
	if(count($projects) > 0){
		$totalResults = count($projects);
		if($show_filters){
			$fieldCities = get_field_object('nh_location', $projects[0]->ID);
			$fieldCities = $fieldCities['choices'];
			
			$fieldCitiesHtml = '<option value="">--select--</option>';
			if(count($fieldCities) > 0) {
				foreach($fieldCities as $k => $v){
					$fieldCitiesHtml .= '<option value="'.$k.'">'.$v.'</option>';
				}
			}
			$output .= '<div class="project-filters">
					<div class="item-filter">
						<select name="project[city]">'.$fieldCitiesHtml.'</select>
					</div>
				</div>';
		}
		$output .= '<div class="vc_row">';
		$count=0; foreach($projects as $project){ $count++;
			$author = get_field('nh_author', $project->ID);
			$output .= '<div class="project vc_col-md-6 vc_col-sm-12 vc_col-xs-12">';
			$output .= '<div class="content">
						<div class="image"><div class="image-inner">'.get_the_post_thumbnail($project->ID, array(600, 380)).'</div></div>
						<div class="title"><a href="'.get_permalink($project->ID).'" class="no-style">'.$project->post_title.'</a></div>
						<div class="subtitle"><a href="'.get_permalink($project->ID).'" class="no-style">'.get_field('nh_subtitle', $project->ID).'</a></div>
						<div class="author"><span class="by">By</span>&nbsp;'.$author['nickname'].'</div>
						<div class="description">'.(strlen(strip_tags($project->post_content)) > 130 ? substr(strip_tags($project->post_content), 0, 147).'...' : strip_tags($project->post_content)).'&nbsp;<a href="'.get_permalink($project->ID).'" class="read-more">Read more</a></div>
					</div>';
			$output .= '</div>';
			if($count%2==0){
				$output .= '</div><div class="vc_row">';
			}
		}
		$output .= '</div>';
	} else {
		$output .= '<div class="no-results">No results found!</div>';
	}
	echo json_encode(array('html' => $output, 'total' => $totalResults));
	exit();
}
add_action("wp_ajax_nh_loadmore", "vip_projects_ajax_output");
add_action("wp_ajax_nopriv_nh_loadmore", "vip_projects_ajax_output");