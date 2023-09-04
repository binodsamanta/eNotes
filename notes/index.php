<?php
include("connection.php");
include("editmodal.php");
if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['desc'])){
    $title=$_POST['title'];
    $desc=$_POST['desc'];

    $sql="insert into notes(title,description) values('$title','$desc')";
    $res=mysqli_query($con,$sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eNotes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand " href="#"><h2>eNotes</h2></a>
    </div>
    </nav>
    <div class="container my-4">
        <form class="body-structure" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title..">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Enter Description.."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add note</button>
        </form>
    </div>
    <div class="container">
        <?php
        $sql = "select * from notes";
        $res=mysqli_query($con,$sql);
        $flag=false;
        while($row=mysqli_fetch_assoc($res)){
            $flag=true;
            echo '<div class="card my-3">
                <div class="card-body">
                <h5 class="card-title">'.$row['title'].'</h5>
                <p class="card-text">'.$row['description'].'</p>
                <button type="button" id="'.$row['sl_no'].'" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit
                </button>
                <a href="delete.php? delete_id='.$row['sl_no'].'" class="btn btn-danger">Delete</a>
                </div>
            </div>';
        }
        if($flag==false){
            echo '<div class="card my-3">
                    <div class="card-body">
                    <h5 class="card-title">Message:</h5>
                    <p class="card-text">No notes are available</p>
                    </div>
                </div>';
        }
        ?>
    </div>
    <script>
        const edit=document.querySelectorAll(".edit");
        const edittitle=document.getElementById("edittitle");
        const editdesc=document.getElementById("editdesc");
        const hiddeninput=document.getElementById("hidden");
        edit.forEach(element=>{
            element.addEventListener("click", ()=>{
                const titleText = element.parentElement.children[0].innerText;
                const desc = element.parentElement.children[1].innerText;
                edittitle.value=titleText;
                editdesc.value=desc;
                hiddeninput.value=element.id;
                console.log(hiddeninput);
            });
        });
    </script>
</body>
</html>