@extends('layouts.app')

@section('content')
<main class="pageWrapper" id="sticky-anchor">
    <section class="heroSection" id="home">
        <div class="heroPanel">
            <div class="container">
                <div class="row align-items-center gy-5 mobile-flex">
                    <div class="col-md-6">
                        <div class="heroContent">
                            <span class="eyebrow">Inspire · Connect · Empower </span>
                            <h1>Empowering Women <br>
                                Through Learning,<br>
                                Leadership & Networking.</h1>
                            <p>Connect with Women Who Inspire Growth.</p>
                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <a href="javascript:void(0)" class="btn btn-red btnPrimary">
                                    Request Your Invitation
                                </a>
                                <a href="javascript:void(0)" class="btn btn-red btnOutline">
                                    Attend A Guest Session
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="heroVisual" aria-hidden="true">
                            <div class="circleText">
                                <svg viewBox="0 0 500 500">
                                    <defs>
                                        <path id="curve" d="M 90 250 A 160 160 0 1 1 410 250" />
                                    </defs>
                                    <text>
                                        <textPath href="#curve" startOffset="50%" text-anchor="middle">
                                            TOGETHER WE GROW • TOGETHER WE RISE • TOGETHER WE GROW •
                                        </textPath>
                                    </text>
                                </svg>
                            </div>
                            <div class="heroArch">
                                <img src="{{ asset('assets/images/light-logo-name.png') }}" class="heroLogo img-fluid" alt="IRAAYA" width="923" height="1000" loading="eager" fetchpriority="high">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="introSection sectionSpace text-center" id="about">
        <div class="container">
            <div class="sectionIntro mx-auto animateThis fadeIn">
                <span class="eyebrow colorPrimary">About Iraaya World</span>
                <h2>A Community for Women Who <br> <span>Learn and Inspire</span></h2>
                <p>Iraaya World is a community that is a precision built ecosystem for women entrepreneurs who are
                    ready to grow their business, sharpen their skills, and find their people. Every element from
                    our structured referral system to our curated learning sessions is designed to deliver real,
                    measurable results.</p>
            </div>
        </div>
    </section>

    <section class="visionMission">
        <div class="container-fluid px-0">
            <div class="goldBand">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-4 order-2 order-lg-1 animateThis slideRight">
                            <div class="miniBlock miniBlock-left text-lg-end">
                                <span>Vision</span>
                                <p>
                                    To build a community where every woman <br>
                                    becomes part of another woman’s success story
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 animateThis fadeGrow position-relative z-1">
                            <div class="womenCluster">
                                <img src="{{ asset('assets/images/1group.webp') }}" alt="" width="700" height="727" loading="lazy" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 order-3 order-lg-3 animateThis slideLeft">
                            <div class="miniBlock miniBlock-right">
                                <span>Mission</span>
                                <p>
                                    To create a community where every woman entrepreneur has the right network, the
                                    right knowledge, and a platform where she truly belongs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <blockquote class="goldQuote animateThis fadeIn">"You have the skill. You have the ambition. You just need the circle."</blockquote>
                </div>
            </div>
        </div>
    </section>

    <section class="statsSection">
        <div class="container">
            <div class="row row-cols-2 row-cols-lg-4 g-4 text-center">
                <div class="col animateThis fadeIn">
                    <div class="statValue"><span class="countNo" data-count="24">0</span></div>
                    <div class="statLabel">POWER SESSIONS ANNUALLY</div>
                </div>
                <div class="col animateThis fadeIn">
                    <div class="statValue">0<span class="countNo" data-count="01"></span></div>
                    <div class="statLabel">CATEGORY PER MEMBER</div>
                </div>
                <div class="col animateThis fadeIn">
                    <div class="statValue"><span class="countNo" data-count="500">0</span>+</div>
                    <div class="statLabel">WOMEN LEADERS IN NETWORK</div>
                </div>
                <div class="col animateThis fadeIn">
                    <div class="statValue"><span class="countNo" data-count="360">0</span>&deg;</div>
                    <div class="statLabel">BUSINESS · SKILLS · PERSONAL GROWTH</div>
                </div>
            </div>
        </div>
    </section>

    <section class="marquee-section">
        <div class="marquee">
            <div class="marquee-content">
                <span>INSPIRE • CONNECT • EMPOWER • BUILD YOUR CIRCLE • BUILD YOUR LEGACY • GROW TOGETHER • RISE TOGETHER • WOMEN WHO SUPPORT WOMEN •</span>
                <span>INSPIRE • CONNECT • EMPOWER • BUILD YOUR CIRCLE • BUILD YOUR LEGACY • GROW TOGETHER • RISE TOGETHER • WOMEN WHO SUPPORT WOMEN •</span>
            </div>
        </div>
    </section>

    <section class="foundersSection sectionSpace" id="founders">
        <div class="">
            <div class="redPanel text-center">
                <div class="sectionIntro light mx-auto animateThis fadeIn">
                    <span class="eyebrow">Founders</span>
                    <h2>Three Worlds. One Vision.</h2>
                    <p class="founderText">Iraaya World is not just a networking platform. It is a dynamic ecosystem
                        built for women entrepreneurs who aspire to grow, lead, and thrive. Inspired by a shared
                        belief in the power of connection, its founders created a community where ambitious women
                        can learn from one another, build meaningful relationships, and access opportunities for
                        growth. Every experience within Iraaya World is designed to foster collaboration, inspire
                        confidence, and drive measurable success.
                    </p>
                </div>

                <div class="row g-4 mt-3 justify-content-center foundersCards">
                    <div class="col-lg-4 col-md-6 order-1 order-lg-2 animateThis slideTop">
                        <article class="founderCard">
                            <div class="founderPhoto">
                                <img src="{{ asset('assets/images/founder/tannaz.jpg') }}" class="img-fluid" alt="Tannaz Irani" width="500" height="650" loading="lazy">
                            </div>
                            <div class="founder-name">
                                <h3>Tannaz Irani</h3>
                                <span>Actress · TEDx Speaker · Transformational Coach</span>
                            </div>
                            <a href="#" class="founderBtn" data-bs-toggle="modal" data-bs-target="#tannazModal">
                                View Profile
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </article>
                    </div>

                    <div class="col-lg-4 col-md-6 order-2 order-lg-1 animateThis slideTop">
                        <article class="founderCard">
                            <div class="founderPhoto">
                                <img src="{{ asset('assets/images/founder/tulsi.jpg') }}" width="985" height="974" class="img-fluid" alt="Tulsi Raithatha">
                            </div>
                            <div class="founder-name">
                                <h3>Tulsi Raithatha</h3>
                                <span>Marketing Strategist · Management Expert · Entrepreneur</span>
                            </div>
                            <a href="#" class="founderBtn" data-bs-toggle="modal" data-bs-target="#tulsiModal">
                                View Profile
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </article>
                    </div>

                    <div class="col-lg-4 col-md-6 order-3 order-lg-3 animateThis slideTop">
                        <article class="founderCard">
                            <div class="founderPhoto">
                                <img src="{{ asset('assets/images/founder/myiesha.jpg') }}" width="985" height="974" class="img-fluid" alt="Myiesha Chanana">
                            </div>
                            <div class="founder-name">
                                <h3>Myiesha Chanana</h3>
                                <span>Entrepreneur, Aspiring Lawyer</span>
                            </div>
                            <a href="#" class="founderBtn" data-bs-toggle="modal" data-bs-target="#myieshaModal">
                                View Profile
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </article>
                    </div>
                </div>

                <div class="modal fade founderModal" id="tannazModal" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            <div class="row g-0 align-items-center">
                                <div class="col-lg-5">
                                    <div class="modalImage">
                                        <img src="{{ asset('assets/images/founder/tannaz.jpg') }}" width="985" height="974" alt="Tannaz Irani">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="modalContent">
                                        <h3>Tannaz Irani</h3>
                                        <span>Actress · TEDx Speaker · Transformational Coach</span>
                                        <p>Three decades in the entertainment industry. A TEDx speaker, NLP practitioner, and transformational coach who turned personal battles into a mission of healing and empowerment.</p>
                                        <p>Tannaz has inspired hundreds of women to rebuild their lives from within and built Iraaya World to give every woman the stage she deserves. Her journey is proof that setbacks can become stepping stones when purpose leads the way.</p>
                                        <blockquote>“Success is no longer just about achievement. It is about awakening power, creating legacy, and becoming the woman who opens doors for other women to walk through.”</blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade founderModal" id="tulsiModal" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            <div class="row g-0 align-items-center">
                                <div class="col-lg-5">
                                    <div class="modalImage">
                                        <img src="{{ asset('assets/images/founder/tulsi.jpg') }}" width="985" height="974" alt="Tulsi Raithatha">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="modalContent">
                                        <h3>Tulsi Raithatha</h3>
                                        <span>Marketing Strategist · Management Expert · Entrepreneur</span>
                                        <p>A seasoned brand builder who has created strategy for companies worth crores. Tulsi understands that brilliant women need more than connections—they need structure, accountability, and a referral ecosystem that works even when they are not in the room.</p>
                                        <p>She designed Iraaya World like a growth engine, helping women transform relationships into opportunities and ambition into measurable growth.</p>
                                        <blockquote>“You don't need more connections. You need a better system. And I built one.”</blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade founderModal" id="myieshaModal" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            <div class="row g-0 align-items-center">
                                <div class="col-lg-5">
                                    <div class="modalImage">
                                        <img src="{{ asset('assets/images/founder/myiesha.jpg') }}" width="985" height="974" alt="Myiesha Chanana">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="modalContent">
                                        <h3>Myiesha Chanana</h3>
                                        <span>Entrepreneur, Aspiring Lawyer</span>
                                        <p>Myiesha Chanana, a law student, entrepreneur, and women's advocate, whose vision is as sharp as her conviction that women are stronger when they stand together.</p>
                                        <p>Grounded in the discipline of law and driven by an unshakeable belief in equality and opportunity, Myiesha recognised early on that professional success for women isn't just about individual achievement, it is about building ecosystems where every woman has access to the right people, the right opportunities, and the right support.</p>
                                        <p>Her belief became the foundation of this initiative, a space where women in business come together not just to network, but to truly invest in each other's growth, amplify each other's voices, and open doors that have for too long remained closed.</p>
                                        <blockquote>“This initiative is not just a project. It is a movement, one rooted in the belief that when women collaborate, they don't just grow businesses. They change the world.”</blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offerSection" id="offer">
        <div class="offerGrid">
            <div class="offerLead animateThis slideRight d-order-1 m-order-1">
                <span class="eyebrow" style="color:#000;">WHAT WE OFFER</span>
                <h2>A Growth System.<br> Not a Social Club.</h2>
                <p>24 power sessions a year. Structured referrals. Expert learning. Personal transformation. Ambitious women deserve more than a room; they deserve a system.</p>
                <a href="javascript:void(0)" class="btn btn-red">Apply For Membership</a>
            </div>
            <div class="offerTile animateThis slideRight d-order-2 m-order-4">
                <div class="icon">
                    <img src="{{ asset('assets/images/icon/personal.png') }}" alt="Personal Transformation" width="512" height="512" class="img-fluid">
                </div>
                <h3>BUSINESS GROWTH</h3>
                <p>12 structured business growth sessions a year built around referrals that actually convert, expert conversations that move the needle, and the mindset work that makes it all stick.</p>
            </div>
            <div class="offerImg animateThis slideTop d-order-3 m-order-4">
                <img src="{{ asset('assets/images/learning.jpg') }}" alt="Learning & Training">
            </div>
            <div class="offerTile animateThis slideTop d-order-4 m-order-7">
                <div class="icon">
                    <img src="{{ asset('assets/images/icon/personal.png') }}" width="512" height="512" class="img-fluid" alt="Personal Transformation">
                </div>
                <h3>PERSONAL TRANSFORMATION</h3>
                <p>12 sessions a year devoted to art, wellness, and the life that makes the work worth it. A space where every woman feels seen, valued, and celebrated.</p>
            </div>
            <div class="offerImg animateThis slideTop d-order-5 m-order-2">
                <img src="{{ asset('assets/images/business.jpg') }}" width="700" height="700" loading="lazy" alt="Business Growth">
            </div>
            <div class="offerTile animateThis slideTop d-order-6 m-order-5">
                <div class="icon">
                    <img src="{{ asset('assets/images/icon/learning.png') }}" alt="Learning & Training" width="512" height="512" class="img-fluid">
                </div>
                <h3>LEARNING & TRAINING</h3>
                <p>Curated masterclasses and peer learning circles with access to industry leaders who have already built what you are working toward.</p>
            </div>
            <div class="offerImg animateThis slideTop d-order-7 m-order-6">
                <img src="{{ asset('assets/images/personal.jpg') }}" alt="Personal Transformation">
            </div>
        </div>
    </section>

    <section class="builtSection sectionSpace" id="how">
        <div class="builtCard">
            <div class="builtLeft">
                <div class="builtImage">
                    <img src="{{ asset('assets/images/how.jpg') }}" width="768" height="766" class="img-fluid" loading="lazy" alt="">
                </div>
                <a href="javascript:void(0)" class="btn btnPrimary btn-red">Apply For Membership</a>
            </div>
            <div class="builtRight">
                <div class="builtCircleText">
                    <svg viewBox="0 0 300 300">
                        <defs>
                            <path id="circlePath" d="M150,150 m-100,0 a100,100 0 1,1 200,0 a100,100 0 1,1 -200,0" />
                        </defs>
                        <text>
                            <textPath href="#circlePath">• Where Ambitious Women Belong • Where Ambitious Women Belong •</textPath>
                        </text>
                    </svg>
                </div>
                <h2>How Iraaya World Works</h2>
                <div class="timeline">
                    <div class="timelineLine">
                        <span class="timelineProgress"></span>
                    </div>
                    <div class="timelineItem active">
                        <div class="build-head">
                            <div class="iconWrap"><i class="fa-solid fa-users"></i></div>
                            <div class="itemTitle">30–50 Members <br> PER CIRCLE</div>
                        </div>
                        <div class="itemDesc">Quality over quantity. Every circle is curated for complementary strengths and zero internal competition.</div>
                    </div>
                    <div class="timelineItem">
                        <div class="build-head">
                            <div class="iconWrap"><i class="fa-regular fa-star"></i></div>
                            <div class="itemTitle">1 CATEGORY PER <br> MEMBER</div>
                        </div>
                        <div class="itemDesc">Your business category belongs exclusively to you. Your space is protected. No competition within your circle.</div>
                    </div>
                    <div class="timelineItem">
                        <div class="build-head">
                            <div class="iconWrap"><i class="fa-regular fa-hourglass-half"></i></div>
                            <div class="itemTitle">FORTNIGHTLY <br> SESSIONS</div>
                        </div>
                        <div class="itemDesc">Every session is purposeful, focused on referrals, learning, and intentional connections. No filler. Real results.</div>
                    </div>
                    <div class="timelineItem">
                        <div class="build-head">
                            <div class="iconWrap"><i class="fa-regular fa-handshake"></i></div>
                            <div class="itemTitle">STRUCTURED <br> REFERRAL SYSTEM</div>
                        </div>
                        <div class="itemDesc">Trust led referrals. A built-in ecosystem that actively grows your business.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="circleSection sectionSpace">
        <div class="circleHero">
            <div class="container">
                <div class="circleTitle animateThis fadeIn">
                    <span class="eyebrow">Join The Circle</span>
                    <h2>Who Belongs in an <br> Iraaya World Circle?</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-4 circleCards">
                <div class="col-md-6 col-xl-3 animateThis slideTop">
                    <article>
                        <div class="circlePhoto">
                            <img src="{{ asset('assets/images/ambitious.jpg') }}" alt="Ambitious Professional">
                        </div>
                        <h3>AMBITIOUS PROFESSIONALS</h3>
                        <p>This is built for women who own their path: a product, a service, or a practice.</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3 animateThis slideTop">
                    <article>
                        <div class="circlePhoto">
                            <img src="{{ asset('assets/images/present.jpg') }}" alt="Present and Committed">
                        </div>
                        <h3>PRESENT & COMMITTED</h3>
                        <p>Fortnightly sessions are the heartbeat of the circle. Consistent attendance is what builds real trust and real referrals</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3 animateThis slideTop">
                    <article>
                        <div class="circlePhoto">
                            <img src="{{ asset('assets/images/one.jpg') }}" alt="One Per Category">
                        </div>
                        <h3>ONE PER CATEGORY</h3>
                        <p>Each circle accepts only one member per business category. Your space belongs to you alone.</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3 animateThis slideTop">
                    <article>
                        <div class="circlePhoto">
                            <img src="{{ asset('assets/images/women.jpg') }}" alt="Women Only">
                        </div>
                        <h3>WOMEN ONLY</h3>
                        <p>Designed exclusively for women entrepreneurs, Iraaya World is a space where you feel seen, understood, and supported from the moment you arrive.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="journeySection sectionSpace" id="journey">
        <div class="journeyPanel">
            <h2>THE APPLICATION JOURNEY</h2>
            <div class="journeySteps">
                <div class="journeyLine"></div>
                <article class="journeyStep animateThis slideRight">
                    <div class="stepCircle">
                        <div class="stepIcon">
                            <img src="{{ asset('assets/images/icon/request.png') }}" alt="Request Invitation" width="512" height="512" class="img-fluid">
                        </div>
                        <div class="stepNo">01</div>
                    </div>
                    <div class="j-text">
                        <h3>Request an Invitation</h3>
                        <p>Reach out via email or WhatsApp. Every new member begins with a conversation tell us about yourself and your ambitions.</p>
                        <strong>2–3 DAYS</strong>
                    </div>
                </article>
                <article class="journeyStep animateThis slideRight">
                    <div class="stepCircle">
                        <div class="stepIcon">
                            <img src="{{ asset('assets/images/icon/complete.png') }}" alt="Complete Application" width="512" height="512" class="img-fluid">
                        </div>
                        <div class="stepNo">02</div>
                    </div>
                    <div class="j-text">
                        <h3>Attend a Guest Session</h3>
                        <p>Experience a live Iraaya world circle firsthand. No obligation. Just come, connect, and decide if this is your kind of room.</p>
                        <strong>1 SESSION</strong>
                    </div>
                </article>
                <article class="journeyStep animateThis slideRight">
                    <div class="stepCircle">
                        <div class="stepIcon">
                            <img src="{{ asset('assets/images/icon/complete.png') }}" alt="complete" width="512" height="512" class="img-fluid">
                        </div>
                        <div class="stepNo">03</div>
                    </div>
                    <div class="j-text">
                        <h3>Complete Your Application</h3>
                        <p>Submit an application. We review your professional category to ensure each circle stays conflict-free and complementary.</p>
                        <strong>CATEGORY REVIEW</strong>
                    </div>
                </article>
                <article class="journeyStep animateThis slideRight">
                    <div class="stepCircle">
                        <div class="stepIcon">
                            <img src="{{ asset('assets/images/icon/hand.png') }}" alt="Welcome" width="512" height="512" class="img-fluid">
                        </div>
                        <div class="stepNo">04</div>
                    </div>
                    <div class="j-text">
                        <h3>Welcome to Your Circle</h3>
                        <p>Once accepted, you are onboarded into your curated circle your seat, your category, your network. Exclusively yours</p>
                        <strong>MEMBER ONBOARDING</strong>
                    </div>
                </article>
            </div>
            <a href="javascript:void(0)" class="btn btn-red">
                APPLY FOR MEMBERSHIP
                <span class="arrow"></span>
            </a>
        </div>
    </section>

    <section class="faqSection" id="faqs">
        <div class="container">
            <div class="faqHeading">
                <span class="eyebrow">Frequently Asked Questions</span>
                <h2>Everything You Need To Know <br> About Iraaya World</h2>
                <p>Find answers to the most common questions about our community, membership, networking opportunities, and growth programs.</p>
            </div>
            <div class="faqWrap">
                <div class="faqItem active">
                    <button class="faqQuestion" type="button"><span>What is IRAYAAWORLD?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>IRAYAAWORLD is a women’s networking and growth community designed to connect, inspire, and empower women through meaningful relationships, learning opportunities, and collaborative growth.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>Who can join IRAYAAWORLD?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>Any woman who believes in personal growth, networking, collaboration, and supporting other women is welcome to be a part of the community.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>What are the benefits of becoming a member?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>Members get opportunities to build valuable connections, attend curated events, participate in learning sessions, grow personally and professionally, and become part of a supportive women-led network.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>Who is a Circle Director?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>A Circle Director is a community leader who helps build and nurture local IRAYAAWORLD circles by connecting women, organizing activities, and encouraging engagement within the community.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>How can I join a circle near me?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>You can connect with us through our website or contact our team to help you find the nearest IRAYAAWORLD circle in your city.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>Are there networking events and activities conducted regularly?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>Yes, IRAYAAWORLD organizes regular networking meetups, workshops, discussions, learning sessions, and community-building activities for members.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>Can entrepreneurs, professionals, homemakers, and students all join?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>Absolutely. IRAYAAWORLD welcomes women from all backgrounds and professions who are looking to learn, grow, connect, and contribute.</p>
                    </div>
                </div>
                <div class="faqItem">
                    <button class="faqQuestion" type="button"><span>What will be the structure of Iraaya World?</span><i>+</i></button>
                    <div class="faqAnswer">
                        <p>Iraaya will host two networking meetings every month, designed to encourage meaningful connections and community engagement. Each meeting will also include an expert-led awareness session focused on professional and personal growth, conducted by qualified industry experts and mentors.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contactSection sectionSpace" id="contact">
        <div class="container">
            <div class="row align-items-start gy-5">
                <div class="col-lg-12 animateThis slideLeft">
                    <span class="contactEyebrow">GET IN TOUCH</span>
                    <h2 class="contactTitle">Your circle is waiting.
                        <em>are you ready ?</em>
                    </h2>
                    <div class="contactGrid">
                        <div class="contactItem">
                            <span>Call</span>
                            <a href="tel:+918433612576">+91 84336 12576</a> <br>
                            <a href="tel:+919769769200">+91 97697 69200</a>
                        </div>
                        <div class="contactItem mobile-none">
                            <span>Email</span>
                            <a href="mailto:connect@iraayaworld.com">connect@iraayaworld.com</a>
                        </div>
                        <div class="contactItem">
                            <span>Office Address</span>
                            <a href="https://maps.app.goo.gl/28qTSNB4U8EoigeD7">
                                Shenova Enterprise Network Pvt. Ltd.
                                Unit No. 4A, Ground Floor,
                                Kamath Industrial Estate,
                                Opp. Siddhi Vinayak Mandir,
                                Next to Raheja Empress,
                                Prabhadevi, Mumbai – 400025
                            </a>
                        </div>
                    </div>
                    <div class="copy-right">
                        <p>
                            Copyright © 2026 Iraaya World All Rights Reserved.
                            Designed by <a href="https://www.goyalinfotech.com/" target="_blank">Goyal Infotech</a>
                        </p>
                        <div class="links">
                            <a href="javascript:void(0)" style="border: none;">Privacy Policy</a>
                            <a href="javascript:void(0)">Terms & Conditions</a>
                            <a href="javascript:void(0)">Refund Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
