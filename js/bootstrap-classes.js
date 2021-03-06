/* 
 * Add Bootstrap Classes
 */
jQuery(document).ready(function(){
	jQuery("table").addClass("table");
	jQuery(".table").wrap("<div class='table-responsive'></div>");
	jQuery("#wp-calendar").addClass("table-striped");
	jQuery("dl").addClass("dl-horizontal");
	jQuery(".gallery-item").removeClass("dl-horizontal");
	jQuery(".wp-caption").addClass("thumbnail");
	jQuery(".wp-caption-text").addClass("caption");
	jQuery("#colophon ul").addClass("list-unstyled");
	jQuery("input").addClass("form-control");
	jQuery("#submit").addClass("btn btn-primary");
	jQuery(":checkbox").removeClass("form-control");
	jQuery("select").addClass("form-control");
	jQuery("textarea").addClass("form-control")
});
