<?php
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url();?>assets/theme/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url();?>assets/theme/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/theme/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/theme/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/theme/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url();?>assets/theme/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/theme/css/custom.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/theme/lib/jquery/jquery.min.js"></script>
</head>

<body>

  <div class="click-closed"></div>
  

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">LSS <span class="color-b"> Library System</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url();?>index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="">Contact us</a>
          </li>
         
         <?php if($this->session->userdata('isAdmin')==1 && $this->session->userdata('validated')){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Book
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/Book/NewBook">New Book</a>
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/Book">Manage Book</a>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Users
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/Member/NewMember">New  User / Member</a>
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/Member">Manage </a>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Issue Details
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/Issue">New Book Issue</a>
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/Issue/IssuedBook">Issued Books </a>
              
            </div>
          </li>
         <?php } if($this->session->userdata('isAdmin')!=1 && $this->session->userdata('validated')){?>
          
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url();?>index.php/Member/ViewMyBooks">borrowed books</a>
          </li>
          <?php }?>
          
          <li class="nav-item">
              <?php if($this->session->userdata('validated')){?>
              <a class="nav-link" href="<?php echo base_url();?>index.php/welcome/logOut"><?php echo $this->session->userdata('name');?><span class="fa fa-sign-out"></span></a>
              <?php }else{?>
              
            <a class="nav-link" href="<?php echo base_url();?>index.php/welcome/login">Login</a>
            <?php }?>
          </li>
       
        </ul>
      </div>
      
    </div>
  </nav>
  <!--/ Nav End /-->
