<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

</head>
<script>
    function verifyPassword() {
        var pw = document.getElementById("pswd").value;
        //check empty password field
        if (pw == "") {
            document.getElementById("message").innerHTML = "**Fill the password please!";
            return false;
        }

        //minimum password length validation
        if (pw.length < 8) {
            document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
            return false;
        }

        //maximum length of password validation
        if (pw.length > 15) {
            document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
            return false;
        } else {
            alert("Password is correct");
        }
    }

    function phonenumber(inputtxt) {
        var phoneno = /^\d{10}$/;
        if (inputtxt.value.match(phoneno)) {
            return true;
        }
        else {
            alert("Not a valid Phone Number");
            return false;
        }
    }
</script>
<style>
    body {
        background-image: url('https://www.bugatti.com/fileadmin/_processed_/sei/p121/se-image-4f750982624e527a8b1003408e4febcf.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
</style>
<style>
    h1 {
        text-align: center;
    }

    p {
        text-align: center;
    }

    div {
        text-align: center;
    }
</style>


<body onload='document.form1.text1.focus()'>
    <h1 style="background-color: rgba(222, 233, 233, 0.685);">
        <form action="results.html" method="GET">
            <div id="message">

                <h2>+ REGISTRATION +</h2>
                <h4>Please fill in the registration !</h4>

            </div>
            <div>
                <label for="name">Name : </label><br>
                <input type="text" name="name" id="name" />
            </div>

            <div>

                <label for="password">Password : </label><br>
                <input type="password" name="password" id="password">
                <span id="message" style="color:red"> </span> <br>
            </div>

            <div>
                <label for="email">Email : </label><br>
                <input type="email" name="email" id="email" />
            </div>

            <div>
                <label for="phone">Phone (Format: 012345678901): </label><br>
                <input type="tel" name="phone" id="phone" pattern="[0-9]{11}"
                    title="Invalid ! You are required to put only numbers and more than 10 numbers " required><br>
            </div>

            <div>
                <label for="text">Address : </label><br>
                <input type="text" name="address" id="address" />
            </div>

            <button type="reset">Reset</button>
            <button type="submit" value="" onclick="verifyPassword(document.form1.text1)" onclick="phonenumber()">Submit</button>
            <h1>--------------------------------------------------------------</h1>
    </h1>
    </form>
</body>

</html>