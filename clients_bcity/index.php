<?php

session_start();
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Home</title>
</head>
<body>
  
    <div class="container mt-5">
        
        <?php include('message.php'); ?>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Client Details
                        <a href="client-create.php" class="btn btn-primary float-end">Add Client</a>
                       <p></p>
                        <a href="contact-create.php" class="btn btn-primary float-end">Add Contact</a>
                    </h4>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                            <th> Name</th>
                            <th> Client Code</th>
                            <th> Action</th>
                           </tr> 
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM clients ORDER BY  name ASC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0 )
                            {
                                foreach($query_run as $client)
                                {
                                    
                                    ?>
                                    <tr>
                                        <td><?= $client['name']; ?></td>
                                        <td><?= $client['acro_char'] . sprintf ('%03s', $client['id']); ?></td>
                                        <td>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_client" value="<?=$client['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        
                                        
                                    </tr>
                                    <?php

                                }
                            }
                            else
                            {
                               echo "<h5> No client(s) found </h5>"; 
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>