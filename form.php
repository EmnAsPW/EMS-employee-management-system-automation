<?php
include("connection.php");
?>

<!-- searchdata -->

<?php
 if(isset($_POST['searchdata'])){
    $search = $_POST['search'];

    $query = "SELECT * from form where id = '$search' ";
    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management system</title>
    <link rel="stylesheet" type=text/css href="style.css">
</head>
<body>
    <div class="center">
        <form action="#" method="POST">
        <h1>Employee Data Entry Automation Software</h1>
        <div class="form">
            <input type="text" name="search" class="textfield" placeholder="Search ID" value="<?php if(isset($_POST['searchdata'])){echo $result['id'];}?>">
            <input type="text" name="name" class="textfield" placeholder="Employee Name" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];}?>">
            <select class="textfield" name="gender">

                <option value="Not Selected">Select Gender</option>

                <option value="Male"
                 <?php 
                 if($result['emp_gender'] == 'Male'){
                     echo "selected";
                  }
                ?>
                >Male</option>

                <option value="Fe-male" 
                <?php 
                 if($result['emp_gender'] == 'Fe-male'){
                     echo "selected";
                  }
                ?>
                >Fe-male</option>

                <option value="other"
                <?php 
                 if($result['emp_gender'] == 'other'){
                     echo "selected";
                  }
                ?>
                >Other</option>

            </select>
            <input type="text" name="email" class="textfield" placeholder="Email Address" value="<?php if(isset($_POST['searchdata'])){echo $result['emp_email'];}?>">
            <select class="textfield" name="department">

                <option value="Not Selected">Select Department</option>

                <option value="IT"
                <?php 
                 if($result['emp_department'] == 'IT'){
                     echo "selected";
                  }
                ?>
                >IT</option>

                <option value="HR"
                <?php 
                 if($result['emp_department'] == 'HR'){
                     echo "selected";
                  }
                ?>
                >HR</option>

                <option value="Accounts"
                <?php 
                 if($result['emp_department'] == 'Accounts'){
                     echo "selected";
                  }
                ?>
                >Accounts</option>

                <option value="Sales"
                <?php 
                 if($result['emp_department'] == 'Sales'){
                     echo "selected";
                  }
                ?>
                >Sales</option>

                <option value="Marketing"
                <?php 
                 if($result['emp_department'] == 'Marketing'){
                     echo "selected";
                  }
                ?>
                >Marketing</option>

                <option value="Business Development"
                <?php 
                 if($result['emp_department'] == 'Business Development'){
                     echo "selected";
                  }
                ?>
                >Business Development</option>

            </select>
            <textarea placeholder="Address" name="address"><?php if(isset($_POST['searchdata'])){echo $result['emp_address'];}?></textarea>

            <input type="submit" value="Search" name="searchdata" class="btn">
            <input type="submit" name="save" value="Save" name="" class="btn" style="background-color: green;">
            <input type="submit" value="Update" name="update" class="btn" style="background-color: orange;">
            <input type="submit" value="Delete" name="delete" class="btn" style="background-color: red;" onclick="return checkdelete()">
            <input type="reset" value="Clear" name="" class="btn" style="background-color: blue;">
            
        </div>
        </form>
    </div>
</body>
</html>

<!-- check delete function -->

<script>
    function checkdelete(){
       return confirm('Are you sure you want to delete this data?!!!');
    }
</script>


<!-- save & Insert Button -->
<?php
 if(isset($_POST['save'])){
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "INSERT INTO form (emp_name,emp_gender,emp_email,emp_department,emp_address) VALUES('$name','$gender','$email','$department','$address')";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "<script> alert('Data save into Database') </script>";
    }
    else{
        echo "<script> alert('Failed to insert Data') </script>";
    }
}
?>

<!-- delete data -->

<?php 
     
     if(isset($_POST['delete'])){

        $id = $_POST['search'];
        $query = "DELETE FROM form WHERE id = '$id'";
        $data = mysqli_query($conn, $query);

        if($data){
            echo "<script> alert('Record deleted!') </script>";
        }
        else{
            echo "<script> alert('Record failed to deleted!') </script>";
        }

     }

?>


<!-- update  -->

<?php 
     
     if(isset($_POST['update'])){
        
       $id         = $_POST['search'];
       $name       = $_POST['name'];
       $gender     = $_POST['gender'];
       $email      = $_POST['email'];
       $department = $_POST['department'];
       $address    = $_POST['address'];

        $query = "UPDATE form SET emp_name = '$name',emp_gender = '$gender',emp_email = '$email ',emp_department = '$department',emp_address = '$address' WHERE id ='$id'";

        $data = mysqli_query($conn, $query);

        if($data){
            echo "<script> alert('Record Updated!') </script>";
        }
        else{
            echo "<script> alert('Record failed to Updated!') </script>";
        }

     }

?>