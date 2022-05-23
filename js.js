var vue = new Vue({
	el: '#vue',
	data: {
		devices: [],
		//id:'',
		//id_worker:'',
		//name:'',
		//condition:'',
		//date:'',
	},
	created(){
		this.fillArray("SELECT * FROM devices");
	},
	methods:{
		fillArray(sql){
			var data = getData(sql);
			if(data != null){
				this.devices = [];
				data.forEach(item => {
					this.devices.push({id:item['id'], id_worker:item['id_worker'], name:item['name'], condition:item['device_condition'], date:item['date']})
				});
			}
		},
		sortArray(){
			var order = $("#select_order").val();
			var search = $("#search").val()+"%";
			
			this.fillArray("SELECT * FROM devices WHERE name LIKE '%"+search+"' ORDER BY "+order);
		},
	}
})


function getData(sql){
	var result;
    $.ajax({
		url: 'backend.php',
	    type: 'POST',
		async: false,
	    dataType: 'JSON',
	    data: {
			'getData': 1,
			'sql': sql
		},
	    success: function(response){
			//alert("1")
			result = response;
		},
		error: function (xhr, ajaxOptions, thrownError) {
			//alert(xhr.status);
			//alert(thrownError);
		}
	});
	/*
	$.ajax({
		type: "GET",
		url: 'server.php',
		dataType: 'json',
		data: {getData: sql},
	    success: function(response){
			result = response;
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		}
		
	});
	*/
	return result;  
}
function insertData(sql){
	//alert("succes")
    $.ajax({
	    url: 'server.php',
	    type: 'POST',
	    dataType: 'JSON',
		async:false,
		data: {submit_order: JSON.stringify(sql)},
	    success: function(response){
			alert("succes")
		}
	});
}
	

$("#select_order").change(function() {
	window.vue.sortArray();
});
$("#search").change(function() {
	//$("#select_type").prop("selectedIndex", 0);
	window.vue.sortArray();
});