<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

// VARIABLES
$themename = "Sterling";
$shortname = "st";

// Populate siteoptions option in array for use in theme
global $of_options;
$of_options = get_option('of_options');
$GLOBALS['template_path'] = TT_FRAMEWORK;


//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    


//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
$of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select the Blog page:");


// True/False
$true_false = array("true" => "true","false" => "false"); 


// JS Slider - Effect
$js_effect = array("slide" => "slide","fade" => "fade"); 


// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 


//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");


//Footer Columns Array
$footer_columns_list = array("Default-Layout","1","2","3","4","5");


//Skin Selector
$skin = array("light","dark");


//Footer Callout Button
$footer_callout_button_array = array("autumn","black","black-2","blue","blue-grey","cool-blue","coffee","fire","golden","green","green-2","grey","lime-green","navy","orange","periwinkle","pink","purple","purple-2","red","red-2","royal-blue","silver","sky-blue","teal-grey","teal","teal-2","white");
$footer_callout_button_size_array = array("small","large","jumbo");


//Paths for "type" => "images"
$url =  get_template_directory_uri() . '/framework/admin/images/color-schemes/';
$banner_url =  get_template_directory_uri() . '/framework/admin/images/banner-overlays/';
$shadow_url =  get_template_directory_uri() . '/framework/admin/images/shadows/';
$footerurl =  get_template_directory_uri() . '/framework/admin/images/footer-layouts/';
$fonturl =  get_template_directory_uri() . '/framework/admin/images/fonts/';
$logourl =  get_template_directory_uri() . '/framework/admin/images/logo-builder/';
$recaptcha_themes = get_template_directory_uri() . '/framework/admin/images/recaptcha-themes/';
$body_bg_url =  get_template_directory_uri() . '/framework/admin/images/body-backgrounds/';


//Access the WordPress Categories via an Array
$exclude_categories = array();  
$exclude_categories_obj = get_categories('hide_empty=0');
foreach ($exclude_categories_obj as $exclude_cat) {
$exclude_categories[$exclude_cat->cat_ID] = $exclude_cat->cat_name;}










/*-----------------------------------------------------------------------------------*/
/* Create Site Options Array */
/*-----------------------------------------------------------------------------------*/
$options = array();
			
			
$options[] = array( "name" => __('General Settings','tt_theme_framework'),
			"type" => "heading");
			

$options[] = array( "name" => __('Website Logo','tt_theme_framework'),
			"desc" => __('Upload a custom logo for your Website.','tt_theme_framework'),
			"id" => $shortname."_sitelogo",
			"std" => "", 
			"type" => "upload");
			
$options[] = array( "name" => __('Login Screen Logo','tt_theme_framework'),
			"desc" => __('Upload a custom logo for your Wordpress login screen.','tt_theme_framework'),
			"id" => $shortname."_loginlogo",
			"std" => "", 
			"type" => "upload");
			
$options[] = array( "name" => __('Favicon','tt_theme_framework'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/" target="_blank">www.favicon.cc</a>)</em>','tt_theme_framework'),
			"id" => $shortname."_favicon",
			"std" => "", 
			"type" => "upload");
			
$options[] = array( "name" => __('Logo Builder - Select an Icon','tt_theme_framework'),
			"desc" => __('Select an icon to be used for your logo.<br><br><em>note: you should only select an icon if you won\'t be uploading a custom logo.</em>','tt_theme_framework'),
			"id" => $shortname."_logo_icon",
			"std" => "nologo",
			"type" => "images",
			"options" => array(
				'custom-logo-1.png' => $logourl . 'logo-1.png',
				'custom-logo-2.png' => $logourl . 'logo-2.png',
				'custom-logo-3.png' => $logourl . 'logo-3.png',
				'custom-logo-4.png' => $logourl . 'logo-4.png',
				'custom-logo-5.png' => $logourl . 'logo-5.png',
				'custom-logo-6.png' => $logourl . 'logo-6.png',
				'custom-logo-7.png' => $logourl . 'logo-7.png',
				'custom-logo-8.png' => $logourl . 'logo-8.png',
				'custom-logo-9.png' => $logourl . 'logo-9.png'
				));
				
$options[] = array( "name" => __('Logo Builder - Text','tt_theme_framework'),
			"desc" => __('Enter the text to be used for your logo.<br><br><em>note: you should only enter logo text if you won\'t be uploading a custom logo.</em>','tt_theme_framework'),
			"id" => $shortname."_logo_text",
			"std" => "", 
			"type" => "text");
			
			
$options[] = array( "name" => __('Meta Boxes','tt_theme_framework'),
			"desc" => __('This functionality hides meta boxes in the Dashboard to help Wordpress feel more like a CMS. This includes: Comments, Discussion, Trackbacks, Custom Fields, Author, and Slug. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_hidemetabox",
			"std" => "true",
			"type" => "checkbox");
			
			
$options[] = array( "name" => __('Inline Editing','tt_theme_framework'),
			"desc" => __('This functionality adds an inline-editing button to all pages & posts so that logged-in administrators can quickly and easily edit their website. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_inline_editing",
			"std" => "true",
			"type" => "checkbox");
			
			
$options[] = array( "name" => __('SEO Module','tt_theme_framework'),
			"desc" => __('A Search Engine Optimization Module is available by default. <em>Please check this box to enable this Module. Please remove any SEO plugins before enabling this module, so as to prevent any possible SEO conflicts.</em>','tt_theme_framework'),
			"id" => $shortname."_seo_module",
			"std" => "false",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Responsive Design','tt_theme_framework'),
			"desc" => __('This theme comes with a Responsive Design that will adjust the theme\'s design when viewed on a mobile device. <em>Please check this box if you prefer to disable the responsive design.</em>','tt_theme_framework'),
			"id" => $shortname."_responsive",
			"std" => "false",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Update Notifier','tt_theme_framework'),
			"desc" => __('An Update Notifier is included by default. This functionality enables the theme to automatically check with our server for the latest version available. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_update_notifier",
			"std" => "true",
			"type" => "checkbox");	
			
			
$options[] = array( "name" => __('Tracking Code','tt_theme_framework'),
			"desc" => __('Paste Google Analytics (or other) tracking code here.','tt_theme_framework'),
			"id" => $shortname."_google_analytics",
			"std" => "", 
			"type" => "textarea");
						
			
//filter to allow developer to add new options to general settings.			
$options = apply_filters('theme_option_general_settings',$options);











$options[] = array( "name" => __('Blog Settings','tt_theme_framework'),
			"type" => "heading");
			
			
$options[] = array( "name" => __('Blog Page','tt_theme_framework'),
			"desc" => __('Select your blog page from the dropdown list.','tt_theme_framework'),
			"id" => $shortname."_blogpage",
			"std" => "",
			"type" => "select",
			"options" => $of_pages);
			

$options[] = array( "name" => __('Banner Title','tt_theme_framework'),
			"desc" => __('This page title is displayed in the banner area of the Blog page.','tt_theme_framework'),
			"id" => $shortname."_blogtitle",
			"std" => "Blog",
			"type" => "text");
			
			
$options[] = array( "name" => __('Searchbar','tt_theme_framework'),
			"desc" => __('A searchbar is displayed within the banner of all Blog pages by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_searchbar",
			"std" => "true",
			"type" => "checkbox");
			
			
$options[] = array( "name" => __('Banner Description','tt_theme_framework'),
			"desc" => __('This descriptive text is displayed in the banner area of the Blog page.<br /><br /><em>Note: this text will only be displayed if the searchbar is diabled.</em>','tt_theme_framework'),
			"id" => $shortname."_blogdescription",
			"std" => "",
			"type" => "textarea");
			
			
$options[] = array( "name" => __('Post Excerpt','tt_theme_framework'),
			"desc" => __('The full blog post is displayed by default. <em>Un-check this box to disable this functionality and display only the post excerpt.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_post_length",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Post Excerpt - Link','tt_theme_framework'),
			"desc" => __('Enter the text for the link that will lead to the full blog post.<br><br><em>You can ignore this section if displaying the full blog post.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_excerpt_link",
			"std" => "Continue Reading",
			"type" => "text");
	
			
$options[] = array( "name" => __('Post Excerpt - Link or Button','tt_theme_framework'),
			"desc" => __('A text-link will lead to the full blog post by default. <em>Un-check this box to disable this functionality and display a button instead.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_excerpt_button",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Post Excerpt - Button Color','tt_theme_framework'),
			"desc" => __('If you\'ve <em>un-checked</em> the "Link or Button" option please select a color for the Excerpt Button.','tt_theme_framework'),
			"id" => $shortname."_blog_excerpt_button_color",
			"std" => "green",
			"type" => "select",
			"options" => $footer_callout_button_array);
			
$options[] = array( "name" => __('Post Excerpt - Button Size','tt_theme_framework'),
			"desc" => __('If you\'ve <em>un-checked</em> the "Link or Button" option please select a size for the Excerpt Button.','tt_theme_framework'),
			"id" => $shortname."_blog_excerpt_button_size",
			"std" => "large",
			"type" => "select",
			"options" => $footer_callout_button_size_array);
			
$options[] = array( "name" => __('Twitter "Re-tweet" Button','tt_theme_framework'),
			"desc" => __('A Twitter re-tweet button is displayed under each blog post by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_retweet",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Facebook "Like" Button','tt_theme_framework'),
			"desc" => __('A Facebook "Like" button is displayed under each blog post by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_fb_like",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Pinterest "Pin it" Button','tt_theme_framework'),
			"desc" => __('A Pinterest "Pin it" button is displayed under each blog post by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_blog_pinterest",
			"std" => "true",
			"type" => "checkbox");			
			
$options[] = array( "name" => __('"Author Posted by" Information','tt_theme_framework'),
			"desc" => __('The "Author Posted by" information is displayed as part of each blog post by default. <em>Un-check this box to disable this functionality and hide this information.</em>','tt_theme_framework'),
			"id" => $shortname."_posted_by",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('"Posted Categories" Information','tt_theme_framework'),
			"desc" => __('The Categories that a post belong to are displayed by default. <em>Un-check this box to disable this functionality and hide the categories.</em>','tt_theme_framework'),
			"id" => $shortname."_posted_categories",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Post Comments','tt_theme_framework'),
			"desc" => __('Post comments are enabled by default. <em>Un-check this box to completely disable comments on all blog posts.</em>','tt_theme_framework'),
			"id" => $shortname."_post_comments",
			"std" => "true",
			"type" => "checkbox");	
			
$options[] = array( "name" => __('Exclude Categories','tt_theme_framework'),
			"desc" => __('Check off any post categories that you\'d like to exclude from the blog.','tt_theme_framework'),
			"id" => $shortname."_blogexcludetest",
			"std" => "", 
			"type" => "multicheck",
			"options" => $exclude_categories);			
			
			
			
//allow developer to add in new options to blog settings.			
$options = apply_filters('theme_option_blog_settings',$options);










$options[] = array( "name" => __('Footer Options','tt_theme_framework'),
			"type" => "heading");	
			
$options[] = array( "name" => __('Footer Columns','tt_theme_framework'),
			"desc" => __('Select the number of columns you would like to display in the footer.','tt_theme_framework'),
			"id" => $shortname."_footer_columns",
			"std" => "Default-Layout",
			"type" => "select",
			"options" => $footer_columns_list);	
			
$options[] = array( "name" => __('Footer Callout','tt_theme_framework'),
			"desc" => __('A Callout Area is displayed above the footer by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_footer_callout",
			"std" => "true",
			"type" => "checkbox");		
			
$options[] = array( "name" => __('Footer Callout - Text','tt_theme_framework'),
			"desc" => __('Enter the text to be displayed in the footer Callout Area.','tt_theme_framework'),
			"id" => $shortname."_footer_callout_text",
			"std" => "<p class=\"callout-heading\">Global Callout</p>
<p class=\"callout-text\">This nifty Callout Section is a sure fire way to direct your visitors where you need them!</p>",
			"type" => "textarea");
			
$options[] = array( "name" => __('Footer Callout - Button Label','tt_theme_framework'),
			"desc" => __('Enter the text to be displayed within the Footer Callout Button.<br /><em>(ie. Learn More)</em>','tt_theme_framework'),
			"id" => $shortname."_footer_callout_button",
			"std" => "",
			"type" => "text");			
			
$options[] = array( "name" => __('Footer Callout - Button URL','tt_theme_framework'),
			"desc" => __('Enter the URL where the user will be sent after clicking the Footer Callout Button.','tt_theme_framework'),
			"id" => $shortname."_footer_callout_button_url",
			"std" => "http://www.",
			"type" => "text");
			
$options[] = array( "name" => __('Footer Callout - Button URL Target','tt_theme_framework'),
			"desc" => __('The Footer Callout Button opens the URL in the same window by default. <em>Un-check this box to disable this functionality and open the URL in a new window.</em>','tt_theme_framework'),
			"id" => $shortname."_footer_callout_button_target",
			"std" => "true",
			"type" => "checkbox");	
			
$options[] = array( "name" => __('Footer Callout - Button Color','tt_theme_framework'),
			"desc" => __('Select a color for the Footer Callout Button.','tt_theme_framework'),
			"id" => $shortname."_footer_callout_button_color",
			"std" => "green",
			"type" => "select",
			"options" => $footer_callout_button_array);
			
$options[] = array( "name" => __('Footer Callout - Button Size','tt_theme_framework'),
			"desc" => __('Select a size for the Footer Callout Button.','tt_theme_framework'),
			"id" => $shortname."_footer_callout_button_size",
			"std" => "large",
			"type" => "select",
			"options" => $footer_callout_button_size_array);	
			
$options[] = array( "name" => __('Footer Copyright','tt_theme_framework'),
			"desc" => __('Enter the copyright information to be displayed in the footer.','tt_theme_framework'),
			"id" => $shortname."_footer_copyright",
			"std" => "Copyright &copy; 2012 Your Company Name. All rights reserved.",
			"type" => "textarea");
				
//allows developer to add in new options to interface options page.				
$options = apply_filters('theme_option_interface_settings',$options);

			
			
			
			
			





			
$options[] = array( "name" => __('Styling and CSS','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Pro Design Skin','tt_theme_framework'),
			"desc" => __('Our professional design team recommends Open Sans Font to be used throughout the entire website. <em>Check this box to activate Open Sans and a variety of customized CSS settings.</em>','tt_theme_framework'),
			"id" => $shortname."_google_font_open_sans",
			"std" => "false",
			"type" => "checkbox");
		
$options[] = array( "name" => __('Primary Color Scheme','tt_theme_framework'),
			"desc" => __('Select the primary color scheme for your website.','tt_theme_framework'),
			"id" => $shortname."_main_scheme",
			"std" => "",
			"type" => "images",
			"options" => array(
			'primary-coffee' 	=> $url . 'coffee.png',
			'primary-red' 		=> $url . 'red.png',
			'primary-autumn' 		=> $url . 'autumn.png',
			'primary-fire' 		=> $url . 'fire.png',
			'primary-golden' 	=> $url . 'golden.png',
			'primary-lime-green' 		=> $url . 'lime-green.png',
			'primary-purple' 	=> $url . 'purple.png',
			'primary-pink' 		=> $url . 'pink.png',
			'primary-periwinkle' 		=> $url . 'periwinkle.png',
			'primary-teal' 		=> $url . 'teal.png',
			'primary-green' 	=> $url . 'green.png',
			'primary-teal-grey' 		=> $url . 'teal-grey.png',		
			'primary-blue-grey' 		=> $url . 'blue-grey.png',	
			'primary-royal-blue' 		=> $url . 'royal-blue.png',
			'primary-blue' 		=> $url . 'blue.png',
			'primary-sky-blue' 		=> $url . 'sky-blue.png',
			'primary-silver' 		=> $url . 'silver.png',
			'primary-black' 	=> $url . 'black.png'
				));
					
$options[] = array( "name" => __('Secondary Color Scheme','tt_theme_framework'),
			"desc" => __('Mix and match color schemes for a completely custom look.','tt_theme_framework'),
			"id" => $shortname."_secondary_scheme",
			"std" => "default",
			"type" => "images",
			"options" => array(
			'default' 	=> $url . '_default.png',
			'secondary-coffee' 	=> $url . 'coffee.png',
			'secondary-red' 		=> $url . 'red.png',
			'secondary-autumn' 		=> $url . 'autumn.png',
			'secondary-fire' 		=> $url . 'fire.png',
			'secondary-golden' 	=> $url . 'golden.png',
			'secondary-lime-green' 		=> $url . 'lime-green.png',
			'secondary-purple' 	=> $url . 'purple.png',
			'secondary-pink' 		=> $url . 'pink.png',
			'secondary-periwinkle' 		=> $url . 'periwinkle.png',
			'secondary-teal' 		=> $url . 'teal.png',
			'secondary-green' 	=> $url . 'green.png',
			'secondary-teal-grey' 		=> $url . 'teal-grey.png',		
			'secondary-blue-grey' 		=> $url . 'blue-grey.png',	
			'secondary-royal-blue' 		=> $url . 'royal-blue.png',
			'secondary-blue' 		=> $url . 'blue.png',
			'secondary-sky-blue' 		=> $url . 'sky-blue.png',
			'secondary-silver' 		=> $url . 'silver.png',
			'secondary-black' 	=> $url . 'black.png'
				));
								
$options[] = array( "name" => __('Custom CSS','tt_theme_framework'),
			"desc" => __('Use this area to add custom CSS to your website.','tt_theme_framework'),
			"id" => $shortname."_custom_css",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" =>  __('Theme Designer','tt_theme_framework'),
			"desc" => "",
			"id" => $shortname."_custom_info_text",
			"std" => __('You can further customize the entire look of your theme by using the built in Theme Designer. The Theme Designer is located right here within Site Options Panel under Appearance > Site Options > Theme Designer','tt_theme_framework'),
			"type" => "info");
			
			
			
//filter to allow developer to add in new options for styling options.			
$options = apply_filters('theme_option_styling_settings',$options);	


			
			
			
	
	
	
	
	
			
$options[] = array( "name" => __('Interface Options','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Breadcrumbs','tt_theme_framework'),
			"desc" => __('Breadcrumbs are displayed on all interior pages by default. <em>Un-check this box to disable breadcrumbs.</em>','tt_theme_framework'),
			"id" => $shortname."_breadcrumbs",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Breadcrumbs "Home" Link','tt_theme_framework'),
			"desc" => __('Customize the text for the home link displayed in the breadcrumbs.','tt_theme_framework'),
			"id" => $shortname."_breadcrumbs_home_text",
			"std" => "Home",
			"type" => "text");
				
$options[] = array( "name" => __('Toolbar','tt_theme_framework'),
			"desc" => __('A toolbar is displayed above the main navigation by default. <em>Un-check this box to disable the toolbar.</em>','tt_theme_framework'),
			"id" => $shortname."_toolbar",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Dropdown Menus','tt_theme_framework'),
			"desc" => __('The main menu organizes child pages into dropdown menus by default. <em>Un-check this box to disable the dropdown menus.</em>','tt_theme_framework'),
			"id" => $shortname."_dropdown",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Searchbar','tt_theme_framework'),
			"desc" => __('A Searchbar can be included on a per-page basis to any page on your website. Un-check this box to completely disable the searchbar from every page on your website. <em>Please note: this will override all per-page searchbar settings (this functionality excludes blog and utility pages).</em>','tt_theme_framework'),
			"id" => $shortname."_global_searchbar",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Searchbar Text','tt_theme_framework'),
			"desc" => __('Customize the text that is displayed in the search bar.','tt_theme_framework'),
			"id" => $shortname."_searchbartext",
			"std" => "Search...",
			"type" => "text");
			
$options[] = array( "name" => __('Scroll to Top Link','tt_theme_framework'),
			"desc" => __('A scroll-to-top button is added to the footer by default. <em>Un-check this box to disable the link.</em>','tt_theme_framework'),
			"id" => $shortname."_scrolltoplink",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Scroll to Top Text','tt_theme_framework'),
			"desc" => __('Add the text to be used for the "Scroll to Top" link.','tt_theme_framework'),
			"id" => $shortname."_scrolltoptext",
			"std" => "Scroll to Top",
			"type" => "text");
			
$options[] = array( "name" => __('Gallery Settings','tt_theme_framework'),
			"desc" => __('Enter the number of Gallery Posts to display on each page. <em>All posts will be displayed by default.</em>','tt_theme_framework'),
			"id" => $shortname."_gallery_posts_per_page",
			"std" => "show all",
			"type" => "text");
				
//allows developer to add in new options to interface options page.				
$options = apply_filters('theme_option_interface_settings',$options);










$options[] = array( "name" => __('Theme Designer','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Boxed Layout','tt_theme_framework'),
			"desc" => __('This theme\'s design spans the full width of the web browser by default. <em>Please check this box to switch to a fixed-width boxed layout.</em>','tt_theme_framework'),
			"id" => $shortname."_boxedlayout",
			"std" => "false",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Boxed Layout - Drop Shadow','tt_theme_framework'),
					"desc" => __('Set the opacity of the Boxed Layout drop shadow.<br /><br /><em>Values from: 0.1 - 1.0</em>','tt_theme_framework'),
					"id" => $shortname."_boxedlayout_shadow",
					"std" => "0.5",
					"type" => "text");
					
$options[] = array( "name" =>  __('Body - Background Color','tt_theme_framework'),
					"desc" => __('Select a custom background color for your website. <em>This setting is only recommended when using the boxed layout.</em>','tt_theme_framework'),
					"id" => $shortname."_body_bg_color",
					"std" => "", 
					"type" => "color");
						
$options[] = array( "name" => __('Body - Background Image','truethemes_localize'),
			"desc" => __('Choose a custom background image for your website. <br /><br />You can also upload a custom background image using the setting below.<br /><br /><em>Background images are only recommended when using the boxed layout.</em>','tt_theme_framework'),
			"id" => $shortname."_select_body_bg",
			"std" => "",
			"type" => "images",
			"options" => array(
				'null' => $fonturl . 'no-font.png',
				'classy_fabric' => $body_bg_url . 'classy-fabric.png',
				'low_contrast_linen' => $body_bg_url . 'low-contrast-linen.png',
				'dark_wall' => $body_bg_url . 'dark-wall.png',
				'darkdenim3' => $body_bg_url . 'darkdenim3.png',		
				'pinstriped_suit' => $body_bg_url . 'pinstriped_suit.png',
				'connect' => $body_bg_url . 'connect.png',
				'escheresque' => $body_bg_url . 'escheresque.png',
				'gplaypattern' => $body_bg_url . 'gplaypattern.png',
				'grey-subtle-noise' => $body_bg_url . 'grey-subtle-noise.png',
				'grey' => $body_bg_url . 'grey.png',
				'grid_noise' => $body_bg_url . 'grid_noise.png',
				'grid' => $body_bg_url . 'grid.png',
				'hexellence' => $body_bg_url . 'hexellence.png',
				'lghtmesh' => $body_bg_url . 'lghtmesh.png',
				'noise_lines' => $body_bg_url . 'noise_lines.png',
				'noisy_grid' => $body_bg_url . 'noisy_grid.png',
				'rough_diagonal' => $body_bg_url . 'rough_diagonal.png',
				'shattered' => $body_bg_url . 'shattered.png',
				'subtle_dots' => $body_bg_url . 'subtle_dots.png',
				'tiny_grid' => $body_bg_url . 'tiny_grid.png'
				));				
					
$options[] = array( "name" => __('Body - Background Image Upload','truethemes_localize'),
			"desc" => __('Upload a custom background image for your website. <br /><br />Free backgrounds can be downloaded from <a href="http://www.subtlepatterns.com" target="_blank">www.subtlepatterns.com</a><br /><br /><em>Background images are only recommended when using the boxed layout.</em>','tt_theme_framework'),
			"id" => $shortname."_body_bg_image",
			"std" => "", 
			"type" => "upload");
			
$options[] = array( "name" => __('Body - Background Image Position','truethemes_localize'),
			"desc" => __('Use this section to set the background position of your custom background image.<br /><br /><em>Background images are only recommended when using the boxed layout.</em>','tt_theme_framework'),
			"id" => $shortname."_designer_page_background_position",
			"std" => "",
			"type" => "select",
			"options" => array(
				'left top' => 'left top',
				'center top' => 'center top',
				'right top' => 'right top',
				'center center' => 'center center',
				'left bottom' => 'left bottom',
				'center bottom' => 'center bottom',
				'right bottom' => 'right bottom',
				));
				
$options[] = array( "name" => __('Body - Background Image Repeat','truethemes_localize'),
			"desc" => __('Use this section to set the repeat property for your custom background image.<br /><br /><em>Background images are only recommended when using the boxed layout.</em>','tt_theme_framework'),
			"id" => $shortname."_designer_page_background_repeat",
			"std" => "",
			"type" => "select",
			"options" => array(
				'repeat' => 'repeat',
				'repeat-x' => 'repeat-x',
				'repeat-y' => 'repeat-y',
				'no-repeat' => 'no-repeat',
				));
			
$options[] = array( "name" =>  __('Top Toolbar - Background Color','tt_theme_framework'),
					"desc" => __('Select a custom background color for your website\'s top toolbar.','tt_theme_framework'),
					"id" => $shortname."_toolbar_bg_color",
					"std" => "", 
					"type" => "color");
			
$options[] = array( "name" =>  __('Banner - Background Color','tt_theme_framework'),
					"desc" => __('Select a custom background color for your website\'s banner.','tt_theme_framework'),
					"id" => $shortname."_banner_bg_color",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Footer - Background Color','tt_theme_framework'),
					"desc" => __('Select a custom background color for your website\'s footer.','tt_theme_framework'),
					"id" => $shortname."_footer_bg_color",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" => __('Banner &amp; Footer Design','tt_theme_framework'),
			"desc" => __('Select a custom design for your website\'s banner and footer.<br /><br /><em>Note: This will add a transparent image on top of your already chosen background color.</em>','tt_theme_framework'),
			"id" => $shortname."_banner_overlay",
			"std" => "banner-none",
			"type" => "images",
			"options" => array(
			'banner-none' 	=> $banner_url . 'banner-none.jpg',
			'banner-abstract.png' 	=> $banner_url . 'banner-abstract.jpg',
			'banner-bokeh.png' 	=> $banner_url . 'banner-bokeh.jpg',
			'banner-diagonal.png' 	=> $banner_url . 'banner-diagonal.jpg',
			'banner-halftone-1.png' 	=> $banner_url . 'banner-halftone-1.jpg',
			'banner-halftone-2.png' 	=> $banner_url . 'banner-halftone-2.jpg',
			'banner-noise.png' 	=> $banner_url . 'banner-noise.jpg',
			'banner-paisley.png' 	=> $banner_url . 'banner-paisley.jpg',
			'banner-stars.png' 	=> $banner_url . 'banner-stars.jpg',
			'banner-sunburst.png' 	=> $banner_url . 'banner-sunburst.jpg'
			));
			
$options[] = array( "name" => __('Shadow Style','tt_theme_framework'),
			"desc" => __('Select the shadow style for your website\'s navigation bar and footer.','tt_theme_framework'),
			"id" => $shortname."_shadow_style",
			"std" => "shadow-1.png",
			"type" => "images",
			"options" => array(
			'shadow-1.png' 	=> $shadow_url . 'admin-shadow-1.png',
			'shadow-2.png' 	=> $shadow_url . 'admin-shadow-2.png',
			'shadow-3.png' 	=> $shadow_url . 'admin-shadow-3.png',
			'shadow-4.png' 	=> $shadow_url . 'admin-shadow-4.png',
			'shadow-5.png' 	=> $shadow_url . 'admin-shadow-5.png'
			));
			
$options[] = array( "name" => __('Top Toolbar - Padding','tt_theme_framework'),
					"desc" => __('Modify the height of the top toolbar by adjusting the padding.<br /><br /><em>Default value is 8px.</em>','tt_theme_framework'),
					"id" => $shortname."_toolbar_padding",
					"std" => "8px",
					"type" => "text");
					
$options[] = array( "name" => __('Navigation Bar - Padding','tt_theme_framework'),
					"desc" => __('Modify the height of the navigation bar by adjusting the padding.<br /><br /><em>Default value is 32px.</em>','tt_theme_framework'),
					"id" => $shortname."_nav_bar_padding",
					"std" => "32px",
					"type" => "text");					

$options[] = array( "name" => __('Interior Banner - Padding','tt_theme_framework'),
					"desc" => __('Modify the height of the interior banner by adjusting the padding.<br /><br /><em>Default value is 25px.</em>','tt_theme_framework'),
					"id" => $shortname."_interior_banner_padding",
					"std" => "25px",
					"type" => "text");
					
$options[] = array( "name" => __('Footer - Padding','tt_theme_framework'),
					"desc" => __('Modify the height of the footer by adjusting the padding.<br /><br /><em>Default padding is 20px.</em>','tt_theme_framework'),
					"id" => $shortname."_footer_padding",
					"std" => "20px",
					"type" => "text");
				
$options[] = array( "name" =>  __('Link Color','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s links.','tt_theme_framework'),
					"id" => $shortname."_custom_link_color",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Main Menu - Active Link Color','tt_theme_framework'),
					"desc" => __('Select a custom color for the Main Menu active link.','tt_theme_framework'),
					"id" => $shortname."_custom_link_color_main_menu",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H1)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H1 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h1",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H2)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H2 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h2",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H3)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H3 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h3",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H4)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H4 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h4",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H5)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H5 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h5",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color (H6)','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s H6 Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_h6",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" =>  __('Heading Color - Sidebar Widgets','tt_theme_framework'),
					"desc" => __('Select a custom color for your website\'s Sidebar Widget Headings.','tt_theme_framework'),
					"id" => $shortname."_custom_heading_color_widget",
					"std" => "",
					"type" => "color");
													
									
//allow developer to add in new options to Additional settings.			
$options = apply_filters('theme_option_additional_settings',$options);			






			
$options[] = array( "name" => __('Typography','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Google Web Fonts','tt_theme_framework'),
			"desc" => __('Select a custom font to be used for your website\'s headings.<br><br><strong>Fonts:</strong><br>1. (no custom font)<br>2. Droid Sans<br>3. Cabin<br>4. Questrial<br>5. Cuprum<br>6. News Cycle<br>7. Enriqueta<br>8. Open Sans<br>9. Arvo<br>10. Kreon<br>11. Indie Flower<br>12. Josefin Sans','tt_theme_framework'),
			"id" => $shortname."_google_font",
			"std" => "nofont",
			"type" => "images",
			"options" => array(
				'nofont' => $fonturl . '1-no-font.png',
				'Droid Sans' => $fonturl . '2-droid-sans.png',
				'Cabin' => $fonturl . '3-cabin.png',
				'Questrial' => $fonturl . '4-questrial.png',
				'Cuprum' => $fonturl . '5-cuprum.png',
				'News Cycle' => $fonturl . '6-news-cycle.png',
				'Enriqueta' => $fonturl . '7-enriqueta.png',
				'Open Sans' => $fonturl . '8-open-sans.png',
				'Arvo' => $fonturl . '9-arvo.png',
				'Kreon' => $fonturl . '10-kreon.png',
				'Indie Flower' => $fonturl . '11-indie-flower.png',
				'Josefin Sans' => $fonturl . '12-josefin-sans.png'
				));
				
$options[] = array( "name" => __('Custom Google Web Font','tt_theme_framework'),
			"desc" => __('Enter a custom font name If you prefer to use a font that\'s not listed above.<br><br>Here is the complete list of available <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>.','tt_theme_framework'),
			"id" => $shortname."_custom_google_font",
			"std" => "",
			"type" => "text");
			
			
//allow developer to add in new options to typography settings.			
$options = apply_filters('theme_option_typography_settings',$options);	





	


				
				






$options[] = array( "name" => __('Forms','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Form Builder','tt_theme_framework'),
			"desc" => __('A powerful form builder is included by default. <em>Un-check this box to disable the form builder.</em>','tt_theme_framework'),
			"id" => $shortname."_formbuilder",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('reCAPTCHA: Public Key','tt_theme_framework'),
			"desc" => __('Enter your reCAPTCHA Public Key.<br><br>
			You can obtain your reCAPTCHA keys at: <a href="http://www.google.com/recaptcha" target="_blank">google.com/recaptcha</a><br><br><em>Simply leave this field blank if you won\'t be using this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_publickey",
			"std" => "",
			"type" => "text");			
			
$options[] = array( "name" => __('reCAPTCHA: Private Key','tt_theme_framework'),
			"desc" => __('Enter your reCAPTCHA Private Key.<br><br>
			You can obtain your reCAPTCHA keys at: <a href="http://www.google.com/recaptcha" target="_blank">google.com/recaptcha</a><br><br><em>Simply leave this field blank if you won\'t be using this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_privatekey",
			"std" => "",
			"type" => "text");
			

//added since version 2.6
$options[] = array( "name" => __('reCAPTCHA Theme - Select a theme','tt_theme_framework'),
			"desc" => __('Please select a reCAPTCHA theme.','tt_theme_framework'),
			"id" => $shortname."_recaptcha_theme",
			"std" => "default_theme",
			"type" => "images",
			"options" => array(
				'default_theme' => $recaptcha_themes . 'red.jpg',
				'white_theme' => $recaptcha_themes . 'white.jpg',
				'black_theme' => $recaptcha_themes . 'black.jpg',
				'clean_theme' => $recaptcha_themes . 'clean.jpg',
				));

$options[] = array( "name" => __('reCAPTCHA Theme - customization','tt_theme_framework'),
			"desc" => __('(For Advance User Only)<br/><br/>This setting overwrites the above reCAPTCHA theme selection. <br/><br/>You can customize the look and feel of reCAPTCHA, by entering your custom javascript code here. Please read <a href="http://code.google.com/intl/pt-PT/apis/recaptcha/docs/customization.html" target="_blank">reCAPTCHA developer documentation</a> for details.<br/><br/><u><strong>Important Notes:</strong></u><br/>Please change the javascript codes from google documentation to use <strong>double quotes</strong> for all javascript variables, and not single quotes.','tt_theme_framework'),
			"id" => $shortname."_recaptcha_custom",
			"std" => "",
			"type" => "textarea");	
							
									
$options[] = array( "name" => __('Required Indicator','tt_theme_framework'),
			"desc" => __('This text will be displayed next to required fields.','tt_theme_framework'),
			"id" => $shortname."_contact_required",
			"std" => "*",
			"type" => "text");
			
$options[] = array( "name" => __('Success Message','tt_theme_framework'),
			"desc" => __('Customize the success message that will be displayed after the user submits the form.','tt_theme_framework'),
			"id" => $shortname."_contact_successmsg",
			"std" => "Thank you for messaging us. We will get back to you as soon as possible. Cheers!",
			"type" => "textarea");
			
			$options[] = array( "name" => __('Submit Button - Text','tt_theme_framework'),
			"desc" => __('Customize the text that will be displayed on submit button','tt_theme_framework'),
			"id" => $shortname."_submit_button_text",
			"std" => "Send",
			"type" => "text");				
			
//allow developer to add in new options to forms.				
$options = apply_filters('theme_option_forms_settings',$options);	









$options[] = array( "name" => __('Utility Pages','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('404 Page - Searchbar','tt_theme_framework'),
			"desc" => __('A searchbar is displayed within the banner of the 404 Page by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_error_searchbar",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('404 Page - Banner Title','tt_theme_framework'),
			"desc" => __('Set the page title that is displayed in the banner area of the 404 Page.','tt_theme_framework'),
			"id" => $shortname."_404title",
			"std" => "Page not Found",
			"type" => "text");
			
$options[] = array( "name" => __('404 Page - Banner Description','tt_theme_framework'),
			"desc" => __('This text is displayed within the banner area of the 404 Page.<br /><br /><em>Note: this text will only be displayed if the searchbar is diabled.</em>','tt_theme_framework'),
			"id" => $shortname."_404description",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('404 Page - Message','tt_theme_framework'),
			"desc" => __('Set the message that is displayed within the content area on the 404 Page.','tt_theme_framework'),
			"id" => $shortname."_404message",
			"std" => "<p><strong>Oops! the page you are looking for could not be found.</strong></p>

<p>Here are some links that you might find useful:</p>

<ul class=\"not-found-list\">
<li><a href=\"http://www.\">Home</a></li>
<li><a href=\"http://www.\">Sitemap</a></li>
<li><a href=\"http://www.\">Contact Us</a></li>
</ul>",
			"type" => "textarea");
			
$options[] = array( "name" => __('Search Results Page - Searchbar','tt_theme_framework'),
			"desc" => __('A searchbar is displayed within the banner of the Search Results by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_results_searchbar",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Search Results Page - Banner Title','tt_theme_framework'),
			"desc" => __('Set the page title that is displayed in the banner area of the Search Results Page.','tt_theme_framework'),
			"id" => $shortname."_results_title",
			"std" => "Search Results",
			"type" => "text");
			
$options[] = array( "name" => __('Search Results Page - Banner Description','tt_theme_framework'),
			"desc" => __('This text is displayed within the banner area of the Search Results Page.<br /><br /><em>Note: this text will only be displayed if the searchbar is diabled.</em>','tt_theme_framework'),
			"id" => $shortname."_results_description",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Search Results Page - Fallback Message','tt_theme_framework'),
			"desc" => __('Set the message that is displayed when a search comes back with no results.','tt_theme_framework'),
			"id" => $shortname."_results_fallback",
			"std" => "<p>Our Apologies, but your search did not return any results. Please try using a different search term.</p>",
			"type" => "textarea");
			
$options[] = array( "name" => __('Under Construction Page - Main Message','tt_theme_framework'),
			"desc" => __('Set the main message that is displayed on the under construction page.','tt_theme_framework'),
			"id" => $shortname."_construction_main",
			"std" => "New Website Coming Soon!",
			"type" => "textarea");
			
			
$options[] = array( "name" => __('Under Construction Page - Year','tt_theme_framework'),
			"desc" => __('Select the year that your website will be ready.','tt_theme_framework'),
			"id" => $shortname."_construction_year",
			"std" => "2012",
			"type" => "select",
			"options" => array(
				'2012' => '2012',
				'2013' => '2013',
				'2014' => '2014',
				'2015' => '2015',
				'2016' => '2016',
				'2017' => '2017',
				'2018' => '2018',
				'2019' => '2019',
				'2020' => '2020',
				));
					
				
$options[] = array( "name" => __('Under Construction Page - Month','tt_theme_framework'),
			"desc" => __('Enter the number of the month that your website will be ready.<br><br>1- January<br>2- February<br>3- March<br>4- April<br>5- May<br>6- June<br>7- July<br>8- August<br>9- September<br>10- October<br>11- November<br>12- December','tt_theme_framework'),
			"id" => $shortname."_construction_month",
			"std" => "5",
			"type" => "text"
				);
				
				
$options[] = array( "name" => __('Under Construction Page - Day','tt_theme_framework'),
			"desc" => __('Enter the day that your website will be ready.<br><br><em>Example: 10</em>','tt_theme_framework'),
			"id" => $shortname."_construction_day",
			"std" => "10",
			"type" => "text"
			);
			
//allow developer to add in new options to utility.				
$options = apply_filters('theme_option_utility_settings',$options);			
			
			
			
			
			
			
			
			
			
			
			
			
			
$options[] = array( "name" => __('Homepage Lightbox','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Banner Content','tt_theme_framework'),
			"desc" => __('Enter the content to be displayed within the Banner area next to the callout images.','tt_theme_framework'),
			"id" => $shortname."_home_lightbox_banner_content",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Primary Callout Image','tt_theme_framework'),
			"desc" => __('This is the primary callout image displayed in the banner area.<br>(450 x 316)','tt_theme_framework'),
			"id" => $shortname."_home_lightbox_primary_image",
			"std" => "",
			"type" => "upload");						
			
$options[] = array( "name" => __('Secondary Callout Image','tt_theme_framework'),
			"desc" => __('This is the secondary callout image displayed behind the primary image in the banner area.<br>(450 x 271)','tt_theme_framework'),
			"id" => $shortname."_home_lightbox_secondary_image",
			"std" => "", 
			"type" => "upload");			
			
$options[] = array( "name" => __('Lightbox','tt_theme_framework'),
			"desc" => __('The Callout images will link to a Lightbox by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_home_lightbox",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Lightbox Content','tt_theme_framework'),
			"desc" => __('Enter the content to be displayed within the Lightbox. <em>(Examples below)</em>','tt_theme_framework'),
			"id" => $shortname."_home_lightbox_content",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" =>  __('Lightbox Content Examples','tt_theme_framework'),
			"desc" => "",
			"id" => $shortname."_custom_info_text",
			"std" => __('
			<strong>Image:</strong> <em>http://www.yoursite.com/images/image-1.jpg</em><br>
			<strong>YouTube Video:</strong> <em>http://www.youtube.com/watch?v=VKS08be78os</em><br>
			<strong>Vimeo Video:</strong> <em>http://vimeo.com/8245346</em><br>
			<strong>Flash SWF:</strong> <em>http://www.yoursite.com/files/design.swf?width=792&height=294</em><br>
			<strong>i-Frame:</strong> <em>http://www.apple.com?iframe=true&width=850&height=500</em>','tt_theme_framework'),
			"type" => "info");

			
			
//allow developer to add in new options to homepage settings.			
$options = apply_filters('theme_option_home_settings',$options);	









$options[] = array( "name" => __('JavaScript Slider','tt_theme_framework'),
			"type" => "heading");
			
			
$options[] = array( "name" => __('Slide Transition Effect','tt_theme_framework'),
			"desc" => __('Select a transition effect for your slides.','tt_theme_framework'),
			"id" => $shortname."_jslide_effect",
			"std" => "slide",
			"type" => "radio",
			"options" => $js_effect);
			
			
$options[] = array( "name" => __('Slide Speed','tt_theme_framework'),
			"desc" => __('This number represents how fast your slides will animate.<br><br><em>Note:<br>lower number = faster speed</em>','tt_theme_framework'),
			"id" => $shortname."_jslide_speed",
			"std" => "500",
			"type" => "text");
			
			
$options[] = array( "name" => __('Slide Delay Time','tt_theme_framework'),
			"desc" => __('This number represents the amount of delay time between each slide.<br><br><em>Note: leaving this set to 0 will prevent the slides from auto-play.<br><br>lower number = shorter delay</em>','tt_theme_framework'),
			"id" => $shortname."_jslide_delay",
			"std" => "0",
			"type" => "text");
			
			
$options[] = array( "name" => __('Randomize Slides','tt_theme_framework'),
			"desc" => __('Select whether or not the slides will display in a random order.','tt_theme_framework'),
			"id" => $shortname."_jslide_randomize",
			"std" => "false",
			"type" => "radio",
			"options" => $true_false);
				
				
$options[] = array( "name" => __('Pause on Hover','tt_theme_framework'),
			"desc" => __('Select whether or not the slideshow will pause when hovered by a user.','tt_theme_framework'),
			"id" => $shortname."_jslide_pause_hover",
			"std" => "false",
			"type" => "radio",
			"options" => $true_false);
			
$options[] = array( "name" => __('Navigation Arrows','tt_theme_framework'),
			"desc" => __('Select whether or not the slideshow will display Next and Previous arrows.','tt_theme_framework'),
			"id" => $shortname."_jslide_navarrows",
			"std" => "false",
			"type" => "radio",
			"options" => $true_false);
			
			
			
//allow developer to add in new options to JS Slider settings.			
$options = apply_filters('theme_option_jslide_settings',$options);





//always check if woocommence is activated before showing this options!
if (class_exists('woocommerce')):

$options[] = array( "name" => __('WooCommerce','tt_theme_framework'),
			"type" => "heading");
			
$options[] = array( "name" => __('Breadcrumbs','tt_theme_framework'),
			"desc" => __('Breadcrumbs are displayed within the banner of the WooCommerce pages by default. <em>Un-check this box to disable this functionality.</em>','tt_theme_framework'),
			"id" => $shortname."_woocommerce_breadcrumbs",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Banner Title','tt_theme_framework'),
			"desc" => __('Set the page title that is displayed in the banner area of the WooCommerce Pages.','tt_theme_framework'),
			"id" => $shortname."_woocommerce_title",
			"std" => "Shop",
			"type" => "text");
			
$options[] = array( "name" => __('Banner Description','tt_theme_framework'),
			"desc" => __('This text is displayed within the banner area of the WooCommerce Pages.<br /><br /><em>Note: this text will only be displayed if the banner sidebar region is diabled.</em>','tt_theme_framework'),
			"id" => $shortname."_woocommerce_description",
			"std" => "",
			"type" => "textarea");
			

			
//allow developer to add in new options to woocommerce.				
$options = apply_filters('theme_option_woocommerce_settings',$options);

endif; //end checking for woocommence.
		
// Sanitize options before storing them in the database.
foreach ( (array) $options as $option ) :
	// Sanitize the option titles.
	if ( isset( $option['name'] ) )
		$option['name'] = esc_attr( $option['name'] );
		
	// Sanitize the option IDs.
	if ( isset( $option['id'] ) )
		$option['desc'] = esc_attr( $option['id'] );
		
	// Sanitize the option default values.
	if ( isset( $option['std'] ) )
		$option['std'] = stripslashes( $option['std'] );
		
	// Sanitize the option types.
	if ( isset( $option['type'] ) )
		$option['type'] = esc_attr( $option['type'] );
		
	// Sanitize the option values.
	if ( isset( $option['options'] ) ) {
		if ( is_array( $option['options'] ) ) {
			foreach ( $option['options'] as $key => $val )
				$option['options'][$key] = stripslashes( $val );
		} else {
			$option['options'] = stripslashes( $option['options'] );
		}
	}
endforeach;
	
update_option( 'of_template', $options ); 					  
update_option( 'of_themename', esc_attr( $themename ) );   
update_option( 'of_shortname', esc_attr( $shortname ) );

}
}