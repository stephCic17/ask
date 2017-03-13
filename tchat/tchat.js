var url="tchat/tchatAjax.php";
var url2 = "question/questionAjax.php"
var popupActive = 0;
var url3="../user/userAjax.php";
var timer2 = setInterval(interval,1000);
var lastid=0;
var lastidQ=0;

$(function(){
	$("#tchatForm form").submit(function(){
		var message = $("#tchatForm form textarea").val();
		$.post(url, {action:"addMessage", message:message}, function(data){
			if(data.erreur == "ok"){
				getMessage();
			}
			else{	
			}
		},"json");
	})
	$("#questionForm form").submit(function(){
		var question = $("#questionForm form textarea").val();
		$.post(url2, {action:"addQuestion", question:question}, function(data){
			if(data.erreur == "ok"){
				getQuestion();
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

function interval(){
	getMessage();
	getQuestion();
}

function getMessage(){
	$.post(url, {action:"getMessage", lastid:lastid}, function(data){
		if(data.erreur=="ok"){
			alert(toto);
			reloadDivTchat(data.result);
		}
	},"json");
}

function loadConnect(){
	if (popupActive == 0){
		$('.popupConnect').fadeIn('slow');
		$('.row').fadeOut('slow');
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
function reloadDivTchat(data){
	document.getElementById('tchat').innerHTML = data;

}
