@extends('index')
@section('title')
HomePage
@endsection
@section('page')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post a Job</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @foreach ($data as $d )
                
               
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">{{  $d->first_name}} {{ $d->last_name }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <div class="card-body p-0">
                    <ul class="list-group list-group-flush ">
        
        <li class="list-group-item d-flex justify-content-between p-3">
            <a href="/changePasspage">Change Password</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="/jobViews">Post a Job</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="/showjobs">My Posted Jobs</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="/showjo">Jobs Applied</a>
        </li>
        
        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
            <a href="/edited">Edit Profile</a>
        </li>                                                       
    </ul>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-9">
            <div class="card-footer  p-4">
                        
                        <a name="" id="" class="btn btn-primary" href="/showjobs" role="button">show jobs</a>
                    </div>
            <form action="{{route('posts')}}" method="POST">
            @csrf
                <div class="card border-0 shadow mb-4 ">
               
                    <div class="card-body card-form p-4">
                   
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        
                       
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>

                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                  @endif

                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                <select class="form-select" name="jobtype">
                                    @if($jobType->isNotEmpty())
                                    @foreach ($jobType as $jobTypes)
                                    <option value="{{ $jobTypes->id }}">{{ $jobTypes->name }}</option>
                                  @endforeach
                                  @endif
                                </select>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" placeholder="location" id="location" name="location" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Experience</label>
                                <select  id="experience" name="experience">
                             <option value="" disabled selected>Select experience</option>
    <option value="1">1 year</option>
    <option value="2">2 year</option>
    <option value="3">3 year</option>
    <option value="4">4 year</option>
    <option value="5">5 year</option>
    <option value="6">6 year</option>
    <option value="7">7 year</option>
    <option value="8">8 year</option>
    <option value="9">9 year</option>
    <option value="10">10 year</option>
    <option value="10+">10+ years</option>
  </select>
                            </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualification" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                        </div>
                        
                        

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                            <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Company Name" id="company_name" name="companyname" class="form-control">
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input type="text" placeholder="Location" id="companylocation" name="companylocation" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" placeholder="Website" id="website" name="website" class="form-control">
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Save Job</button>
                    </div>  
                    
                    
                       
            </div>
        </form>
        </div>
       
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="bg-dark py-3 bg-2">
<div class="container">
    <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
</div>
</footer> 
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
<script src="assets/js/instantpages.5.1.0.min.js"></script>
<script src="assets/js/lazyload.17.6.0.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
@endsection