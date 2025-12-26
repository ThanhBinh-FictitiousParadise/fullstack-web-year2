@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
     <style>
         .contact-info {
             margin-bottom: 20px;
             border: 1px solid #ccc;
             padding: 20px;
             border-radius: 5px;
         }

         .contact-info p {
             line-height: 1.6;
         }

         .social-media a {
             margin-right: 10px;
         }

         .contact-form {
             margin-top: 20px;
             border: 1px solid #ccc;
             padding: 20px;
             border-radius: 5px;
         }

         .contact-form label {
             display: block;
             margin-bottom: 5px;
         }

         .contact-form input,
         .contact-form textarea {
             width: 100%;
             padding: 10px;
             margin-bottom: 10px;
             border: 1px solid #ccc;
             border-radius: 5px;
         }

         .contact-form button {
             background-color: #007BFF;
             color: #fff;
             border: none;
             padding: 10px 20px;
             border-radius: 5px;
             cursor: pointer;
         }

         .contact-form button:hover {
             background-color: #0056b3;
         }
     </style>
     <div class="container">
         <h1>Contact us</h1>
         <div class="contact-info">
             <p>We'd love to hear from you! If you have any questions, requests or feedback, please
                 Please contact us via the information below:</p>
             <p><strong>Email:</strong> <a href="mailto:support@yourcompany.com">support@yourcompany.com</a></p>
             <p><strong>Phone:</strong> (+84) 123 456 789</p>
             <p><strong>Address:</strong><br>
                 ABC Company<br>
                 123 XYZ Street,<br>
                 District 1, City. Ho Chi Minh</p>
             <p><strong>Working hours:</strong><br>
                 Monday - Friday: 9:00 AM - 6:00 PM<br>
                 Saturday: 10:00 AM - 4:00 PM<br>
                 Sunday: Rest</p>
             <p><strong>Social networks:</strong><br>
                 <a href="http://facebook.com/yourcompany" target="_blank">Facebook</a> |
                 <a href="http://twitter.com/yourcompany" target="_blank">Twitter</a> |
                 <a href="http://instagram.com/yourcompany" target="_blank">Instagram</a>
             </p>
         </div>
         <div class="contact-form">
             <h2>Contact form</h2>
             <form action="submit_form.php" method="post">
                 <label for="name">Your name</label>
                 <input type="text" id="name" name="name" required>
                 <label for="email">Your email</label>
                 <input type="email" id="email" name="email" required>
                 <label for="message">Your message</label>
                 <textarea id="message" name="message" rows="5" required></textarea>
                 <button type="submit">Submit</button>
             </form>
         </div>
     </div>
@endsection