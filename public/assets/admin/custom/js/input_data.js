$(document).ready(function(){
	if($("#insert-data").length >= 1){
		get_kelurahan();
		get_perkebunan();
		get_pertanian();
		get_tanaman_pangan();
		get_tanaman_obat();
		get_kehutanan();
		get_ternak();
		get_perikanan();
		get_perikanan_tangkap();
	}

	$(".kecamatan-mdw").on("change",function(){
		get_kelurahan();
	});

	function get_kelurahan(){
		var kecamatan_id = $(".kecamatan-mdw").find(":selected").attr("value");
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		console.log(data);

		$.post(config_url + "panel/address/json/get-subdistrict/"+kecamatan_id,data,function(rd){
			var text = "";
			for(var i=0;i<rd.length;i++){
				text += "<option value="+rd[i]['id_kelurahan']+">"+rd[i]['nama_kelurahan']+"</option>";
			}

			$(".kelurahan-mdw").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	$(".submit-form").on("click",function(){
		$("#submit-form-id").submit();
	})

	$(".tambah-baris-perkebunan").on("click",function(e){
		get_perkebunan();
	})

	$(".tambah-baris-kehutanan").on("click",function(e){
		get_kehutanan();
	})

	$(".tambah-baris-pertanian").on("click",function(e){
		get_pertanian();
	})

	$(".tambah-baris-tanaman-obat").on("click",function(e){
		get_tanaman_obat();
	})

	$(".tambah-baris-tanaman-pangan").on("click",function(e){
		get_tanaman_pangan();
	})

	$(".tambah-baris-perikanan").on("click",function(e){
		get_perikanan();
	})

	$(".tambah-baris-ternak").on("click",function(e){
		get_ternak();
	})

	$(".tambah-baris-perikanan-tangkap").on("click",function(e){
		get_perikanan_tangkap();
	})

	function get_perkebunan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/plant/json/get-farm",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_perkebunan[]'>";
			for(var y=0;y<rd['kebun'].length ; y++){
				teks_1 += "<option value="+rd['kebun'][y]['komoditas_perkebunan_id']+">"+rd['kebun'][y]['nama_komoditas_perkebunan']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_lahan_perkebunan[]'>";
			for(var y=0;y<rd['luas_lahan'].length ; y++){
				teks_2 += "<option value="+rd['luas_lahan'][y]['luas_lahan_id']+">"+rd['luas_lahan'][y]['nama_luas_lahan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='produksi_perkebunan[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_3 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_pemasaran_perkebunan[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_4 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_4 += "</select></td>";


			var teks_45 = "<td><select class='form-control' name='pohon_perkebunan[]'>";
			for(var y=0;y<rd['pohon'].length ; y++){
				teks_45 += "<option value="+rd['pohon'][y]['jumlah_pohon_id']+">"+rd['pohon'][y]['nama_jumlah_pohon']+"</option>";
			}
			teks_45 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_perkebunan[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='pestisida_perkebunan[]'>";
			for(var y=0;y<rd['pestisida'].length ; y++){
				teks_6 += "<option value="+rd['pestisida'][y]['pestisida_id']+">"+rd['pestisida'][y]['nama_pestisida']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pupuk_organik_perkebunan[]'>";
			for(var y=0;y<rd['pupuk_organik'].length ; y++){
				teks_7 += "<option value="+rd['pupuk_organik'][y]['pupuk_organik_id']+">"+rd['pupuk_organik'][y]['nama_pupuk_organik']+"</option>";
			}
			teks_7 += "</select></td>";

			var teks_8 = "<td><select class='form-control' name='pupuk_pabrik_perkebunan[]'>";
			for(var y=0;y<rd['pupuk_pabrik'].length ; y++){
				teks_8 += "<option value="+rd['pupuk_pabrik'][y]['pupuk_pabrik_id']+">"+rd['pupuk_pabrik'][y]['nama_pupuk_pabrik']+"</option>";
			}
			teks_8 += "</select></td>";

			teks_9 = "<td><textarea class='form-control' name='lokasi_lahan_perkebunan[]'></textarea></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_45 + teks_5 + teks_6 + teks_7 + teks_8 + teks_9 + "</tr>";

			$(".komoditas-perkebunan-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_pertanian(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/plant/json/get-agriculture",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_buah_buahan[]'>";
			for(var y=0;y<rd['tani'].length ; y++){
				teks_1 += "<option value="+rd['tani'][y]['komoditas_buah_buahan_id']+">"+rd['tani'][y]['nama_komoditas_buah_buahan']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_lahan_buah_buahan[]'>";
			for(var y=0;y<rd['luas_lahan'].length ; y++){
				teks_2 += "<option value="+rd['luas_lahan'][y]['luas_lahan_id']+">"+rd['luas_lahan'][y]['nama_luas_lahan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='produksi_buah_buahan[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_3 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_pemasaran_buah_buahan[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_4 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_45 = "<td><select class='form-control' name='pohon_buah_buahan[]'>";
			for(var y=0;y<rd['pohon'].length ; y++){
				teks_45 += "<option value="+rd['pohon'][y]['jumlah_pohon_id']+">"+rd['pohon'][y]['nama_jumlah_pohon']+"</option>";
			}
			teks_45 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_buah_buahan[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='pestisida_buah_buahan[]'>";
			for(var y=0;y<rd['pestisida'].length ; y++){
				teks_6 += "<option value="+rd['pestisida'][y]['pestisida_id']+">"+rd['pestisida'][y]['nama_pestisida']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pupuk_organik_buah_buahan[]'>";
			for(var y=0;y<rd['pupuk_organik'].length ; y++){
				teks_7 += "<option value="+rd['pupuk_organik'][y]['pupuk_organik_id']+">"+rd['pupuk_organik'][y]['nama_pupuk_organik']+"</option>";
			}
			teks_7 += "</select></td>";

			var teks_8 = "<td><select class='form-control' name='pupuk_pabrik_buah_buahan[]'>";
			for(var y=0;y<rd['pupuk_pabrik'].length ; y++){
				teks_8 += "<option value="+rd['pupuk_pabrik'][y]['pupuk_pabrik_id']+">"+rd['pupuk_pabrik'][y]['nama_pupuk_pabrik']+"</option>";
			}
			teks_8 += "</select></td>";

			teks_9 = "<td><textarea class='form-control' name='lokasi_lahan_buah_buahan[]'></textarea></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_45 + teks_5 + teks_6 + teks_7 + teks_8 + teks_9 + "</tr>";

			$(".komoditas-pertanian-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_tanaman_pangan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/plant/json/get-food",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_tanaman_pangan[]'>";
			for(var y=0;y<rd['pangan'].length ; y++){
				teks_1 += "<option value="+rd['pangan'][y]['komoditas_tanaman_pangan_id']+">"+rd['pangan'][y]['nama_komoditas_tanaman_pangan']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_lahan_tanaman_pangan[]'>";
			for(var y=0;y<rd['luas_lahan'].length ; y++){
				teks_2 += "<option value="+rd['luas_lahan'][y]['luas_lahan_id']+">"+rd['luas_lahan'][y]['nama_luas_lahan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='produksi_tanaman_pangan[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_3 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_pemasaran_tanaman_pangan[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_4 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_45 = "<td><select class='form-control' name='pohon_tanaman_pangan[]'>";
			for(var y=0;y<rd['pohon'].length ; y++){
				teks_45 += "<option value="+rd['pohon'][y]['jumlah_pohon_id']+">"+rd['pohon'][y]['nama_jumlah_pohon']+"</option>";
			}
			teks_45 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_tanaman_pangan[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='pestisida_tanaman_pangan[]'>";
			for(var y=0;y<rd['pestisida'].length ; y++){
				teks_6 += "<option value="+rd['pestisida'][y]['pestisida_id']+">"+rd['pestisida'][y]['nama_pestisida']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pupuk_organik_tanaman_pangan[]'>";
			for(var y=0;y<rd['pupuk_organik'].length ; y++){
				teks_7 += "<option value="+rd['pupuk_organik'][y]['pupuk_organik_id']+">"+rd['pupuk_organik'][y]['nama_pupuk_organik']+"</option>";
			}
			teks_7 += "</select></td>";

			var teks_8 = "<td><select class='form-control' name='pupuk_pabrik_tanaman_pangan[]'>";
			for(var y=0;y<rd['pupuk_pabrik'].length ; y++){
				teks_8 += "<option value="+rd['pupuk_pabrik'][y]['pupuk_pabrik_id']+">"+rd['pupuk_pabrik'][y]['nama_pupuk_pabrik']+"</option>";
			}
			teks_8 += "</select></td>";

			teks_9 = "<td><textarea class='form-control' name='lokasi_lahan_tanaman_pangan[]'></textarea></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_45 + teks_5 + teks_6 + teks_7 + teks_8 + teks_9 + "</tr>";

			$(".komoditas-tanaman-pangan-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_tanaman_obat(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/plant/json/get-medicine",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_tanaman_obat[]'>";
			for(var y=0;y<rd['obat'].length ; y++){
				teks_1 += "<option value="+rd['obat'][y]['komoditas_tanaman_obat_id']+">"+rd['obat'][y]['nama_komoditas_tanaman_obat']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_lahan_tanaman_obat[]'>";
			for(var y=0;y<rd['luas_lahan'].length ; y++){
				teks_2 += "<option value="+rd['luas_lahan'][y]['luas_lahan_id']+">"+rd['luas_lahan'][y]['nama_luas_lahan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='produksi_tanaman_obat[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_3 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_pemasaran_tanaman_obat[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_4 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_45 = "<td><select class='form-control' name='pohon_tanaman_obat[]'>";
			for(var y=0;y<rd['pohon'].length ; y++){
				teks_45 += "<option value="+rd['pohon'][y]['jumlah_pohon_id']+">"+rd['pohon'][y]['nama_jumlah_pohon']+"</option>";
			}
			teks_45 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_tanaman_obat[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='pestisida_tanaman_obat[]'>";
			for(var y=0;y<rd['pestisida'].length ; y++){
				teks_6 += "<option value="+rd['pestisida'][y]['pestisida_id']+">"+rd['pestisida'][y]['nama_pestisida']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pupuk_organik_tanaman_obat[]'>";
			for(var y=0;y<rd['pupuk_organik'].length ; y++){
				teks_7 += "<option value="+rd['pupuk_organik'][y]['pupuk_organik_id']+">"+rd['pupuk_organik'][y]['nama_pupuk_organik']+"</option>";
			}
			teks_7 += "</select></td>";

			var teks_8 = "<td><select class='form-control' name='pupuk_pabrik_tanaman_obat[]'>";
			for(var y=0;y<rd['pupuk_pabrik'].length ; y++){
				teks_8 += "<option value="+rd['pupuk_pabrik'][y]['pupuk_pabrik_id']+">"+rd['pupuk_pabrik'][y]['nama_pupuk_pabrik']+"</option>";
			}
			teks_8 += "</select></td>";

			teks_9 = "<td><textarea class='form-control' name='lokasi_lahan_tanaman_obat[]'></textarea></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_45 + teks_5 + teks_6 + teks_7 + teks_8 + teks_9 + "</tr>";

			$(".komoditas-tanaman-obat-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_kehutanan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/plant/json/get-forestry",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_kehutanan[]'>";
			for(var y=0;y<rd['hutan'].length ; y++){
				teks_1 += "<option value="+rd['hutan'][y]['komoditas_kehutanan_id']+">"+rd['hutan'][y]['nama_komoditas_kehutanan']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_lahan_kehutanan[]'>";
			for(var y=0;y<rd['luas_lahan'].length ; y++){
				teks_2 += "<option value="+rd['luas_lahan'][y]['luas_lahan_id']+">"+rd['luas_lahan'][y]['nama_luas_lahan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='produksi_kehutanan[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_3 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_pemasaran_kehutanan[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_4 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_45 = "<td><select class='form-control' name='pohon_kehutanan[]'>";
			for(var y=0;y<rd['pohon'].length ; y++){
				teks_45 += "<option value="+rd['pohon'][y]['jumlah_pohon_id']+">"+rd['pohon'][y]['nama_jumlah_pohon']+"</option>";
			}
			teks_45 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_kehutanan[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='pestisida_kehutanan[]'>";
			for(var y=0;y<rd['pestisida'].length ; y++){
				teks_6 += "<option value="+rd['pestisida'][y]['pestisida_id']+">"+rd['pestisida'][y]['nama_pestisida']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pupuk_organik_kehutanan[]'>";
			for(var y=0;y<rd['pupuk_organik'].length ; y++){
				teks_7 += "<option value="+rd['pupuk_organik'][y]['pupuk_organik_id']+">"+rd['pupuk_organik'][y]['nama_pupuk_organik']+"</option>";
			}
			teks_7 += "</select></td>";

			var teks_8 = "<td><select class='form-control' name='pupuk_pabrik_kehutanan[]'>";
			for(var y=0;y<rd['pupuk_pabrik'].length ; y++){
				teks_8 += "<option value="+rd['pupuk_pabrik'][y]['pupuk_pabrik_id']+">"+rd['pupuk_pabrik'][y]['nama_pupuk_pabrik']+"</option>";
			}
			teks_8 += "</select></td>";

			teks_9 = "<td><textarea class='form-control' name='lokasi_lahan_kehutanan[]'></textarea></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_5 + teks_45 + teks_6 + teks_7 + teks_8 + teks_9 + "</tr>";

			$(".komoditas-kehutanan-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_ternak(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/animal/json/get-livestock",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_ternak[]'>";
			for(var y=0;y<rd['ternak'].length ; y++){
				teks_1 += "<option value="+rd['ternak'][y]['komoditas_ternak_id']+">"+rd['ternak'][y]['nama_komoditas_ternak']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_kandang_ternak[]'>";
			for(var y=0;y<rd['luas_kandang'].length ; y++){
				teks_2 += "<option value="+rd['luas_kandang'][y]['luas_kandang_id']+">"+rd['luas_kandang'][y]['nama_luas_kandang']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='jumlah_ekor_ternak[]'>";
			for(var y=0;y<rd['jumlah_ekor'].length ; y++){
				teks_3 += "<option value="+rd['jumlah_ekor'][y]['jumlah_ekor_id']+">"+rd['jumlah_ekor'][y]['nama_jumlah_ekor']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='hasil_ternak[]'>";
			for(var y=0;y<rd['hasil_ternak'].length ; y++){
				teks_4 += "<option value="+rd['hasil_ternak'][y]['jenis_komoditas_hasil_ternak_id']+">"+rd['hasil_ternak'][y]['nama_jenis_komoditas_hasil_ternak']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='produksi_ternak[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_5 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='hasil_pemasaran_ternak[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_6 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='jenis_pakan_ternak[]'>";
			for(var y=0;y<rd['jenis_pakan_ternak'].length ; y++){
				teks_7 += "<option value="+rd['jenis_pakan_ternak'][y]['jenis_pakan_ternak_id']+">"+rd['jenis_pakan_ternak'][y]['nama_jenis_pakan_ternak']+"</option>";
			}
			teks_7 += "</select></td>";

			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_5 + teks_6 + teks_7 + "</tr>";

			$(".komoditas-ternak-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_perikanan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/animal/json/get-fishery",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='komoditas_perikanan[]'>";
			for(var y=0;y<rd['ikan'].length ; y++){
				teks_1 += "<option value="+rd['ikan'][y]['komoditas_ikan_id']+">"+rd['ikan'][y]['nama_komoditas_ikan']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='luas_panen_ikan[]'>";
			for(var y=0;y<rd['luas_ikan'].length ; y++){
				teks_2 += "<option value="+rd['luas_ikan'][y]['luas_panen_ikan_id']+">"+rd['luas_ikan'][y]['nama_luas_panen_ikan']+"</option>";
			}
			teks_2 += "</select></td>";

			var teks_3 = "<td><select class='form-control' name='jumlah_ekor_ikan[]'>";
			for(var y=0;y<rd['jumlah_ekor'].length ; y++){
				teks_3 += "<option value="+rd['jumlah_ekor'][y]['jumlah_ekor_ikan_id']+">"+rd['jumlah_ekor'][y]['nama_jumlah_ekor_ikan']+"</option>";
			}
			teks_3 += "</select></td>";

			var teks_4 = "<td><select class='form-control' name='produksi_ikan[]'>";
			for(var y=0;y<rd['produksi'].length ; y++){
				teks_4 += "<option value="+rd['produksi'][y]['jumlah_produksi_id']+">"+rd['produksi'][y]['nama_jumlah_produksi']+"</option>";
			}
			teks_4 += "</select></td>";

			var teks_5 = "<td><select class='form-control' name='bibit_ikan[]'>";
			for(var y=0;y<rd['bibit'].length ; y++){
				teks_5 += "<option value="+rd['bibit'][y]['jenis_bibit_id']+">"+rd['bibit'][y]['nama_jenis_bibit']+"</option>";
			}
			teks_5 += "</select></td>";

			var teks_6 = "<td><select class='form-control' name='hasil_pemasaran_ikan[]'>";
			for(var y=0;y<rd['hasil_pemasaran'].length ; y++){
				teks_6 += "<option value="+rd['hasil_pemasaran'][y]['hasil_pemasaran_id']+">"+rd['hasil_pemasaran'][y]['nama_hasil_pemasaran']+"</option>";
			}
			teks_6 += "</select></td>";

			var teks_7 = "<td><select class='form-control' name='pakan_ikan[]'>";
			for(var y=0;y<rd['pakan_ikan'].length ; y++){
				teks_7 += "<option value="+rd['pakan_ikan'][y]['jenis_pakan_ternak_id']+">"+rd['pakan_ikan'][y]['nama_jenis_pakan_ternak']+"</option>";
			}
			teks_7 += "</select></td>";


			teks_total = teks_tr + teks_1 + teks_2 + teks_3 + teks_4 + teks_5 + teks_6 + teks_7 + "</tr>";

			$(".komoditas-perikanan-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	function get_perikanan_tangkap(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/animal/json/get-fishery-catch",data,function(rd){
			teks_tr = "<tr>";

			var teks_1 = "<td><select class='form-control' name='alat_tangkap[]'>";
			for(var y=0;y<rd['alat_tangkap'].length ; y++){
				teks_1 += "<option value="+rd['alat_tangkap'][y]['alat_tangkap_id']+">"+rd['alat_tangkap'][y]['nama_alat_tangkap']+"</option>";
			}
			teks_1 += "</select></td>";

			var teks_2 = "<td><select class='form-control' name='jumlah_unit_alat_tangkap[]'>";
			for(var y=0;y<rd['jumlah_unit'].length ; y++){
				teks_2 += "<option value="+rd['jumlah_unit'][y]['jumlah_unit_alat_tangkap_id']+">"+rd['jumlah_unit'][y]['nama_jumlah_unit_alat_tangkap']+"</option>";
			}
			teks_2 += "</select></td>";


			teks_total = teks_tr + teks_1 + teks_2 + "</tr>";

			$(".komoditas-perikanan-tangkap-table tbody").append(teks_total);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}
});