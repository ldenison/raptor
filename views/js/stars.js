$(document).ready(function() {
	$(".star").click(function() {
		var incident_id = $(this).data("incident");
		var set = "";
		if($(this).hasClass("glyphicon-star-empty")) {
			$(this).removeClass("glyphicon-star-empty");
			$(this).addClass("glyphicon-star");
			$.get("/raptor/controllers/forms/incidents?action=star&id="+incident_id+"&set=true");
		}
		else {
			$(this).removeClass("glyphicon-star");
			$(this).addClass("glyphicon-star-empty");
			var star_id = $(this).data("star_id");
			$.get("/raptor/controllers/forms/incidents?action=star&id="+star_id+"&set=false");
		}
	});
});