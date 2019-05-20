 <!-- newsletter section -->
 <div class="newsletter-section spad" id="newsletter">
   <div class="container">
     <div class="row">
       <div class="col-md-3">
         <h2>Newsletter</h2>
       </div>
       <div class="col-md-9">
         <?php
          if (isset($_SESSION['error'])) {
            echo $_SESSION['error']['message'];
            unset($_SESSION['error']);
          }
          ?>
         <!-- newsletter form -->
         <?php view('partials/notice2'); ?>
         <form class="nl-form" action="<?= admin_url('admin-post.php'); ?>#newsletter" method="post">
           <?php wp_nonce_field('send-news'); ?>
           <input type="text" name="email_newsletter" id="email_newsletter" value="<?= $old['email_newsletter']; ?>" placeholder="Entrez votre email">
           <input type="hidden" name="action" value="send-news">

           <button type="submit" class="site-btn btn-2">Newsletter</button>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- newsletter section end -->