var url="question/questionAjax.php";

function upvote(id){
	$.post(url, {action:"addUpvote", id:id}, function(data){
		if (data.erreur == "ok"){
			reloadDiv(data.div);
		}
	}, "json");
	return false;
	alert("toto");
}
function reloadDiv(data){
	document.getElementById('affQ').innerHTML = data;

}
