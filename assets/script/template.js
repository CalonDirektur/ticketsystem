< script >
	$(document).ready(function () {
		// updating the view with notifications using ajax
		function load_unseen_notification(view = '') {
			$.ajax({
				url: "<?= base_url('fetch_notification/fetch') ?>",
				method: "POST",
				data: {
					view: view
				},
				dataType: "json",
				success: function (data) {
					//ngasih data yang baru disubmit
					$('.dropdown-menu').html(data.notification);
					//ngasih angka notif yang belum dibaca
					if (data.unseen_notification > 0) {
						$('.count').html(data.unseen_notification);
					}
				}
			});
		}
		load_unseen_notification();
		// submit form and get new records
		$('#ticket_form').on('submit', function (event) {
			event.preventDefault();
			if ($('#nama').val() != '' && $('#alamat').val() != '' && $('#hobi').val() != '') {
				var form_data = $(this).serialize();
				$.ajax({
					url: "<?= base_url('Ticket_register/add) ?>",
					method: "POST",
					data: form_data,
					success: function (data) {
						$('#ticket_form')[0].reset();
						load_unseen_notification();
					}
				});
			} else {
				alert("Both Fields are Required");
			}
		});
		// load new notifications
		$(document).on('click', '.dropdown-toggle', function () {
			$('.count').html('');
			load_unseen_notification('yes');
		});
		setInterval(function () {
			load_unseen_notification();;
		}, 5000);
	}); <
<
/script>
