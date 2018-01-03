<?php include ROOT . '/views/layer/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2><?= $lang->get('AUTH');?></h2>
                        <form id="loginform" action="#" method="post">
                            
                            <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="password" name="password" placeholder="<?= $lang->get('LABEL_PASSWORD');?>" value="<?php echo $password; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="<?= $lang->get('AUTH');?>" />
                        </form>
                    </div><!--/sign up form-->
                
                
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layer/footer.php'; ?>