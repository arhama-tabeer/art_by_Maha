<!DOCTYPE html>
<html lang="en">
<head>
    <title>Art by Maha</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
</head>
<body>
    <header>
        <h1>Welcome to Art By Maha</h1>
    </header>
    
    <nav>
    <a href="{{ url('/') }}" class="current-page"><i class="fas fa-home"></i> Home</a>
    <a href="{{ url('/popular') }}"><i class="fas fa-palette"></i> Popular Collection</a>
    <a href="{{ url('/abstract') }}"><i class="fas fa-brush"></i> Abstract Painting</a>
    <a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    <a href="{{ url('/feedback') }}"><i class="fas fa-comment"></i> Feedback</a>    
    <!-- <a href="home.html" class="current-page"><i class="fas fa-home"></i> Home</a>
        <a href="PopularCollection.html"><i class="fas fa-palette"></i> Popular Collection</a>
        <a href="AbstractPainting.html"><i class="fas fa-brush"></i> Abstract Painting</a>
        <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
        <a href="feedback.html"><i class="fas fa-comment"></i> Feedback</a> -->
        <div class="cart-icon" id="cartIcon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </div>
    </nav>

    <div class="album">
        <img src="{{ asset('images/image1.jpeg') }}" alt="Art Gallery">
        <img src="{{ asset('images/image2.jpeg') }}" alt="Art Gallery">       
         <img src="{{ asset('images/image3.jpeg') }}" alt="Art Gallery">      
           <img src="{{ asset('images/image4.jpeg') }}" alt="Art Gallery">




      
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

        // Function to add item to cart
        function addToCart(name, price, image) {
            const existingItem = cart.find(item => item.name === name);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: name,
                    price: price,
                    image: image,
                    quantity: 1
                });
            }
            
            updateCart();
            cartMenu.classList.add('open');
            cartOverlay.classList.add('open');
        }

        // Function to update cart display
        function updateCart() {
            cartItems.innerHTML = '';
            let total = 0;
            
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
            
            cartTotal.textContent = `Total: $${total.toFixed(2)}`;
            cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
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