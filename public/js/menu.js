document.addEventListener("DOMContentLoaded", function () {

    /* ================================
       ELEMENTS
    ================================= */
    const cartButton = document.getElementById('cartButton');
    const cartDropdown = document.getElementById('cartDropdown');
    const cartItemsEl = document.getElementById('cartItems');
    const cartCountEl = document.getElementById('cartCount');
    const totalPriceEl = document.getElementById('totalPrice');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const categoryButtons = document.querySelectorAll('.category-btn');
    const paymentMethodSel = document.getElementById('paymentMethod');
    const qrisContainer = document.getElementById('qrisContainer');
    const amountPaidInput = document.getElementById('amountPaid');
    const changeAmountEl = document.getElementById('changeAmount');
    const checkoutButton = document.getElementById('checkoutButton');

    // Modal Struk
    const invoiceModal = document.getElementById("invoiceModal");
    const invoiceContent = document.getElementById("invoiceContent");
    const closeInvoice = document.getElementById("closeInvoice");
    const printInvoice = document.getElementById("printInvoice");

    /* ================================
       STATE
    ================================= */
    let cart = [];

    /* ================================
       HELPERS
    ================================= */
    function formatRupiah(number) {
        if (!number) return "Rp0";
        return "Rp" + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function getTotal() {
        return cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    }

    /* ================================
       CART BUTTON TOGGLE
    ================================= */
    cartButton.addEventListener('click', function (e) {
        e.stopPropagation();
        cartDropdown.classList.toggle("hidden");
    });

    document.addEventListener('click', function (e) {
        if (!cartDropdown.contains(e.target) && !cartButton.contains(e.target)) {
            cartDropdown.classList.add("hidden");
        }
    });

    /* ================================
       ADD TO CART
    ================================= */
    addToCartButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            const id = Number(this.dataset.id);
            const name = this.dataset.name;
            const price = Number(this.dataset.price);

            const existing = cart.find(i => i.id === id);
            if (existing) existing.quantity++;
            else cart.push({ id, name, price, quantity: 1 });

            // Feedback visual
            const original = this.textContent;
            this.textContent = "✓ Ditambahkan";
            this.classList.replace("bg-yellow-500", "bg-green-500");
            setTimeout(() => {
                this.textContent = original;
                this.classList.replace("bg-green-500", "bg-yellow-500");
            }, 1200);

            updateCart();
            cartDropdown.classList.remove("hidden");
        });
    });

    /* ================================
       CATEGORY FILTER
    ================================= */
    categoryButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            const category = this.dataset.category;

            categoryButtons.forEach(b => b.classList.remove("active-category"));
            this.classList.add("active-category");

            document.querySelectorAll('.menu-item').forEach(item => {
                const cat = item.dataset.category.toLowerCase();
                item.style.display = (category === "all" || category === cat) ? "" : "none";
            });
        });
    });

    /* ================================
    PAYMENT METHOD
    ================================= */
    paymentMethodSel.addEventListener("change", function () {
        if (this.value === "qris") {
            qrisContainer.classList.remove("hidden");
            checkoutButton.textContent = "Lanjutkan Pembayaran";
            
            amountPaidInput.closest('div').classList.add('hidden');
            changeAmountEl.closest('div').classList.add('hidden');
            
        } else {
            qrisContainer.classList.add("hidden");
            checkoutButton.textContent = "Pesan Sekarang";
            
            amountPaidInput.closest('div').classList.remove('hidden');
            changeAmountEl.closest('div').classList.remove('hidden');
        }
    });

    /* ================================
       UPDATE CART
    ================================= */
    function updateCart() {
        cartItemsEl.innerHTML = "";

        if (cart.length === 0) {
            cartItemsEl.innerHTML = `<p class="text-gray-500 text-center">Keranjang kosong</p>`;
            cartCountEl.classList.add("hidden");
            totalPriceEl.textContent = "Rp0";
            changeAmountEl.textContent = "Rp0";
            return;
        }

        cartCountEl.classList.remove("hidden");
        cartCountEl.textContent = cart.reduce((a, b) => a + b.quantity, 0);

        cart.forEach(item => {
            const div = document.createElement("div");
            div.className = "cart-item bg-gray-50 p-2 rounded flex justify-between";

            div.innerHTML = `
                <div>
                    <h4 class="font-medium">${item.name}</h4>
                    <p class="text-sm text-gray-500">${formatRupiah(item.price)} x ${item.quantity}</p>
                </div>

                <div class="flex items-center">
                    <button class="decrease-quantity text-yellow-600 px-1" data-id="${item.id}">-</button>
                    <span class="mx-1">${item.quantity}</span>
                    <button class="increase-quantity text-yellow-600 px-1" data-id="${item.id}">+</button>
                    <button class="remove-item text-red-500 ml-3" data-id="${item.id}">&times;</button>
                </div>
            `;

            cartItemsEl.appendChild(div);
        });

        totalPriceEl.textContent = formatRupiah(getTotal());
        calculateChange();
    }

    /* ================================
       INCREASE / DECREASE / REMOVE
    ================================= */
    document.addEventListener("click", function (e) {
        const inc = e.target.closest(".increase-quantity");
        const dec = e.target.closest(".decrease-quantity");
        const rem = e.target.closest(".remove-item");

        if (inc) {
            const id = Number(inc.dataset.id);
            cart.find(i => i.id === id).quantity++;
            updateCart();
        }

        if (dec) {
            const id = Number(dec.dataset.id);
            const item = cart.find(i => i.id === id);
            item.quantity--;
            if (item.quantity <= 0) cart = cart.filter(i => i.id !== id);
            updateCart();
        }

        if (rem) {
            const id = Number(rem.dataset.id);
            cart = cart.filter(i => i.id !== id);
            updateCart();
        }
    });

    /* ================================
       CALCULASI KEMBALIAN
    ================================= */
    function calculateChange() {
        const paid = Number(amountPaidInput.value) || 0;
        const total = getTotal();
        changeAmountEl.textContent = formatRupiah(paid - total);
    }

    amountPaidInput.addEventListener("input", calculateChange);

    /* ================================
       CHECKOUT → KIRIM PESANAN DAN STRUK
    ================================= */
    checkoutButton.addEventListener("click", function () {

        if (cart.length === 0) return alert("Keranjang masih kosong!");

        const name = document.getElementById('customerName').value.trim();
        const table = document.getElementById('tableNumber').value.trim();
        const payment = paymentMethodSel.value;
        const paid = Number(amountPaidInput.value);

        if (!name || !table) return alert("Isi nama & nomor meja!");

        const total = getTotal();
        
        // Validasi hanya untuk tunai
        if (payment === "tunai" && paid < total) {
            return alert("Pembayaran kurang!");
        }
        
        // Untuk QRIS, set paid = total 
        const finalPaid = payment === "qris" ? total : paid;

        // Data untuk dikirim ke backend
        const data = {
            customer_name: name,
            meja: table,
            total_harga: total,
            payment_method: payment, 
            items: cart.map(item => ({
                id: item.id,
                quantity: item.quantity,
                price: item.price
            })),
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        fetch("/orders/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {

                // Build invoice HTML
                let html = `
                    <p><strong>Nama:</strong> ${name}</p>
                    <p><strong>Meja:</strong> ${table}</p>
                    <p><strong>Pembayaran:</strong> ${payment.toUpperCase()}</p>
                    <hr>
                    <h3 class="font-semibold mt-2">Detail Pesanan:</h3>
                `;

                cart.forEach(item => {
                    html += `<p>${item.quantity}x ${item.name} — ${formatRupiah(item.price)}</p>`;
                });

                html += `
                    <hr>
                    <p><strong>Total:</strong> ${formatRupiah(total)}</p>
                    <p><strong>Dibayar:</strong> ${formatRupiah(paid)}</p>
                    <p><strong>Kembalian:</strong> ${formatRupiah(paid - total)}</p>
                    <p class="mt-2 text-sm text-gray-500">Order ID: ${res.order_id}</p>
                `;

                invoiceContent.innerHTML = html;
                invoiceModal.classList.remove("hidden");

                // Reset cart
                cart = [];
                updateCart();

            } else {
                alert("Terjadi kesalahan saat memesan.");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Terjadi kesalahan pada server.");
        });

    });

    /* ================================
       CLOSE & PRINT
    ================================= */
    closeInvoice.addEventListener("click", () => {
        invoiceModal.classList.add("hidden");
    });

    printInvoice.addEventListener("click", () => {
        window.print();
    });

});
