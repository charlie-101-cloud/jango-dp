<?php include 'referral.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ProfileLayouts</title>
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
                    <li><a href="about.php" class="active">About</a></li>
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

    <section class="about-hero">
        <div class="container">
            <h1>About ProfileLayouts</h1>
            <p>Creating beautiful personal detail pages since 2020</p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="about-text">
                <h2>Our Story</h2>
                <p>ProfileLayouts was founded in 2020 with a simple mission: to help professionals and creatives showcase their personal information in beautiful, functional layouts without needing design or coding skills.</p>
                
                <p>What started as a small collection of templates has grown into a comprehensive library of responsive, customizable personal detail page layouts used by thousands of customers worldwide.</p>
                
                <h2>Our Approach</h2>
                <p>We believe that your personal detail page should reflect your personality and professionalism. That's why we focus on:</p>
                <ul>
                    <li>Clean, modern designs that stand out</li>
                    <li>Responsive layouts that work on any device</li>
                    <li>Easy customization options</li>
                    <li>Fast loading performance</li>
                    <li>Excellent customer support</li>
                    <li>Rewarding referral program</li>
                </ul>
                
                <h2>Referral Program</h2>
                <p>Our referral program allows you to earn 10% commission for every purchase made through your unique referral link. It's our way of thanking you for spreading the word about ProfileLayouts.</p>
                
                <h2>For GitHub Users</h2>
                <p>Many of our customers use our templates for their GitHub profile pages or portfolio websites. Our layouts are designed to work seamlessly with GitHub Pages and other static site hosting solutions.</p>
                
                <p>Check out our <a href="https://github.com/yourusername/profilelayouts" target="_blank">GitHub repository</a> for sample implementations and documentation.</p>
            </div>
            
            <div class="team-section">
                <h2>Meet the Team</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-avatar"></div>
                        <h3>Alex Johnson</h3>
                        <p>Founder & Lead Designer</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-avatar"></div>
                        <h3>Sarah Chen</h3>
                        <p>Frontend Developer</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="member-avatar"></div>
                        <h3>Michael Brown</h3>
                        <p>Customer Support</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
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