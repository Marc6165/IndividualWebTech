document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('live-search');
    let debounceTimeout;

    searchInput.addEventListener('input', function(event) {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            const searchText = event.target.value.trim();
            if (searchText.length > 2) {
                fetch('/search?query=' + encodeURIComponent(searchText))
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Handle the search results
                        // This is where you update your UI with the search results
                        console.log(data); // Replace this with actual UI update logic
                    })
                    .catch(error => {
                        console.error('Error during fetch:', error);
                        // Handle any errors here, such as displaying a message to the user
                    });
            }
        }, 300); // 300 milliseconds debounce time
    });
});
