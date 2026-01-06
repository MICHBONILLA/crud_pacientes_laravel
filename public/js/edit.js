// Previsualización de imagen para formulario de creación
function previsualizacionImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previsualizacion');
    const previewNueva = document.getElementById('previsualizacion-nueva');
    const previewActual = document.getElementById('previsualizacion-actual');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Para create.blade.php (solo previsualizacion)
            if (preview) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            // Para edit.blade.php (previsualizacion-nueva y previsualizacion-actual)
            if (previewNueva) {
                previewNueva.src = e.target.result;
                previewNueva.style.display = 'block';
                if (previewActual) {
                    previewActual.style.display = 'none';
                }
            }
        }
        reader.readAsDataURL(file);
    }
}
