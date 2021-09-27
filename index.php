<html>
<head>
<title>Wilayah Based On Select</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<div class="container" style="margin-top:100px;"> 
<div class="row"> 
<div class="col-lg-2">&nbsp;</div> 
<div class="col-lg-8"> 
<div class="row"> 
<div class="col-md-12"> 
<div class="form-group" style="position: static;"> 
<label for="Provinsi">Provinsi</label> 
<select class="form-control" id="provinsi"></select> 
</div> <div class="form-group" style="position: static;"> 
<label for="Kabupaten">Kabupaten</label> 
<select class="form-control" id="kabupaten"></select> 
</div> 
<div class="form-group" style="position: static;"> 
<label for="Kecamatan">Kecamatan</label> 
<select class="form-control" id="kecamatan"></select> 
</div> 
<div class="form-group" style="position: static;"> 
<label for="Kelurahan">Kelurahan</label> 
<select class="form-control" id="kelurahan"></select> 
</div> 
</div> 
</div> 
</div> 
<div class="col-lg-2">&nbsp;</div> 
</div> 
</div> 
<script type="text/javascript"> 
$(document).ready(function() { 
$("#provinsi").append('<option value="">Pilih</option>'); 
$("#kabupaten").html(''); 
$("#kecamatan").html(''); 
$("#kelurahan").html(''); 
$("#kabupaten").append('<option value="">Pilih</option>'); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
url = 'get_provinsi.php'; 
$.ajax({ url: url, 
type: 'GET', 
dataType: 'json', 
success: function(result) { 
for (var i = 0; i < result.length; i++) 
$("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i].nama + '</option>'); 
} 
}); 
}); 
$("#provinsi").change(function(){ 
var id_prov = $("#provinsi").val(); 
var url = 'get_kabupaten.php?id_prov=' + id_prov; 
$("#kabupaten").html(''); $("#kecamatan").html(''); 
$("#kelurahan").html(''); $("#kabupaten").append('<option value="">Pilih</option>'); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kabupaten").append('<option value="'+ result[i].id_kab +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kabupaten").change(function(){ 
var id_kab = $("#kabupaten").val(); 
var url = 'get_kecamatan.php?id_kab=' + id_kab; 
$("#kecamatan").html(''); $("#kelurahan").html(''); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kecamatan").append('<option value="'+ result[i].id_kec +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kecamatan").change(function(){ 
var id_kec = $("#kecamatan").val(); 
var url = 'get_kelurahan.php?id_kec=' + id_kec; $("#kelurahan").html(''); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kelurahan").append('<option value="'+ result[i].id_kel +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
</script>
</body>
</html>