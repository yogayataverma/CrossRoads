<?php
$fare=123;

define('STRIPE_API_KEY','sk_test_51IleV2SC3ITJpgJErohVfG5sOZGxeoGuZinyzYBxgp32eVtzVlgOeocWxpcBruYGRbrkWRFs5fOgp9v2Q98Ut33x00fEGMYCjn');
define('STRIPE_PUBLISHABLE_KEY','pk_test_51IleV2SC3ITJpgJEJ1K7KhOWqCbJJcni9RYZT5KBCXztP16otJDBSWisjaOUGkCozdHhrGUgIzzrR8timvfoeeJg00O7lUK0fX');

$con=mysqli_connect("localhost","root","","bus");


?>
<html>
<head>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>

<body>
<div class="container">
<div class="panel">
<div class="panel-heading">
<p class="panel-title">Charge <?php echo '$'.$fare; ?> with CrossRoads</p>
</div>
<div class="panel-body">
<div id="paymentresponse"></div>

<form action="payment.php" method="POST" id="paymentfrm">
<label>Name</label>
<input type="text" name="name" id="name" class="field" placeholder="Enter name">

<label>Email</label>
<input type="email" name="name" id="email" class="field" placeholder="Enter email">

<label>CARD NUMBER</label>
<div id="card_number" class="field"></div>

<label>CARD NUMBER</label>
<div id="card_expiry" class="field"></div>

<label>CARD NUMBER</label>
<div id="card_cvc" class="field"></div>


<input type="submit" id="payBtn" value="SUBMIT">
</form>

<script>
var stripe=Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

var elements=stripe.elements();
var cardElement=elements.create('cardNumber',{style;style});

cardElement.mount('#card_number');

var exp=elements.create('cardExpiry',{style;style});
exp.mount('#card_expiry');

var cvc=elements.create('cardCvc',{style;style});
cvc.mount('#card_cvc');

var form=document.getElementById('paymentFrm');

var resultContainer=document.getElementById('paymentResponse');

cardElement.addEventListener('change',function(event){
if(event.error){
resultContainer.innerHTML='<p>'+event.error.message+'</p>');
}else
{
resultContainer.innerHTML='';
}

});


var form=document.getElementById('paymentFrm');
form.addEventListener('submit',function(e){
e.preventDefault();
createToken();
});

function createToken(){
stripe.createToken(cardElement).then(function(result){
if(result.error){
resultContainer.innerHTML='<p>'+result.error.message+'</p>';
}
else{
stripeTokenHandler(result.token);
}
});
}
</script>

</div>
</div>
</div>
</body>
</html>