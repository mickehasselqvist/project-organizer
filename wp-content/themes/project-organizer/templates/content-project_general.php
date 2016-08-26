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
                            <strong><?php the_sub_field('project_file_title'); ?></strong><br />
                            <?php if(get_sub_field('project_file_description')) { ?>
                                <?php the_sub_field('project_file_description'); ?>
                            <?php } ?>
                            <?php $project_file = get_sub_field('project_file'); ?>
                            <a href="<?php echo $project_file['url'] ?>" target="_blank"><?php echo $project_file['url']; ?></a>
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
            <div class="meter red" title="<?php the_field('project_completion_status'); ?>%">
                <span style="width: <?php the_field('project_completion_status'); ?>%"><span></span></span>
            </div>
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