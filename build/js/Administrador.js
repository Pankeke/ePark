class Administrador{

	constructor(){
		
		this.adminsArr = [];

		this.idEliminar = 0;

		this.correo = '';

		this.nombre = '';
	}

	observador() {
		 
		firebase.auth().onAuthStateChanged(function(user) {

		  if (user) {
		    var displayName = user.displayName;
		    var email = user.email;
		    var emailVerified = user.emailVerified;
		    var photoURL = user.photoURL;
		    var isAnonymous = user.isAnonymous;
		    var uid = user.uid;
		    var providerData = user.providerData;

		    var display = document.getElementById("userDisplay");
		    display.innerHTML = email;
		    this.correo = email;
		  } else { 
		  	window.location = "../index.php" 
		  }

		});
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
    		'<thead> <tr> <th>Nombre</th> <th>Telefono</th> <th>Email</th> </tr> </thead>';

    		querySnapshot.forEach((doc) => {
        		tabla.innerHTML += 

	        	`<tr>
			     <td scope="row">${doc.data().nombre}</td>
			     <td scope="row">${doc.data().telefono}</td>
			     <td scope="row">${doc.data().email}</td>
			     </tr>`
    		});
		});
	}

	setIdEliminar(idEliminar){
		this.idEliminar = idEliminar
	}

	agregar(){

		var nombre = document.getElementById("nombreAgregar").value;
		var telefono = document.getElementById("telAgregar").value;
		var email = document.getElementById("emailAgregar").value;
		var password = document.getElementById("passwordAgregar").value;
		var passwordConf = document.getElementById("passwordConfirmar").value;


		if (password !== passwordConf) {
			var displayRegister = document.getElementById("displayRegister");

			displayRegister.innerHTML = 'Las contraseñas ingresadas no coinciden'

			return;
		}

		firebase.auth().createUserWithEmailAndPassword(email, password).then(function() {

			var passEnc = CryptoJS.AES.encrypt(password,"clave").toString();

			db.collection("admins").doc(email).set({
		        nombre: nombre,
		        telefono: telefono,
		        email: email,
		        password: passEnc
		    })
		    .then(function(docRef) {

		    	telefono = "";
		    	email = "";
		    	password = "";
		    	passwordConf = "";

		    	window.location = "html/administradores.php"
		    })
		    .catch(function(error) {
		        console.error("Error adding document: ", error);
		    });

		})
		.catch(function(error) {
		  var errorCode = error.code;
		  var errorMessage = error.message;

		  var displayRegister = document.getElementById("displayRegister");

		  displayRegister.innerHTML = errorMessage;
		  console.log(errorMessage);
		});
	}

	signIn(){
		var correo = document.getElementById("correoLogin").value;
		var password = document.getElementById("passwordLogin").value;

		firebase.auth().signInWithEmailAndPassword(correo, password).then(function(){

			window.location = "html/administradores.php"
			
		}).catch(function(error) {
		  var errorCode = error.code;
		  var errorMessage = error.message;

		  var display = document.getElementById("display");
		  display.innerHTML = errorMessage;

		});
	}

	signOut(){
		firebase.auth().signOut().then(function() {
		}, function(error) {
		  console.error('Sign Out Error', error);
		});
	}

	eliminar(){
		var user = firebase.auth().currentUser;

		db.collection("admins").doc(user.email).delete().then(function() {
			toastr.success('Se elimino el registro exitosamente');
    	}).catch(function(error) {
        	console.error("Error removing document: ", error);
    		});

    	user.delete().then(function() {

		  window.location = "../index.php";

		}).catch(function(error) {

		  console.log("error");

		});
	}

	modificar(){
		var user = firebase.auth().currentUser;

		var docRef = db.collection("admins").doc(user.email);

		docRef.get().then(function(doc) {
		    if (doc.exists) {
		        var nombredb = doc.data().nombre;
		        var teldb = doc.data().telefono;

		        document.getElementById("nombreModificar").value = nombredb;
				document.getElementById("telModificar").value = teldb;
		    } else {
		        console.log("No such document!");
		    }
		}).catch(function(error) {
    			console.log("Error getting document:", error);
		});

		var boton = document.getElementById("btnGuardar");

		boton.onclick = function(){

			var ref = db.collection("admins").doc(user.email);

	        var nombre = document.getElementById('nombreModificar').value;
	        var telefono = document.getElementById('telModificar').value;

	        return ref.update({
            nombre: nombre,
            telefono: telefono
        })
        .then(function() {
            toastr.success('Se modifico a ' + nombre + " exitosamente");
        })
        .catch(function(error) {
            // The document probably doesn't exist.
            console.error("Error updating document: ", error);
        });
	        
		}
	}
}
