function searchProducts() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const products = document.querySelectorAll('.videojuego');

    products.forEach(product => {
        const productName = product.querySelector('h2').textContent.toLowerCase();
        
        // Mostrar u ocultar según coincidencia con el texto ingresado
        if (productName.startsWith(input)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}
