<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
</head>
<body>

    <form method="post">
        <table border="1">
            <tr><th>Student Name</th><th>Mark Attendance</th></tr>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->fullname }}</td>
                    <td>
                        <button type="submit" name="attendance[{{ $student->id }}]" value="present">Present</button>
                        <button type="submit" name="attendance[{{ $student->id }}]" value="absent">Absent</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </form>

    <br>
    <button onclick="history.go(-1);" type="button">Back</button>

</body>
</html>
