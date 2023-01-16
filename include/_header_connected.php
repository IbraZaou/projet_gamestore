

<header>
        <nav>
        <div class="logo">
                <a href="connected.php">GAME STORE</a>
            </div>

            <ul class="catalogue">
                <li class="off">
                    <span>Navigation</span>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i>
                    <a href="index.php">Se déconnecter</a>
                </li>

                <li>
                    <i class="fa-solid fa-question fa-2xl"></i>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <i class="fa-solid fa-message fa-xl"></i>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>

            <p></p>

            <ul class="categories">
                <li class="off">
                    <span>Catégories</span>
                </li>
                <li>
                    <i class="fa-solid fa-computer"></i>
                    <a href="#ordinateur">Ordinateur</a>
                </li>
                <li>
                    <i class="fa-solid fa-tv"></i>
                    <a href="#moniteur">Moniteur Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-headset"></i>
                    <a href="#casque">Casque Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-keyboard"></i>
                    <a href="#clavier">Clavier Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-computer-mouse"></i>
                    <a href="#souris">Souris Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-gamepad"></i>
                    <a href="#manette">Manette</a>
                </li>
                <li>
                    <i class="fa-solid fa-circle-plus"></i>
                    <a href="#accessoire">Accessoire</a>
                </li>
            </ul>
        </nav>

        <div class="connected-navbar">
            <div class="icon-connected">
                <a href="#"><i class="fa-solid fa-magnifying-glass fa-xl"></i></a>
                <i id="accountBtn" class="fa-solid fa-user fa-xl"></i>
                <a href="panier.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            </div>

            <div class="account-connected">
            
                <!-- <p>Pseudo : <span><?php echo $_SESSION['pseudo']; ?></span></p> -->

                <a href="sedeconnecter.php">Se déconnecter</a>
            </div>

        </div>
    </header>



    <!-- Account box show  -->

    <script>

        let accountBox = document.querySelector('.account-connected');

        document.querySelector('#accountBtn').onclick = () =>{
            accountBox.classList.toggle('active');
        }
    </script>