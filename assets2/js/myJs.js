$(document).ready(function () {
	//Menyembunyikan tombol submit di halaman tiket yang direject
	// $('#edit_mytalim').hide();

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

})
