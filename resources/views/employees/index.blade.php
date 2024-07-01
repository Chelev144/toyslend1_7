<!-- resources/views/employees/index.blade.php -->
<html>
<head>
    <title>Employees List</title>
</head>
<body>
    <h1>Employees List</h1>
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee->name }} - {{ $employee->email }}</li>
        @endforeach
    </ul>
</body>
</html>
