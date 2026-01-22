@extends('index')
@section('title')
HomePage
@endsection
@section('page')

<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card p-5" style="width: 500px;">
    <h1 class="text-center mb-4">Change Password</h1>
    <form action="{{  route('changePassword')}}" method="POST">
      @csrf

      <div class="form-group mb-3">
        <label for="existingpassword" class="mb-2">Existing Password:</label>
        <input type="password" class="form-control" name="existingpassword" placeholder="Enter Existing Password">
      </div>

      <div class="form-group mb-3">
        <label for="newpassword" class="mb-2">New Password:</label>
        <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
      </div>

      <div class="form-group mb-3">
        <label for="confirmpassword" class="mb-2">Confirm Password:</label>
        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm New Password">
      </div>

      @if(isset($error))
        <div class="alert alert-danger">{{ $error }}</div>
      @endif

      @if(isset($emailerror))
        <div class="alert alert-danger">{{ $emailerror }}</div>
      @endif

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Change Password</button>
      </div>
    </form>
  </div>
</div>

@endsection
