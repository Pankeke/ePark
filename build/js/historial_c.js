$(document).ready(function() {
	$(document).on('click','.enviar',function(){
		var tarifa=$('#taf').val();
		var estado=$('#estado').val();
		var cliente=$('#cl').val();
		var lote=$('#lote').val();
		var id=$('#estacionamiento').val();
		var dayNames = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
		var tiempo= new Date();
		var hora=tiempo.getHours();
		var minuto=tiempo.getMinutes();
		var tiempo_=$('#time').val();
		var fecha=dayNames[tiempo.getDay()]+" "+tiempo.getMonth()+" "+hora+":"+minuto;
		/*var prueba="<?php $clack=encrypt('fdsfsd','GARLIK');?>";
	    var codificado="<?php $clock=decrypt($clack,'GARLIK');?>";
	    alert("<?php echo $clack; ?>");
	    alert("<?php echo $clock; ?>");*/
		
		if (estado=="ocupado") {
			var agrega_hist={
				"tarifa":tarifa,
				"cliente":cliente,
				"lote":lote,
				"entrada_hr":hora,
				"entrada_mn":minuto,
				"fecha":fecha,
				"tiempo":tiempo_
				
			}
			
			
			historial.doc().set(agrega_hist).then(function(){
				//console.log("Documento añadido"+uuid);
				est.actualizar(lote[0],lote[1],estado,id);
				$("#modal-sm").modal('hide');
				//$("#cliente_").val(cliente);
				
				//$('option').remove('.remove');
				//console.log(uuid);
				
				
				toastr.success('Lote '+lote+' actualizado');
				
			})
			.catch(function(error){
				console.error("Error al añadir documento:", error);
				});

			
		}
		else if(estado=='libre')
		{
			est.actualizar(lote[0],lote[1],estado,id);
			$("#modal-sm").modal('hide');
			toastr.success('Lote '+lote+' actualizado');
			
		}
		else{
			est.actualizar(lote[0],lote[1],estado,id);
			$("#modal-sm").modal('hide');
			toastr.success('Lote '+lote+' actualizado');

		}
		

		//console.log(tarifa+" => "+estado+" => "+cliente+" => "+lote);
		

	});

});