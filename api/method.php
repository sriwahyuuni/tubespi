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
            $query.=" WHERE no_pengenal=".$id." OR no_hp_pengunjung=".$id." LIMIT 1";
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
        $query="SELECT * FROM tbl_kamar JOIN tbl_tipe ON tbl_kamar.id_tipe = tbl_tipe.id_tipe";
        if($id !=0)
        {
            $query.=" WHERE id_kamar=".$id." OR nomor_kamar=".$id." LIMIT 1";
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
            $result = mysqli_query($koneksi,"UPDATE tbl_kamar SET harga_kamar= '{$input['harga_kamar']}' WHERE nomor_kamar='$id'
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
            $query.=" WHERE id_pegawai=".$id." OR nik_pegawai=".$id." LIMIT 1";
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
        $arrcheckpost = array('nama_pegawai'=>'','nik_pegawai'=>'','alamat_pegawai'=>'','no_hp_pegawai'=>'','foto_pegawai'=>'','tgl_kerja'=>'','status'=>'','pekerjaan'=>'');
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


// Class untuk mengolah tabel tbl_pemesanan
class Pemesanan{
    public function get_all_pemesanan()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_pemesanan";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pemesanan Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_pemesanan($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_pemesanan JOIN tbl_pengunjung ON tbl_pemesanan.id_pengunjung = tbl_pengunjung.id_pengunjung";
        if($id !=0)
        {
            $query.=" WHERE no_pengenal=".$id." OR id_pemesanan=".$id." LIMIT 1";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pemesanan Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_pemesanan()
    {
        global $koneksi;
        $arrcheckpost = array('nik_pengunjung'=>'','no_kamar'=>'','id_kasir'=>'','tanggal_chekin'=>'','jumlah_pengunjung'=>'','deposit'=>'','pekerja_1'=>'','pekerja_2'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $no_kamar = $_POST['no_kamar'];
            $querykamar =$koneksi->query("SELECT * FROM tbl_kamar WHERE nomor_kamar = '$no_kamar' LIMIT 1");
            $detailkamar = $querykamar->fetch_assoc();
            $id_kamar = $detailkamar['id_kamar'];
            $status_kamar = $detailkamar['status'];
            if($status_kamar=="Ditempati"){
                $response=array(
                    'status' => 1,
                    'message' => 'Pemesanan Gagal Kamar sudah ditempati.'
                );
            }
            else{
            $no_pengenal = $_POST['nik_pengunjung'];
            $querypengunjung =$koneksi->query("SELECT * FROM tbl_pengunjung WHERE no_pengenal = '$no_pengenal' LIMIT 1");
            $detailpengunjung = $querypengunjung->fetch_assoc();
            $id_pengunjung = $detailpengunjung['id_pengunjung'];
            
            $result = mysqli_query($koneksi,"INSERT INTO tbl_pemesanan SET
            id_pengunjung='$id_pengunjung',
            id_kamar='$id_kamar',
            id_kasir='$_POST[id_kasir]',
            check_in='$_POST[tanggal_chekin]',
            jumlah_pengunjung='$_POST[jumlah_pengunjung]',
            deposit='$_POST[deposit]',
            pekerja_1='$_POST[pekerja_1]',
            pekerja_2='$_POST[pekerja_2]'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pemesanan berhasil.'
                );
                $koneksi->query("UPDATE tbl_kamar SET status = 'Ditempati' WHERE id_kamar = '$id_kamar'");
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pemesanan gagal .'
                );
            }
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
    public function update_jumlah($id)
    {
        global $koneksi;
        $arrcheckpost = array('jumlah_pengunjung'=>'');
        parse_str(file_get_contents("php://input"),$input);
        if(isset($input['jumlah_pengunjung'])){
            $result = mysqli_query($koneksi,"UPDATE tbl_pemesanan SET jumlah_pengunjung= '{$input['jumlah_pengunjung']}' WHERE id_pemesanan='$id'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Jumlah berhasil diubah.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Jumlah gagal diubah.'
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
    function delete_pemesanan($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_pemesanan WHERE id_pemesanan=".$id;
        $querypemesanan =$koneksi->query("SELECT * FROM tbl_pemesanan WHERE id_pemesanan = '$id' LIMIT 1");
            $detailpemesanan = $querypemesanan->fetch_assoc();
            $id_kamar = $detailpemesanan['id_kamar'];
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Pemesanan Berhasil Dibatalkan.'
            );
            $koneksi->query("UPDATE tbl_kamar SET status = 'Kosong' WHERE id_kamar = '$id_kamar'");
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Pemesanan.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}




// Class untuk mengolah tabel tbl_tambahan
class Tagihan{
    public function get_all_tagihan()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_tambahan";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Tagihan Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_tagihan($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_tambahan";
        if($id !=0)
        {
            $query.=" WHERE id_pemesanan= '$id'";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Tagihan Pemesanan Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_tagihan()
    {
        global $koneksi;
        $arrcheckpost = array('id_pemesanan'=>'','id_barang'=>'','jumlah_barang'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $id_pemesanan = $_POST['id_pemesanan'];
            $querypemesanan =$koneksi->query("SELECT * FROM tbl_pemesanan WHERE id_pemesanan = '$id_pemesanan' LIMIT 1");
            $hitung_pemesanan= mysqli_num_rows($querypemesanan);
            if($hitung_pemesanan==0){
                $response=array(
                    'status' => 1,
                    'message' => 'Tambah tagihan Gagal, id_pemesanan tidak ada.'
                );
            }
            else{
            $id_barang = $_POST['id_barang'];
            $querybarang =$koneksi->query("SELECT * FROM tbl_barang WHERE id_barang = '$id_barang' LIMIT 1");
            $detailbarang = $querybarang->fetch_assoc();
            $nama_barang = $detailbarang['nama_barang'];
            $harga_barang = $detailbarang['harga_barang'];
            $jumlah_barang = $_POST['jumlah_barang'];
            $total_harga = $harga_barang*$jumlah_barang;

            $result = mysqli_query($koneksi,"INSERT INTO tbl_tambahan SET
            id_pemesanan='$id_pemesanan',
            id_barang='$id_barang',
            nama_barang='$nama_barang',
            harga_barang='$harga_barang',
            jumlah_barang='$jumlah_barang',
            total_harga='$total_harga'
            ");

            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pemesanan berhasil.'
                );
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pemesanan gagal .'
                );
            }
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
    function delete_tagihan($id)
    {
        global $koneksi;
        $query="DELETE FROM tbl_tambahan WHERE id_tambahan=".$id;
        if(mysqli_query($koneksi, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Tagihan Berhasil Dibatalkan.'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Gagal Menghapus Tagihan.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}




// Class untuk mengolah tabel tbl_pembayaran
class Pembayaran{
    public function get_all_pembayaran()
    {
        global $koneksi;
        $query= "SELECT * FROM tbl_pembayaran";
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pembayaran Kamar Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }
    public function get_pembayaran($id=0)
    {
        global $koneksi;
        $query="SELECT * FROM tbl_pembayaran";
        if($id !=0)
        {
            $query.=" WHERE id_pemesanan= '$id'";
        }
        $data=array();
        $result=$koneksi->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Data Pemesanan Losmen Pojok.',
            'data'=> $data
            );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function insert_pembayaran()
    {
        global $koneksi;
        $arrcheckpost = array('id_pemesanan'=>'','id_kasir'=>'','checkout'=>'','pekerja_1'=>'','pekerja_2'=>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $id_pemesanan = $_POST['id_pemesanan'];
            $querypemesanan =$koneksi->query("SELECT * FROM tbl_pemesanan JOIN tbl_kamar ON tbl_pemesanan.id_kamar = tbl_kamar.id_kamar WHERE id_pemesanan = '$id_pemesanan' LIMIT 1");
            $detailpemesanan = $querypemesanan->fetch_assoc();
            $hitung_pemesanan= mysqli_num_rows($querypemesanan);
            $status_pembayaran = $detailpemesanan['status_pemesanan'];
            if($hitung_pemesanan==0){
                $response=array(
                    'status' => 1,
                    'message' => 'Tambah tagihan Gagal, id_pemesanan tidak ada.'
                );
            }
            else{
            if($status_pembayaran=='Sudah Bayar'){
                $response=array(
                    'status' => 1,
                    'message' => 'Tambah tagihan Gagal, id_pemesanan Sudah Dibayar.'
                );
            }
            else{
            $jumlah_pengunjung = $detailpemesanan['jumlah_pengunjung'];
            $id_kamar = $detailpemesanan['id_kamar'];
            $kapasitas_maks = $detailpemesanan['kapasitas_maks'];
            $harga_kamar = $detailpemesanan['harga_kamar'];
            $id_pengunjung = $detailpemesanan['id_pengunjung'];
            $tgl1 = $detailpemesanan['check_in'];
            $tgl2 = $_POST['checkout'];
            $chekin = new DateTime("$tgl1");
            $checkout = new DateTime("$tgl2");
            $d = $checkout->diff($chekin)->days + 1;
            

            if($jumlah_pengunjung > $kapasitas_maks){
                $tagihan_kamar=($harga_kamar + 50000)*$d;
            }
            else{
                $tagihan_kamar= $harga_kamar*$d;
            }
            
            $querytambahan =$koneksi->query("SELECT SUM(total_harga) AS tagihan_tambahan FROM tbl_tambahan WHERE id_pemesanan = '$id_pemesanan'");
            $detailtambahan = $querytambahan->fetch_assoc();
            $hitung_tambahan= mysqli_num_rows($querytambahan);

            if($hitung_tambahan==0){
                $tagihan_tambahan= 0;

            }
            else{
                $tagihan_tambahan = $detailtambahan['tagihan_tambahan'];
            }

            $total_pembayaran = $tagihan_kamar+$tagihan_tambahan;
            $result = mysqli_query($koneksi,"INSERT INTO tbl_pembayaran SET
            id_pemesanan='$id_pemesanan',
            id_pengunjung='$id_pengunjung',
            id_kasir='$_POST[id_kasir]',
            check_out='$tgl2',
            tagihan_kamar='$tagihan_kamar',
            tagihan_tambahan='$tagihan_tambahan',
            pekerja_1='$_POST[pekerja_1]',
            pekerja_2='$_POST[pekerja_2]',
            total_pembayaran='$total_pembayaran'
            ");
            $id_pembayaran = $koneksi->insert_id;
            $data_pembayaran = $koneksi->query("SELECT * FROM tbl_pembayaran WHERE id_pembayaran = '$id_pembayaran'");
            $data=array();
            while($row=mysqli_fetch_object($data_pembayaran))
            {
                $data[]=$row;
            }
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Pemesanan berhasil.',
                    'data'=> $data
                );
                $koneksi->query("UPDATE tbl_kamar SET status = 'Kosong' WHERE id_kamar = '$id_kamar'");
                $koneksi->query("UPDATE tbl_pemesanan SET status_pemesanan = 'Sudah Bayar' WHERE id_pemesanan = '$id_pemesanan'");
                echo $d." hari";
            }
            else{
                $response=array(
                    'status'=> 0,
                    'message' => 'Pemesanan gagal .'
                );
            }
        }
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
