<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Dashbaord</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="<?= BASEURL ?>assets/adminstyle.css">
  <!-- <link rel="stylesheet"
		href="responsive.css"> -->
  <script src="https://kit.fontawesome.com/a6f759ee30.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- for header part -->
  <header>

    <div class="logosec">
      <div class="logo">Dashbaord</div>
      <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
    </div>

    <div class="searchbar">
      <input type="text" placeholder="Search">
      <div class="searchbtn">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-icon">
      </div>
    </div>

    <div class="message">
      <div class="circle"></div>
      <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
      <div class="dp">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
      </div>
    </div>
  </header>

  <div class="main-container">
    <div class="navcontainer">
      <nav class="nav">
        <div class="nav-upper-options">
          <a href="dashboard">
            <div class="nav-option option1">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
              <h3> Dashboard</h3>
            </div>
          </a>
          <a href="products">
            <div class="option2 nav-option">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">
              <h3> Products</h3>
            </div>
          </a>
          <a href="users">
            <div class="nav-option option3">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
              <h3> Users</h3>
            </div>
          </a>

          <a href="orders">
            <div class="nav-option option4">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png" class="nav-img" alt="institution">
              <h3> Orders</h3>
            </div>
          </a>
          <a href="profile">
            <div class="nav-option option5">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
              <h3> Profile</h3>
            </div>
          </a>
          <a href="settings">
            <div class="nav-option option6">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png" class="nav-img" alt="settings">
              <h3>Site Settings</h3>
            </div>
          </a>
          <a href="logout">
            <div class="nav-option logout">
              <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
              <h3>Logout</h3>
            </div>
          </a>

        </div>
      </nav>
    </div>
    <div class="main">

      <div class="searchbar2">
        <input type="text" name="" id="" placeholder="Search">
        <div class="searchbtn">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-button">
        </div>
      </div>

      <div class="box-container">

        <div class="box box1">
          <div class="text">
            <h2 class="topic-heading">60.5k</h2>
            <h2 class="topic">Users</h2>
          </div>
          <!-- <i class="fa-regular fa-user"></i> -->
        </div>

        <div class="box box2">
          <div class="text">
            <h2 class="topic-heading">150</h2>
            <h2 class="topic">Products</h2>
          </div>
          <!-- <i class="fa-brands fa-product-hunt"></i> -->
        </div>

        <div class="box box3">
          <div class="text">
            <h2 class="topic-heading">320</h2>
            <h2 class="topic">Orders</h2>
          </div>
          <!-- <a href="#"><i class="fa-thin fa-cart-shopping fa-lg"></i></a> -->
        </div>

        <!-- <div class="box box4">
					<div class="text">
						<h2 class="topic-heading">70</h2>
						<h2 class="topic">Published</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div> -->
      </div>