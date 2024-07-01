<!-- resources/views/employees/create.blade.php -->
<h1>צור עובד חדש</h1>

<form action="{{ url('/employees') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
   
    <button type="submit" class="btn btn-primary">Create Employee</button>
    <a href="{{ url('/employees') }}" class="btn btn-secondary">Cancel</a>
</form>
