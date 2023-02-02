<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="manageC.css">
    <title>manage companies</title>
</head>
<body style="color: white; background-color:#172b4d !important">
    <div class="hero">
        <nav>
            <h2 class="logo"> CT<span>MS</span></h2>
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="manageC.php">manage companies</a></li>
                <li><a href="adminestration.php">admistration</a></li>
                
            </ul>
            <button type="button"><a href="logout.php"> Logout</a></button>
        </nav>
    </div>
    <div class="container mt-5">
       <div class="text-center">
        <h1 class="display-5 mb-5"> <strong>Manage companies</strong></h1>

       </div>
       <div class="main row justify-content-center">
        <form action="" id="student-form" class="row justify-content mb-4" autocomplete="off">
           <div class="col-8  mb-3">
            <label for="name">Name</label>
            <input class="form-control" id="name"   type="text" placeholder="name">
           </div> 
           <div class="col-8  mb-3">
            <label for="name">id</label>
            <input class="form-control" id="id"   type="text" placeholder="id ">
           </div>
           <div class="col-8  mb-3">
            <label for="name">Email</label>
            <input class="form-control" id="email"   type="email" placeholder="email">
           </div>
           <div class="col-8 col-md-6 ">
            <input class="btn btn-success add-btn" type="submit" value="Submit">
           </div>
        </form>
        <div class="col-15 mt-5">
            <table class="table table-strped table-dark">
                <thead>
                    <tr>
                        <th> Name</th>
                        <th> id </th>
                        <th> Email</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody id="companies-list">
                    <tr>
                        <td>prestacode</td>
                        <td>24</td>
                        <td>prestacode-contact@gmail.com</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm edit"> edit</a>
                            <a href="#" class="btn btn-danger delete">delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       </div>
    </div>
    <script src="manageC.js
    ">

    </script>
    
</body>
</html>