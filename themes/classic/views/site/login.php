<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="span12">
    <div class="row">
        <div class="span9">
            <h1>Account login</h1>
        </div>
    </div>
    
    <hr>

    <div class="row">

        <div class="span5 well">
            <h2>New Customers</h2>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p><br>
            <a class="btn btn-primary pull-right" href="register.html">Create an account</a>
        </div>	 		

        <div class="span5 well pull-right">
            <h2>Registered Customers</h2>
            <p>If you have an account with us, please log in.</p>

            <form class="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Username</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge focused" id="username" placeholder="Enter your username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" class="input-xlarge" id="password" placeholder="Enter your password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                </fieldset>
            </form>

        </div>

    </div>
</div>
