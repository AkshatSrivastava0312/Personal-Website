jQuery(document).ready(function(){
//redirect
//above-header
jQuery( '.focus-customizer-widget-redirect-col1,.focus-customizer-widget-redirect' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-menu-redirect-col1,.focus-customizer-menu-redirect-col2,.focus-customizer-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel('nav_menus').focus();
} );
jQuery( '.focus-customizer-widget-redirect-col2' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-widget-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col1' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} ); 
jQuery( '.focus-customizer-social_media-redirect-col2' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} );
// main-header
jQuery( '.focus-customizer-widget-redirect' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );   
jQuery( '.focus-customizer-social-media-redirect' ).on( 'click', function (e){
            e.preventDefault();
             wp.customize.section( 'zita-social-icon' ).focus();
} ); 
// bottom-header
// above-header
jQuery( '.focus-customizer-bottom-widget-redirect-col1' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-bottom-widget-redirect-col2' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-bottom-widget-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-bottom-menu-redirect-col1,.focus-customizer-bottom-menu-redirect-col2,.focus-customizer-bottom-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel('nav_menus').focus();
} );
jQuery( '.focus-customizer-bottom-social_media-redirect-col1' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} ); 
jQuery( '.focus-customizer-bottom-social_media-redirect-col2' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} );
jQuery( '.focus-customizer-bottom-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'zita-social-icon' ).focus();
} );
//footer
jQuery( '.focus-customizer-widget-redirect-col1,.focus-customizer-widget-redirect-col2,.focus-customizer-widget-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-menu-redirect-col1,.focus-customizer-menu-redirect-col2,.focus-customizer-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'nav_menus' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col1,.focus-customizer-social_media-redirect-col2,.focus-customizer-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'zita-social-icon' ).focus();
} );

/* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );
});