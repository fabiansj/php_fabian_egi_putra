<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1 Php </title>
</head>
<style>
    * {
        box-sizing: border-box;
    }    
    .container{
        width: 450px;        
        height: auto;
        border: 2px solid black;
        margin: 0 auto 10px auto ;
        padding:10px;
    }    
    button{
        display: block;
        margin: 10px auto 0 auto ;
        text-align: center;
    }
    .inputsoal1a{
        /* width:  */
    }
</style>
<body>
    <div class="container">
        <table>
        <tr>
            <td>
            <label for="">Inputkan Jumlah Baris:</label>    
            <input type="text" id="inputBaris">
            <label for="">Contoh:1</label>    
            </td>
        </tr>       
        <tr>
            <td>
            <label for="">Inputkan Jumlah Kolom:</label>    
            <input type="text" id="inputKolom">
            <label for="">Contoh:1</label>
            </td>           
        </tr>       
    </table>    
    <button type="submit" onclick="showTampilan2()">SUBMIT</button>
    </div>

    <div class="container" id="divform" style="display: none;">
        <div id="soaltampilan2" style="display: none;width:100%;">            
        </div>
        <button type="submit" onclick="showTampilan3()">SUBMIT</button>
        <!-- <form id="soaltampilan2" style="display: none;">
            <label for="">1.1</label>
            <input type="text" style="width: 100px;margin-right:10px">
            <label for="">1.2</label>
            <input type="text" style="width: 100px;margin-right:10px">            
            <label for="">1.3</label>            
            <input type="text" style="width: 100px;margin-right:10px">
        </form>
        <button type="submit" onclick="showTampilan3()">SUBMIT</button> -->
    </div>

    <div class="container" id="soaltampilan3" style="display: none;">
        <p id="result1">1.1 : </p>
        <p id="result2">1.2 : </p>
        <p id="result3">1.3 : </p>
    </div>

    <script type="text/javascript">
        var formContainer = document.getElementById('soaltampilan2');
        function showTampilan2(){
            document.getElementById('soaltampilan2').style.display = 'block';
            document.getElementById('divform').style.display = 'block';

            var inputBaris = document.getElementById('inputBaris').value;
            var inputKolom = document.getElementById('inputKolom').value;            

            // formContainer.innerHTML = '';
            while (formContainer.firstChild) {
        formContainer.removeChild(formContainer.firstChild);
    }          
            

            for(var i=0;i < inputBaris; i++){
                var rowDiv = document.createElement('div');
                rowDiv.style.textAlign = 'center';

                for (var j=0; j < inputKolom;j++){
                    var labelElement = document.createElement('label');
                    labelElement.textContent = (i + 1) + '.' + (j + 1); 
                    labelElement.setAttribute('for', 'input_' + i + '_' + j);
                    labelElement.style.marginRight = '3px';
                    
                    var inputElement = document.createElement('input');
                    inputElement.type = "text";
                    inputElement.name = "input_" + i + '_' + j;
                    inputElement.style.margin = '4px';
                    inputElement.style.width = '110px';         
                    rowDiv.appendChild(labelElement);           
                    rowDiv.appendChild(inputElement);
                }
                formContainer.appendChild(rowDiv);
            }
        }

        
        function showTampilan3() {
            document.getElementById("soaltampilan3").style.display = 'block';
            var inputBaris = document.getElementById('inputBaris').value;
            var inputKolom = document.getElementById('inputKolom').value;

            var existingResults = document.querySelectorAll('#soaltampilan3 p');
            existingResults.forEach(function (resultElement) {
                // Hapus elemen yang sudah ada sebelum menambahkan yang baru
                resultElement.parentNode.removeChild(resultElement);
            });

            for (var i = 0; i < inputBaris; i++) {
                for (var j = 0; j < inputKolom; j++) {
                    var inputElement = document.querySelector('input[name="input_' + i + '_' + j + '"]');
                    var labelText = (i + 1) + '.' + (j + 1);

                    // Hanya tambahkan elemen jika belum ada
                    if (inputElement) {
                        // Menggunakan document.createElement untuk membuat elemen <p>
                        var resultElement = document.createElement('p');
                        resultElement.innerHTML = labelText + ' : ' + (inputElement ? inputElement.value : '');

                        // Memberikan ID pada elemen <p> sesuai dengan format 'result_ij'
                        resultElement.id = 'result_' + (i + 1) + '_' + (j + 1);

                        // Menyisipkan elemen <p> ke dalam soaltampilan3
                        document.getElementById('soaltampilan3').appendChild(resultElement);
                    }
                }
            }
        }

        
    </script>
</body>
</html>