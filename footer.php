<footer>

    <div class="rs">
        <ul>
            <li><a href="#" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-pinterest fa-2x" aria-hidden="true"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <div class="footer">
        <p><a href="#">Mentions Légales</a></p>
        <p>|</p>
        <p><a href="#">Plan du site</a></p>
        <a href="#"><img src="assets/img/arrow.png" alt="arrow" title="arrow" class="scrollToTop"></a>
    </div>

</footer>
<!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/jquery-ui/ui/i18n/jquery.datepicker.fr.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/gotToTop.js"></script>
<script src="assets/js/scrollTo.js"></script>
<script src="assets/css/modern-slide-in/modern-slide-in/scripts/imagesloaded.pkgd.min.js"></script>
<script src="assets/css/modern-slide-in/modern-slide-in/scripts/hammer.min.js"></script>
<script src="assets/css/modern-slide-in/modern-slide-in/scripts/sequence.min.js"></script>
<script src="assets/css/modern-slide-in/modern-slide-in/scripts/sequence-theme.modern-slide-in.js"></script>
<!--si la liste des dates a été rempli alors on insère et on exécute le js dans la page-->
<?php if(isset($dateResaNonDispo)) {

?>
<script type="text/javascript">

    $(document).ready(function () {

        var dateNonDisponible = <?php echo json_encode($dateResaNonDispo); ?>;

        function disableSpecificDates(date) {

            // on récupère sous forme de chaine la date que l'on va afficher
            var currentdate = date.toLocaleDateString("fr").replace(/\//g, '-');


            // si elle est présente dans le tableau des dates non disponibles alors on ne peut la sélectionner
            if ($.inArray(currentdate, dateNonDisponible) !== -1) {
                return [false];
            }
            else {
                return [true];
            }

        }

        // transformation du champ en date avec sélection possible d'une date
        $("input[name='dateResa']").datepicker({
            // date minimum = date du jour
            dateFormat: "dd-mm-yy",
            minDate: new Date(),
            // avant d'afficher chaque date du mois, on écxécute le code permettant de savoir si elle est sélectionnable ou pas
            beforeShowDay: disableSpecificDates
        });
    });

</script>
<?php
}
?>

</body>
</html>
