
<?php
include('./includes/header.php');
include('./includes/search.php')
?>
    <!-- Navigation -->
<?php 
include('./includes/nav.php');
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                $get_all_posts = array();
                    if($search_query) {
                        
                        if($count === 0) {
                            echo "<h1>No results found!</h1>";
                        }

                        $get_all_posts = $search_query;
                    } else {
                        $query = 'SELECT * FROM posts';

                        $get_all_posts = mysqli_query($connection, $query);
                    }
                    
                   
                    ?>

                    <?php  while ($row = mysqli_fetch_assoc($get_all_posts)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        ?>
                <h2>
                 <a href='#'><?php $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href='index.php'> <?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>         
                <?php }?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
           
            <?php include('./includes/sidebar.php') ?>
        </div>
        <!-- /.row -->

        <hr>

   <?php 
   
   include('includes/footer.php')
   ?>