<?php
$servername = "localhost";
$username = "root"; // Ubah jika Anda menggunakan username yang berbeda
$password = ""; // Ubah jika Anda menggunakan password yang berbeda
$dbname = "personalportfolio";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari tabel blog
$sql = "SELECT id, title, content, link FROM blog";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Personal Portfolio</title>
    <link rel="stylesheet" href="styless2.css">
</head>
<body>
    <!-- Content for Blog page -->
    <header class="header-background">
        <h1>Nazlah's Homepage</h1>
    </header>
    <nav>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <section id="blog-content">
        <h2>Blog</h2>
        <article>
            <?php
            if ($result->num_rows > 0) {
                // Output data untuk setiap row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='blog-post'>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<a href='" . $row["link"] . "'>Read more</a>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </article>
    </section>
    <!-- JavaScript for SwiperJS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Include external JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
