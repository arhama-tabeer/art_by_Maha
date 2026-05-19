<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us - Art by Maha</title>
     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>

    <nav>
        <!-- <a href="home.html"><i class="fa-solid fa-house"></i> Home</a>
        <a href="PopularCollection.html"><i class="fa-solid fa-palette"></i> Popular Collection</a>
        <a href="AbstractPainting.html"><i class="fa-solid fa-brush"></i> Abstract Painting</a>
        <a href="contact.html" class="current-page"><i class="fa-solid fa-envelope"></i> Contact</a>
        <a href="feedback.html"><i class="fa-solid fa-comment"></i> Feedback</a> -->



         <a href="{{ url('/') }}" ><i class="fas fa-home" ></i> Home</a>
    <a href="{{ url('/popular') }}"><i class="fas fa-palette"></i> Popular Collection</a>
    <a href="{{ url('/abstract') }}"><i class="fas fa-brush"></i> Abstract Painting</a>
    <a href="{{ url('/contact') }}" class="current-page"><i class="fas fa-envelope"></i> Contact</a>
    <a href="{{ url('/feedback') }}"><i class="fas fa-comment"></i> Feedback</a>



        <div class="cart-icon" id="cartIcon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </div>
    </nav>

    <div class="contact-container">
        <h2>Get in Touch</h2>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>

        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </div>

    <!-- Cart Menu -->
    <div class="cart-overlay" id="cartOverlay"></div>
    <div class="cart-menu" id="cartMenu">
        <div class="cart-header">
            <h2>Your Cart</h2>
            <button id="closeCart"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Cart items will be added here dynamically -->
        </div>
        <div class="cart-total" id="cartTotal">
            Total: $0.00
        </div>
        <button class="checkout-btn">Proceed to Checkout</button>
    </div>

    <footer>
        <p>&copy; 2025 Art's Gallery | All Rights Reserved</p>
    </footer>

    <script>
        // Cart functionality
        let cart = [];
        const cartIcon = document.getElementById('cartIcon');
        const cartOverlay = document.getElementById('cartOverlay');
        const cartMenu = document.getElementById('cartMenu');
        const closeCart = document.getElementById('closeCart');
        const cartItems = document.getElementById('cartItems');
        const cartCount = document.getElementById('cartCount');
        const cartTotal = document.getElementById('cartTotal');

        // Load cart from localStorage if available
        if (localStorage.getItem('artCart')) {
            cart = JSON.parse(localStorage.getItem('artCart'));
            updateCart();
        }

        // Toggle cart visibility
        cartIcon.addEventListener('click', () => {
            cartMenu.classList.add('open');
            cartOverlay.classList.add('open');
        });

        closeCart.addEventListener('click', () => {
            cartMenu.classList.remove('open');
            cartOverlay.classList.remove('open');
        });

        cartOverlay.addEventListener('click', () => {
            cartMenu.classList.remove('open');
            cartOverlay.classList.remove('open');
        });

        // Function to update cart display
        function updateCart() {
            cartItems.innerHTML = '';
            let total = 0;
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p>Your cart is empty</p>';
            } else {
                cart.forEach(item => {
                    total += item.price * item.quantity;
                    
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-details">
                            <h3>${item.name}</h3>
                            <p>$${item.price.toFixed(2)} x ${item.quantity}</p>
                            <p>$${(item.price * item.quantity).toFixed(2)}</p>
                            <button onclick="removeFromCart('${item.name}')">Remove</button>
                        </div>
                    `;
                    cartItems.appendChild(cartItem);
                });
            }
            
            cartTotal.textContent = `Total: $${total.toFixed(2)}`;
            cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
            
            // Save to localStorage
            localStorage.setItem('artCart', JSON.stringify(cart));
        }

        // Function to remove item from cart
        window.removeFromCart = function(name) {
            const itemIndex = cart.findIndex(item => item.name === name);
            
            if (itemIndex !== -1) {
                cart[itemIndex].quantity -= 1;
                
                if (cart[itemIndex].quantity <= 0) {
                    cart.splice(itemIndex, 1);
                }
                
                updateCart();
            }
        }
    </script>
</body>
</html>