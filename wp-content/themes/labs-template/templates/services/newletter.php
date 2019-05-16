 <!-- newsletter section -->
 <div class="newsletter-section spad">
   <div class="container">
     <div class="row">
       <div class="col-md-3">
         <h2>Newsletter</h2>
       </div>
       <div class="col-md-9">
        <?php 
          echo $_SESSION['error']['message'];
          unset($_SESSION['error'])
        ?>
         <!-- newsletter form -->
         <form class="nl-form" action="<?= get_admin_url() . '?action=send-news'; ?>" method="post">
           <?php wp_nonce_field('send-news'); ?>

           <input type="text" name="email" id="email" value="<?= $old['email']; ?>" placeholder="Entrez votre email">
           
           <button type="submit" class="site-btn btn-2">Newsletter</button>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- newsletter section end -->