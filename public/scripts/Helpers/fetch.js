export async function fetchData(form, url, formdata) {

    if(form.dataset.editMode !== 'true') {
        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formdata
            });

            const data = await response.json();

            if(data.type === 'success') {
                return data;
            }else {
                return data;
            }
        }catch (err) {
            console.error("Erro ao enviar formulário", err);
            return false;
        }
    
    }

    return false;
}