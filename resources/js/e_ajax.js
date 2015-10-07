$(document).ready(function() {

	// $('form.addpost_form').on('submit', function(form) {

	// 	$.post(
	// 		'addpost',
	// 		$('form.addpost_form').serialize(),
	// 		function(response) {
	// 			if(response == 'success') {
	// 				$('#title').val('');
	// 				$('#user_post').val('');
	// 				$('#form_messages').html('<p class="success">Posted!</p>');
	// 				$("#post_container").load(location.href + " #post_container");
	// 				setTimeout(function() { $('#form_messages').html(''); }, 3000);
	// 			}else {
	// 				$('#form_messages').html(response);
	// 			}
	// 		}
	// 	);

	// 	form.preventDefault();
	// });


	$('#timein_button').click(function() {
		$.post(
			'attendance/time-in.html',	// form action
			{ timed_in: true },			// data to be sent
			function(result) {			// event on success

				if(result == 'timein') {
					$('#timein').fadeOut(700);
					$('.modal-backdrop').remove();
					$('.round-button').attr('value', 'OUT');
					$('#settingsform h2').html('Are you sure you want time out?');
				}else if(result == 'timeout') {
					$('#timein').fadeOut(700);
					$('.modal-backdrop').remove();
					$('.round-button').attr('value', 'IN');
					$('#settingsform h2').html('Are you sure you want time in?');
				}

			}
		);
	});

});


