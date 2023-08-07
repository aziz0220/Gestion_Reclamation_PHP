<?php
while ($complaint = $res2->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $complaint['rec_title']; ?></td>
        <td><?php echo $complaint['rec_type']; ?></td>
        <td><?php echo $complaint['rec_rating']; ?></td>
        <td><?php echo $complaint['rec_status']; ?></td>
        <td><?php echo $complaint['Description']; ?></td>
        <td><?php echo $complaint['client_name']; ?></td>
        <td><?php echo $complaint['created_at']; ?></td>
        <td><?php echo $complaint['treated_at']; ?></td>
    </tr>
<?php } ?>