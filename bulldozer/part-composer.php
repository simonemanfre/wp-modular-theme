<?php 
global $content;
$composer = get_field('composer');
foreach($composer as $content):

    get_template_part('composer/part', $content['acf_fc_layout']);

endforeach; 
?>