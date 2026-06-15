import { fetchData } from "../Helpers/fetch.js";

console.log('arquivo carregado');

const form = document.getElementById('beastEditForm');

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const createBeast = await fetchData(form, '/editarBestaPOST', formData);

    if(createBeast.type === 'success'){
        window.location.href = createBeast.link;
    }else {
        console.log(createBeast);
    }

})