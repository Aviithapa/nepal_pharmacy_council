
@extends('website.layout.app')
@section('content')
 
<div class="npc__login"  style="margin-top: 35px;">
  <div class="npc__container--fluid">
    <div class="flex">
      
      <div style="padding: 20px; width:100%; display:flex; justify-content:center; align-items:center; ">
        <div class="flex flex-col items-center" style="background: #dee2e6; padding:50px;" >
          <div class="npc__form-title">
            <h2>Verify Your Token</h2>
          </div>
          <form action="{{ url('/verify-token' ) }}" method="POST"  class="flex flex-col gap-8">
            @if(session('success'))
                <div class="notification success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="notification error text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            <div class="npc__form-input flex flex-col">
              <label for="email">Token</label>
              <div class="npc__input-container">
                <span style="padding-bottom:10px;">
                  <i class="fa-regular fa-phone-square" ></i>
                </span>
                <input
                  type="text"
                  placeholder=""
                  name="token"
                  id="token"
                  value="{{ old('token') }}"
                  style="padding-left: 30px !important;"
                />
              </div>
              @error('token')
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

