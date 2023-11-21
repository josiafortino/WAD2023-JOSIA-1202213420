<?php

require 'connect.php';

// (1) Mulai session
    session_start();
//

// (2) Ambil nilai input dari form registrasi

    $email = $_POST['email'];// a. Ambil nilai input email
    $name = $_POST['name'];// b. Ambil nilai input name
    $username = $_POST['username'];// c. Ambil nilai input username
    $password = $_POST['password'];// d. Ambil nilai input password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);// e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()

//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $query_a = "SELECT * FROM users WHERE email = '$email'";
    $hasil = mysqli_query($db,$query_a);
//

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
if(mysqli_num_rows($hasil)==0){

    // a. Buatlah query untuk melakukan insert data ke dalam database
    $query_b = "INSERT INTO users (name,username,email,password) VALUES ('$name', '$username','$email','$password')";
    $insert = mysqli_query($db,$query_b);
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
    if($insert){
        $_SESSION['message'] = 'Pendaftaran Berhasil!';
        $_SESSION['color']= 'success';
        header('Location: ../views/login.php');
    }else{
        $_SESSION['message'] = 'Pendaftaran Gagal';
    }
}    
// 

// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
else{
    $_SESSION['message'] = 'Email sudah terdaftar';
    header('Location: ../views/register.php');
}
//

?>