var url="userAjax.php";
var popupActive = 0;

$(function(){
	$("#UserForm form").submit(function(){
		var login = $("#UserForm form input").val();
		$.post(url, {action:"TestPseudo", login:login}, function(data){
			if(data.erreur == "ok") {
			}
			else {
			}

		},"json");
	})
});
