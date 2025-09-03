<?php

include("connections.php");

$name = $address = $email = $section = $contact = $password = $cpassword = "";
$nameErr = $addressErr = $emailErr = $sectionErr = $contactErr = $passwordErr = $cpasswordErr = "";
$passwordMatchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["section"])) {
        $sectionErr = "Section is required";
    } else {
        $section = $_POST["section"];
    }

    if (empty($_POST["contact"])) {
        $contactErr = "contact # is required";
    } else {
        $contact = $_POST["contact"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpassword = $_POST["cpassword"];
    }

    if($name && $address && $email && $section && $contact && $password && $cpassword) {

        if ($password !== $cpassword) {
            $passwordMatchErr = "Passwords do not match.";
        } else {
            if (!$connections) {
                echo "<span class='error'>Database connection failed: " . mysqli_connect_error() . "</span>";
            } else {
                $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email='$email'");
                if ($check_email) {
                    $check_email_row = mysqli_num_rows($check_email);
                    if($check_email_row > 0) {
                        $emailErr = "Email already exists.";
                    } else {
                        $query = mysqli_query($connections, "INSERT INTO mytbl (name, address, email, section, contact, password)
                            VALUES ('$name', '$address', '$email', '$section', '$contact', '$password')");
                        if ($query) {
                            echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
                            echo "<script>window.location.href='index.php';</script>";
                        } else {
                            echo "<span class='error'>Error inserting record: " . mysqli_error($connections) . "</span>";
                        }
                    }
                } else {
                    echo "<span class='error'>Error checking email: " . mysqli_error($connections) . "</span>";
                }
            }
        }
    }
}

?>

<h2>Welcome to Gerard's Library System!</h2>
<h4>You must have an account to continue</h4>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<label for="name">Enter your name</label> <br>
<input type="text" name="name" value="<?php echo $name; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $nameErr) { ?>
<span class="error"><?php echo $nameErr; ?></span> <br>
<?php } ?>

<br>

<label for="address">Enter your address</label> <br>
<input type="text" name="address" value="<?php echo $address; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $addressErr) { ?>
<span class="error"><?php echo $addressErr; ?></span> <br>
<?php } ?>

<br>

<label for="email">Enter your email</label> <br>
<input type="text" name="email" value="<?php echo $email; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $emailErr) { ?>
<span class="error"><?php echo $emailErr; ?></span> <br>
<?php } ?>

<br>

<label for="section">Enter your section</label> <br>
<input type="text" name="section" value="<?php echo $section; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $sectionErr) { ?>
<span class="error"><?php echo $sectionErr; ?></span> <br>
<?php } ?>

<br>

<label for="contact">Enter your contact #</label> <br>
<input type="text" name="contact" value="<?php echo $contact; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $contactErr) { ?>
<span class="error"><?php echo $contactErr; ?></span> <br>
<?php } ?>

<br>

<label for="password">Enter your password</label> <br>
<input type="password" name="password" value="<?php echo $password; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $passwordErr) { ?>
<span class="error"><?php echo $passwordErr; ?></span> <br>
<?php } ?>

<br>

<label for="cpassword">Confirm your password</label> <br>
<input type="password" name="cpassword" value="<?php echo $cpassword; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $cpasswordErr) { ?>
<span class="error"><?php echo $cpasswordErr; ?></span> <br>
<?php } ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $passwordMatchErr) { ?>
<span class="error"><?php echo $passwordMatchErr; ?></span> <br>
<?php } ?>

<br>

<br>

<input type="submit" value="Submit">
</form>
<a href="login.php">Login</a>
<hr>

<style>
.error { color: red; }
</style>