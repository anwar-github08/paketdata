<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Admin | Dashboard' ? 'text-primary' : '' }}" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Admin | Produk' ? 'text-primary' : '' }}" href="/produk">Produk</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/" onclick="return confirm('ke halaman utama..?')">Home User</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent"
                        onclick="return confirm('logout..?')">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
