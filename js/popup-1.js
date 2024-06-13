// Select the elements
const popupContainer = document.querySelector('.popup-container');
const asanaContainers = document.querySelectorAll('.asana-container');
const closePopup = document.querySelector('.close-popup');

// Set the initial values
const initialRequiredClicks = 2; // Number of clicks required for the first cycle
const multiplicatorFactor = 3; // Multiplicator factor for subsequent cycles
let requiredClicks = initialRequiredClicks;
let clickCount = 0;

// Function to add the class
function addDisplayClass() {
  popupContainer.classList.add('display-1');
}

// Function to remove the class
function removeDisplayClass() {
  popupContainer.classList.remove('display-1');
  clickCount = 0; // Reset clickCount to 0
  requiredClicks *= multiplicatorFactor; // Update requiredClicks with the multiplicator factor
}

// Add event listeners to each asana container
asanaContainers.forEach(asanaContainer => {
  asanaContainer.addEventListener('click', () => {
    if (clickCount < requiredClicks) {
      clickCount++;
    }

    // Check if the required number of clicks is reached
    if (clickCount === requiredClicks) {
      addDisplayClass();
    }
  });
});

// Add event listener to close the popup
closePopup.addEventListener('click', () => {
  removeDisplayClass();
});
