<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
</head>
<body>

    <h2>View Attendance for Course ID: {{ $courseId }}</h2>

    @foreach ($datesOfClasses as $date)
        <button onclick="location.href='{{ route('attendance_view_of_day', ['courseId' => $courseId, 'date' => $date]) }}'" type="button">{{ $date }}</button>
    @endforeach

    <br>
    <button onclick="history.go(-1);" type="button">Back</button>

</body>
</html>
