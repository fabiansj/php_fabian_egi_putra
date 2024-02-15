<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        * {
            box-sizing: border-box;
        }

        .container {
            display: flex;
        }

        table {
            border: 1px solid black;
            margin: 0 10px; /* Menambahkan jarak antara kedua tabel */
            width: 100%;
            max-height: 100px;
            overflow: hidden;      
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        table:nth-child(2){
                
        }
        h3 {
            margin-left: 10px; /* Add padding to the right of the heading */
        }
</style>
<body>
    <h3>TABEL PERSON DAN HOBI</h3>    
<div class="container">
    <table>
        <tr>            
            <td>id</td>
            <td>Nama</td>
            <td>Alamat</td>        
        </tr>
        <?php
            $sql = "SELECT * FROM person";
            $data = mysqli_query($con, $sql);
            $no = 1;
            while($hasil = mysqli_fetch_array($data)){
        ?>
        <tr>            
            <td><?php echo $hasil['id']; ?></td>
            <td><?php echo $hasil['nama']; ?></td>
            <td><?php echo $hasil['alamat']; ?></td>     
        </tr>
        <?php
            }
        ?>
    </table>


    <!-- table ke 2 -->
    <table>        
        <tr>            
            <td>id</td>
            <td>Nama</td>
            <td>Alamat</td>        
        </tr>
        <?php
            $sql = "SELECT * FROM hobi";
            $data = mysqli_query($con, $sql);
            $no = 1;
            while($hasil = mysqli_fetch_array($data)){
        ?>
        <tr>            
            <td><?php echo $hasil['id']; ?></td>
            <td><?php echo $hasil['person_id']; ?></td>
            <td><?php echo $hasil['hobi']; ?></td>     
        </tr>
        <?php
            }
        ?>
    </table>
</div>
</body>
</html>
