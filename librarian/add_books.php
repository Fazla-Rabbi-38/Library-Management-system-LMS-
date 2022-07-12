<?php
   require_once 'header.php';
if (isset($_POST['save_book'])) {
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $publication_name = $_POST['publication_name'];
    $purchase_date = $_POST['purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    //$available_qty = $_POST['available_qty'];

    $image = explode('.', $_FILES['book_image']['name']);
    $image_ext = end($image);
    $image = date('Ymdhis.').$image_ext;
    


/*if (isset($_POST['book_name'])) {
    $book_name = $_POST['book_name'];}
     if (isset($_POST['author_name'])) {
    $author_name = $_POST['author_name'];}
    if (isset($_POST['publication_name'])) {
    $publication_name = $_POST['publication_name'];}
     if (isset($_POST['purchase_date'])) {
    $purchase_date = $_POST['purchase_date'];}
     if (isset($_POST['book_price'])) {
    $book_price = $_POST['book_price'];}
     if (isset($_POST['book_qty'])) {
    $book_qty = $_POST['book_qty'];}
     if (isset($_POST['available_qty'])) {
    $available_qty = $_POST['available_qty'];}
    if(isset($_FILES['book_image'])){
      $book_name = $_FILES['book_image']['name'];
     
      $image_ext=strtolower(end(explode('.',$_FILES['book_image']['name'])));
      
      $extensions= array("jpeg","jpg","png");

      if(in_array($image_ext,$extensions)=== false){
         $error="extension not allowed, please choose a JPEG or PNG file.";

     $book_image = date('Ymdhis.').$image_ext;
      }*/
    $sql="INSERT INTO books(book_name, book_image,author_name,publication_name,purchase_date,book_price,book_qty) VALUES ('$book_name','$image','$author_name','$publication_name','$purchase_date','$book_price','$book_qty')";
    $result = mysqli_query($con,$sql);
    if ($result) {
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $success = "Data SAVED succesfully";
    }else{
        $error ="Data not SAVED!";
    }
}

?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-offset-3">

            <?php
            if (isset($success)) {
                ?>
                <div class="alert alert-success" role="alert">
  
                 <?= $success ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>

<?php
            if (isset($error)) {
                ?>
                <div class="alert alert-danger" role="alert">
  
                 <?= $error ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  <?php
 }
  ?>
                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" required name="book_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image </label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="book_image" name="book_image" required>
                                            </div>
                                        </div><div class="form-group">
                                            <label for="author_name" class="col-sm-4 control-label">Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="author_name" placeholder="Author Name" name="author_name" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="publication_name" class="col-sm-4 control-label">Publication Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="author_name" placeholder="Publication Name" name="publication_name" required="">
                                            </div>
                                        </div><div class="form-group">
                                            <label for="purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="purchase_date" name="purchase_date">
                                            </div>
                                        </div>
                                        </div><div class="form-group">
                                            <label for="number" class="col-sm-4 control-label">Book Price</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price" required>
                                            </div><div class="form-group">
                                            <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty" required>
                                            </div>
                                            
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" name="save_book" value="Save Book" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <?php
   require_once 'footer.php';
?>