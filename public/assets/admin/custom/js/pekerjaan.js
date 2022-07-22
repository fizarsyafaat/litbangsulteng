$(document).ready(function(){


	get_pekerjaan();
	get_modal();
	get_laba();
	kk_kelurahan();


	
	function kk_kelurahan(){
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			//sortir data
			rd.sort(function(a, b) {
			    return parseInt(b['total_kk']) - parseInt(a['total_kk']);
			});

			for(var i=0;i<10;i++){
				ar = [];
				tick = [];
				ar.push(i,rd[i]['total_kk']);
				tick.push(i,rd[i]['title']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			var total_kk_lainnya = 0;

			for(var i=10;i<rd.length;i++){
				total_kk_lainnya += rd[i]['total_kk']
			}

			ar = [];
			tick = [];
			ar.push(10,total_kk_lainnya);
			tick.push(10,"Lainnya");

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
			    text += "<tr><td>"+(parseInt(is)+1)+"</td><td>"+rd[is]['title']+"</td><td><a class='get-pekerjaan' href='#' data-id='"+rd[is]['mata_pencaharian_pokok_id']+"'>"+rd[is]['total_kk']+"</a></td></tr>";
			}

		    $("#jumlah-pekerjaan tbody").html(text);
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

	function get_pekerjaan(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
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

			console.log(bar_data);

	        $.plot("#bar-chart", [bar_data], {
	            grid: {
	                borderWidth: 1,
	                borderColor: "#f3f3f3",
	                tickColor: "#f3f3f3",
	            },
	            series: {
	                bars: {
	                    show: true,
	                    barWidth: 0.5,
	                    align: "center",
	                },
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

	}

	function get_laba(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
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
	            },
	            series: {
	                bars: {
	                    show: true,
	                    barWidth: 0.5,
	                    align: "center",
	                },
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
	}

	function get_modal(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/pekerjaan/json/get-pekerjaan",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['modal'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['modal'][i]['total_data']);
				tick.push(i,rd['modal'][i]['nama_modal']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

	        $.plot("#bar-chart2", [bar_data], {
	            grid: {
	                borderWidth: 1,
	                borderColor: "#f3f3f3",
	                tickColor: "#f3f3f3",
	            },
	            series: {
	                bars: {
	                    show: true,
	                    barWidth: 0.5,
	                    align: "center",
	                },
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
	}
	                
	                /* END BAR CHART */
});