<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking Nail Art</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Form Booking Nail Art</h1>
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

        <label for="type">Type : </label>
        <select name="type" id="type">
            <option value="gel">Gel Polish</option>
            <option value="extension">Extension</option>
            <option value="pedicure">Pedicure</option>
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
                var name = $("#name").val();
                var person = $("#person").val();
                var type = type;

                if (name === "") {
                    $("#name-error").text("Please fill in!")
                    valid = false;
                } else {
                    $("#name-error").text("");
                }
                if (person.length <= 8) {
                    $("#person-error").text("Please fill in!");
                    valid = false;
                } else {
                    $("#person-error").text("");
                }
                if (type.length <= 8) {
                    $("#type-error").text("Please fill in!");
                    valid = false;
                } else {
                    $("#type-error").text("");
                }
                if (!valid) {
                    event.preventDefault();
// Menghentikan pengiriman form jika validasi gagal
                } else {
                    $.ajax({
                        url: 'form_process.php',
                        type: 'POST',
                        data: $("#myForm").serialize(),
                        success: function (hasil) {
                            $("#myForm")[0].reset();
                            alert(hasil);
                        }
                    })
                }
            });
        });
    </script>
</body>
</html>