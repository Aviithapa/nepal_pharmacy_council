
@extends('website.layout.app')

@section('content')
   
<div class="npc__login">
  <div class="npc__container--fluid">
    <div class="flex">
      <div class="npc__login-form flex items-center justify-center">
        <div class="flex flex-col items-center">
          <div class="npc__logo">
            <img src="{{ getSiteSetting('logo_image') }}" alt="npc logo" />
          </div>
          <div class="npc__form-title">
            <h2>Welcome to NPC Dashboard</h2>
          </div>
          <form action="{{ url('/login') }}" method="POST"  class="flex flex-col gap-8">
            <div class="npc__form-input flex flex-col">
              <label for="email">Email</label>
              <div class="npc__input-container">
                <span>
                  <i class="fa-regular fa-envelope"></i>
                </span>
                <input
                  type="text"
                  placeholder="johndoe@gmail.com"
                  name="email"
                  id="email"
                  value="{{ old('email') }}"
                />
              </div>
            </div>
            <div class="npc__form-input w-full flex flex-col">
              <label for="email">Password</label>
              <div class="npc__input-container">
                <span> <i class="fa-solid fa-lock"></i></span>
                <input
                  type="password"
                  placeholder="*********"
                  name="password"
                  id="password"
                />
              </div>
            </div>
            <div class="npc__form-login-btn-container">
              <button class="npc__form-login-btn" type="submit">
                log in
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="npc__cover-img flex items-center justify-center">
        <div class="npc__login-nepal-flag">
          <img src="{{ asset('frontend/images/np_flag.gif') }}" alt="flag of nepal" />
        </div>
      </div>
    </div>
  </div>
</div>


@endsection