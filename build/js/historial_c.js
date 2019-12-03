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
		var fecha=dayNames[tiempo.getDay()]+" "+tiempo.getMonth()+" "+hora+":"+minuto;
		
		
		if (estado=="ocupado") {
			var agrega_hist={
				"tarifa":tarifa,
				"cliente":cliente,
				"lote":lote,
				"entrada_hr":hora,
				"entrada_mn":minuto,
				"fecha":fecha,
				"salida_hr":"NA",
				"salida_mn":"NA"
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
			var datos={
				"salida_hr":hora,
				"salida_mn":minuto
			}
			var kk=0;
			
			//console.log(cliente);
			var pro=historial.where("cliente","==",cliente);
			pro=historial.where("tarifa","==",tarifa);
			pro=historial.where("lote","==",lote);
			pro.get().then(function(querySnapshot){
				querySnapshot.forEach(function(doc){
					kk++;
					var id=doc.id;
					console.log("ID: "+kk+" "+doc.id);
					
				});
			});
			historial.doc(id).set(datos,{merge:true}).then(function(){
				est.actualizar(lote[0],lote[1],estado,id);
				$("#modal-sm").modal('hide');
				toastr.success('Lote '+lote+' actualizado');
			})
			.catch(function(error) {
			    console.error("Error writing document: ", error);
			});
			
			
		}
		else{

		}
		

		//console.log(tarifa+" => "+estado+" => "+cliente+" => "+lote);
		

	});

});