<?php include ROOT . '/views/layer/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2><?= $lang->get('REGIST');?></h2>
                        <form id="loginform" action="#" method="post" enctype="multipart/form-data">

                            <input type="text" name="name" placeholder="<?= $lang->get('LABEL_NAME');?>" value="<?php echo $name; ?>"/><br/><br/>
                            <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/><br/><br/>
                            <input type="password" name="password" placeholder="<?= $lang->get('LABEL_PASSWORD');?>" value="<?php echo $password; ?>"/><br/><br/>
                            <div class="file-upload">
                                <label>
                                <input type="file" name="image">
                                <span><?= $lang->get('LABEL_FILE');?></span>
                                </label>
                            </div>
                            <br/><br/>
                            <input type="submit" name="submit" class="btn btn-default" value="<?= $lang->get('REGIST');?>" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layer/footer.php'; ?>