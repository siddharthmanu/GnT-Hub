function search_name() {
	$.ajax({
		type: "POST",
		url: "select.php",
		data: {search:"name",keywords:$("#namekeywords").val()},
		success: function (data) {
			$("#contactlist").html(data);
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
	$(".list-group-item").removeClass('active');
	$("#"+roll).addClass('active');
}
$(document).ready(function(){
	$("#namesearch").click(function(){
		search_name();
	});
	$("#namekeywords").keyup(function(){
		search_name();
	});
});