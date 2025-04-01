<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #bbb 1px solid;
        }

        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }

        header ul {
            margin: 0;
            padding: 0;
        }

        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }

        header #branding {
            float: left;
        }

        header #branding h1 {
            margin: 0;
        }

        header nav {
            float: right;
            margin-top: 10px;
        }

        header .highlight, header .current a {
            color: #e8491d;
            font-weight: bold;
        }

        header a:hover {
            color: #ccc;
            font-weight: bold;
        }

        /* Showcase */
        .hero {
            background: url('https://via.placeholder.com/1200x600') no-repeat center center/cover;
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
        }

        /* Newsletter */
        #newsletter {
            padding: 15px;
            color: #fff;
            background: #35424a
        }

        #newsletter h1 {
            float: left;
        }

        #newsletter form {
            float: right;
            margin-top: 15px;
        }

        #newsletter input[type="email"] {
            padding: 4px;
            height: 25px;
            width: 250px;
        }

        .button_1 {
            height: 38px;
            background: #e8491d;
            border: 0;
            padding-left: 20px;
            padding-right: 20px;
            color: #fff;
        }

        /* Boxes */
        #boxes {
            margin-top: 20px;
        }

        #boxes .box {
            float: left;
            text-align: center;
            width: 30%;
            padding: 10px;
        }

        #boxes .box img {
            width: 90px;
        }

        /* Sidebar */
        aside#sidebar {
            float: right;
            width: 30%;
            margin-top: 10px;
        }

        aside#sidebar .quote input, aside#sidebar .quote textarea {
            width: 90%;
            padding: 5px;
        }

        /* Main-col */
        article#main-col {
            float: left;
            width: 65%;
        }

        /* Services */
        ul#services li {
            padding: 20px;
            border: #ccc solid 1px;
            margin-bottom: 5px;
            background: #e6e6e6;
        }

        footer {
            padding: 20px;
            margin-top: 20px;
            color: #fff;
            background-color: #e8491d;
            text-align: center;
        }

        /* Media Queries */
        @media(max-width: 768px) {
            header #branding,
            header nav,
            header nav li,
            #newsletter h1,
            #newsletter form,
            #boxes .box,
            aside#sidebar,
            article#main-col {
                float: none;
                text-align: center;
                width: 100%;
            }

            header {
                padding-bottom: 20px;
            }

            #newsletter form {
                margin-top: 0;
            }

            .hero {
                background-size: cover;
                background-position: center;
                padding: 120px 0 40px; /* Increased top padding from 80px to 120px */
                min-height: 100vh;
            }

            .hero-text {
                display: table-cell !important;
                width: 48% !important;
                vertical-align: top !important;
                text-align: center !important;
                padding-right: 10px !important;
                padding-top: 20px !important; /* Add this line for extra top spacing */
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">My</span> Website</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Welcome To My Website</h1>
            <p>This is a simple website template.</p>
        </div>
    </section>

    <section id="newsletter">
        <div class="container">
            <h1>Subscribe To Our Newsletter</h1>
            <form>
                <input type="email" placeholder="Enter Email...">
                <button type="submit" class="button_1">Subscribe</button>
            </form>
        </div>
    </section>

    <section id="boxes">
        <div class="container">
            <div class="box">
                <img src="https://via.placeholder.com/90">
                <h3>HTML5 Markup</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
            </div>
            <div class="box">
                <img src="https://via.placeholder.com/90">
                <h3>CSS3 Styling</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
            </div>
            <div class="box">
                <img src="https://via.placeholder.com/90">
                <h3>Graphic Design</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <article id="main-col">
                <h1 class="page-title">About Us</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis pretium massa. Aliquam erat volutpat. Nulla facilisi. Donec vulputate interdum sollicitudin. Nunc lacinia auctor quam sed pellentesque. Aliquam dui mauris, mattis quis lacus id, pellentesque lobortis odio.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis.
                </p>
            </article>

            <aside id="sidebar">
                <div class="dark">
                    <h3>Get a Quote</h3>
                    <form class="quote">
                        <div>
                            <label>Name</label><br>
                            <input type="text" placeholder="Name">
                        </div>
                        <div>
                            <label>Email</label><br>
                            <input type="email" placeholder="Email Address">
                        </div>
                        <div>
                            <label>Message</label><br>
                            <textarea placeholder="Message"></textarea>
                        </div>
                        <button class="button_1" type="submit">Send</button>
                    </form>
                </div>
            </aside>
        </div>
    </section>

    <footer>
        <p>My Website, Copyright &copy; 2023</p>
    </footer>
</body>
</html>

