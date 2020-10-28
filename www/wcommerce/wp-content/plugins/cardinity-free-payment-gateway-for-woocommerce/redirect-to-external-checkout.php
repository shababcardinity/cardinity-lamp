<html>
   <head >
      <title>Credit/Debit Card Payment By Cardinity</title>
   </head>
   <body onload="document.forms['checkout'].submit()" style="background-color: #f2f9ff; color: #6e8094; margin: 0;">
       <div style="display: flex; justify-content: center; align-items: center; font-family: PT Sans,sans-serif; height: 100vh; flex-direction: column;">
            <div style="font-size: 4.56rem; font-weight: 700;">— Payment Handled By Cardinity —</div>
            <p>Click the button if you are not redirected automatically</p>
            <form name="checkout" method="POST" action="https://checkout.cardinity.com">
                <button type=submit>Click Here</button>
                <input type="hidden" name="amount" value="<?php echo $_GET['amount'] ?>" />
                <input type="hidden" name="country" value="<?php echo $_GET['country'] ?>" />
                <input type="hidden" name="currency" value="<?php echo $_GET['currency'] ?>" />
                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>" />
                <input type="hidden" name="description" value="<?php echo $_GET['description'] ?>" />
                <input type="hidden" name="return_url" value="<?php echo $_GET['return_url'] ?>" /> 
                <input type="hidden" name="project_id" value="<?php echo $_GET['project_id'] ?>" />
                <input type="hidden" name="signature" value="<?php echo $_GET['signature'] ?>" />
            </form>
       </div>
   </body>
</html>