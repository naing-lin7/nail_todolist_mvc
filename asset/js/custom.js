$(document).ready(function(){
    //add todo list
    $('#add').click(function(){
        var desc = $('#desc').val();
        if(desc != ''){
            //sample ajax
            $.get('/php_oop_pdo/todo/add?desc='+desc+'&add=true').done(function(e){
                alert('Success');
                window.location.reload();
            })
        }else{
            alert('Please type todo');
        }
    })

    $(document).on('change', '.task-check', function(){
        var id = $(this).data('id');
        if(id != ''){
            $.get('/php_oop_pdo/todo/status/update?id='+id+'&update=true').done(function(e){
                alert("Success");
                window.location.reload();
            })
        }else{
            alert('Something with wrong.');
        }
    })

    $(document).on('click', '.remove', function(){
        var id = $(this).data('id');
        if(id != ''){
            $.get('/php_oop_pdo/todo/delete?id='+id+'&delete=true').done(function(e){
                alert('Success');
                window.location.reload();
            })
        }else{
            alert('Something with wrong.')
        }
    })
})