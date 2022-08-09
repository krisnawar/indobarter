var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

window.setTimeout(function () {
	$(".alert").fadeTo(500, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 3000);

$(function () {
	$('.select2').select2({
		tags: true
	});

	$('#tabel-1').DataTable({
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "Semua"]
		],
		"language": {
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			"paginate": {
				"previous": "Sebelumnya",
				"next": "Selanjutnya"
			},
			"lengthMenu": "Menampilkan _MENU_ entri",
			"search": "Cari",
			"emptyTable": "Tidak ada data di dalam tabel"
		}
	});

	var hash = window.location.hash;
	hash && $('ul.nav a[href="' + hash + '"]').tab('show');

	$('.nav-tabs a').click(function (e) {
		$(this).tab('show');
		var scrollmem = $('body').scrollTop();
		window.location.hash = this.hash;
		$('html,body').scrollTop(scrollmem);
	});

	$('#harga_edit').maskMoney({
		prefix: 'Rp ',
		thousands: '.',
		allowZero: true,
		precision: 0
	});

	$('#harga').maskMoney({
		prefix: 'Rp ',
		thousands: '.',
		allowZero: true,
		precision: 0
	});
});

tinymce.init({
	selector: '#text-editor',
	height: 300,
	plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help',
	toolbar: 'formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat',
	visual_table_class: 'tiny-table',
	fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"
});

function hapus_produk(id) {
	$.ajax({
		url: baseUrl + '/admin/produk/ajaxproduk',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/admin/produk/hapusproduk/' + id;
			});
		}
	});
}

function hapus_paket(id) {
	$.ajax({
		url: baseUrl + '/admin/paket/ajaxpaket',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/admin/paket/hapuspaket/' + id;
			});
		}
	});
}

function hapus_testimoni(id) {
	$.ajax({
		url: baseUrl + '/admin/testimoni/ajaxtestimoni',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus testimoni dari "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/admin/testimoni/hapustestimoni/' + id;
			});
		}
	});
}

function hapus_banner(id) {
	$.ajax({
		url: baseUrl + '/banner/ajaxbanner',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus banner "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/banner/hapusbanner/' + id;
			});
		}
	});
}

function hapus_faq(id) {
	$.ajax({
		url: baseUrl + '/FAQ/ajaxfaq',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus FAQ "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/FAQ/hapusfaq/' + id;
			});
		}
	});
}

function hapus_tim(id) {
	$.ajax({
		url: baseUrl + '/tim/ajaxtim',
		method: 'post',
		data: {
			id: id
		},
		success: function (response) {
			swal({
				title: 'Apakah Anda yakin?',
				text: 'Ingin menghapus anggota tim "' + response + '"',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				closeOnConfirm: false
			}, function () {
				window.location.href = baseUrl + '/tim/hapustim/' + id;
			});
		}
	});
}
