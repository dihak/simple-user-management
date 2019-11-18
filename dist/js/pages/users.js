$(function () {
  $("#user-table").DataTable({
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
		  {data: "photo"},
		  {data: "aksi"}
	  ]
  });
});
