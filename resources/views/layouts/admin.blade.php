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
        <header class="header_ad">
            <div class="grid">
                <nav class="navbar_ad">
                    <div class="navbar_list_ad">
                        <div class="navbar_item_ad"><h1>Quan Ly Nhan Su</h1></div>
                    </div>
                    <div class="start_ad">
                        <div class="navbar_list_ad">
                            <div class="navbar_item_ad">
                                <a href="{{route('homeAdmin')}}" class="navbar_link iconlg">
                                    <span class="navbar_icon_ad">Home</span>
                                </a>
                            </div>
                        </div>
                        <div class="navbar_list_ad">
                            <div class="navbar_item_ad">
                                @if (Auth::check())
                                <a href="{{route('informationUser',['id'=>Auth::User()->id])}}" class="navbar_link iconlg">
                                    <span class="navbar_icon_ad">{{Auth::User()->name}}</span>
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="box_search_ad">
                            <form method="get" action="" class="search_ad">
                                <div class="contain_search_ad">
                                    <div class="form_search_ad">
                                        <div class="search_name_ad">
                                            <input tytle="text" name="key_word" class="search_label_ad" placeholder=" Ten San Pham">
                                        </div>
                                        <div class="boxx_btn">
                                            <button role="button" tytle="submit" class="search_button_ad">Tim Kiem</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container_ad">
            <div class="category_ad">
                <div class="category_list_ad">
                    <ul class="category_ad_list">
                        <a href="{{route('homeAdmin')}}" class="category_link_ad">
                            <li class="category_item_ad">
                                Generality
                            </li>
                        </a>    
                        <a href="{{route('createAuth')}}" class="category_link_ad">
                            <li class="category_item_ad">
                                Create account
                            </li>
                        </a>
                        <a href="{{route('product')}}" class="category_link_ad">
                            <li class="category_item_ad">
                                Product
                            </li>
                        </a>
                        <a href="{{route('client')}}" class="category_link_ad">
                            <li class="category_item_ad">
                                Staff
                            </li>
                        </a>
                        <a href="{{route('editPassword')}}" class="category_link_ad">
                            <li class="category_item_ad">
                                Change password
                            </li>
                        </a>
                        <a href="" class="category_link_ad">
                            <li class="category_item_ad">
                                Update information 
                            </li>
                        </a>
                        <li class="category-">
                            <form action="{{route('logOut')}}" method="post">
                                @csrf
                                <button type="submit">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @yield('conten_ad')
            </div>
        </div>
    </div>
</body>
</html>