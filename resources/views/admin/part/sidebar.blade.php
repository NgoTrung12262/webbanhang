<a href="#" class="menu-item" onclick="toggleSubMenu('dashboard')"><span class="menu-icon">📊</span>
    Dashboard <i class="ri-expand-up-down-fill"></i></a>

<div id="dashboard" class="submenu">
    <a href="index" class="submenu-item"> <span class="submenu-icon">🛒</span> <span>Tổng quan</span></a>
</div>

<a href="#" class="menu-item" onclick="toggleSubMenu('orders')"><span class="menu-icon">🛒</span> Đơn hàng
    <i class="ri-expand-up-down-fill"></i></a>
<div id="orders" class="submenu">
    <a href="/admin/order_list" class="submenu-item"><span class="submenu-icon">❌</span> Danh sách đơn hàng</a>
    <a href="/admin/order_detail" class="submenu-item"><span class="submenu-icon">✔️</span>Chi tiết đơn hàng</a>
</div>

<a href="#" class="menu-item" onclick="toggleSubMenu('products')"><span class="menu-icon">📦</span> Sản phẩm
    <i class="ri-expand-up-down-fill"></i></a>

<div id="products" class="submenu">
    <a href="/admin/product_list" class="submenu-item"><span class="submenu-icon">📋</span> Danh sách</a>
    <a href="/admin/product/add" class="submenu-item"><span class="submenu-icon">➕</span> Thêm </a>
</div>
