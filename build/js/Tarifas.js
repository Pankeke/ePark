class Tarifas{

	constructor(){

		this.idEliminar = 0;
	}

	agregar(){ console.log("holaaa");

		var vehiculo = document.getElementById('vehiculoAgregar');
		var tarifa = document.getElementById('tarifaAgregar');

			db.collection("tarifas").add({
		    vehiculo: vehiculo.value,
		    tarifa: tarifa.value
			})
			.then(function(docRef) {
			})
			.catch(function(error) {
			    console.error("Error adding document: ", error);
			});
	}

	cargarTabla(){
		var tabla = document.getElementById("tabla");

		db.collection("tarifas").onSnapshot((querySnapshot) => {
    		tabla.innerHTML = 
    		'<thead> <tr> <th>Vehiculo</th> <th>Tarifa</th> <th>Eliminar</th> <th>Modificar</th> </tr> </thead>';

    		querySnapshot.forEach((doc) => {
        		tabla.innerHTML += 

	        	`<tr>
			     <td scope="row">${doc.data().vehiculo}</td>
			     <td scope="row">${doc.data().tarifa}</td>
			     <td>
				     <button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar"
				      onclick="tarifa.setIdEliminar('${doc.id}')">Eliminar
				      </button>
			      </td>
			     <td>
			     	<button class="btn btn-warning" data-toggle="modal" data-target="#modalModificar"
			     	onclick="tarifa.modificar('${doc.id}', '${doc.data().vehiculo}' ,'${doc.data().tarifa}')">Modificar
			     	</button>
			     </td>
			     </tr>`
    		});
		});
	}

	setIdEliminar(idEliminar){
		this.idEliminar = idEliminar
	}

	eliminar(){
		db.collection("tarifas").doc(tarifa.idEliminar).delete().then(function() {
        	
    	}).catch(function(error) {
        	console.error("Error removing document: ", error);
    	});
	}

	modificar(id, vehiculo, tarifa){
		document.getElementById("vehiculoModificar").value = vehiculo;
		document.getElementById("tarifaModificar").value = tarifa;

		var boton = document.getElementById("btnGuardar");

		boton.onclick = function(){ 

			var ref = db.collection("tarifas").doc(id);

	        var vehiculo = document.getElementById('vehiculoModificar').value;
	        var tarifa = document.getElementById('tarifaModificar').value;

	        return ref.update({
            vehiculo: vehiculo,
            tarifa: tarifa
        })
        .then(function() {
            
        })
        .catch(function(error) {
            // The document probably doesn't exist.
            console.error("Error updating document: ", error);
        });
	        
		}
	}
}