import { fetchData } from "../Helpers/fetch.js";

const form = document.getElementById('cadastroForm');

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const criarUsuario = await fetchData(form, '/cadastrarUsuario', formData);

    if(criarUsuario.tipo === 'sucesso'){
        window.location.href = criarUsuario.link;
    }else {
        console.log(criarUsuario);
    }

})