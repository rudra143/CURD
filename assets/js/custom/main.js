$(document).ready(function() {

    $('#insertForm').on('submit',function(event) {

      	event.preventDefault();
		
		$.ajax({
			'url': 'http://localhost/CURD/home/insert',
			'type': 'POST',
			'dataType': 'json',
			'data': $('#insertForm').serialize()
		})
		.done(function(data){
		if (data.status == 'success') {
			alert(data.msg);
			$('#insertModal').modal('toggle');
			$('#insertForm')[0].reset();
			var err = `<span class="text text-danger">${data.error}</span>`;
			$('input[type="text"][name="contact"]').append(err);
			table.ajax.reload(); 
		}
		})
		.always(function(){
			console.log('complete');
		}); // end of ajax call

    }); // end of submit event


	var table = $('#infoTable').DataTable({

		"ajax": 'http://localhost/CURD/home/fetchUsers',
		"columns" : [
			{ "data": "name" },
			{ "data": "email" },
			{ "data": "contact" }
		],
		"columnDefs": [
			{
				"targets": 3,
				"data": null,
				"defaultContent": "<button class='btn btn-success update' data-toggle='modal' data-target='#updateModal'><span class='fa fa-edit'></span></button>"
			},
			{
				"targets": 4,
				"data": null,
				"defaultContent": "<button class='btn btn-danger delete'><span class='fa fa-trash'></span></button>"
			}
		]
	});

	$('#infoTable tbody').on('click', 'button.update', function (e) {
		
		e.preventDefault();
		
		var data = table.row($(this).parents('tr')).data();
		$('input[type="hidden"][name="id"]').val(data.id);
		$('input[type="text"][name="name"]').val(data.name);
		$('input[type="email"][name="email"]').val(data.email);
		$('input[type="text"][name="contact"]').val(data.contact);
	
	});

	$('#updateForm').on('submit', function(e){

		e.preventDefault();

		$.ajax({
			url: 'http://localhost/CURD/home/updateUserData',
			type: 'POST',
			dataType: 'json',
			data: $('#updateForm').serialize()
		})
		.done(function(data) {
			if (data.status == 'success') {
				alert("Record Updated Successfully");
				$('#updateModal').modal('toggle');
				table.ajax.reload(); 
			}
		})
		.always(function() {
			console.log("complete");
		});    

	});


	$('#infoTable tbody').on('click', 'button.delete', function (e) {
		
		e.preventDefault();
		var data = table.row($(this).parents('tr')).data();

		if(confirm("Are you sure you want to delete this record??")){
			$.ajax({
				url: "http://localhost/CURD/home/delete",
				type: 'POST',
				dataType: 'JSON',
				data: { id: data.id }
			})
			.done(function (data) {
				if (data.status == 'success') {
					alert("Record Deleted Successfully");
					table.ajax.reload(); 
				}
			})
			.always(function () {
			});
		}
	});

});// end of ready function
