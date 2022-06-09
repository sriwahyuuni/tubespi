<?php
require_once "method.php";
$barang = new Barang();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $barang->get_barang($id);
                }
                else
                {
                    $barang->get_barangs();
                }
                break;
                case 'POST':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $barang->update_barang($id);
                }
                else
                {
                    $barang->insert_barang();
                }
                break;
                case 'DELETE':
                $id=intval($_GET["id"]);
                $barang->delete_barang($id);
                break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
