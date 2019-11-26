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
		
		
		cliente.onSnapshot(function(querySnapshot){
			querySnapshot.forEach(function(doc){
				console.log(doc.data().nombre+" => "+doc.id);
				$('#cl').prepend("<option value='"+doc.id+"' >"+doc.data().nombre+" "+doc.data().apellido+"</option>");
			});
		});
		tarifa.onSnapshot(function(querySnapshot){
			querySnapshot.forEach(function(doc){
				
				$('#taf').prepend("<option value='"+doc.id+"' >"+doc.data().vehiculo+" "+doc.data().tarifa+"</option>");
			});
		});
		
		//document.getElementById("cl").innerHTML=(select);
		//console.log(select);
	});
/*
--Tarifas--
QKTeYrR4RrLHXHG9svmL
U0AEYhTFC2GLqi01geYg
WkGr6nqxlJ89yTmoT3Ix
xajb1YOUsFx72ztWxIxg
 */	

		
	
});

    
