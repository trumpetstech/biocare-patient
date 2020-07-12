
        <form method="POST" action="/covid">
            @csrf
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">COVID PACKAGE FOR {{ patient()->name }}</h4>
                   
                </div>
            </div>
           
            <div class="card mx-auto">
                <div class="card-body">


                    <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label>Full Name <i class="text-danger">*</i></label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $covid['name'] ?? patient()->name  ?>">
                    </div>
                      
                </div>
                

                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-control-label">Date of Birth <i class="text-danger">*</i></label>
                            <div class="input-group input-group-merge">
                               
                                <input type="date" class="form-control" id="dob" value="<?=  $covid['dob'] ?? patient()->dob ?>" name="dob" required>
                            </div>
                        </div>
                            <div class="form-group col-md-4">
                                <label class="form-control-label">Blood Group <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                    
                                    <select name="blood_group" class="form-control" id="blood_group" required>
                                    <?php if(patient()->blood_group != ''): ?>
                                        <option <?php echo (patient()->blood_group == 'A+')? "selected" : ""; ?>>A+</option>
                                        <option <?php echo (patient()->blood_group == 'A-')? "selected" : ""; ?>>A-</option>
                                        <option <?php echo (patient()->blood_group == 'B+')? "selected" : ""; ?>>B+</option>
                                        <option <?php echo (patient()->blood_group == 'B-')? "selected" : ""; ?>>B-</option>
                                        <option <?php echo (patient()->blood_group == 'O+')? "selected" : ""; ?>>O+</option>
                                        <option <?php echo (patient()->blood_group == 'O-')? "selected" : ""; ?>>O-</option>
                                        <option <?php echo (patient()->blood_group == 'AB+')? "selected" : ""; ?>>AB+</option>
                                        <option <?php echo (patient()->blood_group == 'AB-')? "selected" : ""; ?>>AB-</option>
                                    <?php else: ?>
                                        <option <?php echo ($covid['blood_group'] == 'A+')? "selected" : ""; ?>>A+</option>
                                        <option <?php echo ($covid['blood_group'] == 'A-')? "selected" : ""; ?>>A-</option>
                                        <option <?php echo ($covid['blood_group'] == 'B+')? "selected" : ""; ?>>B+</option>
                                        <option <?php echo ($covid['blood_group'] == 'B-')? "selected" : ""; ?>>B-</option>
                                        <option <?php echo ($covid['blood_group'] == 'O+')? "selected" : ""; ?>>O+</option>
                                        <option <?php echo ($covid['blood_group'] == 'O-')? "selected" : ""; ?>>O-</option>
                                        <option <?php echo ($covid['blood_group'] == 'AB+')? "selected" : ""; ?>>AB+</option>
                                        <option <?php echo ($covid['blood_group'] == 'AB-')? "selected" : ""; ?>>AB-</option>
                                    <?php endif; ?>     
                                  </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-control-label">Gender <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                    
                                    <select name="gender" class="form-control" id="gender" required>
                                     <?php if(patient()->gender != ''): ?>
                                        <option value="male" <?php echo (patient()->gender == 'male')? "selected" : ""; ?>>Male</option>
                                        <option value="female" <?php echo (patient()->gender == 'female')? "selected" : ""; ?>>Female</option>
                                        <option value="other" <?php echo (patient()->gender == 'other')? "selected" : ""; ?>>Other</option>
                                     <?php else: ?>
                                        <option value="male" <?php echo ($covid['gender'] == 'male')? "selected" : ""; ?>>Male</option>
                                        <option value="female" <?php echo ($covid['gender'] == 'female')? "selected" : ""; ?>>Female</option>
                                        <option value="other" <?php echo ($covid['gender'] == 'other')? "selected" : ""; ?>>Other</option>
                                     <?php endif; ?>   
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-control-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                   
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $covid['phone'] ?? patient()->phone ?>" placeholder="Ex. 9922312345" required>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                            <label class="form-control-label">Address <i class="text-danger">*</i></label>
                            <div class="input-group input-group-merge">
                                
                                <input type="text" class="form-control" id="address" name="address" value="<?= $covid['address'] ?? patient()->address ?>" placeholder="Your Complete Address">
                            </div>
                        </div>

                            <div class="form-group col-md-4">
                                <label class="form-control-label">City <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                    
                                    <input type="text" class="form-control" id="city" name="city"  value="<?= $covid['city'] ?? patient()->city ?>" placeholder="Ex. Nashik">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-control-label">State <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                   
                                    <input type="text" class="form-control" id="state" name="state" value="<?= $covid['state'] ?? patient()->state ?>" placeholder="Ex. Maharashtra">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-control-label">Country <i class="text-danger">*</i></label>
                                <div class="input-group input-group-merge">
                                    
                                    <input type="text" class="form-control" id="country" name="country" value="<?=  $covid['country'] ?? patient()->country ?>" placeholder="Ex. India">
                                </div>
                            </div>
                        </div>
                <div class="row">
                    
                      <div class="col-md-6 form-group mb-3">
                        <label>Email ID  <i class="text-danger">*</i></label>
                        <input type="text" id="passport_no" name="passport_no" class="form-control" value="<?= $covid['passport_no'] ?? '' ?>" placeholder="">
                    </div>
                      <div class="col-md-6 form-group mb-3">
                        <label>Aadhar Card No. <i class="text-danger">*</i></label>
                        <input type="text" id="country_travelled" name="country_travelled" class="form-control" value="<?= $covid['country_travelled'] ?? '' ?>" placeholder="">
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-4 form-group mb-3">
                        <label>Reason For Travel</label>
                        <input type="text" id="reason_travelled" name="reason_travelled" class="form-control" value="<?= isset($covid) ? $covid['reason_travelled'] : '' ?>" placeholder="">
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label>Travel Date</label>
                        <input type="date" id="travel_date" name="travel_date" class="form-control" placeholder="" value="<?= isset($covid) ? $covid['travel_date '] : '' ?>">
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label> Duration Of Stay - From Date</label>
                        <input type="date" id="stay_duration" name="stay_duration" class="form-control" placeholder="" value="<?= isset($covid) ? $covid['stay_duration'] : '' ?>">
                    </div>
                </div> --}}

                {{-- <div class="row">
                      <div class="col-md-4 form-group mb-3">
                        <label>Date Of Arrival In Nashik City</label>
                        <input type="date" id="date_in_nashik" name="date_in_nashik" class="form-control" value="<?= isset($covid) ? $covid['date_in_nashik'] : '' ?>" placeholder="">
                    </div>
                     <div class="col-md-4 form-group mb-3">
                        <label>Contact Date With Healthcare Officer</label>
                        <input type="date" id="healtcare_contact_date" class="form-control" name="healtcare_contact_date" value="<?= isset($covid) ? $covid['healthcare_contact_date'] : '' ?>" placeholder="">
                    </div>
                    <div class="col-md-4"></div>

                </div> --}}
                <div class="row">
                <div class="col-md-12 mt-3">
                    <label>Symptoms (Check All That Apply)  <i class="text-danger">*</i></label>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="asym" value="asym" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('asym', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="asym">Asymptomatic</label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sff" value="sff" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('sff', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="sff">Subjective fever (feltfeverish)</label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="fev" value="fev" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('fev', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="fev">Fever >38 &#8451; </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="ma" value="ma" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('ma', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="ma">Muscle aches</label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rn" value="rn" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('rn', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="rn">Runny Nose</label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="st" value="st" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('st', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="st">Sore Throat</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="cg" value="cg" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('cg', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="cg">Cough </label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sb" value="sb" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('sb', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="sb">Shortness of breath </label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="vo" value="vo" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('vo', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="vo">Vomiting </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="hd" value="hd" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('hd', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="hd">Headache </label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ap" value="ap" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('ap', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="ap">Abdominal pain </label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="di" value="di" name="patient_symptoms[]" <?= isset($covid) && isset($covid['patient_symptoms']) && $covid['patient_symptoms']  != '' && in_array('di', json_decode($covid['patient_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="di">Diarrhea </label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row mt-3">
                    <div class="col-md-4 form-group mb-3">
                        <label> Other Please Specify</label>
                        <input type="text" id="other_symptoms" name="other_symptoms" value="<?= isset($covid) ? $covid['other_symptoms'] : '' ?>" class="form-control">
                    </div>
                       <div class="col-md-4 form-group mb-3">
                        <label>Name of Primary Physician</label>
                        <input type="text" id="treating_doctor_details" name="treating_doctor_details" value="<?= isset($covid) ? $covid['treating_doctor_details'] : '' ?>" class="form-control">
                    </div>
                     <div class="col-md-4 form-group mb-3">
                        <label>Contact of Primary Physician</label>
                        <input  type="text" id="full_address" name="full_address" class="form-control" value="<?= isset($covid) ? $covid['full_address'] : '' ?>">
                    </div>
                </div>
                  {{-- <div class="row mt-3">
                    <div class="col-md-4 form-group mb-3">
                        <label>  Patient Admitted</label>
                        <input type="date" id="patient_admitted_date" name="patient_admitted_date" class="form-control" value="<?= isset($covid) ? $covid['patient_admitted_date'] : '' ?>">
                    </div>
                       <div class="col-md-4 form-group mb-3">
                        <label>Patient Condition</label>
                        <input type="text" id="patient_condition" name="patient_condition" class="form-control" value="<?= isset($covid) ? $covid['patient_condition'] : '' ?>">
                    </div>
                       <div class="col-md-4 form-group mb-3">
                        <label>Follow Up Started From</label>
                        <input type="date" id="follow_up_date" name="follow_up_date" class="form-control" value="<?= isset($covid) ? $covid['follow_up_date'] : '' ?>">
                    </div>
                </div> --}}

                   {{-- <div class="row">
                <div class="col-md-12  mt-3">
                    <label>Symptoms In Family Members(Check All That Apply)</label>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="fev1" value="fev" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('fev', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="fev1">Fever >38 &#8451; </label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sff1" value="sff" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('sff', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="sff1">Subjective fever (feltfeverish)</label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ch1" value="ch" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('ch', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="ch1">Chills</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="ma1" value="ma" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('ma', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="ma1">Muscle aches</label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rn1" value="rn" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('rn', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="rn1">Runny Nose</label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="st1" value="st" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('st', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="st1">Sore Throat</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="cg1" value="cg" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('cg', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="cg1">Cough </label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sb1" value="sb" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('sb', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="sb1">Shortness of breath </label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="vo1" value="vo" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('vo', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="vo1">Vomiting </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="hd1" value="hd" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('hd', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="hd1">Headache </label>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ap1" value="ap" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('ap', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="ap1">Abdominal pain </label>
                        </div>
                          <div class="col-md-4 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="di1" value="di" name="family_symptoms[]" <?= isset($covid) && isset($covid['family_symptoms']) && $covid['family_symptoms']  != '' && in_array('di', json_decode($covid['family_symptoms'])) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="di1">Diarrhea </label>
                        </div>
                    </div>
                </div>
            </div> --}}

             {{-- <div class="row mt-3">
                    <div class="col-md-3 form-group mb-3">
                        <label> Other Please Specify</label>
                        <input type="text" id="family_other_symptoms" name="family_other_symptoms" class="form-control" value="<?= isset($covid) ? $covid['family_other_symptoms'] : '' ?>">
                    </div>
                       <div class="col-md-6 form-group mb-3">
                        <label>Name And Address Of Treating Doctor And Hospital</label>
                        <input type="text" id="family_treating_doctor" name="family_treating_doctor" class="form-control" value="<?= isset($covid) ? $covid['family_treating_doctor'] : '' ?>">
                    </div>
                       <div class="col-md-3 form-group mb-3">
                        <label>Individual Current Location</label>
                        <input type="text" id="family_current_location" value="<?= isset($covid) ? $covid['family_current_location'] : '' ?>" class="form-control">
                    </div>
                </div> --}}

                    <hr>

                    <h5 class="font-weight-bold mb-2">Undertaking on Self-Isolation</h5>

                    <p>I {{ patient()->name }} being diagnosed on a confirmed/suspect case of Covid-19, do hereby voluntarily 
                        undertake to maintain strict self-isolation at all times for the prescribed period. During the period, I Shall monitor 
                    my health and those around me and interact with the assigned surveillance team/with the call center (1075), In case I Suffer
                   from any deteriorating symptoms or any of my close family contacts/develops any symptoms consistent with COVID-19</p>
                    <p>I have been explained in detail about the precaution that I need to follow while I am under self-isolation.</p>
                    <p>I am liable to be acted on the under prescribed law for any non-adherance to self-isolation protocol.</p>    
                    <div class="form-group">
                        <input type="checkbox"  required id="has_consent" value="1" name="has_consent" <?= isset($covid) && $covid['has_consent'] ? 'checked' : ''; ?>>
                        <label   for="has_consent">I hereby give my consent to the above mentioned Undertaking. </label>
                    </div>
                   
                </div>




            </div> <!-- end card -->

            <div class="card mt-3">
                <div class="card-body">
                    <button type="submit" class="btn btn-success btn-block mt-3">Save Details</button>
                </div>
            </div>
            
        </form>