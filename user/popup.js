$(document).ready(function(){

	$(".open-login-modal").click(function() {
		console.log("loginmodalopen");
		$("#loginModal").addClass("-opening");
		window.setTimeout(function() {

			$("body").addClass("no-scroll");
			$("#loginModal").addClass("-open");
			$("#loginModal").removeClass("-opening");

		}, 600);

	});

	$(".open-subscribe-modal").click(function() {
		console.log("subscribemodalopen");
		$("#subscribeModal").addClass("-opening");
		window.setTimeout(function() {

			$("body").addClass("no-scroll");
			$("#subscribeModal").addClass("-open");
			$("#subscribeModal").removeClass("-opening");

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
