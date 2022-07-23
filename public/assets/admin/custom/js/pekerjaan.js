$(document).ready(function(){


	get_pekerjaan();
	get_modal();
	get_laba();
	kk_kelurahan();


	
	
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