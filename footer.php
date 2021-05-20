<hr />
<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted" style="float: left;">Ô'GÎTES TEAM 2020</span>
        <span class="text-muted" style="float: right;">BTS SIO SLAM</span>
        <?php
        if (isset($_SESSION["id_users"]))
        {
        ?>
        <style>
            .hovered:hover {
                text-decoration: underline;
            }
        </style>
        <div style="width:50%; margin:0 auto;">
            <a href="/ogites2/presentation.php"><span class="text-muted hovered" style="float: left;">Présentation</span></a>
            <a href="/ogites2/about.php"><span class="text-muted hovered" style="float: right;">À propos</span></a>
        </div>
        <?php
        }
        ?>
    </div>
</footer>

</body>

</html>