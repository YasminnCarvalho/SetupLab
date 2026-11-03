
document.addEventListener('DOMContentLoaded', () => {
    const selected = {};

    const quantityLimits = {
        memoria: 4,
        ssd: 4,
        hd: 4,
        fans: 2
    };

    const categories = document.querySelectorAll('.config-category');
    const options = document.querySelectorAll('.component-option');
    const layers = document.querySelectorAll('.component-layer');

    const pickerTitle = document.getElementById('picker-title');
    const setupItems = document.getElementById('setup-items');
    const setupTotal = document.getElementById('setup-total');
    const saveButton = document.getElementById('save-setup');
    const saveFeedback = document.getElementById('save-feedback');

    const labels = {
        gabinete: 'Gabinete',
        processador: 'Processador',
        'placa-mae': 'Placa-mãe',
        memoria: 'Memória RAM',
        'placa-video': 'Placa de vídeo',
        ssd: 'SSD / Armazenamento',
        fonte: 'Fonte de alimentação',
        fans: 'Fans / Ventoinhas',
        hd: 'HD / Disco rígido',
        cooler: 'Cooler do processador',
        'water-cooler': 'Water cooler'
    };

    const money = value => value.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });

    function getMaxQuantity(category) {
        return quantityLimits[category] || 1;
    }

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
        layers.forEach(layer => {
            const category = layer.dataset.category;

            if (category === 'fans-lateral') {
                layer.hidden = !selected.fans;
                return;
            }

            if (category === 'fans-topo') {
                layer.hidden =
                    !selected.fans || selected.fans.quantity < 2;
                return;
            }

            const part = selected[category];

            layer.hidden =
                !part ||
                part.id !== Number(layer.dataset.componentId);
        });
    }

    function updateSummary() {
        if (!setupItems || !setupTotal) return;

        setupItems.replaceChildren();

        let total = 0;

        Object.entries(selected).forEach(([category, part]) => {
            total += part.price * part.quantity;

            const item = document.createElement('div');
            item.className = 'setup-item';

            const details = document.createElement('div');

            const title = document.createElement('small');
            title.textContent = labels[category] || category;

            const name = document.createElement('strong');
            name.textContent = part.name;

            details.append(title, name);

            if (getMaxQuantity(category) > 1) {
                const quantity = document.createElement('div');
                quantity.className = 'setup-quantity';

                const decrease = document.createElement('button');
                decrease.type = 'button';
                decrease.textContent = '−';
                decrease.disabled = part.quantity <= 1;

                const count = document.createElement('span');
                count.textContent = part.quantity;

                const increase = document.createElement('button');
                increase.type = 'button';
                increase.textContent = '+';
                increase.disabled =
                    part.quantity >= getMaxQuantity(category);

                decrease.addEventListener('click', () => {
                    if (part.quantity > 1) {
                        part.quantity--;
                        updateSummary();
                        updatePreview();
                    }
                });

                increase.addEventListener('click', () => {
                    if (part.quantity < getMaxQuantity(category)) {
                        part.quantity++;
                        updateSummary();
                        updatePreview();
                    }
                });

                quantity.append(decrease, count, increase);
                details.appendChild(quantity);
            }

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
            const part = selected[option.dataset.category];

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

            if (category === 'cooler') {
                delete selected['water-cooler'];
            }

            if (category === 'water-cooler') {
                delete selected.cooler;
            }

            selected[category] = {
                id: Number(option.dataset.id),
                name: option.dataset.name,
                price: Number(option.dataset.price),
                quantity: 1
            };

            updateSummary();
            updatePreview();
        });
    });

 
if (saveButton && saveFeedback) {
    saveButton.addEventListener('click', async () => {
        if (Object.keys(selected).length === 0) {
            saveFeedback.textContent = 'Selecione pelo menos um componente.';
            return;
        }

const nameInput = document.getElementById('setup-name');
const nome = nameInput.value.trim();

if (!nome) {
    saveFeedback.textContent = 'Informe um nome para a montagem.';
    nameInput.focus();
    return;
}

        const componentes = Object.values(selected).map(part => ({
            id: part.id,
            quantidade: part.quantity
        }));

        saveButton.disabled = true;
        saveFeedback.textContent = 'Salvando montagem...';

        try {
            const response = await fetch(saveButton.dataset.saveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'same-origin',
                body: JSON.stringify({
                    nome: nome.trim(),
                    componentes
                })
            });

            if (response.status === 401) {
                saveFeedback.textContent = 'Faça login para salvar sua montagem.';
                return;
            }

            const resultado = await response.json();

            if (!response.ok) {
                saveFeedback.textContent =
                    resultado.message || 'Não foi possível salvar a montagem.';
                return;
            }

            saveFeedback.textContent = resultado.message;
        } catch (error) {
            saveFeedback.textContent = 'Erro de conexão ao salvar a montagem.';
        } finally {
            saveButton.disabled = false;
        }
    });
}


    chooseCategory('processador');
    updateSummary();
    updatePreview();
});
