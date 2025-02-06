<?php

require_once(__DIR__ . '/../includes/database.php');

class Afinacion
{

    public static function create_afinacion($nombre, $cuerda_6, $cuerda_5, $cuerda_4, $cuerda_3, $cuerda_2, $cuerda_1)
    {
        $database = new Database();
        $conn = $database->getConnection();

        try {
            $stmt = $conn->prepare('INSERT INTO power_afinacion(nombre, cuerda_6, cuerda_5, cuerda_4, cuerda_3, cuerda_2, cuerda_1)
                                    VALUES(:nombre, :cuerda_6, :cuerda_5, :cuerda_4, :cuerda_3, :cuerda_2, :cuerda_1)');
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':cuerda_6', $cuerda_6);
            $stmt->bindParam(':cuerda_5', $cuerda_5);
            $stmt->bindParam(':cuerda_4', $cuerda_4);
            $stmt->bindParam(':cuerda_3', $cuerda_3);
            $stmt->bindParam(':cuerda_2', $cuerda_2);
            $stmt->bindParam(':cuerda_1', $cuerda_1);

            if ($stmt->execute()) {
                header('HTTP/1.1 201 Created');
                echo json_encode(["message" => "✅ afinacion registrado correctamente."]);
            } else {
                throw new Exception("El afinacion no se ha registrado.");
            }
        } catch (Exception $e) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    public static function delete_afinacion($id)
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('DELETE FROM power_afinacion WHERE afinacion_id=:id');
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Deleted');
            echo json_encode(["message" => "✅ afinacion eliminado correctamente."]);
        } else {
            throw new Exception("El afinacion no se ha eliminado.");
        }
    }

    public static function get_all_afinacion()
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('SELECT nombre, cuerda_6, cuerda_5, cuerda_4, cuerda_3, cuerda_2, cuerda_1 FROM power_afinacion');

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            header('HTTP/1.1 201 OK');
        } else {
            throw new Exception("Error de consulta.");
        }
    }


    public static function update_afinacion($id, $nombre, $cuerda_6, $cuerda_5, $cuerda_4, $cuerda_3, $cuerda_2, $cuerda_1)
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('UPDATE power_afinacion set nombre=:nombre, cuerda_6=:cuerda_6, cuerda_5=:cuerda_5, cuerda_4=:cuerda_4, 
        cuerda_3=:cuerda_3, cuerda_2=:cuerda_2, cuerda_1=:cuerda_1, WHERE id_afinacion=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':cuerda_6', $cuerda_6);
        $stmt->bindParam(':cuerda_5', $cuerda_5);
        $stmt->bindParam(':cuerda_4', $cuerda_4);
        $stmt->bindParam(':cuerda_3', $cuerda_3);
        $stmt->bindParam(':cuerda_2', $cuerda_2);
        $stmt->bindParam(':cuerda_1', $cuerda_1);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Updated');
            echo json_encode(["message" => "✅ afinacion actualizado correctamente."]);
        } else {
            throw new Exception("El afinacion no se ha actualizado.");
        }
    }
}
