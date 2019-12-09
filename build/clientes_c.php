<?php 
include 'js/conexion.html';
?>
<script type="text/javascript">
	class Cliente{
		
		agregar(nombre,apellido,sexo){
			var nomb = (CryptoJS.AES.encrypt(nombre, "GARLIK")).toString();
			var ape=(CryptoJS.AES.encrypt(apellido, "GARLIK")).toString();
			var sex=(CryptoJS.AES.encrypt(sexo, "GARLIK")).toString();
			//var desem=(CryptoJS.AES.decrypt(nomb, "GARLIK")).toString(CryptoJS.enc.Utf8);
			//var nomb=encriptar(nombre,"GARLIK");
			
			var clientes={
				"nombre":nomb,
				"apellido":ape,
				"sexo":sex
			}
			cliente.doc().set(clientes).then(function(){
				console.log("Documento añadido");
			})
			.catch(function(error){
				console.error("Error al añadir documento:", error);
				});

		}
		

	}
	
</script>
