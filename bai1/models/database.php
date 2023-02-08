<?php
function connection()
{
    try {
        $conn = new PDO("mysql:host=localhost; dbname=lab1; charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "loi ket noi du lieu: " . $e->getMessage();
    }
}

function getData($sql)
{
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function exeQuery($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function queryOne($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function products_select_by_id($id)
{
  $sql = "SELECT * FROM car Where id = ?";
  return queryOne($sql, $id);
}

function products_update($id, $carName, $image, $price, $description ,$version, $gear, $origin, $brand_id)
{
  $sql = "UPDATE car SET carName = ?, image = ?, price = ?, description = ?, version =?, gear=?, origin=?, brand_id=? where id = ?";
  queryOne($sql, $carName, $image, $price, $description, $version, $gear, $origin, $brand_id, $id);
}
function products_delete($id)
{
  $removeProductsQuery = " delete from car where id = ? " ;
  exeQuery ( $removeProductsQuery , $id ) ;
}
?>