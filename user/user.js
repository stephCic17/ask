var url="userAjax.php";

$(function(){
	$("#UserForm form").submit(function(){
		var login = $("#UserForm form input").val();
		$.post(url, {action:"TestPseudo", login:login}, function(data){
			if(data.erreur == "ok"){
				alert("ok");
			}
			else{
				alert("KO");
			}

		},"json");
		


	})
});

