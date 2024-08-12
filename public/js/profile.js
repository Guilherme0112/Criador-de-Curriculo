document.addEventListener('DOMContentLoaded', function(){
    const del = this.querySelector('#delete');
    del.addEventListener('click', function(event){
        var confirmar = confirm('Você realmente deseja apagar esta conta?');
        if(!confirmar){
            event.preventDefault();
        }
    });

});