var url="tchat/tchatAjax.php";
var url2 = "question/questionAjax.php"
var popupActive = 0;
var url3="../user/userAjax.php";
var lastid=0;
var lastidQ=0;
var timer = setInterval(getMessage,1000);
var timer2 = setInterval(getQuestion,1000);

$(function(){
	$("#tchatForm form").submit(function(){
		var message = $("#tchatForm form textarea").val();
		$.post(url, {action:"addMessage", message:message}, function(data){
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
	$("#UserForm form").submit(function(){
		var login = $("#UserForm form input").val();
		$.post(url3, {action:"TestPseudo", login:login}, function(data){
			if(data.erreur == "ok"){
			}
			else{
			}
		},"json");
	})
});


function loadConnect(){
	if (popupActive == 0){
		$('.popupConnect').fadeIn('slow');
		popupActive = 1;
	}
}
function loadInscription(){
	if (popupActive == 0){
		$('.popupInscription').fadeIn('slow');
		
		popupActive = 1;
	}
}

function closeInscription(){
	$('.popupInscription').fadeOut('slow');
	popupActive = 0;
}
function closeConnect(){
	$('.popupConnect').fadeOut('slow');
	popupActive = 0;
}
function getMessage(){
	$.post(url, {action:"getMessage", lastid:lastid}, function(data){
		if(data.erreur=="ok"){
			var div = document.getElementById('tchat');
			div.innerHTML = div.innerHTML + data.result;
			var x = document.getElementById('tchatF');
			x.scrollTop=x.scrollHeight;
			getQuestion();
					$("#tchat").append(data.result)
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
			z.scrollTop=z.scrollHeight;
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
