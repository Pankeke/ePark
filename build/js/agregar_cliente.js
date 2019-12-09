$(document).ready(function() {
	$(document).on('click', '.guardar', function(){
		var nombre_cliente=$('#nombre_cliente').val();
		var apellidos_cliente=$('#apellido_cliente').val();
		var sexo=$('#sexo').val();
		clientela.agregar(nombre_cliente,apellidos_cliente,sexo);
		$("#modal-lg").modal('hide');
		toastr.success('Se ha añadido al cliente '+nombre_cliente);
	});
});