function collapseSidebar() {
	var sidebar = $(".sidebar-container");
	sidebar.hide();
	$(".sidebar-collapsed").show();
	$("#main-content").removeClass("col-xs-10");
	$("#main-content").removeClass("col-xs-offset-2");
	$("#main-content").addClass("col-xs-12");
}
function expandSidebar() {
	var sidebar = $(".sidebar-collapsed")
		sidebar.hide();
		$(".sidebar-container").show();
		$("#main-content").removeClass("col-xs-12");
		$("#main-content").addClass("col-xs-offset-2");
		$("#main-content").addClass("col-xs-10");
}

$(document).ready(function() {
	$(".sidebar-header").click(function() {
		$(this).next(".submenu").toggleClass("expand");
	});
	$(".sidebar-collapsed").click(function() {
		expandSidebar();
	});
	$(".sidebar-footer").click(function() {
		collapseSidebar();
	});
	
	//Hot keys (left bracket or right - []) to expand / collapse sidebar
	$(document).keyup(function(e) {
		if(e.keyCode == 219) {
			collapseSidebar();
		}
	});
	$(document).keyup(function(e) {
		if(e.keyCode == 221) {
			expandSidebar();
		}
	});
});