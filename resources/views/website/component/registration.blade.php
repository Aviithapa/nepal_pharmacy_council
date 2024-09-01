<div class="register-area bg-fixed default-padding-botom" id="registration-block" style="margin-bottom: 100px;">
    <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url({{ $discount->getImageUrlAttribute() }});">
        </div>
    <!-- End Fixed BG -->
        <div class="container">
            <div class="reg-items">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 countdown">
                        
                        <div class="countdown-inner">
                            <h2 class="text-purple">{{ $discount->title }}</h2>
                            <p>
                                {!! $discount->content !!}
                            </p>
                            @if ($discount->excerpt)
                            <div class="counter-class" data-date="{!! $discount->excerpt !!}"><!-- Date Formate Input yyyy-mm-dd hh:mm:ss -->
                                <div class="item-list">
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-days text-purple">00</span> Days
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-hours text-purple">00</span> Hours
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-minutes text-purple">00</span> Minutes
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="item">
                                            <span class="counter-seconds">00</span> Seconds
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                           
                        </div>
                    </div>
                    <div class="col-lg-5 text-center reg-form">
                        <div class="form-box">
                            <form id="inquiryForm" action="{{ route('store.inquiry') }}" method="POST">
                                @csrf
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        Your request has been submitted
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        Please fix the errors below.
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="First Name" type="text" name="first_name" value="{{ old('first_name') }}" required>
                                        </div>
                                        @if($errors->has('first_name'))
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Last Name" type="text" name="last_name" value="{{ old('last_name') }}" required>
                                        </div>
                                        @if($errors->has('last_name'))
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email*" type="email" name="email" value="{{ old('email') }}" required>
                                        </div>
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select style="display: none;" disabled  name='course' required>
                                                <option value="frontend_engineering" selected>Frontend Engineering</option>
                                            </select>
                                            @if($errors->any())
                                            {{ $errors->first('course') }}
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Phone" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
                                        </div>
                                        @if($errors->has('phone_number'))
                                            <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">
                                            Apply Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@push('scripts')
<script>
   document.addEventListener('DOMContentLoaded', function () {
        @if(session('success') || $errors->any())
            document.getElementById('inquiryForm').scrollIntoView();
        @endif
    });
</script>

@endpush