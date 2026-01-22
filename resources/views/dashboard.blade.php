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
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">

            @foreach ($data as $d)
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="{{ asset('uploads/' .$d->file) }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">{{ $d->first_name}}   {{ $d->last_name }}</h5>
                        <p class="text-muted mb-1 fs-6"></p>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush ">
        
                            <li class="list-group-item d-flex justify-content-between p-3">
                                <a href="/change">Change Password</a>
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
                <div class="card border-0 shadow mb-4">
                    <div class="card-body  p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" placeholder="Enter Name" class="form-control" value="{{ $d->first_name}}   {{ $d->last_name }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" placeholder="Enter Email" class="form-control" value="{{ $d->email }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label>Gender</label>
                        <select name="gender" class="form-select" >
                    <option value="Male" {{ ($d->gender ) == 'Male' ? 'selected' : '' }} readonly>Male</option>
                    <option value="Female" {{ ($d->gender ) == 'Female' ? 'selected' : '' }} readonly>Female</option>
                    <option value="Other" {{ ($d->gender) == 'Other' ? 'selected' : '' }} readonly>Other</option>
                </select>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Mobile*</label>
                            <input type="text" placeholder="Mobile" class="form-control" value="{{ $d->phone }}" readonly>
                        </div>                        
                    </div>
                  @endforeach
                </div>

                              
            </div>
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
@endsection
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
<script src="assets/js/instantpages.5.1.0.min.js"></script>
<script src="assets/js/lazyload.17.6.0.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/custom.js"></script>
