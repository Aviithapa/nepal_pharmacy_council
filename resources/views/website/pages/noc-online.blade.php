
@extends('website.layout.app')
@section('content')
 
<div class="npc__login"  style="margin-top: 35px;">
  <div class="npc__container--fluid">
    <div class="flex" >
    
      <div style="padding: 20px; width:100%; display:flex; justify-content:center; align-items:center; ">
        <div class="flex flex-col items-center" style="background: #dee2e6; padding:50px;" >
          <div class="npc__form-title">
            <h2>Apply for NOC</h2>
          </div>
          <form action="{{ url('/submit-otp') }}" method="POST"  class="flex flex-col gap-8">
            <div class="npc__form-input flex flex-col">
              <label for="email">Phone Number</label>
              <div class="npc__input-container">
                <span style="padding-bottom:10px;">
                  <i class="fa-regular fa-phone-square" ></i>
                </span>
                <input
                  type="text"
                  placeholder="98XXXXXXXX"
                  name="phone_number"
                  id="phone_number"
                  value="{{ old('phone_number') }}"
                  style="padding-left: 30px !important;"
                />
                
              </div>
              @error('phone_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
              @error('phone_number_inactive')
                <span class="text-red-500 text-sm">{!! $message !!}</span>
              @enderror
            </div>

            <div class="npc__form-login-btn-container">
              <button class="npc__form-login-btn" type="submit">
                Proceed
              </button>
            </div>
            <p style="text-align:center;">Already have account? <a href="/noc-login" style="color: blue;">Login</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

