// /*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 50,
            sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)


// /*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader(){
    const header = document.getElementById('header')
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 80) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)
function myFunction() {
    var copyText = document.getElementById("txid");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    navigator.clipboard.writeText(copyText.value);
}
$(document).ready(function(){
    // $("#popup").trigger("click");
    localStorage.setItem('askum',' 5|JeOpSPjPgahRcS24W6TrsA5iVlbqusHabPXO1U3c');
    var gentong = localStorage.getItem('askum');
    console.log(gentong);
        $("#btn_ref").click(function(event){
            $('#loading').show();
            $("alert").show();
            $("#btn_ref").hide();
            var referenceNo = $("#referenceNo").val();
            var giftcode = $("#giftcode").val();
            var account_number = $("#account_number").val();
            var recipient_bank = $("#recipient_bank").val();
            event.preventDefault();
            $.ajax({
                type:"GET",
                url:"api/verifcode",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+ gentong );
                },
                data:{
                    referenceNo:referenceNo
                },
                success:function(data){
                $('#loading').hide();
                    
                    if(data.data.status == true){
                        $('#loading').hide();
                        $('#form').hide()
                        $("alert").append('<table>'+
                        '<tbody>'+
                            '<tr>'+
                                '<td>Gift Card Value</td>'+
                                '<td align="right">'+data.data.codevalue+ ' ' +data.data.codecoin+'</td>'+
                            '</tr>'+
                            ' <tr>'+
                                '<td>Market Price</td>'+
                                '<td align="right">' +data.data.market_price+ '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Gift Card Value IDR</td>'+
                                '<td align="right">'+data.data.total_value+ '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Fee</td>'+
                                '<td align="right">'+data.data.fee+'</td>'+
                            '</tr>'+
                            '</tbody>'+
                            '<tfoot>'+
                            '<tr>'+
                                '<td>Total</td>'+
                                '<td align="right">' +data.data.withfee+ '</td>'+
                            '</tr>'+
                            '</tfoot>'+
                        '</table>');
                        $("#btn_ref").attr("disabled", true);
                        $("#btn_ref").hide();
                        $("#redeem").show();
                    }
                    if(data.data.status == false || data.code =='014'){
                        console.log(data.status)
                        setTimeout(function(){
                        window.location.reload();
                        }, 5000);
                        timeLeft = 5;
                        $('#loading').hide();
                        $("alert").append('<div class="alert alert-danger" role="alert id="danger">'
                        + data.message+
                        '<a>Reload in :</a><a id="seconds">5</a>'+
                        '</div>').fadeOut(10000);                    
                        function countdown() {
                            timeLeft--;
                            document.getElementById("seconds").innerHTML = String( timeLeft );
                            if (timeLeft > 0) {
                                setTimeout(countdown, 1000);
                            }
                        };
                        setTimeout(countdown, 1000);
                    }
                },
            });
        });
        $('#redeem').click(function(event){
            console.log('ok')
            // var referenceNo = $("#referenceNo").val();
            // var giftcode = $("#giftcode").val();
            // var account_number = $("#account_number").val();
            // var recipient_bank = $("#recipient_bank").val();
            // $.ajax({
            //     type:"POST",
            //     url:"api/redeemcode",
            //     data:{
            //         referenceNo:referenceNo,
            //         giftcode:giftcode,
            //         recipient_account:recipient_account,
            //         recipient_bank:recipient_bank
            //     },
            //     success:function(data){
                    
            //     }
            // })
        })
        $.ajax({
            type:"GET",
            url:"api/profile",
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+ gentong );
            },
            success:function(data){
                console.log(data.name);
                $("#profilename").text(data.name);
            }
        })
    });
    function myFunction() {
        var copyText = document.getElementById("txid");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(copyText.value);
    }
$(document).ready(function(){
    
});