import { fetchData } from "../Helpers/fetch.js";

const form = document.getElementById('loginForm');

form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const loginUser = await fetchData(form, '/logarUsuario', formData);

    if(loginUser.type === 'success'){
        window.location.href = loginUser.link;
    }else {
        console.log(loginUser);
    }

})