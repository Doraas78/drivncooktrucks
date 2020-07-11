<?php $title= "À propos";
include ('localization.php');?>

<div id="about">

    <div class="jumbotron jumbotron-fluid background" style="height: 350px">
        <div id="banneer" >
            <h1><?= $lang['Le succès de Driv\'N Cook Trucks'];?></h1>
            <img src="<?= img_url('delimiteur2.png') ?>" alt="Driv'N Cook Trucks" style="width: 800px; height: 70px"  ">
            <h4 style="color: #F45B69"><?= $lang['#Ce que vous devriez savoir'];?></h4>
        </div>
    </div>

    <div class="container-fluid px-0" id="containerAbout">
        <div class="row no-gutters">
            <div class="col-8 no-gutters" style="padding-right: 0 !important;padding-left: 0 !important;">
                <div class="p-0" style=" opacity: 0.9">
                    <div class="row no-gutters">
                        <div class="col-md-8 ">
                            <div class="card-body">
                                <h5 class="card-title ml-5"><?= $lang['Notre histoire'];?></h5>
                                <i><p class="card-text text-justify mx-5"> <?= $lang['description_history']; ?>
                                    </p></i>
                                <br>
                                <br>
                                <p class="card-text text-right"><small class="text-muted"><?= $lang['Dora SAADAN, PDG Driv\'n Cook Trucks'] ;?></small></p>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <img src="<?= img_url('agriculteur.jpeg') ?>" class="card-img picture" alt="dora saadan">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4" style="padding-left: 0 !important; padding-right: 0 !important; ">

                <img src="<?= img_url('agriculture.jpeg') ?>"  alt="foodtruck events" id="eventsPic" " >

            </div>
        </div>

        <div class="row justify-content-end  no-gutters " >
            <div class="col-4" style="padding-left: 0 !important; padding-right: 0 !important; ">

                <img src="<?= img_url('teambuilding.jpeg') ?>"  alt="foodtruck events" id="eventsPic" " >
            </div>
            <div class="col-8">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="<?= img_url('coworking.jpg') ?>" class="card-img" alt="coworking" id="eventsPic" style="opacity: 1">
                    </div>
                    <div class="col-md-9">
                        <div class="card4"  style=" opacity: 0.9" >
                            <div class="card-body">
                                <h5 class="card-title ml-5"><?= $lang['Une expérience humaine'];?></h5>
                                <i><p class="card-text text-justify mx-5"> <?= $lang['description_experience'];?>
                                    </p></i>
                                <br>
                                <br>
                                <p class="card-text text-right"><small class="text-muted"><?= $lang['Coraline ESEDJI, Community manager Driv\'n Cook Trucks'];?></small></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center no-gutters ">
        <div class="card" id="contactUs">
            <div class="card-body">
                <section class="mb-4">
                    <h2 class="h1-responsive font-weight-bold text-center my-4"><?= $lang['Un renseignement, un devis ?'];?></h2>
                    <h4 class="h1-responsive font-weight-bold text-center my-4"><?= $lang['Merci de nous contacter !'];?> </h4>
                    <div class="row justify-content-center no-gutters">
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact_form"  method="POST">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control" value="Nom Prénom" onfocus="if(this.value == 'Nom Prénom')this.value = '';" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="email" name="email" class="form-control" value="Mail" onfocus="if(this.value == 'Mail')this.value = '';" ">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="text" id="subject" name="subject" class="form-control" value="Objet de la demande" onfocus="if(this.value == 'Objet de la demande')this.value = '';" >
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <label for="message"><?= $lang['Votre message :'];?></label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="text-center text-md-left">
                                        <button id="button_modal" class="btn btn-primary" type="submit"><?= $lang['Envoyer'];?> </button>
                                    </div>
                                    <div id="modal_success_message_send" class="text-center d-none ">
                                        <br>
                                        <img alt="icon_drivncook"  src="<?=img_url('icon.png') ?>" style="height: 60%; width: 45%">
                                        <br>
                                        <h3><?= $lang['Message envoyé !'];?></h3>
                                        <br>
                                        <h6><?= $lang['Nous vous répondrons dans les plus bref délais']; ?> </h6>
                                    </div>
                                    <div id="modal_error_message_send" class="text-center d-none">
                                        <br>
                                        <img alt="icon_drivncook"  src="<?=img_url('sad_saussage.png') ?>" style="height: 60%; width: 30%">
                                        <br>
                                        <h3><?= $lang['Echec d\'envoi !'];?></h3>
                                        <br>
                                        <h6><?= $lang['Désolé, votre message n\'a pas pu être envoyé, réessayez.'];?> </h6>
                                    </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>

    <br>
    <br>
    <div class="map-responsive">
        <p> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.475184322637!2d2.3874704156730227!3d48.84914850931148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6727347e25d67%3A0xc73e22c1131584f7!2s242%20Rue%20du%20Faubourg%20Saint-Antoine%2C%2075012%20Paris!5e0!3m2!1sfr!2sfr!4v1593443383073!5m2!1sfr!2sfr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe> </p>
    </div>
</div>



