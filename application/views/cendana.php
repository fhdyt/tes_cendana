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
    <h1>Cendana</h1>

    <div class="row">
      <div class="col-md-4">
        <form id="form_input">
          <div class="form-group">
            <label for="exampleInputEmail1">Input Kalimat</label>
            <input type="text" class="form-control input_kalimat" id="exampleInputEmail1 input_kalimat" name="input_kalimat" placeholder="Email">
          </div>

          <button class="btn btn-default simpan_form">Simpan</button>
        </form>
    </div>
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <td>ID</td>
              <td>NAMA</td>
              <td>UMUR</td>
              <td>KOTA</td>

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
          <form id="form_input">
            <div class="form-group">
              <label for="exampleInputEmail1">ID</label>
              <input type="text" class="form-control id_kalimat" id="exampleInputEmail1 id_kalimat" name="input_kalimat" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Input Kalimat</label>
              <input type="text" class="form-control input_kalimat_edit" id="exampleInputEmail1 input_kalimat_edit" name="input_kalimat" placeholder="Email">
            </div>


          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default simpan_form_edit">Simpan</button>
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
$("tbody#data_table").on("click","a.edit", function(){
  var id = $(this).attr("id")
  var nama = $(this).attr("nama")
  var umur = $(this).attr("umur")
  var kota = $(this).attr("kota")
  var kalimat = nama + " " + umur + " " + kota
  $('.input_kalimat_edit').val(kalimat)
  $('.id_kalimat').val(id)
  $("#myModal").modal("show")
  detail(id)
})

$("tbody#data_table").on("click","a.delete", function(){
  var id = $(this).attr("id")
  input_delete(id)
})

function input_list()
{
	$.ajax({
		type  : 'ajax',
		url   : 'index.php/cendana/input_list',
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
							'<td>'+data[i].NAMA+'</td>'+
							'<td>'+data[i].UMUR+'</td>'+
							'<td>'+data[i].KOTA+'</td>'+

							'<td><a class="btn btn-sm btn-danger delete" id="'+data[i].ID+'">Hapus</a> '+
							'<a class="btn btn-sm btn-default edit" id="'+data[i].ID+'" nama="'+data[i].NAMA+'" umur="'+data[i].UMUR+'" kota="'+data[i].KOTA+'">Edit</a></td>'+
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
  input_list();
});

$('.simpan_form').on('click',function()
{
  var str1 = $(".input_kalimat").val();
if(str1.indexOf("Tahun") != -1){
    alert("Tidak boleh menggunakan 'Tahun'")
}
else if(str1.indexOf("THN") != -1){
    alert("Tidak boleh menggunakan 'THN'")
}
else if(str1.indexOf("th") != -1){
    alert("Tidak boleh menggunakan 'th'")
}
else
{
		var input_kalimat = $('.input_kalimat').val();
		var id = '';
    simpan(id, input_kalimat)
}
		return false;
});

$('.simpan_form_edit').on('click',function()
{
  var str1 = $(".input_kalimat").val();
  if(str1.indexOf("Tahun") != -1){
      alert("Tidak boleh menggunakan 'Tahun'")
  }
  else if(str1.indexOf("THN") != -1){
      alert("Tidak boleh menggunakan 'THN'")
  }
  else if(str1.indexOf("th") != -1){
      alert("Tidak boleh menggunakan 'th'")
  }
  else
  {
  		var id = $('.id_kalimat').val();
  		var input_kalimat = $('.input_kalimat_edit').val();
      simpan(id, input_kalimat)
    }
		return false;
});

function simpan(id, input_kalimat){
  $.ajax({
    type : "POST",
    url  : "index.php/cendana/input_simpan",
    dataType : "JSON",
    data : {
      input_kalimat:input_kalimat,
      id:id,
    },
    success: function(data)
    {
      input_list();
      $("#myModal").modal("hide")
    }
  });
}
function input_delete(id) {
  //alert(id)
 	$.ajax({
 		type  : 'ajax',
 		url   : 'index.php/cendana/input_delete/'+id,
 		async : false,
 		dataType : 'json',
 		success : function(data)
 		{
 			if (data.length === 0)
 			{
 			}
 			else
 			{
 				input_list()
 			}
 		},
     error: function(x, e) {
       alert("Gagal Mengambil Data")
     } //end error
 	});
}
</script>
