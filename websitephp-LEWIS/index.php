<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="color.css">
</head>
<body>
    <?php
    require "Clase.php";

    
    $lib1 = new Libro("01", "Batman: The Killing Joke", "Prestado", "Alan Moore", "DC Comics", 1988, "978-1401294052", "General");
    $lib2 = new Libro("02", "Watchmen", "Disponible", "Alan Moore", "DC Comics", 1986, "978-0930289232", "General");
    $lib3 = new Libro("03", "Superman: Red Son", "Prestado", "Mark Millar", "DC Comics", 2003, "978-1401247119", "General");
    $lib4 = new Libro("04", "The Dark Knight Returns", "Disponible", "Frank Miller", "DC Comics", 1986, "978-1563893421", "General");
    $lib5 = new Libro("05", "Civil War", "Prestado", "Mark Millar", "Marvel Comics", 2006, "978-0785121794", "General");
    $lib6 = new Libro("06", "Infinity Gauntlet", "Disponible", "Jim Starlin", "Marvel Comics", 1991, "978-0785156598", "Reserva");
    $lib7 = new Libro("07", "Spider-Man: Kraven's Last Hunt", "Prestado", "J.M. DeMatteis", "Marvel Comics", 1987, "978-0785166351", "Reserva");
    $lib8 = new Libro("08", "X-Men: Days of Future Past", "Disponible", "Chris Claremont", "Marvel Comics", 1981, "978-0785164531", "Reserva");
    $lib9 = new Libro("09", "Batman: Hush", "Prestado", "Jeph Loeb", "DC Comics", 2002, "978-1401223175", "Reserva");
    $lib10 = new Libro("10", "The Infinity War", "Disponible", "Jim Starlin", "Marvel Comics", 1992, "978-0785149477", "Reserva");

    
    $rev1 = new Revista("11", "Vogue", "Disponible", "230", "2024-03-01", "Mensual", "0042-8000");
    $rev2 = new Revista("12", "Elle", "Prestado", "178", "2024-02-15", "Semanal", "0013-7120");
    $rev3 = new Revista("13", "Harper's Bazaar", "Disponible", "195", "2024-01-10", "Mensual", "0017-7873");
    $rev4 = new Revista("14", "GQ", "Disponible", "220", "2024-03-20", "Semanal", "1097-4199");
    $rev5 = new Revista("15", "L'Officiel", "Prestado", "312", "2023-12-05", "Anual", "1632-7662");
    $rev6 = new Revista("16", "InStyle", "Disponible", "210", "2024-02-25", "Mensual", "1076-0830");
    $rev7 = new Revista("17", "Allure", "Prestado", "180", "2024-01-30", "Semanal", "1081-5733");
    $rev8 = new Revista("18", "Esquire", "Disponible", "250", "2024-03-10", "Mensual", "0194-9535");
    $rev9 = new Revista("19", "Fragrance Journal", "Disponible", "89", "2024-02-05", "Anual", "1747-1695");
    $rev10 = new Revista("20", "Perfumer & Flavorist", "Prestado", "45", "2024-03-18", "Semanal", "1044-3589");

    $video1 = new VideoEducativos("V001", "Aprendiendo Python", "Disponible", "DVD", 120, 2018);
    $video2 = new VideoEducativos("V002", "Historia del Arte", "Prestado", "CD", 90, 2010);
    $video3 = new VideoEducativos("V003", "Introducción a la Física", "Disponible", "Blu-Ray", 150, 2016);
    $video4 = new VideoEducativos("V004", "Matemáticas Básicas", "Disponible", "DVD", 110, 2012);
    $video5 = new VideoEducativos("V005", "Química en Acción", "Prestado", "Blu-Ray", 95, 2019);
    $video6 = new VideoEducativos("V006", "Biología Marina", "Disponible", "CD", 130, 2008);
    $video7 = new VideoEducativos("V007", "Historia del Siglo XX", "Disponible", "DVD", 140, 2020);
    $video8 = new VideoEducativos("V008", "Programación en C++", "Prestado", "Blu-Ray", 125, 2017);
    $video9 = new VideoEducativos("V009", "Ciencias Sociales", "Disponible", "CD", 100, 2011);
    $video10 = new VideoEducativos("V010", "Arte y Cultura", "Prestado", "DVD", 105, 2023);

    $biblioteca = array($lib1, $lib2, $lib3, $lib4, $lib5, $lib6, $lib7, $lib8, $lib9, $lib10,
                    $rev1, $rev2, $rev3, $rev4, $rev5, $rev6, $rev7, $rev8, $rev9, $rev10,
                    $video1, $video2, $video3, $video4, $video5, $video6, $video7, $video8, $video9, $video10);
    
    echo "<h2>LIBROS</h2>";
    for ($i = 0; $i < 10; $i++) {
        echo ($i + 1) . ". " . $biblioteca[$i]->nombre . "<br>";
    }

    
    echo "<h2>REVISTAS</h2>";
    for ($i = 10; $i < 20; $i++) {
        echo ($i + 1) . ". " . $biblioteca[$i]->nombre . "<br>";
    }

    echo "<h2>VIDEOS EDUCATIVOS</h2>";
    for ($i = 20; $i < count($biblioteca); $i++) {
        echo ($i + 1) . ". " . $biblioteca[$i]->nombre . "<br>";
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br>
        Digite el número del recurso: <input type="number" name="indice">
        <input type="submit" value="Consultar">
        <br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $indice = $_POST['indice'] - 1;
            if (isset($biblioteca[$indice])) {
                echo $biblioteca[$indice];
                echo "<br>Se puede prestar por " . $biblioteca[$indice]->diasPrestamo() . " días.";
            } else {
                echo "Número de recurso inválido.";
            }
        }
        ?>
    </form>
</body>
</html>
