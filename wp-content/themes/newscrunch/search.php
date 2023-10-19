<?php
/**
 * The template for displaying search results pages
 *
 * @package Newscrunch
 */

get_header();
do_action( 'newscrunch_breadcrumbs_hook' );

if((get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) {
    $newscrunch_page_class='stretched';   
}
else {
    $newscrunch_page_class='';
}

//Sidebar Selection
if ( class_exists('Newscrunch_Plus') )
{   
    // Meta Right Sidebar
    $newscrunch_page_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_sidebar', true );
    if($newscrunch_page_sidebar == '') { $newscrunch_page_sidebar = get_theme_mod('newscrunch_single_right_sidebar','sidebar-1');}
    else { $newscrunch_page_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_sidebar', true ); }

    // Meta Left Sidebar
    $newscrunch_left_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_left_sidebar', true );
    if($newscrunch_left_sidebar == '') { $newscrunch_left_sidebar = get_theme_mod('newscrunch_single_left_sidebar','left-sidebar');}
    else { $newscrunch_left_sidebar = get_post_meta(get_the_ID(),'newscrunch_left_sidebar', true ); }
}
else
{
    // Meta Right Sidebar
    $newscrunch_page_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_sidebar', true );
    if($newscrunch_page_sidebar =='') { $newscrunch_page_sidebar ='sidebar-1';} 

    // Meta Left Sidebar
    $newscrunch_left_sidebar = get_post_meta(get_the_ID(),'newscrunch_page_left_sidebar', true );
    if($newscrunch_left_sidebar =='') { $newscrunch_left_sidebar ='left-sidebar';} 
}


if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) =='')
{
    if(get_theme_mod('page_sidebar_layout','right')=='right' || get_theme_mod('page_sidebar_layout','right')=='left')  
    {   
       $page_column='<div class="spnc-col-7 spnc-sticky-content">';
    }   
    elseif(get_theme_mod('page_sidebar_layout','right')=='both')
    {
        $page_column='<div class="spnc-col-8 spnc-sticky-content">';
    }
    else
    {
        $page_column='<div class="spnc-col-1">';
    }
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_left')
{  
    $page_column='<div class="spnc-col-7 spnc-sticky-content">';
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_right')
{
    $page_column='<div class="spnc-col-7 spnc-sticky-content">';
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_both')
{
    $page_column='<div class="spnc-col-8 spnc-sticky-content">';
}
else if(get_post_meta(get_the_ID(),'newscrunch_site_layout', true ) == 'newscrunch_site_layout_without_sidebar')
{
    $page_column='<div class="spnc-col-1">';
}
else
{
    $page_column='<div class="spnc-col-1">';
}
?>


<section class="page-section-space blog bg-default spnc-category-page <?php echo esc_attr($newscrunch_page_class);?>" id="content">
    <div class="spnc-container">
        <?php
        if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
            echo '<div class="spnc-row"><div class="spnc-col-1">';
            do_action('newscrunch_breadcrumbs_page_title_hook');
            echo '</div></div>';
        endif;
        ?>

        <div class="spnc-row">
            <?php 
            //sidebar           
            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )== '') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_left') {
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar);
                echo '</div></div></div>';
            }
            elseif(((get_theme_mod('page_sidebar_layout','right')=='both') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )== '') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_both') {
                echo '<div class="spnc-col-10"><div class="spnc-sidebar spnc-main-sidebar"><div class="left-sidebar">';
                if ((!is_active_sidebar('left-sidebar')) && (get_theme_mod('page_sidebar_layout','right')=='both') ) {
                        newscrunch_sleft_widget_area( 'left-sidebar' );
                    }
                dynamic_sidebar($newscrunch_left_sidebar); 
                echo '</div></div></div>';
            }

            echo  $page_column; 

            if (have_posts()): 
                $i=1;
                echo '<div class="spnc-blog-cat-wrapper">';
               
                    while (have_posts()): the_post();
                        if($i==1){
                            get_template_part( 'template-parts/content-first');
                        }else{
                             get_template_part( 'template-parts/content-search');
                        }
                    $i++;
                    endwhile;
                echo'</div>';
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            echo '<div class="clrfix"></div>';
            // pagination
            do_action('newscrunch_page_navigation');
            ?>		
            </div>	
            <?php 
        //right sidebar
        if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_right')
            {
                echo '<div class="spnc-col-9"><div class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
            }
        elseif(((get_theme_mod('page_sidebar_layout','right')=='both') && get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='') || get_post_meta(get_the_ID(),'newscrunch_site_layout', true )=='newscrunch_site_layout_both')
            {
                echo '<div class="spnc-col-10"><div class="spnc-sidebar spnc-main-sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($newscrunch_page_sidebar); 
                echo '</div></div></div>';
            }    
         ?>
        </div>
    </div>
</section>  
<?php
get_footer();