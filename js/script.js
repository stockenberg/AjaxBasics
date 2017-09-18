function getAndRefresh() {
    $.ajax(
        {
            url: "http://localhost:8000/ajax.php?p=tasks&action=all"
        }
    ).done(function (data) {
        console.log(data);

        var jsonData = JSON.parse(data);
        console.log(jsonData);

        $('tbody').empty();

        for(var i = 0; i < jsonData.length; i++){
            var task = jsonData[i];
            $('tbody').append("<tr>" +
                "<td>" + task.id + "</td>" +
                "<td>" + task.title + "</td>" +
                "<td> " +
                "   <button class='btn' data-id='" + task.id + "' id='complete'>COMPLETE</button> / " + task.closed+
                "</td>" +
                "<td> " +
                "   <button class='btn' data-id='" + task.id + "' id='delete'>DELETE</button>"+
                "</td>" +
                "</tr>");
        }
    });
}

function modify(action) {
    $('body').on('click', '#' + action, function (e) {
        console.dir(e.target.dataset.id);
        var id = e.target.dataset.id;
        $.ajax({
            url: "http://localhost:8000/ajax.php",
            method: "GET",
            data: {"p": "tasks", "action": action, "id": id}
        }).done(function (data){
            console.log(data);
            getAndRefresh();
        });

    })
}

$(document).ready(function () {

    $('#taskLoader').click(function () {
        getAndRefresh();
    });

    $('#addTask').submit(function (e) {
        e.preventDefault();
        var task_title = $(this)[0][0].value;

        $.ajax({
            url: "http://localhost:8000/ajax.php?p=tasks",
            method: "POST",
            data: {'task_title': task_title}
        }).done(function (data){
            console.log(data);
            $('#addTask')[0].reset();
            getAndRefresh();
        })
    });

    modify('complete');
    modify('delete');


});