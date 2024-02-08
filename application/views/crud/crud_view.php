<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operatiopns</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">News Blog</h1>
    
  </div>
</div>


<div class="container mt-5">

<!-- ADD NEWS BUTTON -->
<div class="col text-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
    Add News
</button>
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add News Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
                <form action="<?php echo base_url(); ?>crud/create" method="post">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                   
               
               

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add News</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>


    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        

           
<?php foreach ($news_details as $news): ?>
    <tr>
        <td><?php echo $news->id; ?></td>
        <td><?php echo $news->title; ?></td>
        <td><?php echo $news->created_at; ?></td>
        <td>
            

        <!-- VIEW BUTTON -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong<?php echo $news->id; ?>">
                View
            </button>

          
            <div class="modal fade" id="exampleModalLong<?php echo $news->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">News</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $news->content; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            
        
<!-- EDIT BUTTON -->
                    
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal<?php echo $news->id; ?>">
    Edit
</button>


<div class="modal fade" id="updateModal<?php echo $news->id; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalTitle">Update News Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
                <form action="<?php echo base_url(); ?>crud/edit/<?php echo $news->id;?>" method="post">
                
               
               
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $news->id; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $news->title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created At:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $news->created_at; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Content:</label>
                        <textarea class="form-control" id="description" name="content"><?php echo $news->content ?></textarea>
                    </div>
                    <!-- <input type="hidden" name="_method" value="put"> -->
                    
                
                

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update News</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
            </form>
        </div>
    </div>
</div>


<!-- DELETE BUTTON -->
                   
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $news->id; ?>">
    Delete
</button>


<div class="modal fade" id="deleteModal<?php echo $news->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Delete News Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
                <p>Are you sure you want to delete the news article with ID <?php echo $news->id; ?>?</p>

            </div>
            <div class="modal-footer">
               
                <form action="<?php echo base_url(); ?>crud/delete/<?php echo $news->id;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $news->id; ?>">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Delete</button>
                
               

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

                </td>



            </tr>



        <?php endforeach;?>


        
        
        </tbody>
    </table>
</div>
    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>