<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?php echo (service('request')->uri->getPath() == '/' ? 'active' : ''); ?>" href="/">Home</a>
                <a class="nav-link <?php echo (service('request')->uri->getPath() == '/about' ? 'active' : ''); ?>" href="/about">About</a>
                <a class="nav-link <?php echo (service('request')->uri->getPath() == '/contact' ? 'active' : ''); ?>" href="/contact">Contact</a>
                <a class="nav-link <?php echo (service('request')->uri->getPath() == '/product' ? 'active' : ''); ?>" href="/product">Product</a>
                <a class="nav-link <?php echo (service('request')->uri->getPath() == '/category' ? 'active' : ''); ?>" href="/category">Category</a>
            </div>
            <!-- Logout -->
            <div class="ms-auto">
                <?php if (session()->get('user_id')) : ?>
                    <a class="nav-link" href="/logout">Logout</a>
                <?php else : ?>
                    <a class="nav-link <?php echo (service('request')->uri->getPath() == '/login' ? 'active' : ''); ?>" href="/login">Login</a>
                <?php endif; ?>
            </div>
        </div>
</nav>