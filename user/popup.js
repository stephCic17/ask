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
