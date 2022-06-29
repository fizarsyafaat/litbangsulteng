$(document).ready(function(){
	if($("#dashboard").length >= 1){
		get_main_kk();
	}

	function get_main_kk(){
		var id = 0;
		if($("#dashboard").attr("meta-id") == 0){
			$("#kk-table tbody").empty();
			$("#kk-table tfoot").show();
			var page_csrf = $(".csrf-header-master").attr("name");
			var page_csrf_value = $(".csrf-header-master").attr("value");
			var kepala_keluarga = $(".kepala-keluarga").val();
			var no_kk = $(".no_kk").val();

			var data = {
				[page_csrf] : page_csrf_value,
				'kepala_keluarga' : kepala_keluarga,
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

				$("#kk-table tbody").html(teks_total);
				$("#kk-table tfoot").hide();
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

	$(document.body).on("click",".get-detail-kk",function(e){
		e.preventDefault();
		var id = $(this).attr("meta-id");
		$("#dashboard").attr("meta-id",id);
		$("#kk-view").modal("show");
		get_main_kk();
	});

	$(".search-kk").click(function(){
		$("#dashboard").attr("meta-id",0);
		get_main_kk();
	});
});