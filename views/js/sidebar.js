function collapseSidebar() {
	var sidebar = $(".sidebar-container");
	sidebar.hide();
	$(".sidebar-collapsed").show();
	$(".main-content-container").css("left","65px");
	$(".main-content-container").width("auto");
}
function expandSidebar() {
	var sidebar = $(".sidebar-collapsed")
		sidebar.hide();
		$(".sidebar-container").show();
		$(".main-content-container").css("left","270px");
}

$(document).ready(function() {
	$(".sidebar-header").click(function() {
		$(this).next(".submenu").toggleClass("expand");
	});
	$(".sidebar-collapsed").click(function() {
		expandSidebar();
	});
	$(".sidebar-container").click(function() {
		collapseSidebar();
	}).children().click(function(e) {
		return false;
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