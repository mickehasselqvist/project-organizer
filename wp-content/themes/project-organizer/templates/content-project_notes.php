<div class="project-notes">

    <div class="content">
        <?php if(get_field('project-notes')) { ?>
            <?php the_field('project_notes'); ?>
        <?php }else{ ?>
            <p style="text-align: center;"><?php _e('You have written no notes for this project.'); ?></p>
        <?php } ?>
    </div>

</div>