<footer>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-main">
        <div class="container">
            <a class="navbar-brand nav-item" href="{{route('welcome')}}">8 (800) 100-10-10</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Рекомендуемые</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Цена</a>
                    </li>
                </ul>

                </ul>
            </div>
        </div>
    </nav>

</footer>

<style>
    footer {
        margin-top: 20px;
        background-color: #D91818;
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
    }

     footer .container {
        display: flex;
        align-items: center;
         justify-content: space-between;
    }

    footer .container a{
        color: white !important;
        text-align: center;
    }
</style>
