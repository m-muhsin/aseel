<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id' => 'acf_acf-to-rest-api',
		'title' => 'ACF to REST API',
		'fields' => array(
			array(
				'key' => 'field_56929e6a6a97d',
				'label' => 'Text',
				'name' => 'ag_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
	    ) 
    ));
}