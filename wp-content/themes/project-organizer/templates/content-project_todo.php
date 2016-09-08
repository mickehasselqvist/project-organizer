<?php if( have_rows('project_to_do_list') ): $i = 0; ?>
    <div class="todo_list_container">

        <?php $mandatory_tasks = '';
        $optional_tasks = '';
        while ( have_rows('project_to_do_list') ) : the_row(); $i++;

            $project_to_do_importance = get_sub_field('project_to_do_importance');
            $project_to_do_completion = get_sub_field('project_to_do_completion');

            if($project_to_do_completion) { $input_checked = 'checked="checked"'; }else{ $input_checked = ''; }

            if($project_to_do_importance == 'mandatory') {
                $mandatory_tasks .= '<li>';
                    $mandatory_tasks .= '<input type="checkbox" id="task_' . $i . '"' . $input_checked . '/>';
                    $mandatory_tasks .= '<label for="task_' .$i . '" class="toggle"></label>';
                    $mandatory_tasks .= get_sub_field('project_to_do');;
                $mandatory_tasks .= '</li>';
            }elseif($project_to_do_importance == 'optional') {
                $optional_tasks .= '<li>';
                $optional_tasks .= '<input type="checkbox" id="task_' . $i . '"' . $input_checked . '/>';
                $optional_tasks .= '<label for="task_' .$i . '" class="toggle"></label>';
                $optional_tasks .= get_sub_field('project_to_do');;
                $optional_tasks .= '</li>';
            }

        endwhile; ?>

        <?php if(!empty($mandatory_tasks)) { ?>
            <h3>Mandatory</h3>
            <ul class="todo_list">
                <?php echo $mandatory_tasks; ?>
            </ul>
        <?php } ?>

        <?php if(!empty($optional_tasks)) { ?>
            <h3>Optional</h3>
            <ul class="todo_list">
                <?php echo $optional_tasks; ?>
            </ul>
        <?php } ?>


    </div>
<?php else : ?>
    <div class="todo_list_container">
        <div class="content">
            <p><?php _e('You have nothing to do in this project! Hooooray!', 'project_organizer'); ?></p>
        </div>
    </div>
<?php endif; ?>
