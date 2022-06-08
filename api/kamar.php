<?php
require_once "method.php";
$kamar = new Kamar();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $kamar->get_kamar($id);
                }
                else
                {
                    $kamar->get_kamars();
                }
                break;
                case 'POST':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $kamar->update_kamar($id);
                }
                else
                {
                    $kamar->insert_kamar();
                }
                break;
                case 'PATCH':
                        $id=intval($_GET["id"]);
                        $kamar->update_harga($id);
                    
                    break;
                case 'DELETE':
                $id=intval($_GET["id"]);
                $kamar->delete_kamar($id);
                break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
