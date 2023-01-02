if ($('#myModal').length != 0) {
    let myModal = new bootstrap.Modal($('#myModal'));
    
    if(myModal) {
        $('.btn-block').click((e) => {
            let modalTitle = document.getElementById('myModal').querySelector('.modal-title');
            modalTitle.textContent = 'Add a ' + ((e.target.getAttribute('data-bs-whatever') == "list") ? "task" : "list");
            myModal.toggle();
        })
    }
}