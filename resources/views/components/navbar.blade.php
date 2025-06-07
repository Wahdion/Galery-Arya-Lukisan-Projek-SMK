
<style>
.navbar {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 2rem;
    background: linear-gradient(90deg, #4f46e5, #6d28d9);
    color: white;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

  .logo-gambar img {
    height: 50px;
    border-radius: 50%;
    border: 2px solid white;
  }

  .logo {
    font-size: 1.5rem;
    font-weight: bold;
    margin-left: 12px;
  }

  .nav-links {
    display: flex;
    list-style: none;
    gap: 1.2rem;
    align-items: center;
  }

  .nav-links li a {
    color: white;
    text-decoration: none;
    font-weight: 530;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    transition: background 0.3s;
     font-family: 'Poppins', sans-serif;
  }

  .nav-links li a:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .menu-toggle {
    display: none;
    font-size: 1.8rem;
    color: white;
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .nav-links {
      display: none;
      flex-direction: column;
      position: absolute;
      top: 70px;
      right: 20px;
      background: #4f46e5;
      padding: 1rem;
      border-radius: 10px;
    }

    .nav-links.show {
      display: flex;
    }

    .menu-toggle {
      display: block;
    }
  }
</style>

<nav class="navbar">
  <div style="display: flex; align-items: center;">
    <div class="logo-gambar">
      <img src="{{ asset('logo-GA2.png') }}" alt="Logo">
    </div>
    <div class="logo">Gusti Arya Lukisan</div>
  </div>
  <ul class="nav-links" id="navLinks">
     <li><a href="{{ route('galeri.user') }}">Beranda</a></li>
    <li><a href="{{ route('galery') }}">Gallery</a></li>
  </ul>
  <div class="menu-toggle" onclick="toggleMenu()">☰</div>
</nav>

<script>
  function toggleMenu() {
    const navLinks = document.getElementById("navLinks");
    navLinks.classList.toggle("show");
  }
</script>