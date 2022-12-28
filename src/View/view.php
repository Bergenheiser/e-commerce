<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/jpg" href="../assets/images/alteer.png"/>
    <link rel="stylesheet" href="../assets/CSS/style.css"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<header>
    <nav class="bg-gray-800 z-5">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img src="../assets/images/alteer.png" alt="..."
                             class="block aspect-auto object-cover h-10 w-auto">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="frontController.php"
                               class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                               aria-current="page">Accueil</a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="frontController.php?action=affichePanier&controller=produit"
                               class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                               aria-current="page">Panier : <?php echo $nbPanier ?> </a>
                        </div>
                    </div>
                    <?php
                    if (!$estConnecte) {
                        ?>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="frontController.php?action=login&controller=user"
                                   class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                   aria-current="page">Se connecter</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="frontController.php?action=read&controller=user&login=<?php echo rawurlencode($loginUser); ?>"
                                   class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                   aria-current="page">Profil</a>
                            </div>
                        </div>
                        <?php
                        if ($estAdmin) {
                            ?>
                            <div class="hidden sm:ml-6 sm:block">
                                <div class="flex space-x-4">
                                    <a href="frontController.php?action=readAll"
                                       class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                       aria-current="page">Panel Admin</a>
                                </div>
                            </div>
                            <div class="hidden sm:ml-6 sm:block">
                                <div class="flex space-x-4">
                                    <a href="frontController.php?action=formulairePreference"
                                       class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                       aria-current="page">Preference Controller</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="frontController.php?action=logout&controller=user"
                                   class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                   aria-current="page">Deconnecter</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <section>
        <?php foreach ($msgFlash as $type => $subTab) {
            foreach ($subTab as $msg) { ?>
                <div class="flex fixed bottom-10 right-10 z-40 ">
                    <div class="m-auto">
                        <div class="transition ease-in-out delay-150 bg-white hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 rounded-lg border-gray-300 border p-3 shadow-lg">
                            <div class="flex flex-row">
                                <div class="px-2">
                                    <svg width="24" height="24" viewBox="0 0 1792 1792" fill="#44C997"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/>
                                    </svg>
                                </div>
                                <div class="ml-2 mr-6">
                                    <span class="font-semibold"><?php echo $msg ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </section>
    <section>
        <?php
        require __DIR__ . "/{$cheminVueBody}";
        ?>
    </section>
</main>
<footer>
    <p style="text-align: right;"> E-Commerce Site of CARON Florimond and COPLEY Dimitri </p>
    <div>
        <div>
            <a href="frontController.php"> Page d’accueil </a>
        </div>
        <div>
            <a href="#"> Politique de confidentialité </a>
        </div>
    </div>
</footer>
</body>
</html>