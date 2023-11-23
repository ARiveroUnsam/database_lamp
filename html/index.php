<!DOCTYPE html>
<html>
<head>
    <title>Clinica Dr. UNSAM</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        
        <form action="" method="POST">
        <h1>Clinica Dr. UNSAM</h1>
        <label><b>Ingresar nuevo paciente:</b></label><br><br>
        <div class="contenedor-inputs">
            <input type="text" name="nombre" placeholder="Nombre">
	    <input type="text" name="apellido" placeholder="Apellido">
	    <input type="text" name="dni" placeholder="DNI">
	    <input type="text" name="edad" placeholder="Edad">
	    <input type="text" name="historia_clinica" placeholder="Historia Clinica">
            <input type="text" name="especialidad" placeholder="Especialidad"><br><br>
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
	    <input type="submit" name="registrar" value="Registrar">
	    <input type="submit" name="eliminar" value="Eliminar">
	    <input type="reset" name="limpiar" value="Limpiar"><br><br>
	</div>
		
	<?php
	    if (isset($_POST['nombre'])) {
	    	$nombre = $_POST['nombre'];
	    } else {
		$nombre = "";
	    }
	    
	    if (isset($_POST['apellido'])) {
	    	$apellido = $_POST['apellido'];
	    } else {
		$apellido = "";
	    }
	    
	    if (isset($_POST['dni'])) {
	    	$dni = $_POST['dni'];
	    } else {
		$dni = "";
	    }
	    
	    if (isset($_POST['edad'])) {
	    	$edad = $_POST['edad'];
	    } else {
		$edad = "";
	    }
	    
	    if (isset($_POST['historia_clinica'])) {
	    	$historia_clinica = $_POST['historia_clinica'];
	    } else {
		$historia_clinica = "";
	    }
	    
	    if (isset($_POST['especialidad'])) {
	    	$especialidad = $_POST['especialidad'];
	    } else {
		$especialidad = "";
	    }
	    
	    if (isset($_POST['usuario']) && isset($_POST['clave'])) {
	    	$usuario = $_POST['usuario'];
	    	$clave = $_POST['clave'];
	    } else {
		$usuario = "";
		$clave = "";
	    }
	    
            if (isset($_POST['registrar'])){
                $conexion = mysqli_connect('db_db', $usuario, $clave, "db_datos");
                $registrar="INSERT INTO Pacientes (nombre, apellido, dni, edad, historia_clinica, especialidad) VALUES ('$nombre', '$apellido', '$dni', '$edad', '$historia_clinica', '$especialidad' )";
                $sql=mysqli_query($conexion, $registrar);
            	mysqli_close($conexion);
            }
            
            if (isset($_POST['eliminar'])){
                $conexion = mysqli_connect('db_db', $usuario, $clave, "db_datos");
                $eliminar="DELETE FROM Pacientes WHERE dni='$dni'";
                $sql=mysqli_query($conexion, $eliminar);
            	mysqli_close($conexion);
            }
       	?>
	
	<?php
	    $connect = mysqli_connect('db_db', 'admlinux', 'secret', "db_datos");
            $query = 'SELECT * From Pacientes P INNER JOIN Consultorios C ON P.especialidad=C.especialidad ORDER BY id';
            $result = mysqli_query($connect, $query);

            echo '<table class="table table-striped">';
	    echo '<thead><tr>
	        <th>Id</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>Edad</th>
		<th>Historia Clinica</th>
		<th>Especialidad</th>
		<th>Doctor</th>
		<th>Consultorio</th>
		</tr></thead>';
            while($value = $result->fetch_array()){
                echo '<tr>';
                echo '<th>'.$value['id'].
                	'<th>'.$value['nombre'].
                	'<th>'.$value['apellido'].
                	'<th>'.$value['dni'].
                	'<th>'.$value['edad'].
                	'<th>'.$value['historia_clinica'].
                	'<th>'.$value['especialidad'].
                	'<th>'.$value['doctor'].
                	'<th>'.$value['consultorio'].'<th>';
                echo '</tr>';
            }
            echo '</table>';

            $result->close();
            mysqli_close($connect);
	?>
	
    </div>
</body>
</html>
