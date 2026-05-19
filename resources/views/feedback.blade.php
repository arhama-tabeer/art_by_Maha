<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback - Art by Maha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">    
</head>
<body>

    <header>
        <h1>Feedback</h1>
    </header>

    <nav>
        <!-- <a href="home.html"><i class="fa-solid fa-house"></i> Home</a>
        <a href="PopularCollection.html"><i class="fa-solid fa-palette"></i> Popular Collection</a>
        <a href="AbstractPainting.html"><i class="fa-solid fa-brush"></i> Abstract Painting</a>
        <a href="contact.html"><i class="fa-solid fa-envelope"></i> Contact</a> -->


        <a href="{{ url('/') }}" ><i class="fas fa-home" ></i> Home</a>
    <a href="{{ url('/popular') }}"><i class="fas fa-palette"></i> Popular Collection</a>
    <a href="{{ url('/abstract') }}"><i class="fas fa-brush"></i> Abstract Painting</a>
    <a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    <a href="{{ url('/feedback') }}" class="current-page"><i class="fas fa-comment"></i> Feedback</a>


    </nav>

    <div class="feedback-container">
        <h2>We Value Your Feedback</h2>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Art's Gallery | All Rights Reserved</p>
    </footer>

</body>
</html>
