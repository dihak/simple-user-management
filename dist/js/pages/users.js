$("#user-table").each(function () {
  window.user_datatable = $(this).DataTable({
	  serverSide: true,
	  processing: true,
	  ajax: {
		  url: api_url + '/users',
		  type: 'post'
	  },
	  columns: [
		  {data: "id"},
		  {data: "email"},
		  {data: "nama"},
		  {data: "photo", orderable: false, render: function(url) {
			  return '<img height="200px" width="200px" src="'+base_url+'uploads/img/'+url+'"/>';
		  }},
		  {data: "aksi", orderable: false}
	  ],
	  columnDefs: [
		  {target: 4, data: 'img', render: function(full) {
			  return '<img height="75%" width="75%" src="'+full[7]+'"/>';
		  }}
	  ]
  });
});


$("#edit-user").each(function () {
	var element = $(this);
	bsCustomFileInput.init();
	element.on('submit', function(event) {
		event.preventDefault();
		element.find('button').attr('disabled', true).text('Loading...');
		var data = new FormData(element[0]);
		$.ajax({
			type: 'post',
			enctype: 'multipart/form-data',
			url: api_url + '/edit_user',
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 120,
			success: function(data) {
				var result = JSON.parse(data);
				if (result.success) {
					alert('Berhasil');
				} else {
					alert('Gagal');
				}
				element.find('button').attr('disabled', false).text('Submit');
			}
		})
	})
});

window.delete_user = function(element, id) {
	element = $(element);
	element.attr('disabled', true).text('Loading...');
	$.ajax({
		type: 'post',
		url: api_url + '/delete_user',
		data: {
			id: id
		},
		success: function(data) {
			var result = JSON.parse(data);
			if (result.success) {
				alert('Berhasil');
				user_datatable.row(element.parents('tr')).remove().draw();
			} else {
				alert('Gagal');
			}
			element.attr('disabled', false).text('Submit');
		}
	})
}
