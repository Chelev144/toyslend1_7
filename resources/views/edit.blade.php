<!-- resources/views/employees/edit.blade.php -->
<h1>Edit Employee</h1>

<form action="{{ url('/employees/'.$employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
    </div>
  
    <button type="submit" class="btn btn-primary">Update Employee</button>
    <a href="{{ url('/employees') }}" class="btn btn-secondary">Cancel</a>
</form>
