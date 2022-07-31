$(document).ready(function(){

	if($("#dashboard").length >= 1){
		kk_kecamatan();
		kk_kelurahan();
	}

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

			//sortir data
			rd.sort(function(a, b) {
			    return parseInt(b['total_kk']) - parseInt(a['total_kk']);
			});

			for(var i=0;i<6;i++){
				ar = [];
				tick = [];
				ar.push(i,rd[i]['total_kk']);
				tick.push(i,rd[i]['title']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			var total_kk_lainnya = 0;

			for(var i=6;i<rd.length;i++){
				total_kk_lainnya += rd[i]['total_kk']
			}

			ar = [];
			tick = [];
			ar.push(6,total_kk_lainnya);
			tick.push(6,"Lainnya");

			ticks_ar.push(tick);
			bar_data.data.push(ar);

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

			for(var i=0;i<6;i++){
				ar = [];
				tick = [];
				ar.push(i,rd[i]['total_kk']);
				tick.push(i,rd[i]['title']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			var total_kk_lainnya = 0;

			for(var i=6;i<rd.length;i++){
				total_kk_lainnya += rd[i]['total_kk']
			}

			ar = [];
			tick = [];
			ar.push(6,total_kk_lainnya);
			tick.push(6,"Lainnya");

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

	function get_main_kk(kelurahan=0,paging=1,page=1){
		var id = 0;

		if(kelurahan==0){
			if($("#kk-paging-view").attr("meta-id") == 0){
				$("#kk-table tbody").empty();
				$("#kk-table tfoot").show();
				var page_csrf = $(".csrf-header-master").attr("name");
				var page_csrf_value = $(".csrf-header-master").attr("value");
				var kepala_keluarga = $(".kepala-keluarga").val();
				var kelurahan_src = $(".kelurahan-crkk").find(":selected").attr("value");
				var kecamatan_src = $(".kecamatan-crkk").find(":selected").attr("value");
				var stakem = $(".stakem-crkk").find(":selected").attr("value");
				var pekerjaan = $(".pekerjaan-crkk").find(':selected').attr("value");
				var no_kk = $(".no_kk").val();

				var data = {
					[page_csrf] : page_csrf_value,
					'kepala_keluarga' : kepala_keluarga,
					'pekerjaan' : pekerjaan,
					'kelurahan' : kelurahan_src,
					'kecamatan' : kecamatan_src,
					'stakem' : stakem,
					'no_kk' : no_kk,
					'mode' : 'statistic',
				};

				console.log(data);

				if(paging==1){
					data['paging'] = 1;
					data['page'] = page;
				}
			}else{
				id = $("#kk-paging-view").attr("meta-id");

				var data = {
					[page_csrf] : page_csrf_value,
					'kk_id' : id,
				};
			}
		}else{
			$("#kk-table-kelurahan tfoot").show();
			$("#kk-table-kelurahan tbody").empty();

			var page_csrf = $(".csrf-header-master").attr("name");
			var page_csrf_value = $(".csrf-header-master").attr("value");

			var data = {
				[page_csrf] : page_csrf_value,
				'kelurahan' : kelurahan,
			};

			if(paging==1){
				data['paging'] = 1;
			}
		}

		$.post(config_url + "panel/general/json/get-main-kk",data,function(red){
			rd=red['kk_list'];
			if(id == 0){
				if(kelurahan==0){
					console.log(red);
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

					$(".total-kk").html(red['total_data']);

					$("#kk-table tbody").html(teks_total);
					$(".pagination-kk").html(red['pager']);
					$("#kk-table tfoot").hide();

					//STATISTIC GENDER
					donutGenderData = [];
					for(var igender=0;igender<red['statistic']['gender'].length;igender++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['gender'][igender]['name'],
				            data: red['statistic']['gender'][igender]['percentage'],
				            raw_data : red['statistic']['gender'][igender]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutGenderData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-gender", donutGenderData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var igender=0;igender<donutGenderData.length;igender++){
				    	text += "<tr>";
				    	text += "<td>"+donutGenderData[igender].label+"</td>";
				    	text += "<td>"+donutGenderData[igender].raw_data+"</td>";
				    	text += "<td>"+donutGenderData[igender].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.gender tbody").html(text);

					//STATISTIC AGAMA
					donutReligionData = [];
					for(var igender=0;igender<red['statistic']['religion'].length;igender++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['religion'][igender]['name'],
				            data: red['statistic']['religion'][igender]['percentage'],
				            raw_data : red['statistic']['religion'][igender]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutReligionData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-religion", donutReligionData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var iagama=0;iagama<donutReligionData.length;iagama++){
				    	text += "<tr>";
				    	text += "<td>"+donutReligionData[iagama].label+"</td>";
				    	text += "<td>"+donutReligionData[iagama].raw_data+"</td>";
				    	text += "<td>"+donutReligionData[iagama].data+"%%</td>";
				    	text += "</tr>";
				    }

				    $(".table.agama tbody").html(text);

					//STATISTIC GOLDAR
					donutGoldarData = [];
					for(var igoldar=0;igoldar<red['statistic']['goldar'].length;igoldar++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['goldar'][igoldar]['name'],
				            data: red['statistic']['goldar'][igoldar]['percentage'],
				            raw_data : red['statistic']['goldar'][igoldar]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutGoldarData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-goldar", donutGoldarData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var igoldar=0;igoldar<donutGoldarData.length;igoldar++){
				    	text += "<tr>";
				    	text += "<td>"+donutGoldarData[igoldar].label+"</td>";
				    	text += "<td>"+donutGoldarData[igoldar].raw_data+"</td>";
				    	text += "<td>"+donutGoldarData[igoldar].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.goldar tbody").html(text);

					//STATISTIC PENTER
					donutPenterData = [];
					for(var ipenter=0;ipenter<red['statistic']['penter'].length;ipenter++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['penter'][ipenter]['name'],
				            data: red['statistic']['penter'][ipenter]['percentage'],
				            raw_data : red['statistic']['penter'][ipenter]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutPenterData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-penter", donutPenterData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var ipenter=0;ipenter<donutPenterData.length;ipenter++){
				    	text += "<tr>";
				    	text += "<td>"+donutPenterData[ipenter].label+"</td>";
				    	text += "<td>"+donutPenterData[ipenter].raw_data+"</td>";
				    	text += "<td>"+donutPenterData[ipenter].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.penter tbody").html(text);

					//STATISTIC PEKERJAAN
					donutPekerjaanData = [];
					for(var ipenter=0;ipenter<red['statistic']['pekerjaan'].length;ipenter++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['pekerjaan'][ipenter]['name'],
				            data: red['statistic']['pekerjaan'][ipenter]['percentage'],
				            raw_data : red['statistic']['pekerjaan'][ipenter]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutPekerjaanData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-pekerjaan", donutPekerjaanData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var ipekerjaan=0;ipekerjaan<donutPekerjaanData.length;ipekerjaan++){
				    	text += "<tr>";
				    	text += "<td>"+donutPekerjaanData[ipekerjaan].label+"</td>";
				    	text += "<td>"+donutPekerjaanData[ipekerjaan].raw_data+"</td>";
				    	text += "<td>"+donutPekerjaanData[ipekerjaan].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.pekerjaan tbody").html(text);

					//STATISTIC PENGHASILAN
					donutPenghasilanData = [];
					for(var ipenghasilan=0;ipenghasilan<red['statistic']['penghasilan'].length;ipenghasilan++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['penghasilan'][ipenghasilan]['name'],
				            data: red['statistic']['penghasilan'][ipenghasilan]['percentage'],
				            raw_data : red['statistic']['penghasilan'][ipenghasilan]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutPenghasilanData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-penghasilan", donutPenghasilanData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var ipenghasilan=0;ipenghasilan<donutPenghasilanData.length;ipenghasilan++){
				    	text += "<tr>";
				    	text += "<td>"+donutPenghasilanData[ipenghasilan].label+"</td>";
				    	text += "<td>"+donutPenghasilanData[ipenghasilan].raw_data+"</td>";
				    	text += "<td>"+donutPenghasilanData[ipenghasilan].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.penghasilan tbody").html(text);

					//STATISTIC PENGELUARAN
					donutPengeluaranData = [];
					for(var ipengeluaran=0;ipengeluaran<red['statistic']['pengeluaran'].length;ipengeluaran++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['pengeluaran'][ipengeluaran]['name'],
				            data: red['statistic']['pengeluaran'][ipengeluaran]['percentage'],
				            raw_data : red['statistic']['pengeluaran'][ipengeluaran]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutPengeluaranData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-pengeluaran", donutPengeluaranData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var ipengeluaran=0;ipengeluaran<donutPengeluaranData.length;ipengeluaran++){
				    	text += "<tr>";
				    	text += "<td>"+donutPengeluaranData[ipengeluaran].label+"</td>";
				    	text += "<td>"+donutPengeluaranData[ipengeluaran].raw_data+"</td>";
				    	text += "<td>"+donutPengeluaranData[ipengeluaran].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.pengeluaran tbody").html(text);

					//STATISTIC PENGELUARAN
					donutStakemData = [];
					for(var istakem=0;istakem<red['statistic']['stakem'].length;istakem++){
					    var donutDataSingle =
				        {
				            label: red['statistic']['stakem'][istakem]['name'],
				            data: red['statistic']['stakem'][istakem]['percentage'],
				            raw_data : red['statistic']['stakem'][istakem]['total_data'],
				            color: "#" + Math.floor(Math.random()*16777215).toString(16),
				        };


					    donutStakemData.push(donutDataSingle);
					}


				    $.plot("#donut-chart-stakem", donutStakemData, {
				        series: {
				            pie: {
				                show: true,
				                radius: 1,
				                innerRadius: 0.5,
				                label: {
				                    show: true,
				                    radius: 2 / 3,
				                    formatter: labelFormatter,
				                    threshold: 0.1,
				                },
				            },
				        },
				        legend: {
				            show: false,
				        },
				    });

				    var text = "";
				    for(var istakem=0;istakem<donutStakemData.length;istakem++){
				    	text += "<tr>";
				    	text += "<td>"+donutStakemData[istakem].label+"</td>";
				    	text += "<td>"+donutStakemData[istakem].raw_data+"</td>";
				    	text += "<td>"+donutStakemData[istakem].data+"%</td>";
				    	text += "</tr>";
				    }

				    $(".table.stakem tbody").html(text);
				}else{
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
					$(".pagination-kk-kelurahan").html(red['pager']);
					$("#kk-table-kelurahan tfoot").hide();
				}
			}else{
				console.log(red);
				console.log(rd);
				
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
				var text_perkebunan = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_perkebunan'].length; ij++){

					text_perkebunan += "<tr>"; 
					text_perkebunan += "<td class='jenis_komoditas'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['jenis_komoditas_string']+"</td>"
					text_perkebunan += "<td class='luas_panen'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['luas_panen_string']+"</td>"
					text_perkebunan += "<td class='jumlah_produksi'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['jumlah_produksi_string']+"</td>"
					text_perkebunan += "<td class='hasil_pemasaran'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['hasil_pemasaran_string']+"</td>"
					text_perkebunan +="<td class='jumlah_pohon'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['jumlah_pohon_string']+"</td>"
					text_perkebunan +=" <td class='jenis_bibit'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['jenis_bibit_string']+"</td>"
					text_perkebunan += "<td class='pestisida'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['pestisida_string']+"</td>"
					text_perkebunan += "<td class='pupuk_organik'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['pupuk_organik_string']+"</td>"
					text_perkebunan += "<td class='pupuk_pabrik'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['pupuk_pabrik_string']+"</td>"
					text_perkebunan += "<td class='lokasi'>"+rd[0]['get_kk_main_aset_perkebunan'][ij]['lokasi']+"</td>"
					text_perkebunan +=" </tr>"
				}
				$(".komoditas-perkebunan-table tbody").html(text_perkebunan);


				//aset tanaman pangan
			var text_pangan = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_tanaman_pangan'].length; ij++){

					text_pangan += "<tr>"; 
					text_pangan += "<td class='jenis_komoditas_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['jenis_komoditas_pangan_string']+"</td>"
					text_pangan += "<td class='luas_panen_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['luas_panen_kpangan_string']+"</td>"
					text_pangan += "<td class='jumlah_produksi_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['jumlah_produksi_pangan_string']+"</td>"
					text_pangan += "<td class='hasil_pemasaran_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['hasil_pemasaran_pangan_string']+"</td>"
					text_pangan +="<td class='jumlah_pohon_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['jumlah_pohon_pangan_string']+"</td>"
					text_pangan +=" <td class='jenis_bibit_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['jenis_bibit_pangan_string']+"</td>"
					text_pangan += "<td class='pestisida_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['pestisida_pangan_string']+"</td>"
					text_pangan += "<td class='pupuk_organik_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['pupuk_organik_pangan_string']+"</td>"
					text_pangan += "<td class='pupuk_pabrik_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['pupuk_pabrik_pangan_string']+"</td>"
					text_pangan += "<td class='lokasi_pangan'>"+rd[0]['get_kk_main_aset_tanaman_pangan'][ij]['lokasi']+"</td>"
					text_pangan +=" </tr>"
				}
				$(".komoditas-tanaman-pangan-table tbody").html(text_pangan);

 
				//aset tanaman Buahan
				var text_pertanian = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_buah_buahan'].length; ij++){

					text_pertanian += "<tr>"; 
					text_pertanian += "<td class='jenis_komoditas_buah_buahan'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['jenis_komoditas_buah_buahan_string']+"</td>"
					text_pertanian += "<td class='luas_panen_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['luas_panen_buah_string']+"</td>"
					text_pertanian += "<td class='jumlah_produksi_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['jumlah_produksi_buah_string']+"</td>"
					text_pertanian += "<td class='hasil_pemasaran_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['hasil_pemasaran_buah_string']+"</td>"
					text_pertanian +="<td class='jumlah_pohon_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['jumlah_pohon_buah_string']+"</td>"
					text_pertanian +=" <td class='jenis_bibit_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['jenis_bibit_buah_string']+"</td>"
					text_pertanian += "<td class='pestisida_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['pestisida_buah_string']+"</td>"
					text_pertanian += "<td class='pupuk_organik_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['pupuk_organik_buah_string']+"</td>"
					text_pertanian += "<td class='pupuk_pabrik_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['pupuk_pabrik_buah_string']+"</td>"
					text_pertanian += "<td class='lokasi_buah'>"+rd[0]['get_kk_main_aset_buah_buahan'][ij]['lokasi']+"</td>"
					text_pertanian +=" </tr>"
				}
				$(".komoditas-pertanian-table tbody").html(text_pertanian);

 
				//aset tanaman Obat
		

					var text_obat = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_tanaman_obat'].length; ij++){

					text_obat += "<tr>"; 
					text_obat += "<td class='jenis_komoditas_tanaman_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['jenis_komoditas_tanaman_obat_string']+"</td>"
					text_obat += "<td class='luas_panen_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['luas_panen_obat_string']+"</td>"
					text_obat += "<td class='jumlah_produksi_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['jumlah_produksi_obat_string']+"</td>"
					text_obat += "<td class='hasil_pemasaran_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['hasil_pemasaran_obat_string']+"</td>"
					text_obat +="<td class='jumlah_pohon_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['jumlah_pohon_obat_string']+"</td>"
					text_obat +=" <td class='jenis_bibit_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['jenis_bibit_obat_string']+"</td>"
					text_obat += "<td class='pestisida_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['pestisida_obat_string']+"</td>"
					text_obat += "<td class='pupuk_organik_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['pupuk_organik_obat_string']+"</td>"
					text_obat += "<td class='pupuk_pabrik_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['pupuk_pabrik_obat_string']+"</td>"
					text_obat += "<td class='lokasi_obat'>"+rd[0]['get_kk_main_aset_tanaman_obat'][ij]['lokasi']+"</td>"
					text_obat +=" </tr>"
				}
				$(".komoditas-tanaman-obat-table tbody").html(text_obat);
 

				//aset Kehutanan
					var text_kehutanan = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_kehutanan'].length; ij++){

					text_kehutanan += "<tr>"; 
					text_kehutanan += "<td class='jenis_komoditas_kehutanan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['jenis_komoditas_kehutanan_string']+"</td>"
					text_kehutanan += "<td class='luas_panen_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['luas_panen_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='jumlah_produksi_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['jumlah_produksi_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='hasil_pemasaran_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['hasil_pemasaran_kehutangan_string']+"</td>"
					text_kehutanan +="<td class='jumlah_pohon_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['jumlah_pohon_kehutangan_string']+"</td>"
					text_kehutanan +=" <td class='jenis_bibit_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['jenis_bibit_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='pestisida_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['pestisida_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='pupuk_organik_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['pupuk_organik_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='pupuk_pabrik_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['pupuk_pabrik_kehutangan_string']+"</td>"
					text_kehutanan += "<td class='lokasi_kehutangan'>"+rd[0]['get_kk_main_aset_kehutanan'][ij]['lokasi']+"</td>"
					text_kehutanan +=" </tr>"
				}
				$(".komoditas-kehutanan-table tbody").html(text_kehutanan);

				//aset ternak
				

				var text_ternak = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_ternak'].length; ij++){

					text_ternak += "<tr>"; 
					text_ternak += "<td class='jenis_ternak'>"+rd[0]['get_kk_main_aset_ternak'][ij]['jenis_ternak_string']+"</td>"
					text_ternak += "<td class='luas_kandang'>"+rd[0]['get_kk_main_aset_ternak'][ij]['luas_kandang_string']+"</td>"
					text_ternak += "<td class='jumlah_ekor'>"+rd[0]['get_kk_main_aset_ternak'][ij]['jumlah_ekor_string']+"</td>"
					text_ternak += "<td class='jenis_hasil_ternak'>"+rd[0]['get_kk_main_aset_ternak'][ij]['jenis_hasil_ternak_string']+"</td>"
					text_ternak +="<td class='jumlah_produksi_hasil_ternak'>"+rd[0]['get_kk_main_aset_ternak'][ij]['jumlah_produksi_hasil_ternak_string']+"</td>"
					text_ternak +=" <td class='pemasaran_hasil_ternak'>"+rd[0]['get_kk_main_aset_ternak'][ij]['pemasaran_hasil_ternak_string']+"</td>"
					text_ternak += "<td class='jenis_pakan_ternak'>"+rd[0]['get_kk_main_aset_ternak'][ij]['jenis_pakan_ternak_string']+"</td>"
					text_ternak +=" </tr>"
				}
				$(".komoditas-ternak-table tbody").html(text_ternak);


				var text_ikan = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_ikan'].length; ij++){

					text_ikan += "<tr>"; 
					text_ikan += "<td class='komoditas_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['komoditas_ikan_string']+"</td>"
					text_ikan += "<td class='luas_panen_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['luas_panen_ikan_string']+"</td>"
					text_ikan += "<td class='jumlah_produksi_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['jumlah_produksi_ikan_string']+"</td>"
					text_ikan += "<td class='hasil_pemasaran_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['hasil_pemasaran_ikan_string']+"</td>"
					text_ikan +="<td class='jumlah_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['jumlah_ikan_string']+"</td>"
					text_ikan +=" <td class='jenis_bibit_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['jenis_bibit_ikan_string']+"</td>"
					text_ikan += "<td class='jenis_pakan_ikan'>"+rd[0]['get_kk_main_aset_ikan'][ij]['jenis_pakan_ikan_string']+"</td>"
					text_ikan +=" </tr>"
				}
				$(".komoditas-perikanan-table tbody").html(text_ikan);

				//aset ikan tangkap
				var text_ikan = "";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_ikan_tangkap'].length; ij++){

					text_ikan += "<tr>"; 
					text_ikan += "<td class='alat_tangkap_media_ikan'>"+rd[0]['get_kk_main_aset_ikan_tangkap'][ij]['alat_tangkap_media_ikan_string']+"</td>"
					text_ikan += "<td class='jumlah_unit'>"+rd[0]['get_kk_main_aset_ikan_tangkap'][ij]['jumlah_unit_string']+"</td>"
					text_ikan +=" </tr>"
				}
				$(".komoditas-perikanan-tangkap-table tbody").html(text_ikan);

				//aset Pariwisata
				if(rd[0]['get_kk_main_pariwisata'].length >= 1){
					$(".jumlah_aktivitas_wisata_bulanan").html(rd[0]['get_kk_main_pariwisata'][0]['jumlah_aktivitas_wisata_bulanan_string']);
					$(".jumlah_biaya_wisata_bulanan").html(rd[0]['get_kk_main_pariwisata'][0]['jumlah_biaya_wisata_bulanan_string']);
					$(".lokasi_objek_wisata").html(rd[0]['get_kk_main_pariwisata'][0]['lokasi_objek_wisata_string']);
					$(".daya_tarik_wisata_palu").html(rd[0]['get_kk_main_pariwisata'][0]['daya_tarik_wisata_palu_string']);
					$(".pengelolaan_pariwisata_palu").html(rd[0]['get_kk_main_pariwisata'][0]['pengelolaan_pariwisata_palu_string']);
				}

				//aset kesehatan
				if(rd[0]['get_kk_main_kesehatan'].length >= 1){
					$(".penderita_sakit_kelainan").html(rd[0]['get_kk_main_kesehatan'][0]['penderita_sakit_kelainan_string']);
					$(".perilaku_hidup_bersih").html(rd[0]['get_kk_main_kesehatan'][0]['perilaku_hidup_bersih_string']);
					$(".pola_makan").html(rd[0]['get_kk_main_kesehatan'][0]['pola_makan_string']);
					$(".kebiasaan_berobat").html(rd[0]['get_kk_main_kesehatan'][0]['kebiasaan_berobat_string']);
					$(".jenis_penyakit").html(rd[0]['get_kk_main_kesehatan'][0]['jenis_penyakit_string']);
				}


				//aset Persalinan
				if(rd[0]['get_kk_main_persalinan'].length >= 1){
					$(".kualitas_ibu_hamil").html(rd[0]['get_kk_main_persalinan'][0]['kualitas_ibu_hamil_string']);
					$(".kualitas_bayi").html(rd[0]['get_kk_main_persalinan'][0]['kualitas_bayi_string']);
					$(".tempat_persalinan").html(rd[0]['get_kk_main_persalinan'][0]['tempat_persalinan_string']);
					$(".pertolongan_persalinan").html(rd[0]['get_kk_main_persalinan'][0]['pertolongan_persalinan_string']);
					$(".fasilitas_layanan_kesehatan").html(rd[0]['get_kk_main_persalinan'][0]['fasilitas_layanan_kesehatan_string']);
					$(".umur_balita").html(rd[0]['get_kk_main_persalinan'][0]['umur_balita_string']);
					$(".berat_badan").html(rd[0]['get_kk_main_persalinan'][0]['berat_badan_string']);
					$(".tinggi_badan").html(rd[0]['get_kk_main_persalinan'][0]['tinggi_badan_string']);
					$(".kondisi_saat_pengukuran").html(rd[0]['get_kk_main_persalinan'][0]['kondisi_saat_pengukuran_string']);
					$(".status_gizi_balita").html(rd[0]['get_kk_main_persalinan'][0]['status_gizi_balita_string']);
					$(".jenis_kelamin_balita").html(rd[0]['get_kk_main_persalinan'][0]['jenis_kelamin_balita_string']);
				}
				
				$(".nama_pendata").html(rd[0]['get_pendata']['nama']);
				$(".pekerjaan_pendata").html(rd[0]['get_pendata']['pekerjaan']);
				$(".jabatan_pendata").html(rd[0]['get_pendata']['jabatan']);
				$(".sumber_data").html(rd[0]['get_pendata']['sumber_data']);
				$(".no_handphone").html(rd[0]['get_pendata']['no_handphone']);

				var lembaga_pemerintahan_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_lembaga_pemerintahan'].length; ij++){
					lembaga_pemerintahan_list += "<li>"+rd[0]['get_kk_main_lembaga_pemerintahan'][ij]['lembaga_pemerintahan_string']+"</li>";
				}
				lembaga_pemerintahan_list += "</ul>";
				$(".lembaga_pemerintahan_multi").html(lembaga_pemerintahan_list);

				var acceptorkb_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_acceptorkb'].length; ij++){
					acceptorkb_list += "<li>"+rd[0]['get_kk_main_acceptorkb'][ij]['acceptorkb_string']+"</li>";
				}
				lembaga_pemerintahan_list += "</ul>";
				$(".acceptorkb_multi").html(acceptorkb_list);

				var transportasi_umum_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_transportasi_umum'].length; ij++){
					transportasi_umum_list += "<li>"+rd[0]['get_kk_main_aset_transportasi_umum'][ij]['transportasi_umum_string']+"</li>";
				}
				transportasi_umum_list += "</ul>";
				$(".transportasi_umum_multi").html(transportasi_umum_list);
				
				var cakupan_imunisasi_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_cakupan_imunisasi'].length; ij++){
					cakupan_imunisasi_list += "<li>"+rd[0]['get_kk_main_cakupan_imunisasi'][ij]['cakupan_imunisasi_string']+"</li>";
				}
				cakupan_imunisasi_list += "</ul>";
				$(".cakupan_imunisasi_multi").html(cakupan_imunisasi_list);

				var lembaga_pendidikan_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_lembaga_pendidikan'].length; ij++){
					lembaga_pendidikan_list += "<li>"+rd[0]['get_kk_main_aset_lembaga_pendidikan'][ij]['lembaga_pendidikan_string']+"</li>";
				}
				transportasi_umum_list += "</ul>";
				$(".lembaga_pendidikan_multi").html(lembaga_pendidikan_list);
				
				var aset_produksi_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_aset_produksi'].length; ij++){
					aset_produksi_list += "<li>"+rd[0]['get_kk_main_aset_produksi'][ij]['aset_produksi_string']+"</li>";
				}
				aset_produksi_list += "</ul>";
				$(".aset_produksi_multi").html(aset_produksi_list);

				var wajib_pajak_list = "<ul>";
				for(var ij=0;ij<rd[0]['get_kk_main_wajib_pajak'].length; ij++){
					wajib_pajak_list += "<li>"+rd[0]['get_kk_main_wajib_pajak'][ij]['wajib_pajak_retribusi_string']+"</li>";
				}
				wajib_pajak_list += "</ul>";

				$(".wajib_pajak_retribusi_multi").html(wajib_pajak_list);
				

				$("#kk-view").modal("show");


			}
		},"json")
		.fail(function(rd){
			console.log(rd);
			
		});
	}

	if($("#cari-kk").length >= 1){
		get_main_kk();
	}

	//get-kelurahan-kk

	$(document.body).on("click","a.get-data-kelurahan",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		$("#kk-paging-view").attr("data-id-kelurahan",id);
		$("#kk-paging-view").attr("meta-id",0);
		$("#kk-paging-view").modal("show");
		get_main_kk(id,1);
	})

	$(document.body).on("click","a.get-detail-kk",function(e){
		e.preventDefault();
		var id = $(this).attr("meta-id");
		$("#kk-paging-view").attr("meta-id",id);
		$("#kk-paging-view").modal("hide");
		var p = setTimeout(function(){
			clearTimeout(p);
		},700)

		get_main_kk(0);
	});

	$(".search-kk").click(function(){
		if($("#dashboard").length >= 1){
			$("#dashboard").attr("meta-id",0);
			get_main_kk_page();			
		}else{
			var kelurahan = $("#kk-paging-view").attr("data-id-kelurahan");
			$("#kk-paging-view").attr("meta-id",0);
			get_main_kk(kelurahan);
		}

	});

	$(document.body).on("click",".pagination.pagination-kk a.page_item",function(e){
		e.preventDefault();
		var page_l = $(this).attr("meta-page");
		$("#kk-paging-view").attr("meta-id",0);

		get_main_kk(0,1,page_l);
	});

    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' + label + "<br>" + Math.round(series.percent) + "%</div>";
    }

	$(".kecamatan-crkk").on("change",function(){
		get_kelurahan();
	});

	function get_kelurahan(){
		var kecamatan_id = $(".kecamatan-crkk").find(":selected").attr("value");
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		console.log(data);

		$.post(config_url + "panel/address/json/get-subdistrict/"+kecamatan_id,data,function(rd){
			var text = "<option value='0'>Semua Kelurahan</option>";
			for(var i=0;i<rd.length;i++){
				text += "<option value="+rd[i]['id_kelurahan']+">"+rd[i]['nama_kelurahan']+"</option>";
			}

			$(".kelurahan-crkk").html(text);
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