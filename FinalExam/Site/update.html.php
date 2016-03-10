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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <h2><a href="./index.php">Back</a></h2>
        <?php
        include '../Functions/View-functions.php';
        include '../Functions/dbconnect.php';
        include '../Functions/utils-function.php';
        include '../Functions/upload-function.php';
        include '../Functions/update-function.php';

        $id = filter_input(INPUT_GET, 'id');
        $results = getSingleAddress($id);
        
        if(isPostRequest()){
            $id = filter_input(INPUT_POST, 'id');
            $address_group_id = filter_input(INPUT_POST, 'address_group_id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $phone = filter_input(INPUT_POST, 'phone');
            if($birthday === ""){
                $birthday = $results['birthday'];
            }
            try {
                $image = uploadImage('upfile');
            } catch (RuntimeException $ex) {
                $image = filter_input(INPUT_POST, 'oldimage');
            }
            
            $isUpdated = updateRow($id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday, $image);
            if($isUpdated){
                header("Refresh:0; url=update.html.php?id=".$id);
            }
            else{
                echo "Address Not Updated";
            }
        }
        ?>

        <form method="post" action="#" enctype="multipart/form-data">
            <table class="table table-striped">
                <tr>
                    <td>
                        Group: <select name="address_group_id">
                            <option value="1" <?php
                            if ($results['address_group_id'] === 1) {
                                echo 'selected';
                            }
                            ?>>
                                Friends
                            </option>
                            <option value="2" <?php
                            if ($results['address_group_id'] === 2) {
                                echo 'selected';
                            }
                            ?>>
                                Family
                            </option>
                            <option value="3" <?php
                            if ($results['address_group_id'] === 3) {
                                echo 'selected';
                            }
                            ?>>
                                Coworkers
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Full Name: <input name="fullname" type="text" value="<?php echo $results['fullname']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email: <input name="email" type="text" value="<?php echo $results['email']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address: <input name="address" type="text" value="<?php echo $results['address']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone: <input name="phone" type="text" value="<?php echo $results['phone']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Website: <input name="website" type="text" value="<?php echo $results['website']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Birthday: <?php echo $results['birthday']; ?>
                        <input type="date" name="birthday" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Image: <img width="80" height="80" src="./images/<?php echo $results['image']; ?>"/>
                        <input type="file" name="upfile"/>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="oldimage" value="<?php echo $results['image']; ?>"/>
            <input type="submit" value="Update" />
        </form>
    </body>
</html>
