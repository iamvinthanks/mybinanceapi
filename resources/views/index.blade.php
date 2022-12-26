<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">Marlon</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Convert</span>
                            </a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">About</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="#skills" class="nav__link">
                                <i class='bx bx-book-alt nav__icon'></i>
                                <span class="nav__name">Skills</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="#portfolio" class="nav__link">
                                <i class='bx bx-briefcase-alt nav__icon'></i>
                                <span class="nav__name">Portfolio</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="#contactme" class="nav__link">
                                <i class='bx bx-message-square-detail nav__icon'></i>
                                <span class="nav__name">Contactme</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <img src=" {{asset('perfil.png')}}" alt="" class="nav__img">
            </nav>
        </header>

        <main>
            <!--=============== HOME ===============-->
            <section class="container section section__height" id="home">
                
            </section>
        </main>
        <div class="text-center" style="display:none">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="trigger-btn" data-toggle="modal" id="popup">sasssssss</a>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
                <h4 class="modal-title w-100">Redeem Procesed</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Pesanan Anda diterima dan sedang diproses oleh sistem</p>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: Rick Zolenda</td>
                </tr>
                <tr>
                    <td>Jenis Rekening </td>
                    <td>: BCA</td>
                </tr>
                <tr>
                    <td>Nomor Rekening </td>
                    <td>: 091721923123</td>
                </tr>
                <tr>
                    <td>Gift Card Value(Crypto) </td>
                    <td>: 1000 TRX</td>
                </tr>
                <tr>
                    <td>Gift Card Value(IDR)</td>
                    <td>: Rp 837.985</td>
                </tr>
                <tr>
                    <td>Jumlah Diterima(+fee) </td>
                    <td>: Rp 100.000</td>
                </tr>
                </table>
                <div role="separator" class="dropdown-divider"></div>
                <p class="text-center">ID Transaksi</p>
                <input class="modal-title w-100" id="txid" value="IST-09812918391" style="display:none"></input>
                <h5>IST-09812918391<img src="{{ asset('copy.png') }}" class="copy" type="button" onclick="myFunction()"><h5>
                <div role="separator" class="dropdown-divider"></div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">Check Status Transaksi</button>
            </div>
        </div>
    </div>
</div>   
        

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('js/main.js') }}"></script>
        </body>
</html>