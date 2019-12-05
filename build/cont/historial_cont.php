<?php //include '../js/conexion.html' //Esto se quita para subirlo al sitio principal?>
<script type="text/javascript">
function eliminarHist(id){
    Swal.fire({
        title: '¿Estás Seguro?',
        text: "Si lo borras no podrás recuperarlo!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText:"Cancelar",
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'

    }).then((result) => {
        if (result.value == true) {
        //console.log('Click');
        historial.doc(id).delete().then(function() {
            //console.log("Document successfully deleted!");
            toastr.success('Registro eliminado correctamente');
        }).catch(function(error) {
            toastr.warning("Error intentando eliminar el registro: ", error);
        });
        } else if(result.value == false){
            toastr.error("No se ha eliminado el registro, por favor intente de nuevo");
        }
    });
}

class Historial {

    getData() {

        historial.onSnapshot((querySnapshot) => {
            
            var tblData = '';
            querySnapshot.forEach((doc) => {
                var val = doc.data();
                //console.log(`${doc.id} => Cliente ID: ${val.cliente} Tarifa ID: ${val.tarifa}`);
                var btnBorrar = `<td><button type='button' class='btn btn-danger' onclick="eliminarHist('${doc.id}')" id=".$data['id_alumno']."><i class='far fa-trash-alt'></i></button></td>`;

                var veh = "";                
                tarifa.doc(`${val.tarifa}`).onSnapshot((doc) => {
                    //console.log(`${doc.id} => Lote: ${val.lote} Tarifa/h: ${doc.data().tarifa} vehiculo: ${doc.data().vehiculo}`);
                    
                    var tiempo = val.tiempo;
                    var tarifa = doc.data().tarifa;

                    var total = (tiempo * tarifa);
                    
                    tblData += "<tr>";
                    tblData += `<td>${val.lote}</td>`;
                    tblData += `<td>${val.tiempo}</td>`;
                    tblData += `<td>${doc.data().vehiculo}</td>`;
                    tblData += "<td>"+total+"</td>";
                    tblData += btnBorrar;
                    tblData +="</tr>";

                    document.getElementById("historialTab").innerHTML= tblData;
                });                
            });
        });
    }
}

//Search by ID query:
/*cliente.doc('OjgV0FOLGvlJJLOKPX04').get().then((doc) => {
    var val = doc.data();
    console.log(`${doc.id} => ${doc.data().nombre}`);
});*/

/* Useless function =>
function calcTime(hora_entrada, minuto_entrada, hora_salida, minuto_salida) {

    //console.log("horas: "+(hr-hr1))
    var totalNeto = ((hora_salida - hora_entrada)*60) + (minuto_salida-minuto_entrada);

    if(totalNeto>60) {

        var total = totalNeto/60;
        total = total.toFixed(2);
        //console.log("Total en horas : "+total);

        return total;
    } else {
        
        var total= totalNeto/60;
        total = total.toFixed(2);
        //console.log("Total en minutos: "+ total);

        return total;
    }
}*/
</script>