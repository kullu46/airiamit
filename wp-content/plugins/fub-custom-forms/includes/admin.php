<?php 

function fub_activate_plugin() {
    /* $fub_options = array(
            'api_key' => ''
        );
    update_option('fub-options', $fub_options); */
}

function fub_uninstall_plugin(){
    delete_option('fub-options');
}

add_action('wp_ajax_fub_form_posted', 'fub_form_posted');
add_action('wp_ajax_nopriv_fub_form_posted', 'fub_form_posted');
function fub_form_posted(){
    $errors = array();
    FollowupBoss::generateLead($_POST['formData']);
    exit();
}

add_action('wp_enqueue_scripts', 'fub_load_resources');
function fub_load_resources(){
    wp_enqueue_style('fub-style', plugins_url(FUB_PLUGIN_NAME.'/assets/css/style.css'));
    wp_enqueue_script('fub-script', plugins_url(FUB_PLUGIN_NAME.'/assets/js/main.js'));
}

add_action('admin_menu', 'fub_add_plugin_page');
function fub_add_plugin_page(){
    add_menu_page('Followupboss Forms', 'Followupboss Forms', 'manage_options', 'fub-config', 'fub_options_page_output', plugins_url(FUB_PLUGIN_NAME.'/assets/img/icon.png'), 75);
    add_submenu_page( 'fub-config', 'Followupboss Forms - Settings', 'Settings', 'manage_options', 'fub-config', 'fub_options_page_output');
    add_submenu_page( 'fub-config', 'Followupboss Forms - Help', 'Help', 'manage_options', 'fub-help', 'fub_help_page_output');
}

function fub_options_page_output(){
    if(isset($_POST['fub_general_options'])){
        $fub_options = array(
                'api_key' => $_POST['api_key'],
            );
        update_option('fub-options', $fub_options);
        $redirectUrl = admin_url('admin.php?page=fub-config&fub_notice=updated');
        echo '<script>window.location.href="'.$redirectUrl.'";</script>';
        exit();
    }
    $fub_options = get_option('fub-options');
    if(isset($_GET['fub_notice'])){
        switch ($_GET['fub_notice']) {
            case 'added':
                echo '<div class="updated"><p>Added successfully!</p></div>';
                break;
            case 'updated':
                echo '<div class="updated"><p>Updated successfully!</p></div>';
                break;
            case 'removed':
                echo '<div class="error"><p>Removed successfully!</p></div>';
                break;
            case 'error':
                echo '<div class="error"><p>Error!</p></div>';
                break;
            default:
                break;
        }
    }
    ?>
    <div class="wrap">
        <h2><?= get_admin_page_title() ?></h2>
        <div class="clear">&nbsp;</div>
        <form method="post">
            <input type="hidden" name="fub_general_options" value="1"/>
            <div id="acf-admin-tool-export" class="postbox ">
                <h2 class="hndle" style="padding: 8px 12px;"><span>Settings</span></h2>
                <div class="inside">
                    <p>
                        <strong>Followupboss API Key:</strong> 
                        <input type="text" name="api_key" value="<?php echo isset($fub_options['api_key']) ? $fub_options['api_key'] : ''; ?>" style="min-width: 400px;"/>
                    </p>
                    <p>
                        <?php submit_button(); ?>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <?php
}

function fub_help_page_output(){
    ?>
    <h2><?= get_admin_page_title() ?></h2>
    <div class="clear">&nbsp;</div>
    <div id="acf-admin-tool-export" class="postbox ">
        <h2 class="hndle" style="padding: 8px 12px;"><span>Instructions</span></h2>
        <div class="inside">
            <p>Please use shortcode <code>[fub-custom-form]</code> to display the form on any page.</p>
            <p>Following shortcodes can be used: <br/>
                <ul style="column-width: auto;">
                    <li><code><strong>lead_type</strong> (lead type in followupboss. [supported types: "Registration", "Inquiry", "Seller Inquiry", "Property Inquiry", "General Inquiry", "Viewed Property", "Saved Property", "Visited Website", "Incoming Call", "Unsubscribed", "Property Search", "Saved Property Search", "Visited Open House" or "Viewed Page"])</code></li>
                    <li><code><strong>tags</strong> (will be sent to followupboss as tags [use comma to separate])</code></li>
                    <li><code><strong>title</strong> (form title this will be used as lead type in followupboss if above lead_type parameter is not provided)</code></li>
                    <li><code><strong>subtitle</strong> (form subtitle [optional])</code></li>
                    <li><code><strong>show_title</strong> (to display the form title on the frontend [default `false`])</code></li>
                    <li><code><strong>show_subtitle</strong> (to display the form subtitle on the frontend [default `false`])</code></li>
                    <li><code><strong>template</strong> (`1/2` Template 1 will use message field as compared to template 1 [default `1`])</code></li>
                    <li><code><strong>submit_btn_text</strong> (button text of the submit button [default is `submit`])</code></li>
                </ul>
            </p>
            <p style="max-width: 100%;">
            <br/>
                Example full shortcode: 
<pre>
<code>[fub-custom-form 
    lead_type="General Inquiry" 
    tags="General Inquiry,Additional Tag 1,Additional Tag 2" 
    title="General Enquiry" 
    subtitle="Please fill the form to get your questions answered" 
    show_title="true" 
    show_subtitle="false" 
    template="2" 
    submit_btn_text="Enquire Now"
]</code>
</pre>
            </p>
        </div>
    </div>
    <?php 
}