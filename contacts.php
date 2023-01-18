<?php
require_once 'connect.php';
$data = $pdo->query("SELECT * FROM contacts")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="padding-top:20px">

        <h1 style="margin: 0">Contacts</h1>
<?php if(isset($_GET['id'])): 
$id=$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id=?");
$stmt->execute([$id]); 
$user = $stmt->fetch();
?>
        <form method="post" action="update.php" style="max-width:500px; padding:20px 0 20px 0">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" value="<?php echo $user['FirstName'];?>" class="form-control" id="firstNameUpd" name="firstNameUpd">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" value="<?php echo $user['LastName'];?>" class="form-control" id="lastNameUpd" name="lastNameUpd">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="<?php echo $user['Email'];?>" class="form-control" id="emailUpd" name="emailUpd">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" value="<?php echo $user['Phone'];?>" class="form-control" id="phoneUpd" name="phoneUpd">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
          <?php else : ?>
                    <form method="post" action="add.php" style="max-width:500px; padding:20px 0 20px 0">
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <?php endif; ?>

          <table class="table">
            <thead>
              <tr class="table-secondary">
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row):
                $key=$row['id'];?>
                    
              <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['FirstName'] ?></td>
                <td><?php echo $row['LastName'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td><?php echo $row['Phone'] ?></td>
                <td><a class="text-primary" href="contacts.php?id=<?php echo $key;?> ">Update</a> / <a class="text-danger"
                 href="delete.php?delete=<?php
                 echo $key;?>">Delete</a></td>
              </tr>
               <?php endforeach; ?>
            </tbody>
          </table>
    </div>
</body>
</html>