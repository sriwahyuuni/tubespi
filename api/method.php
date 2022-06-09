<?php
require_once "koneksi.php";

// Class untuk mengolah tabel tbl_pengunjung
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
                'message'=>'Paramater tidak sesuai.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}



// Class untuk mengolah tabel tbl_kamar
class Kamar{
    public function get_kamars()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_kamar";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_kamar($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_kamar";
        if($id !=0)
        {
            $query.=" WHERE id_kamar=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_kamar()
    {
        global $koneksi;
        $arrcheckpost = array('id_tipe'=>'','status'=>'','tingkat'=>'','nomor_kamar'=>'','kapasitas_maks'=>'','harga_kamar'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"INSERT INTO tbl_kamar SET
            id_tipe='$_POST[id_tipe]',
            status ='$_POST[status]',
            tingkat='$_POST[tingkat]',
            nomor_kamar='$_POST[nomor_kamar]',
            kapasitas_maks='$_POST[kapasitas_maks]',
            harga_kamar='$_POST[harga_kamar]'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Kamar berhasil ditambahkan.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Kamar gagal ditambahkan.'
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
    public function update_kamar($id)
    {
        global $koneksi;
        $arrcheckpost = array('id_tipe'=>'','status'=>'','tingkat'=>'','nomor_kamar'=>'','kapasitas_maks'=>'','harga_kamar'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"UPDATE tbl_kamar SET
            id_tipe='$_POST[id_tipe]',
            status ='$_POST[status]',
            tingkat='$_POST[tingkat]',
            nomor_kamar='$_POST[nomor_kamar]',
            kapasitas_maks='$_POST[kapasitas_maks]',
            harga_kamar='$_POST[harga_kamar]'
            WHERE id_kamar='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Kamar berhasil Diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Kamar gagal Diubah.'
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
    function delete_kamar($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_kamar WHERE id_kamar=".$id;
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Kamar Berhasil Dihapus.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Kamar.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_harga($id)
    {
        global $koneksi;
        $arrcheckpost = array('harga_kamar'=>'');
        parse_str(file_get_contents("php://input"),$input);
        if(isset($input['harga_kamar'])){
            $result = mysqli_query($koneksi,"UPDATE tbl_kamar SET harga_kamar= '{$input['harga_kamar']}' WHERE id_kamar='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Harga Kamar berhasil diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Harga Kamar gagal diubah.'
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
}

// Class untuk mengolah tabel tbl_barang
class Barang{
    public function get_barangs()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_barang";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Barng yang disediakan di Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_barang($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_barang";
        if($id !=0)
        {
            $query.=" WHERE id_barang=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Barang Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_barang()
    {
        global $koneksi;
        $arrcheckpost = array('nama_barang'=>'','harga_barang'=>'','jenis_barang'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"INSERT INTO tbl_barang SET
            nama_barang='$_POST[nama_barang]',
            harga_barang ='$_POST[harga_barang]',
            jenis_barang='$_POST[jenis_barang]'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Barng berhasil ditambahkan.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Barang gagal ditambahkan.'
                );
            }
        }	else{
            $response=array(
                'status'=> 0,
                'message'=>'Paramater tidak sesuai.',
                'post'=> $_POST
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_barang($id)
    {
        global $koneksi;
        $arrcheckpost = array('nama_barang'=>'','harga_barang'=>'','jenis_barang'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"UPDATE tbl_barang SET
            nama_barang='$_POST[nama_barang]',
            harga_barang ='$_POST[harga_barang]',
            jenis_barang='$_POST[jenis_barang]'
            WHERE id_barang='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Barang berhasil Diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Barang gagal Diubah.'
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
    function delete_barang($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_barang WHERE id_barang=".$id;
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Barang Berhasil Dihapus.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Barang.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}

// Class untuk menampilkan tipe kamar
class Tipe{
    public function get_tipes()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_tipe";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Tipe Kamar yang disediakan di Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_tipe($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_tipe";
        if($id !=0)
        {
            $query.=" WHERE id_tipe=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Tipe Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function patch_detail($id)
    {
        global $koneksi;
        $arrcheckpost = array('detail'=>'');
        parse_str(file_get_contents("php://input"),$input);
        if(isset($input['detail'])){
            $result = mysqli_query($koneksi,"UPDATE tbl_tipe SET detail= '{$input['detail']}' WHERE id_tipe='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Detail kamar berhasil diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Detail gagal diubah.'
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
}


// Class untuk mengolah tabel tbl_pegawai
class Pegawai{
    public function get_pegawais()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_pegawai";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Daftar Pegawai Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_pegawai($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_pegawai";
        if($id !=0)
        {
            $query.=" WHERE id_pegawai=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pegawai Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_pegawai()
    {
        global $koneksi;
        $arrcheckpost = array('nama_pegawai'=>'','nik_pegawai'=>'','alamat_pegawai'=>'','no_hp_pegawai'=>'','foto_pegawai'=>'','tgl_kerja'=>'','status'=>'','pekerjaan'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"INSERT INTO tbl_pegawai SET
            nama_pegawai='$_POST[nama_pegawai]',
            nik_pegawai='$_POST[nik_pegawai]',
            alamat_pegawai='$_POST[alamat_pegawai]',
            no_hp_pegawai='$_POST[no_hp_pegawai]',
            foto_pegawai='$_POST[foto_pegawai]',
            tgl_kerja='$_POST[tgl_kerja]',
            status='$_POST[status]',
            pekerjaan='$_POST[pekerjaan]'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pegawai berhasil ditambahkan.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pegawai gagal ditambahkan.'
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
        $arrcheckpost = array('nama_pegawai'=>'','nik_pegawai'=>'','alamat_pegawai'=>'','no_hp_pegawai'=>'','foto_pegawi'=>'','tgl_kerja'=>'','status'=>'','pekerjaan'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($koneksi,"UPDATE tbl_pegawai SET
            nama_pegawai='$_POST[nama_pegawai]',
            nik_pegawai='$_POST[nik_pegawai]',
            alamat_pegawai='$_POST[alamat_pegawai]',
            no_hp_pegawai='$_POST[no_hp_pegawai]',
            foto_pegawai='$_POST[foto_pegawai]',
            tgl_kerja='$_POST[tgl_kerja]',
            status='$_POST[status]',
            pekerjaan='$_POST[pekerjaan]'
            WHERE id_pegawai='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pegawai berhasil Diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pegawai gagal Diubah.'
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
    function delete_pegawai($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_pegawai WHERE id_pegawai=".$id;
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Pegawai Berhasil Dihapus.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Pegawai.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_status($id)
    {
        global $koneksi;
        $arrcheckpost = array('status'=>'');
        parse_str(file_get_contents("php://input"),$input);
        if(isset($input['status'])){
            $result = mysqli_query($koneksi,"UPDATE tbl_pegawai SET status= '{$input['status']}' WHERE id_pegawai='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Status berhasil diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Status gagal diubah.'
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
}
?>
