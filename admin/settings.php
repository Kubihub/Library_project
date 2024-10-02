<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWL</title>
    <link rel="stylesheet" href="../css/main.css">
    
</head>
<body>

<div class="content">
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search................" />
            <button type="submit"><i class="bx bx-search"></i></button>
          </div>
        </form>
        <a href="#" class="notification">
          <i class="bx bx-bell"></i>
          <span>12</span>
        </a>

        <a href="#" class="profile">
          <img src="./img/logo-1.png" alt="" />
        </a>
      </nav>

<!-- =============Sidebar Start================ -->
<div class="sidebar">
      <a href="#" class="logo">
        <img src="./img/logo-1.png" alt="" />
        <span>Ghana</span>Water
      </a>
      <ul class="side-menu">
        <li class="active">
          <a href="../../index.php"><i class="bx bxs-dashboard"></i>Home</a>
        </li>
        <li>
          <a href="journal.php"><i class="bx bx-video"></i>Journals</a>
        </li>
        <li>
          <a href="book.php"><i class="bx bx-bar-chart"></i>Books</a>
        </li>
        <li>
          <a href="profile.php"><i class="bx bx-comment-detail"></i>Profile</a>
        </li>
       
        <!-- <li>
          <a href="settings.php"><i class="bx bx-cog"></i>Settings</a>
        </li> -->
      </ul>

      <div class="side-menu">
        <ul>
          <li>
            <a href="#"><i class="bx bx-moon"></i>Dark / Light</a>
          </li>
          <li>
            <a href="#" class="logout"
              ><i class="bx bx-log-out-circle"></i>Logout</a
            >
          </li>
        </ul>
      </div>
    </div>
    <!-- =============Sidebar Close================ -->



    


      <!-- Main Start -->
      <main>
        <div class="header">
          <h1>Library Dashboard</h1>
          <ul class="breadcrumb">
            <li><a href="#" class="active">Books</a></li>
            /
            <li><a href="#">Content</a></li>
          </ul>
        </div>

        <!--============= cards start ===============-->
        <ul class="cards">
          <li>
            <i class="bx bx-group"></i>
            <span class="info">
              <h3>7,373</h3>
              <p>New Users</p>
            </span>
          </li>
          <li>
            <i class="bx bx-cart-add"></i>
            <span class="info">
              <h3>9,373</h3>
              <p>Total Orders</p>
            </span>
          </li>
          <li>
            <i class="bx bx-line-chart"></i>
            <span class="info">
              <h3>5,373</h3>
              <p>Site Visits</p>
            </span>
          </li>
          <li>
            <i class="bx bx-dollar-circle"></i>
            <span class="info">
              <h3>$6,373</h3>
              <p>This Month</p>
            </span>
          </li>
        </ul>
        <!--============= cards close ===============-->

        <!--============= bottom Data Start ===============-->
        <div class="bottom_data">
          <div class="orders">
            <div class="header">
              <h3>Recent Orders</h3>
            </div>
            <table>
              
              </tbody>
            </table>
          </div>

          <!--============= Reminder Start ===============-->
          <div class="reminders">
            <div class="header">
              <h3>Reminders</h3>
            </div>
            
          </div>
          <!--============= Reminder Close ===============-->
        </div>
        <!--============= bottom Data Start ===============-->
      </main>
      <!-- Main Close -->
    </div>
    <!-- =============Contetn CLose================ -->

    <script src="js/main.js"></script>
</body>
</html>