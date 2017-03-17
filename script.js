var url="tchat/tchatAjax.php";
var url2 = "question/questionAjax.php"
var popupActive = 0;
var url3="user/userAjax.php";
//var timer2 = setInterval(interval,2000);
var lastid=0;
var lastidQ=0;

$(function(){
	$("#tchatForm form").submit(function(){
		var message = $("#tchatForm form input").val();
		var x = document.getElementById('tchat');
		x.scrollTop = x.scrollHeight;
		var y= document.getElementByClass('tchatArea');
			y.focus();
		$.post(url, {action:"addMessage", message:message}, function(data){
			if(data.erreur == "ok"){

			}
			else{
			}
		},"json");
	})
	$("#questionForm form").submit(function(){
		var question = $("#questionForm form textarea").val();
		var z = document.getElementById('affQ');
		z.scrollTop=z.scrollHeight;
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

function interval(){
	getMessage();
	getQuestion();
}

function getMessage(){
	$.post(url, {action:"getMessage", lastid:lastid}, function(data){
		if(data.erreur=="ok"){
			reloadDivTchat(data.result);
		}
	},"json");
}

$(document).ready(function(){

	$(".open-login-modal").click(function(event) {
		event.preventDefault();
		console.log("loginmodalopen");
		$("#loginModal").addClass("-opening");
		window.setTimeout(function() {

			$("body").addClass("no-scroll");
			$("#loginModal").addClass("-open");
			$("#loginModal").removeClass("-opening");

		}, 600);

	});

	$(".open-subscribe-modal").click(function(event) {
		event.preventDefault();
		console.log("subscribemodalopen");
		$("#subscribeModal").addClass("-opening");
		window.setTimeout(function() {

			$("body").addClass("no-scroll");
			$("#subscribeModal").addClass("-open");
			$("#subscribeModal").removeClass("-opening");

		}, 600);

	});

	$(".open-lostpassword-modal").click(function(event) {
		event.preventDefault();
		console.log("lostpasswordmodalopen");
		$("#lostPassordModal").addClass("-opening");
		window.setTimeout(function() {

			$("body").addClass("no-scroll");
			$("#lostPassordModal").addClass("-open");
			$("#lostPassordModal").removeClass("-opening");

		}, 600);

	});

	$(".close-modal").click(function() {
		console.log("close");
		$(".modal").addClass("-closing");
		window.setTimeout(function() {

			$(".modal").removeClass("-open");
			$(".modal").removeClass("-closing");
			$("body").removeClass("no-scroll");

		}, 350);

	});

});


function getQuestion(){
	$.post(url2, {action:"getQuestions", lastidQ:lastidQ}, function(data){

		if(data.erreur=="ok"){
			reloadDiv(data.div);
		}
		},"json");
	return false;
}

function upvote(id){
	$.post(url2, {action:"addUpvote", id:id}, function(data){
		if (data.erreur == "ok"){

			console.log(data.up);
			reloadDiv(data.div);
		}
		else if (data.erreur == "id")
		{
				if (popupActive == 0){
		$('.row').fadeOut();
		$('.popupInscription').fadeIn();

		popupActive = 1;
	}
		}
		else{
			alert("Vous avez déjà voté pour cette question");
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
