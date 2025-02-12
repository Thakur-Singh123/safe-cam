@extends('admin.layouts.master')
@section('content')
<style>
   #card-element {
   border: 1px solid #ccc;
   padding: 10px;
   border-radius: 4px;
   margin-bottom: 10px;
   }
   #submit-button {
   background-color: #28a745;
   color: white;
   padding: 10px;
   border: none;
   cursor: pointer;
   }
   #submit-button:disabled {
   background-color: #ccc;
   cursor: not-allowed;
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <a href="{{ url('admin/order-pdf/1') }}" target="_blank" class="btn btn-primary">
                  <i class="fas fa-download"></i> 
               </a>
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
            @endif
            <!--end response-->
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Add New Order</h3>
               </div>
               <div class="card-body">
                  <form action="{{ route('order.process') }}" method="POST" id="payment-form" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="customer_name" class="form-control" placeholder="Enter Name" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="Enter Email" required>
                     </div>
                     <div class="form-group">
                        <label for="same_as_billing">Billing Addresss</label>
                     </div>
                     <div class="form-group">
                        <label for="billing_address">Address</label>
                        <input type="text" id="billing_address" name="billing_address" class="form-control" placeholder="Enter Address" required>
                     </div>
                     <div class="form-group">
                        <label for="billing_state">State / UT</label>
                        <select id="billing_state" name="billing_state" class="form-control" required>
                           <option value="">Select State / UT</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="billing_district">District</label>
                        <select id="billing_district" name="billing_city" class="form-control" required>
                           <option value="">Select District</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="billing_zip">ZIP Code</label>
                        <input type="text" id="billing_zip" name="billing_zip" class="form-control" placeholder="Enter ZIP Code" required>
                     </div>
                     <div class="form-group">
                        <input type="checkbox" id="same_as_billing">
                        <label for="same_as_billing">Same as Billing Address</label>
                     </div>
                     <div class="form-group">
                        <label for="same_as_billing">Shipping Addresss</label>
                     </div>
                     <div class="form-group">
                        <label for="shipping_address">Address</label>
                        <input type="text" id="shipping_address" name="shipping_address" class="form-control" placeholder="Enter Address" required>
                     </div>
                     <div class="form-group">
                        <label for="shipping_state">State / UT</label>
                        <select id="shipping_state" name="shipping_state" class="form-control" required>
                           <option value="">Select State / UT</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="shipping_district">District</label>
                        <select id="shipping_district" name="shipping_city" class="form-control" required>
                           <option value="">Select District</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="shipping_zip">ZIP Code</label>
                        <input type="text" id="shipping_zip" name="shipping_zip" class="form-control" placeholder="Enter ZIP Code" required>
                     </div>
                     <div class="form-group">
                        <label for="total_amount">Amount (USD)</label>
                        <input type="number" id="amount" name="amount" min="1"  class="form-control" placeholder="Amount (USD)" required>
                     </div>
                     <label for="card-element">Credit or Debit Card</label>
                     <div id="card-element"></div>
                     <div id="card-errors" role="alert"></div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-success" id="submit-button">Pay Now</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      var stripe = Stripe("{{ env('STRIPE_KEY') }}");
      var elements = stripe.elements();
      var card = elements.create("card");
      card.mount("#card-element");
   
      var form = document.getElementById("payment-form");
      var submitButton = document.getElementById("submit-button");
   
      form.addEventListener("submit", function (event) {
         event.preventDefault();
         submitButton.disabled = true; 

         stripe.createToken(card).then(function (result) {
            if (result.error) {
               document.getElementById("card-errors").textContent = result.error.message;
               submitButton.disabled = false;
            } else {
               var hiddenInput = document.createElement("input");
               hiddenInput.setAttribute("type", "hidden");
               hiddenInput.setAttribute("name", "stripeToken");
               hiddenInput.setAttribute("value", result.token.id);
               form.appendChild(hiddenInput);
               form.submit();
            }
         });
      });
   });
</script>
@endsection