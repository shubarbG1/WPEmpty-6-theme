<?php
/*
Template Name: yoga-poses-guide
Template Post Type: post
 */
    get_header(); ?>

    <div id="site-content" class="site-content single-content">
        <div class="content-with-sidebar">
            <div class="single-content-main">

                <!-- Start Content -->
                <!-- Hero -->
                <section class="hero-section">
                    <div class="hero-content">
                        <h1 class="custom-post">Yoga Poses Guide<span class="h1p">Explore 78 Asanas with Benefits, Keys, and Sanskrit Names</span></h1>
                    </div>
                </section>

                <div class="main-wrap">
                
                    <!-- Include the breadcrumb file with error suppression -->
                    <div class="breadcrumb">
                        <?php include(get_stylesheet_directory() . '/inc/breadcrumb.php'); ?>
                    </div>
                    
                    <div class="page-overview">
                        <p>Our Yoga Poses Guide gathers 78 Asanas, providing a quick overview of their keys, benefits, cautions, qualities, and Sanskrit names. 
                            Originally designed as a pedagogical tool for our Yoga teacher training students, it has become an essential resource for trainers and 
                            practitioners seeking a comprehensive understanding of each Asana.
                        </p>
                    </div>

                    <div id="search-sort-wrap" class="search-sort-wrap anchor">

                        <div class="dropdown">
                            <button id="dropdown-btn" class="dropdown-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/filter-icon.png" alt="filter icon"><span class="info-btn">Filters</span></button>
                            <div id="dropdown-content" class="dropdown-content">
                                <div id="close-btn" class="close-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/cross-icon.png" alt="close icon"></div>

                                <div id="checkboxes" class="sort-box-wrap">
                                    <div class="sort-box sort-types">
                                        <p>Pose Types</p>
                                        <label><input type="checkbox" class="filter" name="filter" value="seated pose,"> Seated</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="standing pose,"> Standing</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="forward-bend,"> Forward-bend</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="back-bend,"> Back-bend</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="twist pose,"> Twist</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="inversion pose,"> Inversion</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="arm-balance pose,"> Arm-balance</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="restorative pose,"> Restorative</label>
                                        <label><input type="checkbox" class="filter" name="filter" value="preparatory pose,"> Preparatory</label>
                                    </div>

                                    <div class="sort-levels-benefit-wrap">
                                        <div class="sort-box sort-levels">
                                            <p>Pose Levels</p>
                                            <label><input type="checkbox" class="filter" name="filter" value="beginner,"> Beginner</label>
                                            <label><input type="checkbox" class="filter" name="filter" value="intermediate,"> Intermediate</label>
                                            <label><input type="checkbox" class="filter" name="filter" value="advanced,"> Advanced</label>
                                        </div>

                                        <div class="sort-box sort-benefits">
                                            <p>Pose Benefits</p>
                                            <label><input type="checkbox" class="filter" name="filter" value="calming"> Calming</label>
                                            <label><input type="checkbox" class="filter" name="filter" value="energizing"> Energizing</label>
                                            <label><input type="checkbox" class="filter" name="filter" value="grounding"> Grounding</label>
                                            <label><input type="checkbox" class="filter" name="filter" value="balancing"> Balancing</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <form class="form-container">
                            <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search-icon.png" alt="search icon">
                            <input type="text" name="" id="search-input" placeholder="Search Your Yoga Poses"
                            onkeyup="search()">
                            <img class="cross-icon" src="<?php echo get_template_directory_uri(); ?>/img/cross-icon.png" alt="cross icon">
                        </form>
                        <!-- <p>(e.g.) lotus pose, sukhasana, Back-bend, twist pose, beginner, advance</p> -->
                    </div>

                    <!---------------
                    ----- Poses -----
                    ---------------->

                    <div id="poses" class="flex-container-wrap">

                        <?php include(get_stylesheet_directory() . '/inc/data-poses-guide.php'); ?>

                        <?php foreach ($poses as $pose) : ?>
                            <section id="<?php echo $pose['id']; ?>" class="asana-container anchor">

                                <div class="item-1">
                                    <div class="pic-container">
                                        <picture>
                                            <source media="(max-width: 380px)" srcset="<?php echo $pose['img_srcset']; ?>">
                                            <source media="(max-width: 500px)" srcset="<?php echo $pose['img_srcset_2']; ?>">
                                            <img src="<?php echo $pose['img_src']; ?>" class="pose-image" loading="lazy" title="<?php echo $pose['img_title']; ?>" alt="<?php echo $pose['img_alt']; ?>">
                                        </picture>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/plus-circle-black-icon-2.png" class="more-info-icon" title="See the Asana Description" loading="lazy" alt="arrow icon">
                                    </div>
                                </div>   

                                <div class="item-2">
                                    <h2 class="asana-h2" title="See the Asana Description"><?php echo $pose['name_eng']; ?></h2>
                                    <p class="sanskrit-name"><span>Sanskrit Name: </span><?php echo $pose['name_sanskrit']; ?></p>
                                    
                                    <!-- ! Removed a.data-link class -->
                                    <a class="tag-info data-type" href="<?php echo $poseTypeUrls[$pose['tags']['type']]; ?>" target="blank"><?php echo str_replace("_", " ", $pose['tags']['type']); ?>,</a>
                                    <a class="tag-info data-level" href="<?php echo $poseLevelUrls[$pose['tags']['level']]; ?>" target="blank"><?php echo $pose['tags']['level']; ?>,</a>
                                    <a class="tag-info data-benefit" href="<?php echo $poseBenefitUrls[$pose['tags']['benefit']]; ?>" target="blank"><?php echo $pose['tags']['benefit']; ?></a>

                                    <div class="description-container">
                                        <h3>Benefit:</h3>
                                        <p><?php echo $pose['benefit_p']; ?></p>

                                        <h3>Keys:</h3>
                                        <p><?php echo $pose['key_p']; ?></p>

                                        <span class="caution-txt">
                                            <h3>Cautions:</h3><p><?php echo " " . $pose['caution_p']; ?></p>
                                        </span>

                                        <h3 class="tag-description">Level:</h3><p><?php echo " " . $pose['tags']['level']; ?></p>
                                        <br>
                                        <h3 class="tag-description">Type:</h3><p><?php echo " " . str_replace("_", " ", $pose['tags']['type']); ?></p>
                                        <br>
                                        <h3 class="tag-description">Quality:</h3><p><?php echo " " . $pose['tags']['benefit']; ?></p>
                                    </div>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Up Button Icon / JS-->
                    <div class="up-button">
                        <a href="#search-sort-wrap"><img src="/wp-content/uploads/up-icon.png" class="up-btn-icon" loading="lazy" title="Top of the page" alt="up icon"></a>
                    </div>


                    <!-- popup -->
                    <?php get_template_part('template-parts/popup-1'); ?>

                    
                </div>
                <!-- End Content -->

            </div>    

            <div class="asidebar">
    
                <!-- Sidebar -->
                <?php get_sidebar(); ?>

            </div>
        </div>
    </div>
                
<?php get_footer(); ?>
