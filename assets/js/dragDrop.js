$('.list-group').sortable({
    forcePlaceholderSize: true,
    connectWith: '.list-group',
    revert: "true",
    stop: function () {

        $('[id^=task_]').each(function() {
            let taskId = ($(this).attr('id').split('_')[1]);
            let listId = ($(this).parent().parent().attr('id').split('_')[1]);
            let pos = ($(this).index());

            $.get(`../../index.php?task=${taskId}&list=${listId}&pos=${pos}`, function(data){
                data;
            });
        });
    }
});

$('#lists').sortable({
    forcePlaceholderSize: true,
    tolerance: "pointer",
    stop: function (ui) {
        let listId = (ui.item.attr('id').split('_')[1]);
        let pos = (ui.item.index());

        $.get(`../../index.php?list=${listId}&pos=${pos}`, function(data){
                data;
            });
    }
});