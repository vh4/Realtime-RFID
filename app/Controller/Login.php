<?php

class Login extends Database{

    public function register(){

        if (isset($_POST['submit'])) {
            $email = $this->validate_char($_POST['email']);
            $nama = $this->validate_char($_POST['nama']);
            $password = $this->validate_char($_POST['password']);
            $password1 = $this->validate_char($_POST['password_konfirmasi']);


            $alamat = $_POST['alamat'];
            $nip = $this->validate_char($_POST['nip']);

            $image = basename($_FILES['gambar']['name']);

            $target = "/opt/lampp/htdocs/kantor/public/assets/images/" . $image;


            $tmp = $_FILES['gambar']['tmp_name'];
            $size = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];

            $arr = ['jpg', 'jpeg', 'png'];
            $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
            
            if($error === 4){
                echo "
                <script>alert('Gambar harus dipilih');</script>
                ";
            }
            elseif(!in_array($imageFileType, $arr)){
                echo "
                <script>alert('hanya di izinkan gambar');</script>
                ";

            }

            elseif($size > 5000000){

                echo "
                <script>alert('gambar terlalu besar');</script>
                ";  
            }

            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "
                <script>alert('Email yang benar cok , karakter dikondisikan');</script>
                ";
            }

            elseif (strlen($password) < 8) {
                echo "
                <script>alert('min 8 pass');</script>
                ";
            } elseif ($password !== $password1) {
                echo "
                <script>alert('password harus sama');</script>
                ";            
            } else {
                $cek = $this->all("SELECT * FROM register WHERE email = '$email' ");
                
                if ($cek->num_rows > 0) {
                    echo "
                    <script>alert('email sudah terdaftar cok, coba email lain');</script>
                    ";
                }
                else {
                    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
                    $result = $this->createWithoutHeader("INSERT INTO register SET nama = '$nama', email = '$email', pass = '$hash_pass', status = 'user' ");

                    if($result === true){

                        $result = $this->all("SELECT * FROM register where email = '$email' ");
                        $fetch = $result->fetch_array();


                        if(move_uploaded_file($tmp, $target)){

                            $id_detail = $fetch['id'];
                            $result = $this->create("INSERT INTO detailt SET register_id = '$id_detail', nip = '$nip', alamat = '$alamat', foto = '$image' ", 'view/index.php');
                        }

                    }
                }
            }
        }
    }

    public function Masuk(){
   
        if(isset($_POST['submit_login'])){
            
            $email = $this->validate_char($_POST['email_login']);
            $password = $this->validate_char($_POST['password_login']);
            
            $get_password = $this->all("SELECT nama,email,created_at,status,nip,alamat,foto,pass, register.id FROM register INNER JOIN detailt ON register.id = detailt.register_id WHERE email = '$email' ");


            if($get_password->num_rows === 1){

                $get_password = $get_password->fetch_array();

                if(password_verify($password, $get_password['pass'])){
                    session_start();

                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $get_password['id'];
                    $_SESSION['nama'] = $get_password['nama'];
                    $_SESSION['email'] = $get_password['email'];
                    $_SESSION['alamat'] = $get_password['alamat'];
                    $_SESSION['foto'] = $get_password['foto'];
                    $_SESSION['nip'] = $get_password['nip'];
                    $_SESSION['created_at'] = $get_password['created_at'];
                    $_SESSION['status'] = $get_password['status'];
                    header("Location: dashboard.php");
        
                }
                else{
                    echo "
                    <script>alert('Password masukan salah');</script>
                    ";
    
                 }

            }


        }
    }

}