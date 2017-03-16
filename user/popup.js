// var popupActive = 0;
//
// function loadConnect(){
// 	if (popupActive == 0){
// 		$('.popupConnect').fadeIn('slow');
// 		popupActive = 1;
// 	}
// }
// function loadInscription(){
// 	if (popupActive == 0){
// 		$('.popupInscription').fadeIn('slow');
// 		popupActive = 1;
// 	}
// }
//
// function closeInscription(){
// 	$('.popupInscription').fadeOut('slow');
// 		popupActive = 0;
// }
// function closeConnect(){
// 	$('.popupConnect').fadeOut('slow');
// 		popupActive = 0;
// }
//

$(".open-login-modal").click(function() {
	$("#loginModal").addClass("-opening");
	window.setTimeout(function() {
		$("body").addClass("no-scroll");
		$("#loginModal").addClass("-open");
		$("#loginModal").removeClass("-opening");
	}, 600);
});
$(".open-subscribe-modal").click(function() {
	$("#subscribeModal").addClass("-opening");
	window.setTimeout(function() {
		$("body").addClass("no-scroll");
		$("#subscribeModal").addClass("-open");
		$("#subscribeModal").removeClass("-opening");
	}, 600);
});
$(".close-modal").click(function() {
	$(".modal").addClass("-closing");
	window.setTimeout(function() {
		$(".modal").removeClass("-open");
		$(".modal").removeClass("-closing");
		$("body").removeClass("no-scroll");
	}, 350);
});
