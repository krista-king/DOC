<?php

// Check if CMB2 is already installed
if ( ! function_exists( 'cmb2_bootstrap' ) ) {	
	if ( file_exists( dirname( __FILE__ ) . '/cmb2-plugin/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2-plugin/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2-Plugin/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2-Plugin/init.php';
	}
}


add_action( 'cmb2_admin_init', 'secondline_psb_index_subscribe_social_meta_box' );
function secondline_psb_index_subscribe_social_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'secondline_psb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$secondline_psb_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_subscribe_btn',
		'title'         => esc_html__('Subscribe Links', 'secondline-psb-custom-buttons'),
		'object_types'  => array( 'secondline_psb_post' ), // Post type
	) );
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Text', 'secondline-psb-custom-buttons'),
		'default' 	 => 'Subscribe',
		'id'         => $prefix . 'text',
		'type'       => 'text',
	) );	
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Type', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'select_type',
		'type'       => 'select',		
		'default'	 => 'modal',
		'options'     => array(
			'modal'   => esc_attr__( 'Modal / Pop-Up', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'inline'    => esc_attr__( 'Inline Buttons', 'secondline-psb-custom-buttons' ),
			'list' => esc_attr__( 'List of Buttons', 'secondline-psb-custom-buttons' ),
			'icons'    => esc_attr__( 'Icons Only', 'secondline-psb-custom-buttons' ),
		),		
	) );	

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Style', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'select_style',
		'type'       => 'select',
		'options'     => array(
			'square'   => esc_attr__( 'Square', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'radius'    => esc_attr__( 'Rounded Square', 'secondline-psb-custom-buttons' ),
			'round' => esc_attr__( 'Rounded', 'secondline-psb-custom-buttons' ),
		),		
	) );		
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Background Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'background_color',
		'type'       => 'colorpicker',
		'default' => '#000000',
		'options' => array(
			'alpha' => true,
		),	
	) );

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Text Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'text_color',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Background Background', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'background_color_hover',
		'type'       => 'colorpicker',
		'default' => '#2a2a2a',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Text Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'text_color_hover',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	
	$slt_subscribe_group_field_id = $secondline_psb_cmb_demo->add_field( array(
		'id'          => $prefix . 'repeat_subscribe',
		'type'        => 'group',
		'description' => esc_attr__( 'Add Subscribe Button Links', 'secondline-psb-custom-buttons' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_attr__( 'Subscribe Link {#}', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_attr__( 'Add Another Link', 'secondline-psb-custom-buttons' ),
			'remove_button' => esc_attr__( 'Remove Link', 'secondline-psb-custom-buttons' ),
			'sortable'      => true, // beta
			'closed'		=> true,
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$secondline_psb_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Subscribe Platform',
		'id'   => $prefix . 'subscribe_platform',
		'type' => 'select',
		'options' => array(
			'Acast' => esc_attr__( 'Acast', 'secondline-psb-custom-buttons' ),
			'Amazon-Alexa' => esc_attr__( 'Amazon Alexa', 'secondline-psb-custom-buttons' ),
			'Anchor' => esc_attr__( 'Anchor', 'secondline-psb-custom-buttons' ),
			'Apple-Podcasts' => esc_attr__( 'Apple Podcasts', 'secondline-psb-custom-buttons' ),
			'Blubrry' => esc_attr__( 'Blubrry', 'secondline-psb-custom-buttons' ),
			'Breaker' => esc_attr__( 'Breaker', 'secondline-psb-custom-buttons' ),
			'Bullhorn' => esc_attr__( 'Bullhorn', 'secondline-psb-custom-buttons' ),
			'CastBox' => esc_attr__( 'Castbox', 'secondline-psb-custom-buttons' ),
			'Castro' => esc_attr__( 'Castro', 'secondline-psb-custom-buttons' ),
			'Deezer' => esc_attr__( 'Deezer', 'secondline-psb-custom-buttons' ),
			'Downcast' => esc_attr__( 'Downcast', 'secondline-psb-custom-buttons' ),
			'fyyd.de' => esc_attr__( 'fyyd.de', 'secondline-psb-custom-buttons' ),			
			'Google-Play' => esc_attr__( 'Google Play', 'secondline-psb-custom-buttons' ),			
			'Google-Podcasts' => esc_attr__( 'Google Podcasts', 'secondline-psb-custom-buttons' ),
			'Himalaya.com' => esc_attr__( 'Himalaya.com', 'secondline-psb-custom-buttons' ),
			'iHeartRadio' => esc_attr__( 'iHeartRadio', 'secondline-psb-custom-buttons' ),					
			'iTunes' => esc_attr__( 'iTunes', 'secondline-psb-custom-buttons' ),
			'iVoox' => esc_attr__( 'iVoox', 'secondline-psb-custom-buttons' ),
			'Laughable' => esc_attr__( 'Laughable', 'secondline-psb-custom-buttons' ),
			'Libsyn' => esc_attr__( 'Libsyn', 'secondline-psb-custom-buttons' ),
			'Listen-Notes' => esc_attr__( 'Listen Notes', 'secondline-psb-custom-buttons' ),
			'Miro' => esc_attr__( 'Miro', 'secondline-psb-custom-buttons' ),
			'MixCloud' => esc_attr__( 'MixCloud', 'secondline-psb-custom-buttons' ),
			'myTuner-Radio' => esc_attr__( 'MyTuner Radio', 'secondline-psb-custom-buttons' ),
			'Overcast' => esc_attr__( 'Overcast', 'secondline-psb-custom-buttons' ),
			'OwlTail' => esc_attr__( 'OwlTail', 'secondline-psb-custom-buttons' ),
			'Pandora' => esc_attr__( 'Pandora', 'secondline-psb-custom-buttons' ),
			'Patreon' => esc_attr__( 'Patreon', 'secondline-psb-custom-buttons' ),		
			'Player.fm' => esc_attr__( 'Player.fm', 'secondline-psb-custom-buttons' ),			
			'Plex' => esc_attr__( 'Plex', 'secondline-psb-custom-buttons' ),			
			'PocketCasts' => esc_attr__( 'PocketCasts', 'secondline-psb-custom-buttons' ),		
			'Podbay' => esc_attr__( 'Podbay', 'secondline-psb-custom-buttons' ),			
			'Podbean' => esc_attr__( 'Podbean', 'secondline-psb-custom-buttons' ),			
			'Podcast.de' => esc_attr__( 'Podcast.de', 'secondline-psb-custom-buttons' ),			
			'Podcast-Addict' => esc_attr__( 'Podcast Addict', 'secondline-psb-custom-buttons' ),
			'Podcast-Republic' => esc_attr__( 'Podcast Republic', 'secondline-psb-custom-buttons' ),
			'Podchaser' => esc_attr__( 'Podchaser', 'secondline-psb-custom-buttons' ),
			'Podcoin' => esc_attr__( 'Podcoin', 'secondline-psb-custom-buttons' ),
			'Podfan' => esc_attr__( 'Podfan', 'secondline-psb-custom-buttons' ),
			'Podkicker' => esc_attr__( 'Podkicker', 'secondline-psb-custom-buttons' ),
			'Podknife' => esc_attr__( 'Podknife', 'secondline-psb-custom-buttons' ),
			'Podtail' => esc_attr__( 'Podtail', 'secondline-psb-custom-buttons' ),
			'Radio-Public' => esc_attr__( 'Radio Public', 'secondline-psb-custom-buttons' ),
			'Radio.com' => esc_attr__( 'Radio.com', 'secondline-psb-custom-buttons' ),
			'RedCircle' => esc_attr__( 'RedCircle', 'secondline-psb-custom-buttons' ),
			'RSS' => esc_attr__( 'RSS', 'secondline-psb-custom-buttons' ),
			'RSSRadio' => esc_attr__( 'RSSRadio', 'secondline-psb-custom-buttons' ),
			'SoundCloud' => esc_attr__( 'SoundCloud', 'secondline-psb-custom-buttons' ),
			'Spotify' => esc_attr__( 'Spotify', 'secondline-psb-custom-buttons' ),
			'Spreaker' => esc_attr__( 'Spreaker', 'secondline-psb-custom-buttons' ),
			'Stitcher' => esc_attr__( 'Stitcher', 'secondline-psb-custom-buttons' ),
			'The-Podcast-App' => esc_attr__( 'The Podcast App', 'secondline-psb-custom-buttons' ),
			'TuneIn' => esc_attr__( 'TuneIn', 'secondline-psb-custom-buttons' ),
			'VKontakte' => esc_attr__( 'VKontakte', 'secondline-psb-custom-buttons' ),
			'We.fo' => esc_attr__( 'We.fo', 'secondline-psb-custom-buttons' ),
			'Yandex' => esc_attr__( 'Yandex', 'secondline-psb-custom-buttons' ),
			'YouTube' => esc_attr__( 'YouTube', 'secondline-psb-custom-buttons' ),
			'custom' => esc_attr__( 'Custom Link', 'secondline-psb-custom-buttons' ),			
		),		
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$secondline_psb_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Link',
		'id'   => $prefix . 'subscribe_url',
		'type' => 'text_url',
	) );
	
	$secondline_psb_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Custom Link - Label',
		'description' => 'Works only for the "Custom" link.',
		'id'   => $prefix . 'custom_link_label',
		'type' => 'text',
	) );	
	
	
}