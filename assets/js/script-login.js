var input = document.querySelector('.pswrd');
var show = document.querySelector('.show');

show.addEventListener('click', active); //Quando o elemento com a classe show for clicado, ele irá mostrar o span */

function active() {
    if(input.type === "password") { //Se o tipo do input for password, troque o input para texto quando chamar a função
        input.type = "text";
        show.textContent = "visibility_off";
        show.style.color = "#1DA1F2";
    } else { //Se o tipo do input não for password, troque o tipo do input para password
        input.type = "password";
        show.textContent = "visibility"; /* Troque o texto do span para "show";*/
        show.style.color = "#111"; /* Troque a cor do texto do span */
    }
}
