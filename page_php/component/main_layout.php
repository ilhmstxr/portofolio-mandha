<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Rahmandha Nur Aini</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900 font-sans">

    <!-- WRAPPER UTAMA -->
    <div class="max-w-[1728px] mx-auto w-full flex-grow">

        <?php include 'navbar_section.php'; ?>

        <?php include 'hero_section.php'; ?>

        <?php include 'aboutme_section.php'; ?>

        <?php include 'showcase_section.php'; ?>

        <main>
            <?php
            if (isset($content)) {
                include $content;
            }
            ?>
        </main>

        <section id="contact" class="max-w-[1100px] mx-auto mb-20">
            <?php include 'contact_section.php'; ?>
        </section>

    </div> <?php include 'footer_section.php'; ?>

    <!-- FontAwesome Icon CDN -->
    <script src="https://kit.fontawesome.com/a2e0e6d6e0.js" crossorigin="anonymous"></script>

</body>

</html>