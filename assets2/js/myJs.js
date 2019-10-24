$(document).ready(function () {
	$('table.status, table.status-admin').DataTable({
		"lengthMenu": [
			[15, 25, 50, 10],
			["15", 25, 50, 10]
		],
		"lengthChange": false,
		stateSave: true
	});



	//fungsi untuk cari data di datatable
	oTable = $('table.status').DataTable();
	tableAdmin = $('table.status-admin').DataTable();
	$('.cariTiket').on("keyup click", function () {
		oTable.search($(this).val()).draw();
		tableAdmin.search($(this).val()).draw();
		//menyimpan keyword cari tiket
		localStorage.setItem("cariTiket", $(this).val());
	});
	//jika keyword cari sudah diketik, maka keyword cari tiket tetap tersimpan walaupun sudah direfresh
	if (localStorage.getItem("cariTiket") != '') {
		$("#cariTiket").val(localStorage.getItem("cariTiket"));
	}

	$("#logout").click(function () {
		localStorage.removeItem("cariTiket");
	})

	// Combobox sort by tiket di dashboard
	$('#statusTiket').change(function () {
		oTable.columns(4).search($(this).val()).draw();
		//meyimpan tulisan dropdown sort by ticket
		localStorage.setItem("statusTiket", $(this).val());
	});

	$('#statusTiketAdmin').change(function () {
		tableAdmin.columns(6).search($(this).val()).draw();
		//meyimpan tulisan dropdown sort by ticket
		localStorage.setItem("statusTiket", $(this).val());
	});

	$('#statusTiketAdminNst').change(function () {
		tableAdmin.columns(7).search($(this).val()).draw();
		//meyimpan tulisan dropdown sort by ticket
		localStorage.setItem("statusTiket", $(this).val());
	});
	//mengambil tulisan dropdown sort by ticket
	var statusTiket = localStorage.getItem("statusTiket");
	if (statusTiket == "Pending") {
		$("#pending").attr("selected", "selected")
	} else if (statusTiket == "Disetujui") {
		$("#approved").attr("selected", "selected")
	} else if (statusTiket == "Ditolak") {
		$("#rejected").attr("selected", "selected")
	} else if (statusTiket == "Selesai") {
		$("#completed").attr("selected", "selected")
	} else if (statusTiket == "") {
		$("#all-tickets").attr("selected", "selected")
	}

	$('#table-user').DataTable();

	$("[id='DataTables_Table_0_filter']").hide();
	$("[id='table-user_filter']").hide();

	//Menyembunyikan tombol submit di halaman tiket yang direject
	// $('#edit_mytalim').hide();
	// $('table').DataTable();
	// Script Halaman Formulir Pendaftaran Tiket My Hajat
	$('.validasi').removeAttr('required');
	$(".card.pertanyaan").hide();
	$('.kategori').click(function () {
		if ($("#renovasi").is(':checked')) {
			$("#submit").attr('name', 'submit_renovasi');
			$("#card-renovasi, .upload").fadeIn();
			$("#card-sewa, #card-franchise, #card-wedding, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_renovasi();
		}
		if ($("#sewa").is(':checked')) {
			$("#submit").attr('name', 'submit_sewa');
			$("#card-sewa, .upload").fadeIn();
			$("#card-renovasi, #card-franchise, #card-wedding, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_sewa();
		}
		if ($("#wedding").is(':checked')) {
			$("#submit").attr('name', 'submit_wedding');
			$("#card-wedding, .upload").fadeIn();
			$("#card-renovasi, #card-sewa, #card-franchise, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_wedding();
		}
		if ($("#franchise").is(':checked')) {
			$("#submit").attr('name', 'submit_franchise');
			$("#card-franchise, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_franchise();
		}
		if ($("#lainnya").is(':checked')) {
			$("#submit").attr('name', 'submit_lainnya');
			$("#card-lainnya, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-bangunan, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_lainnya();
		}

		//// FORM DETAIL KATEGORI MY FAEDAH
		if ($("#bangunan").is(':checked')) {
			$("#submit").attr('name', 'submit_bangunan');
			$("#card-bangunan, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-lainnya, #card-elektronik, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_bangunan();
		}
		if ($("#elektronik").is(':checked')) {
			$("#submit").attr('name', 'submit_elektronik');
			$("#card-elektronik, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-lainnya, #card-bangunan, #card-modal, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_elektronik();
		}
		if ($("#modal").is(':checked')) {
			$("#submit").attr('name', 'submit_modal');
			$("#card-modal, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-lainnya, #card-bangunan, #card-elektronik, #card-qurban, #card-myfaedah-lainnya").fadeOut();
			validate_modal();
		}
		if ($("#qurban").is(':checked')) {
			$("#submit").attr('name', 'submit_qurban');
			$("#card-qurban, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-myfaedah-lainnya").fadeOut();
			validate_qurban();
		}
		if ($("#myfaedah_lainnya").is(':checked')) {
			$("#submit").attr('name', 'submit_myfaedah_lainnya');
			$("#card-myfaedah-lainnya, .upload").fadeIn();
			$("#card-renovasi, #card-wedding, #card-sewa, #card-franchise, #card-lainnya, #card-bangunan, #card-elektronik, #card-modal, #card-qurban").fadeOut();
			validate_myfaedah_lainnya();
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
	$("table").on("click", ".not-clickable", function (e) {
		e.stopPropagation();
	});
	$("table").on('click', '.clickable-row', function () {
		$("tr.clickable-row").not("tr > td.not-clickable").css('cursor', 'pointer');
		window.location = $(this).data("href");
	})

	$("[data-headoffice]").hide();


	// Jika jabatan bukan CMS maka level di set ke head syariah atau manager syariah
	$("#table-user").on('change', '.jabatan', function () {
		// var value = $(".jabatan option:selected").val();
		var value = $(this).val();
		var id_user = $(this).attr('data-jabatan');
		// alert(value + " " + id_user);
		if (value == 'CMS') {
			$("[data-level='" + id_user + "']").val("1");
		} else {
			$("[data-level='" + id_user + "']").val("6");
		}
	});

	$(".form-check-input").on("click, change", function () {
		if ($("#others").is(":checked")) {
			$("#other_jenis_barang_elektronik").removeAttr("disabled").attr("required", "required");
		} else {
			$("#other_jenis_barang_elektronik").attr("disabled", "disabled").removeAttr("required").val("");
		}
	});

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

	// Animasi untuk melihat keterangan waktu di detail tiket
	$('#hide-detail-ticket, .hr').hide();
	$('#id-ticket').click(function () {
		$('#hide-detail-ticket, .hr').slideToggle();
	})

	// button loading input form request support
	$("#submit-produk").on("submit", function () {
		$("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... ');
		$("#submit").css("pointer-events", "none")
	});

	$("#accordion").accordion({
		collapsible: true,
		active: false
	});


	// Script untuk input produk 
	$("#input_produk").change(function () {
		var input = $(this).val();
		// alert(input);
		if (input == "My Ta'lim") {
			$("#card-mytalim, .upload").fadeIn();
			$(".kategori-myhajat, .kategori-myfaedah, #card-kategori-myhajat, #card-kategori-myfaedah, #card-myihram, #card-mysafar, #card-myfaedah, #card-mycars").fadeOut();
			$("#submit").attr('name', 'submit_mytalim');
			$(".kategori").prop("checked", false);
			validate_mytalim();
		} else if (input == "My Hajat") {
			$("#card-kategori-myhajat").fadeIn();
			$(".kategori-myhajat, .kategori-myfaedah, #card-kategori-myfaedah, #card-mytalim, #card-myihram, #card-mysafar, #card-myfaedah, #card-mycars").fadeOut();
			$(".validasi").removeAttr("required");
			$(".kategori").prop("checked", false);
		} else if (input == "My Ihram") {
			$("#card-myihram, .upload").fadeIn();
			$(".kategori-myhajat, .kategori-myfaedah, #card-kategori-myhajat, #card-kategori-myfaedah, #card-mytalim, #card-mysafar, #card-myfaedah, #card-mycars").fadeOut();
			$("#submit").attr('name', 'submit_myihram');
			$(".kategori").prop("checked", false);
			validate_myihram();
		} else if (input == "My Safar") {
			$("#card-mysafar, .upload").fadeIn();
			$(".kategori-myhajat, .kategori-myfaedah, #card-myihram, #card-kategori-myhajat, #card-kategori-myfaedah, #card-mytalim, #card-myfaedah, #card-mycars").fadeOut();
			$("#submit").attr('name', 'submit_mysafar');
			$(".kategori").prop("checked", false);
			validate_mysafar();
		} else if (input == "My Faedah") {
			$("#card-kategori-myfaedah").fadeIn();
			$(".kategori-myhajat, #card-myihram, #card-kategori-myhajat, #card-mytalim, #card-mycars, #card-mysafar").fadeOut();
			$("#submit").attr('name', 'submit_myfaedah');
			$(".validasi").removeAttr("required");
			$(".kategori").prop("checked", false);
		} else if (input == "My Cars") {
			$("#card-mycars, .upload").fadeIn();
			$(".kategori-myhajat, .kategori-myfaedah, #card-myihram, #card-kategori-myhajat, #card-kategori-myfaedah, #card-mytalim, #card-myfaedah, #card-mysafar").fadeOut();
			$("#submit").attr('name', 'submit_mycars');
			$(".kategori").prop("checked", false);
			validate_mycars();
		}

	})




	/////////// Method untuk My Ta'lim 
	function validate_mytalim() {
		$(".validasi").removeAttr("required");
		$(".mytalim-required").attr("required", "required");
	}

	//////////// Method untuk Kategori My Hajat 
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

	function validate_myfaedah() {
		$(".validasi").removeAttr("required");
		$(".myfaedah-required").attr("required", "required");
	}

	function validate_mycars() {
		$(".validasi").removeAttr("required");
		$(".mycars-required").attr("required", "required");
	}

	//////// method untuk kategori My Faedah
	function validate_bangunan() {
		$(".validasi").removeAttr("required");
		$(".bangunan-required").attr("required", "required");
	}

	function validate_elektronik() {
		$(".validasi").removeAttr("required");
		$(".elektronik-required").attr("required", "required");
	}

	function validate_qurban() {
		$(".validasi").removeAttr("required");
		$(".qurban-required").attr("required", "required");
	}

	function validate_modal() {
		$(".validasi").removeAttr("required");
		$(".modal-required").attr("required", "required");
	}

	function validate_myfaedah_lainnya() {
		$(".validasi").removeAttr("required");
		$(".myfaedah-lainnya-required").attr("required", "required");
	}

	$("#pilih-status").change(function () {
		// $("#jumlah-nst").show();
		var val = $(this).val();
		if (val == "NST") {
			$("#jumlah-produk").fadeOut('fast', function () {
				$("#jumlah-nst").fadeIn();
			});
		} else {
			$("#jumlah-nst").fadeOut('fast', function () {
				$("#jumlah-produk").fadeIn();
			});
		}
	})

	$(".stats-carousel").owlCarousel({
		margin: 10,
		items: 1,
		autoplay: true,
		autoplayTimeout: 500,
		autoplayHoverPause: false,
		responsive: {
			0: {
				loop: true,
				items: 1,
				autoWidth: false,
				stagePadding: 30
			},
			600: {
				items: 2,
				autoWidth: false
			},
			1000: {
				loop: false,
				items: 3,
				autoWidth: false
			}
		}
	});

	$(".chart-owl").owlCarousel({
		margin: 10,
		items: 1,
		stagePadding: 30,
		loop: false,
		center: true
	});
})
