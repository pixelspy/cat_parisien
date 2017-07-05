<?php /* Template Name: Contact */
?>

<?php
get_header();
?>


<?php include 'logo.php'; ?>

<div class="row form-contact">

    <?php if(count($_SESSION['cp-contact-error'])>0){ ?>
        <ul class="cp-error-list">
            <?php  foreach( $_SESSION['cp-contact-error'] AS $error ){ ?>
                <li> <?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

    <div class="col-md-6 col-md-offset-3">
        <div class=" form-style well well-sm">
            <form class="form-horizontal" action="" method="post">

                <?php if(isset($_SESSION['smv-contact-error']['smv-contact-nom'])){ ?>
                    <span class="smv-contact-error">Ce champs est obligatoire. </span>
                <?php } ?>

                <fieldset>
                    <legend class="text-center">Nous contacter</legend>

                    <!-- Name input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Nom/Name</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="cp-contact-nom" placeholder="Jean Dupont"  />
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Votre E-mail</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="cp-contact-email" placeholder="j.dupont@gmail.com" />

                        </div>
                    </div>

                    <!-- Téléphone input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Téléphone/Phone</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="cp-contact-telephone" placeholder="0607080910"  />
                        </div>
                    </div>

                    <!-- Object input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Objet/Object</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cp-contact-obj" type="text" name="cp-contact-obj" placeholder="Bonjour" >

                        </div>
                    </div>

                    <!-- Message body -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="message">Votre message</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="cp-contact-msg" name="cp-contact-msg" placeholder="Insérez votre message ici" rows="5" ></textarea>

                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>


<?php
get_footer();
?>



