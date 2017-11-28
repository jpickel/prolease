<?php 

// Adds CSS to Customizer Page

function my_customizer_styles() { ?>
    <style>
    
       li#accordion-panel-widgets {
       	display: none !important;
       }
            
    </style>
    <?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );

// Removes Static Front Page

add_action('customize_register', 'themename_customize_register');
function themename_customize_register($wp_customize) {
  $wp_customize->remove_section( 'static_front_page' );
}


function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
   
       // Adds Theme Logo to 'Site Identity'
   
       $wp_customize->add_setting( 'themesimages_logo' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_logo', array(
           'label'    => __( 'Logo', 'themesimages' ),
           'section'  => 'title_tagline',
           'settings' => 'themesimages_logo',
       ) ) );
   
       // Adds Phone Number to 'Site Identity'
   
       $wp_customize->add_setting( 'phone_number' );
       
       $wp_customize->add_control( new  WP_Customize_Control( $wp_customize, 'phone_number', array(
           'label'    => __( 'Phone Number', 'phone_number' ),
           'section'  => 'title_tagline',
           'settings' => 'phone_number',
       ) ) );
   
       // Adds Email Address to 'Site Identity'
   
       $wp_customize->add_setting( 'email_address' );
       
       $wp_customize->add_control( new  WP_Customize_Control( $wp_customize, 'email_address', array(
           'label'    => __( 'Email Address', 'email_address' ),
           'section'  => 'title_tagline',
           'settings' => 'email_address',
       ) ) );
   
       // Adds Company Address to 'Site Identity'
   
       $wp_customize->add_setting( 'company_address' );
       
       $wp_customize->add_control( new  WP_Customize_Control( $wp_customize, 'company_address', array(
           'label'    => __( 'Company Address', 'company_address' ),
           'section'  => 'title_tagline',
           'settings' => 'company_address',
       ) ) );
   
       // Adds Other Offices to 'Site Identity'
   
       $wp_customize->add_setting( 'other_offices' );
       
       $wp_customize->add_control( new  WP_Customize_Control( $wp_customize, 'other_offices', array(
           'label'    => __( 'Other Offices', 'other_offices' ),
           'section'  => 'title_tagline',
           'settings' => 'other_offices',
           'type'     => 'textarea',
       ) ) );
   
   // Adds Theme Images Section
   
   $wp_customize->add_section( 'themesimages_section' , array(
       'title'       => __( 'Theme Images', 'themesimages' ),
       'priority'    => 30,
       'description' => 'Customize your website\'s theme images.',
   ) );
       
       // Adds Background #1
       
       $wp_customize->add_setting( 'themesimages_defaulttitlebg' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_backgroundone', array(
           'label'    => __( 'Default Title Background', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_defaulttitlebg',
           'description' => 'This background appears in default title marquees.',
       ) ) );

       // Adds Resource Whitepaper Logo
       
       $wp_customize->add_setting( 'themesimages_dark_whitepaper' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_dark_whitepaper', array(
           'label'    => __( 'Dark Whitepaper Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_dark_whitepaper',
           'description' => 'This image appears when a whitepaper is published to a page with a light background.',
       ) ) );

       // Adds Light Resource Whitepaper Logo
       
       $wp_customize->add_setting( 'themesimages_light_whitepaper' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_light_whitepaper', array(
           'label'    => __( 'Light Whitepaper Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_light_whitepaper',
           'description' => 'This image appears when a whitepaper is published to a page with a dark background.',
       ) ) );

       // Adds Red Resource Whitepaper Logo
       
       $wp_customize->add_setting( 'themesimages_red_whitepaper' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_red_whitepaper', array(
           'label'    => __( 'Red Whitepaper Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_red_whitepaper',
           'description' => 'This image appears when a whitepaper is hovered over.',
       ) ) );

       // Adds Resource eBook Logo
       
       $wp_customize->add_setting( 'themesimages_dark_ebook' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_dark_ebook', array(
           'label'    => __( 'Dark eBook Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_dark_ebook',
           'description' => 'This image appears when an ebook is published to a page with a light background.',
       ) ) );

       // Adds Light Resource eBook Logo
       
       $wp_customize->add_setting( 'themesimages_light_ebook' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_light_ebook', array(
           'label'    => __( 'Light eBook Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_light_ebook',
           'description' => 'This image appears when an ebook is published to a page with a dark background.',
       ) ) );

       // Adds Red Resource eBook Logo
       
       $wp_customize->add_setting( 'themesimages_red_ebook' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_red_ebook', array(
           'label'    => __( 'Red eBook Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_red_ebook',
           'description' => 'This image appears when a ebook is hovered over.',
       ) ) );

       // Adds Resource Infographic Logo
       
       $wp_customize->add_setting( 'themesimages_dark_infographic' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_dark_infographic', array(
           'label'    => __( 'Dark Infographic Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_dark_infographic',
           'description' => 'This image appears when an infographic is published to a page with a light background.',
       ) ) );

       // Adds Light Resource Infographic Logo
       
       $wp_customize->add_setting( 'themesimages_light_infographic' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_light_infographic', array(
           'label'    => __( 'Light Infographic Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_light_infographic',
           'description' => 'This image appears when an infographic is published to a page with a dark background.',
       ) ) );

       // Adds Red Resource Infographic Logo
       
       $wp_customize->add_setting( 'themesimages_red_infographic' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_red_infographic', array(
           'label'    => __( 'Red Infographic Resource Logo', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_red_infographic',
           'description' => 'This image appears when a infographic is hovered over.',
       ) ) );

    // Toolbar
     
     $wp_customize->add_section( 'toolbar_section' , array(
         'title'       => __( 'Services Toolbar', 'toolbarsection' ),
         'priority'    => 30,
         'description' => '',
     ) );

         // Adds Lease Accounting Text
         
         $wp_customize->add_setting( 'lease_accounting_text' );
         
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'toolbar_section', array(
             'label'    => __( 'Lease Accounting Text', 'toolbar_section' ),
             'type'   => 'textarea',
             'section'  => 'toolbar_section',
             'settings' => 'lease_accounting_text',
             'description' => 'This is the text that appears in the Toolbar Nav Menu below the Lease Accounting link.',
         ) ) );
       
   
   
   
}
add_action( 'customize_register', 'mytheme_customize_register' );