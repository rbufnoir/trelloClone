(function () {
    let modal = document.getElementById('myModal');
    let bModal;

    if (modal)
        bModal = new bootstrap.Modal(modal);

    if (bModal) {
        let board = document.querySelector('[id^=board_]');
        board.addEventListener('click', (e) => {
            let elemClicked = {
                target: e.target,
                target_type: e.target.id.split('_')[0],
                target_id: e.target.id.split('_')[1],
                parent_type: e.target.parentElement.parentElement.id.split('_')[0],
                parent_id: e.target.parentElement.parentElement.id.split('_')[1],
                board_id: board.id.split('_')[1]
            };
            switch (elemClicked.target.nodeName) {
                case 'A':
                    if (elemClicked.target_type == 'l')
                        displayModal(bModal, 'Modify your list', elemClicked);
                    else
                        displayModal(bModal, 'Modify your task', elemClicked);
                    break;
                case 'BUTTON':
                    if (elemClicked.target_type == 'addList')
                        displayModal(bModal, 'Add a list', elemClicked);
                    else if (elemClicked.target_type == 'addCard')
                        displayModal(bModal, 'Add a card', elemClicked);
                    else if (elemClicked.target_type == 'updatedL')    
                        displayModal(bModal, 'Add a card', elemClicked);
                    break;
            }
        });
    }

    function displayModal(modal, text, elemClicked) {
        let modalTitle = document.getElementsByClassName('modal-title')[0];
        let modalValue = document.getElementsByTagName('input')[0];
        let sendButton = document.getElementById('sendData');
        let deleteButton = document.getElementById('deleteTask');

        modalTitle.textContent = text;
        modalValue.value = elemClicked.target.innerText;

        var sendDataOnClick = function () {
            sendData(elemClicked, modalValue.value);
        };
        var removeData = function () {
            sendData(elemClicked, 'delete');
        };

        sendButton.addEventListener('click', sendDataOnClick);
        deleteButton.addEventListener('click', removeData);

        document.getElementById('myModal').addEventListener('hide.bs.modal', () => {
            sendButton.removeEventListener('click', sendDataOnClick);
            deleteButton.removeEventListener('click', removeData);
        });

        if (elemClicked.target.nodeName == 'A' && deleteButton.classList.contains('d-none'))
            deleteButton.classList.toggle('d-none');
        else if (elemClicked.target.nodeName != 'A' && !deleteButton.classList.contains('d-none'))
            deleteButton.classList.toggle('d-none');

        modal.toggle();
    }

    function sendData(info, data) {
        console.log(info.target_type, info.board_id, info.parent_id, info.target_id, data);
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (info.target_type == 'addCard')
                    createCard(info.parent_id, this.responseText, data);
                else if (info.target_type == 'addList')
                    createList(this.responseText, data);
                else if (info.target_type == 'task') {
                    if (data == "delete")
                        document.getElementById('task_' + info.target_id).remove();
                    else
                        document.getElementById('task_' + info.target_id).innerText = data;
                }
                else if (info.target_type == 'updateList') {
                    if (data == 'delete')
                        document.getElementById('list_'+info.target_id).remove();
                    else 
                        document.getElementById('updateList_'+info.target_id).innerText = data;
                }
                bModal.hide();
            }
        };

        xmlhttp.open("GET", `../../index.php?type=${info.target_type}&board=${info.board_id}&list=${info.parent_id}&task=${info.target_id}&data=${data}`, true);
        xmlhttp.send();
    }

    function createCard(parentId, id, name) {
        console.log(parentId, id);
        let newCard = document.createElement('a');
        newCard.setAttribute('id', 'task_' + id);
        newCard.setAttribute('class', 'list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3');
        newCard.innerHTML = name;

        document.getElementById('list_' + parentId).children[1].appendChild(newCard);
    }

    function createList(id, name) {
        let newList = document.createElement('div');
        newList.setAttribute('id', 'list_' + id);
        newList.setAttribute('class', 'card shadow-1-strong m-3 p-2 pb-0 list');
        newList.innerHTML =
            `<div class="card-header d-flex justify-content-between pl-1 pr-0 mb-3 border-0">
                <a id="updateList${id}" class="mb-0">${name}</p>
                <button type="button" class="btn btn-link text-reset m-0 py-0 px-2">
                    <i class="list-popover fas fa-ellipsis-h" data-bs-toggle="popover"></i>
                </button>
            </div>

            <div class="list-group list-group-flush">
            </div>
            <div class="card-footer border-0 pt-0">
                <button id="addCard" type="button" class="btn btn-link btn-block text-reset">
                    <i class="fas fa-plus mr-2"></i> Add another card
                </button>
            </div>`;

        let lists = document.getElementById('lists');
        lists.insertBefore(newList, lists.lastChild);
    }
})();

