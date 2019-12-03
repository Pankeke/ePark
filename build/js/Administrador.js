class Administrador{

	constructor(){
		
		this.adminsArr = [];

		this.idEliminar = 0;
	}

	getAdmins(){
		var iterador = 0;

		db.collection("admins").get().then((querySnapshot) => {
	    	querySnapshot.forEach((doc) => {
		    		this.adminsArr[iterador] = {
			    		nombre: doc.data().first,
			    		apellido: doc.data().last,
			    		fecha: doc.data().born
	    			}; 
	    			iterador ++;	
    		});
		});

		return this.adminsArr;
	}

	cargarTabla(){
		var tabla = document.getElementById("tablaAdmins");

		db.collection("admins").onSnapshot((querySnapshot) => {
    		tabla.innerHTML = 
    		'<thead> <tr> <th>Nombre</th> <th>Telefono</th> <th>Eliminar</th> <th>Modificar</th> </tr> </thead>';

    		querySnapshot.forEach((doc) => {
        		tabla.innerHTML += 

	        	`<tr>
			     <td scope="row">${doc.data().nombre}</td>
			     <td scope="row">${doc.data().telefono}</td>
			     <td>
				     <button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar"
				      onclick="admin.setIdEliminar('${doc.id}')">Eliminar
				      </button>
			      </td>
			     <td>
			     	<button class="btn btn-warning" data-toggle="modal" data-target="#modalModificar"
			     	onclick="admin.modificar('${doc.id}', '${doc.data().nombre}' ,'${doc.data().telefono}')">Modificar
			     	</button>
			     </td>
			     </tr>`
    		});
		});
	}

	setIdEliminar(idEliminar){
		this.idEliminar = idEliminar
	}

	agregar(){

		var nombre = document.getElementById("nombreAgregar")
		var telefono = document.getElementById("telAgregar")

		db.collection("admins").add({
	        nombre: nombre.value,
	        telefono: telefono.value
	    })
	    .then(function(docRef) {
	    })
	    .catch(function(error) {
	        console.error("Error adding document: ", error);
	    });
	}

	eliminar(){
		db.collection("admins").doc(admin.idEliminar).delete().then(function() {
        	
    	}).catch(function(error) {
        	console.error("Error removing document: ", error);
    	});
	}

	modificar(id, nombre, tel){
		document.getElementById("nombreModificar").value = nombre;
		document.getElementById("telModificar").value = tel;

		var boton = document.getElementById("btnGuardar");

		boton.onclick = function(){

			var ref = db.collection("admins").doc(id);

	        var nombre = document.getElementById('nombreModificar').value;
	        var telefono = document.getElementById('telModificar').value;

	        return ref.update({
            nombre: nombre,
            telefono: telefono
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