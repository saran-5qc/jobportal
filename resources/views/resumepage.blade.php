<!DOCTYPE html>
<html>
<head>
	<title>How to create the Resume Template Design Using HTML and CSS</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://kit.fontawesome.com/3ef3559250.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
 
}

body {
 
  font-size: 14px;
  line-height: 20px;
  color: var(--primary-text-clr);
  padding: 0 20px;
}

h2 {
  font-family: 'Times New Roman', Times, serif;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 20px;
}

.resume {
  width: 800px;
  max-width: 100%;
  height: auto;
  display: flex;
  margin: 50px auto;
  background: var(--white);
}

.resume .resume_left {
  width: 270px;
}

.resume .resume_right {
  background: var(--rright-bg);
  width: calc(800px - 270px);
}

.resume_left .r_profile_pic,
.resume_right .r_namerole {
  width: 100%;
  height: 260px;
  padding: 35px;
}

.resume_left .r_profile_pic {
  background: var(--rleft-bg);
}

.resume_left .r_profile_pic img {
  width: 100%;
}

.resume_left .r_left_sub {
  padding: 35px;
}

.resume_left .r_left_sub > div:not(:last-child),
.resume_right .r_right_sub > div:not(:last-child) {
  margin-bottom: 35px;
}

.resume_left .r_aboutme p {
  text-align: center;
}

.resume_left .r_skills ul li,
.resume_left .r_skills ul li p:first-child,
.resume_left .r_hobbies ul li p:first-child {
  display: flex;
  align-items: center;
}

.resume_left .r_skills ul li:not(:last-child) {
  margin-bottom: 10px;
}

.resume_left .r_skills ul li p:first-child,
.resume_left .r_hobbies ul li p:first-child {
  width: 45px;
  height: 45px;
  background: var(--rleft-bg);
  margin-right: 15px;
  border-radius: 50%;
  justify-content: center;
  font-size: 14px;
  color: var(--white);
}

.resume_left .r_hobbies ul {
  display: flex;

}
.r_list1{
margin:0px 20px 0px 0px;
}
.r_list2{
margin:0px 20px 0px 0px;
}
.resume_left .r_hobbies ul li {
  margin-bottom: 10px;

}

.resume_left .r_hobbies ul li p:hover {
  background: var(--rright-bg);
}

.resume_right .r_namerole p {
  font-family: 'Times New Roman', Times, serif;
  font-size: 60px;
  line-height: 80px;
  text-align: center;
}
.resume p,.resume li{ 
  font-size: 15px;;
}
.resume_right .r_namerole p:last-child {
  font-size: 18px;
  line-height: 24px;
  color: var(--white);
}

.resume_right .r_info {
  padding: 35px;
  background: var(--white);
  
}

.resume_right .r_info ul {
  display: flex;
  justify-content: space-between;
}

.resume_right .r_info p {
  font-weight: 700;
  font-size: 18px;
}

.resume_right .r_right_sub {
  padding: 35px;
  padding-bottom: 0;
}

.resume_right .r_right_sub p {
  color: var(--white);
}

.resume_right .r_right_sub ul li {
  display: flex;
  margin-bottom: 20px;
}

.resume_right .r_right_sub ul li div:first-child {
  width: 25%;
  margin-right: 15px;
}

.resume_right .r_right_sub ul li div:last-child {
  width: 75%;
}

.resume_right .r_right_sub p:first-child {
  font-size: 18px;
  margin-bottom: 5px;
}
</style>
<body>

<section class="resume" style="border:1px solid black; background-color:grey;">
	<div class="resume_left"style="background-color:white;">
	    <div class="r_profile_pic">
	      <img src="{{ asset('uploads/' .$applicants->image) }}" alt="profile_pic">
	    </div>
	    <div class="r_left_sub">
	    
	      <div class="r_skills">
	        <h2>Skills</h2>
	        <ul>
                @foreach($skill as $s)
	          <li>
	            <i class="fa-solid fa-circle-dot"></i>
	            <p>{{ $s  }}</p>
	          </li>
	          @endforeach
	        </ul>
	      </div>
	      <div class="r_hobbies">
	        <h2>Hobbies</h2>
               @foreach($hob as $h)
	        <ul>
             
	          <li>
              <i class="fa-solid fa-circle-dot"></i>
	            {{ $h }}
	         </li>
          
	        </ul>
               @endforeach
	      </div>
        
          <div class="r_hobbies">
	        <h2>Language</h2>
               @foreach($bene as $b)
	        <ul>
             
	          <li>
             <i class="fa-solid fa-circle-dot"></i>

	            {{ $b }}
	         </li>
          
	        </ul>
               @endforeach
	      </div>
	    </div>
	</div>
	<div class="resume_right">
	    <div class="r_namerole">
	      <p>{{ $applicants->name }}</p>
	      <p class="role">{{ $data->title }}</p>
	    </div>
	    <div class="r_info">
	      <ul>
           <i class="fa-solid fa-envelope"></i>
	        <li class="r_list1">
	          <p>{{ $applicants->email }}</p>
	        </li>
          <i class="fa-solid fa-phone"></i>
	        <li class="r_list2">
	          <p>{{ $applicants->phone }}</p> 
	        </li>
          <i class="fa-solid fa-location-dot"></i>
             <li class="r_list3">
	          <p>{{ $applicants->address }}</p> 
	        </li>
	      </ul>
	    </div>
	    <div class="r_right_sub">
	      <div class="r_education">
              <div class="r_aboutme">
	        <h2>About me</h2>
          <p>{{ $applicants->Summary }}</p>
	      </div>
	        <h2>Education</h2>
             @foreach($edu as $e)
	        <ul>
	          <li>
	           
	            <div class="r_ed_right">
	              <i class="fa-solid fa-circle-dot"></i>
                  {{ $e }}
               
	            </div>
	          </li>
	       
	          
	        </ul>
               @endforeach
	      </div>
	      <div class="r_jobs">
	        <h2>Projects</h2>
             @foreach($exp as $exp)
	        <ul>
	          <li>
	           
	            <div class="r_ed_right">
	              
                   <li> <i class="fa-solid fa-circle-dot"></i>{{$exp}} </li>
                  
	            </div>
	          </li>
	          @endforeach
	        </ul>
	      </div>
        <div class="row">
                            <div class="col-md-6 mb-4">
        @if (session('user_id'))
                @if (session('user_id')==$applicants->user_id)
                <style>
.custom-edit-button {
    display: inline-block;
    padding: 8px 20px;
    background-color:rgb(44, 148, 49);
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 25px; 
    margin:0px 0px 0px 5px;
    transition: background-color 0.3s ease;
    font-family: sans-serif;
}

.custom-edit-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
</style>

                   <div class="card-footer  p-4">
                        <a href="{{ url('/editresume', $applicants->id) }}" class="custom-edit-button"> Edit</a>

                       </div>

                @endif
                @endif
</div>
</div>
	    </div>
	</div>
</section>

</body>
</html>
