<?php if( have_rows('project_to_do_list') ): $i = 0; ?>
    <div class="todo_list_container">
        <h3>Mandatory</h3>
        <ul class="todo_list">
        <?php while ( have_rows('project_to_do_list') ) : the_row(); $i++; ?>
            <?php $project_to_do_importance = get_sub_field('project_to_do_importance'); ?>
            <?php if($project_to_do_importance == 'mandatory') { ?>
                <?php $project_to_do_completion = get_sub_field('project_to_do_completion'); ?>
                <?php if($project_to_do_completion) { ?>
                    <?php $input_checked = 'checked="checked"' ?>
                <?php }else{ ?>
                    <?php $input_checked = '"' ?>
                <?php } ?>

                <li>
                    <input type="checkbox" id="task_<?php echo $i; ?>" <?php echo $input_checked; ?> />
                    <label for="task_<?php echo $i; ?>" class="toggle"></label>
                    <?php the_sub_field('project_to_do'); ?>
                </li>
            <?php } ?>

        <?php endwhile; ?>
        </ul>
        <h3>Optional</h3>
        <ul class="todo_list">
        <?php while ( have_rows('project_to_do_list') ) : the_row(); $i++; ?>
            <?php $project_to_do_importance = get_sub_field('project_to_do_importance'); ?>
            <?php if($project_to_do_importance == 'optional') { ?>
                <?php $project_to_do_completion = get_sub_field('project_to_do_completion'); ?>
                <?php if($project_to_do_completion) { ?>
                    <?php $input_checked = 'checked="checked"' ?>
                <?php }else{ ?>
                    <?php $input_checked = '"' ?>
                <?php } ?>

                <li>
                    <input type="checkbox" id="task_<?php echo $i; ?>" <?php echo $input_checked; ?> />
                    <label for="task_<?php echo $i; ?>" class="toggle"></label>
                    <?php the_sub_field('project_to_do'); ?>
                </li>
                <?php } ?>

                <?php endwhile; ?>
                </ul>
    </div>
<?php else : ?>
    <div class="todo_list_container">
        <div class="content">
            <p><?php _e('You have nothing to do in this project! Hooooray!', 'project_organizer'); ?></p>
        </div>
    </div>
<?php endif; ?>
