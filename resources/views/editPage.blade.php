@extends('index')
@section('title')
HomePage
@endsection
@section('page')
  <style>

body {
  font-family: Arial, Helvetica, sans-serif;
  
}








input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 70%;
  opacity: 0.9;
  display: flex;
  justify-content: center;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: dodgerblue;
}


.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>


<form action="{{ route('upda') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    @foreach ($data  as $d )
    
 
    <div style="display: flex; gap: 10px;">
  <div style="flex: 1;">
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first_name" id="fname" value="{{ $d->first_name }}" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;"required>
  </div>
  <div style="flex: 1;">
    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last_name" id="lname" value="{{ $d->last_name }}" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
  </div>
</div>
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" value="{{ $d->email  }}"v style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
   @if(isset($error))
      <p style="color:red">{{ $error }}</p>
      @endif
    <label for="psw-repeat"><b>Gender</b></label>
    
    <input type="radio"  id="male" name="gender" value= "Male" {{ ($d->gender ) == 'Male' ? 'selected' : '' }} required><label for="male">Male</label>
    <input type="radio"  id="female" name="gender" value="female"  {{ ($d->gender ) == 'Female' ? 'selected' : '' }} r required><label for="female">Female</label>
    <input type="radio"  id="others" name="gender" value= "Other" {{ ($d->gender ) == 'Other' ? 'selected' : '' }} required><label for="female">Others</label>
 <br>
    <label for="name">Date of Birth:</label>
    <input type="date" class="form-control" name="date" id="date" value="{{ $d->date_of_birth }}" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
    <hr>
   
   

    <label for="name">Mobile Number:</label>
    <input type="tel" class="form-control" name="phone" id="phone" value="{{ $d->phone }}" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>

      <label for="file">file:</label>
      <input type="file"  name="file" id="file">
      <div class="d-flex justify-content-center mt-4">
    <button type="submit" class="btn btn-primary px-5 py-2">Update</button>
    </div>
  </div>
  @endforeach
 >
</form>


@endsection