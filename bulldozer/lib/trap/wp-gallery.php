<?php

add_filter('post_gallery', 'trap_post_gallery', 10, 2);
function trap_post_gallery($output, $attr) {
global $post;

if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby'])
        unset($attr['orderby']);
}

extract(shortcode_atts(array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => $post->ID,
    'itemtag' => 'dl',
    'icontag' => 'dt',
    'captiontag' => 'dd',
    'columns' => 3,
    'size' => 'thumbnail',
    'include' => '',
    'exclude' => ''
), $attr));

$id = intval($id);
if ('RAND' == $order) $orderby = 'none';

if (!empty($include)) {
    $include = preg_replace('/[^0-9,]+/', '', $include);
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
        $attachments[$val->ID] = $_attachments[$key];
    }
}

if (empty($attachments)) return '';

$output .= "<div class='c-gallery'>\n";

foreach ($attachments as $id => $attachment) {
    $img = wp_prepare_attachment_for_js($id);

    $url = $img['sizes']['thumbnail']['url'];
    $url_lg = $img['sizes']['full']['url'];

    $height = $img['sizes']['thumbnail']['height'];
    $width = $img['sizes']['thumbnail']['width'];
    $alt = $img['alt'];

    $caption = $img['caption'];

    $output .= "<a href=\"{$url_lg}\" class='c-gallery__item'>\n";
    $output .= "<figure class='c-gallery__item__figure'>\n";
    $output .= "<img src=\"{$url}\" width=\"{$width}\" height=\"{$height}\" alt=\"{$alt}\"/>\n";
    $output .= "</figure>\n";

    if ($caption) {
        $output .= "<div class=\"c-gallery__item__caption\">{$caption}</div>\n";
    }
    $output .= "</a>\n";
}

$output .= "</div>\n";

return $output;
}
 ?>
