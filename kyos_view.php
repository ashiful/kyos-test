<h1>List profiles</h1>

<a href="?entity=2">Filter on entity = British</a><br>
<a href="?commodity=3">Filter on commodity = Oil</a><br>
<a href="?start_date=01-01-2015">Filter on start date = 01-01-2015</a><br>
<a href="?end_date=31-12-2015">Filter on end date = 31-12-2015</a><br>
<br>
<table cellspacing="5">
    <tr>
        <th>ID</th>
        <th align="left">Name</th>
        <th align="left">Start Date</th>
        <th align="left">End Date</th>
    <tr>
<?php foreach ($rows as $key => $row) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo gmdate('d-m-Y', $row['start_date']); ?></td>
        <td><?php echo gmdate('d-m-Y', $row['end_date']); ?></td>
        <!-- Fix 2 -->
        <td><a href="/list_volumes.php?id=<?php echo $row['id'];?>">View volumes</a>
    </tr>
<? } ?>
</table>
<br>
<a href="summary.php">Show summarized volumes per commodity</a>
