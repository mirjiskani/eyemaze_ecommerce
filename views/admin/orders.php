<?= include('header.php') ?>
<h3>Order Listing</h3>
<table id="listingTable">
    <tr>
        <th>OID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Payment</th>
        <th>Amount Paid </th>
        <th>Currency </th>
        <th>Transection ID </th>
        <th>Card Holder </th>
        <th>Date Time </th>
        <th>Action</th>
    </tr>
    <?php if (!empty($result)) : ?>
        <?php foreach ($result as $record) : ?>
            <tr>
                <td><?= $record['idorders'] ?></td>
                <td><?= isset($record['firstName']) ? $record['firstName'] . ' ' . $record['lastName'] : '' ?></td>
                <td><?= isset($record['email']) ? $record['email'] : '' ?></td>
                <td><?= ($record['ispaid'] == '0') ? 'Not paid' : $record['ispaid'] ?></td>
                <td><?= isset($record['amount']) ? $record['amount'] : '' ?></td>
                <td><?= isset($record['currency']) ? $record['currency'] : '' ?></td>
                <td><?= isset($record['transectionid']) ? $record['transectionid'] : '' ?></td>
                <td><?= isset($record['cardholder']) ? $record['cardholder'] : '' ?></td>
                <td><?= isset($record['date']) ? $record['date'] : '' ?></td>
                <td class="actionTd"><a href="<?= BASEURL . 'admin/ordersDetails?id=' . $record['idorders'] ?>"><button class="btn btn-primary">View Details</button></a></td>
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="6">No orders</td>
        </tr>
    <?php endif ?>


</table>

<?= include('footer.php') ?>