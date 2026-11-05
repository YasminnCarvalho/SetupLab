
document.addEventListener('DOMContentLoaded', () => {

    const search = document.getElementById('component-search');
    const filter = document.getElementById('category-filter');

    const cards = document.querySelectorAll('.catalog-card');
    const empty = document.getElementById('catalog-empty');

    function updateCatalog() {

        const term = search.value
            .trim()
            .toLocaleLowerCase('pt-BR');

        const category = filter.value;

        let visible = 0;

        cards.forEach(card => {

            const name = card.dataset.name;
            const cardCategory = card.dataset.category;

            const matchesName = name.includes(term);

            const matchesCategory =
                !category || cardCategory === category;

            const show = matchesName && matchesCategory;

            card.hidden = !show;

            if (show) {
                visible++;
            }

        });

        empty.hidden = visible > 0;
    }

    search.addEventListener('input', updateCatalog);
    filter.addEventListener('change', updateCatalog);

});
