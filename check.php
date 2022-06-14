<?php 
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/check.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/0b1394bbb5.js" crossorigin="anonymous"></script>
    <title>Assignment Tracker</title>
  </head>

  <body>
    <a href="tambah.php" onclick="newElement()" class="addBtn">
      <i class="fa-solid fa-plus"></i>
    </a>

    <div class="header">
      <a class="dot-home" href="index.php">
        <i class="fa-solid fa-house"></i>
      </a>
      <a class="dot-cal" href="calendar.php">
        <i class="fa-solid fa-calendar-days"></i>
      </a>
      <a class="dot-cek" href="check.php">
        <i class="fa-solid fa-check"></i>
      </a>
    </div>

    <div id="myDIV" class="head">
      <h2>Assignment List</h2>
      <form method="get" class="example" action="">
        <div class="searchBtn">
          <input type="text" placeholder="Find Something..." name="search" />
          <button type="submit" name="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <?php 
        $lists = $conn->query("SELECT 
                             * FROM assignment_list ORDER BY deadline ASC");
        if(isset($_GET["submit"])){
            $lists = $_GET["search"];
            $lists = $conn->query("SELECT *
                                    FROM assignment_list WHERE Title LIKE '%".$_GET['search']."%' ORDER BY deadline ASC");
        }
    ?>
    <?php if(mysqli_num_rows($lists) <= 0){ ?>
                    <div class="empty">
                        <p>No assignment</p>
                    </div>
                </div>
            <?php } ?>
    <ul id="myUL">
    <?php while($list = $lists->fetch_assoc()) { ?>
                <div class="list-item">
                    <?php if($list['status'] == 'DONE'){ ?> 
                        <li class = "done">
                          <div class="abcd">
                            <a href="edit.php">
                              <div class="asgDetail">
                                <p class="asgName"><?php echo $list['Title']?></p>
                                <p class="asgDescription"><?php echo substr($list['Description'], 0, 100)?>...</p>
                              </div>
                              <a href="hapus.php?AssgID=<?php echo $list['AssgID']?>"><i class="fa-solid fa-trash trashcan" onclick="return confirm('yakin akan menghapus?')"></i></a>
                            </a>
                          </div>
                        </li>
                    <?php } ?>
                </div>             
    <?php } ?>
    </ul>
  </body>
</html>
