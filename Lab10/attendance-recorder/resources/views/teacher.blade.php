<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Attendance</title>
</head>
<body>

    <header>
        <h1>Attendance Management System</h1>
    </header>

    <main>
        @php
            $teachername = request('teachername');
            $teacherid = request('teacherid');
            $classes = \DB::table('class')->where('teacherid', $teacherid)->get();
        @endphp

        <h2>Welcome, {{ $teachername }}!</h2>

        @if($classes->count() > 0)
            @foreach($classes as $class)
                <div class="course-card">
                    <h3>Course ID: {{ $class->id }}</h3>

                    {{-- Add buttons for taking and viewing attendance --}}
                    <button onclick="location.href='{{ route('take_attendance', ['courseId' => $class->id]) }}'" type="button">Take Attendance</button>
                    <button onclick="location.href='{{ route('view_attendance', ['courseId' => $class->id]) }}'" type="button">View Attendance</button>
                </div>
            @endforeach
        @else
            <p>Not teaching any courses currently.</p>
        @endif
    </main>

</body>
</html>
