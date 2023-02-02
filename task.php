<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="task.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <title>Todo List Web App </title>
</head>

<body>
    <div class="hero">
        <nav>
            <h2 class="logo"> CT<span>MS</span></h2>
            <ul>
                <li><a href="homeemp.php">home</a></li>
                <li><a href="index2.php">manage empolyoee</a></li>
                <li><a href="task.php">manage task</a></li>
                <li><a href="">adminestration</a></li>
                
            </ul>
            <button type="button"><a href="logout.php"> Logout</a></button>
        </nav>
    </div>

    

    <div class="container">
        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form id="form-Task">
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" maxlength="50" autocomplete="off"
                                    placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <textarea type="text" id="description" cols="20" rows="2" class="form-control"
                                    maxlength="500" autocomplete="off" placeholder="Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-5 col-form-label">Date debut</label>
                                <div class="col-sm-8">
                                    <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Disabled select menu</label>
                                <select id="disabledSelect" class="form-select">
                                  <option>Disabled select</option>
                                </select>
                              </div>
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-3 text-left title-head">
                        <p class="font-weight-bold">Title</p>
                    </div>
                    <div class="col-sm-3 text-left desc-head">
                        <p class="font-weight-bold">Description</p>
                    </div>
                    <div class="col-sm-3 text-left desc-head">
                        <p class="font-weight-bold">Date</p>
                    </div>
                    <div class="col-sm-3 text-right del-head">
                        <p class="font-weight-bold">Delete</p>
                    </div>
                </div>
                <hr>
                <div id="tasks"></div>

            </div>

        </div>

    </div>

    <script src="js/app.js"></script>
    <script type="text/javascript"  src="task.js">
</script>
       
      

</body>

</html>