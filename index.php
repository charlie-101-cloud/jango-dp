<?php include 'referral.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileLayouts - Premium Personal Detail Page Templates</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">ProfileLayouts</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="layouts.php">Layouts</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['discount'])): ?>
                        <li class="discount-badge"><?php echo $_SESSION['discount']; ?>% OFF!</li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Beautiful Personal Detail Page Layouts</h1>
            <p>Premium templates to showcase your personal or professional information in style</p>
            <a href="layouts.php" class="btn">Browse Layouts</a>
            <?php if(isset($_SESSION['discount'])): ?>
                <p class="discount-text">You have a <?php echo $_SESSION['discount']; ?>% discount applied!</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Why Choose Our Layouts?</h2>
            <div class="features-grid">
                <div class="feature">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Responsive Design</h3>
                    <p>Looks great on all devices from mobile to desktop</p>
                </div>
                <div class="feature">
                    <i class="fas fa-paint-brush"></i>
                    <h3>Customizable</h3>
                    <p>Easy to modify colors, fonts, and content</p>
                </div>
                <div class="feature">
                    <i class="fas fa-bolt"></i>
                    <h3>Fast Loading</h3>
                    <p>Optimized for performance and speed</p>
                </div>
                <div class="feature">
                    <i class="fas fa-gift"></i>
                    <h3>Referral Rewards</h3>
                    <p>Earn 10% commission for every referral</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2>What Our Customers Say</h2>
            <div class="testimonial-grid">
                <div class="testimonial">
                    <div class="avatar"></div>
                    <p>"These layouts saved me so much time! Highly recommended."</p>
                    <div class="name">- Sarah K.</div>
                </div>
                <div class="testimonial">
                    <div class="avatar"></div>
                    <p>"Got 3 clients through the referral program. Great system!"</p>
                    <div class="name">- Michael T.</div>
                </div>
                <div class="testimonial">
                    <div class="avatar"></div>
                    <p>"The WhatsApp integration was exactly what I needed."</p>
                    <div class="name">- David L.</div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 ProfileLayouts. All rights reserved.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>