@extends('layouts.app')


@section('content')

<div class="bg-light py-5">
    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 p-5">

                                <small><a href="{{ url()->previous() }}" class="text-secondary d-block mb-2"><i class="fe-arrow-left"></i> Go
                                        Back</a></small>
                                <h4 class="mb-0 mt-0 font-weight-bold">Add Member Details</h4>
                                <p class="text-muted mt-1 mb-4">Enter the details of member</p>

                                <form method="POST" enctype="multipart/form-data" action="/members">
                                    @csrf
                                    <div class="form-group">
                                        <label>Upload Profile Picture (optional)</label>
                                        <input type="file" id="" name="avatar" class="form-control">
                                        <small class="text-secondary">Dimension: 200 X 200
                                            Size of Image: Minimum 10 KB - Maximum 300 KB
                                            Image Format: JPEG, JPG</small>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Member Name</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fe-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" required class="form-control" id="name" name="name"
                                                placeholder="Ex. Jhon Doe">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Email Address</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fe-mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" required class="form-control" id="email" name="email"
                                                placeholder="hello@xyz.com">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-control-label">Contact No.</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="phone" name="phone"
                                                    placeholder="Ex. 9922312345">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="form-control-label">Address</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-map-pin"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="address"
                                                    name="address" placeholder="Your Complete Address">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">City</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-map-pin"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="city" name="city"
                                                    placeholder="Ex. Nashik">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">State</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-map-pin"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="state" name="state"
                                                    placeholder="Ex. Maharashtra">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">Country</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-map-pin"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="country"
                                                    name="country" placeholder="Ex. India">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">Pincode</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-map-pin"></i>
                                                    </span>
                                                </div>
                                                <input type="text" required class="form-control" id="pincode"
                                                    name="pincode" placeholder="Enter your pincode">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Date of Birth</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fe-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" required class="form-control" id="dob" name="dob">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">Blood Group</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-zap"></i>
                                                    </span>
                                                </div>
                                                <select name="blood_group" required class="form-control"
                                                    id="blood_group">
                                                    <option>A+</option>
                                                    <option>A-</option>
                                                    <option>B+</option>
                                                    <option>B-</option>
                                                    <option>O+</option>
                                                    <option>O-</option>
                                                    <option>AB+</option>
                                                    <option>AB-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="form-control-label">Gender</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fe-user"></i>
                                                    </span>
                                                </div>
                                                <select name="gender" required class="form-control" id="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Save Details
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                </div>
            </div>
            </div>
        </div>
@endsection