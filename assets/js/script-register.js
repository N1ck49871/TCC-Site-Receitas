const show = document.querySelectorAll(".show"); //[show1, show2]
/*
show[0].addEventListener('click', () => console.log('testando'));
show[1].addEventListener('click', () => console.log('testando')); 
*/
const active = ({ target }) => {
    const input = target.previousElementSibling;
    if (input.type === "password") {
        //Se o tipo do input for password, troque o input para texto quando chamar a função
        input.type = "text";
        target.textContent = "visibility_off";
        target.style.color = "#1DA1F2";
    } else {
        //Se o tipo do input não for password, troque o tipo do input para password
        input.type = "password";
        target.textContent = "visibility"; //Troque o texto do span para "show";
        target.style.color = "#111"; //Troque a cor do texto do span
    }
};

show.forEach((elementoShowDoArray) =>elementoShowDoArray.addEventListener("click", active)); // O "show", da função será cada um dos span
