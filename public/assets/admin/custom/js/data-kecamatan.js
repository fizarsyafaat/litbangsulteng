$(document).ready(function(){



	kk_kecamatan();
	kk_kelurahan();


	function kk_kecamatan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/general/json/get-main-kk-kecamatan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd.length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd[i]['total_kk']);
				tick.push(i,rd[i]['title']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

		    $.plot("#bar-chart", [bar_data], {
		        grid: {
		            borderWidth: 1,
		            borderColor: "#f3f3f3",
		            tickColor: "#f3f3f3",
		            hoverable: true,
		            clickable: true,
		        },
		        series: {
		            bars: {
		                show: true,
		                barWidth: 0.5,
		                align: "center",
		            },
		        },
	            valueLabels: {
	                show: true
	            },
		        colors: ["#3c8dbc"],
		        xaxis: {
		            ticks: ticks_ar,
		        },
		    });

		    //for ext
		    var text = "";
		    for(var is=0;is<rd.length;is++){
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rd[is]['title']+"</td><td>"+rd[is]['total_kk']+"</td></tr>";
			}

		    $("#jumlah-kk-kecamatan tbody").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
			
		});

		var previousPoint = null,
	    	previousLabel = null;

		function showTooltip(x, y, color, contents) {
		    $('<div id="tooltip">' + contents + '</div>').css({
		        position: 'absolute',
		        display: 'none',
		        top: y - 40,
		        left: x - 120,
		        border: '2px solid ' + color,
		        padding: '3px',
		            'font-size': '12px',
		            'border-radius': '5px',
		            'background-color': '#fff',
		            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
		        opacity: 0.9
		    }).appendTo("body").fadeIn(200);
		}

		$("#bar-chart").on("plothover", function (event, pos, item) {
		    if (item) {
		        if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
		            previousPoint = item.dataIndex;
		            previousLabel = item.series.label;
		            $("#tooltip").remove();

		            var x = item.datapoint[0];
		            var y = item.datapoint[1];

		            var color = item.series.color;

		            //console.log(item.series.xaxis.ticks[x].label);               

		            showTooltip(item.pageX,
		            item.pageY,
		            color,
		                "<strong>Jumlah KK</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong>");
		        }
		    } else {
		        $("#tooltip").remove();
		        previousPoint = null;
		    }
		});
	}

	function kk_kelurahan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/general/json/get-main-kk-kelurahan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			//sortir data
			rd.sort(function(a, b) {
			    return parseInt(b['total_kk']) - parseInt(a['total_kk']);
			});

			for(var i=0;i<12;i++){
				ar = [];
				tick = [];
				ar.push(i,rd[i]['total_kk']);
				tick.push(i,rd[i]['title']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			var total_kk_lainnya = 0;

			for(var i=12;i<rd.length;i++){
				total_kk_lainnya += rd[i]['total_kk']
			}

			ar = [];
			tick = [];
			ar.push(12,total_kk_lainnya);
			tick.push(12,"Lainnya");

			ticks_ar.push(tick);
			bar_data.data.push(ar);


		    $.plot("#bar-chart-kelurahan", [bar_data], {
		        grid: {
		            borderWidth: 1,
		            borderColor: "#f3f3f3",
		            tickColor: "#f3f3f3",
		            hoverable: true,
		            clickable: true,
		        },
		        series: {
		            bars: {
		                show: true,
		                barWidth: 0.5,
		                align: "center",
		            },
		        },
	            valueLabels: {
	                show: true
	            },
		        colors: ["#3c8dbc"],
		        xaxis: {
		            ticks: ticks_ar,
		        },
		    });

		    //for ext
		    var text = "";
		    for(var is=0;is<rd.length;is++){
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rd[is]['title']+"</td><td><a class='get-data-kelurahan' href='#' data-id='"+rd[is]['id_kelurahan']+"'>"+rd[is]['total_kk']+"</a></td></tr>";
			}

		    $("#jumlah-kk-kelurahan tbody").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
		
		});

		var previousPoint = null,
	    	previousLabel = null;

		function showTooltip(x, y, color, contents) {
		    $('<div id="tooltip">' + contents + '</div>').css({
		        position: 'absolute',
		        display: 'none',
		        top: y - 40,
		        left: x - 120,
		        border: '2px solid ' + color,
		        padding: '3px',
		            'font-size': '12px',
		            'border-radius': '5px',
		            'background-color': '#fff',
		            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
		        opacity: 0.9
		    }).appendTo("body").fadeIn(200);
		}

		$("#bar-chart-kelurahan").on("plothover", function (event, pos, item) {
		    if (item) {
		        if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
		            previousPoint = item.dataIndex;
		            previousLabel = item.series.label;
		            $("#tooltip").remove();

		            var x = item.datapoint[0];
		            var y = item.datapoint[1];

		            var color = item.series.color;

		            //console.log(item.series.xaxis.ticks[x].label);               

		            showTooltip(item.pageX,
		            item.pageY,
		            color,
		                "<strong>Jumlah KK</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong>");
		        }
		    } else {
		        $("#tooltip").remove();
		        previousPoint = null;
		    }
		});
	}

	function get_main_kk(kelurahan=0){
		var id = 0;

		if($("#kk-paging-view").attr("meta-id") == 0){
			$("#kk-table-kelurahan tfoot").show();
			$("#kk-table-kelurahan tbody").empty();
			$("#kk-table tbody").empty();
			$("#kk-table tfoot").show();
			var page_csrf = $(".csrf-header-master").attr("name");
			var page_csrf_value = $(".csrf-header-master").attr("value");
			var kepala_keluarga = $(".kepala-keluarga").val();
			var no_kk = $(".no_kk").val();

			var data = {
				[page_csrf] : page_csrf_value,
				'kepala_keluarga' : kepala_keluarga,
				'kelurahan' : kelurahan,
				'no_kk' : no_kk,
			};
		}else{
			id = $("#dashboard").attr("meta-id");

			var data = {
				[page_csrf] : page_csrf_value,
				'kk_id' : id,
			};
		}

		$.post(config_url + "panel/general/json/get-main-kk",data,function(rd){
			if(id == 0){
				teks_tr = "";

				for(var i = 0; i<rd.length;i++){
					teks_tr += "<tr>";
					teks_tr += "<td>"+(i+1)+"</td>";
					teks_tr += "<td><a class='get-detail-kk' href='#' meta-id='"+rd[i]['kk_id']+"'>"+rd[i]['no_kk']+"</a></td>";
					teks_tr += "<td>"+rd[i]['kepala_keluarga']+"</td>";
					teks_tr += "<td>"+rd[i]['alamat_lengkap']+"</td>";
					teks_tr += "<td>"+rd[i]['data_collection_time']+"</td>";
					teks_tr += "</tr>";
				}

				teks_total = teks_tr;

				$("#kk-table-kelurahan tbody").html(teks_total);
				$("#kk-table-kelurahan tfoot").hide();
			}else{
				//umum
				$(".kode_pum").html(rd[0]['kode_pum']);
				$(".no_kk").html(rd[0]['no_kk']);
				$(".kepala_keluarga").html(rd[0]['kepala_keluarga']);
				$(".tanggal_pendataan").html(rd[0]['data_collection_time']);
				$(".status_kemiskinan").html(rd[0]['get_kk_main_data_responden']['status_kemiskinan_string']);
				$(".pengguna_bpjs").html(rd[0]['get_kk_main_data_responden']['pengguna_bpjs_string']);
				$(".jenis_jaminan_sosial").html(rd[0]['get_kk_main_data_responden']['jenis_jaminan_sosial_string']);
				$(".lama_waktu").html(rd[0]['get_kk_main_data_responden']['lama_waktu_string']);
				$(".wajib_iuran").html(rd[0]['get_kk_main_data_responden']['wajib_iuran_string']);

				//alamat
				$(".alamat_lengkap").html(rd[0]['alamat_lengkap']);
				console.log(rd);

				//data responden
				$(".nik").html(rd[0]['get_kk_main_data_responden']['nik_responden']);
				$(".nama_lengkap").html(rd[0]['get_kk_main_data_responden']['nama_lengkap']);
				$(".etnis_suku").html(rd[0]['get_kk_main_data_responden']['etnis_suku']);
				$(".cacat_fisik").html(rd[0]['get_kk_main_data_responden']['cacat_fisik_string']);
				$(".cacat_mental").html(rd[0]['get_kk_main_data_responden']['cacat_mental_string']);
				$(".status_domisili").html(rd[0]['get_kk_main_data_responden']['status_domisili_string']);
				$(".agama").html(rd[0]['get_kk_main_data_responden']['agama_string']);
				$(".pendidikan_terakhir").html(rd[0]['get_kk_main_data_responden']['pendidikan_terakhir_string']);
				$(".status_perkawinan").html(rd[0]['get_kk_main_data_responden']['status_perkawinan_string']);
				$(".golongan_darah").html(rd[0]['get_kk_main_data_responden']['golongan_darah_string']);
				$(".hubungan_dengan_keluarga").html(rd[0]['get_kk_main_data_responden']['hubungan_dengan_keluarga_string']);
				$(".jenis_kelamin").html(rd[0]['get_kk_main_data_responden']['jenis_kelamin_responden_string']);
				$(".kewarganegaraan").html(rd[0]['get_kk_main_data_responden']['kewarganegaraan_string']);

				//Pekerjaan
				$(".lembaga_kemasyarakatan").html(rd[0]['get_kk_main_data_pekerjaan']['lembaga_kemasyarakatan_string']);
				$(".aktivitas_ekonomi_lainnya").html(rd[0]['get_kk_main_data_pekerjaan']['aktivitas_ekonomi_string']);
				$(".sumber_modal").html(rd[0]['get_kk_main_data_pekerjaan']['sumber_modal_string']);
				$(".modal_popup").html(rd[0]['get_kk_main_data_pekerjaan']['modal_string']);
				$(".laba_per_bulan").html(rd[0]['get_kk_main_data_pekerjaan']['laba_per_bulan_string']);
				$(".mata_pencaharian_pokok").html(rd[0]['get_kk_main_data_pekerjaan']['mata_pencaharian_pokok_string']);
				$(".jumlah_penghasilan").html(rd[0]['get_kk_main_data_pekerjaan']['penghasilan_per_bulan_string']);
				$(".jumlah_pengeluaran").html(rd[0]['get_kk_main_data_pekerjaan']['pengeluaran_per_bulan_string']);

				//aset Tanah
				$(".aset_tanah").html(rd[0]['get_kk_main_aset_tanah'][0]['aset_tanah_string']); 


				//aset Rumah
				console.log(rd[0]['get_kk_main_aset_rumah']);
				$(".sumber_air_minum").html(rd[0]['get_kk_main_aset_rumah'][0]['sumber_air_minum_string']); 
				$(".ket_sumber_air_minum").html(rd[0]['get_kk_main_aset_rumah'][0]['ket_sumber_air_minum_string']); 
				$(".status_kepemilikan_rumah").html(rd[0]['get_kk_main_aset_rumah'][0]['status_kepemilikan_rumah_string']); 
				$(".sarana_mck").html(rd[0]['get_kk_main_aset_rumah'][0]['sarana_mck_string']); 
				$(".daya_listrik").html(rd[0]['get_kk_main_aset_rumah'][0]['daya_listrik_string']); 
				$(".luas_pekarangan_rumah").html(rd[0]['get_kk_main_aset_rumah'][0]['luas_pekarangan_rumah_string']); 
				$(".pemanfaatan_danau_dkk").html(rd[0]['get_kk_main_aset_rumah'][0]['pemanfaatan_danau_dkk_string']); 
				$(".dinding_rumah").html(rd[0]['get_kk_main_aset_rumah'][0]['dinding_rumah_string']); 
				$(".atap_rumah").html(rd[0]['get_kk_main_aset_rumah'][0]['dinding_rumah_string']); 
				$(".lantai_rumah").html(rd[0]['get_kk_main_aset_rumah'][0]['lantai_rumah_string']); 

				//aset perkebunan

				$(".jenis_komoditas").html(rd[0]['get_kk_main_aset_perkebunan'][0]['jenis_komoditas_string']); 	
				$(".luas_panen").html(rd[0]['get_kk_main_aset_perkebunan'][0]['luas_panen_string']); 	
				$(".jumlah_produksi").html(rd[0]['get_kk_main_aset_perkebunan'][0]['jumlah_produksi_string']); 
				$(".hasil_pemasaran").html(rd[0]['get_kk_main_aset_perkebunan'][0]['hasil_pemasaran_string']); 
				$(".jumlah_pohon").html(rd[0]['get_kk_main_aset_perkebunan'][0]['jumlah_pohon_string']); 
				$(".jenis_bibit").html(rd[0]['get_kk_main_aset_perkebunan'][0]['jenis_bibit_string']); 
				$(".pestisida").html(rd[0]['get_kk_main_aset_perkebunan'][0]['pestisida_string']); 
				$(".pupuk_organik").html(rd[0]['get_kk_main_aset_perkebunan'][0]['pupuk_organik_string']); 
				$(".pupuk_pabrik").html(rd[0]['get_kk_main_aset_perkebunan'][0]['pupuk_pabrik_string']); 				 
				$(".lokasi").html(rd[0]['get_kk_main_aset_perkebunan'][0]['lokasi']); 

				//aset tanaman pangan
				$(".jenis_komoditas_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['jenis_komoditas_pangan_string']); 
 				$(".luas_panen_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['luas_panen_pangan_string']); 
				$(".jumlah_produksi_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['jumlah_produksi_pangan_string']); 
				$(".hasil_pemasaran_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['hasil_pemasaran_pangan_string']); 
				$(".jumlah_pohon_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['jumlah_pohon_pangan_string']); 
				$(".jenis_bibit_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['jenis_bibit_pangan_string']); 
				$(".pestisida_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['pestisida_pangan_string']); 
				$(".pupuk_organik_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['pupuk_organik_pangan_string']); 
				$(".pupuk_pabrik_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['pupuk_pabrik_pangan_string']); 				 
				$(".lokasi_pangan").html(rd[0]['get_kk_main_aset_tanaman_pangan'][0]['lokasi']); 
 
				//aset tanaman Buahan
				$(".jenis_komoditas_buah_buahan").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['jenis_komoditas_buah_buahan_string']); 
				$(".luas_panen_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['luas_panen_buah_string']); 
				$(".jumlah_produksi_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['jumlah_produksi_buah_string']); 
				$(".hasil_pemasaran_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['hasil_pemasaran_buah_string']); 
				$(".jumlah_pohon_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['jumlah_pohon_buah_string']); 
				$(".jenis_bibit_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['jenis_bibit_buah_string']); 
				$(".pestisida_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['pestisida_buah_string']); 
				$(".pupuk_organik_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['pupuk_organik_buah_string']); 
				$(".pupuk_pabrik_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['pupuk_pabrik_buah_string']); 				 
				$(".lokasi_buah").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['lokasi']); 
 
				//aset tanaman Obat
				$(".jenis_komoditas_tanaman_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['jenis_komoditas_tanaman_obat_string']);
				$(".luas_panen_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['luas_panen_obat_string']); 
				$(".jumlah_produksi_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['jumlah_produksi_obat_string']); 
				$(".hasil_pemasaran_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['hasil_pemasaran_obat_string']); 
				$(".jumlah_pohon_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['jumlah_pohon_obat_string']); 
				$(".jenis_bibit_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['jenis_bibit_obat_string']); 
				$(".pestisida_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['pestisida_obat_string']); 
				$(".pupuk_organik_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['pupuk_organik_obat_string']); 
				$(".pupuk_pabrik_obat").html(rd[0]['get_kk_main_aset_tanaman_obat'][0]['pupuk_pabrik_obat_string']); 				 
				$(".lokasi_obat").html(rd[0]['get_kk_main_aset_buah_buahan'][0]['lokasi']); 
 

				//aset Kehutanan
				$(".jenis_komoditas_kehutanan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['jenis_komoditas_kehutanan_string']);
				$(".luas_panen_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['luas_panen_kehutangan_string']); 
				$(".jumlah_produksi_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['jumlah_produksi_kehutangan_string']); 
				$(".hasil_pemasaran_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['hasil_pemasaran_kehutangan_string']); 
				$(".jumlah_pohon_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['jumlah_pohon_kehutangan_string']); 
				$(".jenis_bibit_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['jenis_bibit_kehutangan_string']); 
				$(".pestisida_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['pestisida_kehutangan_string']); 
				$(".pupuk_organik_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['pupuk_organik_kehutangan_string']); 
				$(".pupuk_pabrik_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['pupuk_pabrik_kehutangan_string']); 				 
				$(".lokasi_kehutangan").html(rd[0]['get_kk_main_aset_kehutanan'][0]['lokasi']); 

				//aset ternak
				$(".jenis_ternak").html(rd[0]['get_kk_main_aset_ternak'][0]['jenis_ternak_string']);
				$(".luas_kandang").html(rd[0]['get_kk_main_aset_ternak'][0]['luas_kandang_string']);
				$(".jumlah_ekor").html(rd[0]['get_kk_main_aset_ternak'][0]['jumlah_ekor_string']);
				$(".jenis_hasil_ternak").html(rd[0]['get_kk_main_aset_ternak'][0]['jenis_hasil_ternak_string']);
				$(".jumlah_produksi_hasil_ternak").html(rd[0]['get_kk_main_aset_ternak'][0]['jumlah_produksi_hasil_ternak_string']);
				$(".pemasaran_hasil_ternak").html(rd[0]['get_kk_main_aset_ternak'][0]['pemasaran_hasil_ternak_string']);
				$(".jenis_pakan_ternak").html(rd[0]['get_kk_main_aset_ternak'][0]['jenis_pakan_ternak_string']);

				//aset ikan
				$(".komoditas_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['komoditas_ikan_string']);
				$(".luas_panen_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['luas_panen_ikan_string']);
				$(".jumlah_produksi_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['jumlah_produksi_ikan_string']);
				$(".hasil_pemasaran_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['hasil_pemasaran_ikan_string']);
				$(".jumlah_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['jumlah_ikan_string']);
				$(".jenis_bibit_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['jenis_bibit_ikan_string']);
				$(".jenis_pakan_ikan").html(rd[0]['get_kk_main_aset_ikan'][0]['jenis_pakan_ikan_string']);

				//aset ikan tangkap
				$(".alat_tangkap_media_ikan").html(rd[0]['get_kk_main_aset_ikan_tangkap'][0]['alat_tangkap_media_ikan_string']);
				$(".jumlah_unit").html(rd[0]['get_kk_main_aset_ikan_tangkap'][0]['jumlah_unit_string']);

				//aset Pariwisata
				$(".jumlah_aktivitas_wisata_bulanan").html(rd[0]['get_kk_main_pariwisata'][0]['jumlah_aktivitas_wisata_bulanan_string']);
				$(".jumlah_biaya_wisata_bulanan").html(rd[0]['get_kk_main_pariwisata'][0]['jumlah_biaya_wisata_bulanan_string']);
				$(".lokasi_objek_wisata").html(rd[0]['get_kk_main_pariwisata'][0]['lokasi_objek_wisata_string']);
				$(".daya_tarik_wisata_palu").html(rd[0]['get_kk_main_pariwisata'][0]['daya_tarik_wisata_palu']);
				$(".pengelolaan_pariwisata_palu").html(rd[0]['get_kk_main_pariwisata'][0]['pengelolaan_pariwisata_palu']);

				//aset kesehatan
				$(".penderita_sakit_kelainan").html(rd[0]['get_kk_main_kesehatan'][0]['penderita_sakit_kelainan_string']);
				$(".perilaku_hidup_bersih").html(rd[0]['get_kk_main_kesehatan'][0]['perilaku_hidup_bersih_string']);
				$(".pola_makan").html(rd[0]['get_kk_main_kesehatan'][0]['pola_makan_string']);
				$(".kebiasaan_berobat").html(rd[0]['get_kk_main_kesehatan'][0]['kebiasaan_berobat_string']);
				$(".jenis_penyakit").html(rd[0]['get_kk_main_kesehatan'][0]['jenis_penyakit_string']);

				var lembaga_pemerintahan_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_lembaga_pemerintahan'].length; ij++){
					lembaga_pemerintahan_list += "<li>"+rd[0]['get_kk_main_lembaga_pemerintahan'][ij]['lembaga_pemerintahan_string']+"</li>";
				}
				lembaga_pemerintahan_list += "</ul>";
				$(".lembaga_pemerintahan_multi").html(lembaga_pemerintahan_list);

				var wajib_pajak_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_wajib_pajak'].length; ij++){
					wajib_pajak_list += "<li>"+rd[0]['get_kk_main_wajib_pajak'][ij]['wajib_pajak_retribusi_string']+"</li>";
				}
				wajib_pajak_list += "</ul>";

				$(".wajib_pajak_retribusi_multi").html(wajib_pajak_list);
			}
		},"json")
		.fail(function(rd){
			console.log(rd);
			
		});
	}

	$(".search-kk").click(function(){
		var kelurahan = $("#kk-paging-view").attr("data-id-kelurahan");
		$("#kk-paging-view").attr("meta-id",0);
		get_main_kk(kelurahan);
	});

	//get-kelurahan-kk

	$(document.body).on("click","a.get-data-kelurahan",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		$("#kk-paging-view").attr("data-id-kelurahan",id);
		$("#kk-paging-view").attr("meta-id",0);
		$("#kk-paging-view").modal("show");
		get_main_kk(id);
	})

	$(document.body).on("click","a.get-detail-kk",function(e){
		e.preventDefault();
		var id = $(this).attr("meta-id");
		$("#kk-paging-view").attr("meta-id",id);
		$("#kk-paging-view").modal("hide");
		var p = setTimeout(function(){
			$("#kk-single-view").modal("show");

			clearTimeout(p);
		},700)

		get_main_kk(0);
	});

});