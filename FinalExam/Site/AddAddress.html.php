
<?php
//address_id
//user_id
//address_group_id
//fullname 
//email
//address 
//phone
//website 
//birthday
//image
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../Templates/session-start.req-inc.php';
        include'../Functions/dbconnect.php';
        include '../Functions/Add-functions.php';
        include '../Functions/utils-function.php';
        include '../Functions/upload-function.php';


        $results = getGroups();

        if (isPostRequest()) {
            $address_group_id = filter_input(INPUT_POST, 'address_group_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');

            $isAdded = addToBook();
            if ($isAdded === false) {
                $message = 'Data was not added, please make sure you have entered all required data and that the data is valid<br>';
            } else {
                $message = 'Data was added<br>';
            }
        }
        ?>
        <form class="center" method="post" action="#" enctype="multipart/form-data">
            <div style="background-color: lightcoral;">
                <b><?php if (isset($message)) {
            echo $message;
        } ?></b>
                <b>Required Fields</b><br>

                *Group:<select name="address_group_id">
                        <?php foreach ($results as $row) : ?>
                        <option value="<?php echo $row['address_group_id']; ?>">
                        <?php echo $row['address_group']; ?>
                        </option>
<?php endforeach; ?>
                </select><br>
                *Full Name:<input type="text" name="fullname" value="<?php if (isset($fullname)) {
    echo $fullname;
} ?>"/><br>
                *Email:<input type="text" name="email" value="<?php if (isset($email)) {
    echo $email;
} ?>"/><br>
                *Address:<input type="text" name="address" value="<?php if (isset($address)) {
    echo $address;
} ?>"/><br>
                *Phone(only numbers):<input type="text" name="phone" value="<?php if (isset($phone)) {
    echo $phone;
} ?>"/><br>
                *Birthday:<input type="date" name="birthday" value="<?php if (isset($birthday)) {
    echo $birthday;
} ?>"/><br>
            </div>
            <div style="background-color: lightskyblue;">
                <b>Optional Fields</b><br>
                Website:<input type="text" name="website" value="<?php if (isset($website)) {
    echo $website;
} ?>"/><br>
                Image:<input style="margin: auto;" type="file" name="upfile" /><br>
            </div>
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
