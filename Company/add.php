<?php 
	include "config.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM demo WHERE id='$id'";
    $result = $conn->query($sql);
    
    while($demo = $result->fetch_array()) {
	
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>

    <!-- Include Bootstrap CSS from a CDN (Content Delivery Network) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: You can include your own custom CSS here for additional styling. -->

</head>
<body>

    <form action="update.php" method="post" class="container mt-4">
        <div style="height: 85vh; display: flex; flex-direction: column; justify-content: center;" >
            <div class="card p-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="text" class="form-control" name="name" value="<?php echo $demo['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" name="message" value="<?php echo $demo['message'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </div>
    </form>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <h1>eddit</h1>
    <form action="update.php" method="post">		
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="text" name="name" value="<?php echo $demo['name'] ?>">
                    </td>					
                </tr>	
                <tr>
                    <td>Massage</td>
                    <td><input type="text" name="message" value="<?php echo $demo['message'] ?>"></td>					
                </tr>	
    
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>					
                </tr>				
            </table>
        </form>
</body>
</html> -->
<?php } ?>