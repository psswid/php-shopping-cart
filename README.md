# php shopping cart
based on Build A Shopping Cart with PHP on yt/Codecourse

Shopping cart writen OOP way.

Technologies used:
- MVC model,
- PSR-4,
- MySQL,
- php ( Slim(+bridge), Illuminate(database) ,Respect(validation) )
- javascript (jQuery/Ajax),
- twig, html5, bootstrap4,
- braintree sdk,
- composer,

Application is working shopping cart with all basic funcionalities like adding to cart, placing order and checking out with PayPal(Braintree payments).
After order confirmation cart is being cleared out and ready for another order.
Project doesn't include user accounts and admin panel to edit positions.
Includes integration with Braintree Payments sandbox account.

Database contains 6 tables with relations between them: addresses, customers, orders, orders_products, payment, products. See database.json

To run enter /public to the folder path.
