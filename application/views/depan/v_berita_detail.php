<?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>

<section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?php echo base_url().'assets/images/'.$image?>" alt="<?php echo $title;?>">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $title;?>
                     </h2>
                     <?php echo $berita;?>
                     
                     
                  </div>
               </div>
               
               
               
               
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                            
                            
                                
                            <h3 class="widget_title">Cari Berita</h3>
                            
                            <form action="<?php echo site_url('berita/search');?>" method="get">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="keyword" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                            
                        </aside>
                   
               </div>
            </div>
         </div>
      </div>
   </section>