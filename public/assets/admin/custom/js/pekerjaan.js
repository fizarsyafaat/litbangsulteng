$(document).ready(function(){


	get_komoditas1();
	get_komoditas2();
	get_komoditas3();
	

	var previousPoint = null, 
    	previousLabel = null;
	
	
	function get_komoditas1(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-kerja").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-kerja").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
			console.log(rd);
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['mata_pencaharian_pokok'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['mata_pencaharian_pokok'][i]['total_data']);
				tick.push(i,rd['mata_pencaharian_pokok'][i]['nama_mata_pencaharian_pokok']);

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
		    rdm = rd['mata_pencaharian_pokok'];

			rdm.sort(function(a, b) {
			    return parseInt(b['total_data']) - parseInt(a['total_data']);
			});

		    for(var is=0;is<rdm.length;is++){
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rdm[is]['nama_mata_pencaharian_pokok']+"</td><td>"+rdm[is]['total_data']+"</td></tr>";
			}

		    $("#jumlah-kk-pekerjaan tbody").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
		
		});

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

	function get_komoditas2(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-kerja").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-kerja").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['sumber_modal'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['sumber_modal'][i]['total_data']);
				tick.push(i,rd['sumber_modal'][i]['nama_sumber_modal']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

	        $.plot("#bar-chart2", [bar_data], {
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

		    var text = "";
		    rdm = rd['sumber_modal'];

			rdm.sort(function(a, b) {
			    return parseInt(b['total_data']) - parseInt(a['total_data']);
			});

		    for(var is=0;is<rdm.length;is++){
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rdm[is]['nama_sumber_modal']+"</td><td>"+rdm[is]['total_data']+"</td></tr>";
			}

		    $("#jumlah-kk-sumber-modal tbody").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
		
		});

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
		                
		$("#bar-chart2").on("plothover", function (event, pos, item) {
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

	function get_komoditas3(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-kerja").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-kerja").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['laba_per_bulan'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['laba_per_bulan'][i]['total_data']);
				tick.push(i,rd['laba_per_bulan'][i]['nama_laba_per_bulan']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

	        $.plot("#bar-chart3", [bar_data], {
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

		    var text = "";
		    rdm = rd['laba_per_bulan'];

			rdm.sort(function(a, b) {
			    return parseInt(b['total_data']) - parseInt(a['total_data']);
			});

		    for(var is=0;is<rdm.length;is++){
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rdm[is]['nama_laba_per_bulan']+"</td><td>"+rdm[is]['total_data']+"</td></tr>";
			}

		    $("#jumlah-kk-laba tbody").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
		
		});

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
		                
		$("#bar-chart3").on("plothover", function (event, pos, item) {
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

	
	$(".all-districts-kerja").on("change",function(){
		get_kelurahan_kerja();
	});

	function get_kelurahan_kerja(){
		var kecamatan_id = $(".all-districts-kerja").find(":selected").attr("value");
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

			$(".all-subdistricts-kerja").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	$(".filter-kerja").on("click",function(){
		get_komoditas1();
		get_komoditas2();
		get_komoditas3();
	});
	
	                
	                /* END BAR CHART */
});