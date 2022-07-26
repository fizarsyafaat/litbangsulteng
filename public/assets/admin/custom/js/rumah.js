$(document).ready(function(){


	get_status_rumah();

	//get_status_dindi();
	get_dinding_rumah();
	//get_lantai_rumah(); 
	//get_atap_rumah();

	var previousPoint = null,
    	previousLabel = null;

	function get_status_rumah(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-house-owner").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-house-owner").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/rumah/json/get-rumah",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['status_kepemilikan_rumah'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['status_kepemilikan_rumah'][i]['total_data']);
				tick.push(i,rd['status_kepemilikan_rumah'][i]['nama_status_kepemilikan_rumah']);

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

	function get_dinding_rumah(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");
		var kecamatan_id = $(".all-districts-house-owner").find(":selected").attr("value");
		var kelurahan_id = $(".all-subdistricts-house-owner").find(":selected").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
			'kelurahan' : kelurahan_id,
			'kecamatan' : kecamatan_id,
		};

		$.post(config_url + "panel/rumah/json/get-rumah",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['dinding_rumah'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['dinding_rumah'][i]['total_data']);
				tick.push(i,rd['dinding_rumah'][i]['nama_dinding_rumah']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

	        $.plot("#bar-chart1", [bar_data], {
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
		                
		$("#bar-chart1").on("plothover", function (event, pos, item) {
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


	

	function get_lantai_rumah(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/rumah/json/get-rumah",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['lantai_rumah'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['lantai_rumah'][i]['total_data']);
				tick.push(i,rd['lantai_rumah'][i]['nama_lantai_rumah']);

				ticks_ar.push(tick);
				bar_data.data.push(ar);
			}

			console.log(bar_data);

	        $.plot("#bar-chart2", [bar_data], {
	            grid: {
	                borderWidth: 1,
	                borderColor: "#f3f3f3",
	                tickColor: "#f3f3f3",
		            hoverable: true,
		            clickable: true,
	            },
	            valueLabels: {
	                show: true
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

	function get_atap_rumah(){
		var id = 0;
		var page_csrf = $(".csrf-header-master").attr("name");
		var page_csrf_value = $(".csrf-header-master").attr("value");

		var data = {
			[page_csrf] : page_csrf_value,
		};

		$.post(config_url + "panel/rumah/json/get-rumah",data,function(rd){
			var bar_data = {
				data : [],
				bars : {show:true},
			}

			ticks_ar = [];

			for(var i=0;i<rd['atap_rumah'].length;i++){
				ar = [];
				tick = [];
				ar.push(i,rd['atap_rumah'][i]['total_data']);
				tick.push(i,rd['atap_rumah'][i]['nama_atap_rumah']);

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
	            valueLabels: {
	                show: true
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












	///TAMBAHAN FILTER

	$(".all-districts-house-owner").on("change",function(){
		get_kelurahan_house_owner();
	});

	function get_kelurahan_house_owner(){
		var kecamatan_id = $(".all-districts-house-owner").find(":selected").attr("value");
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

			$(".all-subdistricts-house-owner").html(text);
		},"json")
		.fail(function(rd){
			console.log(rd);
			Toast.fire({
				type: 'error',
				title: "Something wrong in the server"
			});
		});
	}

	$(".filter-house-owner").on("click",function(){
		get_dinding_rumah();
		get_status_rumah();
		
	});
});