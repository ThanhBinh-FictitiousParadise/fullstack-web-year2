@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
    <style>
        .about-section {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .about-section h1 {
            margin-bottom: 20px;
        }

        .about-section p {
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-section .mission,
        .about-section .vision,
        .about-section .values {
            margin-bottom: 20px;
        }

        .about-section h2 {
            margin-top: 30px;
            margin-bottom: 10px;
        }
    </style>
    <div class="container">
        <div class="about-section">
            <h1>About Us</h1>
            <p>Welcome to LaptopShop, your number one source for all things laptops. We're dedicated to giving you the very best of laptops, with a focus on quality, customer service, and uniqueness.</p>
            <p>Founded in 2024 by 3 shareholders : Quy, Binh and Tung, LaptopShop has come a long way from its beginnings in a home office. When the three of us first started out, our passion for high-quality laptops motivated us to start our own business.</p>
            <p>We now serve customers all over the world and are thrilled to be a part of the tech industry.</p>
            <h2>Our Mission</h2>
            <p class="mission">Our mission is to provide top-quality laptops that combine performance with reliability. We aim to make technology accessible and affordable for everyone.</p>
            <h2>Our Vision</h2>
            <p class="vision">Our vision is to be a leading laptop retailer known for our innovative products, exceptional service, and commitment to customer satisfaction.</p>
            <h2>Our Values</h2>
            <p class="values">Integrity, innovation, and customer focus are the core values that guide our business. We believe in building lasting relationships with our customers by exceeding their expectations in every way possible.</p>
            <p>If you have any questions or comments, please don't hesitate to contact us.</p>
        </div>
    </div>
@endsection
