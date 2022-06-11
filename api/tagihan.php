<?php
require_once "method.php";
$tagihan = new Tagihan();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
                case 'GET':
                if(!empty($_GET["id"]))
                {
                    $id=intval($_GET["id"]);
                    $tagihan->get_tagihan($id);
                }
                else
                {
                    $tagihan->get_all_tagihan();
                }
                break;
                case 'POST':
                
                    $tagihan->insert_tagihan();
                
                break;
                case 'DELETE':
                $id=intval($_GET["id"]);
                $tagihan->delete_tagihan($id);
                break;
                default:
// Invalid Request Method
                header("HTTP/1.0 405 Method Not Allowed");
                break;
                break;
        }

?>
