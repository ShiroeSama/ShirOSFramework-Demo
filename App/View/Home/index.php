<?php
	use ShirOSBundle\Config;
	use ShirOSBundle\Utils\Url\Url;
	use ShirOSBundle\View\HTML\ShirOSForm;
	use ShirOSBundle\Utils\Session\Session;
	
	/** @var Url $UrlModule */
	/** @var ShirOSForm $form */
	/** @var Config $ConfigModule */
	/** @var Session $SessionModule */
?>

<section class="padding-40">

    <article class="post">
        <div class="post-header">Demo</div>
        <div class="post-content">
            <h2 class="text-center">Welcome to the Demo of ShirOS Framework</h2>
    
            <legend>Elements Lists :</legend>
            
            
            <div class="overflow">
                <table>
                    <thead>
                        <tr id="header">
                            <th id="LastName">Name</th>
                        </tr>
                    </thead>
    
                    <tbody class="divMaxHeight-200PX">
                        <?php foreach ($elements as $element): ?>
                            <tr>
                                <td><?= $element; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </article>
    
    <article class="post">
        <div class="post-header">Test Security</div>
        <div class="post-content">
            <div class="divWidth-80 div-center">
                
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
	
                            <?php if(isset($errors[$ConfigModule->get('Fields.Name.Username')])) : ?>
                                <?= $form->field($ConfigModule->get('Fields.Name.Username'), 'Username', NULL, [], true); ?>
                            <?php else: ?>
                                <?= $form->field($ConfigModule->get('Fields.Name.Username'), 'Username'); ?>
                            <?php endif; ?>
    
                        <!-- EMAIL -->
	
                            <?php if(isset($errors[$ConfigModule->get('Fields.Name.Email')])) : ?>
                                <?= $form->field($ConfigModule->get('Fields.Name.Email'), 'Email Address', NULL, [], true); ?>
                                <?php if(!empty($errors[$ConfigModule->get('Fields.Name.Email')])): ?>
                                    <div class="alert alert-danger-revert text-size-14"><?= $errors[$ConfigModule->get('Fields.Name.Email')] ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?= $form->field($ConfigModule->get('Fields.Name.Email'), 'Email Address'); ?>
                            <?php endif; ?>
    
                        <!-- TEST -->
	
	                        <?= $form->field($ConfigModule->get('Fields.Name.Test'), 'Test Field'); ?>
	
	                    <?= $form->submit('Test !', NULL, [ShirOSForm::OPTIONS_SURROUND => 'divInline-center marginTop-20']); ?>
                    </form>
                <?php endif; ?>
    
                <legend>Try to go on the Security URL :</legend>
                
                    <div class="text-center">
                        <a href="<?= $UrlModule->getUrl('Security'); ?>" class="btn btn-danger">Security Page</a>
                    </div>
            </div>
    </article>
    
    <?php if(!$valid): ?>
        <div class="alert alert-danger marginTop-20 marginBottom-20"><a>Nous avons rencontré des difficultés</a></div>
    <?php endif; ?>
    
</section>
