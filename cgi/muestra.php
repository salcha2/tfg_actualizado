<?php
// Verifica si se han recibido datos del formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // Verifica si se han recibido todos los campos esperados
    if (isset($_SESSION['usuario']) && isset($_POST['result_vulnerability']) && isset($_POST['result_risk']) && isset($_POST['result_functionality']) && isset($_POST['id_v11']) && isset($_POST['id_v21']) && isset($_POST['id_v31']) && isset($_POST['id_v41']) && isset($_POST['id_v51']) && isset($_POST['id_v61']) && isset($_POST['id_v71']) && isset($_POST['id_v81']) && isset($_POST['id_v91']) && isset($_POST['id_v101']) && isset($_POST['id_v111']) && isset($_POST['id_v121']) && isset($_POST['id_v131']) && isset($_POST['id_v141']) && isset($_POST['id_v151']) && isset($_POST['id_v161']) && isset($_POST['id_v171']) && isset($_POST['id_v181']) && isset($_POST['id_v191']) && isset($_POST['id_v201']) && isset($_POST['id_v211']) && isset($_POST['latinput']) && isset($_POST['loninput'])) {
        
        // Obtiene los valores de los campos
        $result_vulnerability = $_POST['result_vulnerability'];
        $result_risk = $_POST['result_risk'];
        $result_functionality = $_POST['result_functionality'];
        $id_v1 = $_POST['id_v11'];
        $id_v2 = $_POST['id_v21'];
        $id_v3 = $_POST['id_v31'];
        $id_v4 = $_POST['id_v41'];
        $id_v5 = $_POST['id_v51'];
        $id_v6 = $_POST['id_v61'];
        $id_v7 = $_POST['id_v71'];
        $id_v8 = $_POST['id_v81'];
        $id_v9 = $_POST['id_v91'];
        $id_v10 = $_POST['id_v101'];
        $id_v11 = $_POST['id_v111'];
        $id_v12 = $_POST['id_v121'];
        $id_v13 = $_POST['id_v131'];
        $id_v14 = $_POST['id_v141'];
        $id_v15 = $_POST['id_v151'];
        $id_v16 = $_POST['id_v161'];
        $id_v17 = $_POST['id_v171'];
        $id_v18 = $_POST['id_v181'];
        $id_v19 = $_POST['id_v191'];
        $id_v20 = $_POST['id_v201'];
        $id_v21 = $_POST['id_v211'];
        $latitud = $_POST['latinput'];
        $longitud = $_POST['loninput'];
        $usuario = $_SESSION['usuario']; // Cambiado a $usuario

        // Verificar si todos los campos están llenos
        if (!empty($result_vulnerability) && !empty($result_risk) && !empty($result_functionality) && !empty($id_v1) && !empty($id_v2) && !empty($id_v3) && !empty($id_v4) && !empty($id_v5) && !empty($id_v6) && !empty($id_v7) && !empty($id_v8) && !empty($id_v9) && !empty($id_v10) && !empty($id_v11) && !empty($id_v12) && !empty($id_v13) && !empty($id_v14) && !empty($id_v15) && !empty($id_v16) && !empty($id_v17) && !empty($id_v18) && !empty($id_v19) && !empty($id_v20) && !empty($id_v21) && !empty($latitud) && !empty($longitud)) {
            // Configuración de la conexión a la base de datos PostgreSQL
            $dsn = "pgsql:host=localhost;port=5432;dbname=Colombia;user=main;password=Soum22";

            try {
                // Se establece la conexión a la base de datos
                $dbh = new PDO($dsn);
                // Habilitar el manejo de errores
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Prepara la consulta SQL para insertar los datos en la tabla correspondiente
                $stmt = $dbh->prepare("INSERT INTO datos4 
                                        (result_vulnerability, result_risk, result_functionality, id_v1, id_v2, id_v3, id_v4, id_v5, id_v6, id_v7, id_v8, id_v9, id_v10, id_v11, id_v12, id_v13, id_v14, id_v15, id_v16, id_v17, id_v18, id_v19, id_v20, id_v21, coordenadas, usuario) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ST_SetSRID(ST_MakePoint(?, ?), 4326), ?)");
                
                // Ejecuta la consulta con los valores de los campos del formulario
                $stmt->execute([$result_vulnerability, $result_risk, $result_functionality, $id_v1, $id_v2, $id_v3, $id_v4, $id_v5, $id_v6, $id_v7, $id_v8, $id_v9, $id_v10, $id_v11, $id_v12, $id_v13, $id_v14, $id_v15, $id_v16, $id_v17, $id_v18, $id_v19, $id_v20, $id_v21, $longitud, $latitud, $usuario]);
                
                // Envía una respuesta JSON de éxito
                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'message' => 'Los datos se han insertado correctamente en la base de datos']);
                exit;
            } catch (PDOException $e) {
                // Si ocurre un error en la conexión o en la consulta, mostrar el mensaje de error
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>
