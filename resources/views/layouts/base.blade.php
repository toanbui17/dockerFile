<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/base.css') }}">
    <link rel="stylesheet" href="{{ url('/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title') - quan ly nhan su</title>
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="navbar">
                    <div class="navbar_list">
                        <div class="navbar_item"><h1>Quan Ly Nhan Su</h1></div>
                    </div>
                    <div class="navbar_list_1">
                        <div class="navbar_item">
                            <a href="" class="navbar_link iconlg">
                                <span class="navbar_icon">Introce</span>
                            </a>
                        </div>
                        <div class="navbar_item">
                            <a href="" class="navbar_link iconlg">
                                <span class="navbar_icon">News</span>
                            </a>
                        </div>
                        <div class="navbar_item">
                            <a href="{{route('homeProduct')}}" class="navbar_link iconlg">
                                <span class="navbar_icon">Products</span>
                            </a>
                        </div>
                        <div class="navbar_item">
                            <!--dung ham route de goi url bang name route-->
                            <a href="{{route('login')}}" class="navbar_link iconlg">
                                <span class="navbar_icon">Login</span>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="start">
                    <div class="box_search">
                        <form method="get" action="" class="search">
                            <div class="contain_search">
                                <h3 class="slogan_search">Hay Tim Kiem Va Tan Huong </h3>
                                <div class="form_search">
                                    <div class="search_name">
                                        <input tytle="text" name="key_word" class="search_label" placeholder=" Ten San Pham">
                                    </div>
                                    <button role="button" tytle="submit" class="search_button">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="category row">
                @yield('conten')
            </div>
        </div>
        <footer class="footer">
            <div class="box_footer">
                <div class="footer_list">
                    <div class="footer_item">
                        Gioi Thieu
                    </div>
                    <div class="footer_item">
                        Thong Tin Lien He
                    </div>
                    <div class="footer_item">
                        Ket Noi
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>