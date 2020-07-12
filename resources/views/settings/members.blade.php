@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/profile">Profile</a> / <a class="text-white" href="/settings/members">Members</a></p>
    <h3 class="mb-0 font-weight-bold text-white">Members</h3>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card border">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="header-title mt-0 mb-0">Members List</h5>
            <a href="/members/add" class="btn btn-primary btn-sm"><i class="fe-plus mr-2"></i> Add New Member</a>
        </div>

        <div class="card-body p-0">
           
            <div class="clearfix"></div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Blood Group</th>
                            <th>DOB</th>
                            <th>History</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->members as $member)
                        <tr>
                            <td>#{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->blood_group }}</td>
                            <td>{{ $member->dob }}</td>
                            <td><a class="btn btn-primary btn-sm  mr-2"
                                    href="/members/{{ $member->id }}/history">View</a></td>
                            <td>
                                @if(patient()->id != $member->id)
                                <a class="btn btn-warning btn-sm  mr-2"
                                    href="/members/{{ $member->id }}/select">Select</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="/members/{{ $member->id }}/delete"><i
                                        class="fe-trash"></i></a>
                                @else
                                    <span class="badge badge-soft-info p-2">Currently Selected</span>        
                                @endif        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- end card -->
</div>

@endsection