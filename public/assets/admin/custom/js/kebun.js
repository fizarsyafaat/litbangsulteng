$(document).ready(function(){


	//get_komoditas();
	get_komoditas1();
	

	var previousPoint = null,
    	previousLabel = null;
	
	
	function get_komoditas1(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-kebun").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-kebun").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/kebun/json/get-kebun",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['jenis_komoditas'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['jenis_komoditas'][i]['total_data']);
				tick.push(i,rd['jenis_komoditas'][i]['nama_komoditas_perkebunan']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

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

	function get_komoditas(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/kebun/json/get-kebun",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['jenis_komoditas'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['jenis_komoditas'][i]['total_data']);
				tick.push(i,rd['jenis_komoditas'][i]['nama_komoditas_perkebunan']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

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

	
	$(".all-districts-kebun").on("change",function(){
		get_kelurahan_kebun();
	});

	function get_kelurahan_kebun(){
		var kecamatan_id = $(".all-districts-kebun").find(":selected").attr("value");
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

			$(".all-subdistricts-kebun").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	$(".filter-kebun").on("click",function(){
		get_komoditas1();
	});
	
	                
	                /* END BAR CHART */
});