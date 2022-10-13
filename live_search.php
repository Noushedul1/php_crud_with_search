<?php
require "./database.php";
require "./function.php";

$search_value = mysqli_prep($_POST['search_value']);

$search_sql = "SELECT * FROM studentdetails WHERE sname LIKE '%{$search_value}%'";
$result = mysqli_query($connection,$search_sql);
if(mysqli_num_rows($result) > 0) {
$i = 1;
while($row = mysqli_fetch_array($result)){
?>
<tr>
        <td><?= $i++ ?></td>
        <td><?= mysqli_prep($row['sname']); ?></td>
        <td><?= mysqli_prep($row['age']); ?></td>
        <td><?= mysqli_prep($row['city']); ?></td>
        <td>
            <button class="btn btn-danger" onclick="DELETE(<?php echo mysqli_prep($row['id']); ?>)">Delete</button>
            <button  type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropedit" class="btn btn-primary" onclick="EDIT(<?php echo mysqli_prep($row['id']); ?>)">Edit</button>
        </td>
</tr>
<?php }?>

<?php } else {?>
    <tr>
        <td colspan="4"><?php echo "No search result"; ?></td>
    </tr>
<?php } ?>