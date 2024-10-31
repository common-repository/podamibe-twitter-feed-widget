
jQuery(document).ready(function(){
	jQuery('#widgets-right .ptf-color, .inactive-sidebar .ptf-color').wpColorPicker();
});
jQuery(document).ajaxComplete(function() {
	jQuery('#widgets-right .ptf-color, .inactive-sidebar .ptf-color').wpColorPicker();
});