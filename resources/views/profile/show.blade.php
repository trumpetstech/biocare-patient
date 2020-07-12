@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/profile">Profile</a> </p>
    <h3 class="mb-0 font-weight-bold text-white">My Profile</h3>
@endsection


@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="text-center mt-3">
                <img style="width: 50px;height:50px;" src="{{ patient()->avatar_url }}" alt=""
                    class="avatar-lg rounded-circle">
                <h5 class="mt-2 mb-0">{{ patient()->name }}</h5>

                </h6>
                <h6 class="text-muted font-weight-normal mt-1 mb-4">{{ patient()->address }}, <br>
                    {{ patient()->city }}, {{ patient()->state }},{{ patient()->country }} -
                    {{ patient()->pincode }} </h6>
                <a href="/profile/edit" class="btn btn-primary btn-sm"><i class="fe-edit-2 mr-2"></i> Edit Profile</a>
                <a href="/members/{{ patient()->id }}/history" class="btn btn-warning btn-sm ml-2"><i class="fe-list mr-2"></i> Medical History</a>

            </div>

            <!-- profile  -->
            <div class="mt-5 pt-2 border-top">
                <h5 class="mb-3">General Information</h5>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0 text-muted">
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ patient()->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Blood Group</th>
                                <td>{{ patient()->blood_group }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ patient()->gender }}</td>
                            </tr>
                            <tr>
                                <th scope="row">DOB</th>
                                <td>{{ patient()->dob }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3 pt-2 border-top">
                <h5 class="mb-3">Contact Information</h5>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0 text-muted">
                        <tbody>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ patient()->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>{{ patient()->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ patient()->address }}, <br> {{ patient()->city }},
                                    {{ patient()->state }}, {{ patient()->country }} -
                                    {{ patient()->pincode }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
    <!-- end card -->
</div>

@endsection