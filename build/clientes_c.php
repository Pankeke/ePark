<?php include 'js/conexion.html';?>
<script type="text/javascript">
	class Clientes{
		
		agregar(nombre,apellido,sexo){

			var clientes={
				"nombre":nombre,
				"apellido":apellido,
				"sexo":sexo
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