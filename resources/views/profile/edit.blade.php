@extends('layouts.dashboard')


@section('content')

    <div class="container-fluid">
        <div class="card border">
            <div class="card-header bg-white">
                <h5 class="mb-0 font-weight-bold">Edit Profile</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/profile" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img class="d-block mb-2" style="width: 100px;height:100px;max-width: 100px;max-height:100px;border: 2px solid #e4e4e4;" id="profile-picture" src="{{ patient()->avatar_url }}" alt="">
                        <label>Upload Profile Picture (optional)</label>
                        <input type="file" id="" name="avatar" class="form-control" onchange="readURL(this);" >
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
                        value="{{ old('name') ?? patient()->name }}" placeholder="Ex. Jhon Doe">
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
                            <input type="email" readonly value="{{ old('email') ?? patient()->email }}" required class="form-control" id="email" name="email"
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
                                <input type="text" value="{{ old('phone') ?? patient()->phone }}" required class="form-control" id="phone" name="phone"
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
                                <input type="text" value="{{ old('address') ?? patient()->address }}" required class="form-control" id="address"
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
                                <input type="text" value="{{ old('city') ?? patient()->city }}" required class="form-control" id="city" name="city"
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
                                <input type="text" value="{{ old('state') ?? patient()->state }}" required class="form-control" id="state" name="state"
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
                                <input type="text" value="{{ old('country') ?? patient()->country }}"  required class="form-control" id="country"
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
                                <input type="text" value="{{ old('pincode') ?? patient()->pincode }}"  required class="form-control" id="pincode"
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
                            <input type="date" value="{{ old('dob') ?? patient()->dob }}" required class="form-control" id="dob" name="dob">
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
                                    <option {{ patient()->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option {{ patient()->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option {{ patient()->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option {{ patient()->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option {{ patient()->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option {{ patient()->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option {{ patient()->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option {{ patient()->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
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
                                    <option value="male"  {{ patient()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female"{{ patient()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other"{{ patient()->gender == 'other' ? 'selected' : '' }}>Other</option>
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
    </div>

@endsection


@push('js')
    
<script>

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-picture')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endpush