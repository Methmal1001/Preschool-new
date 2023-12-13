<h3 class="text-center text-success">User Feedbacks</h3>

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th class='bg-info'>User ID</th>
            <th class='bg-info'>Child Name</th>
            <th class='bg-info'>Date</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $get_feedback = "SELECT * FROM started";
    $result = mysqli_query($con, $get_feedback);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<h2 class='text-danger text-center mt-5'>There is no users registered</h2>";
    } else {
        $number = 0;

        while ($row_data = mysqli_fetch_assoc($result)) {
            $st_id = $row_data['st_id'];
            $childname = $row_data['childname'];
            // Assuming you have a date column, replace 'date' with the actual date column name
            $date = $row_data['date'];
            $number++;

            echo "<tr>
                <td class='bg-secondary text-light'>$number</td>
                <td class='bg-secondary text-light'>$childname</td>
                <td class='bg-secondary text-light'>$date</td>
                <td class='bg-secondary text-light'>
                    <a href='delete_user.php?delete_user=$st_id' class='text-light'><i class='fa-solid fa-trash'></i></a>
                </td>
            </tr>";
        }
    }
    ?>

    </tbody>
</table>
