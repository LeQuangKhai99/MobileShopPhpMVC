    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <form style="width: 60%; margin: auto;" method="post" action="<?php echo constant('path'); ?>Customer/postCheckOut">
				  <div class="form-group">
				    <label>Ship Name</label>
				    <input required name="name" type="text" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Ship Phone</label>
				    <input required name="phone" type="text" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Ship Address</label>
				    <input required name="address" type="text" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Note</label>
				    <textarea required rows="5" name="note" class="form-control"></textarea>
				  </div>
				  <button name="checkout" type="submit" class="btn btn-primary">Submit</button>
				</form>              
                </div>
            </div>
        </div>
    </div>