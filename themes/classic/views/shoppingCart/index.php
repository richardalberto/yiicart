<div class="span12">


    <h1> Shopping Cart</h1><br>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Remove</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Model</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=""><input type="checkbox" id="optionsCheckbox" value="option1"></td>
                <td class="muted center_text"><a href="product.html"><img src="css/images/macbook-pro.jpg"></a></td>
                <td>MacBook Pro</td>
                <td>Product 18</td>
                <td><input type="text" class="input-mini" placeholder="1"></td>
                <td>$2,350.00</td>
                <td>$2,350.00</td>
            </tr>			  
            <tr>
                <td class=""><input type="checkbox" id="optionsCheckbox" value="option1"></td>
                <td class="muted center_text"><a href="product.html"><img src="css/images/macbook-pro.jpg"></a></td>
                <td>MacBook Pro</td>
                <td>Product 18</td>
                <td><input type="text" class="input-mini" placeholder="1"></td>
                <td>$2,350.00</td>
                <td>$2,350.00</td>
            </tr>				 
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong>$4,700.00</strong></td>
            </tr>		  
        </tbody>
    </table>

    <form class="form-horizontal">
        <fieldset>	  


            <div id="accordion2" class="accordion">
                <div class="accordion-group">
                    <div class="accordion-heading">

                        <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                            <h3>Apply discount code</h3>
                        </a>
                    </div>
                    <div class="accordion-body collapse in" id="collapseOne">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <label class="control-label" for="input01">Discount code: </label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your coupon here" class="input-xlarge" id="input01">
                                    <p class="help-block">You can only use one discount code at a time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                            <h3>Use gift voucher</h3>
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <label class="control-label" for="input01">Gift voucher: </label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your gift voucher here" class="input-xlarge" id="input01">
                                    <p class="help-block">You can use multiple gift vouchers at a time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="span5">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>		  
                <div class="span2">
                    <button type="submit" class="btn btn-primary">Continue shopping</button>
                </div>		  
                <div class="span5">
                    <a class="btn btn-primary pull-right" href="checkout.html">Checkout</a>
                </div>
            </div>
        </fieldset>
    </form>

</div>