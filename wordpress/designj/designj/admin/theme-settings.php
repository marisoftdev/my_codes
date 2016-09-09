<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "designd";


//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_title; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");


//Sample Array for demo purposes
$sample_array = array("1","2","3","4","5");
$relatedposts = array("Yes", "No");


//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 


//Folder Paths for "type" => "images"
$sampleurl =  get_template_directory_uri() . '/admin/images/sample-layouts/';










/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall



/* Option Page 1 - Company Info */
$options[] = array( "name" => __('Company Info','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('Company Name','framework_localize'),
			"desc" => "Company Name",
			"id" => $shortname."_Company_Name",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Address 1','framework_localize'),
			"desc" => "Address 1 of company",
			"id" => $shortname."_address1_loc1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Address 2','framework_localize'),
			"desc" => "Address 2 of company",
			"id" => $shortname."_address2_loc1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('City','framework_localize'),
			"desc" => "City company is located in.",
			"id" => $shortname."_city_loc1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('State','framework_localize'),
			"desc" => "State company is located in.",
			"id" => $shortname."_state_loc1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Zip','framework_localize'),
			"desc" => "Zip code company is located in.",
			"id" => $shortname."_zip_loc1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Phone Number','framework_localize'),
			"desc" => "Main Phone Number",
			"id" => $shortname."_phone_number1",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Second Phone Number','framework_localize'),
			"desc" => "Second Phone Number",
			"id" => $shortname."_phone_number2",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('Fax','framework_localize'),
			"desc" => "Fax",
			"id" => $shortname."_fax",
			"std" => "",
			"type" => "text");
$options[] = array( "name" => __('E-Mail Address','framework_localize'),
			"desc" => "E-Mail Address",
			"id" => $shortname."_email_address",
			"std" => "",
			"type" => "text");
			
								
					
/* Option Page 2 - Theme Colors */
$options[] = array( "name" => __('Theme Colors','framework_localize'),
			"type" => "heading");					
					
$options[] = array( "name" => __('Menu Bar Color','framework_localize'),
			"desc" => __('Menu Bar Color Picker.','framework_localize'),
			"id" => $shortname."_menubar_color_picker",
			"std" => "#315D7C",
			"type" => "color");	
			
$options[] = array( "name" => __('Link Color','framework_localize'),
			"desc" => __('Website Link Color.','framework_localize'),
			"id" => $shortname."_link_color_color_picker",
			"std" => "#009CEE",
			"type" => "color");

$options[] = array( "name" => __('Call to Action & Mouse Over Area Color','framework_localize'),
			"desc" => __('Call to Action & Mouse Over Area Color Picker.','framework_localize'),
			"id" => $shortname."_cta_color_picker",
			"std" => "#ABC2D3",
			"type" => "color");	

$options[] = array( "name" => __('Lead Capture Background Color','framework_localize'),
			"desc" => __('Lead Capture Background Color Picker.','framework_localize'),
			"id" => $shortname."_lead_bg_color_picker",
			"std" => "#ABC2D3",
			"type" => "color");

$options[] = array( "name" => __('Button Background','framework_localize'),
			"desc" => __('Button Background.','framework_localize'),
			"id" => $shortname."_btn_bg_color_picker",
			"std" => "#ABC2D3",
			"type" => "color");	

$options[] = array( "name" => __('Button and Field Borders','framework_localize'),
			"desc" => __('Button and Field Borders.','framework_localize'),
			"id" => $shortname."_btn_border_color_picker",
			"std" => "#ABC2D3",
			"type" => "color");				

/* Option Page 3 - Social Media */
$options[] = array( "name" => __('Social Media Links','framework_localize'),
			"type" => "heading");					
					
$options[] = array( "name" => __('Facebook','framework_localize'),
			"desc" => "Enter Your Facebook URL.",
			"id" => $shortname."_facebook_url",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Twitter','framework_localize'),
			"desc" => "Enter Your Twitter URL.",
			"id" => $shortname."_twitter_url",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('LinkedIn','framework_localize'),
			"desc" => "Enter Your LinkedIn URL.",
			"id" => $shortname."_linkedin_url",
			"std" => "",
			"type" => "text");			

$options[] = array( "name" => __('Google Plus','framework_localize'),
			"desc" => "Enter Your Google Plus URL.",
			"id" => $shortname."_gplus_url",
			"std" => "",
			"type" => "text");	
			
$options[] = array( "name" => __('YouTube','framework_localize'),
			"desc" => "Enter Your YouTube URL.",
			"id" => $shortname."_youtube_url",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('RSS','framework_localize'),
			"desc" => "Enter Your RSS URL.",
			"id" => $shortname."_rss_url",
			"std" => "",
			"type" => "text");				
					
					
/* Option Page 4 - Web Elements */
$options[] = array( "name" => __('Web Elements','framework_localize'),
			"type" => "heading");	
			
$options[] = array( "name" => __('Website Logo','framework_localize'),
			"desc" => __('Upload a custom logo for your Website.','framework_localize'),
			"id" => $shortname."_sitelogo",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Favicon','framework_localize'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/">www.favicon.cc</a>)</em>','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Website Background','framework_localize'),
			"desc" => __('Upload a website background.','framework_localize'),
			"id" => $shortname."_website_background",
			"std" => "",
			"type" => "upload");


$options[] = array( "name" => __('Top Background','framework_localize'),
			"desc" => __('Upload a photo for the front page lead capture area background.','framework_localize'),
			"id" => $shortname."_lead_background",
			"std" => "",
			"type" => "upload");
			
$options[] = array( "name" => __('Show Related Posts','framework_localize'),
			"desc" => __('Show related posts on single news item.','framework_localize'),
			"id" => $shortname."_relatedposts",
			"std" => "Yes",
			"type" => "select",
			"options" => $relatedposts);
			
$options[] = array( "name" => __('Show Service Boxes','framework_localize'),
			"desc" => __('Check the box to show service boxes.','framework_localize'),
			"id" => $shortname."_show_boxes_checkbox",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('Rounded Boxes','framework_localize'),
			"desc" => __('Check the box for rounded corners on services boxes.','framework_localize'),
			"id" => $shortname."_rounded_corners_checkbox",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('Box 1','framework_localize'),
			"desc" => __('Select a page to link to box 1.','framework_localize'),
			"id" => $shortname."_box1_link",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
$options[] = array( "name" => __('Box 1 Background Color','framework_localize'),
			"desc" => __('Box 1 Background Color Picker.','framework_localize'),
			"id" => $shortname."_box1_bg_color_picker",
			"std" => "#e2a635",
			"type" => "color");

$options[] = array( "name" => __('Box 2','framework_localize'),
			"desc" => __('Select a page to link to box 2.','framework_localize'),
			"id" => $shortname."_box2_link",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
$options[] = array( "name" => __('Box 2 Background Color','framework_localize'),
			"desc" => __('Box 2 Background Color Picker.','framework_localize'),
			"id" => $shortname."_box2_bg_color_picker",
			"std" => "#d95701",
			"type" => "color");

$options[] = array( "name" => __('Box 3','framework_localize'),
			"desc" => __('Select a page to link to box 3.','framework_localize'),
			"id" => $shortname."_box3_link",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
$options[] = array( "name" => __('Box 3 Background Color','framework_localize'),
			"desc" => __('Box 3 Background Color Picker.','framework_localize'),
			"id" => $shortname."_box3_bg_color_picker",
			"std" => "#aa0000",
			"type" => "color");

$options[] = array( "name" => __('Box 4','framework_localize'),
			"desc" => __('Select a page to link to box 4.','framework_localize'),
			"id" => $shortname."_box4_link",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
$options[] = array( "name" => __('Box 4 Background Color','framework_localize'),
			"desc" => __('Box 4 Background Color Picker.','framework_localize'),
			"id" => $shortname."_box4_bg_color_picker",
			"std" => "#7da601",
			"type" => "color");

$options[] = array( "name" => __('Box 5','framework_localize'),
			"desc" => __('Select a page to link to box 5.','framework_localize'),
			"id" => $shortname."_box5_link",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
$options[] = array( "name" => __('Box 5 Background Color','framework_localize'),
			"desc" => __('Box 5 Background Color Picker.','framework_localize'),
			"id" => $shortname."_box5_bg_color_picker",
			"std" => "#006faa",
			"type" => "color");
			
$options[] = array( "name" => __('Blurb Title','framework_localize'),
			"desc" => "Enter the title for the front page blurb.",
			"id" => $shortname."_blurb_title",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Blurb Text','framework_localize'),
			"desc" => __('Enter the text for the front page blurb.','framework_localize'),
			"id" => $shortname."_blurb_text",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('ASCII Newsletter action URL','framework_localize'),
			"desc" => "Enter your ASCII Newsletter form action URL.",
			"id" => $shortname."_newsletter_id",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Copyright Company Name','framework_localize'),
			"desc" => "Enter the full name of the company for the copyright notice in the footer.",
			"id" => $shortname."_copyright_footer",
			"std" => "",
			"type" => "text");
			
$options[] = array( "name" => __('Custom CSS','framework_localize'),
			"desc" => __('Enter your custom styling.','framework_localize'),
			"id" => $shortname."_custom_css",
			"std" => "",
			"type" => "textarea");
									   
$options[] = array( "name" => __('Tracking Code','framework_localize'),
			"desc" => __('Paste Google Analytics (or other) tracking code here.','framework_localize'),
			"id" => $shortname."_google_analytics",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Footer Code','framework_localize'),
			"desc" => __('Enter the code to be loaded in the footer.','framework_localize'),
			"id" => $shortname."_footer_code",
			"std" => "",
			"type" => "textarea");
					
/* Option Page 5 - AxionStats */
$options[] = array( "name" => __('AxionStats Account Info','framework_localize'),
			"type" => "heading");
			
$options[] = array( "name" => __('AxionStats SiteID','framework_localize'),
			"desc" => "AxionStats SiteID",
			"id" => $shortname."_stats_siteid",
			"std" => "",
			"type" => "text");					
$options[] = array( "name" => __('AxionStats SiteKey','framework_localize'),
			"desc" => "AxionStats SiteKey",
			"id" => $shortname."_stats_sitekey",
			"std" => "",
			"type" => "text");						
					
/* Option Page 1 - All Options */
$options[] = array( "name" => __('All Options','framework_localize'),
			"type" => "heading");
			
			
$options[] = array( "name" => __('Attention','framework_localize'),
			"desc" => "",
			"id" => $shortname."_sample_callout",
			"std" => "This is a callout box. This can be used to inform your clients about something important.",
			"type" => "info");
			
			
$options[] = array( "name" => __('Text Field','framework_localize'),
			"desc" => "This is a text field.",
			"id" => $shortname."_sample_text_field",
			"std" => "",
			"type" => "text");
			

$options[] = array( "name" => __('Textarea','framework_localize'),
			"desc" => "This is a textarea.",
			"id" => $shortname."_sample_text_area",
			"std" => "",
			"type" => "textarea");
			

$options[] = array( "name" => __('Image Upload','framework_localize'),
			"desc" => __('This is an image upload field.','framework_localize'),
			"id" => $shortname."_sample_image_upload",
			"std" => "",
			"type" => "upload");
					
			
$options[] = array( "name" => __('Checkbox','framework_localize'),
			"desc" => __('This is a checkbox.','framework_localize'),
			"id" => $shortname."_sample_checkbox",
			"std" => "true",
			"type" => "checkbox");
			
			
$options[] = array( "name" => __('Dropdown List','framework_localize'),
			"desc" => __('This is a dropdown list.','framework_localize'),
			"id" => $shortname."_sample_dropdown",
			"std" => "1",
			"type" => "select",
			"options" => $sample_array);
			
			
$options[] = array( "name" => __('Radio Buttons','framework_localize'),
			"desc" => __('These are radio buttons.','framework_localize'),
			"id" => $shortname."_sample_radio",
			"std" => "1",
			"type" => "radio",
			"options" => array(
				'Red Radio' => 'Red',
				'Green Radio' => 'Green',
				'Blue Radio' => 'Blue'
				));
		
			
$options[] = array( "name" => __('Image Radio Buttons','framework_localize'),
			"desc" => __('Spice up your radio buttons by using custom images.','framework_localize'),
			"id" => $shortname."_sample_image_radio",
			"std" => "option1",
			"type" => "images",
			"options" => array(
				'option1' => $sampleurl . 'sample-layout-1.png',
				'option2' => $sampleurl . 'sample-layout-2.png',
				'option3' => $sampleurl . 'sample-layout-3.png'
				));
						
				
$options[] = array( "name" => __('Color Picker','framework_localize'),
			"desc" => __('This is a color picker.','framework_localize'),
			"id" => $shortname."_sample_color_picker",
			"std" => "",
			"type" => "color");	
					

$options[] = array( "name" => __('Wordpress Page','framework_localize'),
			"desc" => __('This displays a list of every page on your website.','framework_localize'),
			"id" => $shortname."_sample_wp_pages",
			"std" => "1",
			"type" => "select",
			"options" => $tt_pages);
			
			
$options[] = array( "name" => __('Wordpress Category','framework_localize'),
			"desc" => __('This displays a list of every category on your website.','framework_localize'),
			"id" => $shortname."_sample_wp_category",
			"std" => "1",
			"type" => "select",
			"options" => $tt_categories);
			
			
					
					
					
					
			

update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
