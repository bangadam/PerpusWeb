$(document).ready(function(){
	$("#sKelas").change(function(){
		var cari = $("#sKelas").val();
		cariJenis(cari);
	})
	
	function cariJenis(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "{!! URL::to('data/kelas') !!}",
			data	: "kelas="+kelas,
			dataType: "json",
			success	: function(data){
				$("#sNama").html(data);
			}
		});
	}

});