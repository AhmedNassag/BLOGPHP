<?php

 include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
 include('includes/topbar.php');
 include('includes/database/dbconfig.php');

?>

<div class="modal fade" id="deptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Dept Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label> Description </label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label> Dept Image </label>
                        <input type="file" name="dept_image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="submit" name="dept_save" class="btn btn-primary"> Save </button>
                </div>
            </form>
        </div>
    </div>
</div>  

<div class='container-fluid'>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Academics - Departments (Category)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#deptmodal"> Add </button>
            </h6>
        </div>

        <div class="card-body">

        <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h2 class="bg-primary text-white">' .$_SESSION['success']. '</h2>';
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                echo '<h2 class="bg-danger text-white">' .$_SESSION['status']. '</h2>';
                unset($_SESSION['status']);
            }
        ?>

            <div class="table-responsive"> 

                <?php
                    $query      = "SELECT * FROM dept_category";
                    $query_run  = mysqli_query($connection,$query);

                    if(mysqli_num_rows($query_run) > 0 )
                        {     
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Dept Name </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th> Edit </th> 
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>

                        <tr>
                            <td> <?php echo $row['id']; ?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['description']; ?> </td>
                            <td> <?php echo '<img src="upload/departments/' .$row['image'].'" width="100px;" heigh="100px;" alt="Image">'?> </td>
                            <td>
                                <form action="departments_edit.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="dept_cate_edit_btn" class="btn btn-success"> Edit </button>
                                </form>
                            </td>
                            <td> 
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="dept_cate_delete_btn" class="btn btn-danger"> Delete </button> 
                                </form>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        ?>

                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>



<?php

 include('includes/scripts.php');
 include('includes/footer.php');

?>