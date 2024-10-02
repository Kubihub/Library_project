const outputDiv = document.getElementById('output');
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');

searchButton.addEventListener('click', function() {
  const searchTerm = searchInput.value;
  outputDiv.textContent = `Searching for "${searchTerm}"...`;
});

searchInput.addEventListener('keyup', function(event) {
  if (event.keyCode === 13) {
    searchButton.click();
  }
});
