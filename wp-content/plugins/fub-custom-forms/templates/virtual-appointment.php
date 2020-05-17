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
    <div class="cb">
      <input type="checkbox" name="fub_property_type[]" value="Residential">Residential
    </div>
    <div class="cb">
      <input type="checkbox" name="fub_property_type[]" value="Personal Use">Personal Use
    </div>
    <div class="cb">
      <input type="checkbox" name="fub_property_type[]" value="Commercials">Commercials
    </div>
    <div class="cb">
      <input type="checkbox" name="fub_property_type[]" value="Investment">Investment
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4 col-xs-12">
    <label>
      <span>Are you a Realtor?</span>
      <div class="cb">
        <input type="radio" name="fub_is_realtor" value="Yes" checked>Yes
        <input type="radio" name="fub_is_realtor" value="No">No
      </div>
    </label>
  </div>
  <div class="col-sm-8  col-xs-12">
    <label>
      <span>Are you working with a Realtor?</span>
      <div class="cb">
        <input type="radio" name="fub_is_working_with_realtor" value="Yes" checked>Yes
        <input type="radio" name="fub_is_working_with_realtor" value="No">No
      </div>
    </label>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="title"><h3>Connect via</h3></div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <label>
          <input type="radio" name="fub_connect_via" value="Skype" checked/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/skype-icon-300.png" alt="Skype" title="Skype"/>
      </div>
      <div class="col-sm-4 col-xs-12">
        <label>
          <input type="radio" name="fub_connect_via" value="Google Hangouts"/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoom-icon-300.png" alt="Zoom" title="Google Hangouts"/>
      </div>
      <div class="col-sm-4 col-xs-12">
        <label>
          <input type="radio" name="fub_connect_via" value="Google Hangouts"/>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hangouts-icon-300.png" alt="Google Hangouts" title="Google Hangouts"/>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <label>
          <span>Date *</span>
          <input type="text" class="has-datepicker" name="fub_appointment_date" required/>
        </label>
      </div>
      <div class="col-sm-8 col-xs-12">
        <label>
          <span>Time</span>
          <input type="radio" name="fub_appointment_time" value="11 AM" checked/>11 AM
          <input type="radio" name="fub_appointment_time" value="12 PM"/>12 PM
          <input type="radio" name="fub_appointment_time" value="1 PM"/>1 PM
          <input type="radio" name="fub_appointment_time" value="2 PM"/>2 PM<br/>
          <input type="radio" name="fub_appointment_time" value="3 PM"/>3 PM
          <input type="radio" name="fub_appointment_time" value="4 PM"/>4 PM
          <input type="radio" name="fub_appointment_time" value="5 PM"/>5 PM
          <input type="radio" name="fub_appointment_time" value="6 PM"/>6 PM<br/>
        </label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <label>
      <span>Looking for</span>
      <input type="checkbox" name="fub_looking_for[]" value="New Build" checked/>New Build
      <input type="checkbox" name="fub_looking_for[]" value="Resale"/>Resale
      <input type="checkbox" name="fub_looking_for[]" value="Custom Home"/>Custom Home
    </label>
  </div>
  <div class="col-sm-4">
    <label>
      <span>Ownership</span>
      <input type="checkbox" name="fub_ownership[]" value="Freehold" checked/>Freehold
      <input type="checkbox" name="fub_ownership[]" value="Condominium"/>Condominium
    </label>
  </div>
  <div class="col-sm-4">
    <label>
      <span>Type</span>
      <input type="checkbox" name="fub_type[]" value="Detached" checked/>Detached
      <input type="checkbox" name="fub_type[]" value="Townhouse"/>Townhouse
      <input type="checkbox" name="fub_type[]" value="Semi Detached"/>Semi Detached
      <input type="checkbox" name="fub_type[]" value="Bunglow"/>Bunglow
      <input type="checkbox" name="fub_type[]" value="Other"/>Other
    </label>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <label>
      <span>Area of Interest</span>
      <select name="fub_area_of_interest" >
        <option value="Cambridge">Cambridge</option>
      </select>
    </label>
  </div>
  <div class="col-sm-4">
    <label>
      <span>What size do you weant your home to be?</span>
      <select name="fub_area_sqft" >
        <option value="1200-1500 Sqft">1200-1500 Sqft</option>
      </select>
    </label>
  </div>
  <div class="col-sm-4">
    <label>
      <span>What is your budget?</span>
      <select name="fub_budget" >
        <option value="500K-800K">500K-800K</option>
      </select>
    </label>
  </div>
</div>
<div class="row">
  <div class="col-sm-3">
    <label>
      <span>Use?</span>
      <select name="fub_use" >
        <option value="Personal">Personal</option>
      </select>
    </label>
  </div>
  <div class="col-sm-3">
    <label>
      <span>First time buyer?</span>
      <input type="radio" name="fub_first_time_buyer" value="Yes" checked/>Yes
      <input type="radio" name="fub_first_time_buyer" value="No"/>No
    </label>
  </div>
  <div class="col-sm-3">
    <label>
      <span>Mortgage Approved?</span>
      <input type="radio" name="fub_mortgage_approved" value="Yes" checked/>Yes
      <input type="radio" name="fub_mortgage_approved" value="No"/>No
    </label>
  </div>
  <div class="col-sm-3">
    <label>
      <span>Currently working with agent?</span>
      <input type="radio" name="fub_working_with_agent" value="Yes" checked/>Yes
      <input type="radio" name="fub_working_with_agent" value="No"/>No
    </label>
  </div>
</div>
<div class="row">
  <div class="col-sm-23">
    <label>
      <textarea name="fub_comments" cols="40" rows="10" placeholder="Type comments"></textarea>
    </label>
  </div>
</div>