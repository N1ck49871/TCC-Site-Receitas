const alterDataButton = document.getElementById('alterDataButton');


alterDataButton.addEventListener('click', () => {
    const inputs = document.querySelectorAll('input');

    for (const input of inputs) {
        input.removeAttribute("disabled");
    }

});