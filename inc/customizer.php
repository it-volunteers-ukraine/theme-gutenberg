<?php

class Customizer {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	public function customize_register( $wp_customize ) {
		$this->footer( $wp_customize );
	}

	private function footer( $wp_customize ) {
		$wp_customize->add_section( 'footer', array(
			'title'    => 'Footer',
			'priority' => 30,
		) );

        $wp_customize->add_setting(
            'site_footer_logo',
            array()
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'site_footer_logo',
                array(
                    'label'      => __( 'Footer logo' ),
                    'section'    => 'footer',
                    'settings'   => 'site_footer_logo',
                )
            )
        );

		$wp_customize->add_setting(
			'footer_contacts_title',
			array()
		);

		$wp_customize->add_control(
			'footer_contacts_title',
			array(
				'label'    => 'Footer contacts title',
				'section'  => 'footer',
				'settings' => 'footer_contacts_title',
				'type'     => 'text',
			)
		);

		$wp_customize->add_setting(
			'footer_contacts_email',
			array()
		);

		$wp_customize->add_control(
			'footer_contacts_email',
			array(
				'label'    => 'Footer contacts Email',
				'section'  => 'footer',
				'settings' => 'footer_contacts_email',
				'type'     => 'text',
			)
		);

		$wp_customize->add_setting(
			'footer_copyright',
			array()
		);

		$wp_customize->add_control(
			'footer_copyright',
			array(
				'label'    => 'Footer copyright',
				'section'  => 'footer',
				'settings' => 'footer_copyright',
				'type'     => 'textarea',
			)
		);
	}

}

new Customizer();
