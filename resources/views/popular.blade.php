<!DOCTYPE html>
<html lang="en">
<head>
    <title>Art by Maha</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
</head>
<body>
    <header>
        <h1>Popular Collection</h1>
    </header>
    
    <nav>
       

         <a href="{{ url('/') }}" class="fas fa-home"><i class="fas fa-home"></i> Home</a>
    <a href="{{ url('/popular') }}" class="current-page"> <i class="fas fa-palette"></i>Popular Collection</a>
    <a href="{{ url('/abstract') }}"><i class="fas fa-brush"></i> Abstract Painting</a>
    <a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    <a href="{{ url('/feedback') }}"><i class="fas fa-comment"></i> Feedback</a>   
        
        <div class="cart-icon" id="cartIcon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </div>
    </nav>
    
    <div class="collection">
        <div class="painting">
            <!-- <img src="image1.jpeg" alt="Painting 1"> -->
             <img src="{{ asset('images/image1.jpeg') }}" alt="Painting 1">
            <p><strong>Name:</strong> Colorful Abstract</p>
            <p><strong>Price:</strong> $120.00</p>
            <p><strong>Size:</strong> 24x36 inches</p>
            <p><strong>Medium:</strong> Oil on Canvas</p>
            <button class="add-to-cart" onclick="addToCart('Colorful Abstract', 120, 'image1.jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="image2.jpeg" alt="Painting 2"> -->
            <img src="{{ asset('images/image2.jpeg') }}" alt="Painting 2">

            <p><strong>Name:</strong> Mountain Landscape</p>
            <p><strong>Price:</strong> $95.00</p>
            <p><strong>Size:</strong> 18x24 inches</p>
            <p><strong>Medium:</strong> Acrylic on Paper</p>
            <button class="add-to-cart" onclick="addToCart('Mountain Landscape', 95, 'image2.jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="image3.jpeg" alt="Painting 3"> -->
            <img src="{{ asset('images/image3.jpeg') }}" alt="Painting 3">

            <p><strong>Name:</strong> Ocean Waves</p>
            <p><strong>Price:</strong> $150.00</p>
            <p><strong>Size:</strong> 20x30 inches</p>
            <p><strong>Medium:</strong> Watercolor</p>
            <button class="add-to-cart" onclick="addToCart('Ocean Waves', 150, 'image3.jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="image4.jpeg" alt="Painting 4"> -->
            <img src="{{ asset('images/image4.jpeg') }}" alt="Painting 4">

            <p><strong>Name:</strong> Sunset Silhouette</p>
            <p><strong>Price:</strong> $110.00</p>
            <p><strong>Size:</strong> 16x20 inches</p>
            <p><strong>Medium:</strong> Acrylic on Canvas</p>
            <button class="add-to-cart" onclick="addToCart('Sunset Silhouette', 110, 'image4.jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="img5 (1).jpeg" alt="Painting 5"> -->
             <img src="{{ asset('images/img5 (1).jpeg') }}" alt="Painting 5">

            <p><strong>Name:</strong> Modern Abstract</p>
            <p><strong>Price:</strong> $200.00</p>
            <p><strong>Size:</strong> 30x40 inches</p>
            <p><strong>Medium:</strong> Mixed Media</p>
            <button class="add-to-cart" onclick="addToCart('Modern Abstract', 200, 'img5 (1).jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="img5 (2).jpeg" alt="Painting 6"> -->
             <img src="{{ asset('images/img5 (2).jpeg') }}" alt="Painting 6">

            <p><strong>Name:</strong> Floral Fantasy</p>
            <p><strong>Price:</strong> $85.00</p>
            <p><strong>Size:</strong> 12x16 inches</p>
            <p><strong>Medium:</strong> Oil on Board</p>
            <button class="add-to-cart" onclick="addToCart('Floral Fantasy', 85, 'img5 (2).jpeg')">Add to Cart</button>
        </div>
        
        <div class="painting">
            <!-- <img src="img5 (3).jpeg" alt="Painting 7"> -->
             <img src="{{ asset('images/img5 (3).jpeg') }}" alt="Painting 7">

            <p><strong>Name:</strong> Geometric Design</p>
            <p><strong>Price:</strong> $135.00</p>
            <p><strong>Size:</strong> 24x24 inches</p>
            <p><strong>Medium:</strong> Acrylic on Canvas</p>
            <button class="add-to-cart" onclick="addToCart('Geometric Design', 135, 'img5 (3).jpeg')">Add to Cart</button>
        </div>

        <div class="painting">
            <!-- <img src="img5 (4).jpeg" alt="Painting 8"> -->
             <img src="{{ asset('images/img5 (4).jpeg') }}" alt="Painting 8">

            <p><strong>Name:</strong> Cityscape</p>
            <p><strong>Price:</strong> $175.00</p>
            <p><strong>Size:</strong> 22x28 inches</p>
            <p><strong>Medium:</strong> Oil on Canvas</p>
            <button class="add-to-cart" onclick="addToCart('Cityscape', 175, 'img5 (4).jpeg')">Add to Cart</button>
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
        <p>&copy; 2025 Art by Maha | All Rights Reserved</p>
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
            
            // Save to localStorage
            localStorage.setItem('artCart', JSON.stringify(cart));
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
                // Save to localStorage
                localStorage.setItem('artCart', JSON.stringify(cart));
            }
        }
    </script>
</body>
</html>