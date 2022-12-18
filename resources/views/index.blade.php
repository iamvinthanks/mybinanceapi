<html>
    <head>
        <title>Laravel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<container>
    <formgroup>
        
        <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Refrence Number" aria-label="Recipient's username" aria-describedby="basic-addon2" id="referenceNo">
                <input type="text" class="form-control" placeholder="Binance Gift Code" aria-label="Recipient's username" aria-describedby="basic-addon2" id="giftcode">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="btn_ref">Button</button>
                </div>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" aria-label="Text input with dropdown button">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
               
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="btn_ref">Button</button>
                </div>
        </div>
        <alert>
        </alert>
        
    </formgroup>
    
</container>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
		$("#btn_ref").click(function(){
            var referenceNo = $("#referenceNo").val();
            var giftcode = $("#giftcode").val();
            $.ajax({
                type:"GET",
                url:"api/verifcode",
                data:{
                    referenceNo:referenceNo
                },
                success:function(data){
                    $("alert").append('<div class="alert alert-secondary" role="alert">'
                    + data.message+
                    '<p>Gift Card Value :' +data.data.codevalue+ '</p>'+
                    '<p>Market Price :' +data.data.market_price+ '</p>'+
                    '<p>Gift Card Value IDR :' +data.data.total_value+ '</p>'+
                    '<p>Fee :' +data.data.fee+ '</p>' + 
                    '<p>Value + Fee:' +data.data.withfee+ '</p>' +
                    '</div>');
                    $("#btn_ref").attr("disabled", true);
                }
                
            })
		});
	});
</script>

<style>
</style>
</body>
</html>