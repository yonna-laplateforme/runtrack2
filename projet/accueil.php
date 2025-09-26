<?php ob_start(); ?>
<h1 id="acc1">La Photo Autrement</h1>
<p id="par1">Venez immortaliser vos plus beaux moments d'une autre façon.. 
    </p>
<section>
  <article tabindex="0">
    <span>
      <img src="fond.jpg" alt="">
    </span>
  </article>
  <article tabindex="0">
    <span>
     <img src="photo2.jpg" alt="">
    </span>
  </article>
  <article tabindex="0">
    <span>
    <img src="photo3.jpg" alt="">
    </span>
  </article>
</section>

<?php
$content = ob_get_clean();
require_once "layout.php";
?>