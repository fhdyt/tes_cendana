<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Belajar CodeIgniter</title>

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
    <h1>Belajar CodeIgniter</h1>

    <div class="row">
      <div class="col-md-4">
        <form id="form_input">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control nama_input" id="exampleInputEmail1 nama_input" name="nama_input" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="form-control jk_input" name="jk_input" id="jk_input">
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control tempat_lahir_input" id="exampleInputEmail1 tempat_lahir_input" name="tempat_lahir_input" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input type="date" class="form-control tanggal_lahir_input" id="exampleInputEmail1 tanggal_lahir_input" name="tanggal_lahir_input" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control alamat_input" id="exampleInputEmail1 alamat_input" name="alamat_input" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No Handphone</label>
            <input type="text" class="form-control no_hp_input" id="exampleInputEmail1 no_hp_input" name="no_hp_input" placeholder="Email">
          </div>
          <button class="btn btn-default simpan_form">Simpan</button>
        </form>
    </div>
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <td>ID</td>
              <td>Nama</td>
              <td>Jenis Kelamin</td>
              <td>Tempat Lahir</td>
              <td>Tanggal Lahir</td>
              <td>Alamat</td>
              <td>No Handphone</td>
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



  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Detail</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td>Nama</td>
            <td><p class="nama_p"></p></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>

<script>
$("tbody#data_table").on("click","a.detail", function(){
  var id = $(this).attr("id")
  $("#myModal").modal("show")
  detail(id)
})

function detail(id)
{
  console.log(id)
	$.ajax({
		type  : 'ajax',
		url   : 'index.php/user/user_detail/'+id,
		async : false,
		dataType : 'json',
		success : function(data)
		{
			if (data.length === 0)
			{
			}
			else
			{
				var i;
				for(i=0; i<data.length; i++){
          $("p.nama_p").html(""+data[i].USER_NAMA+"")
				}
			}
		},
    error: function(x, e) {
      alert("Gagal Mengambil Data")
    } //end error
	});
}
function user_list()
{
	$.ajax({
		type  : 'ajax',
		url   : 'index.php/user/user_list',
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
					 $("#data_table").append('<tr id="'+data[i].USER_ID+'">'+
							'<td>'+data[i].USER_ID+'</td>'+
							'<td>'+data[i].USER_NAMA+'</td>'+
							'<td>'+data[i].USER_JK+'</td>'+
							'<td>'+data[i].USER_TEMPAT_LAHIR+'</td>'+
							'<td>'+data[i].USER_TANGGAL_LAHIR+'</td>'+
							'<td>'+data[i].USER_ALAMAT+'</td>'+
							'<td>'+data[i].USER_HP+'</td>'+
							'<td><a class="btn btn-sm btn-success detail" id="'+data[i].USER_ID+'">Edit</a></td>'+
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
  user_list();
});

$('.simpan_form').on('click',function()
{
		var nama_input = $('.nama_input').val();
		var jk_input = $('.jk_input').val();
		var tempat_lahir_input = $('.tempat_lahir_input').val();
		var tanggal_lahir_input = $('.tanggal_lahir_input').val();
		var alamat_input = $('.alamat_input').val();
		var no_hp_input = $('.no_hp_input').val();
		$.ajax({
			type : "POST",
			url  : "index.php/user/user_simpan",
			dataType : "JSON",
			data : {
        nama:nama_input,
        jk:jk_input,
        tempat_lahir:tempat_lahir_input,
        tanggal_lahir:tanggal_lahir_input,
        alamat:alamat_input,
        no_hp:no_hp_input
      },
			success: function(data)
			{
				user_list();
			}
		});
		return false;
});
</script>
