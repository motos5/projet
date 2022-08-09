<aside class="sidebar">
    <?php if ( is_active_sidebar_with_content('sidebar_pro')  ) {
        dynamic_sidebar('sidebar_pro');
    } else {
        $filter = new Pro_Widget_Filter();
        $filter->widget(['before_widget' => '', 'after_widget' => ''], ['title_1' => 'Select Position', 'title_2' => 'Select Country']);
    } ?>
</aside>