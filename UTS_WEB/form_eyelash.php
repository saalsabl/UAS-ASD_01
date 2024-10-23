<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking Eyelash</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Form Booking Eyelash</h1>
    </header>
    
    <div class="container">
    <form id="myForm" method="post" action="form_process.php">
        <label for="name">Name : </label>
        <input type="text" id="name" name="name">
        <span id="name-error" style="color: red;"></span><br>

        <label for="phone">Phone Number : </label>
        <input type="text" id="phone" name="phone">
        <span id="phone-error" style="color: red;"></span><br>

        <label for="person">Person : </label>
        <input type="number" id="person" name="person">
        <span id="person-error" style="color: red;"></span><br>

        <label for="type">Type (Eyelash): </label>
        <select name="type" id="type">
            <option value="classic">Classic Eyelash Extension</option>
            <option value="volume">Volume Eyelash Extension</option>
            <option value="hybrid">Hybrid Eyelash Extension</option>
            <option value="mega">Mega Eyelash Extension</option>
            <span id="type-error" style="color: red;"></span><br>
        </select>

        <label for="remove">Is that any remove? : </label>
        <select name="type" id="type">
            <option value="yes">yes</option>
            <option value="no">no</option>
            <span id="type-error" style="color: red;"></span><br>
        </select>
        <br>

        <label for="date">Choose Schedule : </label>
        <select name="type" id="type">
            <option value="1">Monday, 13.00</option>
            <option value="2">Monday, 15.00</option>
            <option value="1">Tuesday, 13.00</option>
            <option value="2">Tuesday, 15.00</option>
            <option value="1">Wednesday, 13.00</option>
            <option value="2">Wednesday, 15.00</option>
            <option value="1">Thursday, 13.00</option>
            <option value="2">Thursday, 15.00</option>
            <option value="1">Friday, 13.00</option>
            <option value="2">Friday, 15.00</option>
            <option value="1">Saturday, 13.00</option>
            <option value="2">Saturday, 15.00</option>
            <span id="type-error" style="color: red;"></span><br>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#myForm").submit(function(event){
            // Inisialisasi variabel valid untuk pengecekan validasi
            var valid = true; 
            var name = $("#name").val();
            var phone = $("#phone").val();
            var person = $("#person").val();
            var type = $("#type").val();
            var remove = $("#remove").val();
            var date = $("#date").val();

            // Validasi untuk input nama
            if (name === "") {
                $("#name-error").text("Please enter your name!");
                valid = false;
            } else {
                $("#name-error").text("");
            }

            // Validasi untuk input nomor telepon
            var phonePattern = /^[0-9]{10,12}$/; // Pola sederhana untuk memeriksa nomor telepon (10-12 digit)
            if (!phonePattern.test(phone)) {
                $("#phone-error").text("Please enter a valid phone number (10-12 digits)!");
                valid = false;
            } else {
                $("#phone-error").text("");
            }

            // Validasi untuk jumlah orang
            if (person === "" || person <= 0) {
                $("#person-error").text("Please enter a valid number of persons!");
                valid = false;
            } else {
                $("#person-error").text("");
            }

            // Validasi untuk jenis layanan (type)
            if (type === null || type === "") {
                $("#type-error").text("Please select an eyelash type!");
                valid = false;
            } else {
                $("#type-error").text("");
            }

            // Validasi untuk opsi remove
            if (remove === null || remove === "") {
                $("#remove-error").text("Please select an option for removal!");
                valid = false;
            } else {
                $("#remove-error").text("");
            }

            // Validasi untuk jadwal
            if (date === null || date === "") {
                $("#date-error").text("Please select a schedule!");
                valid = false;
            } else {
                $("#date-error").text("");
            }

            // Jika ada validasi yang gagal, cegah form dari submit
            if (!valid) {
                event.preventDefault(); // Menghentikan pengiriman form jika validasi gagal
            } else {
                event.preventDefault(); // Mencegah submit default form untuk demonstrasi AJAX
                
                // Debug: Tampilkan pesan console untuk melihat data yang dikirim
                console.log($("#myForm").serialize());

                $.ajax({
                    url: 'form_process.php', // Pastikan file ini benar-benar ada dan dapat diakses
                    type: 'POST',
                    data: $("#myForm").serialize(), // Mengirimkan data form dalam format URL-encoded
                    success: function (hasil) {
                        console.log(hasil); // Debug: Lihat hasil yang dikembalikan dari server
                        $("#myForm")[0].reset(); // Reset form setelah sukses
                        alert("Form has been successfully submitted!"); // Menampilkan alert
                    }
                });
            }
        });
    });
</script>
</body>
</html>