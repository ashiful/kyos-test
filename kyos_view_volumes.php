<a href="index.php">Back</a>
<h1>List volumes</h1>

<form action="/list_volumes.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="radio" name="granularity" value="hourly">Hourly<br>
<input type="radio" name="granularity" value="daily">Daily<br>
<input type="radio" name="granularity" value="montly">Monthly<br>
<button type="submit">Show</button><br>
</form>
<br>
<table cellspacing="5">
        <th align="left">Date</th>
        <th align="right">Volume</th>
<?php foreach ($rows as $key => $row) { ?>
    <tr>
        <td><?php echo $row['datetime']; ?></td>
        <td align="right"><?php echo $row['volume']; ?></td>
    </tr>
<? } ?>
</table>
