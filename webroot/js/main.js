
function listen(event, el, func) {
	if (el.addEventListener)  // W3C DOM
		el.addEventListener(event, func, false);
	else if (el.attachEvent) { // IE DOM
		var r = el.attachEvent('on'+event, func);
		return r;
    }
}
        
listen('load', window, function(){
    flash = document.getElementById('flash');
    if(flash) {
	    window.setTimeout( function() {
			flash.classList.add('hidden');
		}, 2500)
	};
})
