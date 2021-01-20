<?php

class Admin extends Database{



    public function pagination(){

        $jumlahdataPerHalaman = 5;
        $result = $this->all("SELECT * FROM register");
        $jumlahData = $result->num_rows;
        $jumlahPage = ceil($jumlahData / $jumlahdataPerHalaman);
        return $jumlahPage;

    }

    public function index(){

        $jumlahdataPerHalaman = 5;
        $halaman_active = (int) (isset($_GET['page'])) ? $_GET['page'] : 1;

        if(!is_numeric($halaman_active)){
            header("Location: dashboard.php");
        }
        if($halaman_active <= 0){
            header("Location: dashboard.php");
        }

        $halamanAwal = (int) ($jumlahdataPerHalaman * $halaman_active) - $jumlahdataPerHalaman;

        $result = $this->all("SELECT nama,register_id,email,created_at,status,nip,alamat,foto,pass FROM register INNER JOIN detailt ON register.id = detailt.register_id LIMIT " . $halamanAwal . ',' . $jumlahdataPerHalaman);

        $arr = [];

        while($row = $result->fetch_array()){

            $arr[] = $row;
        }

            return $arr;

    }

    public function update(){
        
        if(isset($_POST['submit_edit'])){

            $id = $_POST['id_edit'];
            $nama = $this->validate_char($_POST['nama_edit']);
            $email = $this->validate_char($_POST['email_edit']);
            $nip = $this->validate_char($_POST['nip_edit']);
            $alamat = $this->validate_char($_POST['alamat_edit']);

             $this->create("UPDATE register INNER JOIN detailt ON register.id = detailt.register_id
             SET nama = '$nama', email = '$email', nip = '$nip', alamat = '$alamat' WHERE detailt.register_id = '$id' ", 'dashboard.php');              

        }

    }


}