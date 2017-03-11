var url="tchatAjax.php";
var lastid=0;
var timer = setInterval(getMessage,5000);

$(function(){
	$("#tchatForm form").submit(function(){
		var message = $("#tchatForm form textarea").val();
		$.post(url, {action:"addMessage", message:message}, function(data){
			console.log(data.erreur);
			if(data.erreur == "ok"){
				getMessage();
				$("#tchatForm form textarea").val("");
			}
			else{
			
			}

		},"json");
		


	})
});

function getMessage(){
	$.post(url, {action:"getMessage", lastid:lastid}, function(data){
		if(data.erreur=="ok"){
			$("#tchat").append(data.result)
			lastid=data.lastid;
			}
			else{

			}

			
		},"json");
	return false;
}

