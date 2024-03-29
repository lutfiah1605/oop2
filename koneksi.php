<?php 
    class koneksi
    {
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "ourzakat";
        public $koneksi = "";

        function __construct(){
            $this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
            if (mysqli_connect_errno()){
                echo "Koneksi database gagal : ".mysqli_connect_error();
            }
        }    
        public function tampilData($query){
            $data = mysqli_query($this->koneksi,$query);
            while($row = mysqli_fetch_assoc($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }     
        public function tambahberas($harga_ltr,$harga_jiwa){
            mysqli_query($this->koneksi, "INSERT INTO beras (harga_ltr, harga_jiwa) VALUES ('$harga_ltr', '$harga_jiwa')");
        }
        public function editFakultas($harga_ltr,$harga_jiwa,$id){
            mysqli_query($this->koneksi, "UPDATE beras SET harga_ltr='$harga_ltr', nm_fakultas='$harga_jiwa' WHERE id='$id' ");
        }
        public function hapusberas($id){            
            mysqli_query($this->koneksi, "DELETE FROM beras WHERE id = '$id'");
        }
    }
    // $db = new koneksi;
    // $query = "select * from fakultas";
    // $hasil = $db->tampilData($query);
    // var_dump($hasil);
?>