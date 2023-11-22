<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>

    <style>
        body {
        font-family: Arial, sans-serif;
        color: #87CEEB;
        background-image: url('img/carousel-1.jpg'); /* Ruta de la imagen de fondo */
        margin: 0;
        padding: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        
        }

        form {
        background-color: rgba(0, 0, 0, 0.7); /* Fondo negro transparente */
        padding-left: 50px;
        padding-right: 50px;
        padding-top:20px;
        padding-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        height: 50%;
        color: #87CEEB;

        }

        label {
        color: #87CEEB;
        display: block;
        margin-bottom: 8px;
        color: #87CEEB;
        }

        input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        }

        input[type="submit"] {
        background-color: #0D85E4;
        color: white;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #555;;
        }
        /* combobox */
        select {
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div>

        <form action="/procesar_registro" method="post">
            @csrf
            <center><h2>Registrate</h2></center>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>

            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="telefono">Número de Celular:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="pais">Selecciona tu País:</label>
            <select id="pais" onchange="cargarDepartamentos()">
                <option value="Bolivia">Bolivia</option>
                <option value="Argentina">Argentina</option>
                <option value="Peru">Perú</option>
            </select>

            <label for="departamento">Selecciona tu Departamento:</label>
            <select id="departamento" onchange="cargarCiudades()">
                <!-- Las opciones se cargarán dinámicamente con JavaScript -->
            </select>

            <label for="ciudad">Selecciona tu Ciudad:</label>
            <select id="ciudad">
                <!-- Las opciones se cargarán dinámicamente con JavaScript -->
            </select>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <input type="submit" value="Registrarse">
        </form>
    </div>

    <script>
        // Datos de departamentos y ciudades por país
        var datosPorPais = {
            Bolivia: {
                LaPaz: ["La Paz", "El Alto"],
                SantaCruz: ["Santa Cruz", "Montero", "Warnes"],
                Cochabamba: ["Cochabamba", "Quillacollo", "Chapare"],
                Tarija: ["Tarija", "Bermejo", "Villamontes","Tupiza"]
            },
            Argentina: {
                BuenosAires: ["Buenos Aires", "La Plata"],
                Cordoba: ["Córdoba", "Villa María"],
                Rosario: ["Rosario", "Santa Fe"]
            },
            Peru: {
                Lima: ["Lima", "Callao"],
                Arequipa: ["Arequipa", "Camaná"],
                Cusco: ["Cusco", "Urubamba"]
            }
        };

        function cargarDepartamentos() {
            var paisSeleccionado = document.getElementById("pais").value;
            var departamentoSelect = document.getElementById("departamento");
            var ciudadSelect = document.getElementById("ciudad");

            // Limpiar las opciones anteriores
            departamentoSelect.innerHTML = "<option value=''>Selecciona...</option>";
            ciudadSelect.innerHTML = "<option value=''>Selecciona...</option>";

            // Obtener los departamentos del país seleccionado
            var departamentos = Object.keys(datosPorPais[paisSeleccionado]);

            // Llenar el combobox de departamentos
            for (var i = 0; i < departamentos.length; i++) {
                var option = document.createElement("option");
                option.value = departamentos[i];
                option.text = departamentos[i];
                departamentoSelect.add(option);
            }
        }

        function cargarCiudades() {
            var paisSeleccionado = document.getElementById("pais").value;
            var departamentoSeleccionado = document.getElementById("departamento").value;
            var ciudadSelect = document.getElementById("ciudad");

            // Limpiar las opciones anteriores
            ciudadSelect.innerHTML = "<option value=''>Selecciona...</option>";

            // Obtener las ciudades del país y departamento seleccionados
            var ciudades = datosPorPais[paisSeleccionado][departamentoSeleccionado];

            // Llenar el combobox de ciudades
            for (var i = 0; i < ciudades.length; i++) {
                var option = document.createElement("option");
                option.value = ciudades[i];
                option.text = ciudades[i];
                ciudadSelect.add(option);
            }
        }
    </script>

</body>
</html>
