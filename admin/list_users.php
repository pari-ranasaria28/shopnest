<h3 class="text-center">All Users</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php
    $get_users = "select * from `user_table`";
    $result = mysqli_query($con,$get_users);
    $row_count = mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class = 'text-center mt-5' No users yet </h2>";
}
else{
    $number=0;
    echo "<tr class='text-center'>
    <th>Sr. No.</th>
    <th>Username</th>
    <th>User email</th>
    <th>User Image</th>
    <th>User Address</th>
    <th>User Mobile</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";
    while($row_data = mysqli_fetch_assoc($result)){
        $user_id = $row_data['user_id'];
        $username = $row_data['username'];
        $user_email = $row_data['user_email'];
        $user_image = $row_data['user_image'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src = '../user/user_images/$user_image' class = 'edit_img' alt = '$username' /></td>
        <td>$user_address</td>
        <td>$user_mobile </td>
        <td><a href='' <i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}

?>
    </tbody>
</table>