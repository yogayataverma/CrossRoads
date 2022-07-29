var num = document.getElementById("am").value;
var n = num.toString();
paypal.Buttons({
style:{
color:'silver',
shape:'pill',
label:'checkout'
},
createOrder:function(data,actions){
return actions.order.create({
purchase_units:[{
amount:{
value: n
}
}],

application_context:{
shipping_preference:'NO_SHIPPING'
}
});
},
onApprove:function(data,actions){
return actions.order.capture().then(function(details){
console.log(details)
window.location.replace('sucess1.php')
})
},

onCancel: function (data) {
        console.log(details)
        window.location.replace('cancle.php')
    }
}).render('#payment_gateway');

