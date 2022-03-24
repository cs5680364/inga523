
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de Consulta</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <header>
	    <nav>
		    <ul>
			    <li><a href="">PDSD-523</a></li>
		    </ul>
	    </nav>
    </header>
    <section class="form-entrada">
        <form action="" method="post">
            <h4>Consulta:</h4>
            <input class="controls" type="text" name="dni" id="dni" placeholder="Dni a buscar" pattern="[0-9]{8}" title="Debe poner 8 números" required>
            <button class="botons" type="button" id="buscar">Buscar</button>
        </form>
    </section>
    <?php ?> 
    <section class="form-salida">
        <h4>Datos del individuo:</h4>
        <p>Apellido paterno: <input class="controls" type="text" id="apellidoPaterno" disabled > </p>
        <p>Apellido materno: <input class="controls"type="text" id="apellidoMaterno" disabled > </p>
        <p>Nombres:<br> <input class="controls" type="text" id="nombres" disabled ></p>
    </section>
    <?php ?>
    <footer>
        <section class="container-footer">
           <p>©2022 Todos los Derechos Reservados</p>
           <a href="">Informacion de contacto</a>
        </section>
    </footer>
</body>
<script>
var input=  document.getElementById('dni');
input.addEventListener('input',function(){
  if (this.value.length > 8) 
     this.value = this.value.slice(0,8); 
})

$('#buscar').click(function(){
    dni = $('#dni').val();
    console.log(dni);
    $.ajax({
        url:'consultaDNI.php',
        type:'post',
        data:'dni='+dni,
        dataType:'json',
        success:function(r){
            if(r.numeroDocumento==dni){
                $('#apellidoPaterno').val(r.apellidoPaterno);
                $('#apellidoMaterno').val(r.apellidoMaterno);
                $('#nombres').val(r.nombres);
            }else{
                //alert('error');
            }
        }
    });
  }); 
</script>
</html>