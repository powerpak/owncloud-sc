<div class="crumb <?= count($_['breadcrumb']) ? '' : 'last' ?>">
  <a href="<?php print_unescaped($_['baseURL']); ?>">
    <img src="<?php print_unescaped(OCP\image_path('core', 'places/home.svg'));?>" class="svg" />
  </a>
</div>
<?php for($i=0; $i<count($_["breadcrumb"]); $i++):
  $crumb = $_["breadcrumb"][$i];
  $dir = str_replace('+', '%20', urlencode($crumb["dir"]));
  $dir = str_replace('%2F', '/', $dir); ?>
  <div class="crumb <?php if($i == count($_["breadcrumb"])-1) p('last');?> svg"
     data-dir='<?php p($dir);?>'>
  <a href="<?php p($_['baseURL'].$dir); ?>"><?php p($crumb["name"]); ?></a>
  </div>
<?php endfor;
