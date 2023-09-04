<?php
include("connection.php");
if(isset($_POST["hidden"]) && isset($_POST['update'])){
    $title=$_POST['edittitle'];
    $desc=$_POST['editdesc'];
    $id=$_POST["hidden"];
    $sql = "update notes set title='$title', description='$desc' where sl_no='$id'";
    $res=mysqli_query($con,$sql);

}
    echo '<!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post">
                <input type="hidden" name="hidden" id="hidden">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="edittitle" name="edittitle" placeholder="Enter title..">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="editdesc" name="editdesc" rows="3" placeholder="Enter Description.."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update note</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>';
?>