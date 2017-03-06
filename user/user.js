var url="userAjax.php";

$(function(){
	$("#login form").submit(function(){
		var login = $("#login form input").val();
		$.post(url, {action:"Testlogin", login:login}, function(data){
			alert(data.erreur);
			if(data.erreur == "ok"){
				
			}
			else{
				alert("KO");
			}

		},"json");
	})
});
