<?php
/**
 * Hamburger Colors Options for Zita Theme.
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zita
 * @since       Zita 1.0.0
 */
//Bg-color
$wp_customize->add_setting('zita_hamburger_bg_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_hamburger_bg_clr', array(
        'label'      => __('Background Color', 'zita' ),
        'section'    => 'zita-hamburger-color',
        'settings'   => 'zita_hamburger_bg_clr',
    ) ) 
 );
// border-color
$wp_customize->add_setting('zita_hamburger_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_hamburger_brdr_clr', array(
        'label'      => __('Border Color', 'zita' ),
        'section'    => 'zita-hamburger-color',
        'settings'   => 'zita_hamburger_brdr_clr',
    ) ) 
 );
// icon-color
$wp_customize->add_setting('zita_hamburger_icon_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Zita_Customizer_Color_Control($wp_customize,'zita_hamburger_icon_clr', array(
        'label'      => __('Icon Color', 'zita' ),
        'section'    => 'zita-hamburger-color',
        'settings'   => 'zita_hamburger_icon_clr',
    ) ) 
 );
// Border radius
if ( class_exists( 'Zita_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'zita_hamburger_border_radius', array(
                'sanitize_callback' => 'zita_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customizer_Range_Value_Control(
                $wp_customize, 'zita_hamburger_border_radius', array(
                    'label'       => esc_html__( 'Border Radius', 'zita' ),
                    'section'     => 'zita-hamburger-color',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ),
                )
            )
    );
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('zita_hamburger_more', array(
    'sanitize_callback' => 'zita_sanitize_text',
    ));
$wp_customize->add_control(new Zita_Misc_Control( $wp_customize, 'zita_hamburger_more',
            array(
        'section'     => 'zita-hamburger-color',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'zita' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), apply_filters('zita_doc_link', zita_get_pro_url( 'https://wpzita.com/docs/color-background', 'color-background' ) ) ),
        'priority'   => 30,
)));