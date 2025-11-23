window.onload = function(){
    var todos = document.getElementsByClassName('todo');
    todos.map(todo=>{
        var id = parseInt(todo.id);
        fetch("doneTodo.php",{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'ville='.encodeURIComponent(id)
        }).then(response=>{
            if(!response.ok){
                throw new Error("Erreur lors de l'envoie de la donnée");
            }else{
                response.json();
            }
        }).then(data =>{
            if (data.done == 1){
                todo.classList.add('fait');
            }else{
                todo.classList.add('nonfait');
            }
        }).catch(error=>{
            console.log('erreur: '.error);
        }
        )
    });
}