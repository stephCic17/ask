var url="question/questionAjax.php";

function upvote(id){
	$.post(url, {action:"addUpvote", id:id}, function(data){
		if (data.erreur == "ok"){
			console.log(data.up);
			reloadDiv(data.div);
		}
	}, "json");
	return false;
}

function reloadDiv(data){
	document.getElementById('affQ').innerHTML = data;

}
