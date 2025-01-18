document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity');
    const totalItems = document.querySelectorAll('.total-item');
    const subtotalElement = document.getElementById('subtotal');
    const cartItems = document.getElementById('cart-items');

    function updateCart() {
        let subtotal = 0;
        const items = cartItems.querySelectorAll('tr');
        items.forEach((item, index) => {
            const price = parseFloat(item.querySelector('.quantity').getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('.quantity').value);
            const total = price * quantity;
            item.querySelector('.total-item').innerText = `$${total.toFixed(2)}`;
            subtotal += total;
        });
        subtotalElement.innerText = `$${subtotal.toFixed(2)}`;
    }

    function removeItem(event) {
        const row = event.target.closest('tr');
        row.remove();
        updateCart();
    }

    function addToCart(name, price) {
        const existingItem = [...cartItems.querySelectorAll('tr')].find(item => item.querySelector('td').innerText === name);
        if (existingItem) {
            const quantityInput = existingItem.querySelector('.quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        } else {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${name}</td>
                <td>$${price}</td>
                <td><input type="number" value="1" min="1" class="quantity" data-price="${price}"></td>
                <td class="total-item">$${price}</td>
                <td><button class="remove-btn">X</button></td>
            `;
            cartItems.appendChild(newRow);

            newRow.querySelector('.remove-btn').addEventListener('click', removeItem);
            newRow.querySelector('.quantity').addEventListener('change', updateCart);
        }

        updateCart();
    }

    // Función para redirigir a principal.php
    document.querySelector('.continue-shopping-btn').addEventListener('click', function() {
        window.location.href = 'principal.php';
    });

    function translateToSpanish() {
        document.querySelector('.cart-section h1').innerText = 'Charuuagames - Carrito de Compras';
        document.querySelectorAll('.cart-table th')[0].innerText = 'Título del Juego';
        document.querySelectorAll('.cart-table th')[1].innerText = 'Precio Unitario';
        document.querySelectorAll('.cart-table th')[2].innerText = 'Cantidad';
        document.querySelectorAll('.cart-table th')[3].innerText = 'Total';
        document.querySelector('.continue-shopping-btn').innerText = 'Seguir Comprando';
        document.querySelector('.clear-cart-btn').innerText = 'Vaciar Carrito';
        document.querySelector('.checkout-btn').innerText = 'Ordenar Ahora';
        document.querySelector('.discount-section h2').innerText = 'Aplicar Descuentos';
        document.querySelector('.discount-section input').setAttribute('placeholder', 'Ingrese su código de cupón');
        document.querySelector('.discount-section button').innerText = 'Aplicar';
        document.querySelector('.discount-info').innerText = '¡Obtén un 10% de descuento en pedidos superiores a $100!';
        document.querySelector('.related-products h2').innerText = 'Ofertas Especiales y Juegos Relacionados';
        document.querySelectorAll('.product button').forEach(button => button.innerText = 'Agregar al Carrito');
    }

    function translateToEnglish() {
        document.querySelector('.cart-section h1').innerText = 'Charuuagames - Shopping Cart';
        document.querySelectorAll('.cart-table th')[0].innerText = 'Game Title';
        document.querySelectorAll('.cart-table th')[1].innerText = 'Unit Price';
        document.querySelectorAll('.cart-table th')[2].innerText = 'Quantity';
        document.querySelectorAll('.cart-table th')[3].innerText = 'Total';
        document.querySelector('.continue-shopping-btn').innerText = 'Continue Shopping';
        document.querySelector('.clear-cart-btn').innerText = 'Clear Shopping Cart';
        document.querySelector('.checkout-btn').innerText = 'Order Now';
        document.querySelector('.discount-section h2').innerText = 'Apply Discounts';
        document.querySelector('.discount-section input').setAttribute('placeholder', 'Enter your coupon code');
        document.querySelector('.discount-section button').innerText = 'Apply';
        document.querySelector('.discount-info').innerText = 'Get 10% off on orders above $100!';
        document.querySelector('.related-products h2').innerText = 'Special Offers and Related Games';
        document.querySelectorAll('.product button').forEach(button => button.innerText = 'Add to Cart');
    }

    document.querySelectorAll('.language-btn').forEach(button => {
        button.addEventListener('click', function() {
            if (button.id === 'es') {
                translateToSpanish();
                document.querySelector('#en').classList.remove('active');
                document.querySelector('#es').classList.add('active');
            } else {
                translateToEnglish();
                document.querySelector('#es').classList.remove('active');
                document.querySelector('#en').classList.add('active');
            }
        });
    });

    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', removeItem);
    });

    quantityInputs.forEach(input => {
        input.addEventListener('change', updateCart);
    });

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-name');
            const price = parseFloat(button.getAttribute('data-price'));
            addToCart(name, price);
        });
    });

    updateCart(); 
});
