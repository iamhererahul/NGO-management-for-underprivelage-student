document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector(".search-bar input");
  const cards = document.querySelectorAll(".card");

  searchInput.addEventListener("input", function () {
    const searchTerm = searchInput.value.trim().toLowerCase();

    cards.forEach(function (card) {
      const title = card.querySelector("h3").textContent.toLowerCase();
      const description = card.querySelector("p").textContent.toLowerCase();

      if (title.includes(searchTerm) || description.includes(searchTerm)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });
});
