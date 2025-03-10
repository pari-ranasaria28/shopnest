<h3 class="text-center">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr class="text-center">
            <th>Sr. No.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brand = "select * from `brands`";
        $result = mysqli_query($con,$select_brand);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id = $row['Brand_id'];
            $brand_title = $row['Brand_title'];
            $number++;

        
        ?>
        <tr class="text-center">
            <td><?php echo $number ;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class=''><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this ? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal"> <a href = "./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>