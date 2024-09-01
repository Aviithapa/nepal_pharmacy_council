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

document.addEventListener("DOMContentLoaded", () => {
  const data = [
    {
      file: "https://nepalpharmacycouncil.org.np/storage/news/1724755457.jpg",
      type: "image",
    },
    {
      file: "https://nepalpharmacycouncil.org.np/storage/syllabus/coc.pdf",
      type: "pdf",
    },
  ];
  const noticeModal = document.getElementById("notice-modal");
  const nextNotice = document.getElementById("notice-next");
  if (data.length === 0) {
    noticeModal.style.display = "none";
    return;
  }

  let currentPosition = 0;

  const closeNotice = document.getElementById("close-notice");
  const noticeContainer = document.getElementById("notice-container");
  function addNotice(index) {
    if (data[index].type === "pdf") {
      noticeContainer.innerHTML = "";

      // Create the embed element
      const embed = document.createElement("embed");
      embed.src = data[index].file; // Path to your PDF file
      embed.type = "application/pdf";
      embed.width = "100%";
      embed.height = "842px";

      // Append the embed element to the container
      noticeContainer.appendChild(embed);
      return;
    }
    noticeContainer.innerHTML = "";
    // Create the div container element
    const imgContainer = document.createElement("div");
    imgContainer.className = "npc__notice-img-container";

    // Create the image element
    const imgElement = document.createElement("img");
    imgElement.src = data[index].file;
    imgElement.alt = "";

    // Append the image to the container
    imgContainer.appendChild(imgElement);
    noticeContainer.appendChild(imgContainer);
  }

  addNotice(currentPosition);

  closeNotice.addEventListener("click", () => {
    noticeModal.style.display = "none";
    currentPosition = 0;
  });

  nextNotice.addEventListener("click", () => {
    currentPosition++;
    addNotice(currentPosition);
    showButton();
  });

  function showButton() {
    if (currentPosition === data.length - 1) {
      closeNotice.style.display = "block";
      nextNotice.style.display = "none";
    } else {
      closeNotice.style.display = "none";
      nextNotice.style.display = "block";
    }
  }

  showButton();
});

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

document.addEventListener("DOMContentLoaded", () => {
  let isOpen = false;
  const dropDownBtns = document.getElementsByClassName(
    "npc__nav-link-dropdown"
  );
  const dropDowns = document.getElementsByClassName("npc__mob-dropdown");

  // function hideAllDropDown() {
  //   for (const d of dropDowns) {
  //     d.classList.remove("npc__mob-dropdown-show");
  //     d.classList.add("npc__mob-dropdown-hide");
  //   }
  // }

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
