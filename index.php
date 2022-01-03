<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Omnifood is an AI-powered food subscription that will make you eat healthy again, 365 days per year. It's tailored to your personal tastes and nutritional needs." />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="img/favicon.png" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/general.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>High Knowledge Technology</title>
</head>

<body>
  <header class="header">
    <a href="index.php">
      <img class="logo" alt="Logo" src="./img/logo.png" />
    </a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="pages/products/products.php" class="main-nav-link">Products</a></li>
        <li><a href="pages/cart/cart.php" class="main-nav-link">View Cart</a></li>
        <li><a href="pages/contact/contact.php" class="main-nav-link">Contact</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="./pages/orders/orders.php" class="main-nav-link">My Orders</a></li>';
          echo '<li><a href="./pages/pc-care/pc-care.php" class="main-nav-link">My Device</a></li>';
          echo '<li><a href="pages/myAccount/account.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="pages/login/login.php" class="main-nav-link">Log In</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="section-hero">
      <div class="hero">
        <div class="hero-text-box animate__animated animate__fadeInLeft">
          <h1 class="heading-primary">No one care about your PC than us</h1>
          <p class="hero-description ">
            Build your very own PC empire, boutique creations that would be
            the envy of any enthusiast. With an ever-expanding marketplace
            full of real-world components you can finally stop dreaming of
            that ultimate PC and get out there, build it!
          </p>
          <a href="pages/products/products.php" class="btn btn--full margin-right-sm ">Start buying now</a>

          <a href="pages/login/login.php" class="btn btn--outline animate__animated animate__fadeIn">Log in </a>
          <div class="delivered-meals ">
            <div class="delivered-imgs">
              <img src="img/customers/customer-1.jpg" alt="Customer photo" />
              <img src="img/customers/customer-2.jpg" alt="Customer photo" />
              <img src="img/customers/customer-3.jpg" alt="Customer photo" />
              <img src="img/customers/customer-4.jpg" alt="Customer photo" />
              <img src="img/customers/customer-5.jpg" alt="Customer photo" />
              <img src="img/customers/customer-6.jpg" alt="Customer photo" />
            </div>
            <p class="delivered-text">
              <span>100000+</span> customers last year!
            </p>
          </div>
        </div>
        <div class="hero-img-box animate__animated animate__fadeInDown">
          <picture>
            <source srcset="img/hero.webp" type="image/webp" />
            <source srcset="img/hero-min.png" type="image/png" />
            <img src="img/hero-min.png" class="hero-img" alt="PC Setup" />
          </picture>
        </div>
      </div>
    </section>
    <section class="section-featured">
      <div class="container scroll-animations">
        <div class="animate__animated">
          <h2 class="heading-featured-in">As featured in</h2>
          <div class="logos">
            <img src="img/logos/techcrunch.png" alt="Techcrunch logo" />
            <img src="img/logos/business-insider.png" alt="Business Insider logo" />
            <img src="img/logos/the-new-york-times.png" alt="The New York Times logo" />
            <img src="img/logos/forbes.png" alt="Forbes logo" />
            <img src="img/logos/usa-today.png" alt="USA Today logo" />
          </div>
        </div>
      </div>
    </section>

    <section class="section-how" id="how">
      <div class="container">
        <span class="subheading">Features</span>
        <h2 class="heading-primary">Your dream PC in 3 simple steps</h2>
      </div>

      <div class="container scroll-animations">
        <div class="step">
          <!-- STEP 01 -->
          <div class="step-text-box animate__animated">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">We list Components</h3>
            <p class="step-description">
              The first thing we do at Build My PC is to search for various
              computer components, finalize them, and add them to our website.
              We always try our best to add and update the latest components for
              you. It can be really helpful for people who came to our Build My
              PC website just to check the compatibility of the latest products
              before buying them.
            </p>
          </div>

          <div class="step-img-box">
            <img src="img/features/features1.jpg" class="step-img" alt="PC build components" />
          </div>
        </div>

        <div class="step step-2">
          <!-- STEP 02 -->
          <div class="step-img-box step-img-box-order">
            <img src="img/features/features2.png" class="step-img" alt="Build your PC" />
          </div>
          <div class="step-text-box step-text-box-order animate__animated">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">Build Your PC</h3>
            <p class="step-description">
              What’s the reason you’re making this computer? Is it because you
              want the best gaming PC? Are you looking for something that can
              handle your creative work, or just want a build that can manage
              common web browsing? Or do you want a machine that’s as flashy as
              a nightclub? Maybe it’s a combination of these. In any case, your
              motivations will influence your decisions when shopping for
              components.
            </p>
          </div>
        </div>

        <div class="step">
          <!-- STEP 03 -->
          <div class="step-text-box animate__animated">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">Compare And Share</h3>
            <p class="step-description">
              Laborum cillum nulla id enim exercitation. Quis est tempor veniam
              occaecat cillum non incididunt culpa eu adipisicing do. Duis elit
              proident exercitation exercitation laboris eu ut officia laboris
              pariatur id.
            </p>
          </div>
          <div class="step-img-box">
            <img src="img/features/features3.jpg" class="step-img" alt="Share your PC build" />
          </div>
        </div>
      </div>
    </section>

    <section class="section-meals" id="meals">
      <div class="container center-text">
        <span class="subheading">About us</span>
        <h4 class="heading-secondary">
          HKT (High knowledge technology) is a company founded by a group of 3
          young programmers and students at INSA Center Val de Loire. With
          years of experience in PC building as well as giving PC advice, our
          goal is to bring everyone a powerful and personalized PC set, we
          always strive to give our customers a unique experience. The most
          comfortable experience when coming to us.
        </h4>
      </div>

      <div class="container-row margin-bottom-md">
        <div class="meal">
          <img src="img/AboutUs/hung.jpg" class="meal-img" alt="Japanese Gyozas" />
          <div class="meal-content">
            <div class="meal-tags">
              <span class="tag tag--vegetarian">Front-end</span>
            </div>
            <p class="meal-title">NGUYEN Khac Nhat Hung</p>
          </div>
        </div>

        <div class="meal">
          <img src="img/AboutUs/khanh.png" class="meal-img" alt="Avocado Salad" />
          <div class="meal-content">
            <div class="meal-tags">
              <span class="tag tag--vegan">Full Stack</span>
              <span class="tag tag--paleo">Tester</span>
            </div>
            <p class="meal-title">TRAN Duc Khanh</p>
          </div>
        </div>

        <div class="meal">
          <img src="img/AboutUs/thao.jpg" class="meal-img" alt="Avocado Salad" />
          <div class="meal-content">
            <div class="meal-tags">
              <span class="tag tag--vegan">Modbus</span>
            </div>
            <p class="meal-title">NGUYEN Van Thao</p>
          </div>
        </div>
      </div>


    </section>

    <section class="section-testimonials scroll-animations" id="testimonials">
      <div class="testimonials-container animate__animated">
        <span class="subheading">Reviews</span>
        <h2 class="heading-primary">Once you try it, you can't go back</h2>

        <div class="testimonials">
          <figure class="testimonial">
            <img class="testimonial-img" alt="Photo of customer Dave Bryson" src="img/customers/dave.jpg" />
            <blockquote class="testimonial-text">
              “Plenty here to admire for both novice and veteran PC builders
              alike”
            </blockquote>
            <p class="testimonial-name">&mdash; Enviosity</p>
          </figure>

          <figure class="testimonial">
            <img class="testimonial-img" alt="Photo of customer Ben Hadley" src="img/customers/ben.jpg" />
            <blockquote class="testimonial-text">
              “Deserves attention both from budding builders and experienced
              enthusiasts”
            </blockquote>
            <p class="testimonial-name">&mdash; Shroud</p>
          </figure>

          <figure class="testimonial">
            <img class="testimonial-img" alt="Photo of customer Steve Miller" src="img/customers/steve.jpg" />
            <blockquote class="testimonial-text">
              HKT is a life saver!
            </blockquote>
            <p class="testimonial-name">&mdash; Steve Miller</p>
          </figure>

          <figure class="testimonial">
            <img class="testimonial-img" alt="Photo of customer Hannah Smith" src="img/customers/hannah.jpg" />
            <blockquote class="testimonial-text">
              I got HKT for the whole family, and it frees up so much time!
            </blockquote>
            <p class="testimonial-name">&mdash; Hannah Smith</p>
          </figure>
        </div>
      </div>

      <div class="gallery">
        <figure class="gallery-item">
          <img src="img/gallery/gallery-1.jpg" alt="Photo of beautifully
            arranged food" />
          <!-- <figcaption>Caption</figcaption> -->
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-2.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-3.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-4.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-5.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-6.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-7.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-8.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-9.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-10.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-11.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
        <figure class="gallery-item">
          <img src="img/gallery/gallery-12.jpg" alt="Photo of beautifully
            arranged food" />
        </figure>
      </div>
    </section>

    <section class="section-cta" id="cta">
      <div class="container">
        <div class="cta">
          <div class="cta-text-box">
            <h2 class="heading-secondary">Get your first PC now!</h2>
            <p class="cta-text">
              Start building PC today. You can cancel or pause anytime.
            </p>

            <form class="cta-form" name="sign-up" netlify>
              <div class="flex">
                <label for="full-name">Full Name</label>
                <input id="full-name" type="text" placeholder="John Smith" name="full-name" required />
              </div>

              <div class="flex">
                <label for="email">Email address</label>
                <input id="email" type="email" placeholder="me@example.com" name="email" required />
              </div>

              <div class="flex">
                <label for="select-where">Where did you hear from us?</label>
                <select id="select-where" name="select-where" required>
                  <option value="">Please choose one option:</option>
                  <option value="friends">Friends and family</option>
                  <option value="youtube">YouTube video</option>
                  <option value="podcast">Podcast</option>
                  <option value="ad">Facebook ad</option>
                  <option value="others">Others</option>
                </select>
              </div>

              <button class="btn btn--form flex">Sign up now</button>
            </form>
          </div>
          <div class="cta-img-box" role="img" aria-label="Woman enjoying food"></div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container-footer grid grid--footer">
      <div class="logo-col col">
        <a href="#" class="footer-logo">
          <img class="logo-footer" alt="HKGT logo" src="./img/logo.png" />
        </a>

        <ul class="social-links">
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
        </ul>

        <p class="copyright">
          Copyright &copy; <span class="year">2027</span> by HKT, Inc. All
          rights reserved.
        </p>
      </div>

      <div class="address-col col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p class="address">15 avenue Maréchal Foch, 41000 Blois, France</p>
          <p>
            <a class="footer-link" href="tel:+33 123 45 67 89">+33 123 45 67 89</a><br />
            <a class="footer-link" href="mailto:hktech.iot@gmail.com">hktech.iot@gmail.com</a>
          </p>
        </address>
      </div>

      <nav class="nav-col col ">
        <p class="footer-heading">Account</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Create account</a></li>
          <li><a class="footer-link" href="#">Sign in</a></li>
          <li><a class="footer-link" href="#">iOS app</a></li>
          <li><a class="footer-link" href="#">Android app</a></li>
        </ul>
      </nav>

      <nav class="nav-col col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">About HKT</a></li>
          <li><a class="footer-link" href="#">For Business</a></li>
          <li><a class="footer-link" href="#">Partners</a></li>
          <li><a class="footer-link" href="#">Careers</a></li>
        </ul>
      </nav>

      <nav class="nav-col col">
        <p class="footer-heading">Resources</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Help center</a></li>
          <li><a class="footer-link" href="#">Privacy & terms</a></li>
        </ul>
      </nav>
    </div>
  </footer>
  <script>
    $(document).ready(function() {
      // Check if element is scrolled into view
      function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return elemBottom <= docViewBottom && elemTop >= docViewTop;
      }
      // If element is scrolled into view, fade it in
      $(window).scroll(function() {
        $(".scroll-animations .animate__animated").each(function() {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass("animate__zoomIn");
          }
        });
      });

      // Click Animations
      $("button").on("click", function() {
        /*
        If any input is empty make it's border red and shake it. After the animation is complete, remove the shake and animated classes so that the animation can repeat.
        */

        // Check name input
        if ($("#name").val() === "") {
          $("#name")
            .addClass("form-error animated shake")
            .one(
              "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
              function() {
                $(this).removeClass("animated shake");
              }
            );
        } else {
          $("#name").removeClass("form-error");
        }

        // Check email input
        if ($("#email").val() === "") {
          $("#email")
            .addClass("form-error animated shake")
            .one(
              "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
              function() {
                $(this).removeClass("animated shake");
              }
            );
        } else {
          $("#email").removeClass("form-error");
        }

        // Check message textarea
        if ($("#message").val() === "") {
          $("#message")
            .addClass("form-error animated shake")
            .one(
              "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
              function() {
                $(this).removeClass("animated shake");
              }
            );
        } else {
          $("#message").removeClass("form-error");
        }
      });

      // Activate hinge effect when h4 is click in last section
      $(".funky-animations h4").on("click", function() {
        $(this)
          .addClass("animated hinge")
          .one(
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
            function() {
              $(this).removeClass("animated hinge");
            }
          );
      });
    });
  </script>
</body>

</html>