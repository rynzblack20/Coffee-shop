class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart')) || [];
        this.updateCartCount();
    }

    addItem(id, name, price, quantity = 1) {
        const existingItem = this.items.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            this.items.push({ id, name, price, quantity });
        }
        
        this.saveCart();
        this.updateCartCount();
        this.showNotification('Item added to cart!');
    }

    removeItem(id) {
        this.items = this.items.filter(item => item.id !== id);
        this.saveCart();
        this.updateCartCount();
        this.showNotification('Item removed from cart!');
    }

    updateQuantity(id, quantity) {
        const item = this.items.find(item => item.id === id);
        if (item) {
            item.quantity = parseInt(quantity);
            if (item.quantity <= 0) {
                this.removeItem(id);
            }
        }
        this.saveCart();
        this.updateCartCount();
    }

    getTotal() {
        return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }

    updateCartCount() {
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            const totalItems = this.items.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
    }

    showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'alert alert-success notification';
        notification.style.position = 'fixed';
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.zIndex = '1000';
        notification.textContent = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
}

const cart = new Cart();

// Event listener for "Add to Cart" buttons
document.addEventListener('click', function(e) {
    if (e.target.matches('.add-to-cart')) {
        const item = e.target.closest('.menu-item');
        const id = item.dataset.id;
        const name = item.dataset.name;
        const price = parseFloat(item.dataset.price);
        
        cart.addItem(id, name, price);
    }
});