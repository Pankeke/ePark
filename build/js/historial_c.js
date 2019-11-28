$(document).ready(function() {
	$(document).on('click','.enviar',function(){
		var tarifa=$('#taf').val();
		var estado=$('#estado').val();
		var cliente=$('#cl').val();
		var lote=$('#lote').val();
		var id=$('#estacionamiento').val();
		//console.log(tarifa+" => "+estado+" => "+cliente+" => "+lote);
		var agrega_hist={
				"tarifa":tarifa,
				"cliente":cliente,
				"lote":lote
			}
			historial.doc().set(agrega_hist).then(function(){
				console.log("Documento añadido");
				est.actualizar(lote[0],lote[1],estado,id);
				$("#modal-sm").modal('hide');
				//$('#estado').remove();
				toastr.success('Lote '+lote+' actualizado');
			})
			.catch(function(error){
				console.error("Error al añadir documento:", error);
				});

	});


});