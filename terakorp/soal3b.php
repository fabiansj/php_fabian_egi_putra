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
<div class="container" style="width: 50%;max-height: 100%;">
    <table id="tabelHobi">
        <tr>                        
            <td>Hobi</td>
            <td>Jumlah yang disukai</td>        
        </tr>
        <?php
            $sql = "SELECT hobi.hobi, COUNT(DISTINCT person.id) as jumlah_penyuka FROM hobi JOIN person ON hobi.person_id = person.id GROUP BY hobi.hobi ORDER By jumlah_penyuka DESC;";
            $data = mysqli_query($con, $sql);
            $no = 1;
            while($hasil = mysqli_fetch_array($data)){
        ?>
        <tr>                        
            <td><?php echo $hasil['hobi']; ?></td>
            <td><?php echo $hasil['jumlah_penyuka']; ?></td>     
        </tr>
        <?php
            }
        ?>
    </table>
</div>
<br>
<input type="text" style="margin-left: 10px;" id="inputSearch">
<button style="width:auto; heighth:auto;" onclick="buttonSearch()" onkeyup="buttonSearch()">Cari Hobbi</button>

<script>
    function buttonSearch(){
        var input,filter,table,tr,td,i,txtValue;
        input = document.getElementById('inputSearch');
        filter = input.value.toUpperCase();
        table = document.getElementById('tabelHobi');
        tr = table.getElementsByTagName('tr');        

        for(i=1;i < tr.length; i++){
            td = tr[i].getElementsByTagName('td')[0];

            if (td) {
                txtValue = td.textContent  || td.innerText;

                if(txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";                
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
