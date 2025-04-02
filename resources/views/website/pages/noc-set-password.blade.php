@extends('website.layout.app')
@section('content')
 
<div class="npc__login" style="margin-top: 35px;">
  <div class="npc__container--fluid">
    <div class="flex">
      <div style="padding: 20px; width:100%; display:flex; justify-content:center; align-items:center; ">
        <div class="flex flex-col items-center" style="background: #dee2e6; padding:50px;" >
          <div class="npc__form-title" style="margin-bottom: 25px;">
            <h2>Reset Your System generated password</h2>
          </div>
          <h3 style="margin-bottom: 25px;">Reset Password</h3>
          <form action="{{ url('/set-password') }}" method="POST" class="flex flex-col gap-8">
            @csrf
            <div class="npc__form-input flex flex-col">
              <label for="password">New Password</label>
              <div class="npc__input-container">
                <span style="padding-bottom:10px;">
                  <i class="fa-regular fa-lock"></i>
                </span>
                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  id="password"
                  value="{{ old('password') }}"
                  style="padding-left: 30px !important;"
                />
              </div>
              @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="npc__form-input flex flex-col">
              <label for="confirm-password">Confirm Password</label>
              <div class="npc__input-container">
                <span style="padding-bottom:10px;">
                  <i class="fa-regular fa-lock"></i>
                </span>
                <input
                  type="password"
                  placeholder="Confirm Password"
                  name="confirm-password"
                  id="confirm-password"
                  value="{{ old('confirm-password') }}"
                  style="padding-left: 30px !important;"
                />
              </div>
              @error('confirm-password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>

            <div class="npc__form-login-btn-container">
              <button class="npc__form-login-btn" type="submit">
                Proceed
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
