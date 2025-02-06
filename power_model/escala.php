<?php

require_once(__DIR__ . '/../includes/database.php');

class Escala
{

    public static function create_escala($nombre, $cuerda_6, $cuerda_5, $cuerda_4, $cuerda_3, $cuerda_2, $cuerda_1, $afinacion_id)
    {
        $database = new Database();
        $conn = $database->getConnection();

        try {
            $stmt = $conn->prepare('INSERT INTO power_escala(nombre, cuerda_6, cuerda_5, cuerda_4, cuerda_3, cuerda_2, cuerda_1, afinacion_id)
                                    VALUES(:nombre, :cuerda_6, :cuerda_5, :cuerda_4, :cuerda_3, :cuerda_2, :cuerda_1, :afinacion_id)');
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':cuerda_6', $cuerda_6);
            $stmt->bindParam(':cuerda_5', $cuerda_5);
            $stmt->bindParam(':cuerda_4', $cuerda_4);
            $stmt->bindParam(':cuerda_3', $cuerda_3);
            $stmt->bindParam(':cuerda_2', $cuerda_2);
            $stmt->bindParam(':cuerda_1', $cuerda_1);
            $stmt->bindParam(':afinacion_id', $afinacion_id);

            if ($stmt->execute()) {
                header('HTTP/1.1 201 Created');
                echo json_encode(["message" => "✅ escala registrado correctamente."]);
            } else {
                throw new Exception("El escala no se ha registrado.");
            }
        } catch (Exception $e) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    public static function delete_escala($id)
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('DELETE FROM power_escala WHERE id_escala=:id');
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Deleted');
            echo json_encode(["message" => "✅ escala eliminado correctamente."]);
        } else {
            throw new Exception("El escala no se ha eliminado.");
        }
    }

    public static function get_all_escala()
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('SELECT nombre, cuerda_6, cuerda_5, cuerda_4, cuerda_3, cuerda_2, cuerda_1, afinacion_id FROM power_escala');

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            header('HTTP/1.1 201 OK');
        } else {
            throw new Exception("Error de consulta.");
        }
    }


    public static function update_escala($id, $nombre, $cuerda_6, $cuerda_5, $cuerda_4, $cuerda_3, $cuerda_2, $cuerda_1, $afinacion_id)
    {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('UPDATE power_escala set nombre=:nombre, cuerda_6=:cuerda_6, cuerda_5=:cuerda_5, cuerda_4=:cuerda_4, 
        cuerda_3=:cuerda_3, cuerda_2=:cuerda_2, cuerda_1=:cuerda_1, afinacion_id=:afinacion_id WHERE id_escala=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':cuerda_6', $cuerda_6);
        $stmt->bindParam(':cuerda_5', $cuerda_5);
        $stmt->bindParam(':cuerda_4', $cuerda_4);
        $stmt->bindParam(':cuerda_3', $cuerda_3);
        $stmt->bindParam(':cuerda_2', $cuerda_2);
        $stmt->bindParam(':cuerda_1', $cuerda_1);
        $stmt->bindParam(':afinacion_id', $afinacion_id);

        if ($stmt->execute()) {
            header('HTTP/1.1 201 Updated');
            echo json_encode(["message" => "✅ escala actualizado correctamente."]);
        } else {
            throw new Exception("El escala no se ha actualizado.");
        }
    }
}
