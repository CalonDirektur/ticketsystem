$(document).ready(function () {
	// alert(window.location.hash);
	// $('table.status').DataTable({
	// 	rowReorder: {
	// 		selector: 'td:nth-child(2)'
	// 	},
	// 	fixedHeader: true,
	// 	responsive: true
	// });

	$('table.status').DataTable({
		"lengthMenu": [
			[15, 25, 50, 10],
			["15", 25, 50, 10]
		],
		"lengthChange": false
	});
	//Menyembunyikan tombol submit di halaman tiket yang direject
	// $('#edit_mytalim').hide();
	// $('table').DataTable();
	// Script Halaman Formulir Pendaftaran Tiket My Hajat
	$(".card.pertanyaan").hide();
	$('.kategori').click(function () {
		if ($("#renovasi").is(':checked')) {
			$("#submit").attr('name', 'submit_renovasi')
			$("#card-renovasi, .upload").fadeIn();
			$("#card-sewa, #card-franchise, #card-wedding, #card-lainnya").fadeOut();
			validate_renovasi();
		}
		if ($("#sewa").is(':checked')) {
			$("#submit").attr('name', 'submit_sewa')
			$("#card-sewa, .upload").fadeIn();
			$("#card-renovasi, #card-franchise, #card-wedding, #card-lainnya").fadeOut();
			validate_sewa();
		}
		if ($("#wedding").is(':checked')) {
			$("#submit").attr('name', 'submit_wedding')
			$("#card-wedding, .upload").fadeIn();
			$("#card-renovasi, #card-sewa, #card-franchise, #card-lainnya").fadeOut();
			validate_wedding();
		}
		if ($("#franchise").is(':checked')) {
			$("#submit").attr('name', 'submit_franchise')
			$("#card-franchise, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-lainnya").fadeOut();
			validate_franchise();
		}
		if ($("#lainnya").is(':checked')) {
			$("#submit").attr('name', 'submit_lainnya')
			$("#card-lainnya, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise").fadeOut();
			validate_lainnya();
		}
	})

	//Halaman detail status tiket bagian gambar
	$('.thumb').on('click', function () {
		var gambar = $(this).attr('src');
		// alert(gambar);
		$('#gambar').attr('src', gambar);
		$('#img-link').attr('href', gambar);
	})

	//Halaman detail ticket status, tombol untuk ubah data
	$('#ubah').on('click', function () {
		$('.enable').removeAttr('readonly disabled');
		$('#upload').slideDown('slow');
		$(this).fadeOut();
		$('#selesaikan').fadeOut();
	})

	// Menyembunyiakan div upload dahulu
	$('#more-upload').hide();

	//TOmbol untuk menambah file upload utk halaman input form
	$('#add-upload').click(function () {
		$('#more-upload').slideDown();
		$(this).fadeOut('fast');
	})
	$("tr.clickable-row").not("tr > td.not-clickable").css('cursor', 'pointer');
	$("table").on('click', '.clickable-row', function () {
		$("tr.clickable-row").not("tr > td.not-clickable").css('cursor', 'pointer');
		window.location = $(this).data("href");
	})
	// $(".clickable-row").not("tr td:first-child").click(function () {
	// 	window.location = $(this).data("href");
	// });

	//Script untuk form lead management user, ketika memilih asal leads
	$(".cross-branch-div").hide();
	$(".form-check-input").click(function () {
		if ($("#cross_branch").is(':checked')) {
			$(".cross-branch-div").slideDown();
			$(".cross_branch-required").attr('required', 'required');
		} else {
			$(".cross-branch-div").slideUp();
			$(".cross_branch-required").val("").removeAttr('required');
		}
	})

	//jika card report request support di klik maka akan scroll ke table
	$(".card-pending").click(function () {
		// alert('asd');
		$('html,body').animate({
			scrollTop: $(".pending:first").offset().top - 500
		}, 'medium', function () {
			$(".pending").animate({
				'opacity': '0.3'
			}, 'fast');
			$(".pending").animate({
				'opacity': '1.0'
			}, 'fast');
		});
	});
	$(".card-approved").click(function () {
		$('html,body').animate({
			scrollTop: $(".approved:first").offset().top - 500
		}, 'medium', function () {
			$(".approved").animate({
				'opacity': '0.3'
			}, 'fast');
			$(".approved").animate({
				'opacity': '1.0'
			}, 'fast');
		});
	});
	$(".card-rejected").click(function () {
		$('html,body').animate({
			scrollTop: $(".rejected:first").offset().top - 500
		}, 'medium', function () {
			$(".rejected").animate({
				'opacity': '0.3'
			}, 'fast');
			$(".rejected").animate({
				'opacity': '1.0'
			}, 'fast');
		});
	});
	$(".card-completed").click(function () {
		$('html,body').animate({
			scrollTop: $(".completed:first").offset().top - 500
		}, 'medium', function () {
			$(".completed").animate({
				'opacity': '0.3'
			}, 'fast');
			$(".completed").animate({
				'opacity': '1.0'
			}, 'fast');
		});

	});

	// Script untuk input produk 
	$("#input_produk").change(function () {
		var input = $(this).val();
		// alert(input);
		if (input == "My Ta'lim") {
			$("#card-mytalim, .upload").fadeIn();
			$(".kategori-myhajat, #card-kategori-myhajat, #card-myihram, #card-mysafar").fadeOut();
			$("#submit").attr('name', 'submit_mytalim');
			validate_mytalim();
		} else if (input == "My Hajat") {
			$("#card-kategori-myhajat").fadeIn();
			$(".kategori-myhajat, #card-mytalim, #card-myihram, #card-mysafar").fadeOut();
			$(".validasi").removeAttr("required");
		} else if (input == "My Ihram") {
			$("#card-myihram, .upload").fadeIn();
			$(".kategori-myhajat, #card-kategori-myhajat, #card-mytalim, #card-mysafar").fadeOut();
			$("#submit").attr('name', 'submit_myihram');
			validate_myihram();
		} else if (input == "My Safar") {
			$("#card-mysafar, .upload").fadeIn();
			$(".kategori-myhajat, #card-myihram, #card-kategori-myhajat, #card-mytalim").fadeOut();
			$("#submit").attr('name', 'submit_mysafar');
			validate_mysafar();
		}
	})




	// Method untuk My Ta'lim 
	function validate_mytalim() {
		$(".validasi").removeAttr("required");
		$(".mytalim-required").attr("required", "required");
	}

	// Method untuk Kategori My Hajat 
	function validate_renovasi() {
		$(".validasi").removeAttr("required");
		$(".renovasi-required").attr("required", "required");
	}

	function validate_sewa() {
		$(".validasi").removeAttr("required");
		$(".sewa-required").attr("required", "required");
	}

	function validate_wedding() {
		$(".validasi").removeAttr("required");
		$(".wedding-required").attr("required", "required");
	}

	function validate_franchise() {
		$(".validasi").removeAttr("required");
		$(".franchise-required").attr("required", "required");
	}

	function validate_lainnya() {
		$(".validasi").removeAttr("required");
		$(".lainnya-required").attr("required", "required");
	}


	function validate_myihram() {
		$(".validasi").removeAttr("required");
		$(".myihram-required").attr("required", "required");
	}

	function validate_mysafar() {
		$(".validasi").removeAttr("required");
		$(".mysafar-required").attr("required", "required");
	}
})
