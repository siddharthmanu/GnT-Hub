$("#loginForm").submit(function(e) {
	$.ajax({
		type: "POST",
		url: "login.php",
		data: $("#loginForm").serialize(),
		success: function (data) {
			if(data=="success")
				window.location.replace("dashboard");
			else
				$("#loginError").show();
		}
	});
	e.preventDefault();
});
function search_name() {
	$.ajax({
		type: "POST",
		url: "select.php",
		data: {search:"name",keywords:$("#namekeywords").val(),parameter:$("#parameter").val()},
		success: function (data) {
			$("#contactlist").html(data);
			var topresult = $(".list-group-item.pjax").first();
			topresult.addClass('active');
			if(topresult.attr("id"))
				search_details(topresult.attr("id"));
			else
				$("#contactCard").html("<div class=\"panel panel-default\"><div class=\"panel-heading\"><h3 class=\"panel-title text-center\">No match found</h3></div>");
		}
	});
}
function search_details(roll) {
	$.ajax({
		type: "POST",
		url: "select.php",
		data: {search:"details",keywords:roll},
		success: function (data) {
			$("#contactCard").html(data);
		}
	});
	$("div").removeClass('active');
	$(".list-group-item").removeClass('active');
	$("."+roll).addClass('active');
}
$(document).ready(function(){
	search_name();
	$("#namekeywords").keyup(function(){
		search_name();
	});
	$("#parameter").change(function(){
		search_name();
	});
});