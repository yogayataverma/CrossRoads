paypal.Buttons({
style:{
color:'blue',
shape:'pill'
},
createOrder:function(data,actions){
return actions.order.create({
purchase_units:[{
amount:{
value: '6.86'
}
}]
});
},
onApprove:function(data,actions){
return actions.order.capture().then(function(details){
console.log(details)
window.location.replace("success.php")
})
},

onCancel: function (data) {
        console.log(details)
        window.location.replace("cancle.php")
    }
}).render('#payment_gateway');