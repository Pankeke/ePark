<?php include 'js/conexion.html'; ?>
<script type="text/javascript">
	class Estacionamiento{


		actualizar(lote,puesto,estado,doc,cliente) {
			var actualiza={
				"lote":lote,
				"puesto":puesto,
				"estado":estado,
				"cliente":cliente
			}
			estacionamiento.doc(doc).set(actualiza).then(function() {
	            console.log("Document successfully written!");
	        })
	        .catch(function(error) {
	            console.error("Error writing document: ", error);
	        });
		}

		agregar(lote,puesto)
		{
			var agrega={
				"lote":lote,
				"puesto":puesto,
				"estado":"activo"
			}
			estacionamiento.doc().set(agrega).then(function(){
				console.log("Documento añadido");
			})
			.catch(function(error){
				console.error("Error al añadir documento:", error);
				});
		}

		eliminar(doc)
		{
			estacionamiento.doc(doc).delete().then(function(){
				console.log("Dato elminado");
			})
			.catch(function(error){
				console.error("Error al eliminar dato");
			});
		}

		getDatos()
		{
			var html="";
			//"<tr><td><img src='../build/img/car_b.png' style='cursor: pointer;' title='puto xd' id='s' class='s'></td></tr>"
			//html=html.concat("pururururu");
			console.log(html);
			/*estacionamiento.doc("XH59K9NAJ5wBbB1PjX0Q").get().then(function(doc){
				if(doc.exists)
				{
					console.log(doc.data());
				}
				else
				{
					console.log("Error obteniendo los datos");
				}

			}).catch(function(error){
				console.log("Error: ",error);
			});*/
			var tr=1;
			estacionamiento.orderBy("lote").onSnapshot(function(querySnapshot){
				querySnapshot.forEach(function(doc){
					if (doc.data().lote=="A") {
						if (doc.data().estado=="libre") {
							html=html.concat("<td><img src='../build/img/car_b.png' name='popo' class='modificar' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' puesto='"+doc.data().puesto+"' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else if (doc.data().estado=="ocupado") {
							html=html.concat("<td><img src='../build/img/car_r.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else
						{
							html=html.concat("<td><img src='../build/img/car.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");
						}
						


					}
					else if(doc.data().lote=="B"){
						if(tr<2)
						{
							html=html.concat("<tr>");
							tr=3;
						}
						if (doc.data().estado=="libre") {
							html=html.concat("<td><img src='../build/img/car_b.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else if (doc.data().estado=="ocupado") {
							html=html.concat("<td><img src='../build/img/car_r.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else
						{
							html=html.concat("<td><img src='../build/img/car.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");
						}

					}
					else if(doc.data().lote=="C"){
						if (tr<4) 
						{
							html=html.concat("</tr><tr>");
							tr=4;
						}
						if (doc.data().estado=="libre") {
							html=html.concat("<td><img src='../build/img/car_b.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else if (doc.data().estado=="ocupado") {
							html=html.concat("<td><img src='../build/img/car_r.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else
						{
							html=html.concat("<td><img src='../build/img/car.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");
						}

					}
					else if(doc.data().lote=="D"){
						if (tr<5) {
							html=html.concat("</tr><tr>");
							tr=5;
						}
						if (doc.data().estado=="libre") {
							html=html.concat("<td><img src='../build/img/car_b.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else if (doc.data().estado=="ocupado") {
							html=html.concat("<td><img src='../build/img/car_r.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");

						}
						else
						{
							html=html.concat("<td><img src='../build/img/car.png' puesto='"+doc.data().puesto+"' class='modificar' estado='"+doc.data().estado+"' lote='"+doc.data().lote+"' id='"+doc.id+"' data-toggle='modal' data-target='#modal-sm' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+" "+doc.data().estado+"'></td>");
						}

					}
					else{
						/*if (tr<6) {
							html=html.concat("</tr><tr>");
						}
						html=html.concat("<td><img src='../build/img/car_b.png' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+"' id='"+doc.id+"' lote='"+doc.data().lote+"' puesto='"+doc.data().puesto+"'></td>");
*/
					}
					//console.log(doc.id," => ",doc.data().lote," => ",doc.data().puesto," => ",doc.data().estado);
					document.getElementById("tablilla").innerHTML=(html);

				});
				html=html.concat("</tr>");
				html="";
				tr=1;
				});
			
			
			/*estacionamiento.orderBy("lote").get().then(function(querySnapshot){
				querySnapshot.forEach(function(doc){
					if (doc.data().lote=="A") {
						html=html.concat("<td><img src='../build/img/car_b.png' style='cursor: pointer;' title='"+doc.data().lote+doc.data().puesto+"' id='"+doc.id+"' lote='"+doc.data().lote+"' puesto='"+doc.data().puesto+"'></td>");


					}
					else if(doc.data().lote=="B"){
						if(tr<2)
						{
							html=html.concat("<tr>");
							tr=3;
						}
						html=html.concat("<td><img src='../build/img/car_b.png' style='cursor: pointer;' title='puto xd' id='"+doc.id+"' class='s'></td>");

					}
					else if(doc.data().lote=="C"){
						if (tr<4) 
						{
							html=html.concat("</tr></tr>");
							tr=4;
						}

					}
					else if(doc.data.lote=="D"){

					}
					else{

					}
					console.log(doc.id," => ",doc.data().lote," => ",doc.data().puesto," => ",doc.data().estado);
					document.getElementById("tablilla").innerHTML=(html);
				});
			});*/
		}
		getAutos()
		{

			var total=1;
			estacionamiento.onSnapshot(function(querySnapshot){
				querySnapshot.forEach(function(doc){
					total=total+1;
										
				});
			});	
			document.getElementById("h3").innerHTML=(total);
	        console.log(total);
	       

		}
	}
</script>
