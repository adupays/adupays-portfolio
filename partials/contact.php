        <!-- ==============================================
        CONTACT
        =============================================== --> 
        <section  id="contact">
        
            <div class="container">
            
                <h1 class="section-title scrollimation scale-in">Me <span>Contacter</span>
                    <i class="icon-envelope"></i>
                </h1>

                
                <div class="row">
                
                    <div class="col-sm-5 contact-info scrollimation fade-right">
                        
                        <p>Vous souhaitez me contacter pour parler de mes travaux ou d'un projet que nous pourrions réaliser ensemble : vous pouvez remplir le formulaire de contact ou m'envoyer un mail.</p>
                        
                        <address>
                            Amandine Dupays<br>
                            Sannois, 95110 - Val d'Oise<br>
                        </address>

                    </div>
                    
                    <!--=== Contact Form ===-->

                    <form id="contact-form" class="col-sm-7 scrollimation fade-left" action="target.php" method="post" novalidate>
                        
                        <div class="form-group">
                          <label class="control-label" for="contact-name">Name</label>
                          <div class="controls">
                            <i class="icon-user"></i>
                            <input id="contact-name" name="contactName" placeholder="Votre Nom..." class="form-control input-lg requiredField" type="text" data-error-empty="Merci d'entrer votre nom">
                          </div>
                        </div><!-- End name input -->
                        
                        <div class="form-group">
                          <label class="control-label" for="contact-mail">Email</label>
                          <div class=" controls">
                            <i class="icon-envelope"></i>
                            <input id="contact-mail" name="email" placeholder="Votre email..." class="form-control input-lg requiredField" type="email" data-error-empty="Merci d'entrer votre email" data-error-invalid="Email non valide">
                          </div>
                        </div><!-- End email input -->
                        
                        <div class="form-group">
                          <label class="control-label" for="contact-message">Message</label>
                            <div class="controls">
                                <i class="icon-comment"></i>
                                <textarea id="contact-message" name="comments"  placeholder="Votre message..." class="form-control input-lg requiredField" rows="5" data-error-empty="Merci d'entrer votre message"></textarea>
                            </div>
                        </div><!-- End textarea -->
                        
                        <p><button name="submit" type="submit" class="btn btn-theme btn-lg" data-error-message="Erreur !" data-sending-message="En cours..." data-ok-message="Message Envoyé !"><i class="icon-location-arrow"></i>Envoyer</button></p>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        
                    </form><!-- End contact-form -->
                  
                </div><!-- End row -->
                
            </div><!-- End container -->
            
        </section><!-- End contact section -->