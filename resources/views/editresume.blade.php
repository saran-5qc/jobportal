@extends('index')
@section('title')
HomePage
@endsection
@section('page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="section-5 bg-2">
    <div class="container py-5">
       
        <div class="row">
           
           
            <div class="col-lg-9">
            <div class="card-footer  p-4">
                        
                        <a name="" id="" class="btn btn-primary" href="/showjobs" role="button">show jobs</a>
                    </div>
                                 <div class="row">
                         
                        </div>
            <form action="{{ route('updateResume') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card border-0 shadow mb-4 ">
               
                    <div class="card-body card-form p-4">
                   
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        <input type="hidden" value="{{ $data->id }}" id="id" name="id" class="form-control">

           
                       
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Candidate Name<span class="req">*</span></label>
                                <input type="text" value="{{ $data->name }}" id="name" name="name" class="form-control">
                            </div>
                             
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Phone<span class="req">*</span></label>
                             <input type="text" value="{{ $data->phone }}" id="phone" name="phone" class="form-control">

                            
                         
                        </div>
                        
                        <div class="row">
                               <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Email<span class="req">*</span></label>
                                 <input type="text" value="{{ $data->email }}" id="email" name="email" class="form-control">
                         
                            </div>
                         
                           
                        </div>
                            <div class="mb-4">
                            <label for="" class="mb-2">Object Summary</label>
                            <textarea class="form-control" name="summary" value="{{ $data->Summary }}"  id="summary" cols="5" rows="5" >{{ $data->Summary }}</textarea>
                        </div>
                        <div class="row">
                              <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Qualification<span class="req">*</span></label>
                                <input type="text"  id="qualifications" name="qualifications" value="{{ $data->qualification }}"  class="form-control">
                            </div>
                              <div class="mb-4">
                            <label for="" class="mb-2">Skills<span class="req">*</span></label>
                            <textarea class="form-control" name="skills" id="skills" value="{{ $data->skills }}"  cols="5" rows="5">{{$data->skills}} </textarea>
                        </div>
                        </div>
                          <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Projects You have done</label>
                             <input type="text"  id="projects" name="projects" value="{{ $data->projects }}"  class="form-control">

                            </div>
                            
                            
</div>
                              Personal Information
                           <hr>
                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Fathers's name</label>
                                <input type="text"  id="address" name="fathername" value="{{ $data->Fathers_name }}"  class="form-control">
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Passport number</label>
                                <input type="text"  id="address" name="passport" value="{{ $data->passport }}"  class="form-control">
                            </div>
                              <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Date of Birth<span class="req">*</span></label>
                                <input type="date" min="1" value="{{ $data->date_of_birth }}" id="date" name="date" class="form-control">
                            </div>
                          
                        </div>
                      
                        
                        <div class="mb-4">
                            <label for="" class="mb-2">Language Known</label>
                            <textarea class="form-control" name="language" id="language" value="{{ $data->language_known }}"  cols="5" rows="5" >{{$data->language_known}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Hobbies</label>
                            <textarea class="form-control" name="hobbies" id="hobbies" value="{{ $data->hobbies }}"  cols="5" rows="5" >{{$data->hobbies}} </textarea>
                        </div>
                         <div class="mb-4">
                            <label for="" class="mb-2">Home address</label>
                            <textarea class="form-control" name="address" id="address" value="{{ $data->address }}"  cols="5" rows="5" >{{$data->address}} </textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">image</label>
                              <input type="file"  name="file" value="{{ $data->image }}"  id="file">
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