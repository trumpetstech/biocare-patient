@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">
        <h4 class="font-weight-bold mb-4">Shared Videos</h4>
        <div class="row">
            @foreach ($shared_videos as $video)
                <div class="col-lg-4 col-xl-4">
                    <!-- Simple card -->
                    <div class="card mb-4 mb-xl-0">
                        <div class="videoShared allvd">
                            <video controls="">
                                <source src="{{ $video->video_url }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $video->title }}</h5>
                            <p class="mb-0">By Dr. {{ $video->doctor->name }}</p>
                        </div>
                    </div>
                </div><!-- end col -->   
            @endforeach
        </div>
    </div>

@endsection