<?php /* Template Name: Contact */
?>

<?php
get_header();
?>




<div class="main col-12">

    <div class="title-contact">
        <h1>Nous contacter</h1>
        <p>
            Tous les champs sont obligatoires
        </p>
    </div>

    <div class="formulaire-contact">

        <?php if(count($_SESSION['cp-contact-error'])>0){ ?>
            <ul class="cp-error-list">
                <?php  foreach( $_SESSION['cp-contact-error'] AS $error ){ ?>
                    <li> <?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>


        <form action="#" method="post" >
            <div>
                <?php if(isset($_SESSION['smv-contact-error']['smv-contact-nom'])){ ?>
                    <span class="smv-contact-error">Ce champs est obligatoire. </span>
                <?php } ?>


                <input id="cp-contact-nom" type="text" name="cp-contact-nom" placeholder="Nom-Prénom / Name-Firstname"  />
            </div>

            <div>
                <input id="cp-contact-email" type="email" name="cp-contact-email" placeholder="Email" />
            </div>

            <div>
                <input id="cp-contact-tel" type="text" name="cp-contact-tel" placeholder="Téléphone / Phone" />
            </div>

            <div>
                <input id="cp-contact-obj" type="text" name="smv-contact-obj" placeholder="Objet" >
            </div>
            <div>
                <textarea id="cp-contact-msg" name="cp-contact-msg" placeholder="Message" ></textarea>
            </div>
            <button type="submit">ENVOYER / SEND</button>
            <input type="hidden" name="cp-contact-submit" value="1" />
        </form>
    </div>

</div>

<?php
get_footer();
?>



