<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$dataAssg = $_GET['AssgID'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/edit.css" />
    <style>
        #file,
        #deadline,
        #status,
        #link,
        #description {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        border-radius: 30px;
        background-color: #f1f1f1;
        color : black;
        }
        textarea{
          resize :none;
        }
    </style>
  </head>
  <body>
    <form action="" method="post" enctype = "multipart/form-data">
        <?php 
            $assg = $conn->query("SELECT 
                             * FROM assignment_list WHERE AssgID LIKE '$dataAssg'");
        ?>
      <div class="container">
        <h1>Edit Assignment</h1>
        <p>Fill to edit assignment</p>
        <hr />
        <?php $asg = $assg->fetch_assoc(); { ?>
        <input type="hidden" name="id" value="<?=$asg["AssgID"]; ?>">
        <label for="title"><b>Title</b></label>
        <input type="text" value="<?php echo $asg['Title']?>" name="title" id="title"/>

        <label for="file"><b>File</b></label>
        <input type="file" value="<?php echo $asg['File']?>" name="file" id="file" />

        <label for="description"><b>Description</b></label>
        <textarea name="description" id="description" wrap="hard"><?php echo $asg['Description']?></textarea>

        <label for="deadline"><b>Deadline</b></label>
        <input type="datetime-local" value="<?php echo $asg['Deadline']?>" name="deadline" id="deadline"/>

        <label for="status"><b>Status</b></label>
            <select name="status" id="status">
                <option value="NOT DONE">Not Done</option>
                <option value="ON PROGRESS">On Progress</option>
                <option value="DONE">Done</option>
            </select>
        <hr />
        <?php } ?>

        <button type="submit" name="submit" class="registerbtn">Save</button>
      </div>

    </form>
  </body>
</html>

<?php 
        if(isset($_POST['submit'])) {
            $title = (!empty($_POST['title'])) ? $_POST['title'] : $asg['Title'];
            $description = (!empty(htmlentities($_POST['description']))) ? htmlentities($_POST['description']) : $asg['Description'];
            $deadline = (!empty($_POST['deadline'])) ? $_POST['deadline'] : $asg['Deadline'];
            $status = (!empty($_POST['status'])) ? $_POST['status'] : $asg['status'];
            $file = upload();

            $update = $conn->query("UPDATE assignment_list SET
                            Title = '$title',
                            Description = '$description',
                            Deadline = '$deadline',
                            status = '$status',
                            File = '$file'
                            WHERE AssgID = '$dataAssg'
                        ");
                echo "
                    <script>
                        alert('data berhasil diubah!');
                        document.location.href = 'index.php';
                    </script>
                ";
            }  
        ?>
