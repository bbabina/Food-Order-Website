<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>


        <?php
           if(isset($_SESSION['add'])) //Checking whwther the session is set or not
           {
               echo $_SESSION['add']; //Displaying session message
               unset($_SESSION['add']); //removing session message
           }
        
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="full_name" placeholder="Enter your name"></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input type="text" name="username" placeholder="Your User name"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
    </div>

</div>
<?php include('partials/footer.php');?>

<?php
    //Process the form and save in database
    //Check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        // button clicked
        // echo"Button  clicked";

        //Get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);  //Password encryption by md5

        //SQL query to save data to database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        // Executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

        // Check whether the query is executed or not and display appropriate messsage
        if($res==TRUE)
        {
            //Data inserted
            //Create a session variable to display message
            $_SESSION['add']="Admin added successfully";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //Failed to insert data
            //Create a session variable to display message
            $_SESSION['add']="Failed to add Admin";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
            
        }
    }
    
?>