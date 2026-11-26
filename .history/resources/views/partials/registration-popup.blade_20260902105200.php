<div class="popup-overlay">
    <div class="popup-box">
        <button type="button" class="close-popup">&times;</button>

        @php
            $base = (int) config('services.razorpay.amount');
            $gst = (int) config('services.razorpay.gst_percent');
            $payAmount = (int) round($base + ($base * $gst / 100));
        @endphp

        <form id="registrationForm" action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data" data-verify="{{ route('registration.verify') }}">
            @csrf

            <div class="form-progress">
                <div class="progress-top">
                    <span> Step <strong id="currentStepNumber">1</strong> of 7 </span>
                    <span><strong id="progressPercent">14%</strong> <small>Complete</small></span>
                </div>
                <div class="progress-bar"><div class="progress-fill" id="progressFill"></div></div>
                <div class="progress-steps">
                    <div class="progress-step active"><span class="progress-icon"><i class="fa-solid fa-user"></i></span><span class="progress-label">Personal</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-briefcase"></i></span><span class="progress-label">Business</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-shield-halved"></i></span><span class="progress-label">KYC</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-users"></i></span><span class="progress-label">Membership</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-user-check"></i></span><span class="progress-label">Profile</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-file-signature"></i></span><span class="progress-label">Declaration</span></div>
                    <i class="fa-solid fa-chevron-right progress-arrow"></i>
                    <div class="progress-step"><span class="progress-icon"><i class="fa-solid fa-circle-check"></i></span><span class="progress-label">Confirmation</span></div>
                </div>
            </div>

            {{-- STEP 1 --}}
            <div class="form-step active">
                <div class="form-header">
                    <h2>IRAAYA WORLD</h2>
                    <h3>MEMBER APPLICATION FORM</h3>
                    <p>Connect • Collaborate • Contribute • Grow</p>
                </div>
                <div class="section-title"><i class="fa-solid fa-user"></i> PERSONAL DETAILS</div>
                <div class="form-flex">
                    <div class="form-group">
                        <label>Full Name <span>*</span></label>
                        <input type="text" name="first_name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth <span>*</span></label>
                        <input type="date" name="date_of_birth" id="dateOfBirth" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile No. <span>*</span></label>
                        <input type="tel" name="phone" inputmode="numeric" maxlength="10" placeholder="10-digit mobile number" pattern="[6-9][0-9]{9}" required>
                    </div>
                    <div class="form-group">
                        <label>WhatsApp No.</label>
                        <input type="tel" name="whatsapp" inputmode="numeric" maxlength="10" placeholder="WhatsApp number" pattern="[6-9][0-9]{9}">
                    </div>
                    <div class="form-group">
                        <label>Email ID <span>*</span></label>
                        <input type="email" name="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label>Residential Area / City <span>*</span></label>
                        <input type="text" name="location" placeholder="Where do you currently live?" required>
                    </div>
                    <div class="form-group w-100">
                        <label>Instagram / LinkedIn</label>
                        <input type="text" name="social_media" placeholder="Add your Instagram or LinkedIn profile">
                    </div>
                </div>
                <div class="step-btns"><button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button></div>
            </div>

            {{-- STEP 2 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-briefcase"></i> Professional / Business Details</h2>
                <div class="form-flex">
                    <div class="form-group">
                        <label>Business / Profession Name <span>*</span></label>
                        <input type="text" name="business_name" required>
                    </div>
                    <div class="form-group">
                        <label>Company / Brand Name</label>
                        <input type="text" name="company_name">
                    </div>
                    <div class="form-group">
                        <label>Business Category / Profession <span>*</span></label>
                        <input type="text" name="business_category" required>
                    </div>
                    <div class="form-group">
                        <label>Designation <span>*</span></label>
                        <input type="text" name="designation" required>
                    </div>
                    <div class="form-group w-100">
                        <label>Business Address <span>*</span></label>
                        <textarea name="business_address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Website / Social Media Handle</label>
                        <input type="text" name="website" placeholder="https://yourwebsite.com">
                    </div>
                    <div class="form-group">
                        <label>Years in Business / Profession <span>*</span></label>
                        <input type="text" name="business_age" required>
                    </div>
                    <div class="form-group w-100">
                        <label>Brief Description of Business / Profession <span>*</span></label>
                        <textarea name="business_description" rows="4" required></textarea>
                    </div>
                    <div class="form-group w-100">
                        <label>Products / Services Offered <span>*</span></label>
                        <textarea name="products_services" rows="4" required></textarea>
                    </div>
                    <div class="form-group w-100">
                        <label>Ideal Client / Target Audience <span>*</span></label>
                        <textarea name="target_audience" rows="3" required></textarea>
                    </div>
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-id-card"></i> KYC Details</h2>
                <div class="form-flex">
                    <div class="form-group">
                        <label>PAN Number <span>*</span></label>
                        <input type="text" name="pan" maxlength="10" placeholder="ABCDE1234F" required>
                    </div>
                    <div class="form-group">
                        <label>Aadhaar No. (Last 4 Digits) <span>*</span></label>
                        <input type="text" name="aadhaar_last4" maxlength="4" inputmode="numeric" required>
                    </div>
                    <div class="form-group">
                        <label>GSTIN (if applicable)</label>
                        <input type="text" name="gstin" maxlength="15">
                    </div>
                    <div class="form-group">
                        <label>Business Constitution <span>*</span></label>
                        <select name="business_constitution" required>
                            <option value="">Select</option>
                            <option>Proprietorship</option>
                            <option>Partnership Firm</option>
                            <option>LLP</option>
                            <option>Private Limited Company</option>
                            <option>Public Limited Company</option>
                            <option>Professional / Individual</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <label>Registered Name of Business / Entity <span>*</span></label>
                        <input type="text" name="registered_name" required>
                    </div>
                    <div class="form-group w-100">
                        <label>Registered Office / Business Address <span>*</span></label>
                        <textarea name="registered_address" rows="3" required></textarea>
                    </div>
                </div>
                <h4>KYC Documents</h4>
                <div class="form-flex">
                    <div class="form-group">
                        <label>Upload PAN Card <span>*</span></label>
                        <input type="file" name="pan_document" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small>JPG, PNG or PDF • Max 5MB</small>
                    </div>
                    <div class="form-group">
                        <label>Upload Aadhaar / ID Proof <span>*</span></label>
                        <input type="file" name="aadhaar_document" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small>JPG, PNG or PDF • Max 5MB</small>
                    </div>
                    <div class="form-group">
                        <label>Upload GST Certificate</label>
                        <input type="file" name="gst_document" accept=".jpg,.jpeg,.png,.pdf">
                        <small>Optional</small>
                    </div>
                    <div class="form-group">
                        <label>Upload Business Registration Proof</label>
                        <input type="file" name="business_registration_document" accept=".jpg,.jpeg,.png,.pdf">
                        <small>Optional</small>
                    </div>
                </div>
                <h4>Emergency Contact</h4>
                <div class="form-flex emergency-fields">
                    <div class="form-group">
                        <label>Emergency Contact Name <span>*</span></label>
                        <input type="text" name="emergency_contact_name" required>
                    </div>
                    <div class="form-group">
                        <label>Relationship <span>*</span></label>
                        <input type="text" name="emergency_relationship" required>
                    </div>
                    <div class="form-group">
                        <label>Contact No. <span>*</span></label>
                        <input type="tel" name="emergency_contact" maxlength="10" inputmode="numeric" pattern="[6-9][0-9]{9}" required>
                    </div>
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            {{-- STEP 4 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-users"></i> Membership Details</h2>
                <div class="form-flex">
                    <div class="form-group">
                        <label>Preferred Circle <span>*</span></label>
                        <input type="text" name="preferred_circle" required>
                    </div>
                    <div class="form-group">
                        <label>Preferred Location / Area <span>*</span></label>
                        <input type="text" name="preferred_location" required>
                    </div>
                    <div class="form-group w-100">
                        <label>How did you hear about IRAAYA World? <span>*</span></label>
                        <select name="how_heard" required>
                            <option value="">Select</option>
                            <option>Existing Member</option>
                            <option>Circle Director</option>
                            <option>Social Media</option>
                            <option>IRAAYA Event</option>
                            <option>Friend / Business Associate</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <label>Referred By</label>
                        <input type="text" name="referred_by">
                    </div>
                </div>
                <h4>Areas of Interest <span style="color:#cf2030">*</span></h4>
                <div class="checkbox-grid">
                    @foreach (['Business Growth','Networking & Connections','Referrals','Collaborations','Learning & Personal Growth','Visibility / Branding','Community & Support','Other'] as $interest)
                        <label><input type="checkbox" name="areas_of_interest[]" value="{{ $interest }}"> {{ $interest }}</label>
                    @endforeach
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            {{-- STEP 5 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-handshake"></i> Member Profile & Commitment</h2>
                <div class="form-flex">
                    <div class="form-group w-100">
                        <label>Expertise / Value you can contribute <span>*</span></label>
                        <textarea name="expertise" rows="5" required></textarea>
                    </div>
                    <div class="form-group w-100">
                        <label>Will you actively participate in Circle meetings? <span>*</span></label>
                        <div class="radio-group">
                            <label><input type="radio" name="active_participation" value="Yes" required> Yes</label>
                            <label><input type="radio" name="active_participation" value="No"> No</label>
                        </div>
                    </div>
                    <div class="form-group w-100">
                        <label>Interested in leadership / volunteering later? <span>*</span></label>
                        <div class="radio-group">
                            <label><input type="radio" name="leadership_interest" value="Yes" required> Yes</label>
                            <label><input type="radio" name="leadership_interest" value="Maybe"> Maybe</label>
                            <label><input type="radio" name="leadership_interest" value="No"> No</label>
                        </div>
                    </div>
                    <div class="form-group w-100">
                        <label>Will you abide by IRAAYA World code of conduct? <span>*</span></label>
                        <div class="radio-group">
                            <label><input type="radio" name="agree_code" value="Yes" required> Yes</label>
                            <label><input type="radio" name="agree_code" value="No"> No</label>
                        </div>
                    </div>
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            {{-- STEP 6 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-file-signature"></i> Membership Declaration</h2>
                <div class="declaration-box">
                    <p>I hereby apply for membership of IRAAYA World and declare that the information provided is true and complete.</p>
                    <p>I understand that submission does not automatically confer membership and is subject to review and approval.</p>
                    <p>I agree to uphold the values, confidentiality and professional standards of IRAAYA World.</p>
                    <p>I understand that membership does not guarantee any specific business or commercial outcome.</p>
                </div>
                <div class="form-group declaration-check">
                    <label>
                        <input type="checkbox" name="declaration_agree" value="1" required>
                        I have read and agree to the declaration. <span>*</span>
                    </label>
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="button" class="next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            {{-- STEP 7 --}}
            <div class="form-step">
                <h2><i class="fa-solid fa-user-check"></i> Applicant Confirmation</h2>
                <div class="form-flex">
                    <div class="form-group">
                        <label>Applicant Name <span>*</span></label>
                        <input type="text" name="applicant_name" required>
                    </div>
                    <div class="form-group">
                        <label>Date <span>*</span></label>
                        <input type="date" name="applicant_date" required>
                    </div>
                    <div class="form-group">
                        <label>Signature</label>
                        <input type="file" name="signature" accept=".jpg,.jpeg,.png">
                        <small>Optional • JPG or PNG</small>
                    </div>
                    <div class="form-group">
                        <label>Place <span>*</span></label>
                        <input type="text" name="place" required>
                    </div>
                </div>
                <div class="step-btns">
                    <button type="button" class="prev-btn"><i class="fa-solid fa-arrow-left-long"></i> Previous</button>
                    <button type="submit" class="submit-btn pay-btn">Pay ₹{{ number_format($payAmount) }} <i class="fa-solid fa-arrow-right-long"></i></button>
                </div>
            </div>

            <input type="hidden" name="utm_source" id="utm_source">
            <input type="hidden" name="utm_medium" id="utm_medium">
            <input type="hidden" name="utm_campaign" id="utm_campaign">
            <input type="hidden" name="utm_content" id="utm_content">
            <input type="hidden" name="utm_term" id="utm_term">
            <input type="hidden" name="campaign_id" id="campaign_id">
            <input type="hidden" name="adset_id" id="adset_id">
            <input type="hidden" name="ad_id" id="ad_id">
            <input type="hidden" name="placement" id="placement">
        </form>
    </div>
</div>
