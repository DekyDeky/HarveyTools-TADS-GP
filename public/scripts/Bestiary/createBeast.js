import { fetchData } from "../Helpers/fetch.js";

console.log('arquivo carregado');


const form = document.getElementById('beastForm');

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const createBeast = await fetchData(form, '/criarBestaPOST', formData);

    if(createBeast.type === 'success'){
        window.location.href = createBeast.link;
    }else {
        console.log(createBeast);
    }

})