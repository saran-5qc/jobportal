@extends('index')
@section('title')
ViewPage
@endsection

@section('page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
 crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<style>
*{
    font-family: 'Times New Roman', Times, serif;
}
</style>
<section class="section-4 bg-light py-5" >
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-white rounded shadow-sm p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/searche" class="text-decoration-none text-dark">
                                <i class="fa fa-arrow-left"></i> &nbsp;Back to Jobs
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>

   

    <div class="container job_details_area">
        <div class="row g-4">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="#" class="text-decoration-none text-dark">
                                        <h4 class="mb-1">{{ $data->title }}</h4>
                                    </a>
                                    <div class="d-flex text-muted small">
                                        <div class="me-3">
                                            <i class="fa fa-map-marker"></i> {{ $data->location }}, India
                                        </div>
                                        <div>
                                            <i class="fa fa-clock-o"></i> {{ $data->JobType->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-outline-danger btn-sm" href="#">
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </div>
                        </div>

               <div class="mb-4">
    <h5>Responsibility</h5>
    <ul class="list-unstyled">
        @foreach ($resPo as $item)
            <li>
                <i class="fa fa-check text-primary"></i>
                {{ $item }}
            </li>
        @endforeach
    </ul>
</div>

                        

                    <div class="mb-4">
    <h5>Qualifications</h5>
    <ul class="list-unstyled">
        @foreach ($qua as $item)
            <li>
                <i class="fa fa-check text-primary"></i>
                {{ $item }}
            </li>
        @endforeach
    </ul>
</div>


                        <div class="mb-4">
                            <h5>Benefits</h5>
                            <ul class="list-unstyled">
                                @foreach ($bene as $b)
                                    <li><i class="fa fa-star text-warning"></i> {{ $b }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="d-flex justify-content-end pt-3 border-top">
                          
                            @if(session('user_id'))
                                <a href="#" class="btn btn-primary" onclick="applyJob({{ $data->id }})">Apply</a>
                            @else
                                <a href="#" class="btn btn-primary">Login to Apply</a>
                            @endif
                        </div>

                    </div>
                </div>
                @if (session('user_id'))
                @if (session('user_id')==$data->user_id)
                
               
                <div class="card-body mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h4>Applicants</h4>
                                   
                                </div>
                            </div>
                            <div>
                               
                            </div>
                        </div>

                     

                        <div class="mb-4">
                            <table class="table table-stripped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Applicant Date</th>
                                <th>Resume</th>
                            </tr>
                            @if ($applicants->isNotEmpty())
                            @foreach ($applicants as $app) 
                            <tr>
                           
                                <td>{{ $app->User->first_name }}</td>
                                <td>{{ $app->User->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($app->created_at)->format('d, M Y') }}</td>
                                <td>
                                <td><a class="dropdown-item" href="{{ url('respage',$app->jobtable_models_id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> Resume</a></td>

                                </td>
                            </tr>
                            @endforeach
                            
                            @endif
                          </table>
                        </div>

                        <div class="mb-4">
                            
                        </div>

                        <div class="mb-4">
                            
                        </div>

                        

                    </div>
                    @endif
                
                @endif
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Job Summary</h5>
                        <ul class="list-unstyled small mt-3">
                            <li><strong>Published on:</strong> {{ \Carbon\Carbon::parse($data->created_at)->format('d, M Y') }}</li>
                            <li><strong>Vacancy:</strong> {{ $data->vacancy }} Position</li>
                            <li><strong>Salary:</strong> {{ $data->salary }}</li>
                            <li><strong>Location:</strong> {{ $data->location }}</li>
                            <li><strong>Job Nature:</strong> {{ $data->JobType->name }}</li>
                        </ul>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Company Details</h5>
                        <ul class="list-unstyled small mt-3">
                            <li><strong>Name:</strong> {{ $data->company_name }}</li>
                            <li><strong>Location:</strong> {{ $data->company_location }}</li>
                            <li><strong>Website:</strong> <a href="{{ $data->company_website }}" class="text-primary" target="_blank">{{ $data->company_website }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@section('custom.js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function applyJob(jobId) {

        $.ajax({
            url: "{{ route('apply') }}",
            type: "POST",
            data: {
                id: jobId,
                _token: "{{ csrf_token() }}"
            },

            success: function (response) {

                // See full response in console (for debugging)
                console.log(response);

                if (response.status === true) {

                    // Redirect if backend sends redirect URL
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        alert("Applied successfully.");
                    }

                } else {

                    // Show backend validation message
                    alert(response.message ?? "Unable to apply.");
                }
            },

            error: function (xhr) {

                console.log(xhr.responseText);

                // If backend sent error message, display it
                try {
                    let res = JSON.parse(xhr.responseText);
                    alert(res.message);
                } catch (e) {
                    alert("Something went wrong. Please try again.");
                }
            }
        });
    }
</script>


@endsection





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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection