<?php include('header.php'); ?>

<!-- HERO SLIDER -->
<section class="hero" id="hero" aria-label="Featured programmes">
    <div class="hero-track">
        <?php
        $slides = [
            ['slide-v1-1.jpg', 'B Pharma Course'],
            ['slide-v1-2.jpg', 'Pharm.D Course'],
            ['slide-v1-3.jpg', 'Ph.D, D.Pharm Course'],
            ['slide-v2-1.jpg', 'PG-M Pharma-3 - Pharmaceutics'],
            ['slide-v2-2.jpg', 'PG-M Pharma-3 - Pharmacology'],
        ];
        foreach ($slides as $i => $s): ?>
        <div class="slide<?php echo $i === 0 ? ' active' : ''; ?>" style="background-image:url(assets/images/slides/<?php echo $s[0]; ?>)">
            <div class="container">
                <div class="slide-content">
                    <h2><?php echo $s[1]; ?></h2>
                    <p>Make your studies worth living With RRCP</p>
                    <a class="btn btn-solid" href="courses-fees.php">View Course</a>
                    <button class="video-btn" type="button" data-video="https://www.youtube.com/embed/bO4RoQL9H8I?autoplay=1">
                        <span class="play">&#9654;</span>
                        <span>360&deg; Campus Tour</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="hero-arrow prev" type="button" aria-label="Previous slide">&#8249;</button>
    <button class="hero-arrow next" type="button" aria-label="Next slide">&#8250;</button>
    <div class="hero-dots"></div>
</section>

<!-- ESSENTIALS STRIP -->
<section class="essentials">
    <div class="container">
        <ul class="essentials-grid">
            <li><img src="assets/images/resources/features-style1-img-1.jpg" alt="" loading="lazy"></li>
            <li><img src="assets/images/resources/features-style1-img-2.jpg" alt="" loading="lazy"></li>
            <li><img src="assets/images/resources/features-style1-img-3.jpg" alt="" loading="lazy"></li>
            <li><img src="assets/images/resources/features-style1-img-4.jpg" alt="" loading="lazy"></li>
            <li><img src="assets/images/resources/features-style1-img-1.jpg" alt="" loading="lazy"></li>
            <li><img src="assets/images/resources/features-style1-img-2.jpg" alt="" loading="lazy"></li>
        </ul>
    </div>
</section>

<!-- WELCOME + CHAIRMAN -->
<!-- <section class="welcome">
    <div class="container welcome-grid">
        <div class="welcome-text">
            <h2>Welcome To R R College of Pharmacy</h2>
            <p>Welcome to R R College of Pharmacy, Bengaluru, a premier institution dedicated to excellence in pharmaceutical education, research, and healthcare service. Since its inception, the college has been committed to nurturing competent pharmacy professionals equipped with the knowledge, skills, and ethical values required to meet the evolving demands of the healthcare sector.</p>
            <p>At R R College of Pharmacy, we believe that education extends beyond the classroom. Our academic programs are designed to foster critical thinking, scientific inquiry, clinical competence, and lifelong learning through a balanced blend of theoretical knowledge and practical exposure. With experienced faculty, state-of-the-art laboratories, modern teaching methodologies, and strong collaborations with healthcare institutions and the pharmaceutical industry, we provide an enriching environment that empowers students to excel in their chosen careers.</p>
            <a class="btn btn-accent" href="about-college.php">Read More</a>
        </div>

        <div class="chairman" style="background-image:url(assets/images/resources/teaching-img.jpg)">
            <div class="chairman-card">
                <h3>Chairman Message</h3>
                <span class="rule"></span>
                <blockquote>&ldquo;Warm greetings from RRI! At the behest of PKM Educational Trust, RR Institutions has embarked on a mission to provide professional education&rdquo;</blockquote>
                <div class="chairman-person">
                    <img src="assets/images/resources/chairman.png" alt="Shri. Y. Raja Reddy">
                    <div><strong>Shri. Y. Raja Reddy</strong><span>Chairman</span></div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- PROGRAMS -->
<section class="section programs">
    <div class="container">
        <div class="section-head split">
            <div>
                <span class="eyebrow">Academics</span>
                <h2>Our Academic Programs</h2>
            </div>
            <a class="btn btn-outline" href="courses-fees.php">All Programs &rarr;</a>
        </div>

        <div class="cards-grid">
            <?php
            $programs = [
                ['course-1.jpg', 'B.Pharm (UG)', '4 years', 'Pass in 10+2 with 45% in Physics, Chemistry and Biology / Mathematics', 'b-pharm.php'],
                ['course-2.jpg', 'B.Pharm (Lateral Entry)', '2 years', 'Diploma in Pharmacy from an institution recognized by the Pharmacy Council of India, with 50% aggregate marks.', 'b-pharm-lateral.php'],
                ['course-3.jpg', 'M.Pharm', '2 years', 'Pass in B Pharm from a university recognized by the Pharmacy Council of India, with minimum of 55% aggregate marks or equivalent.', 'pharmaceutics.php'],
                ['course-4.jpg', 'Pharm D and Pharm D (PB)', '2 years', 'Pass in B Pharm from a university recognized by the Pharmacy Council of India, with minimum of 55% aggregate marks or equivalent.', 'pharm.d-pb.php'],
                ['course-5.jpg', 'Pharm.D (PB)', '3 years', 'BPharm from an institution recognized by the Pharmacy Council of India with minimum of 50% marks in aggregate.', 'pharm.d-pb.php'],
                ['course-2.jpg', 'Doctoral Ph.D', '3 years', 'BPharm from an institution recognized by the Pharmacy Council of India with minimum of 50% marks in aggregate.', 'doctoral-ph.d.php'],
            ];
            foreach ($programs as $p): ?>
            <article class="card program-card">
                <div class="card-img">
                    <img src="assets/images/resources/<?php echo $p[0]; ?>" alt="<?php echo $p[1]; ?>" loading="lazy">
                    <span class="tag">Courses</span>
                </div>
                <div class="card-body">
                    <span class="meta">Academic Programs</span>
                    <h3><a href="<?php echo $p[4]; ?>"><?php echo $p[1]; ?></a></h3>
                    <p><strong>Duration:</strong> <?php echo $p[2]; ?></p>
                    <p><strong>Qualification:</strong> <?php echo $p[3]; ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FACTS -->
<section class="facts" style="background-image:url(assets/images/resources/high-school-study-educamb-area-bg.jpg)">
    <div class="facts-overlay"></div>
    <div class="container">
        <div class="section-head center light">
            <h2>Most Interesting Facts</h2>
            <p>A snapshot of our campus, programs and community.</p>
        </div>
        <ul class="facts-grid">
            <li><strong class="count" data-stop="27">0</strong><span>Acres Of Campus</span></li>
            <li><strong class="count" data-stop="15">0</strong><span>Academic Programs</span></li>
            <li><strong class="count" data-stop="100">0</strong><span>Faculties</span></li>
            <li><strong class="count" data-stop="10000">0</strong><span>Students</span></li>
        </ul>
    </div>
</section>

<!-- WHY CHOOSE -->
<section class="why" style="background-image:url(assets/images/parallax-background/choose-style10-area-bg.jpg)">
    <div class="why-overlay"></div>
    <div class="container">
        <h2>Why Choose R R College of Pharmacy?</h2>
        <div class="why-grid">
            <div class="why-item">
                <h3>Experienced &amp; Dedicated Faculty</h3>
                <p>Learn from a team of highly qualified, experienced, and passionate educators committed to academic excellence and student success. Our faculty members employ innovative teaching methodologies, mentor students in research, encourage critical thinking, and provide personalized guidance to help them excel academically and professionally.</p>
            </div>
            <div class="why-item">
                <h3>State-of-the-Art Laboratories</h3>
                <p>Our well-equipped laboratories provide students with hands-on practical training using modern instruments and equipment. Designed to meet academic and industry standards, these laboratories foster experiential learning, skill development, scientific inquiry, and research across all disciplines of pharmaceutical sciences.</p>
            </div>
        </div>
    </div>
</section>

<!-- INFRASTRUCTURE CAROUSEL -->
<section class="section infra">
    <div class="container">
        <div class="section-head center">
            <h2>Infrastructure at RRCP</h2>
            <p>Facilities built to support learning, research and campus life.</p>
        </div>
        <div class="carousel" data-autoplay="4500">
            <button class="carousel-arrow prev" type="button" aria-label="Previous">&#8249;</button>
            <div class="carousel-track">
                <?php
                $infra = [
                    ['high-school-study-educamb-1.jpg', 'School Life'],
                    ['high-school-study-educamb-2.jpg', 'Our Prospects'],
                    ['high-school-study-educamb-3.jpg', 'Exam Results'],
                    ['high-school-study-educamb-4.jpg', 'Sports & Games'],
                    ['high-school-study-educamb-1.jpg', 'Academics'],
                    ['high-school-study-educamb-2.jpg', 'Library'],
                    ['high-school-study-educamb-3.jpg', 'Research & Education'],
                ];
                foreach ($infra as $f): ?>
                <a class="carousel-item infra-card" href="#">
                    <img src="assets/images/resources/<?php echo $f[0]; ?>" alt="<?php echo htmlspecialchars($f[1]); ?>" loading="lazy">
                    <span class="infra-title"><?php echo htmlspecialchars($f[1]); ?></span>
                </a>
                <?php endforeach; ?>
            </div>
            <button class="carousel-arrow next" type="button" aria-label="Next">&#8250;</button>
        </div>
    </div>
</section>

<!-- EVENTS -->
<section class="section events">
    <div class="container">
        <div class="section-head center">
            <h2>Latest From Our Events</h2>
            <p>News and highlights from around the campus.</p>
        </div>
        <div class="cards-grid three">
            <?php
            $events = [
                ['blog-v1-1.jpg', 'Nov 25, 2025', 'University of Educamb Award 4 Honorary Degrees'],
                ['blog-v1-1.jpg', 'Nov 25, 2025', 'University of Educamb Award 4 Honorary Degrees'],
                ['blog-v1-2.jpg', 'Nov 25, 2025', 'University of Educamb Award 4 Honorary Degrees'],
            ];
            foreach ($events as $e): ?>
            <article class="card event-card">
                <div class="card-img">
                    <img src="assets/images/blog/<?php echo $e[0]; ?>" alt="" loading="lazy">
                    <span class="tag"><?php echo $e[1]; ?></span>
                </div>
                <div class="card-body">
                    <h3><a href="news-events.php"><?php echo $e[2]; ?></a></h3>
                    <a class="read-more" href="news-events.php">Read More &rarr;</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" style="background-image:url(assets/images/parallax-background/testimonial-style10-area-bg.jpg)">
    <div class="testimonials-overlay"></div>
    <div class="container">
        <div class="section-head light">
            <h2>Feedback From Parents</h2>
            <p>Trouble that are bound to ensue; and equal blame belongs to those who fail.</p>
        </div>
        <div class="carousel">
            <button class="carousel-arrow prev" type="button" aria-label="Previous">&#8249;</button>
            <div class="carousel-track">
                <?php
                $tests = [
                    ['testimonial-v5-1.jpg', 'Nora Penelope', 'Bank Manager', 'This was a very immersive and interesting course a lot of self learning to be done on your own to really understand.'],
                    ['testimonial-v5-2.jpg', 'Silverster Scoot', 'Lawyer', 'Hi, During my study of four years in Educamb, I came across various people of different country & culture opportunities to groom myself.'],
                    ['testimonial-v5-3.jpg', 'Arlo Sebastian', 'Web Designer', 'This was a very immersive and interesting course a lot of self learning to be done on your own to really understand.'],
                ];
                foreach ($tests as $t): ?>
                <div class="carousel-item testimonial-card">
                    <span class="quote-mark">&ldquo;</span>
                    <p><?php echo htmlspecialchars($t[3]); ?></p>
                    <div class="testimonial-person">
                        <img src="assets/images/testimonial/<?php echo $t[0]; ?>" alt="<?php echo $t[1]; ?>" loading="lazy">
                        <div><strong><?php echo $t[1]; ?></strong><span><?php echo $t[2]; ?></span></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-arrow next" type="button" aria-label="Next">&#8250;</button>
        </div>
    </div>
</section>

<!-- PLACEMENTS -->
<section class="section partners">
    <div class="container">
        <div class="section-head center">
            <h2>Top Companies are Hiring</h2>
            <p>Our students are placed with leading pharmaceutical and healthcare organisations.</p>
        </div>
        <div class="partners-box">
            <img src="assets/images/placement.jpg" alt="Placement partners" loading="lazy">
        </div>
    </div>
</section>

<!-- VIDEO MODAL -->
<div class="modal" id="videoModal" aria-hidden="true">
    <div class="modal-backdrop"></div>
    <div class="modal-box">
        <button class="modal-close" type="button" aria-label="Close video">&times;</button>
        <div class="modal-frame"></div>
    </div>
</div>

<?php include('footer.php'); ?>