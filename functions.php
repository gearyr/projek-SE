<?php 

$conn = mysqli_connect("localhost","root", "", "assignmenttracker");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    
    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $deadline = htmlspecialchars($data["deadline"]);
    $status = htmlspecialchars($data["status"]);

    // upload file
    $file = upload();
    if(!$file){
        return false;
    }

    $query = "INSERT INTO assignment_list VALUES
            ('','$title','$description','$deadline','$status', '$file')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function upload(){
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];
    
    // if($error == 4){
    //     echo "<script>
    //             alert('Pilih file terlebih dahulu!')
    //     </script>";
    //     return false;
    // }

    $ekstensiFileValid = ["png","jpg","jpeg","pdf","docx","doc","txt"];
    $ekstensiFile = explode('.',$namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    // if ( !in_array($ekstensiFile,$ekstensiFileValid) ){
    //     echo "<script>
    //             alert('ekstensi tidak dapat diterima!')
    //     </script>";
    //     return false;
    // }

    if( $ukuranFile > 1000000 ){
        echo "<script>
                alert('ukuran file terlalu besar!')
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;


    move_uploaded_file($tmpName,'files/'.$namaFileBaru);

    return $namaFileBaru;
}


function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM assignment_list WHERE AssgID = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $description = htmlentities($data["description"]);
    $deadline = htmlspecialchars($data["deadline"]);
    $status = htmlspecialchars($data["status"]);
    
    $file = upload();

    // if( $_FILES["gambar"]["error"] === 4 ){
    //     $gambar = $gambarLama;
    // } else{
    //     $gambar = upload();
    // }
  
    $query = "UPDATE assignment_list SET
                Title = '$title',
                Description = '$description',
                Deadline = '$deadline',
                Status = '$status',
                File = '$file'
                WHERE AssgID = '$id'
            ";
  
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";
    return query($query);
}

function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('Username sudah Terdaftar')
        </script>";
        return false;
    }    


    // cek konfirmasi password
    if( $password !== $password2 ){
        echo "<script>
                alert('Konfirmasi Password Salah')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}




?>


