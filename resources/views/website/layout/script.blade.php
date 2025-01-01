<script>
    document.addEventListener("DOMContentLoaded", () => {
      const overlay = document.getElementById("overlay");
      const regToggle = document.getElementById("reg-toggle");
      const regModal = document.getElementById("reg-modal");
      const slideArrowIcon = document.getElementById("slide-arrow-icon");
      const iconElement = document.createElement("i");
      iconElement.classList.add("fa-solid", "fa-angles-right");
      slideArrowIcon.appendChild(iconElement);
      let isOpen = true;

      overlay.addEventListener("scroll", (e) => {
        e.stopPropagation();
      });

      overlay.addEventListener("click", () => {
        regModal.style.transform = "translateX(100.1%)";
        overlay.style.display = "none";
      })

      regToggle.addEventListener("click", () => {
        const visible = regModal.getAttribute("data-visible");
        if (isOpen) {
          slideArrowIcon.innerHTML = "";
          const rightIcon = document.createElement("i");
          rightIcon.classList.add("fa-solid", "fa-angles-right");
          slideArrowIcon.appendChild(rightIcon);
          regModal.style.transform = "translateX(0)";
          overlay.style.display = "block";
          isOpen = false;
        } else {
          slideArrowIcon.innerHTML = "";
          const leftIcon = document.createElement("i");
          leftIcon.classList.add("fa-solid", "fa-angles-left");
          slideArrowIcon.appendChild(leftIcon);
          regModal.style.transform = "translateX(100.1%)";
          overlay.style.display = "none";
          isOpen = true;
        }
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let currentSlide = 0;
      const slides = document.querySelectorAll(".slide-img");
      const slidesContainer = document.querySelector(".slides");
      const totalSlides = slides.length;

      // Clone the first and last slides for smooth transition effect
      const firstClone = slides[0].cloneNode(true);
      const lastClone = slides[totalSlides - 1].cloneNode(true);

      slidesContainer.appendChild(firstClone); // Append the first slide clone at the end
      slidesContainer.insertBefore(lastClone, slides[0]); // Insert the last slide clone at the beginning

      let currentPosition = -100; // Start at the first actual slide
      slidesContainer.style.transform = `translateX(${currentPosition}%)`;

      function moveToSlide(position, transition = true) {
        if (!transition) {
          slidesContainer.style.transition = "none";
        } else {
          slidesContainer.style.transition = "transform 0.5s ease-in-out";
        }
        slidesContainer.style.transform = `translateX(${position}%)`;
      }

      function nextSlide() {
        currentPosition -= 100;
        currentSlide++;

        moveToSlide(currentPosition);

        // If the last slide is reached, reset to the first one after the transition
        if (currentSlide === totalSlides) {
          setTimeout(() => {
            currentPosition = -100;
            currentSlide = 0;
            moveToSlide(currentPosition, false); // Disable transition to make the jump seamless
          }, 500); // Wait for the transition to finish
        }
      }

      // Auto slide
      setInterval(nextSlide, 3000); // Change image every 3 seconds
    });
  </script>



  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let currentSlide = 0;
      const slides = document.getElementsByClassName("npc__card");
      const slidesContainer = document.getElementById("slides");
      const totalSlides = slides.length;

      // Clone the first and last slides for smooth transition effect
      const firstClone = slides[0].cloneNode(true);
      const lastClone = slides[totalSlides - 1].cloneNode(true);

      slidesContainer.appendChild(firstClone); // Append the first slide clone at the end
      slidesContainer.insertBefore(lastClone, slides[0]); // Insert the last slide clone at the beginning

      let currentPosition = -100; // Start at the first actual slide
      slidesContainer.style.transform = `translateX(${currentPosition}%)`;

      function moveToSlide(position, transition = true) {
        if (!transition) {
          slidesContainer.style.transition = "none";
        } else {
          slidesContainer.style.transition = "transform 0.5s ease-in-out";
        }
        slidesContainer.style.transform = `translateX(${position}%)`;
      }

      function nextSlide() {
        currentPosition -= 100;
        currentSlide++;

        moveToSlide(currentPosition);

        // If the last slide is reached, reset to the first one after the transition
        if (currentSlide === totalSlides) {
          setTimeout(() => {
            currentPosition = -100;
            currentSlide = 0;
            moveToSlide(currentPosition, false); // Disable transition to make the jump seamless
          }, 500); // Wait for the transition to finish
        }
      }

      // Auto slide
      setInterval(nextSlide, 3000); // Change image every 3 seconds
    });
  </script>

  <!-- mobile nav drop down  -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let isOpen = false;
      const dropDownBtns = document.getElementsByClassName(
        "npc__nav-link-dropdown"
      );
      const dropDowns = document.getElementsByClassName("npc__mob-dropdown");

      function AttachDropDownEvent() {
        for (const ds of dropDownBtns) {
          ds.addEventListener("click", (e) => {
            ds.classList.toggle("npc__mob-dropdown-hide");
            ds.classList.toggle("npc__mob-dropdown-icon");
          });
        }
      }
      // hideAllDropDown();
      AttachDropDownEvent();
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const hamburger = document.getElementById("hamburger");
      const cross = document.getElementById("cross");
      const mobileNav = document.getElementById("mobile-nav");

      hamburger.addEventListener("click", () => {
        hamburger.style.display = "none";
        cross.style.display = "block";
        mobileNav.style.transform = "translateX(0%)";
      });

      cross.addEventListener("click", () => {
        cross.style.display = "none";
        hamburger.style.display = "block";
        mobileNav.style.transform = "translateX(-100%)";
      });
    });
  </script>

<script src="{{asset('backend/assets/js/vendor.min.js') }}"></script>
<script src="{{asset('backend/assets/js/app.min.js') }}"></script>


@if(session('success'))
<script>
    $.toast({
        heading: 'Success',
        text: '{{ session('success') }}',
        position: 'top-right',
        loader: false,
        bgColor: '#28a745',
    });
</script>
@endif

@if(session('warning'))
<script>
    $.toast({
        heading: 'Warning',
        text: '{{ session('warning') }}',
        position: 'top-right',
        loader: false,
        bgColor: '#99cc33',
    });
</script>
@endif


@if(session('danger'))
<script>
    $.toast({
        heading: 'Error',
        text: '{{ session('danger') }}',
        position: 'top-right',
        loader: false,
        bgColor: 'red',
    });
</script>
@endif


@if(session('error'))
<script>
    $.toast({
        heading: 'Error',
        text: '{{ session('error') }}',
        position: 'top-right',
        loader: false,
        bgColor: 'red',
    });
</script>
@endif