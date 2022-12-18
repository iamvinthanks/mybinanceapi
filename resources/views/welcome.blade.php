<!DOCTYPE html>
<!-- Coding By Techbanta -->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
<div class="container py-5">
<div class="row">
    <div class="col-lg-7 mx-auto">
    <div class="bg-white rounded-lg shadow-sm p-5">
    <!-- Credit card form tabs -->
    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
        <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
        <!-- <i class="fa fa-credit-card"></i> -->
            Redeem Binance Gift Card
        </a>
        </li>
        <!-- <li class="nav-item">
        <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
            <i class="fa fa-paypal"></i>
            Paypal
        </a>
        </li>
        <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
            <i class="fa fa-university"></i>
                Bank Transfer
            </a>
        </li> -->
    </ul>
    <!-- End -->


    <!-- Credit card form content -->
    <div class="tab-content">

    <!-- credit card info-->
    <div id="nav-tab-card" class="tab-pane fade show active">
    <form>
        <div class="form-group">
            <label for="username">Refrence Number</label>
            <input type="text" name="Refrence Number" placeholder="Refrence Number" required class="form-control" id="referenceNo" required></input>
        </div>
        <div class="form-group">
            <label for="cardNumber">Binance Gift Card Code</label>
            <div class="input-group">
            <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" id="giftcode"   ></input>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="cardNumber">No.Rekening/E-Wallet</label>
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="recipient_account">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Bank/E-Wallet Tujuan</label>
                <select id="inputState" class="form-control">
                    <option selected>Pilih...</option>
                    <option value="014" id="recipient_bank">BCA</option>
                    <option value="008" id="recipient_bank">MANDIRI</option>
                    <option value="009" id="recipient_bank">BRI</option>
                </select>
            </div>
            <div class="col-sm-4">
            <div class="form-group mb-4">
                <label data-toggle="tooltip" title="Three-digits code on the back of your card">Cek Data Anda</label>
                <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" id="btn_ref"> Check  </button>

            </div>
            <div role="separator" class="dropdown-divider"></div>

            </div>



            </div>
            <div class="progress" id="loading" style="display:none">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
            </div>
            <alert style="display : none">
            </alert>
    </form>
        
        </div>
    </div>
    <!-- End -->

    </div>  
</div>
</div>
</div>
<div class="text-center" style="display:none">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="trigger-btn" data-toggle="modal" id="popup"></a>
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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("txid");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
}
$(document).ready(function(){
    $("#popup").trigger("click");
		$("#btn_ref").click(function(event){
            $('#loading').show();
            $("alert").show();
            var referenceNo = $("#referenceNo").val();
            var giftcode = $("#giftcode").val();
            var account_number = $("#account_number").val();
            var recipient_bank = $("#recipient_bank").val();
            event.preventDefault();
            $.ajax({
                type:"GET",
                url:"api/verifcode",
                data:{
                    referenceNo:referenceNo
                },
                success:function(data){
                    
                    if(data.status == true){
                        $('#loading').hide();
                        $("alert").append('<div class="alert alert-success" role="alert">'
                        + data.message+
                        '<p>----------------------------------------</p>'+
                        '<p>Gift Card Value : ' +data.data.codevalue+ ' ' +data.data.codecoin+'</p>'+
                        '<p>Market Price : ' +data.data.market_price+ '</p>'+
                        '<p>Gift Card Value IDR : ' +data.data.total_value+ '</p>'+
                        '<p>Fee : ' +data.data.fee+ '</p>' + 
                        '<p>Value + Fee: ' +data.data.withfee+ '</p>' +
                        '<p>------------------------------------------</p>'+
                        '</div>'+
                        '<button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" id="redeem"> Confirm  </button>');
                        $("#btn_ref").attr("disabled", true);
                    }
                    if(data.status == false){
                        $('#loading').hide();
                        $("alert").append('<div class="alert alert-danger" role="alert id="danger">'
                        + data.message+
                        '</div>').fadeOut(10000);
                    }
                },
            });
		});
        $('#redeem').click(function(event){
            var referenceNo = $("#referenceNo").val();
            var giftcode = $("#giftcode").val();
            var account_number = $("#account_number").val();
            var recipient_bank = $("#recipient_bank").val();
            $.ajax({
                type:"POST",
                url:"api/redeemcode",
                data:{
                    referenceNo:referenceNo,
                    giftcode:giftcode,
                    recipient_account:recipient_account,
                    recipient_bank:recipient_bank
                },
                success:function(data){
                    
                }
            })
        })
	});
</script>
<style>
    body {
    background: #f5f5f5;
    }
    .copy {
        width:20px;
        opacity: 0.5;
        margin-top:-4px;
        margin-left:5px;
    }
    p {
        margin-bottom: 0px !important;
    }
    .rounded-lg {
    border-radius: 1rem;
    }

    .nav-pills .nav-link {
    color: #555;
    }

    .nav-pills .nav-link.active {
    color: #fff;
    }
    .dropdown-divider{
        border-top: 4px solid #e9ecef !important;
    }
    .modal-confirm {		
	color: #434e65;
	width: 525px;
}
.modal-confirm {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }
    .modal-confirm h5 {
        text-align: center;
        font-size: 26px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #007bff;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 110px;
        margin-left:auto;
        margin-right:auto;
        margin-bottom:auto;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #007bff;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #007bff;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>

</body>
</html>