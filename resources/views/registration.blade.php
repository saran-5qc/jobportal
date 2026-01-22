@extends('index')
@section('title')
HomePage
@endsection
@section('page')
  <style>

body {
  font-family: Arial, Helvetica, sans-serif;
  
}



/* Add padding to containers */




input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
  display: flex;
  justify-content: center;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>


<form action="{{ route('inserts') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div style="display: flex; gap: 10px;">
  <div style="flex: 1;">
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first_name" id="fname" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;"required>
  </div>
  <div style="flex: 1;">
    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last_name" id="lname" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
  </div>
</div>
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
 @if(isset($error))
      <p style="color:red">{{ $error }}</p>
      @endif
    <label for="psw-repeat"><b>Gender</b></label>
    
    <input type="radio"  id="male" name="gender" value="male" required><label for="male">Male</label>
    <input type="radio"  id="female" name="gender" value="female" required><label for="female">Female</label>
    <input type="radio"  id="others" name="gender" value="other" required><label for="female">Others</label>
 <br>
    <label for="name">Date of Birth:</label>
    <input type="date" class="form-control" name="date" id="date" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>
    <hr>
   
   

    <label for="name">Mobile Number:</label>
    <input type="tel" class="form-control" name="phone" id="phone" style=" width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;" required>

      <label for="file">file:</label>
      <input type="file"  name="file" id="file">
      <div class="d-flex justify-content-center mt-4">
    <button type="submit" class="btn btn-primary px-5 py-2">Register</button>
    </div>
  </div>
  <div class="container signin">
    <p>Already have an account? <a href="/logs">Sign in</a>.</p>
  </div>
</form>


@endsection