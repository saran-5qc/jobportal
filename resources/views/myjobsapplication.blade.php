@extends('index')
@section('title')
HomePage
@endsection
@section('page')
<body data-instant-intensity="mousedown">
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jobs Applied</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                   
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
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-1">Jobs Applied</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                @if($data->isNotEmpty())
                                @foreach($data as $d)
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500"></div>
                                            <div class="info1">{{ ($d->JobTable)->title }} . </div>
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse($d->created_at)->format('d, M Y') }}</td>
            
                                        <td>
                                           
                                            <div class="job-status text-capitalize">active</div>
                                           
                                           
                                              
                                        <td>
                                            <div class="action-dots float-end">
                                                <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{ url('viewJob',$d->jobtable_models_id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                     <li><a class="dropdown-item" href="{{ url('deleteapplied',['id' => $d->id]) }}"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                     <li><a class="dropdown-item" href="{{ url('respage',$d->jobtable_models_id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> Resume</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                   
                                 
                                 
                                </tbody>
                            </table>
                        </div>
                        <div>
                            
                        </div>
                    </div>
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
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
<script src="assets/js/instantpages.5.1.0.min.js"></script>
<script src="assets/js/lazyload.17.6.0.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/custom.js"></script>
<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
@endsection