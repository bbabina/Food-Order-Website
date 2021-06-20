<?php include('partials/menu.php'); ?>

        <!-- Main content Section Starts Here -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br />
                <br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying session message
                        unset($_SESSION['add']); //removing session message
                    }
                ?>
                <br /> <br />
               

                <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add admin</a>
                <br />
                <br />
                <br />
        

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full name</th>
                        <th>User name</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                        //Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the query
                        $res = mysqli_query($conn, $sql);
                        //Check whether the qury is executed or not
                        if($res==TRUE)
                        {
                            //Count rows to check whwther we have data in database or not
                            $count = mysqli_num_rows($res); //Function to get all rows in database
                            $sn=1; //create a variable and assign the value


                            //Check number of rows
                            if($count>0)
                            {
                                //We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get all data from database
                                    //Get individual data
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];

                                    //Display the values in table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="#" class="btn-secondary">Update Admin</a>
                                                <a href="#" class="btn-danger">Delete Admin</a>   
                                            </td>
                                        </tr>
                                    <?php 

                                }
                            }
                            else
                            {
                                //We dont have data in database
                            }


                        }
                    ?>
                </table>
                
            </div>
        </div>
        <!-- Main content Section ends Here -->

<?php include('partials/footer.php'); ?>