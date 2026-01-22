@extends('index')

@section('title')
FindJobsPage
@endsection

@section('page')

<section class="section-3 py-5 bg-2 ">
    <div class="container">

        <div class="row">
            <div class="col-6 col-md-10">
                <h2>Find Jobs</h2>
            </div>
        </div>

        <div class="row pt-5">

            {{-- ================= LEFT FILTER PANEL ================= --}}
            <div class="col-md-4 col-lg-3 sidebar mb-4">

                <form action="{{ route('searche') }}" method="GET" id="searchForm">

                    <div class="card border-0 shadow p-4">

                        {{-- Keywords --}}
                        <div class="mb-4">
                            <h2>Keywords</h2>
                            <input type="text"
                                   name="keywords"
                                   id="keyword"
                                   value="{{ request('keywords') }}"
                                   class="form-control"
                                   placeholder="Job title, skills, keywords">
                        </div>

                        {{-- Location --}}
                        <div class="mb-4">
                            <h2>Location</h2>
                            <input type="text"
                                   name="location"
                                   id="location"
                                   value="{{ request('location') }}"
                                   class="form-control"
                                   placeholder="Location">
                        </div>

                        {{-- Category --}}
                        <div class="mb-4">
                            <h2>Category</h2>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Job Type --}}
                        <div class="mb-4">
                            <h2>Job Type</h2>

                            @if($JobType->isNotEmpty())
                                @foreach ($JobType as $type)

                                @php
                                    $selectedTypes = request('job_type', []);
                                    if(!is_array($selectedTypes)) $selectedTypes = [$selectedTypes];
                                @endphp

                                <div class="form-check mb-2">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="job_type[]"
                                           value="{{ $type->id }}"
                                           id="job-type-{{ $type->id }}"
                                           {{ in_array($type->id, $selectedTypes) ? 'checked' : '' }}>

                                    <label class="form-check-label"
                                           for="job-type-{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                </div>

                                @endforeach
                            @endif
                        </div>

                        {{-- Experience --}}
                        <div class="mb-4">
                            <h2>Experience</h2>

                            <select name="experience" id="experience" class="form-control">
                                <option value="">Select Experience</option>

                                @for($i=1;$i<=10;$i++)
                                    <option value="{{ $i }}"
                                        {{ request('experience') == $i ? 'selected' : '' }}>
                                        {{ $i }} Years
                                    </option>
                                @endfor

                                <option value="10"
                                    {{ request('experience') == 10 ? 'selected' : '' }}>
                                    10+ Years
                                </option>
                            </select>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Search</button>

                    </div>

                </form>

            </div>


            {{-- ================= JOB LIST AREA ================= --}}
            <div class="col-md-8 col-lg-9">

                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">

                            @if($job->isNotEmpty())

                                @foreach ($job as $jobs)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">

                                            <h3 class="fs-5 pb-2 mb-0">
                                                {{ $jobs->title }}
                                            </h3>

                                            <p>
                                                {{ Str::words($jobs->description, 10, '...') }}
                                            </p>

                                            <div class="bg-light p-3 border">

                                                <p class="mb-0">
                                                    <span class="fw-bold">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <span class="ps-1">
                                                        {{ $jobs->location ?? 'Not specified' }}
                                                    </span>
                                                </p>

                                                <p class="mb-0">
                                                    <span class="fw-bold">
                                                        <i class="fa fa-clock-o"></i>
                                                    </span>
                                                    <span class="ps-1">
                                                        {{ $jobs->JobType->name ?? 'N/A' }}
                                                    </span>
                                                </p>

                                                <p class="mb-0">
                                                    <span class="fw-bold">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                    <span class="ps-1">
                                                        {{ $jobs->salary ?? 'Not specified' }}
                                                    </span>
                                                </p>

                                                <p class="mb-0">
                                                    {{ $jobs->Category->name ?? 'Uncategorized' }}
                                                </p>

                                                <p class="mb-0">
                                                    Experience: {{ $jobs->experience ?? 'Not specified' }}
                                                </p>

                                            </div>

                                            <div class="d-grid mt-3">
                                                <a href="{{ url('viewJob', $jobs->id) }}"
                                                   class="btn btn-primary btn-lg">
                                                    Details
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- Pagination --}}
                                <div class="col-12 mt-3">
                                    {{ $job->links() }}
                                </div>

                            @else
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        No Jobs Found Matching Your Filters
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection
