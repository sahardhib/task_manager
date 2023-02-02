<?php 
    include('config/constants.php');
?>

<html>
    <head>
        <title>Task Manager</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
    </head>
    
    <body>
    <style>
             .hero{
                background-color:#172b4d !important;
  
  }
  nav{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 40px;
      padding-left: 10%;
      padding-right: 10%s;
  }
  .logo{
      color: white;
      font-size: 20px;
  }
  span{
      color: RED;
  }
  nav ul li{
      list-style-type: none;
      display: inline-block;
      padding: 10px 20px;
  }
  nav ul li a{
      color: white;
      text-decoration: none;
      font-weight: bold;
  }
  nav ul li a:hover{
      color: #ea1538;
      transition: .3s ;
  
  }
  button{
     border: none; 
     background:  #e813c1;
     padding: 10px 25px;
     border-radius: 30px;
     color: white;
     font-size: 15px;
     transition: .4s;
  }
  button:hover{
      transform: scale(1.3);
      cursor: pointer;
  }
  </style>
    <div class="hero">
        <nav>
            <h2 class="logo"> CT<span>MS</span></h2>
            <ul>
                <li><a href="homeemp.php">home</a></li>
                <li><a href="index2.php">manage empoloyee</a></li>
                <li><a href="index1.php">manage task</a></li>
                
                
            </ul>
            <button type="button"><a href="logout.php"> Logout</a></button>
        </nav>
    </div>
    
        <div class="wrapper">
        
        <div class="container">

            <div class="row">
            
                <div class="col-lg-2"></div>


            <div class="col-lg-8">

            <h1 class="text-center">Task Manager </h1>

                <a class="btn-secondary" href="index1.php">Home</a>

                <h3>Add Task Page</h3>

                <p>
                    <?php 
                    
                        if(isset($_SESSION['add_fail']))
                        {
                            echo $_SESSION['add_fail'];
                            unset($_SESSION['add_fail']);
                        }
                    
                    ?>
                </p>
               
                <form method="POST" action="">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Task Name</label>
                      <input type="text" name="task_name" class="form-control" placeholder="Type your Task Name" required="required" /></td>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Task Description</label>
                      <textarea name="task_description" class="form-control" placeholder="Type Task Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Select List</label>
                      <select name="list_id" class="form-select" id="">
                        <?php 
                                
                        //Connect Database
                        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                        
                        //SElect Database
                        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                        
                        //SQL query to get the list from table
                        $sql = "SELECT * FROM tbl_lists";
                        
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        
                        //Check whether the query executed or not
                        if($res==true)
                        {
                            //Create variable to Count Rows
                            $count_rows = mysqli_num_rows($res);
                            
                            //If there is data in database then display all in dropdows else display None as option
                            if($count_rows>0)
                            {
                                //display all lists on dropdown from database
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $list_id = $row['list_id'];
                                    $list_name = $row['list_name'];
                                    ?>
                                    <option value="<?php echo $list_id ?>"><?php echo $list_name; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //Display None as option
                                ?>
                                <option value="0">None</option>p
                                <?php
                            }
                            
                        }
                    ?>
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Priority:</label>
                        <select name="priority" class="form-select" id="">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                      </div>
                      <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">assign to</label>
                      <input type="text" name="assign_to" class="form-control" placeholder="Type your empoloye" required="required" /></td>
                    </div>

                      <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" />
                      </div>
                     

                    <button type="submit" class="btn btn-secondary" name="submit">Add</button>
                </form>

            </div>

                <div class="col-lg-3"></div>
            
            
            </div>
        
        </div>
        
        </div>
    </body>
    
</html>


<?php 

    //Check whether the SAVE button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the Values from Form
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $list_id = $_POST['list_id'];
        $priority = $_POST['priority'];
        $assign_to = $_POST['assign_to'];
        $deadline = $_POST['deadline'];
        
        //Connect Database
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
        
        //CReate SQL Query to INSERT DATA into DAtabase
        $sql2 = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            assign_to = '$assign_to',
            deadline = '$deadline'
        ";
        
        //Execute Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //Check whetehre the query executed successfully or not
        if($res2==true)
        {
            //Query Executed and Task Inserted Successfully
            $_SESSION['add'] = "Task Added Successfully.";
            
            //Redirect to Homepage
            header('location:index1.php');
            
        }
        else
        {
            //FAiled to Add TAsk
            $_SESSION['add_fail'] = "Failed to Add Task";
            //Redirect to Add TAsk Page
            header('location:'.SITEURL.'add-task.php');
        }
    }

?>




































