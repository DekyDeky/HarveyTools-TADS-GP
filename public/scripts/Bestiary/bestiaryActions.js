import { simpleFetch } from "../Helpers/fetch.js";

console.log('arquivo carregado');

const urlParams = new URLSearchParams(window.location.search);
const idCamp = urlParams.get('id'); 

document.addEventListener('click', async (event) => {
  if (event.target.classList.contains('deleteCreate')) {
    console.log('FAAA');

    const id = event.target.dataset.id;
    
    const allIDs = JSON.stringify({
        "idCamp" : idCamp,
        "idBeast" : id
    });

    const result = await simpleFetch('/deletarBestaPOST', allIDs);

    if(result.type === 'success'){
        window.location.reload();
    }else {
        console.log(result);
    }
  }
});

/*
form.addEventListener("submit", async (e) => {

    e.preventDefault();

    const formData = new FormData(form);

    const createBeast = await fetchData(form, '/criarBestaPOST', formData);

    if(createBeast.type === 'success'){
        window.location.href = createBeast.link;
    }else {
        console.log(createBeast);
    }

})*/