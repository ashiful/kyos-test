<script>
    // set button checked
    function checkRadioButton() {
        var paramGranularity = window.location.search.substr(1).split("&")[1].split("=")[1];
        switch (paramGranularity) {
            case 'hourly':
                document.getElementById("gh").checked = true;
                break;
            case 'daily':
                document.getElementById("gd").checked = true;
                break;
            case 'monthly':
                document.getElementById("gm").checked = true;
                break;
        }
    }
    window.onload = checkRadioButton;
</script>
<a href="index.php">Back</a>
<h1>List volumes</h1>

<form action="/list_volumes.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="radio" id="gh" name="granularity" value="hourly" checked="checked">Hourly<br>
<input type="radio" id="gd" name="granularity" value="daily">Daily<br>
<input type="radio" id="gm" name="granularity" value="monthly">Monthly<br>
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
