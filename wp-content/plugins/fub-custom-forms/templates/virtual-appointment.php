<div class="row">
  <div class="col-sm-6 col-xs-12">
      <label>
        <input type="text" name="fub_name" value="" size="40" class="" placeholder="Your Name *" required>
      </label>
  </div>
  <div class="col-sm-6 col-xs-12">
    <label>
      <input type="text" name="fub_phone" value="" size="40" class=""placeholder="Phone number (e.g: +1 909-545-8200) *" required>
    </label>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-12">
    <label>
      <input type="email" name="fub_email" value="" size="40" class="" placeholder="Your Email Address *" required>
    </label> 
  </div>
  <div class="col-sm-6 col-xs-12">
    <div class="cust-checkbox">
      <div class="checkbox">
        <input type="checkbox" name="fub_property_type[]" value="Residential">
        <label class="checkbox-custom-label">Residential</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" name="fub_property_type[]" value="Personal Use">
        <label class="checkbox-custom-label">Personal Use</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" name="fub_property_type[]" value="Commercials">
        <label class="checkbox-custom-label">Commercials</label>
      </div>
      <div class="checkbox">
        <input type="checkbox" name="fub_property_type[]" value="Investment">
        <label class="checkbox-custom-label">Investment</label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4 col-xs-12">
    <span class="title">Are you a Realtor?</span>
    <div class="radiobuttons">
      <div class="rdio"> 
        <input type="radio" name="fub_is_realtor" value="Yes" checked>
        <label for="fub_is_realtor">Yes</label>
      </div>
      <div class="rdio">
      <input type="radio" name="fub_is_realtor" value="No">
        <label for="fub_is_realtor">No</label>
      </div>
    </div>
  </div>
  <div class="col-sm-8  col-xs-12">
      <span class="title">Are you working with a Realtor?</span>
      <div class="radiobuttons">
        <div class="rdio"> 
          <input type="radio" name="fub_is_working_with_realtor" value="Yes" checked>
          <label for="fub_is_working_with_realtor">Yes</label>
        </div>
        <div class="rdio">
          <input type="radio" name="fub_is_working_with_realtor" value="No">
          <label for="fub_is_working_with_realtor">No</label>
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="connect-via">
  <div class="col-sm-12">
    <div class="title"><h3>Connect via</h3></div>
      <div class="radiobuttons row social-check">
        <div class="col-sm-4 col-xs-12">
          <div class="rdio"> 
            <input type="radio" name="fub_connect_via" value="Skype" checked/>
            <label for="fub_connect_via">Skype</label>
            <div class="img-block">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/skype-icon-300.png" alt="Skype" title="Skype"/>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="rdio">
            <input type="radio" name="fub_connect_via" value="Google Hangouts"/>
            <label for="fub_connect_via">Zoom</label>
            <div class="img-block">
             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoom-icon-300.png" alt="Zoom" title="Google Hangouts"/>
            </div>
          </div>            
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="rdio">
            <input type="radio" name="fub_connect_via" value="Google Hangouts"/>
            <label for="fub_connect_via">Google Hangouts</label>
            <div class="img-block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hangouts-icon-300.png" alt="Google Hangouts" title="Google Hangouts"/>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
          <span class="title">Date *</span>
          <div class="date-section">
            <input type="text" class="has-datepicker" name="fub_appointment_date" placeholder="20-12-2021" required/>
            <i class="fas fa-calendar-alt"></i>
          </div>
      </div>
      <div class="col-sm-8 col-xs-12">
          <span class="title">Time</span>
          <div class="radiobuttons">
            <div class="rdio"> 
              <input type="radio" name="fub_appointment_time" value="11 AM" checked/>
              <label for="fub_appointment_time">11 AM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="12 PM"/>
              <label for="fub_appointment_time">12 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="1 PM"/>
              <label for="fub_appointment_time">1 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="2 PM"/>
              <label for="fub_appointment_time">2 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="3 PM"/>
              <label for="fub_appointment_time">3 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="4 PM"/>
              <label for="fub_appointment_time">4 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="5 PM"/>
              <label for="fub_appointment_time">5 PM</label>
            </div>
            <div class="rdio">
              <input type="radio" name="fub_appointment_time" value="6 PM"/>
              <label for="fub_appointment_time">6 PM</label>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
      <span class="title">Looking for</span>
      <div class="cust-checkbox">
        <div class="checkbox"> 
          <input type="checkbox" name="fub_looking_for[]" value="New Build" checked/>
          <label class="checkbox-custom-label">New Build</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_looking_for[]" value="Resale" />
          <label class="checkbox-custom-label">Resale</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_looking_for[]" value="Custom Home" />
          <label class="checkbox-custom-label">Custom Home</label>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
      <span class="title">Ownership</span>
      <div class="cust-checkbox">
        <div class="checkbox"> 
          <input type="checkbox" name="fub_ownership[]" value="Freehold" checked/>
          <label class="checkbox-custom-label">Freehold</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_ownership[]" value="Condominium"/>
          <label class="checkbox-custom-label">Condominium</label>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
      <span class="title">Type</span>
      <div class="cust-checkbox">
        <div class="checkbox"> 
          <input type="checkbox" name="fub_type[]" value="Detached" checked/>
          <label class="checkbox-custom-label">Detached</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_type[]" value="Townhouse"/>
          <label class="checkbox-custom-label">Townhouse</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_type[]" value="Semi Detached"/>
          <label class="checkbox-custom-label">Semi Detached</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_type[]" value="Bunglow"/>
          <label class="checkbox-custom-label">Bunglow</label>
        </div>
        <div class="checkbox"> 
          <input type="checkbox" name="fub_type[]" value="Other"/>
          <label class="checkbox-custom-label">Other</label>
        </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
      <span class="title">Area of Interest</span>
      <select name="fub_area_of_interest" >
        <option value="Cambridge">Cambridge</option>
      </select>
  </div>
  <div class="col-sm-4">
    <label>
      <span class="title">What size do you weant your home to be?</span>
      <select name="fub_area_sqft" >
        <option value="1200-1500 Sqft">1200-1500 Sqft</option>
      </select>
    </label>
  </div>
  <div class="col-sm-4">
      <span class="title">What is your budget?</span>
      <select name="fub_budget" >
        <option value="500K-800K">500K-800K</option>
      </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
      <span class="title">Use?</span>
      <select name="fub_use" >
        <option value="Personal">Personal</option>
      </select>
  </div>
  <div class="col-sm-8">
    <div class="row">
  <div class="col-sm-4">
      <span class="title">First time buyer?</span>
      <div class="radiobuttons">
        <div class="rdio"> 
          <input type="radio" name="fub_first_time_buyer" value="Yes" checked>
          <label for="fub_first_time_buyer">Yes</label>
        </div>
        <div class="rdio">
          <input type="radio" name="fub_first_time_buyer" value="No">
          <label for="fub_first_time_buyer">No</label>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
      <span class="title">Mortgage Approved?</span>
      <div class="radiobuttons">
        <div class="rdio"> 
          <input type="radio" name="fub_mortgage_approved" value="Yes" checked>
          <label for="fub_mortgage_approved">Yes</label>
        </div>
        <div class="rdio">
          <input type="radio" name="fub_mortgage_approved" value="No">
          <label for="fub_mortgage_approved">No</label>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
      <span class="title">Currently working with agent?</span>
      <div class="radiobuttons">
        <div class="rdio"> 
          <input type="radio" name="fub_working_with_agent" value="Yes" checked>
          <label for="fub_working_with_agent">Yes</label>
        </div>
        <div class="rdio">
          <input type="radio" name="fub_working_with_agent" value="No">
          <label for="fub_working_with_agent">No</label>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="row">
  <div class="col-sm-12">
    <textarea name="fub_comments" cols="40" rows="10" placeholder="Type comments"></textarea>
  </div>
</div>