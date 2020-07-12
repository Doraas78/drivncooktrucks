<?php $title = 'Tableau de bord';
include 'localization.php';
?>

<div class="container-fluid" id="dashboard">

    <div class="col" >
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsletter_modal">
           Newsletter
        </button>

        <!-- Modal -->
        <div class="modal fade" id="newsletter_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Newsletter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="newslettersForm">
                            <div class="form-group col">
                                <label for="subject">Sujet</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group col">
                                <label for="message">Contenu</label>
                                <textarea class="form-control" id="message" rows="20" name="message"></textarea>
                            </div>
                            <button type="submit" id="btn_newsletters_send" class="btn btn-primary">
                                Envoyer
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="here"></div>