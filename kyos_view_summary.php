<a href="index.php">Back</a>
<h1>Summary volumes</h1>

<table cellspacing="5">
        <th align="left">Commodity</th>
        <th align="right">Volume (sum)</th>
<?php foreach ($rows as $commodity => $volume) { ?>
    <tr>
        <td><?php echo $commodity;?></td>
        <td><?php echo $volume;?></td>
    </tr>
<? } ?>
</table>
