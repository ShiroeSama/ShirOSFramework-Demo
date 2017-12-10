<div id="Content">
	
	<article class="post">
		<div class="post-Title"><a>Demo</a></div>
		<div class="post-content">
			<h2 class="text-center">Welcome to the Demo of ShirOS Framework</h2>
			
			<legend>Elements Lists :</legend>
			<div class="list-200 scrollVertical">
				<?php foreach ($elements as $element): ?>
					<section>
						<div><?= $element; ?></div>
						<hr class="style-orange">
					</section>
				<?php endforeach; ?>
			</p>
		</div>
	</article>
	
	<article class="post">
		<div class="post-Title"><a>Test Security</a></div>
		<div class="post-content">

            <div class="divSize-80 div-center">
                <?php if($logged): ?>
                    <div class="alert alert-success"><a>You are Logged !</a></div>

                    <legend>User Informations : </legend>
                    
                    <div class="marginTop-20 marginLeft-20">
                        <p class="margin-5"><span class="text-bold">Id :</span> <span class="text-italic"><?= $SessionModule->authValueFor($ConfigModule->get('ShirOS.Session.Id')); ?></span></p>
                        <p class="margin-5"><span class="text-bold">Username :</span> <span class="text-italic"><?= $user->username; ?></span></p>
                        <p class="margin-5"><span class="text-bold">Email :</span> <span class="text-italic"><?= $user->email; ?></span></p>
                        <p class="margin-5"><span class="text-bold">Date :</span> <span class="text-italic"><?= $user->dateFormat; ?></span></p>
                    </div>
                    
                <?php else: ?>
                    <form method="POST">
                        
                        <legend>Connexion : </legend>
                        
                        <!-- USERNAME -->
            
                        <?php if(isset($errors[$ConfigModule->get("Fields.Name.Username")])) : ?>
                            <?= $form->input($ConfigModule->get("Fields.Name.Username"), ['placeholder' => "Username"], true); ?>
                        <?php else: ?>
                            <?= $form->input($ConfigModule->get("Fields.Name.Username"), ['placeholder' => "Username"]); ?>
                        <?php endif; ?>
    
                        <!-- EMAIL -->
            
                        <?php if(isset($errors[$ConfigModule->get("Fields.Name.Email")])) : ?>
                            <?= $form->input($ConfigModule->get("Fields.Name.Email"), ['placeholder' => "Email Address"], true); ?>
                            <?php if(!empty($errors[$ConfigModule->get("Fields.Name.Email")])): ?>
                                <div class="alert alert-danger-revert text-size-14"><?= $errors[$ConfigModule->get("Fields.Name.Email")] ?></div>
                            <?php endif; ?>
                        <?php else: ?>
                            <?= $form->input($ConfigModule->get("Fields.Name.Email"), ['placeholder' => "Email Address"]); ?>
                        <?php endif; ?>

                        <!-- TEST -->
	
	                    <?= $form->input($ConfigModule->get("Fields.Name.Test"), ['placeholder' => "Test"]); ?>
            
                        <?= $form->submit("Test", ['surround' => 'divInline-center marginTop-20']); ?>
                    </form>
                <?php endif; ?>
    
                <legend>Try to go on the Security URL :</legend>
                <div class="text-center">
                    <a href="<?= $UrlModule->getUrl('security'); ?>" class="btn btn-danger">Security Page</a>
                </div>
            </div>
  
	</article>
	
	<?php if(!$valid): ?>
        <div class="alert alert-danger marginTop-20 marginBottom-20"><a>Nous avons rencontré des difficultés</a></div>
	<?php endif; ?>
	
</div>