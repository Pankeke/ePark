class Administrador{

	constructor(){
		
		this.adminsArr = [];
	}

	getAdmins(){
		var iterador = 0;

		db.collection("users").get().then((querySnapshot) => {
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
    		'<thead> <tr> <th>Nombre</th> <th>Telefono</th> </tr> </thead>';

    		querySnapshot.forEach((doc) => {
        		tabla.innerHTML += 

	        	`<tr>
			     <th scope="row">${doc.data().nombre}</th>
			     <td>${doc.data().telefono}</td>
			     </tr>`
    		});
		});
	}
}