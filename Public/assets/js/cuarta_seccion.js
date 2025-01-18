// Función para obtener nuevos productos
function obtenerProductos() {
    const productosDiv = document.getElementById('productos');

    // Aplicamos la clase 'hidden' para iniciar la transición
    productosDiv.classList.add('hidden');

    // Hacemos una solicitud a la misma página para obtener nuevos productos
    fetch(window.location.href)
        .then(response => response.text())
        .then(data => {
            // Buscamos el nuevo contenido para los productos
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const nuevosProductos = doc.getElementById('productos');
            productosDiv.innerHTML = nuevosProductos.innerHTML;

            // Esperamos un breve momento y luego removemos la clase 'hidden' para mostrar la nueva sección
            setTimeout(() => {
                productosDiv.classList.remove('hidden');
            }, 50); // Un pequeño retraso para permitir que el contenido se actualice
        })
        .catch(error => console.error('Error al obtener productos:', error));
}

// Cambia los productos cada 5 segundos
setInterval(obtenerProductos, 12000);
