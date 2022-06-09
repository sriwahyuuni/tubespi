<?php
require_once "method.php";
$tipe = new Tipe();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $tipe->get_tipe($id);
                }
                else
                {
                    $tipe->get_tipes();
                }
                break;
                case 'PATCH':
                        $id=intval($_GET["id"]);
                        $tipe->patch_detail($id);
                    
                    break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
