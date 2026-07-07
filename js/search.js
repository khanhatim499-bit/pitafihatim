const searchInput = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");

function displayResults(results) {

    if (results.length === 0) {

        searchResults.innerHTML = `
        <div class="card">
            <h3>No Results Found</h3>
            <p>Try searching with different keywords.</p>
        </div>
        `;
        return;
    }

    let html = "";

    results.forEach(article => {

        html += `
        <div class="card search-card">

            <span class="badge">${article.category}</span>

            <h3>${article.title}</h3>

            <p>${article.description}</p>

            <a href="${article.url}" class="btn">
                Open Article →
            </a>

        </div>
        `;

    });

    searchResults.innerHTML = html;

}

displayResults(articles);

searchInput.addEventListener("keyup", function () {

    const keyword = this.value.toLowerCase().trim();

    const filtered = articles.filter(article =>

        article.title.toLowerCase().includes(keyword) ||

        article.description.toLowerCase().includes(keyword) ||

        article.category.toLowerCase().includes(keyword)

    );

    displayResults(filtered);

});
