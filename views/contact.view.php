<?php
    include("views/parts/header.php");
?>

<main id="contact_page">

    <div class="contact_bloc d-flex justify-content-center">
        <section class="contact_section d-flex flex-nowrap justify-content-center align-self-center">
            
            <div class="blurred_card d-flex">
                <div class="contact_text container text-center align-self-center p-0">
                    <div class="row align-items-center">

                        <div class="hours col p-0">
                            <h5>NOS HEURES D'OUVERTURE</h5>
                            <div>
                                <p>lundi: 12:00pm à 1:00am</p>
                                <p>mardi: 12:00pm à 1:00am</p>
                                <p>mercredi: 12:00pm à 1:00am</p>
                                <p>jeudi: 12:00pm à 1:00am</p>
                                <p>vendredi: 12:00pm à 1:00am</p>
                                <p>samedi: 12:00pm à 2:00am</p>
                                <p>dimanche: 12:00pm à 2:00am</p>
                            </div>
                        </div>

                        <div class="col p-0">
                            <div>
                                <h5>NOTRE ADRESSE</h5>
                                <div class="text-center">
                                    <p>297, rue St-Georges</p>
                                    <p>Saint-Jérôme, Qc</p>
                                    <p>J7Z 5A2</p>
                                </div>
                            </div>
                            
                            <div>
                                <h5 class="mt-5 pt-2">SUIVEZ-NOUS</h5>
                                <div class="d-flex align-self-center justify-content-center">
                                    <a href="https://www.facebook.com/" class="link_border me-1"><img class="social_icon" src="public/media/icons/facebook_white.png" alt="Icône Facebook"></a>
                                    <a href="https://www.instagram.com/" class="link_border me-1"><img class="social_icon" src="public/media/icons/instagram_white.png" alt="Icône Instagram"></a>
                                    <a href="https://twitter.com/" class="link_border"><img class="social_icon" src="public/media/icons/twitter_white.png" alt="Icône Twitter"></a>
                                </div>
                            </div>
                            <div>
                                <h5 class="mt-5 pt-2">QUESTIONS?</h5>
                                <p>Appelez au <strong>450-436-1531</strong></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="map_bloc d-flex align-self-center justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.7467842120045!2d-74.0030156!3d45.7762647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sen!2sca!4v1670304355418!5m2!1sen!2sca" width="577" height="354" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
        </section>
    </div>

    <?php
        include("views/parts/newsletter_section.php");
    ?> 

</main>

<?php
    include("views/parts/footer.php");
?>