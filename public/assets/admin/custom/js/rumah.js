$(document).ready(function(){


	get_status_rumah();
	get_dinding_rumah();
	get_lantai_rumah();
	get_atap_rumah();



	function get_status_rumah(){
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

	function get_dinding_rumah(){
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