@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5 log-card">
            <img src="/images/login-banner.png" class="log-img" style="width: 100%;" alt="">
        </div>
        <div class="col-md-6 my-5">
            <div class="card border my-5 log-card" >
                <div class="card-body">
                          <h6 class="h4 mb-0 font-weight-bold">Choose Member</h6>
                            <p class="text-muted mt-1 mb-4">Select your member to login with </p>

                            <form method="POST" action="/members/choose">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-control-label">Select Member</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fe-user"></i>
                                            </span>
                                        </div>
                                        <select name="patient_id" class="form-control" id="patient_id">
                                            @foreach($members as $member): ?>
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="select_member" type="submit"> Continue
                                        </button>
                                    </div>
                            </form>

                            <hr>

                            <a class="btn btn-outline-warning btn-block" href="/members/add">Add New Member</a>

                        

                    

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
    </div>
</div>
@endsection

