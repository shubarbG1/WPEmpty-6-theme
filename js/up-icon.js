// Make the Nav Sticky
const nav = document.querySelector(".up-button");
const sectionOne = document.querySelector(".hero-section");

const sectionOneOptions = {
  rootMargin: "600px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
  entries,
  sectionOneObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      nav.classList.add("sticky");
    } else {
      nav.classList.remove("sticky");
    }
    
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);



