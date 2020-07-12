@extends('layouts.app')

@section('content')

    <div class="bg-light py-5">
        <div class="container">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h3 class="font-weight-bold mb-0">Book Appointment</h3>
                <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fe-arrow-left mr-2"></i> Change Clinic/Hospital</a>
            </div>

            @include('doctors.partials._list-card')
            
            @if($type == 'clinics')
                @include('doctors.partials.clinic_card', ['book' => false, 'clinic' => $location])
            @else
                @include('doctors.partials.hospital_card', ['book' => false, 'hospital' => $location])
            @endif

            <form method="POST" action="/doctors/{{$doctor->id}}/appointments/{{$type}}/{{$location->id}}">
                @csrf
                <div class="row">
                    <!-- <div class="col-xl-12 col-sm-12">
                        <div class="form-group ">
                            <label>Reason</label>
                            <div>
                                <input class="form-control" id="example-date" type="text" name="patient_problem">
                            </div>
                        </div>
                    </div> -->
                    <div class="col-xl-12 col-sm-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="example-date">Date</label>
                                    <div>
                                        <input class="form-control datepicker" id="example-date" type="text" name="date" placeholder="Choose Date" value="<?= date('d-m-Y'); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <?php if(isset($timings)): ?>     
                   <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-body">
                   <label for="">Choose Time Slot</label>
                    <button class="btn btn-block d-flex align-items-center justify-content-between text-left font-weight-bold btn-light" type="button" data-toggle="collapse" data-target="#morningSlot" aria-expanded="false" aria-controls="morningSlot">
                        <p class="mb-0">Morning Slots</p>
                        <i data-feather="plus"></i>
                        </button>

                        <div class="collapse" id="morningSlot">
                            <div class="card card-body border">
                                <div class="row ml-2">
                                <?php foreach($morningSlots as $index => $slot): ?>
                                <?php if(isset($timings) && $timings['time_slots'] && in_array('m-slot-' . $index, json_decode($timings['time_slots']))) : ?>
                                    <div class="col-md-3 custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input"  value="<?= $slot['start'] ?>  - <?= $slot['end']; ?>" id="m-slot-<?= $index; ?>" required name="time">
                                        <label class="custom-control-label" for="m-slot-<?= $index; ?>"><?= $slot['start'] ?>  - <?= $slot['end']; ?></label>
                                    </div>
                                <?php endif; ?>     
                                <?php endforeach; ?>    
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-block mt-2 d-flex align-items-center justify-content-between text-left font-weight-bold btn-light" type="button" data-toggle="collapse" data-target="#afternoonSlot" aria-expanded="false" aria-controls="morningSlot">
                        <p class="mb-0">Afternoon Slots</p>
                        <i data-feather="plus"></i>
                        </button>

                        <div class="collapse" id="afternoonSlot">
                            <div class="card card-body border">
                                <div class="row ml-2">
                                <?php foreach($afternoonSlots as $index => $slot): ?>
                                <?php if(isset($timings) && $timings['time_slots'] && in_array('a-slot-' . $index, json_decode($timings['time_slots']))) : ?>
                                    <div class="col-md-3 custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input"  value="<?= $slot['start'] ?>  - <?= $slot['end']; ?>" id="a-slot-<?= $index; ?>" required name="time">
                                        <label class="custom-control-label" for="a-slot-<?= $index; ?>"><?= $slot['start'] ?>  - <?= $slot['end']; ?></label>
                                    </div>
                                <?php endif; ?>     
                                <?php endforeach; ?>  
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-block mt-2 d-flex align-items-center justify-content-between text-left font-weight-bold btn-light" type="button" data-toggle="collapse" data-target="#eveningSlot" aria-expanded="false" aria-controls="eveningSlot">
                        <p class="mb-0">Evening Slots</p>
                        <i data-feather="plus"></i>
                        </button>

                        <div class="collapse" id="eveningSlot">
                            <div class="card card-body border">
                                <div class="row ml-2">
                                <?php foreach($eveningSlots as $index => $slot): ?>
                                <?php if(isset($timings) && $timings['time_slots'] && in_array('e-slot-' . $index, json_decode($timings['time_slots']))) : ?>
                                    <div class="col-md-3 custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input"  value="<?= $slot['start'] ?>  - <?= $slot['end']; ?>" id="e-slot-<?= $index; ?>" required name="time">
                                        <label class="custom-control-label" for="e-slot-<?= $index; ?>"><?= $slot['start'] ?>  - <?= $slot['end']; ?></label>
                                    </div>
                                <?php endif; ?>     
                                <?php endforeach; ?>     
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-block mt-2 d-flex align-items-center justify-content-between text-left font-weight-bold btn-light" type="button" data-toggle="collapse" data-target="#nightSlot" aria-expanded="false" aria-controls="nightSlot">
                        <p class="mb-0">Night Slots</p>
                        <i data-feather="plus"></i>
                        </button>

                        <div class="collapse" id="nightSlot">
                            <div class="card card-body border">
                                <div class="row ml-2">
                                <?php foreach($nightSlots as $index => $slot): ?>
                                <?php if(isset($timings) && $timings['time_slots'] && in_array('n-slot-' . $index, json_decode($timings['time_slots']))) : ?>
                                    <div class="col-md-3 custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input"  value="<?= $slot['start'] ?>  - <?= $slot['end']; ?>" id="n-slot-<?= $index; ?>" required name="time">
                                        <label class="custom-control-label" for="n-slot-<?= $index; ?>"><?= $slot['start'] ?>  - <?= $slot['end']; ?></label>
                                    </div>
                                <?php endif; ?>     
                                <?php endforeach; ?>     
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
                    <?php else: ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="time">Choose Time</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         </div>
                    <?php endif; ?>

                  

                    <div class="col-xl-12 col-sm-12">
                        <div class="form-group mt-5 mt-sm-0">
                            <input type="hidden" name="appointment_type" value="{{ request('appointment_type') }}">

                            <button type="submit" name="book_appointment" class="btn btn-primary btn-block mt-4">
                                Book Appointment
                             </button>

                        </div>
                    </div>


                </div>
            </form>
            
        </div>
    </div>       

@endsection    

@push('js')
    <script>
           $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>    
@endpush