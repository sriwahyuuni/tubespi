<?php
require_once "method.php";
$pengunjung = new Pengunjung();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pengunjung->get_pengunjung($id);
                }
                else
                {
                    $pengunjung->get_pengunjungs();
                }
                break;
                case 'POST':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pengunjung->update_pengunjung($id);
                }
                else
                {
                    $pengunjung->insert_pengunjung();
                }
                break;
                case 'PATCH':
                        $id=intval($_GET["id"]);
                        $pengunjung->update_nohp($id);
                    
                    break;
                case 'DELETE':
                $id=intval($_GET["id"]);
                $pengunjung->delete_pengunjung($id);
                break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
