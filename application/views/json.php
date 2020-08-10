<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Fikri Hidayat</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/jquery-3.4.1.min.js" type="text/javascript"></script>

    <style>
          .loader {
      	border: 5px solid #f3f3f3;
      	border-radius: 50%;
      	border-top: 5px solid #3498db;
      	width: 40px;
      	height: 40px;
      	-webkit-animation: spin 2s linear infinite;
      	/* Safari */
      	animation: spin 2s linear infinite;
      }
      /* Safari */

      @-webkit-keyframes spin {
      	0% {
      		-webkit-transform: rotate(0deg);
      	}
      	100% {
      		-webkit-transform: rotate(360deg);
      	}
      }
      @keyframes spin {
      	0% {
      		transform: rotate(0deg);
      	}
      	100% {
      		transform: rotate(360deg);
      	}
      }
    </style>
  </head>
  <body>
    <div class="container">
    <h1>JSON</h1>

    <div class="row">
      <div class="col-md-12">
        <form id="form_input">
          <div class="form-group">
            <label for="exampleInputEmail1">Url Json</label>
            <input type="text" class="form-control input_json" id="exampleInputEmail1 input_json" name="input_kalimat" placeholder="URL">
          </div>

          <button class="btn btn-default simpan_form">Simpan</button>
        </form>
    </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <td>ID</td>
              <td>NAME</td>
              <td>USERNAME</td>
              <td>EMAIL</td>
              <td>PHONE</td>
              <td>WEBSITE</td>
              <td>STREET</td>
              <td>SUITE</td>
              <td>CITY</td>
              <td>ZIPCODE</td>

            </tr>
          </thead>
          <tbody id="data_table">
            <tr>
							<td colspan="9">
								<center>
									<div class="loader"></div>
								</center>
							</td>
						</tr>
          </tbody>
          </table>
        </table>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>

<script>

$('.simpan_form').on('click',function()
{
		var input_json = $('.input_json').val();
		$.ajax({
			type : "POST",
			url  : "json/json_simpan",
			dataType : "JSON",
			data : {
        input_json:input_json,
      },
			success: function(data)
			{
				alert("Sukses")
			}
		});
		return false;
});

function json_list()
{
	$.ajax({
		type  : 'ajax',
		url   : 'json/json_list',
		async : false,
		dataType : 'json',
		success : function(data)
		{
			$("#data_table").empty()
			if (data.length === 0)
			{
				$("#data_table").append('<tr><td colspan="20"><center><div class="alert alert-danger">Tidak ada data user.</div></center></td></tr>')
			}
			else
			{
				var i;
				for(i=0; i<data.length; i++){
					 $("#data_table").append('<tr id="'+data[i].ID+'">'+
							'<td>'+data[i].ID+'</td>'+
							'<td>'+data[i].NAME+'</td>'+
							'<td>'+data[i].USERNAME+'</td>'+
							'<td>'+data[i].EMAIL+'</td>'+
							'<td>'+data[i].PHONE+'</td>'+
							'<td>'+data[i].WEBSITE+'</td>'+

							'<td>'+data[i].STREET+'</td>'+
							'<td>'+data[i].SUITE+'</td>'+
							'<td>'+data[i].CITY+'</td>'+
							'<td>'+data[i].ZIPCODE+'</td>'+

							'</tr>');
				}
			}
		},
    error: function(x, e) {
      alert("Gagal Mengambil Data")
    } //end error
	});
}
$(function()
{
  json_list();
});
</script>
