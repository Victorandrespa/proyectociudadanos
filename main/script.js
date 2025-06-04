document.addEventListener('DOMContentLoaded', function () {
    
    let seleccionTabla = document.getElementById("dropTabla");
    let items = document.getElementsByClassName('dropdown-item');
    let titulo = document.getElementById("tituloTabla");
    let btnMostrar = document.getElementById("btn_mostrar");
    let valorTabla = "";

    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            let selectedText = this.textContent;
            seleccionTabla.textContent = selectedText;
            valorTabla = selectedText;
        });
    }

    btnMostrar.addEventListener('click', function () {
        //alert(valorTabla);
        tituloTabla.textContent = valorTabla;
        let tablaNA = document.getElementById("tablaNivelesAcademicos");
        let tablaDepto = document.getElementById("tablaDeptos");
        let tablaMuni = document.getElementById("tablaMuni");
        let tablaRegion = document.getElementById("tablaRegion");
        let tablaCiudadanos = document.getElementById("tablaCiudadanos");


        if (valorTabla == "Ciudadanos") {
            tablaCiudadanos.classList.remove("d-none");
        } else if (valorTabla == "Departamentos"){
            tablaDepto.classList.remove("d-none");
        }else if (valorTabla == "Municipios"){
            tablaMuni.classList.remove("d-none");
        }else if (valorTabla == "Niveles Academicos"){
            tablaNA.classList.remove("d-none");
        }else if (valorTabla == "Regiones"){
            tablaRegion.classList.remove("d-none");
        }
    });
});
