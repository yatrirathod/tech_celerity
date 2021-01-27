$(document).ready(function(){
	//to check the dashboard table 

// toastr.error('Are you the 6 fingered man?');
// toastr.success('Are you the 6 fingered man?');
// toastr.info('Are you the 6 fingered man?');


	if($("#demo_dataTable").length>0){
	console.log("dsc");
	var demoTable = $("#demo_dataTable").dataTable({
	"bPaginate": true,
	"bSort":true,
	"bInfo": true,
	"bFilter": true,
	"sPaginationType":"full_numbers",
	"bLengthChange": false,
	"iDisplayLength": 10
	});
	}
	
	$("#User_table").on('click', '#activeicon', function(){
  		var id = $(this).data("id");
  		var currentRow = $(this).closest("tr");
  		//alert(id);
  		var col1 = currentRow.find(".active").css("display", "none");
  		var col2 = currentRow.find(".pause").css("display", "block");
  		
	});
	$("#User_table").on('click', '.btn-status', function(){
		var id = $(this).data("id");
  		var status = $(this).data("status");
  		var thiss = $(this);
  		thiss.prop('value', 'Loading');
  		$.ajax({
		  "type": "GET",
		  "url": "activeUser",
		  "data": {"user_id":id,"user_status":status},
		  "dataType": "JSON",
		  success: function(response) {
			    console.log('received this response: '+response);
			    	
		  		if(status ==  0 ){
							thiss.removeClass("btn-success").addClass("btn-danger");
		  					thiss.prop('value', 'Pause');
		  					thiss.data("status",1);

		  		}
		  		else if(status == 1){
				  			thiss.removeClass("btn-danger").addClass("btn-success");
		  					thiss.prop('value', 'Active');
		  					thiss.data("status",0);
				  		}
				  	toastr.success(response['message']);
			},
			error: function(response){
				toastr.error(response['message']);
			}
		  		// var col2 = currentRow.find("#pause").css("display", "block");
		});
	});

	$("#User_table").on('click', '.btn-delete', function(){
		var id = $(this).data("id");
		var thisrow = $(this);
		swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
				  "type": "GET",
				  "url": "deleteUser",
				  "data": {"delete_id":id},
				  "dataType": "JSON",
				  success: function(response) {
					    console.log('received this response: '+response);
					    	thisrow.closest("tr").remove();
						  	
			    		swal("Poof! Your imaginary file has been deleted!", {
			      		icon: "success",
			    		});
						toastr.success(response['message']);
					},
					error: function(response){
						toastr.error(response['message']);
					}
				  // var col2 = currentRow.find("#pause").css("display", "block");
				});
			  } else {
			    swal("Your imaginary file is safe!");
			  }
			});
		
	});

	$("#User_table").on('click', '.view-more' , function(){
			var id = $(this).data("id");
			$.ajax({
			  "type": "GET",
			  "url": "viewmore",
			  "data": {"view_id":id},
			  "dataType": "JSON",
			  success: function(response) {
				    console.log(response);
				    // Add response in Modal body
      				$('.modal-body #user_id').html('id:-' + response['user'].id);
      				$('.modal-body #name').html('name:-' + response['user'].name);
      				$('.modal-body #email').html('email:-' + response['user'].email);
      				$('.modal-body #number').html('number:-' + response['user'].number);
				    $('#myModal').modal('show');
				     
				},
				error: function(response){
					toastr.error(response['message']);
				}
			  	// var col2 = currentRow.find("#pause").css("display", "block");
			});
	});

	$("#changePassword").on('click', function(){
      $email = $("#useremail").val();
  	  $oldp  = $("#user_oldPass").val();
  	  $newp  = $("#user_newPass").val();

  	  $.ajax({
  	  		"type":"GET",
  	  		"url": "changePassword",
			"data": {"u_email":$email,"u_oldp":$oldp,"u_newp":$newp},
			"dataType": "JSON",
			success: function(response) {
			    console.log(response);
			    toastr.error(response['message']);
			    location.reload();
			},
			error: function(response){
				toastr.error(response);
			}
		});
  	});

  	$("#User_table").on('click','.btn-edit', function(){
  		$id = $(this).data("id");
  		//alert($id);
  		$('.modal_hiddenid').val($id);
  		$.ajax({
  	  		"type":"GET",
  	  		"url": "editUser",
			"data": {"u_id":$id},
			"dataType": "JSON",
			success: function(response) {
			    console.log(response);
			    $('#name').val(response.name);
			    $('#email').val(response.email);
			    $('#number').val(response.number);
			    $('#edit-modal').modal('show');
			},
			error: function(response){
				toastr.error(response);
			}
		});
  	});
  	
  	$("#editForm").on('submit', function(e){
  		e.preventDefault();
  		//$formdata = document.getElementById("editForm");
  		$id = $("#id").val();
  		$.ajax({
  			"type":"PUT",
  			"url":"Updateuser/"+$id,
  			"data":$("#editForm").serialize(),
  			"dataType":"JSON",
  			success: function(response) {
  				console.log(response['update_user']);
  				$('#edit-modal').modal('hide');
  				$("#User_table #name"+$id).html(response['update_user'].name);
  				$("#User_table #number"+$id).html(response['update_user'].number);
  				$("#User_table #email"+$id).html(response['update_user'].email);
			    //location.reload();
			   	
			    //$('#User_table').DataTable().ajax.reload();
  				toastr.error(response['message']);
  			}
  		});
  	
  	});
});
