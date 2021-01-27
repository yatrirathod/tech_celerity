$(document).ready(function(){
	$("#prdTable").dataTable({
		"bPaginate": true,
		"bFilter": false,
		"bInfo": false,
		"sDom": '<"top"i>rt<"bottom"flp<"clear">'  
	});
	$("#addProduct").validate({
	  rules: {
	    name: "required",
	    price:{
	    	required:true
	    },
	    image:{
	    	required:true
	    }
		},
	  messages: {
	    name: "Please specify your product",
	    price:{
	    	required:"Please enter price"
	    }
	  }
	});
	$("#addProductdata").on('click', function(){
		$("#add-modal").modal("show");
	});
	var form = $('#addProduct')[0];
	$("#addProduct").on('submit',function(e){
		e.preventDefault();
		$.ajax({
  			"type":"POST",
  			"url":"productInsert",
  			"data": new FormData(form),
  			"contentType": false,
            "cache": false,
            "processData": false,
  			"dataType":"JSON",
  			success: function(response) {
  				console.log(response['vendor']);
			   	$("#add-modal").modal("hide");
			    var html = '<tr>';
			    html+= '<td>'+response['vendor'].name+'</td>';
			    html+= '<td>'+response['vendor'].image+'</td>';
			    html+= '<td>'+response['vendor'].price+'</td>';
			    $("#productTbody").prepend(html);
			    $("#name").val("");
				$("#image").val("");
				$("#price").val("");
  				toastr.success(response['message']);
  			}
  		});
	});
});