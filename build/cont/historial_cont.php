<?php  ?>
<script type="text/javascript">
class Historial {

    getData() {
        var tblData = '';
        historial.onSnapshot((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                var val = doc.data();
                //console.log(`${doc.id} => Cliente ID: ${val.cliente} Tarifa ID: ${val.tarifa}`);

                var veh = "";
                tarifa.doc(`${val.tarifa}`).get().then((doc) => {
                    //console.log(`${doc.id} => Lote: ${val.lote} Tarifa/h: ${doc.data().tarifa} vehiculo: ${doc.data().vehiculo}`);
                    
                    tblData += "<tr>";
                    tblData += `<td>${val.lote}</td>`;
                    tblData += "<td>tiempo</td>";
                    tblData += `<td>${doc.data().vehiculo}</td>`;
                    tblData += "<td>total</td>";
                    tblData +="</tr>";

                    document.getElementById("historialTab").innerHTML= tblData;
                });                
            });
        });
    }
}
//Query search by ID working:
/*cliente.doc('OjgV0FOLGvlJJLOKPX04').get().then((doc) => {
    var val = doc.data();
    console.log(`${doc.id} => ${doc.data().nombre}`);
});*/
</script>