<?php
require_once "method.php";
$pegawai = new Pegawai();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pegawai->get_pegawai($id);
                }
                else
                {
                    $pegawai->get_pegawais();
                }
                break;
                case 'POST':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $pegawai->update_pegawai($id);
                }
                else
                {
                    $pegawai->insert_pegawai();
                }
                break;
                case 'PUT':
                        $id=intval($_GET["id"]);
                        $pegawai->update_status($id);
                    
                    break;
                case 'DELETE':
                $id=intval($_GET["id"]);
                $pegawai->delete_pegawai($id);
                break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
