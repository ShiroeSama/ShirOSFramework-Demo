<?php
	use ShirOSBundle\Utils\Url\Url;
	
	/** @var Url $UrlModule */
?>

<section class="padding-40">

    <article class="post">
        <div class="post-header">Congratulation !</div>
        <div class="post-content">
            <h2 class="text-center">You are on a Security Page</h2>

            <legend>Loggout :</legend>
                <div class="text-center">
                    <a href="<?= $UrlModule->getUrl('Logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
    </article>

</section>