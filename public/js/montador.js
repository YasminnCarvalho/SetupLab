
document.addEventListener('DOMContentLoaded', () => {
    const selected = {};
    const categories = document.querySelectorAll('.config-category');
    const options = document.querySelectorAll('.component-option');

    const labels = {
        'processador': 'Processador',
        'placa-mae': 'Placa-mãe',
        'memoria': 'Memória RAM',
        'placa-video': 'Placa de vídeo'
    };

    const money = value => value.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });

    function chooseCategory(category) {
        categories.forEach(button => {
            button.classList.toggle(
                'active',
                button.dataset.category === category
            );
        });

        options.forEach(option => {
            option.hidden = option.dataset.category !== category;
        });

        document.getElementById('picker-title').textContent =
            'Escolha: ' + labels[category];
    }

    function updatePreview() {
        Object.keys(labels).forEach(category => {
            const layer = document.getElementById('layer-' + category);

            if (layer) {
                layer.hidden = !selected[category];
            }
        });
    }

    function updateSummary() {
        const container = document.getElementById('setup-items');
        container.replaceChildren();

        let total = 0;

        Object.entries(selected).forEach(([category, part]) => {
            total += part.price;

            const item = document.createElement('div');
            item.className = 'setup-item';

            const details = document.createElement('div');
            const title = document.createElement('small');
            title.textContent = labels[category];

            const name = document.createElement('strong');
            name.textContent = part.name;

            details.append(title, name);

            const remove = document.createElement('button');
            remove.type = 'button';
            remove.textContent = '×';
            remove.setAttribute('aria-label', 'Remover ' + part.name);

            remove.addEventListener('click', () => {
                delete selected[category];
                updateSummary();
                updatePreview();
            });

            item.append(details, remove);
            container.appendChild(item);
        });

        if (Object.keys(selected).length === 0) {
            const empty = document.createElement('p');
            empty.textContent = 'Nenhum componente selecionado.';
            container.appendChild(empty);
        }

        document.getElementById('setup-total').textContent = money(total);

        categories.forEach(button => {
            const checked = Boolean(selected[button.dataset.category]);
            button.querySelector('.category-check').textContent =
                checked ? '✓' : '+';
        });

        options.forEach(option => {
            const part = selected[option.dataset.category];
            option.classList.toggle(
                'selected',
                Boolean(part && part.id === Number(option.dataset.id))
            );
        });
    }

    categories.forEach(button => {
        button.addEventListener('click', () => {
            chooseCategory(button.dataset.category);
        });
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            const category = option.dataset.category;

            selected[category] = {
                id: Number(option.dataset.id),
                name: option.dataset.name,
                price: Number(option.dataset.price)
            };

            updateSummary();
            updatePreview();
        });
    });

    document.getElementById('save-setup').addEventListener('click', () => {
        document.getElementById('save-feedback').textContent =
            'O salvamento no banco será implementado na próxima etapa.';
    });

    chooseCategory('processador');
    updateSummary();
    updatePreview();
});
