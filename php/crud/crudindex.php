<?php
    session_start();
    require("crudconnection.php");
    include("crudheader.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD index</title>
</head>
<body class="container">
    <div class="card card-body shadow">
        <h2>Welcome to the lesson editor</h2>
        <button class="btn d-flex float-start" onclick="history.back()" id="back-btn"><img src="crudimages/double-left.png" alt="back-btn" onmouseover="backOnHover(this)" onmouseout="backOffHover(this)" /></button>


        <!-- run php loop through table and display letter field here -->
        <div class="container text-center">
            <div class="row justify-content-md-center">
                <?php foreach($result as $link): ?>
                    <button class="col-md-auto btn btn-warning m-3 p-4"  id="letterBtn">
                        <p class="card-text"><a href="crudindex.php?link='<?php echo $link['letter']; ?>'" class="link-offset-2 link-underline link-underline-opacity-0"><?php echo $link['letter']; ?></a></p>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    

    <div>
        <?php
            if(isset($_GET["link"]))
            {
                $letter = trim($_GET['link'], "'");

                // run sql command to retrieve record based on GET value
                $record = $conn->query("select * from lessons where letter='$letter'");

                // turn record into an associative array
                $array = $record->fetch_assoc();

                // variables to hold our update and delete url strings
                $id = $array['id'];
                $update = "update.php?update=" . $id;
                $delete = "crudconnection.php?delete=" . $id;

                echo "
                <hr/>
                <h2 class='card-title'>{$array['lesson_name']}</h2>
                <iframe width='560' height='315' src='{$array['video']}' title='YouTube video player' frameborder='0' allow='accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
                <h5>Printable worksheet:</h5>
                <a href='crudimages/worksheets/{$array['worksheet']}' download><img id='downloadImage' src='crudimages/download.png' alt='{$array['worksheet']}'></a>
                <p>
                    <a href='{$update}' class='btn btn-warning'>Update</a>
                    <a href='{$delete}' class='btn btn-danger'>Delete</a>
                </p>
            ";
        }
        else
        {
            // default view that the user sees when visiting for the first time
            echo "
            ";
        }
        ?>
        </div>
        
    </div>
    
    <div class="card card-body">
            <p class="card-text text-center"><a href="form.php" class="card-text"><img id="uploadImage" src="crudimages/add.png" alt="upload new lesson"></img></a></p>
    </div>
    <button class="btn" onclick="topFunction()" id="myBtn1"><img src="images/rocket.png" alt="to top" id="toTopRocket" onmouseover="rocketOnHover(this)" onmouseout="rocketOffHover(this)"></button>

    </div>
</body>
</html>