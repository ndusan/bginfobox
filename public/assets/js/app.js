var App = App || {};
(function($){
    App.Core = {
    	exec: function(controller, method){
    		var core = App, method = ( method === undefined ) ? "init" : method;
                controller = controller.charAt(0).toUpperCase() + controller.slice(1);
                if (controller !== "" && core[controller] && typeof core[controller][method]=="function") core[controller][method]();
    	},
    	init: function() {
    		var body = document.body, controller = body.getAttribute( "data-controller" ), method = body.getAttribute( "data-method" );
    		App.Core.exec(controller);
    		App.Core.exec(controller, method);
                App.Core.exec('Common', 'init');
    	}
    };
    $(document).ready(App.Core.init);
})(this.jQuery);