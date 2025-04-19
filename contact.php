<?php 
include 'referral.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $contactMethod = isset($_POST['contact_method']) ? $_POST['contact_method'] : [];
    $message = htmlspecialchars($_POST['message']);
    $referralCode = isset($_POST['referral_code']) ? htmlspecialchars($_POST['referral_code']) : '';
    
    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = 'Name is required';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email address';
    if (empty($message)) $errors[] = 'Message is required';
    
    if (empty($errors)) {
        // Prepare email content
        $to = 'your-email@example.com'; // Change to your email
        $subject = 'New Contact from ProfileLayouts';
        
        $contactMethods = !empty($contactMethod) ? implode(', ', $contactMethod) : 'Not specified';
        
        $emailContent = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Preferred Contact Methods:</strong> {$contactMethods}</p>
            <p><strong>Referral Code:</strong> {$referralCode}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";
        
        // Email headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: {$email}\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        
        // Send email
        if (mail($to, $subject, $emailContent, $headers)) {
            $successMessage = 'Thank you! Your message has been sent.';
            
            // If referral code was provided, record it
            if (!empty($referralCode)) {
                // In a real application, you would save this to your database
                // $db->query("INSERT INTO referral_uses (referral_code, referrer_id, contact_email) VALUES (...)");
            }
        } else {
            $errors[] = 'There was a problem sending your message. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ProfileLayouts</title>
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
                    <li><a href="contact.php" class="active">Contact</a></li>
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

    <section class="contact-hero">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Have questions? Get in touch with our team</p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-form-container">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($successMessage)): ?>
                    <div class="alert alert-success">
                        <?php echo $successMessage; ?>
                    </div>
                <?php else: ?>
                    <form action="contact.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" required value="<?php echo isset($name) ? $name : ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required value="<?php echo isset($email) ? $email : ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Preferred Contact Method</label>
                            <div class="checkbox-group">
                                <label>
                                    <input type="checkbox" name="contact_method[]" value="Email" <?php echo (isset($contactMethod) && in_array('Email', $contactMethod)) ? 'checked' : ''; ?>> 
                                    Email
                                </label>
                                <label>
                                    <input type="checkbox" name="contact_method[]" value="WhatsApp" <?php echo (isset($contactMethod) && in_array('WhatsApp', $contactMethod)) ? 'checked' : ''; ?>> 
                                    WhatsApp
                                </label>
                                <label>
                                    <input type="checkbox" name="contact_method[]" value="Telegram" <?php echo (isset($contactMethod) && in_array('Telegram', $contactMethod)) ? 'checked' : ''; ?>> 
                                    Telegram
                                </label>
                                <label>
                                    <input type="checkbox" name="contact_method[]" value="Phone Call" <?php echo (isset($contactMethod) && in_array('Phone Call', $contactMethod)) ? 'checked' : ''; ?>> 
                                    Phone Call
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message*</label>
                            <textarea id="message" name="message" required><?php echo isset($message) ? $message : ''; ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="referral_code">Referral Code (if any)</label>
                            <input type="text" id="referral_code" name="referral_code" value="<?php echo isset($referralCode) ? $referralCode : ''; ?>">
                        </div>
                        
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                <?php endif; ?>
            </div>
            
            <div class="contact-info">
                <h2>Other Ways to Reach Us</h2>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <span>support@profilelayouts.com</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <span>+1 (555) 123-4567</span>
                </div>
                <div class="info-item">
                    <i class="fab fa-whatsapp"></i>
                    <span>+1 (555) 123-4567</span>
                </div>
                <div class="info-item">
                    <i class="fab fa-telegram"></i>
                    <span>@ProfileLayoutsSupport</span>
                </div>
                
                <div class="refer-earn">
                    <h3>Refer & Earn</h3>
                    <p>Share your referral code and earn 10% commission for every successful purchase!</p>
                    <div class="referral-code-box">
                        <span>Your Referral Code:</span>
                        <strong><?php echo $_SESSION['referral_code']; ?></strong>
                        <button class="btn copy-btn" data-code="<?php echo $_SESSION['referral_code']; ?>">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                    </div>
                    <div class="social-share">
                        <button class="btn share-btn whatsapp">
                            <i class="fab fa-whatsapp"></i> Share on WhatsApp
                        </button>
                        <button class="btn share-btn telegram">
                            <i class="fab fa-telegram"></i> Share on Telegram
                        </button>
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
    <script>
        // Copy referral code
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const code = this.getAttribute('data-code');
                navigator.clipboard.writeText(code).then(() => {
                    this.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-copy"></i> Copy';
                    }, 2000);
                });
            });
        });
        
        // Share referral code
        document.querySelectorAll('.share-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const code = '<?php echo $_SESSION['referral_code']; ?>';
                const message = `Check out ProfileLayouts for amazing personal detail page templates! Use my referral code ${code} for 10% off your purchase.`;
                
                if (this.classList.contains('whatsapp')) {
                    window.open(`https://wa.me/?text=${encodeURIComponent(message)}`, '_blank');
                } else if (this.classList.contains('telegram')) {
                    window.open(`https://t.me/share/url?url=${encodeURIComponent(window.location.href)}&text=${encodeURIComponent(message)}`, '_blank');
                }
            });
        });
    </script>
</body>
</html>