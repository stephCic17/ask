var url="tchat/tchatAjax.php";
var url2 = "question/questionAjax.php"
var lastid=0;
var lastidQ=0;
var timer = setInterval(getMessage,1000);

var timer2 = setInterval(getQuestion,1000);

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
	$("#questionForm form").submit(function(){
		var question = $("#questionForm form textarea").val();
		$.post(url2, {action:"addQuestion", question:question}, function(data){
			if(data.erreur == "ok"){

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
			getQuestion();
			//			$("#tchat").append(data.result)
			lastid=data.lastid;
		}
		},"json");
	return false;
}
function getQuestion(){
	$.post(url2, {action:"getQuestions", lastidQ:lastidQ}, function(data){

		if(data.erreur=="ok"){

			reloadDiv(data.div);
			var z = document.getElementById('affQ');
			z.scrollTop=x.scrollHeight;
		}
		},"json");
	return false;
}

function upvote(id){
	$.post(url2, {action:"addUpvote", id:id}, function(data){
		if (data.erreur == "ok"){
			reloadDiv(data.div);
		}
	}, "json");
	return false;
}
function reloadDiv(data){
	document.getElementById('affQ').innerHTML = data;

}
