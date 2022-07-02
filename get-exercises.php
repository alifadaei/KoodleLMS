<? include_once './auth-check.php'; ?>
<?
include_once './authorization.php';

//exercises
$SQL = "SELECT * from exercises where course_id=$course_id";
$result_exercises = mysqli_query($conn, $SQL);
?>
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">exercise id</th>
        <th scope="col">exercise name</th>
        <th scope="col">deadline</th>
        <th scope="col">functions</th>
    </tr>
</thead>
<tbody>

    <?
    $index = 1;
    while ($row = $result_exercises->fetch_array()) : ?>
        <tr>
            <th scope="row"><? echo $index++ ?></th>
            <td><? echo $row['exercise_id'] ?></td>
            <td><? echo $row['exercise_name'] ?></td>
            <td><? echo $row['deadline'] ?></td>
            <td class="btn-td">
                <button row-num="<? echo $inedx++; ?>" ex-id="<? echo $row['exercise_id'] ?>" class="btn btn-sm btn-outline-danger btn-del">
                    <span>Delete</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
                <button ex-id="<? echo $row['exercise_id'] ?>" class=" btn btn-sm btn-outline-primary btn-edit">
                    <span>Edit</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </td>
        </tr>
    <? endwhile ?>
</tbody>