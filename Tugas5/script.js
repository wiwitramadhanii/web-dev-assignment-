const inputItem = document.getElementById("input-item");
const buttonAddItem = document.getElementById("button-add-item");
const listContainer = document.querySelector('.list');
const items = new Map();

buttonAddItem.addEventListener('click', (event) => {
    const item = inputItem.value;

    const listItem = document.createElement('li');
    const textItem = document.createElement('p');
    const buttonDelete = document.createElement('button');

    if (item === '') {
        inputItem.focus();
        return;
    }
    if (items.has(item)) {
        inputItem.focus();
        inputItem.value = '';
        return;
    }
    
        listItem.classList.add('list-item');
        buttonDelete.textContent = 'Delete';
        textItem.textContent = item;

        listItem.append(textItem, buttonDelete);
        listContainer.appendChild(listItem);

    buttonDelete.addEventListener('click', () => {
        listContainer.removeChild(listItem);
    });
    inputItem.value = '';
    inputItem.focus();
});