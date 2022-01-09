<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" style=" width: 100px; margin: auto;">
    <div class="mb-3">
      <label> Name</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email </label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="mb-3">
      <label> Address </label>
      <input type="text" class="form-control" name="address">
    </div>
    <label for="homepage">Linkedin url:</label>
    <div>
      <input type="url" id="homepage" name="url">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">
        <h4>Upload image</h4>
      </label>
      <input class="form-control" type="file" id="formFile" name="image">
    </div><br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</body>

</html>
<?php
//print_r($_FILES);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $add = $_POST['address'];
  $url = $_POST['url'];
  $errors = [];
  if (empty($_FILES['image']['name'])) {
    $imgName = $_FILES['image']['name'];
    $imgTempPath = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    $imgType = $_FILES['image']['type'];
    $imgextension = explode('.', $imgName);
    $imgext = end($imgextension);
    $allowd = ['jpg', 'png', 'gif'];
    if (in_array($imgext, $allowd)) {
    } else {
      echo 'Extension not allowed';
    }
  } else {
    echo 'image required';
  }
}
if (empty($imgName)) {
  $errors[''];
}
if (empty($name)) {
  $errors['name'] =
    'please enter your name';
}
if (empty($email)) {
  $errors['email'] =
    'please enter your mail';
}
if (empty($pass)) {
  $errors['password'] =
    'please enter your password';
} elseif (strlen($pass) < 6) {
  $errors['password'] =
    'min password should be 6 characters';
}
if (empty($add)) {
  $errors['address'] =
    'please enter your address';
} elseif (strlen($add) != 10) {
  $errors['address'] =
    'Address must be 10 chars';
}
if (empty($url)) {
  $errors['Linkedin'] =
    'please enter your url';
}
if (count($errors) > 0) {
  foreach ($errors as $key => $value) {
    echo '*' . $key . ':' . $value . '<br>';
  }
} else {
  echo 'Valid data';
}

?>

