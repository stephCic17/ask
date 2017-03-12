var url="tchat/tchatAjax.php";
var lastid=0;
var timer = setInterval(getMessage,1000);

$(function(){
	$("#tchatForm form").submit(function(){
		var message = $("#tchatForm form textarea").val();
		$.post(url, {action:"addMessage", message:message}, function(data){
			console.log(data.erreur);
			if(data.erreur == "ok"){
				getMessage();
							var x = document.getElementById('tchatF');
			x.scrollTop=x.scrollHeight;
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
			var div = document.getElementById('tchat');
			div.innerHTML = div.innerHTML + data.result;
			var x = document.getElementById('tchatF');
			x.scrollTop=x.scrollHeight;
			//			$("#tchat").append(data.result)
			lastid=data.lastid;
			}
			else{

			}

			
		},"json");
	return false;
}

