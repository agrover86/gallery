<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>

<?php
    $photos = User::find_by_id($session->user_id)->photos();
 ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


           <!-- Brand and toggle get grouped for better mobile display -->
           <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include("includes/side_nav.php") ?>


            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>
                      <h1 class="page-header">
                          PHOTOS
                      </h1>

                    <div class="col-md-12">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Id</th>
                          <th>File Name</th>
                          <th>Title</th>
                          <th>Size</th>
                          <th>Comments</th>


                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($photos as $photo) : ?>

                        <tr>
                          <td> <img class= "admin-photo-thumbnail" src=<?php echo $photo->picture_path(); ?> alt="">
                              <div class="action_link">
                                <a class= "delete_link" href="delete_photo.php?id=<?php echo $photo->photo_id;?>">Delete</a>
                                <a href="edit_photos.php?id=<?php echo $photo->photo_id; ?>">Edit</a>
                                <a href="../photo.php?id=<?php echo $photo->photo_id; ?>">View</a>
                               </div>
                          </td>
                          <td><?php echo $photo->photo_id; ?></td>
                          <td><?php echo $photo->filename; ?></td>
                          <td><?php echo $photo->title; ?></td>
                          <td><?php echo $photo->size; ?></td>
                          <td><?php
                                 $comments = Comment::find_comment($photo->photo_id);
                              ?>
                                 <a href="comment_photo.php?id=<?php echo $photo->photo_id;?>">
                                    <?php echo count($comments); ?>
                                </a>
                          </td>
                        </tr>

                      <?php endforeach;  ?>
                      </tbody>
                    </table>  <!--- End of table -!>


                    </div>


                  </div>
              </div>
              <!-- /.row -->

          </div>
          <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
