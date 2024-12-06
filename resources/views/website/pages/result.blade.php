@extends('website.layout.app')

@section('content')

<section style="position: relative; background-color: #f0f8ff; padding: 60px 20px; min-height: 100vh;">
    <!-- Watermark Logo -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; z-index: 0;">
        <img src="logo.png" alt="Logo" style="width: 250px; height: auto;" />
    </div>

    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; z-index: 1; position: relative;">
        <!-- Result Form -->
      

        <!-- Result Section -->
        @if(isset($result))
                <div 
                id="result" 
                style="
                    margin-top: 30px; 
                    padding: 20px; 
                    border: 1px solid #007BFF; 
                    border-radius: 10px; 
                    width: 500px; 
                    background-color: #ffffff; 
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                    display: block;">
                <p style="font-size: 20px; font-weight: bold; margin-bottom: 15px; text-align: center;">Result Details</p>

                <table 
                    style="
                        width: 100%; 
                        border-collapse: collapse; 
                        font-size: 16px; 
                        text-align: left;">
                    <tbody>
                        <tr>
                            <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Exam</th>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $result->exam }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Roll Number</th>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $result->roll_number }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Level</th>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc; text-transform:capitalize;">{{ $result->level }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; border-bottom: 1px solid #ccc; text-align: left;">Obtain Marks</th>
                            <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $result->obtain_marks }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Status</th>
                            <td style="padding: 10px; color: {{ $result->status === 'Pass' ? 'green' : 'red' }}; font-weight: bold;">
                                {{ $result->status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <form 
            id="resultForm" 
            method="POST"
            action="{{ route("result.check")  }}"
            style="
                text-align: center; 
                padding: 30px; 
                border: 1px solid #ccc; 
                border-radius: 10px; 
                width: 500px; 
                background-color: #ffffff; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);">
            @csrf
            <label for="rollNumber" style="font-size: 22px; font-weight: bold; display: block; margin-bottom: 15px;">Enter Your Roll Number</label>
            <input 
                type="text" 
                id="rollNumber" 
                name="roll_number" 
                value="{{ old('roll_number') }}"
                style="
                    width: 100%; 
                    padding: 12px; 
                    margin-bottom: 20px; 
                    border: 1px solid #ddd; 
                    border-radius: 5px; 
                    font-size: 16px;" 
                placeholder="e.g., 101" 
                required>
                @error('roll_number')
                    <div style="
                        color: red; 
                        font-size: 14px; 
                        margin-top: -15px; 
                        margin-bottom: 10px;">
                        {{ $message }}
                    </div>
                @enderror
            <button 
                type="submit" 
                style="
                    width: 100%; 
                    padding: 12px; 
                    background-color: #007BFF; 
                    color: white; 
                    border: none; 
                    border-radius: 5px; 
                    font-size: 18px; 
                    cursor: pointer;">
                Check Result
            </button>
            @if(session('error'))
                    <div style="
                        margin-top: 20px; 
                        color: red; 
                        font-size: 16px; 
                        font-weight: bold;">
                        {{ session('error') }}
                    </div>
                @endif
        </form>
        @endif
       
    </div>
</section>

 

@endsection
