// Manejar la actualización de cantidad de productos
productosContainer.addEventListener("click", function (event) {
    const target = event.target;
    const productoId = parseInt(target.dataset.id);
    const producto = carrito.find(item => item.id === productoId);

    // Verificar si el usuario está logueado antes de permitir la acción
    if (!usuarioLogueado) {
        alert("Debes iniciar sesión para agregar productos al carrito.");
        return;
    }

    if (target.classList.contains("boton-sumar")) {
        producto.cantidad += 1;
        localStorage.setItem("carrito", JSON.stringify(carrito));
        renderizarCarrito();
    } else if (target.classList.contains("boton-restar")) {
        if (producto.cantidad > 1) {
            producto.cantidad -= 1;
            localStorage.setItem("carrito", JSON.stringify(carrito));
            renderizarCarrito();
        }
    } else if (target.classList.contains("eliminar")) {
        eliminarProducto(productoId); // Llamar a la función para eliminar
    }
});

// Función para eliminar producto
function eliminarProducto(productoId) {
    // Filtrar el carrito para eliminar el producto
    carrito = carrito.filter(item => item.id !== productoId);

    // Actualizar localStorage y volver a renderizar
    localStorage.setItem("carrito", JSON.stringify(carrito));
    renderizarCarrito();
}
