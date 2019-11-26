console.log('agregado');
var firebaseConfig = {
    apiKey: "AIzaSyDbIcnNoh6_pmkRWNUlbZY5-hLxQJklskc",
    authDomain: "e-park-71416.firebaseapp.com",
    databaseURL: "https://e-park-71416.firebaseio.com",
    projectId: "e-park-71416",
    storageBucket: "e-park-71416.appspot.com",
    messagingSenderId: "1048067032791",
    appId: "1:1048067032791:web:d5c50a8f3872b781059292",
    measurementId: "G-WLL0HHBVY4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  const db = firebase.firestore();

	function add(){
		db.collection("tarifas").add({
	    vehiculo: "Ferrari",
	    tarifa: "400"
	})
	.then(function(docRef) {
	    console.log("Document written with ID: ", dbocRef.id);
	})
	.catch(function(error) {
	    console.error("Error adding document: ", error);
	});
	}

	//function read(){
		var tabla = document.getElementById('tabla');
		db.collection("tarifas").onSnapshot((querySnapshot) => {
			tabla.innerHTML = '';
	    	querySnapshot.forEach((doc) => {
	        	console.log(`${doc.id} => ${doc.data().vehiculo}`);

	        	tabla.innerHTML +="<tr><td>"+doc.data().vehiculo+"</td><td>"+doc.data().tarifa+"<td></tr>"
	    	});
	});
	//}