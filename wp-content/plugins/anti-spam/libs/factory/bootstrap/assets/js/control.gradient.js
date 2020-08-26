( function( $ ){
    
    // GRADIENT CONTROL CLASS DEFINITION
    // ================================
    
    var GradientControl = function (el) {
        this.$element = $(el);
        this.$picker =  this.$element.find(".factory-gradient-picker");
        this.$result = this.$element.find(".factory-result");
        
        this.init();
    };
    
    GradientControl.prototype.init = function() {
        var self = this;

        var directions = this.$element.data('directions');
        var points = this.$element.data('points');   
        var arrPoints = points ? points.split(',') : [];

        this.$picker.gradientPicker({
               change: function(points, styles) {
                    self.$result.val(styles).trigger('keyup');                           
               },                               
               fillDirection: directions,                            
               controlPoints: arrPoints
        });
    };
    
    // GRADIENT CONTROL DEFINITION
    // ================================
    
    $.fn.factoryBootstrap429_gradientControl = function (option) {
        return this.each(function () {
            var $this = $(this);
            var data  = $this.data('factory.gradient-control');
            if (!data) $this.data('factory.gradient-control', (data = new GradientControl(this)));
            if (typeof option === 'string') data[option].call(data);
        });
    };

    $.fn.factoryBootstrap429_gradientControl.Constructor = GradientControl;
    
    // GRADIENT CREATING
    // ================================
    
    $(function(){
        $(".factory-bootstrap-429 .factory-gradient").factoryBootstrap429_gradientControl();
    });
    
}( jQuery ) );