
@extends('website.layout.app')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<form 
{{-- action="{{ route('qualification.save') }}" --}}
 method="POST" class="gap-2  py-12" style="width: 70%; margin:auto;">
    @csrf
    <div class="grid grid-cols-3 gap-5">
        <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
            Personal Information
        </h2>
        <div class="col-span-1">
            <label for="firstNameNepali">First Name in Devanagari (नाम )</label>
            <input type="text" name="firstNameNepali" id="firstName" class="form-input w-full" placeholder="Full Name" required>
        </div>
        <div class="col-span-1">
            <label for="middleNameNepali">Middle Name in Devanagari (बीचको नाम)</label>
            <input type="text" name="middleNameNepali" id="middleName" class="form-input w-full" placeholder="Middle Name" required>
        </div>
        <div class="col-span-1">
            <label for="lastNameNepali">Last Name in Devanagari (थर)</label>
            <input type="text" name="lastNameNepali" id="lastName" class="form-input w-full" placeholder="Last Name" required>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-5">
        <div class="col-span-1">
            <label for="title">Title</label>
            <select name="title" id="title" class="form-select w-full" required>
                <option value="">Select Title</option>
                <option value="mr">Mr</option>
                <option value="ms">Ms</option>
                <option value="mrs">Mrs</option>
            </select>
        </div>
        <div class="col-span-1">
            <label for="firstName">First Name in English</label>
            <input type="text" name="firstName" id="firstName" class="form-input w-full" placeholder="Full Name" required>
        </div>
        <div class="col-span-1">
            <label for="middleName">Middle Name in English</label>
            <input type="text" name="middleName" id="middleName" class="form-input w-full" placeholder="Middle Name" required>
        </div>
        <div class="col-span-1">
            <label for="lastName">Last Name in English</label>
            <input type="text" name="lastName" id="lastName" class="form-input w-full" placeholder="Last Name" required>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-2">
            <label for="dobAD">Date Of Birth -- AD (जन्म मिति) (YYYY-MM-DD)</label>
            <input type="text" name="dobAD" id="dobAD" class="form-input w-full" required>
        </div>
        <div class="col-span-2">
            <label for="dobBS">Date Of Birth -- BS (जन्म मिति)</label>
            <input type="text" name="dobBS" id="dobBS" class="form-input w-full" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="col-span-2">
            <label for="fatherName">Father Name (बुबाको नाम)</label>
            <input type="text" name="fatherName" id="fatherName" class="form-input w-full" required>
        </div>
        <div class="col-span-2">
            <label for="motherName">Mother Name (आमाको नाम)</label>
            <input type="text" name="motherName" id="motherName" class="form-input w-full" required>
        </div>
        <div class="col-span-2">
            <label for="gender">Gender</label>
            <select name="gender" id="title" class="form-select w-full" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-span-2">
            <label for="citizenship">Citizenship Number</label>
            <input type="text" name="citizenship" id="citizenship" class="form-input w-full" required>
        </div>
        <div class="col-span-2">
            <label for="nationalId">National ID No</label>
            <input type="text" name="nationalId" id="nationalId" class="form-input w-full" required>
        </div>
        <div class="col-span-2">
            <label for="issuedDistrict">Issued District </label>
            <input type="text" name="issuedDistrict" id="issuedDistrict" class="form-input w-full" required>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
            Address And Contact Detail
        </h1>
        <div class="col-span-1">
            <label for="district">District</label>
            <input type="text" name="district" id="district" class="form-input w-full" required>
        </div>
        <div class="col-span-1">
            <label for="municipality">Municipality/VDC</label>
            <input type="text" name="municipality" id="municipality" class="form-input w-full" required>
        </div>
        <div class="col-span-1">
            <label for="ward">Ward</label>
            <input type="text" name="ward" id="ward" class="form-input w-full" required>
        </div>
        <div class="col-span-1">
            <label for="tole">Tole</label>
            <input type="text" name="tole" id="tole" class="form-input w-full" required>
        </div>
    </div>
    <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
    Educational qualification </h1>
    <table class="qualification-table">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>Qualification</th>
            <th>Collage</th>
            <th>Year</th>
            <th>division</th>
            <th>Reg. no.</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>SLC or Equivalent</td>
            <td><input type="text" placeholder="Enter institute"></td>
            <td><input type="text" placeholder="Year"></td>
            <td><input type="text" placeholder="Grade"></td>
            <td><input type="text" placeholder="Reg. no."></td>
            <td><input type="text" placeholder="Remarks"></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Plus 2 or Equivalent</td>
            <td><input type="text" placeholder="Enter institute"></td>
            <td><input type="text" placeholder="Year"></td>
            <td><input type="text" placeholder="Grade"></td>
            <td><input type="text" placeholder="Reg. no."></td>
            <td><input type="text" placeholder="Remarks"></td>
          </tr>
        </tbody>
      </table>
      <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
        Additional Information
     </h1>
     <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
         
        <div class="col-span-1">
            <label for="appliedCollege">Applied College</label>
            <input type="text" name="appliedCollege" id="appliedCollege" class="form-input w-full" required>
        </div>
        <div class="col-span-1">
            <label for="appliedUniversity">Applied University</label>
            <input type="text" name="appliedUniversity" id="appliedUniversity" class="form-input w-full" required>
        </div>
        <div class="col-span-1">
            <label for="npc_enlisted" class="block font-medium text-gray-700">
              College/University Enlisted in NPC
            </label>
            <div class="flex items-center space-x-4 mt-2">
              <label class="flex items-center">
                <input 
                  type="radio" 
                  name="npc_enlisted" 
                  value="yes" 
                  class="form-radio h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500" 
                  onclick="toggleButton()"
                  checked
                >
                <span class="ml-2 text-gray-700">Yes</span>
              </label>
              <label class="flex items-center">
                <input 
                  type="radio" 
                  name="npc_enlisted" 
                  value="no" 
                  class="form-radio h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500" 
                  onclick="toggleButton()"
                >
                <span class="ml-2 text-gray-700">No</span>
              </label>
              <div id="newButtonContainer" class="hidden">
                <a 
                  class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
                >
                  New
                </a>
              </div>
            </div>
            
          </div>
         
    </div>

      <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
        Documents
     </h1>
      <h2 class="section-heading mt-5">Citizenship Document    </h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="citizenship-front">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="Citizenship Front">
            <p>Citizenship Front</p>
          </label>
          <input type="file" id="citizenship-front" name="citizenship-front">
        </div>
        <div class="document-item">
          <label for="citizenship-back">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="Citizenship Back">
            <p>Citizenship Back</p>
          </label>
          <input type="file" id="citizenship-back" name="citizenship-back">
        </div>
      </div>
  
      <h2 class="section-heading mt-5">SLC DOCUMENT</h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="slc-marksheet">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC MarkSheet">
            <p>SLC MarkSheet</p>
          </label>
          <input type="file" id="slc-marksheet" name="slc-marksheet">
        </div>
        <div class="document-item">
          <label for="slc-provisional">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Provisional">
            <p>SLC Provisional</p>
          </label>
          <input type="file" id="slc-provisional" name="slc-provisional">
        </div>
        <div class="document-item">
          <label for="slc-character">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Character">
            <p>SLC Character</p>
          </label>
          <input type="file" id="slc-character" name="slc-character">
        </div>
        <div class="document-item">
            <label for="slc-character">
              <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Character">
              <p>Equivalence (in case of foreign collage)</p>
            </label>
            <input type="file" id="slc-character" name="slc-character">
          </div>
      </div>

      <h2 class="section-heading mt-5"> Plus 2 Document    </h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="slc-marksheet">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC MarkSheet">
            <p> Plus 2 MarkSheet</p>
          </label>
          <input type="file" id="slc-marksheet" name="slc-marksheet">
        </div>
        <div class="document-item">
          <label for="slc-provisional">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Provisional">
            <p> Plus 2 Provisional</p>
          </label>
          <input type="file" id="slc-provisional" name="slc-provisional">
        </div>
        <div class="document-item">
          <label for="slc-character">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Character">
            <p> Plus 2 Character</p>
          </label>
          <input type="file" id="slc-character" name="slc-character">
        </div>
        <div class="document-item">
            <label for="slc-character">
              <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC Character">
              <p>Equivalence (in case of foreign collage)</p>
            </label>
            <input type="file" id="slc-character" name="slc-character">
          </div>
      </div>

      <h2 class="section-heading mt-5"> Bank Voucher    </h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="slc-marksheet">
            <img src="{{ asset('frontend/images/document-placeholder.webp') }}" alt="SLC MarkSheet">
            <p>Bank Voucher</p>
          </label>
          <input type="file" id="bank-voucher" name="bank-voucher">
        </div>
         
        
        
      </div>
    <div class="npc__form-login-btn-container text-center mt-5">
        <button class="npc__form-login-btn" type="submit">
          Submit
        </button>
      </div>
</form>

<script>
function toggleButton() {
  const yesRadio = document.querySelector('input[name="npc_enlisted"][value="yes"]');
  const newButtonContainer = document.getElementById("newButtonContainer");

  if (yesRadio.checked) {
    newButtonContainer.classList.add("hidden");
  } else {
    newButtonContainer.classList.remove("hidden");
  }
}
    
</script>
@endsection

