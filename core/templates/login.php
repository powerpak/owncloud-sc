<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<form method="post">
  
  <div id="sinai-login">
    <p class="slogan">An ISMMS-endorsed resource for sharing notes and review materials</p>
    <p class="ie8-warning" style="display: none">
      <strong>Uh oh!</strong> It appears that you are on Internet Explorer 8 or below!  We kindly request that you use
      either Firefox, Chrome, Safari, or a more recent version of Explorer, else this site
      may not work as intended!
    </p>
    <p>
      There was once an infamous shared drive that ISMMS students passed amongst themselves, which was eventually hosted from a
      computer in a dorm room.  Unfortunately, we can't serve files from our dorm rooms&mdash;it's against network policy.  
      But the school would like us to continue to share our study resources in a supportable manner, and so this website was born.
    </p>
    <p>A few quick reminders:</p>
    <ul>
      <li>
        Please do not share anything from or about this site with students outside the school.
      </li>
      <li>
        Please don't upload copyrighted or pirated material, including textbooks, Qbanks, or video series.  They will be deleted without notice, and repeated abuses might require the school to take down this site.  One exception: anything freely distributed to students by ISMMS faculty (e.g., Dr. Soriano's ASM guide) is OK.
      </li>
      <li>
        Want to share your own stuff?  Just click <strong>Upload</strong> or <strong>New...</strong> within any folder: 
        files will be immediately available to your classmates!  With enough downloads, a file or directory will be marked as
        <img id="lock-icon" src="<?php print_unescaped(image_path('', 'locked-big.png')); ?>" alt="lock icon"/>
        <em>archival quality</em>
        and will be forever available to future years.
      </li>
      <li>
        There are no logins or passwords because we trust you to use this site responsibly.  That being said, you are individually accountable for what you share or download.  <strong>Do not violate the honor code.</strong>
      </li>
      <li>
        This site is only accessible from Sinai networks such as MSMC-green and jacks in Aron or Annenberg.
      </li>
    </ul>
    <p>
      Without further ado, enjoy, and please share in kind!
    </p>
    <p class="center">
      <input type="submit" class="login primary" value="<?php p($l->t('Enter the site')); ?>"/>
    </p>
  </div>
  
  <fieldset id="login-controls">
  <?php if (!empty($_['redirect_url'])) {
    print_unescaped('<input type="hidden" name="redirect_url" value="' . OC_Util::sanitizeHTML($_['redirect_url']) . '" />');
  } ?>
    <ul>
      <?php if (isset($_['invalidcookie']) && ($_['invalidcookie'])): ?>
      <li class="errors">
        <?php p($l->t('Automatic logon rejected!')); ?><br>
        <small><?php p($l->t('If you did not change your password recently, your account may be compromised!')); ?></small>
        <br>
        <small><?php p($l->t('Please change your password to secure your account again.')); ?></small>
      </li>
      <?php endif; ?>
      <?php if (isset($_['invalidpassword']) && ($_['invalidpassword'])): ?>
      <a href="<?php print_unescaped(OC_Helper::linkToRoute('core_lostpassword_index')) ?>">
        <li class="errors">
          <?php p($l->t('Lost your password?')); ?>
        </li>
      </a>
      <?php endif; ?>
    </ul>
    
    <p class="infield grouptop">
      <input type="text" name="user" id="user" placeholder=""
           value="<?php p($_['username']); ?>"<?php p($_['user_autofocus'] ? ' autofocus' : ''); ?>
           autocomplete="on" required/>
      <label for="user" class="infield"><?php p($l->t('Username')); ?></label>
      <img class="svg" src="<?php print_unescaped(image_path('', 'actions/user.svg')); ?>" alt=""/>
    </p>

    <p class="infield groupbottom">
      <input type="password" name="password" id="password" value="" data-typetoggle="#show" placeholder=""
           required<?php p($_['user_autofocus'] ? '' : ' autofocus'); ?> />
      <label for="password" class="infield"><?php p($l->t('Password')); ?></label>
      <img class="svg" id="password-icon" src="<?php print_unescaped(image_path('', 'actions/password.svg')); ?>" alt=""/>
      <input type="checkbox" id="show" name="show" />
      <label for="show"></label>
    </p>
    <label><input type="checkbox" name="remember_login" value="1" id="remember_login"/>
      <?php p($l->t('remember')); ?></label>
    <input type="hidden" name="timezone-offset" id="timezone-offset"/>
    <input type="submit" id="submit" class="login primary" value="<?php p($l->t('Log in')); ?>"/>
  </div>
</form>
<?php if (!empty($_['alt_login'])) { ?>
<form id="alternative-logins">
  <fieldset>
    <legend><?php p($l->t('Alternative Logins')) ?></legend>
    <ul>
      <?php foreach($_['alt_login'] as $login): ?>
        <li><a class="button" href="<?php print_unescaped($login['href']); ?>" ><?php p($login['name']); ?></a></li>
      <?php endforeach; ?>
    </ul>
  </fieldset>
</form>
<?php } ?>

<?php
OCP\Util::addscript('core', 'visitortimezone');
OCP\Util::addscript('core', 'sinailogin');

