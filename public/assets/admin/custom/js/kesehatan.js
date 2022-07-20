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
