<?php include 'referral.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Layouts - ProfileLayouts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/layouts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">ProfileLayouts</div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="layouts.php" class="active">Layouts</a></li>
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

    <section class="layouts-intro">
        <div class="container">
            <h1>Our Premium Layout Collection</h1>
            <p>Choose from our selection of beautifully designed personal detail page templates</p>
            <?php if(isset($_SESSION['discount'])): ?>
                <p class="discount-text">You have a <?php echo $_SESSION['discount']; ?>% discount applied to all purchases!</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="layout-grid">
        <div class="container">
            <div class="layout-filter">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="minimal">Minimal</button>
                <button class="filter-btn" data-filter="creative">Creative</button>
                <button class="filter-btn" data-filter="professional">Professional</button>
            </div>

            <div class="layouts-container">
                <!-- Layout 1 -->
                <div class="layout-card" data-category="minimal">
                    <div class="layout-preview layout-minimal-1">
                        <div class="preview-content">
                            <div class="avatar"></div>
                            <h3>John Doe</h3>
                            <p>Web Developer</p>
                        </div>
                    </div>
                    <div class="layout-info">
                        <h3>Minimal One</h3>
                        <p>Clean and simple design perfect for professionals</p>
                        <div class="price">
                            <?php 
                            $price = 29;
                            if(isset($_SESSION['discount'])) {
                                $discounted = $price * (1 - $_SESSION['discount']/100);
                                echo '<span class="original-price">$'.$price.'</span> $'.number_format($discounted, 2);
                            } else {
                                echo '$'.$price;
                            }
                            ?>
                        </div>
                        <button class="btn">Purchase</button>
                        <button class="btn secondary">Preview</button>
                    </div>
                </div>

                <!-- Layout 2 -->
                <div class="layout-card" data-category="professional">
                    <div class="layout-preview layout-professional-1">
                        <div class="preview-content">
                            <div class="avatar"></div>
                            <div class="details">
                                <h3>Jane Smith</h3>
                                <p>UX Designer</p>
                                <div class="social-icons">
                                    <span><i class="fab fa-twitter"></i></span>
                                    <span><i class="fab fa-linkedin"></i></span>
                                    <span><i class="fab fa-github"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layout-info">
                        <h3>Professional One</h3>
                        <p>Elegant design with social media integration</p>
                        <div class="price">
                            <?php 
                            $price = 39;
                            if(isset($_SESSION['discount'])) {
                                $discounted = $price * (1 - $_SESSION['discount']/100);
                                echo '<span class="original-price">$'.$price.'</span> $'.number_format($discounted, 2);
                            } else {
                                echo '$'.$price;
                            }
                            ?>
                        </div>
                        <button class="btn">Purchase</button>
                        <button class="btn secondary">Preview</button>
                    </div>
                </div>

                <!-- Layout 3 -->
                <div class="layout-card" data-category="creative">
                    <div class="layout-preview layout-creative-1">
                        <div class="preview-content">
                            <div class="creative-shape"></div>
                            <h3>Alex Johnson</h3>
                            <p>Creative Director</p>
                            <div class="skills">
                                <span>Design</span>
                                <span>Photography</span>
                                <span>Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="layout-info">
                        <h3>Creative One</h3>
                        <p>Bold design for creative professionals</p>
                        <div class="price">
                            <?php 
                            $price = 49;
                            if(isset($_SESSION['discount'])) {
                                $discounted = $price * (1 - $_SESSION['discount']/100);
                                echo '<span class="original-price">$'.$price.'</span> $'.number_format($discounted, 2);
                            } else {
                                echo '$'.$price;
                            }
                            ?>
                        </div>
                        <button class="btn">Purchase</button>
                        <button class="btn secondary">Preview</button>
                    </div>
                </div>

                <!-- Layout 4 -->
                <div class="layout-card" data-category="minimal">
                    <div class="layout-preview layout-minimal-2">
                        <div class="preview-content">
                            <h3>Sarah Williams</h3>
                            <p>Digital Marketer</p>
                            <div class="contact-info">
                                <p><i class="fas fa-envelope"></i> sarah@example.com</p>
                                <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                            </div>
                        </div>
                    </div>
                    <div class="layout-info">
                        <h3>Minimal Two</h3>
                        <p>Ultra-minimalist with focus on content</p>
                        <div class="price">
                            <?php 
                            $price = 25;
                            if(isset($_SESSION['discount'])) {
                                $discounted = $price * (1 - $_SESSION['discount']/100);
                                echo '<span class="original-price">$'.$price.'</span> $'.number_format($discounted, 2);
                            } else {
                                echo '$'.$price;
                            }
                            ?>
                        </div>
                        <button class="btn">Purchase</button>
                        <button class="btn secondary">Preview</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="referral-cta">
        <div class="container">
            <h2>Love Our Layouts? Earn With Our Referral Program!</h2>
            <p>Share your unique referral link and earn 10% commission for every purchase made through your link.</p>
            <a href="contact.php" class="btn">Get Your Referral Code</a>
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