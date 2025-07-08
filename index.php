<?php
$insert = false;
if(isset($_POST['name'])){
    $con = mysqli_connect("localhost", "root", "", "SamGym");
    if(!$con){
        die("Connection failed due to ". mysqli_connect_error());
    }

    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $desc   = $_POST['desc'];

    $sql = "INSERT INTO `members` 
            (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES 
            ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($con->query($sql) === TRUE){
        $insert = true;
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SamFitness - The best fitness gym in town</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="utils.css" />
</head>

<body>
  <div class="container py-4">
    <!-- Navbar -->
    <header class="mb-4">
      <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold text-danger" href="#">Sam Fitness</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link btn btn-sm btn-warning mx-1" href="#home">Home</a></li>
              <li class="nav-item"><a class="nav-link btn btn-sm btn-warning mx-1" href="#pricing">Pricing</a></li>
              <li class="nav-item"><a class="nav-link btn btn-sm btn-warning mx-1" href="#compare">Compare Plan</a></li>
              <li class="nav-item"><a class="nav-link btn btn-sm btn-warning mx-1" href="#contact">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <!-- Hero Section -->
      <section id="home" class="row align-items-center mb-5">
        <div class="col-12 col-md-6 text-center text-md-start">
          <img src="dumbell.png" alt="" class="img-fluid mb-3" style="max-width:300px;" />
          <h1 class="display-6 text-danger mb-3">The best fitness gym in town is here</h1>

          <!-- Centered buttons -->
          <div class="my-3 d-flex justify-content-center flex-wrap gap-3">
            <a href="#" class="btn btn-danger px-4">Join Now</a>
            <a href="#contact" class="btn btn-outline-danger px-4">Contact Us</a>
          </div>

          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur error corporis fugit dolore adipisci aperiam omnis nisi dolores hic eius in ex id iure, ea sunt asperiores et voluptatibus.</p>
        </div>
        <div class="col-12 col-md-6 text-center">
          <img src="gym.png" alt="" class="img-fluid" style="max-width:450px;" />
        </div>
      </section>

      <hr />

      <!-- Pricing -->
      <section id="pricing" class="mb-5">
        <h2 class="text-center mb-3">Pricing</h2>
        <p class="text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi debitis provident suscipit.</p>
        <div class="row justify-content-center">
          <?php 
            $plans = [
              ['Free','₹0/month','0 users included','2 GB storage','Email support','Help center access'],
              ['Pro','₹150/month','5 users included','10 GB storage','Priority email','Help center access'],
              ['Enterprise','₹500/month','Unlimited users','100 GB storage','Phone & email','Dedicated support']
            ];
            foreach($plans as $p): ?>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="card h-100 border-danger">
                <div class="card-header text-center bg-danger text-white">
                  <h3 class="my-1"><?= $p[0] ?></h3>
                </div>
                <div class="card-body text-center d-flex flex-column">
                  <ul class="list-unstyled mb-4">
                    <li class="fs-5 fw-bold mb-2"><?= $p[1] ?></li>
                    <?php for($i=2;$i<count($p);$i++): ?>
                      <li class="mb-1"><?= $p[$i] ?></li>
                    <?php endfor; ?>
                  </ul>
                  <a href="#" class="btn btn-danger mt-auto">Sign Up Now</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <hr />

      <!-- Compare Plans -->
      <section id="compare" class="mb-5">
        <h2 class="text-center mb-4">Compare Plans</h2>
        <div class="table-responsive">
          <table class="table table-bordered text-center mb-0">
            <thead class="table-light">
              <tr>
                <th></th>
                <th>Free</th>
                <th>Pro</th>
                <th>Enterprise</th>
              </tr>
            </thead>
            <tbody>
              <tr><th class="text-start">Public</th><td>Yes</td><td>Yes</td><td>Yes</td></tr>
              <tr><th class="text-start">Private</th><td>–</td><td>Yes</td><td>Yes</td></tr>
              <tr><th class="text-start">Permissions</th><td>Yes</td><td>Yes</td><td>Yes</td></tr>
              <tr><th class="text-start">Sharing</th><td>–</td><td>Yes</td><td>Yes</td></tr>
              <tr><th class="text-start">Unlimited Members</th><td>–</td><td>Yes</td><td>Yes</td></tr>
              <tr><th class="text-start">Extra Security</th><td>–</td><td>–</td><td>Yes</td></tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>

    <hr />

    <!-- Contact Form -->
    <footer id="contact" class="pt-4">
      <h2 class="text-center mb-3">Please fill this form so that we can contact you ❤️</h2>

      <?php if($insert): ?>
        <div class="alert alert-success text-center">Your entry has been submitted successfully!</div>
      <?php endif; ?>

      <form action="" method="post" class="row g-3 justify-content-center">
        <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Enter your name" required /></div>
        <div class="col-md-6"><input type="number" name="age" class="form-control" placeholder="Enter your age" required /></div>
        <div class="col-md-6"><input type="text" name="gender" class="form-control" placeholder="Enter your gender" required /></div>
        <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Enter your email" required /></div>
        <div class="col-md-6"><input type="text" name="phone" class="form-control" placeholder="Enter your phone" required /></div>
        <div class="col-md-12"><textarea name="desc" class="form-control" rows="4" placeholder="Additional information"></textarea></div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-danger">Submit</button>
        </div>
      </form>

      <p class="text-center mt-4">&copy; SamFitness.com | All rights reserved</p>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
