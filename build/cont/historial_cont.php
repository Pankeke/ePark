<?php require_once("../js/conexion.html"); ?>
<script type="text/javascript">
class Historial {

    getData() {
        var tblData = '';
        estacionamiento.get().then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            var val = doc.data();
            console.log(`${doc.id} => ${val.lote}${val.puesto}`);

            tblData += `
            <tr>
            <td>${val.lote}${val.puesto}</td>
            </tr>
            `;
        });
        document.getElementById("historialTab").innerHTML= tblData;
    });
    }

}
historial = new Historial();
historial.getData();
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Prueba tabla con datos</h2>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Lote</th>
        <th>Tiempo ocupado</th>
        <th>Vehiculo</th>
        <th>Total $</th>
    </tr>
    </thead>
    <tbody id="historialTab">

    </tbody>
</table>
</body>
</html>