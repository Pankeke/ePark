$(document).ready(function() {
	$(document).on('click', '.modificar', function(){
		var id = $(this).attr('id');
		var lote=$(this).attr('lote');
		var estado=$(this).attr('estado');
		var puesto=$(this).attr('puesto');
		//console.log(id);
		//var modal="<p>One fine body&hellip;</p>";
		//document.getElementById("modal").innerHTML=modal;
		document.getElementById("titulo").innerHTML="Estacionamiento "+lote+puesto;
		var select="";
		var est_html="";
		$('#lote').val(lote+puesto);
		$('#estacionamiento').val(id);
		
		
		if (estado=="ocupado") {
			$('option').remove('.remove');
			est_html=est_html.concat("<option value='libre' class='remove'>Libre</option>");
			est_html=est_html.concat("<option value='ocupado' selected class='remove'>Ocupado</option>");
			est_html=est_html.concat("<option value='fs' class='remove'>Fuera de servicio</option>");
			$('#estado').prepend(est_html);
			est_html="";
		}
		else if(estado=="libre")
		{
			$('option').remove('.remove');
			est_html=est_html.concat("<option value='libre' selected>Libre</option>");
			est_html=est_html.concat("<option value='ocupado'>Ocupado</option>");
			est_html=est_html.concat("<option value='fs'>Fuera de servicio</option>");
			$('#estado').prepend(est_html);
			est_html="";
		}
		else
		{
			$('option').remove('.remove');
			est_html=est_html.concat("<option value='libre'>Libre</option>");
			est_html=est_html.concat("<option value='ocupado'>Ocupado</option>");
			est_html=est_html.concat("<option value='fs' selected>Fuera de servicio</option>");
			$('#estado').prepend(est_html);
			est_html="";

		}
		

		cliente.onSnapshot(function(querySnapshot){
			querySnapshot.forEach(function(doc){
				//console.log(doc.data().nombre+" => "+doc.id);
				$('#cl').prepend("<option value='"+doc.id+"' class='remove'>"+doc.data().nombre+" "+doc.data().apellido+"</option>");
			});
		});
		tarifa.onSnapshot(function(querySnapshot){
			querySnapshot.forEach(function(doc){
				
				$('#taf').prepend("<option value='"+doc.id+"' class='remove' >"+doc.data().vehiculo+" "+doc.data().tarifa+"</option>");
			});
		});
		
		//document.getElementById("cl").innerHTML=(select);
		//console.log(select);
	});
		
	
});

    
