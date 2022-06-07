<?php
require_once "koneksi.php";
class Pengunjung{
    public function get_pengunjungs()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_pengunjung";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pengunjung Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_pengunjung($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_pengunjung";
        if($id !=0)
        {
            $query.=" WHERE id_pengunjung=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pengunjung Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_pengunjung()
    {
        global $koneksi;
        $arrcheckpost = array('nama_pengunjung'=>'','no_pengenal'=>'','no_hp_pengunjung'=>'','negara_pengunjung'=>'','alamat_pengunjung'=>'','foto_identitas'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"INSERT INTO tbl_pengunjung SET
            nama_pengunjung='$_POST[nama_pengunjung]',
            no_pengenal='$_POST[no_pengenal]',
            no_hp_pengunjung='$_POST[no_hp_pengunjung]',
            negara_pengunjung='$_POST[negara_pengunjung]',
            alamat_pengunjung='$_POST[alamat_pengunjung]',
            foto_identitas='$_POST[foto_identitas]'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pengunjung berhasil ditambahkan.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pengunjung gagal ditambahkan.'
                );
            }
        }	else{
            $response=array(
                'status'=> 0,
                'message'=>'Paramater tidak sesuai.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_pengunjung($id)
    {
        global $koneksi;
        $arrcheckpost = array('nama_pengunjung'=>'','no_pengenal'=>'','no_hp_pengunjung'=>'','negara_pengunjung'=>'','alamat_pengunjung'=>'','foto_identitas'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"UPDATE tbl_pengunjung SET
            nama_pengunjung='$_POST[nama_pengunjung]',
            no_pengenal='$_POST[no_pengenal]',
            no_hp_pengunjung='$_POST[no_hp_pengunjung]',
            negara_pengunjung='$_POST[negara_pengunjung]',
            alamat_pengunjung='$_POST[alamat_pengunjung]',
            foto_identitas='$_POST[foto_identitas]'
            WHERE id_pengunjung='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pengunjung berhasil Diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pengunjung gagal Diubah.'
                );
            }
        }	else{
            $response=array(
                'status'=> 0,
                'message'=>'Paramater tidak sesuai.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function delete_pengunjung($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_pengunjung WHERE id_pengunjung=".$id;
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Pengunjung Berhasil Dihapus.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Pengunjung.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_nohp($id)
    {
        global $koneksi;
        $arrcheckpost = array('no_hp_pengunjung'=>'');
        parse_str(file_get_contents("php://input"),$input);
        if(isset($input['no_hp_pengunjung'])){
            $result = mysqli_query($koneksi,"UPDATE tbl_pengunjung SET no_hp_pengunjung= '{$input['no_hp_pengunjung']}' WHERE id_pengunjung='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'No Hp Pengunjung berhasil diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'No Hp Pengunjung gagal diubah.'
                );
            }
        }	else{
            $response=array(
                'status'=> 0,
                'message'=>'Paramater tidak sesuai.',
                'input'=> isset($input['no_hp_pengunjung']),
                'lainnya' => $input
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


?>
