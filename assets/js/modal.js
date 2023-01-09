(function () {
    let modal = document.getElementById('myModal');
    let bModal;

    if (modal) 
        bModal = new bootstrap.Modal(modal);

    if (bModal) {
        let board = document.querySelector('[id^=board_]');
        board.addEventListener('click', (e) => {
            let elemClicked = {
                target : e.target,
                target_type : e.target.id.split('_')[0],
                target_id : e.target.id.split('_')[1],
                parent_type : e.target.parentElement.parentElement.id.split('_')[0],
                parent_id : e.target.parentElement.parentElement.id.split('_')[1],
                board_id : board.id.split('_')[1]
            };
            switch (elemClicked.target.nodeName) {
                case 'A':
                    displayModal(bModal, 'Modify your task', elemClicked);
                    break;
                case 'BUTTON':
                    if (elemClicked.target_id == 'addList')
                        displayModal(bModal, 'Add a list', elemClicked);
                    else
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
                // createCard($('#myModal').attr('data-bs-info'), $('#name').val());
                // myModal.hide();
            }
        };

        xmlhttp.open("GET", `../../index.php?type=${info.target_type}&board=${info.board_id}&list=${info.parent_id}&task=${info.target_id}&data=${data}` , true);
        xmlhttp.send();
    }

})();

// if ($('#myModal').length != 0) {
//     let myModal = new bootstrap.Modal($('#myModal'));

//     if (myModal) {
//         $('.btn-block').click((e) => {
//             modal = document.getElementById('myModal');
//             let modalTitle = modal.querySelector('.modal-title');
//             modalTitle.textContent = 'Add a ' + ((e.target.getAttribute('data-bs-whatever') == "list") ? "task" : "list");
//             modal.setAttribute('data-bs-info', e.target.getAttribute('data-bs-info'))
//             myModal.show();
//         })

//     }
// }

// $('#sendData').click(() => {
//     let myModal = bootstrap.Modal.getInstance(document.querySelector('#myModal'));
//     data = $('#myModal').attr('data-bs-info').split('/');
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(typeof this.response);
//             createCard($('#myModal').attr('data-bs-info'), $('#name').val());
//             myModal.hide();
//         }
//     };
//     xmlhttp.open("GET", `../../index.php?user=${data[0]}&board=${data[1]}&list=${data[2]}&task=${$('#name').val()}` , true);
//     xmlhttp.send();
// });

// function createCard(listId, name) {
//     list = document.getElementById(listId);
//     task = document.createElement('a');
//     task.setAttribute('class', "list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3");
//     task.setAttribute('onclick', 'test(this);');
//     task.innerText = name;
//     list.children[1].appendChild(task);
// }