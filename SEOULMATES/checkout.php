<?php 
include('functions/userfunctions.php');
include("includes/header.php"); 
include("authenticate.php"); 
?>

<!-- <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">
                Home /
            </a>
            <a href="checkout.php" class="text-white">
                Checkout /
            </a>
    </div> -->
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <form action="functions/placeorder.php" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" required name="name" id = "name" placeholder="Enter your full name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" required name="email" id = "email" placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" required name="phone" id = "phone" placeholder="Enter your phone number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" required name="pincode" id="pincode" placeholder="Enter your pincode" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Address</label>
                            <textarea name="address" required id="address" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order Details</h5>
                        <hr>
                            <div id="mycart">
                        <?php $items = getCartItems();
                        $totalPrice = 0;
                        foreach($items as $citem)
                        {
                            ?>
                                <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image']; ?>" alt="Image" width="80px">
                                            </div>
                                            <div class="col-md-5">
                                                <label><?= $citem['product_title']; ?></label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>PHP <?= $citem['price']; ?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>x <?= $citem['prod_qty']; ?></label>
                                            </div>
                                            
                                        </div>
                                </div>
                            <?php
                            $totalPrice += $citem['price'] * $citem['prod_qty'];
                            
                            // echo $citem['product_title'];
                        }
                        ?>
                        <hr>
                        <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice?></span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                            <div id="paypal-button-container" class="mt-3"></div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>

    
<?php include("includes/footer.php"); ?>
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AVufJEGQyQS_3beprWP-BuU1iHJT8ye1Y9QIIqz2TKOi_FRh6Bts7bTfjUM8B8VGYsJaHV2bdaz3XIYT&currency=USD"></script>
<script>
    paypal.Buttons({
        onClick(){
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address =  $('#address').val();
        if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
        {
            alert("Please fill all the fields");
            return false;
        }
            
        },
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= $totalPrice?>' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          
          var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address =  $('#address').val();
          
          data = {
                'name': name,
                'email': email,
                'phone': phone,
                'pincode': pincode,
                'address': address,
                'payment_mode': "Paid by PayPal",
                'payment_id': transaction.id,
                'placeOrderBtn':true
            };
          $.ajax({
            method: "POST",
            url: "functions/placeorder.php",
            data: data,
            success: function(response){
                if(response == 201)
                {
                    alert('Order Placed');
                    window.open('index.php','_self')
                }
                
            }
          });
        //   When ready to go live, remove the alert and show a success message within this page. For example:
        //   const element = document.getElementById('paypal-button-container');
        //   element.innerHTML = '<h3>Thank you for your payment!</h3>';
        //   Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>