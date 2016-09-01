<table class="general-table">
    <tbody>
    <tr>
        <th>Project size</th>
        <td><?php the_field('project_type'); ?></td>
    </tr>
    <tr>
        <th>Files</th>
        <td>
            <?php if( have_rows('project_files') ): ?>
                <ul>
                    <?php while ( have_rows('project_files') ) : the_row(); ?>
                        <li>
                            <?php $project_file = get_sub_field('project_file'); ?>
                            <a href="<?php echo $project_file['url'] ?>" target="_blank"><?php the_sub_field('project_file_title'); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <?php _e('No files uploaded for this project.', 'project_organizer'); ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Completion status</th>
        <td>
            <?php if( have_rows('project_to_do_list') ): ?>
                <?php $mandatory_count = 0 ?>
                <?php $optional_count = 0 ?>
                <?php $finished_mandatory_count = 0 ?>
                <?php while ( have_rows('project_to_do_list') ) : the_row(); ?>
                    <?php $project_to_do_importance = get_sub_field('project_to_do_importance'); ?>
                    <?php if($project_to_do_importance == 'mandatory') {
                        $mandatory_count++;
                        $project_to_do_completion = get_sub_field('project_to_do_completion');
                        if($project_to_do_completion) {
                            $finished_mandatory_count++;
                        }
                    } ?>
                    <?php if($project_to_do_importance == 'optional') {
                        $optional_text = '<li>' . get_sub_field('project_to_do') . '</li>';
                        $optional_count++;
                    } ?>
                <?php endwhile; ?>
                <?php $completion_status = 100/$mandatory_count*$finished_mandatory_count . '%'; ?>
            <?php else : ?>
                <?php $completion_status = '100%'; ?>
            <?php endif; ?>
            <style>
                @keyframes expandWidth {
                    0% { width: 0; }
                    100% { width: <?php echo $completion_status; ?> }
                }
            </style>
            <div class="meter red" title="<?php echo $completion_status; ?>%">
                <span><span></span></span>
            </div>
            <?php if($optional_count>0) { ?>
                <div class="optional">
                    <strong><?php _e('Optional tasks'); ?></strong><br />
                    <ul><?php echo $optional_text; ?></ul>
                </div>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <th>Link</th>
        <td>
            <?php if(get_field('project_link')) { ?>
                <a href="<?php the_field('project_link'); ?>" target="blank" class="external_link">
                    <?php the_field('project_link'); ?>
                </a>
            <?php }else{ ?>
                No link.
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>