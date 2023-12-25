document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('live-search');
    const suggestionsContainer = document.getElementById('suggestions-container');

    let debounceTimeout;

    searchInput.addEventListener('input', function(event) {
        const searchText = event.target.value.trim();

        if (searchText.length === 0) {
            suggestionsContainer.innerHTML = '';
            return;
        }

        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            const searchText = event.target.value.trim();
            if (searchText.length > 2) {
                fetch('/search?query=' + encodeURIComponent(searchText))
                    .then(response => response.json())
                    .then(data => {
                        displaySuggestions(data);
                    })
                    .catch(error => console.error('Error:', error));
            }
        }, 300);
    });

    function displaySuggestions(data) {
        const suggestionsContainer = document.getElementById('suggestions-container');
        suggestionsContainer.innerHTML = '';

        data.forEach(product => {
            const suggestion = document.createElement('a');
            suggestion.textContent = product.name;
            suggestion.href = '/productPage?product_id=' + product.id;

            suggestion.classList.add('block', 'p-2', 'hover:bg-gray-100', 'text-gray-800');

            suggestionsContainer.appendChild(suggestion);
        });
    }
});
