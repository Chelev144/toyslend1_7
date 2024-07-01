<!-- resources/views/employees/show.blade.php -->
<h1>Employee Details</h1>

<p><strong>Name:</strong> {{ $employee->name }}</p>
<p><strong>Email:</strong> {{ $employee->email }}</p>
<a href="{{ url('/employees') }}" class="btn btn-primary">Back</a>
