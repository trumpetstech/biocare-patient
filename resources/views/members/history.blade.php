@extends('layouts.dashboard')

@section('breadcrumbs')
    <p class="mb-0 text-white">Home / <a class="text-white" href="/members">Members</a> / <a class="text-white" href="/members/{{$member->id}}/history">History</a> </p>
    <h3 class="mb-0 font-weight-bold text-white">Member History</h3>
@endsection

@section('content')


    <div class="container-fluid">
       
                <form action="/members/{{$member->id}}/history" method="POST">
                    @csrf
                    <div class="history">
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Medical History for {{ $member->name }}</h4>
                                <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fe-arrow-left mr-2"></i> Go Back</a>
                            </div>
                        </div>
                        <div class="card mb-3 mx-auto">
                            <div class="card-header">
                                <h5 class="header-title mb-0 mt-0">Present Complaints</h5>
                            </div>
                            <div class="card-body">
                                <textarea name="present_complaints" id="present_complaints" class="form-control"
                                    rows="3">{{ isset($history) ? $history->present_complaints : ''  }}</textarea>
                            </div>
                        </div>
                        <div class="row">
    
                            <div class="col-lg-12">
                                <div class="card mb-3 mx-auto">
                                    <div class="card-header">
                                        <h5 class="header-title mb-0 mt-0">Personal History</h5>
                                    </div>
                                    <div class="card-body">
    
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>1. Marital status</label>
                                                <div class="row ml-2">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="marital1" value="1"
                                                            {{ isset($history) && $history->maritial_status ? 'checked' : '' }}
                                                            name="maritial_status" class="custom-control-input">
                                                        <label class="custom-control-label" for="marital1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="marital2" value="0" name="maritial_status"
                                                            {{ isset($history) && !$history->maritial_status ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="marital2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>2. Number of children</label>
                                                <input type="text" id="" name="no_of_children"
                                                    value="{{ isset($history) ? $history->no_of_children : '' }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>3. Occupation</label>
                                                <input type="text" id="" name="occupation"
                                                    value="{{ isset($history) ? $history->occupation : '' }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>4. Education</label>
                                                <input type="text" id="" name="education"
                                                    value="{{ isset($history) ? $history->education : '' }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>5. Annual Income</label>
                                                <input type="text" id="" name="social_status"
                                                    value="{{ isset($history) ? $history->social_status : '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-md-8 form-group mb-3">
                                                <label>6. Addiction (tea, coffee, smoking, alcoholism, substance abuse
                                                    e.g chewing tobacco, ganja, heroin try to estimate the amount of
                                                    consumption of tobacco or alcohol)</label>
                                                <input type="text" id="" name="addiction"
                                                    value="{{ isset($history) ? $history->addiction : '' }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>7. History of <br> Contraception </label>
                                                <input type="text" id="" name="history_of_contraception"
                                                    value="{{ isset($history) ? $history->history_of_contraception : '' }}"
                                                    class="form-control">
                                            </div>
    
                                        </div>
    
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>8. High Risk behaviour (e.g IV drug abuse, multiple sexual partner,
                                                    homosexuality etc)-
                                                    important in hepatitis B or C infection, AIDS and SBE.</label>
                                                <input type="text" id="" name="hisk_risk_behaviour"
                                                    value="{{ isset($history) ? $history->hisk_risk_behaviour : '' }}"
                                                    class="form-control" placeholder="">
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!----------Past History----------------->
                        <div class="row">
    
                            <div class="col-lg-12">
                                <div class="card mb-3 mx-auto">
                                    <div class="card-header">
                                        <h5 class="header-title mb-0 mt-0">Past History</h5>
                                    </div>
                                    <div class="card-body">
    
                                        <div class=" mt-3">
                                            <label>1. Choose from below</label>
                                            <div class="row ml-2">
                                                <div class="col-md-4 custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" value="rf"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('rf', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        id="rf" name="past_complaints[]">
                                                    <label class="custom-control-label" for="rf">Rheumatic Fever</label>
                                                </div>
                                                <div class="col-md-4 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="t"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('t', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]" id="t">
                                                    <label class="custom-control-label" for="t">Tuberculosis</label>
                                                </div>
                                                <div class="col-md-4 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="m"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('m', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]" id="m">
                                                    <label class="custom-control-label" for="m">Malaria</label>
                                                </div>
                                            </div>
                                            <div class="row ml-2">
                                                <div class="col-md-4 custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" value="ka" id="ka"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('ka', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]">
                                                    <label class="custom-control-label" for="ka">Kala-azar</label>
                                                </div>
                                                <div class="col-md-4 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="j"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('j', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]" id="j">
                                                    <label class="custom-control-label" for="j">Jaundice</label>
                                                </div>
                                                <div class="col-md-4 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="std"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('std', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]" id="std">
                                                    <label class="custom-control-label" for="std">STD (sexually transmitted
                                                        diseases like, Aids etc)</label>
                                                </div>
                                            </div>
                                            <div class="row ml-2">
                                                <div class="col-md-4 custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" value="ho" id="ho"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('ho', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]">
                                                    <label class="custom-control-label" for="ho">H/O Contact with persons
                                                        suffering from tuberculosis or any other disease </label>
                                                </div>
                                                <div class="col-md-4 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="hoe" id="hoe"
                                                        {{ isset($history) && isset($history->past_complaints) && in_array('hoe', json_decode($history->past_complaints)) ? 'checked' : '' }}
                                                        name="past_complaints[]">
                                                    <label class="custom-control-label" for="hoe">H/O exposure to
                                                        STD</label>
                                                </div>
    
                                            </div>
    
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3 mt-3">
                                                <label>2. Any illness which demanded 'blood transfusion' e.g- accidents
                                                    etc</label>
                                                <div class="row ml-2">
                                                    <div class="col-md-4 custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input" id="ci"
                                                            value="ci"
                                                            {{ isset($history) && isset($history->demanded_blood_transfusion) && in_array('ci', json_decode($history->demanded_blood_transfusion)) ? 'checked' : '' }}
                                                            name="demanded_blood_transfusion[]">
                                                        <label class="custom-control-label" for="ci">Childhood illness
                                                            (pertusi</label>
                                                    </div>
                                                    <div class="col-md-4 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="demanded_blood_transfusion[]" value="sh"
                                                            {{ isset($history) && isset($history->demanded_blood_transfusion) && in_array('sh', json_decode($history->demanded_blood_transfusion)) ? 'checked' : '' }}
                                                            id="sh">
                                                        <label class="custom-control-label" for="sh">Systemic
                                                            hypertension</label>
                                                    </div>
                                                    <div class="col-md-4 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="demanded_blood_transfusion[]" id="dm" value="dm"
                                                            {{ isset($history) && isset($history->demanded_blood_transfusion) && in_array('dm', json_decode($history->demanded_blood_transfusion)) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="dm">Diabetes
                                                            mellitus</label>
                                                    </div>
    
                                                </div>
                                                <div class="row ml-2">
                                                    <div class="col-md-4 custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input" id="ti"
                                                            name="demanded_blood_transfusion[]" value="ti"
                                                            {{ isset($history) && isset($history->demanded_blood_transfusion) && in_array('ti', json_decode($history->demanded_blood_transfusion)) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="ti">Trauma or
                                                            Injury</label>
                                                    </div>
                                                    <div class="col-md-4 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="demanded_blood_transfusion[]" id="pha" value="pha"
                                                            {{ isset($history) && isset($history->demanded_blood_transfusion) && in_array('pha', json_decode($history->demanded_blood_transfusion)) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="pha">Past Hospital
                                                            admissions</label>
                                                    </div>
    
    
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label>3. Any other major medical or psychlatric illness in the past</label>
                                                <input type="text" id="" class="form-control" name="other_medicals"
                                                    value="{{ isset($history) ? $history->other_medicals : '' }}"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card mb-3 mx-auto">
                            <div class="card-header">
                                <h5 class="header-title mb-0 mt-0">Diet & Lifestyle</h5>
    
                            </div>
                            <div class="card-body">
                                <textarea name="diet_lifestyle" id="diet_lifestyle" class="form-control"
                                    rows="3">{{ isset($history) ? $history->diet_lifestyle : ''  }}</textarea>
                            </div>
                        </div>
    
                        <div class="card mb-3 mx-auto">
                            <div class="card-header">
                                <h5 class="header-title mb-0 mt-0">Family History</h5>
    
                            </div>
                            <div class="card-body">
                                <textarea name="family_history" id="family_history" class="form-control"
                                    rows="3">{{ isset($history) ? $history->family_history : ''  }}</textarea>
                            </div>
                        </div>
    
                        <!-- row -->
                        <!--------------------Treatment History------------------->
                        <div class="row">
    
                            <div class="col-lg-12">
                                <div class="card mb-3 mx-auto">
                                    <div class="card-header">
                                        <h5 class="header-title mb-0 mt-0">Treatment History</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-md-6 form-group mb-3">
                                                <label>1.Treatment received so far, for the present illness.</label>
                                                <input type="text" id="" name="past_treatment" class="form-control"
                                                    value="{{ isset($history) ? $history->other_medicals : '' }}">
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label>2. Any H/O drug allergy or reactions.</label>
                                                <input type="text" id="" name="drug_allergy" class="form-control"
                                                    value="{{ isset($history) ? $history->other_medicals : '' }}">
                                            </div>
    
                                        </div>
    
                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>3. Any surgical intervention or H/O accidents in significant
                                                    past.</label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="surg1" name="surgical_intervention"
                                                            value="1"
                                                            {{ isset($history) && $history->surgical_intervention ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="surg1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="surg2" name="surgical_intervention"
                                                            value="0"
                                                            {{ isset($history) && !$history->surgical_intervention ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="surg2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9 form-group mb-3">
                                                <label>4. Prolonged use of oral contraceptives (may precipitate CVA),
                                                    penicillamine(used in wilson's disease may develop nephrotic syndrome),
                                                    vitamin C (may produce oxalate stone) etc.
                                                </label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="prolonged1" name="oral_contraception"
                                                            value="1"
                                                            {{ isset($history) && $history->oral_contraception ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="prolonged1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="prolonged2" name="oral_contraception"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->oral_contraception ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="prolonged2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>5. Blood transfusion</label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="bt1" name="blood_transfusion" value="1"
                                                            {{ isset($history) && $history->blood_transfusion ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="bt1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="bt2" name="blood_transfusion"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->blood_transfusion ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="bt2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>6. Intake of NSAID (may produce acute gastric erosion, NSAID-induced
                                                    asthma etc.)</label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="intake1" name="nsaid_intake" value="1"
                                                            {{ isset($history) && $history->nsaid_intake ? 'checked' : '' }}
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="intake1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="intake2" name="nsaid_intake"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->nsaid_intake ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="intake2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>7. Regular user of oral contraceptives, vitamins, laxatives,
                                                    sedatives or herbal remedies</label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="regular1" name="regular_medicine_user"
                                                            class="custom-control-input" value="1"
                                                            {{ isset($history) && $history->regular_medicine_user ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="regular1">YES</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="regular2" name="regular_medicine_user"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->regular_medicine_user ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="regular2">NO</label>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card mb-3 mx-auto">
                            <div class="card-header">
                                <h5 class="header-title mb-0 mt-0">Psychological History</h5>
    
                            </div>
                            <div class="card-body">
                                <textarea name="psychological_history" id="psychological_history" class="form-control"
                                    rows="3">{{ isset($history) ? $history->psychological_history : ''  }}</textarea>
                            </div>
                        </div>
    
                        @if($member->gender == 'female')
                        <!--------------------Menstrual and obstetric History ------------------->
                        <div class="row">
    
                            <div class="col-lg-12">
                                <div class="card mb-3 mx-auto">
                                    <div class="card-header">
                                        <h5 class="header-title mb-0 mt-0">Menstrual and obstetric History</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <label> 1. Menarche.<br><br> </label>
                                                <input type="text" id="" name="menarche" class="form-control"
                                                    value="{{ isset($history) ? $history->menarche : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>2. Duration of the <br>period.</label>
                                                <input type="text" id="" name="duration_of_period" class="form-control"
                                                    value="{{ isset($history) ? $history->duration_of_period : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label> 3. Quantity of blood loss(usually assessed by number of pads
                                                    consumed or passage of clots). </label>
                                                <input type="text" id="" name="quantity_of_blood_loss" class="form-control"
                                                    value="{{ isset($history) ? $history->quantity_of_blood_loss : '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>4. Dysmenorrhoea, amenorrhoea or other menstrual
                                                    irregularities.</label>
                                                <input type="text" id="" name="menstural_irregularities"
                                                    class="form-control"
                                                    value="{{ isset($history) ? $history->menstural_irregularities : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>5. Date of last <br>menstrual period.</label>
                                                <input type="date" id="" name="date_of_last_menstural" class="form-control"
                                                    value="{{ isset($history) ? $history->date_of_last_menstural : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label> 6. Menopause, post-menopausal <br>bleeding </label>
                                                <input type="text" id="" name="menopause" class="form-control"
                                                    value="{{ isset($history) ? $history->menopause : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!--------------------Obstetric history ------------------->
                        <div class="row">
    
                            <div class="col-lg-12">
                                <div class="card mb-3 mx-auto">
                                    <div class="card-header">
                                        <h5 class="header-title mb-0 mt-0">Obstetric history</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>1. No.of pregnancies</label>
                                                <input type="text" id="" name="no_of_pregnancies" class="form-control"
                                                    value="{{ isset($history) ? $history->no_of_pregnancies : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>2. Outcome of pregnancies : H/O abortions or carried to term: live
                                                    birth (male/female) </label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="male" name="outcome_of_pregnancies"
                                                            class="custom-control-input" value="1"
                                                            {{ isset($history) && $history->outcome_of_pregnancies ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="male">MALE</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="female" name="outcome_of_pregnancies"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->outcome_of_pregnancies ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="female">FEMALE</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group mb-3">
                                                <label>3. Complications during pregnancy (e.g hypertension,
                                                    gestational diabetes mellitus)</label>
                                                <div class="row ml-3">
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="complication1"
                                                            name="complications_during_pregancy"
                                                            class="custom-control-input" value="1"
                                                            {{ isset($history) && $history->complications_during_pregancy ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="complication1">Yes</label>
                                                    </div>
                                                    <div class="col-md-6 custom-control custom-radio">
                                                        <input type="radio" id="complication2"
                                                            name="complications_during_pregancy"
                                                            class="custom-control-input" value="0"
                                                            {{ isset($history) && !$history->complications_during_pregancy ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="complication2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group mb-3">
                                                <label>4. Mode of delivery (Vaginal , foreeps, caesaream) </label>
                                                <input type="text" id="" name="mode_of_delivery" class="form-control"
                                                    value="{{ isset($history) ? $history->mode_of_delivery : '' }}">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label>5. Last child birth </label>
                                                <input type="date" id="" name="last_child_birth_date" class="form-control"
                                                    value="{{ isset($history) ? $history->last_child_birth_date : '' }}">
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-block">Save Details</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
      

@endsection