<?php
    $title = 'About';
    include "header.php";
?>
        <header>
            <h1></h1>
        </header>
        <div id="introduction-box">
            <article style="border-bottom: 2px solid #ffff;">
                <h1 class="my-5">Introduction/Navigation</h1>
                <p class="px-3" style="font-size: 1.4em;">This website is designed for polymer researchers who have an interest or specialize in Polymer Chemistry field. Researchers will be able to insert their own polymer entry data and have the ability the search for other researchers data.
                This site has a two main features that is relevant to polymer researches. A researcher will be able to submit their own polymer research through the "New Polymer Entry" form. An account must be made and signed in for this option to be available.
                The second feature is the option to search for other researchers polymer data. This option is available regardless if a user is signed in or not.</p>
            </article>
        </div>

        <div id="article-box">
            <article style="border-bottom: 2px solid #ffff;">
                <h1 class="my-5">Welcome to Dr. Yongmei Wang's Website for Research into Liquid Chromatography at the Critical Condition.</h1>
                <img class="float-left px-3" src="../../assets/images/LCCC.png" width="200" height="100">
                <p class="px-3" style="font-size: 1.4em;">Welcome to Dr. Yongmei Wang's Computational Macromolecular Nanomedicine Research Group at The University of Memphis. 
                    Our group develops and applies theoretical and computational approaches to investigate underlying molecular processes in macromolecular systems and nanomedicine. 
                    We are particularly interested at the interface of materials and nanomedicine applications.</p>
            </article>
        <div>
        <?php
            include "footer.php";
        ?>

        <style>
            #introduction-box {
            margin: 0 auto;
            max-width: 1000px;
        }
        </style>
    </body>
</html>