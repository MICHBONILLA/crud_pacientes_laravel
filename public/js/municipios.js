function cargarMunicipios(departamentoId, municipioSeleccionado = null) {
    const municipioSelect = document.getElementById("municipio");

    if (!departamentoId || !municipioSelect) return;

    fetch(`/municipios/${departamentoId}`)
        .then((res) => {
            if (!res.ok) throw new Error("Error al cargar municipios");
            return res.json();
        })
        .then((municipios) => {
            municipioSelect.innerHTML = '<option value="">Seleccione</option>';

            municipios.forEach((municipio) => {
                const option = document.createElement("option");
                option.value = municipio.id;
                option.textContent = municipio.nombre;

                if (municipio.id == municipioSeleccionado) {
                    option.selected = true;
                }

                municipioSelect.appendChild(option);
            });
        })
        .catch((error) => {
            console.error("Error al cargar municipios:", error);
            municipioSelect.innerHTML =
                '<option value="">Error al cargar municipios</option>';
        });
}

function inicializarMunicipios() {
    const departamentoSelect = document.getElementById("departamento");
    const municipioSelect = document.getElementById("municipio");

    if (!departamentoSelect || !municipioSelect) return;

    // Obtiene el municipio actual desde el data attribute
    const municipioActual = municipioSelect.dataset.municipioActual;

    // Carga municipios al iniciar si hay un departamento seleccionado
    const departamentoId = departamentoSelect.value;
    if (departamentoId) {
        cargarMunicipios(departamentoId, municipioActual);
    }

    // Listener para cambios en el departamento
    departamentoSelect.addEventListener("change", function () {
        cargarMunicipios(this.value);
    });
}

// Inicializar cuando el DOM esté listo
window.addEventListener("load", inicializarMunicipios);
