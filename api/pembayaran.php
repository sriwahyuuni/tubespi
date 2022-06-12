<?php
require_once "method.php";
$pembayaran = new Pembayaran();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pembayaran->get_pembayaran($id);
                }
                else
                {
                    $pembayaran->get_all_pembayaran();
                }
                break;
                case 'POST':
                    $pembayaran->insert_pembayaran();
                
                break;
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>