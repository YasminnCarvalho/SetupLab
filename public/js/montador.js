
document.addEventListener('DOMContentLoaded', () => {
    const selected = {};

    const categories = document.querySelectorAll('.config-category');
    const options = document.querySelectorAll('.component-option');

    const pickerTitle = document.getElementById('picker-title');
    const setupItems = document.getElementById('setup-items');
    const setupTotal = document.getElementById('setup-total');
    const saveButton = document.getElementById('save-setup');
    const saveFeedback = document.getElementById('save-feedback');

    const labels = {
        'gabinete': 'Gabinete',
        'processador': 'Processador',
        'placa-mae': 'Placa-mãe',
        'memoria': 'Memória RAM',
        'placa-video': 'Placa de vídeo',
        'ssd': 'SSD / Armazenamento',
        'fonte': 'Fonte de alimentação',
        'fans': 'Fans / Ventoinhas'
    };

    const visualCategories = [
        'placa-mae',
        'processador',
        'memoria',
        'placa-video',
        'ssd',
        'fonte',
        'fans'
    ];

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

        if (pickerTitle) {
            pickerTitle.textContent =
                'Escolha: ' + (labels[category] || category);
        }
    }

    function updatePreview() {
        visualCategories.forEach(category => {
            const layer = document.getElementById('layer-' + category);

            if (!layer) return;

            layer.hidden = !selected[category];
        });
    }

    function updateSummary() {
        if (!setupItems || !setupTotal) return;

        setupItems.replaceChildren();

        let total = 0;

        Object.entries(selected).forEach(([category, part]) => {
            total += part.price;

            const item = document.createElement('div');
            item.className = 'setup-item';

            const details = document.createElement('div');

            const title = document.createElement('small');
            title.textContent = labels[category] || category;

            const name = document.createElement('strong');
            name.textContent = part.name;

            details.append(title, name);

            const remove = document.createElement('button');
            remove.type = 'button';
            remove.textContent = '×';

            remove.setAttribute(
                'aria-label',
                'Remover ' + part.name
            );

            remove.addEventListener('click', () => {
                delete selected[category];
                updateSummary();
                updatePreview();
            });

            item.append(details, remove);
            setupItems.appendChild(item);
        });

        if (Object.keys(selected).length === 0) {
            const empty = document.createElement('p');
            empty.textContent = 'Nenhum componente selecionado.';
            setupItems.appendChild(empty);
        }

        setupTotal.textContent = money(total);

        categories.forEach(button => {
            const category = button.dataset.category;
            const checked = Boolean(selected[category]);

            const indicator = button.querySelector('.category-check');

            if (indicator) {
                indicator.textContent = checked ? '✓' : '+';
            }
        });

        options.forEach(option => {
            const category = option.dataset.category;
            const part = selected[category];

            option.classList.toggle(
                'selected',
                Boolean(
                    part &&
                    part.id === Number(option.dataset.id)
                )
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

    if (saveButton && saveFeedback) {
        saveButton.addEventListener('click', () => {
            if (Object.keys(selected).length === 0) {
                saveFeedback.textContent =
                    'Selecione pelo menos um componente.';
                return;
            }

            saveFeedback.textContent =
                'O salvamento no banco de dados será implementado em breve.';
        });
    }

    chooseCategory('processador');
    updateSummary();
    updatePreview();
});
