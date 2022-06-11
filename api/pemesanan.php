<?php
require_once "method.php";
$pemesanan = new Pemesanan();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pemesanan->get_pemesanan($id);
                }
                else
                {
                    $pemesanan->get_all_pemesanan();
                }
                break;
                case 'POST':
                
                    $pemesanan->insert_pemesanan();
                
                break;
                case 'PATCH':
                    $id=intval($_GET["id"]);
                    $pemesanan->update_jumlah($id);
                break;
                case 'DELETE':
                    $id=intval($_GET["id"]);
                    $pemesanan->delete_pemesanan($id);
                    break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
