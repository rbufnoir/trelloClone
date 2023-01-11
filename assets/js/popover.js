(function () {
    $(document).ready(function () {
        $('.list-popover').popover({
            placement: 'right',
            html: true,
            content: function () {
                return $('#popover-content').html()
            }
        })
    });

    document.addEventListener('shown.bs.popover', () => {
        let deleteList = document.getElementsByClassName('test');

        for (i = 0; i < deleteList.length; i++)
            console.log(deleteList[i]);
    })
})();