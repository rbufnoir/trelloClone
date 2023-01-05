if ($('#myModal').length != 0) {
    let myModal = new bootstrap.Modal($('#myModal'));

    if (myModal) {
        $('.btn-block').click((e) => {
            modal = document.getElementById('myModal');
            let modalTitle = modal.querySelector('.modal-title');
            modalTitle.textContent = 'Add a ' + ((e.target.getAttribute('data-bs-whatever') == "list") ? "task" : "list");
            console.log(e.target.getAttribute('data-bs-info'));
            modal.setAttribute('data-bs-info', e.target.getAttribute('data-bs-info'))
            myModal.show();
        })

    }
}

$('#sendData').click(() => {
    let myModal = bootstrap.Modal.getInstance(document.querySelector('#myModal'));
    data = $('#myModal').attr('data-bs-info').split('/');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(typeof this.response);
            createCard($('#myModal').attr('data-bs-info'), $('#name').val());
            myModal.hide();
        }
    };
    xmlhttp.open("GET", `../../index.php?user=${data[0]}&board=${data[1]}&list=${data[2]}&task=${$('#name').val()}` , true);
    xmlhttp.send();
});

function createCard(listId, name) {
    list = document.getElementById(listId);
    task = document.createElement('a');
    task.setAttribute('class', "list-group-item list-group-item-action card-body rounded bg-white shadow-2 mb-2 py-3");
    task.setAttribute('onclick', 'test(this);');
    task.innerText = name;
    list.children[1].appendChild(task);
}

function test(e) {
    console.log(e.id);
}