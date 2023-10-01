<?= include('header.php') ?>
<h3>User Listing</h3>

<table id="listingTable">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <!-- <th>Image</th> -->
        <th>Status</th>
        <th>Role</th>
    </tr>
    <?php if (!empty($result)) : ?>
        <?php foreach ($result as $record) : ?>
            <?php
            $status = ['In Active', 'Active'];
            
            ?>
            <tr>
                <td><?= $record['firstName'] ?></td>
                <td><?= $record['lastName'] ?></td>
                <td><?= $record['email'] ?></td>
                <!-- <td><img src="<?= $record['product_image'] ?>" alt="Girl in a jacket" width="50" height="50"></td> -->
                <td><?= $status[$record['status']] ?></td>
                <td><?= ($record['role'] == '1') ?'Admin':'Customer' ?></td>
                <!-- <td class="actionTd"><button class="btn btn-primary">Update</button><a href="deleteProduct?id=<?= $record['idproducts']; ?>" class="btn btn-danger">Delete</a></td> -->
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="6">No users</td>
        </tr>
    <?php endif ?>


</table>

<?= include('footer.php') ?>