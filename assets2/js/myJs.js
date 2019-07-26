$(document).ready(function () {
	// alert(window.location.hash);
	$('table.status').DataTable({
		rowReorder: {
			selector: 'td:nth-child(2)'
		},
		responsive: true
	});
	//Menyembunyikan tombol submit di halaman tiket yang direject
	// $('#edit_mytalim').hide();
	// $('table').DataTable();
	// Script Halaman Formulir Pendaftaran Tiket My Hajat
	$(".card.pertanyaan").hide();
	$('.kategori').click(function () {
		if ($("#renovasi").is(':checked')) {
			$("#card-renovasi").fadeIn();
			$("#card-sewa, #card-franchise, #card-wedding, #card-lainnya").fadeOut();
		}
		if ($("#sewa").is(':checked')) {
			$("#card-sewa").fadeIn();
			$("#card-renovasi, #card-franchise, #card-wedding, #card-lainnya").fadeOut();
		}
		if ($("#wedding").is(':checked')) {
			$("#card-wedding").fadeIn();
			$("#card-renovasi, #card-sewa, #card-franchise, #card-lainnya").fadeOut();
		}
		if ($("#franchise").is(':checked')) {
			$("#card-franchise").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-lainnya").fadeOut();
		}
		if ($("#lainnya").is(':checked')) {
			$("#card-lainnya").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise").fadeOut();
		}
	})

	//Halaman detail status tiket bagian gambar
	$('.thumb').on('click', function () {
		var gambar = $(this).attr('src');
		// alert(gambar);
		$('#gambar').attr('src', gambar);
	})

	//Halaman detail ticket status, tombol untuk ubah data
	$('#ubah').on('click', function () {
		$('.enable').removeAttr('readonly disabled');
		$(this).fadeOut();
	})

	var i = 1;
	var field = 1;
	//Script untuk menambah input upload file
	// $('#add-input').on('click', function () {
	// 	if (i == 1) {
	// 		$('.btn_remove').hide()
	// 	}
	// 	i++;
	// 	$('#dynamic-input').append('<div id="row' + i + '">' +
	// 		'<label for="upload_file' + i + '">Upload File </label>' +
	// 		'<div class="input-group">' +
	// 		'<input name="upload_file[' + i + ']" id="upload_file' + i + '" type="file" class="form-control col-8">' +
	// 		'<span class="input-group-btn">' +
	// 		'</span>' +
	// 		'</div>' +
	// 		'</div>'
	// 	);
	// })

	// //script untuk menghapus input upload file
	// $('#dynamic-input').on('click', '.btn_remove', function () {
	// 	var button_id = $(this).attr("data");
	// 	$('#row' + button_id + '').remove();
	// })
})
